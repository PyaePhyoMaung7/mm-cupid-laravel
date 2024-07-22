<?php

namespace App\Http\Controllers\Transaction;

use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Transaction\TransactionRepositoryInterface;

class TransactionController extends Controller
{
    private $transactionRepository;
    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
        DB::connection()->enableQueryLog();
    }

    public function index ()
    {
        try {
            $transactions = $this->transactionRepository->getTransactions();
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("TransactionController::index", $queryLog);
            return view('backend.transaction.index', compact([
                'transactions'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("TransactionController::index", $e->getMessage());
            abort(500);
        }
    }

    public function view (int $id)
    {
        try {
            $transaction = $this->transactionRepository->getTransactionById((int) $id);
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("TransactionController::view", $queryLog);
            return view('backend.transaction.form', compact([
                'transaction'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("TransactionController::view", $e->getMessage());
            abort(500);
        }
    }

}
