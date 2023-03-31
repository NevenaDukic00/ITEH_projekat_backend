<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GenreResource;
class BookResource extends JsonResource
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
            'id' =>$this->resource->id,
           'name'=>$this->resource->name,
            'author'=>$this->resource->author,
            'publisher'=>$this->resource->publisher,
            'shortDescription'=>$this->resource->shortDescription,
            'description'=>$this->resource->description,
            'price'=>$this->resource->price,
            'amount'=>$this->resource->amount,
            'url'=>$this->resource->url,
            'genre'=>new GenreResource($this->resource->genre)
          
        ];
    }
}
