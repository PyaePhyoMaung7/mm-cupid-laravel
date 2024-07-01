<?php

namespace App\Repositories\Member;

use App\Utility;
use App\Constant;
use App\Models\Member;
use App\ReturnMessage;
use App\Models\Setting;
use App\Models\MemberHobby;
use App\Models\MemberGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmMail;
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

            $is_thumb = false;
            for ($i = 1; $i <= 6; $i++) {
                if (isset($data['upload' . $i]) && $data['upload' . $i]->isValid()) {
                    $file = $data['upload' . $i];
                    $unique_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                    . "_"  . date('Ymd_his') . "_" . uniqid() . "." .  $file->getClientOriginalExtension();

                    $upload_dir = storage_path('app/public/uploads/' . $member_id ."/");
                    if (!File::exists($upload_dir)) {
                        File::makeDirectory($upload_dir, 0755, true);
                    }
                    $destination = $upload_dir . $unique_name;
                    $file->storeAs('uploads/' . $member_id, $unique_name, 'public');

                    $photo_ins_data                 = [];
                    $photo_ins_data['member_id']    = $member_id;
                    $photo_ins_data['name']         = $unique_name;
                    $photo_ins_data['sort']         = $i;
                    $photo_ins_data['created_by']   = $member_id;
                    $photo_ins_data['updated_by']   = $member_id;
                    MemberGallery::create($photo_ins_data);

                    if (!$is_thumb) {
                        $thumb_upload_dir = storage_path('app/public/uploads/' . $member_id . '/thumb/');
                        if (!File::exists($thumb_upload_dir)) {
                            File::makeDirectory($thumb_upload_dir, 0755, true);
                        }
                        $unique_thumb_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                        . "_thumb" . "_"  . date('Ymd_his') . "_" . uniqid() . "." .  $file->getClientOriginalExtension();
                        $thumb_destination = $thumb_upload_dir . $unique_thumb_name;
                        Utility::cropAndResizeImage($file, $thumb_destination, Constant::THUMB_WIDTH, Constant::THUMB_HEIGHT);

                        $thumb_ins_data                 = [];
                        $thumb_ins_data['thumbnail']    = $unique_thumb_name;
                        $thumb_ins_data['updated_at']   = date('Y-m-d H:i:s');
                        $thumb_ins_data['updated_by']   = $member_id;
                        $param_obj                      = Member::find($member_id);
                        $param_obj->update($thumb_ins_data);

                        $is_thumb = true;
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

    public function sendEmailConfirmMail($data) {
        $setting        = $this->settingRepository->getSetting();
        $company_name   = $setting->company_name;
        $company_logo   = asset('storage/images/' . $setting->company_logo);
        $mail_data = [
            'email'              => $data->email,
            'company_name'       => $company_name,
            'company_logo'       => $company_logo,
            'email_confirm_link' => url('email-confirm/' . $data->email_confirm_code),
        ];
        Mail::to($data->email)->send(new RegistrationConfirmMail($mail_data));
    }

    public function confirmEmail(string $email_confirm_code) {
        $returned_array = [];
        $result         = '';
        $member = Member::where('email_confirm_code', $email_confirm_code)
                        ->whereNull('deleted_at')
                        ->first();

        if ($member != null) {
            $update_data                = [];
            $update_data['status']      = Constant::MEMBER_EMAIL_VERIFIED;
            $update_data['updated_at']  = date('Y-m-d H:i:s');
            $update_data['updated_by']  = $member->id;
            $result = Member::where('email_confirm_code', $email_confirm_code)
                            ->update($update_data);
        }

        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }
}
