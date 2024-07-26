<?php

namespace App\Repositories\DateRequest;

use App\Utility;
use App\Constant;
use App\ReturnMessage;
use App\Models\DateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DateRequest\DateRequestRepositoryInterface;

class DateRequestRepository implements DateRequestRepositoryInterface
{
    public function getDateRequests ()
    {
        $date_requests = DateRequest::select('id', 'invite_id', 'accept_id')
                                    ->where('status', Constant::DATE_REQUEST_ACCEPTED)
                                    ->whereNull('deleted_at')
                                    ->orderBy('id', 'ASC')
                                    ->paginate(5);
        return $date_requests;
    }

    public function getDateRequestById(int $id)
    {
        $date_request = DateRequest::find($id);
        return $date_request;
    }

    public function markAsContacted(int $id)
    {
        $returned_array         = [];
        $update_data            = [];
        $update_data['status']  = Constant::DATE_REQUEST_CONTACTED;
        $data                   = Utility::addUpdatedBy($update_data);
        $paramObj               = DateRequest::find($id);
        $result                 = $paramObj->update($data);
        if ($result) {
            $returned_array['status']   = ReturnMessage::OK;
        } else {
            $returned_array['status']   = ReturnMessage::INTERNAL_SERVER_ERROR;
        }
        return $returned_array;
    }
}
