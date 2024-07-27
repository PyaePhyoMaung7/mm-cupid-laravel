<?php

namespace App\Repositories\Transaction;

interface TransactionRepositoryInterface
{
    public function getTransactions();

    public function getTransactionById(int $id);

    public function updatePoint(array $data);

    public function getPointLogs();
}
