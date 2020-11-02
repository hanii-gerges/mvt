<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class QuestionResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            //'answer' => $this->answer,
            'author' => new UserResource(User::find($this->user_id)),
            'category' => $this->category,
            'tags' => $this->tags,
            'status' => $this->status,
        ];
    }
}
