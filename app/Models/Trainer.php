<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'expertise',
        'bio', // Optional for trainer bio
        'social_url',
        // 'user_id', // Foreign key to users.id
        // 'has_assigned_course',
        // 'has_assigned_user',
        // 'user_id', // Foreign key to users.id
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

     // Scopes to retrieve only active trainers
     public function scopeActive()
     {
         return $this->whereNull('deleted_at');
     }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_trainers');
    }

    //    // Optional mutator (example)
    // public function setHasAssignedCourseAttribute($value)
    // {
    //     $this->attributes['has_assigned_course'] = (bool) $value;
    //     $this->attributes['has_assigned_user'] = (bool) $value;
    // }

    // // Optional accessor (example)
    // public function getHasAssignedCourseAttribute()
    // {
    //     return [
    //         (bool) $this->attributes['has_assigned_course'],
    //         (bool) $this->attributes['has_assigned_user'],
    //     ];
    // }
}
