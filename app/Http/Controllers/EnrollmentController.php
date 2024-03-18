<?php

namespace App\Http\Controllers;

use App\Http\Resources\EnrollmentResource;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::all();
        return EnrollmentResource::collection($enrollments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Use validation rules or a request class (recommended)
        $rules = [
            'selected_course' => 'required|array|min:1', // Ensure at least one course is selected
            'selected_course.*' => 'required|integer|exists:courses,id', // Validate each course ID
            'email' => 'required|email',
            // 'transaction_ref' => 'nullable|string',
            // 'payment_details' => 'nullable|json',
            'status' => 'required|in:pending,approved,rejected', // Validate enrollment status
        ];

        $validatedData = $request->validate($rules); // Or use a request class

        $course = null;
        if (count($validatedData['selected_course']) === 1) {
            $course = Course::find($validatedData['selected_course'][0]);
        } else {
            // Handle error: Participant can only choose one course
            return response()->json(['error' => 'Participant can only choose one course'], 400);
        }

        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        // Create participant profile for all enrollments
        $participant = Participant::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['whatsapp'],
            'whatsapp' => $validatedData['whatsapp'],
            'nationality' => $validatedData['nationality'],
            'preferred_course' => $validatedData['preferred_course'],
            'employment_status' => $validatedData['employment_status'],
            'educational_status' => $validatedData['educational_status'],
            'reference' => $validatedData['reference'],
        ]);

        // Create enrollment
        $enrollment = Enrollment::create([
            'participant_id' => $participant->id,
            'course_id' => $course->id,
            'status' => $validatedData['status'],
        ]);

        // Send notification emails based on enrollment status
        if ($validatedData['status'] === 'approved') {
            // Send confirmation email to participant
            $this->sendConfirmationEmail($participant, $course);

            // Send notification email to company (replace with your company email)
            $this->sendCompanyNotificationEmail($participant, $course, 'company_email@yourcompany.com');
        }

        return new EnrollmentResource($enrollment);
    }

        // Methods to send emails (replace with your actual email content and configuration)
    private function sendConfirmationEmail(Participant $participant, Course $course)
    {
        Mail::to($participant->email)->send(new ConfirmationEmail($participant, $course));
    }

    private function sendCompanyNotificationEmail(Participant $participant, Course $course, $companyEmail)
    {
        Mail::to($companyEmail)->send(new CompanyNotificationEmail($participant, $course));
    }


    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        return new EnrollmentResource($enrollment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
