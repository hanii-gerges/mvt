<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class NewsResource extends JsonResource
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
            'title' => $this->title,
            'images' => 'not yet',
            'body' => $this->body,
            'author' => new UserResource(User::find($this->user_id)),
            'status' => $this->status,
        ];
    }
}
