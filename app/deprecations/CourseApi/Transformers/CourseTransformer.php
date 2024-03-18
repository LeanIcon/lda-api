<?php
namespace App\Filament\Resources\CourseResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Concat;

class CourseTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            parent::toArray($request),
        ];

    //     'faqs' => $this->faqs ? $this->faqs->map(function ($faq) {
    //         return [
    //             'question' => $faq->question,
    //             'answer' => $faq->answer,
    //         ];
    //     }) : [],

    //     'topics' => $this->topics ? $this->topics->map(function ($topic) {
    //         return [
    //             'topic' => $topic->topic,
    //             'description' => $topic->description,
    //         ];
    //     }) : [],

    //     'prices' => $this->prices ? $this->prices->map( function ($price) {
    //         return [
    //             'price' => $price->price,
    //             'discount' => $price->discount,
    //             'early_bird_price' => $price->early_bird_price,
    //             'early_bird_start_date' => $price->early_bird_start_date,
    //             'early_bird_end_date' => $price->early_bird_end_date,
    //         ];
    //     }) : [], // Handle potential null value

    //     'dates' => $this->dates ? $this->dates->map(function ($date) {
    //         return [
    //             'start_date' => $date->start_date,
    //             'end_date' => $date->end_date
    //         ];
    //     }) : [],

    //     'testimonies' => $this->testimonies ? $this->testimonies->map(function ($testimony) {
    //         return [
    //             'name' => $testimony->name,
    //             'comment' => $testimony->comment,
    //             'description' => $testimony->description,
    //         ];
    //     }) : [],
    //     'resources' => $this->resources ? $this->resources->map(function ($resource) {
    //         return [
    //             'name' => $resource->name,
    //         ];
    //     }) : [],
    // ];

        //  'title' -> title
        //     'slug' -> slug
        //     'abbreviation' ->abbreviation
        //     'summary' ->summary
        //     'description'->description
        //     'description' ->description,
        //     'badge'  ->badge)
        //     'duration' ->duration
        //     'banner' ->banner
        //     'thumbnail' ->thumbnail

        //     'is_featured' ->is_featured
        //     'is_active' ->is_active
        //     'format' ->format
        //     'certificate' ->cert_sample

        return [
    //         // 'title' =>$this->title,
    //         // 'slug' =>$this->slug,
    //         // 'abbreviation' =>$this->abbreviation,
    //         // 'summary' =>$this->summary,
    //         // 'description' =>$this->description,
    //         // 'description' =>$this->description,
    //         // 'badge' => url($this->badge),
    //         // 'duration' =>$this->duration,
    //         // 'banner' =>$this->banner,
    //         // 'thumbnail' =>$this->thumbnail,

    //         // 'is_featured' =>$this->is_featured,
    //         // 'is_active' =>$this->is_active,
    //         // 'format' =>$this->format,
    //         // 'certificate' =>$this->cert_sample,
    //         // 'resources' =>$this->resources,
    //         // 'testimonies' =>$this->testimonies,
                    $data
        ];
    }

}
