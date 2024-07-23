<?php

namespace App\Console\Commands;

use App\Constant;
use App\Models\Member;
use App\Models\CronJob;
use App\Models\Setting;
use Illuminate\Console\Command;
use App\Mail\SuggestPartnerMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Repositories\Setting\SettingRepository;

class SuggestPartner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'suggest:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to suggest parnters';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $max        = Member::max('cron_job_number');
        $members    = null;
        if ($max == 0) {
            $members = Member::select('id', 'username', 'email', 'partner_gender', 'partner_min_age', 'partner_max_age')
                            ->inRandomOrder()
                            ->take(10)
                            ->get();
        } else {
            $members = Member::select('id', 'username', 'email', 'partner_gender', 'partner_min_age', 'partner_max_age')
                            ->where('cron_job_number', '!=', $max)
                            ->inRandomOrder()
                            ->take(10)
                            ->get();
        }

        foreach ($members as $member) {
            $member_id          = $member->id;
            $partner_gender     = $member->partner_gender;
            $partner_min_age    = $member->partner_min_age;
            $partner_max_age    = $member->partner_max_age;
            $prev_suggestions   = CronJob::select('suggest_member_id')
                                        ->where('sender_member_id', '=', $member_id)
                                        ->get();

            $partner            = Member::select(
                'id',
                'username',
                DB::raw('TIMESTAMPDIFF(YEAR, members.date_of_birth, CURDATE()) AS age')
            )
                                        ->whereNull('deleted_at')
                                        ->where('id', '!=', $member_id);

            if ($partner_gender != Constant::PARTNER_GENDER_BOTH) {
                $partner        = $partner->where('gender', '=', $partner_gender);
            }

            if (count($prev_suggestions) > 0) {
                foreach ($prev_suggestions as $suggestion) {
                    $partner    = $partner->where('id', '!=', $suggestion->suggest_member_id);
                }
            }

            $partner            = $partner->whereRaw('TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) BETWEEN ? AND ?', [$partner_min_age, $partner_max_age])
                                          ->inRandomOrder()
                                          ->first();

            $setting            = Setting::first()  ;
            $company_name       = $setting->company_name;
            $company_logo       = asset('storage/images/' . $setting->company_logo);
            $url_username       = str_replace(' ', '-', $partner->username);
            $mail_data = [
                'email'                 => $member->email,
                'link'                  => url('/user/' . $url_username . '/' . $partner->id),
                'company_name'          => $company_name,
                'company_logo'          => $company_logo,
                'username'              => $partner->username,
                'age'                   => $partner->age,
            ];

            Mail::to('pyaephyomg1004@gmail.com')->send(new SuggestPartnerMail($mail_data));
            dd('a');
            Log::info("Member info - \n" . $member . "\n Matched Partner - \n " . $partner . "\n\n");
            Log::info($mail_data);
        }
        return Command::SUCCESS;
    }
}
