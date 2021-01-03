<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'image' => 'not yet',
            'fullname' => $this->fullname,
            //'university' => 'not yet',
            //'major' => 'not yet',
            'position' => $this->position->name,
            'section' => $this->section->name,
            'branch' => $this->branch->name,
            'rate' => $this->rate,
            'bio' => $this->bio,
            'events' => $this->events, // change it to events resource
            'status' => $this->status,
        ];
    }
}
