<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:participants,email', // Unique only if creating participant
            'phone_number' => 'required|string',
            'whatsapp' => 'nullable|string',
            'nationality' => 'nullable|string',
            'employment_status' => 'nullable|string',
            'educational_status' => 'nullable|string',
            'reference' => 'nullable|string',
            'transaction_ref' => 'nullable|string',
            'payment_details' => 'nullable|json',
            'selected_course' => 'required|integer|exists:courses,id', // Use 'selected_course'
            'status' => 'required|in:pending,approved,rejected',
        ];
    }
}
