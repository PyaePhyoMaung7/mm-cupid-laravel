<?php

namespace App\Http\Controllers\Transaction;

use App\Utility;
use App\ReturnMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PointUpdateRequest;
use App\Repositories\Transaction\TransactionRepositoryInterface;

class TransactionController extends Controller
{
    private $transactionRepository;
    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
        DB::connection()->enableQueryLog();
    }

    public function index()
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

    public function view(int $id)
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

    public function updatePoint(PointUpdateRequest $request)
    {
        try {
            $result = $this->transactionRepository->updatePoint((array) $request->all());
            $queryLog = DB::getQueryLog();
            Utility::saveDebugLog("TransactionController::updatePoint", $queryLog);
            if ($result['status'] == ReturnMessage::OK) {
                return redirect('admin-backend/transaction/index')->with(['success_msg' => 'Point added successfully']);
            } elseif ($result['status'] == ReturnMessage::INTERNAL_SERVER_ERROR) {
                return redirect('admin-backend/transaction/index')->with(['fail_msg' => 'Point addition failed!']);
            }
        } catch (\Exception $e) {
            Utility::saveErrorLog("TransactionController::updatePoint", $e->getMessage());
            abort(500);
        }
    }

    public function pointLogIndex()
    {
        try {
            $point_logs = $this->transactionRepository->getPointLogs();
            $queryLog   = DB::getQueryLog();
            Utility::saveDebugLog("TransactionController::pointLogIndex", $queryLog);
            return view('backend.point_logs.index', compact([
                'point_logs'
            ]));
        } catch (\Exception $e) {
            Utility::saveErrorLog("TransactionController::pointLogIndex", $e->getMessage());
            abort(500);
        }
    }

}
