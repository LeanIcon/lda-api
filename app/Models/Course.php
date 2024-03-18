<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Tag;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'abbreviation',
        'summary',
        'description',
        'featured',
        'level',
        'status',
        'duration',
        'banner',
        'thumbnail',
        'badge',
        'brochure',
        'delivery_mode',
        'tag',
        'cert_sample',
        'category_id',
    ];

        /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
    ];

     public static array $allowedFields = [
        'title',
        'slug',
        'abbreviation',
        'course_tag',
    ];

    // Which fields can be used to sort the results through the query string
    public static array $allowedSorts = [
        'title',
        'created_at'
    ];

    // Which fields can be used to filter the results through the query string
    public static array $allowedFilters = [
        'title'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Optional: Relationship with Cohort (if needed)
    public function cohorts()
    {
        return $this->belongsToMany(Cohort::class); // Define the relationship details
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimony::class);
    }

    public function dates(): HasMany
    {
        return $this->hasMany(CourseDate::class);
    }

    public function resources(): HasMany
    {
        return $this->hasMany(LearningResource::class);
    }

    public function participant(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function trainers(): BelongsToMany
    {
        return $this->belongsToMany(Trainer::class, 'course_trainers');
    }

    public function prices(): HasMany
    {
        return $this->hasMany(CoursePrice::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function enrollments()
    {
        return $this->belongsToMany(Participant::class, 'enrollments')
                    ->withPivot(['transaction_ref', 'payment_details']); // Include pivot table columns
    }

    // Optional: Relationship for separate Curricula table (consider eager loading)
    public function curriculum()
    {
        return $this->hasOne(Curriculum::class); // One-to-One relationship with Curriculum
    }

    // public function getPhotoAttribute()
    // {
    //     $file = $this->getMedia('photo')->last();

    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //     }

    //     return $file;
    // }

    // public function getImageAttribute()
    // {
    //     $file = $this->getMedia('Image')->last();

    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //     }

    //     return null;  // Return null if no image exists
    // }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->badge, 'http');

        return ($isUrl) ? $this->badge : Storage::disk('public')->url($this->badge);
    }

}
