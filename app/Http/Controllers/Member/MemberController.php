<?php

namespace App\Http\Controllers\Member;

use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Member\MemberRepositoryInterface;

class MemberController extends Controller
{
    private $memberRepository;
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
        DB::connection()->enableQueryLog();
    }

    public function index()
    {
        try {
            $members = $this->memberRepository->getMembers();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("MemberController::index", $queryLog);
            return view('backend.member.index', compact([
                'members'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("MemberController::index", $e->getMessage());
            abort(500);
        }
    }
}
