<?php

namespace App\Repositories\Transaction;

use App\Utility;
use App\Constant;
use App\Models\Member;
use App\ReturnMessage;
use App\Models\PointLog;
use App\Models\MemberTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Transaction\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function getTransactions ()
    {
        $transactions = MemberTransaction::select('id', 'member_id', 'name')
                ->where('status', '=', Constant::POINT_RECHARGE_PENDING)
                ->orderBy('id', 'DESC')
                ->paginate(Constant::RECORD_PER_LIST);
        return $transactions;
    }

    public function getTransactionById(int $id)
    {
        $transaction = MemberTransaction::find($id);
        return $transaction;
    }

    public function updatePoint(array $data)
    {
        $returned_array         = [];
        DB::beginTransaction();
        try {
            $update_data                    = [];
            $member_id                      = $data['member_id'];
            $trans_id                       = $data['id'];
            $new_point                      = $data['point'];
            $member_obj                     = Member::find($member_id);
            $update_data['point']           = $member_obj->point + $new_point;
            $update_data                    = Utility::addUpdatedBy($update_data);
            $member_obj->update($update_data);

            $status_update_data             = [];
            $status_update_data['status']   = Constant::POINT_RECHARGED;
            $status_update_data             = Utility::addUpdatedBy($status_update_data);
            $trans_obj                      = MemberTransaction::find($trans_id);
            $trans_obj->update($status_update_data);

            $point_log_ins_data             = [];
            $point_log_ins_data['member_id']= $member_id;
            $point_log_ins_data['user_id']  = Auth::guard('admin')->user()->id;
            $point_log_ins_data['point']    = $new_point;
            $point_log_ins_data             = Utility::addCreatedBy($point_log_ins_data);
            $result                         = PointLog::create($point_log_ins_data);

            DB::commit();
            $returned_array['status']   = ReturnMessage::OK;
        } catch (\Exception $e) {
            DB::rollBack();
            Utility::saveErrorLog("TransactionRepository::updatePoint", $e->getMessage());
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }

    public function getPointLogs()
    {
        $point_logs = PointLog::paginate(Constant::RECORD_PER_LIST);
        return $point_logs;
    }

}
