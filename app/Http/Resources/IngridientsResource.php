<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IngridientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request){
        return [

            'id'=>$this->id,
            'name'=>$this->name,
            'image'=>$this->image,
            'category'=>$this->category,
            'ingridients' =>$this->ingridients,
            'process'=>$this->process,
            'people'=>$this->people,
            'time'=>$this->time
        ];

    }
}
