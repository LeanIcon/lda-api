<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretrainerRequest;
use App\Http\Requests\UpdatetrainerRequest;
use App\Http\Resources\TrainersResource;
use App\Models\Trainer;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all(); // Fetch all courses
        return TrainersResource::collection($trainers);
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
    public function store(StoretrainerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(trainer $trainer)
    {
        return new TrainersResource($trainer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trainer $trainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetrainerRequest $request, trainer $trainer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trainer $trainer)
    {
        //
    }
}
