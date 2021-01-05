<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Http\Resources\UserResource;

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
            'age' => $this->age,
            'sharable_name' => $this->sharable_name,
            'sharable_content' => $this->sharable_content,
            'answer' => [
                'author' => new UserResource(User::find($this->answer_author)),
                'body' => $this->answer,
            ],
            'category' => $this->category,
            'status' => $this->status,
        ];
    }
}
