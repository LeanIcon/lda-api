<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseDate extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'start_date',
        // 'end_date',
        // 'tag',
        'course_id',
        'type', // Type of date (e.g., 'start', 'end', 'early_bird_start', 'early_bird_end')
        'date',
        'time', // Optional: For specifying start and end times
        'description', // Optional: Description for specific dates (e.g., "Module 1 Start")
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
