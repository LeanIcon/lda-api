<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurrculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $curriculums = Curriculum::all();
        return new CurriculumCollection($curriculums);
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

    /**
     * Display the specified resource.
     *
     *   * @param Curriculum $curriculum
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Curriculum $curriculum)
    {
        return new CurriculumResource($curriculum); // Return a single CourseResource
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
