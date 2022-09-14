<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResources extends JsonResource
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
            'id'=> $this->id,
            'title'=> $this->title,
            'tag'=> $this->tag,
            'text'=> $this->text,
            'image'=> $this->image,
            'dateCreateArticle'=> $this->dateCreateArticle,
            'timeReadArticle'=> $this->timeReadArticle,
            'amountView'=> $this->amountView,
        ];
    }
}
