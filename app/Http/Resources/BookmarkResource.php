<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookmarkResource extends JsonResource
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

            'meals_id'=>$this->meals_id,
            'name'=>$this->name,
            'category'=>$this->category,
            'image'=>$this->image,
            'level'=>$this->level,
        ];
    }
}
