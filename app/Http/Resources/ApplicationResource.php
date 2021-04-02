<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'fullname' => $this->name_arabic,
            'birthdate' => $this->birthdate,
            'nationality' => $this->nationality,
            'email' => $this->email,
            'phone' => $this->phone,
            'about' => $this->any_ideas,
        ];
    }
}
