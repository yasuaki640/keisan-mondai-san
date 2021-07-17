<?php

namespace App\Http\Resources\QuestionSummary;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
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
            'user_id' => $this->resource->user_id,
            'num_of_questions' => $this->resource->num_of_questions,
            'operator' => $this->resource->operator,
            'answer_start_at' => $this->resource->answer_start_at,
            'answer_end_at' => $this->resource->answer_end_at,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
