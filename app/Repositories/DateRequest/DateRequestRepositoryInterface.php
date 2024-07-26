<?php

namespace App\Repositories\DateRequest;

interface DateRequestRepositoryInterface
{
    public function getDateRequests();

    public function getDateRequestById(int $id);

    public function markAsContacted(int $id);
}
