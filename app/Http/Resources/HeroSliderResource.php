<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HeroSliderResource extends JsonResource
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
            "id"    => $this->id,
            "title" => $this->title,
            "body"  => $this->body,
            "type"  => $this->type == 'i' ? "image" : "video",
            "media" => $this->getFirstMedia() ? $this->getFirstMedia()->getUrl() : null,

        ];
    }
}
