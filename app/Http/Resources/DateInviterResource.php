<?php

namespace App\Http\Resources;

use App\Http\Resources\MemberResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DateInviterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'invite_id' => $this->invite_id,
            'accept_id' => $this->accept_id,
            'invite_details' => $this->when(
                $this->getInviteMemberInfoById != null,
                new MemberResource($this->getInviteMemberInfoById)
            ),
        ];
    }
}
