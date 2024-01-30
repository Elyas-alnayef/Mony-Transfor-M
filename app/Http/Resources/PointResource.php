<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UsertResource;
class PointResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
       return[
        'id'=>$this->id,
        'name'=>$this->name,
        'country'=>$this->country,
        'address'=>$this->address,
        'current_balance'=>$this->current_balance,
        'manger'=>new UsertResource($this->whenLoaded('manager')),
       ];
    }
}
