<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $courses = Course::all(); // Fetch all courses
        return CourseResource::collection($courses); // Return collection of CourseResources

    }

        /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // $course = Course::findOrFail($id); // Find course by ID
        // return new CourseResource($course); // Return a single CourseResource

        $course->load('faqs', 'resources', 'testimonials', 'trainers', 'Curriculum');

        $courseData = [
            'id' => $course->id,
            'title' => $course->title,
            'slug'=> $course->slug,
            'abbreviation'=> $course->abbreviation,
            'summary'=> $course->summary,
            'description'=> $course->description,
            'category_id'=> $course->category_id,
            'duration'=> $course->duration,
            'thumbnail'=> $course->thumbnail,
            'banner'=> $course->banner,
            'badge'=> $course->badge,
            'brochure'=> $course->brochure,
            'featured'=> $course->featured,
            'status'=> $course->status,
            'delivery_mode'=> $course->delivery_mode,
            'tag'=> $course->tag,
            'cert_sample'=> $course->cert_sample,
            // ... other course properties
            'faqs' => $course->faqs->toArray(),
            'trainers' => $course->trainers->toArray(),
            'testimonials' => $course->testimonials->toArray(),
            'resources' => $course->resources->toArray(),
        ];

        return response()->json($courseData);
    }

    public function storeTrainer(Request $request, $courseId)
    {
        // 1. Validate User Data (including is_trainer)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'is_trainer' => 'required|boolean', // Ensure is_trainer is provided and valid
            // ... other user attributes validation
        ]);

        // 2. Create User (setting is_trainer)
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'is_trainer' => $validatedData['is_trainer'],
            // ... other user attributes
        ]);

        // 3. Associate User as Trainer with Course
        $course = Course::findOrFail($courseId);
        $course->trainers()->attach($user->id);

        // 4. Handle Success or Error
        return back()->with('success', 'Trainer created successfully!');
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
        //
    }
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validated(); // Access validated data

    //     // Handle image uploads (if applicable)
    //     $thumbnailPath = null;
    //     $badgePath = null;
    //     $certificatePath = null;

    //     if ($request->hasFile('thumbnail')) {
    //         $thumbnailPath = $request->file('thumbnail')->store('course_thumbnails');
    //     }

    //     if ($request->hasFile('badge')) {
    //         $badgePath = $request->file('badge')->store('course_badges');
    //     }

    //     if ($request->hasFile('certificate')) {
    //         $certificatePath = $request->file('certificate')->store('course_certificates');
    //     }

    //     $course = Course::create([
    //         'title' => $validatedData['title'],
    //         'slug' => str::slug($validatedData['title']), // Generate slug from title
    //         'abbreviation' => $validatedData['abbreviation'],
    //         'summary' => $validatedData['summary'],
    //         'description' => $validatedData['description'],
    //         'category_id' => $validatedData['category_id'],
    //         'duration' => $validatedData['duration'],
    //         'thumbnail' => $thumbnailPath, // Set thumbnail path if uploaded
    //         'badge' => $badgePath, // Set badge path if uploaded
    //         'brochure_url' => $validatedData['brochure_url'],
    //         'featured' => $validatedData['featured'],
    //         'status' => $validatedData['status'],
    //         'delivery_mode' => $validatedData['delivery_mode'],
    //         'course_tag' => $validatedData['course_tag'],
    //         'certificate' => $certificatePath, // Set certificate path if uploaded
    //     ]);

    //     return new CourseResource($course);
    // }


    /**
     * Show the form for editing the specified resource.
     *  * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseRequest $request
     * @param string $id
     * @return CourseResource
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
