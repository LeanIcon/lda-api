<?php

namespace App\Http\Resources;

use App\Models\CourseDate;
use App\Models\CoursePrice;
use App\Models\Curriculum;
use App\Models\Faq;
use App\Models\LearningResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'title' => $this->title,
            'slug'=> $this->slug,
            'abbreviation'=> $this->abbreviation,
            'summary'=> $this->summary,
            'description'=> $this->description,
            'category_id'=> $this->category_id,
            'duration'=> $this->duration,
            'banner'=> url($this->banner, (bool) config('app.force_https')),
            'thumbnail'=> url($this->thumbnail, (bool) config('app.force_https')),
            'badge'=> url($this->badge, (bool) config('app.force_https')),
            'brochure'=> $this->brochure,
            'featured'=> $this->featured,
            'status'=> $this->status,
            'delivery_mode'=> $this->delivery_mode,
            'tag'=> $this->tag,
            'cert_sample'=> url($this->cert_sample, (bool) config('app.force_https')),
            'curriculum' => Curriculum::with('topics.lessons') // Eager load topics with lessons
                ->where('course_id', $this->id)
                ->first()?->toArray(), // Convert to array
            // 'price'  => CoursePrice::where('course_id', $this->id)->where('currency','price')->first()?->price,
            'price' => [
                'amount' => CoursePrice::where('course_id', $this->id)->where('currency','price')->first()?->price,
                'currency' => CoursePrice::where('course_id', $this->id)->where('currency','price')->first()?->currency, // Or fetch the actual currency from the database
            ],
            'start_date' => CourseDate::where('course_id', $this->id)->where('type', 'start')->first()?->date, // Example: Fetch start date
            'application_end_date' => CourseDate::where('course_id', $this->id)->where('type', 'application_end')->first()?->date, // Example: Fetch application end date
            'faqs' => Faq::where('course_id', $this->id)->first()?->faqs, // Example: Fetch application end date
            'learningResource' => LearningResource::where('course_id', $this->id)->first()?->resources, // Example: Fetch application end date




            // // Include other relevant course data
            // 'start_date' => CourseDate::where('course_id', $this->id)->where('type', 'start')->first()?->date, // Example: Fetch start date
            // 'application_end_date' => CourseDate::where('course_id', $this->id)->where('type', 'application_end')->first()?->date, // Example: Fetch application end date
            // 'cohorts' => Cohort::whereHas('courses', function ($query) {
            //     $query->where('course_id', $this->id);
            // })->get(), // Example: Include associated cohorts (optional)
            // // ... other relevant data
        ];
    }
}
