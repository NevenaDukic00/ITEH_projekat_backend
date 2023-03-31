<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
class OrderedBookResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'orderedBooks';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
           'amount'=>$this->resource->amount,
           'date'=>Str::substr($this->resource->created_at, 0,10),
           'user'=>new UserResource($this->resource->user),
           'book'=>new BookResource($this->resource->book),
          
            ];
    }
}
