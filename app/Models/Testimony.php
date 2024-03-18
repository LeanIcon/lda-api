<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'comment',
        'star_rating',
        'course_id'
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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
