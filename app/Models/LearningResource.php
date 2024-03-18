<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearningResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

          /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'course_id',
        'updated_at',
        'created_at',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
