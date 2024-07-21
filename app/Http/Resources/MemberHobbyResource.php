<?php

namespace App\Http\Resources;

use App\Http\Resources\HobbyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberHobbyResource extends JsonResource
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
            'hobby_id'      => $this->hobby_id,
            'hobby_details' => $this->when(
                $this->getHobbiesByMemberHobby != null,
                $this->getHobbiesByMemberHobby
            )
        ];
    }
}
