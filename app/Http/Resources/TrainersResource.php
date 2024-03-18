<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'expertise' => $this->expertise,
            'bio' => $this->bio,
            'social_url' => $this->social_url,
            // 'has_assigned_course' => $this->has_assigned_course,
            // 'has_assigned_user' => $this->has_assigned_user,
            // 'user_id' => $this->user_id,

            // Optional relationships (if needed)
            // 'user' => new UserResource($this->whenLoaded('user')),
            'course' => new CourseResource($this->whenLoaded('course')),
        ];
    }
}
