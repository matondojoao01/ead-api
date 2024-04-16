<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\ptBRHelper;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'status' => $this->status,
            'status_label' => $this->statusOptions[$this->status],
            'description' => $this->description,
            'user' => new UserResource($this->user),
            'lesson' => new LessonResource($this->whenLoaded('lesson')),
            'replies' => ReplayResoure::collection($this->replies),
            'updated_at' => ptBRHelper::data($this->updated_at)
        ];
    }
}
