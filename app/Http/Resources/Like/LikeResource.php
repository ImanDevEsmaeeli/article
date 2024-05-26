<?php

namespace App\Http\Resources\Like;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'status'=>$this->status,
            'likeable_id'=>$this->likeable_id,
            'likeable_type'=>$this->likeable_type,
            'updated_at'=>$this->updated_at,
        ];
    }
}
