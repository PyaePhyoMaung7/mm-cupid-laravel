<?php

namespace App\Repositories\Member;

use App\Utility;
use App\Constant;
use App\Models\Member;
use App\ReturnMessage;
use Illuminate\Support\Facades\DB;
use App\Repositories\Member\MemberRepositoryInterface;

class MemberRepository implements MemberRepositoryInterface
{
    public function getMembers()
    {
        $members = Member::select('id','username','email','phone','gender','date_of_birth','thumbnail','city_id','status')
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
}
