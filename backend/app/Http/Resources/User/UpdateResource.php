<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'd_o_b' => $this->resource->d_o_b,
            'sex' => $this->resource->sex,
            'email' => $this->resource->email,
            'user_image' => $this->resource->user_image,
            'created_at' => $this->resource->created_at,
        ];
    }
}
