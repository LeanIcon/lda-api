<?php
namespace App\Filament\Resources\CourseResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\CourseResource;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseTopic;
use App\Models\CourseTrainer;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PaginationHandler extends Handlers {
    public static bool $public = true;
    public static string | null $uri = '/';
    public static string | null $resource = CourseResource::class;

    public function handler()
    {
        $model = static::getEloquentQuery();

        $query = QueryBuilder::for($model)
        ->allowedFields($model::$allowedFields ?? [])
        ->allowedSorts($model::$allowedSorts ?? [])
        ->allowedFilters($model::$allowedFilters ?? [])
        ->paginate(request()->query('per_page'))
        ->appends(request()->query());

        // return static::getApiTransformer()::collection($query);

        // $data = $query->getCollection();

        $data = $query->getCollection()->toArray();

        return $data; // Return the entire transformed response

    }


}
