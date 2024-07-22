<?php

namespace App\Repositories\Transaction;

use App\Utility;
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
