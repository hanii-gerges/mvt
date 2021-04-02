<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'image' => $this->getFirstMedia() != null ? $this->getFirstMedia()->getUrl():null,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
            'author' => new UserResource(User::find($this->user_id)),
            'status' =>$this->status,

        ];
    }
}
