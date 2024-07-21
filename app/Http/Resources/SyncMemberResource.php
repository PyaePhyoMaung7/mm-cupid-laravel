<?php

namespace App\Http\Resources;

use App\Http\Resources\MemberGalleryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SyncMemberResource extends JsonResource
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
            'username'  => $this->username,
            'age'       => $this->age,
            'gender'    => $this->gender_name,
            'religion'  => $this->religion_name,
            'about'     => str_replace("\n", '<br>', $this->about),
            'status'    => $this->status,
            'height'    => $this->height,
            'education' => str_replace("\n", '<br>', $this->education),
            'work'      => str_replace("\n", '<br>', $this->work),
            'city'      => $this->when(
                            $this->getCityByMember != null,
                            new CityResource($this->getCityByMember)
                        ),
            'images'    => $this->when(
                            $this->getGalleryByMember != null,
                            MemberGalleryResource::collection($this->getGalleryByMember)
                        ),
            'hobbies'   => $this->when(
                            $this->getMemberHobbiesByMember != null,
                            MemberHobbyResource::collection($this->getMemberHobbiesByMember)
                        ),
            'thumb'     => $this->thumb,
            'sent_date_requests'    => $this->when(
                            $this->getSentDateRequestsByMember != null,
                            DateRequestResource::collection($this->getSentDateRequestsByMember)
                        ),
            'received_date_requests' => $this->when(
                            $this->getReceiveDateRequestsByMember != null,
                            DateRequestResource::collection($this->getReceiveDateRequestsByMember)
                        ),
        ];
    }
}
