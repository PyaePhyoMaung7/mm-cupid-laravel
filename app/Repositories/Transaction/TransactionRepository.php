<?php

namespace App\Repositories\Transaction;

use App\Utility;
use App\Constant;
use App\ReturnMessage;
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
                ->paginate('10');
        return $transactions;
    }

    public function getTransactionById(int $id)
    {
        $transaction = MemberTransaction::find($id);
        return $transaction;
    }

}
