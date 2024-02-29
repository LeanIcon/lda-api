<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use phpDocumentor\Reflection\DocBlock\Tag;

class Course extends Model
{
    use HasFactory;

    protected $fillabe = [

        'title',
        'summary',
        'description',
        'duration',
        'image',
        'thumbnail',
        'price_id',
        'topic_id',
        'trainer_id',
        'faq_id',
        'slug',
        'badge',
        'brochure_url',
        'syllabus_url',
        'is_featured',
        'is_active',
        'course_type',
        'course_tag'

    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    // public function episodes(): HasMany
    // {
    //     return $this->hasMany(Episode::class)->orderBy('sort');
    // }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
