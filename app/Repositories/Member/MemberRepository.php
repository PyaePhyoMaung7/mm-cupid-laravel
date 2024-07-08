<?php

namespace App\Repositories\Member;

use App\Utility;
use App\Constant;
use App\Models\Member;
use App\ReturnMessage;
use App\Models\Setting;
use App\Models\MemberHobby;
use App\Models\MemberGallery;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmMail;
use Intervention\Image\Facades\Image;
use App\Repositories\Member\MemberRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;

class MemberRepository implements MemberRepositoryInterface
{
    private $settingRepository;
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function getMembers()
    {
        $members = Member::select('id', 'username', 'email', 'phone', 'gender', 'date_of_birth', 'thumbnail', 'city_id', 'status')
                        ->selectRaw('CASE
                                        WHEN gender = ' . Constant::MALE . ' THEN "ADMIN"
                                        WHEN gender = ' . Constant::FEMALE . ' THEN "EDITOR"
                                        ELSE "Others"
                                    END as gender_name')
                        ->whereNull('deleted_at')
                        ->orderBy('id', 'DESC')
                        ->paginate('5');
        return $members;
    }

    public function getMemberByEmail(string $email)
    {
        $member = Member::select('password', 'status', 'deleted_at')
                        ->where('email', $email)
                        ->first();
        return $member;
    }

    public function getMemberPointById(int $id)
    {
        $member = Member::select('point')
                        ->where('id', '=', $id)
                        ->first();
        $point  = $member->point;
        return $point;
    }

    public function getMemberIdByPasswordResetCode(string $code)
    {
        $member = Member::select('id')
                        ->where('password_reset_code', '=', $code)
                        ->first();
        $id     = $member->id;
        return $id;
    }

    public function emailAlreadyExists(array $data)
    {
        $email  = $data['email'];
        $count  = Member::where('email', $email)->count();
        return $count > 0;
    }

    protected static function generateEmailConfirmCode()
    {
        $unique_number      = uniqid();
        $today_dt           = date("Y-m-d H:i:s");
        $email_confirm_code = md5($unique_number . $today_dt);
        return $email_confirm_code;
    }

    public function register(array $data)
    {
        $returned_array                     = [];
        DB::beginTransaction();
        try {
            $insert_data                        = [];
            $hobbies                            = $data['hobbies'];
            $hobbies                            = explode(',', $hobbies);
            $insert_data['username']            = $data['username'];
            $insert_data['password']            = bcrypt($data['password']);
            $insert_data['email']               = $data['email'];
            $insert_data['phone']               = $data['phone'];
            $insert_data['email_confirm_code']  = self::generateEmailConfirmCode();
            $insert_data['gender']              = $data['gender'];
            $insert_data['date_of_birth']       = Utility::convertToYmdFormat($data['birthday']);
            $insert_data['education']           = $data['education'];
            $insert_data['city_id']             = $data['city'];
            $insert_data['height_feet']         = $data['hfeet'];
            $insert_data['height_inches']       = $data['hinches'];
            $insert_data['status']              = Constant::MEMBER_UNVERIFIED;
            $insert_data['about']               = $data['about'];
            $insert_data['partner_gender']      = $data['partner_gender'];
            $insert_data['partner_min_age']     = $data['min_age'];
            $insert_data['partner_max_age']     = $data['max_age'];
            $insert_data['point']               = $this->settingRepository->getSetting()->point;
            $insert_data['work']                = $data['work'];
            $insert_data['religion']            = $data['religion'];
            $member                             = Member::create($insert_data);

            $member_id                          = $member->id;

            foreach ($hobbies as $hobby) {
                $hobby_ins_data                 = [];
                $hobby_ins_data['member_id']    = $member_id;
                $hobby_ins_data['hobby_id']     = $hobby;
                $hobby_ins_data['created_by']   = $member_id;
                $hobby_ins_data['updated_by']   = $member_id;
                $result = MemberHobby::create($hobby_ins_data);
            }

            for ($i = 1; $i <= 6; $i++) {
                if (isset($data['upload' . $i]) && $data['upload' . $i]->isValid()) {
                    $file = $data['upload' . $i];
                    $unique_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                    . "_"  . date('Ymd_his') . "_" . uniqid() . "." .  $file->getClientOriginalExtension();

                    $upload_dir = storage_path('app/public/uploads/' . $member_id ."/");
                    if (!File::exists($upload_dir)) {
                        File::makeDirectory($upload_dir, 0755, true);
                    }
                    $file->storeAs('uploads/' . $member_id, $unique_name, 'public');

                    $photo_ins_data                 = [];
                    $photo_ins_data['member_id']    = $member_id;
                    $photo_ins_data['name']         = $unique_name;
                    $photo_ins_data['sort']         = $i;
                    $photo_ins_data['created_by']   = $member_id;
                    $photo_ins_data['updated_by']   = $member_id;
                    MemberGallery::create($photo_ins_data);

                    if ($i == 1) {
                        $thumb_upload_dir = $upload_dir . '/thumb/';
                        if (!File::exists($thumb_upload_dir)) {
                            File::makeDirectory($thumb_upload_dir, 0755, true);
                        }
                        $unique_thumb_name = 'thumb_' . $unique_name;
                        $thumb_destination = $thumb_upload_dir . $unique_thumb_name;

                        $desired_ratio = Constant::THUMB_WIDTH / Constant::THUMB_HEIGHT;
                        $img = Image::make($file);
                        $width = $img->width();
                        $height = $img->height();

                        if ($width / $height > $desired_ratio) {
                            $new_width = (int) ($height * $desired_ratio);
                            $new_height = $height;
                        } else {
                            $new_width = $width;
                            $new_height = (int) ($width * $desired_ratio);
                        }
                        $crop_x = (int) (($width - $new_width) / 2);
                        $crop_y = (int) (($height - $new_height) / 2);

                        $modified_img = $img->crop($new_width, $new_height, $crop_x, $crop_y);
                        $modified_img->resize(Constant::THUMB_WIDTH, Constant::THUMB_HEIGHT);
                        $modified_img->save($thumb_destination);

                        $thumb_up_data                  = [];
                        $thumb_up_data['thumbnail']     = $unique_thumb_name;
                        $thumb_up_data['updated_at']    = date('Y-m-d H:i:s');
                        $thumb_up_data['updated_by']    = $member_id;
                        $member_obj                     = Member::find($member_id);
                        $member_obj->update($thumb_up_data);
                    }
                }
            }

            DB::commit();
            $returned_array['status']   = ReturnMessage::OK;
            $returned_array['data']     = $member;
            return $returned_array;
        } catch (\Exception $e) {
            DB::rollBack();
            Utility::saveErrorLog("MemberRepository::register", $e->getMessage());
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returned_array;
        }
    }

    public function sendEmailConfirmMail($data)
    {
        $setting        = $this->settingRepository->getSetting();
        $company_name   = $setting->company_name;
        $company_logo   = asset('storage/images/' . $setting->company_logo);
        $mail_data = [
            'email'              => $data->email,
            'company_name'       => $company_name,
            'company_logo'       => $company_logo,
            'email_confirm_link' => url('email-confirm?code=' . $data->email_confirm_code),
        ];
        dd($mail_data);
        Mail::to($data->email)->send(new RegistrationConfirmMail($mail_data));
    }

    public function confirmEmail(array $data)
    {
        $returned_array             = [];
        $result                     = '';
        $update_data                = [];
        $update_data['status']      = Constant::MEMBER_EMAIL_VERIFIED;
        $update_data['updated_at']  = date('Y-m-d H:i:s');
        $member_data                = Member::select('status')
                                        ->where('email_confirm_code', '=', $data['code'])
                                        ->first();
        $status                     = $member_data->status;

        if ($status == Constant::MEMBER_UNVERIFIED) {
            $result                 = Member::where('email_confirm_code', '=', $data['code'])
                                        ->update($update_data);
            if ($result) {
                $returned_array['status']   = ReturnMessage::OK;
            } else {
                $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
            }
            return $returned_array;
        } else {
            $returned_array['status']   = ReturnMessage::EMAIL_ALREADY_CONFIRMED;
        }
    }

    public function apiSyncMembers(array $data)
    {
        $returned_array     = [];
        $page_no            = $data['page'];
        $offset             = ($page_no - 1) * Constant::RECORD_PER_PAGE;
        $total_show_data    = $page_no * Constant::RECORD_PER_PAGE;
        $partner_gender     = Auth::guard('member')->user()->partner_gender;
        $member_id          = Auth::guard('member')->user()->id;
        $total_count        = Member::count();
        $base_url           = url('/');
        if ($total_count <= $total_show_data) {
            $returned_array['show_more'] = false;
        } else {
            $returned_array['show_more'] = true;
        }
        $members  = Member::select(
            '*',
            DB::raw('TIMESTAMPDIFF(YEAR, members.date_of_birth, CURDATE()) AS age'),
            DB::raw("CASE
                                WHEN gender = ". Constant::MALE ." THEN 'male'
                                WHEN gender = ". Constant::FEMALE ." THEN 'female'
                                ELSE 'other'
                            END AS gender_name"),
            DB::raw("CASE
                                WHEN religion = ". Constant::RELIGION_CHRISTIAN ." THEN 'Christian'
                                WHEN religion = ". Constant::RELIGION_ISLAM ." THEN 'Muslim'
                                WHEN religion = ". Constant::RELIGION_BUDDHIST ." THEN 'Buddhist'
                                WHEN religion = ". Constant::RELIGION_HINDU ." THEN 'Hindu'
                                WHEN religion = ". Constant::RELIGION_JAIN ." THEN 'Jain'
                                WHEN religion = ". Constant::RELIGION_SHINTO ." THEN 'Shinto'
                                WHEN religion = ". Constant::RELIGION_ATHEIST ." THEN 'Atheist'
                                ELSE 'Other'
                            END AS religion_name"),
            DB::raw('CONCAT(height_feet, "\'", height_inches, "\"") AS height'),
            DB::raw("CONCAT('". $base_url ."/storage/uploads/', id, '/thumb/', thumbnail) AS thumb")
        )
                    ->where('id', '!=', $member_id)
                    ->where('status', '!=', Constant::MEMBER_UNVERIFIED)
                    ->where('status', '!=', Constant::MEMBER_BANNED)
                    // ->where('love_status', '!=', Constant::IN_RELATIONSHIP)
                    ->whereNull('deleted_at');

        if (array_key_exists('partner_gender', $data) && $data['partner_gender'] != '') {
            $partner_gender = $data['partner_gender'];
        }

        if ($partner_gender != Constant::PARTNER_GENDER_BOTH) {
            $members = $members->where('gender', '=', $partner_gender);
        }

        // if(array_key_exists('min_age', $data) && $data['min_age'] != ''){
        //     $partner_min_age=  $data['min_age'];
        //     $members =  $members->whereRaw('date_of_birth <= CURDATE() - INTERVAL ? YEAR', [$partner_min_age]);
        // }

        // if(array_key_exists('max_age', $data) && $data['max_age'] != ''){
        //     $partner_max_age=  $data['max_age'];
        //     $members =  $members->whereRaw('date_of_birth >= CURDATE() - INTERVAL ? YEAR', [$partner_max_age]);
        // }

        $result = $members
                ->skip($offset)
                ->take(Constant::RECORD_PER_PAGE)
                ->get();

        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
            $returned_array['members']  = $result;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }

    public function sendPasswordResetLink(array $data)
    {
        $returned_array                             = [];
        $update_data                                = [];
        $password_reset_code                        = self::generateEmailConfirmCode();
        $update_data['password_reset_code']         = $password_reset_code;
        $update_data['password_reset_code_sent_at'] = date('Y-m-d H:i:s');
        $update_data['updated_at']                  = date('Y-m-d H:i:s');
        $result                                     = Member::where('email', '=', $data['email'])
                                                            ->update($update_data);

        if ($result) {
            $setting        = $this->settingRepository->getSetting();
            $company_name   = $setting->company_name;
            $company_logo   = asset('storage/images/' . $setting->company_logo);
            $mail_data = [
                'email'              => $data['email'],
                'company_name'       => $company_name,
                'company_logo'       => $company_logo,
                'password_reset_link' => url('password-reset-code-check?code=' . $password_reset_code),
            ];
            Mail::to($data['email'])->send(new PasswordResetMail($mail_data));
        }
    }

    public function updatePassword(array $data)
    {
        $returned_array                             = [];
        $update_data                                = [];
        $member_id                                  = $data['member-id'];
        $update_data['password']                    = bcrypt($data['password']);
        $update_data['updated_at']                  = date('Y-m-d H:i:s');
        $update_data['updated_by']                  = $member_id;
        $param_obj                                  = Member::find($member_id);
        $result                                     = $param_obj->update($update_data);

        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }
}
