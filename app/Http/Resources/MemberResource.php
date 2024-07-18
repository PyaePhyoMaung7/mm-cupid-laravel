<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'id'                => $this->id,
            'username'          => $this->username,
            'email'             => $this->email,
            'phone'             => $this->phone,
            'birthday'          => $this->date_of_birth,
            'hfeet'             => $this->height_feet,
            'hinches'           => $this->height_inches,
            'education'         => $this->education,
            'about'             => $this->about,
            'age'               => $this->age,
            'gender'            => $this->gender,
            'gender_name'       => $this->gender_name,
            'partner_gender'    => $this->partner_gender,
            'partner_min_age'   => $this->partner_min_age,
            'partner_max_age'   => $this->partner_max_age,
            'point'             => $this->point,
            'religion'          => $this->religion,
            'work'              => $this->work,
            'thumb'             => $this->thumb,
            'status'            => $this->status,
            'city'              => $this->when(
                                    $this->getCityByMember != null,
                                    new CityResource($this->getCityByMember)
                                ),
            'hobbies'           => $this->when(
                                    $this->getMemberHobbiesByMember != null,
                                    MemberHobbyResource::collection($this->getMemberHobbiesByMember)
                                ),
            'images'            => $this->when(
                                $this->getGalleryByMember != null,
                                MemberGalleryResource::collection($this->getGalleryByMember)
                                ),
            'sent_date_requests'=> $this->when(
                                $this->getSentDateRequestsByMember != null,
                                DateRequestResource::collection($this->getSentDateRequestsByMember)
                                ),
            'received_date_requests'=> $this->when(
                                    $this->getReceiveDateRequestsByMember != null,
                                    DateRequestResource::collection($this->getReceiveDateRequestsByMember)
                                    ),
        ];
    }
}
