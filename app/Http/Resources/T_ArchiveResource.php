<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class T_ArchiveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'status'=>$this->status,
            'total_amount'=>$this->total_amount,
            'un_number'=>$this->un_number,
            'sender'=>new PointResource($this->whenLoaded('t_point')),
            'receiver'=>new PointResource($this->whenLoaded('receiver')),
            'user'=>new PointResource($this->whenLoaded('user')),
        ];
    }
}
