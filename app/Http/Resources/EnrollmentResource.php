<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EnrollmentResource extends JsonResource
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
            'name' => $this->participant->name,
            'email' => $this->participant->email,
            'phone_number' => $this->phone_number,
            'whatsapp' => $this->participant->whatsapp,
            'nationality' => $this->participant->nationality,
            'preferred_course' => $this->participant->preferred_course,
            'employment_status' => $this->participant->employment_status,
            'educational_status' => $this->participant->educational_status,
            'reference' => $this->reference,
            // Participant data (flattened)
            // 'participant' => new ParticipantResource($this->participant),
            'course' => new CourseResource($this->course),
            'transaction_ref' => $this->transaction_ref,
            // 'payment_details' => $this->payment_details,
            'status' => $this->status, // Pending, Approved, Rejected
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // Formatted created_at
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'), // Formatted updated_at
        ];
    }
}
