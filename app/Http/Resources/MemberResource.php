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
            'member_id'     => $this->id,
            'username'      => $this->username,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'birthday'      => $this->date_of_birth,
            'city'          => $this->city_id,
            'hfeet'         => $this->height_feet,
            'hinches'       => $this->height_inches,
            'education'     => $this->education,
            'about'         => $this->about,
            'gender'        => $this->gender,
            'partner_gender'=> $this->partner_gender,
            'min_age'       => $this->partner_min_age,
            'max_age'       => $this->partner_max_age,
            'point'         => $this->point,
            'religion'      => $this->religion,
            'work'          => $this->work,
        ];
    }
}
