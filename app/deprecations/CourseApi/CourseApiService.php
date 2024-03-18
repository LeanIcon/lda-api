<?php
namespace App\Filament\Resources\CourseResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Routing\Router;


class CourseApiService extends ApiService
{
    protected static string | null $resource = CourseResource::class;
    protected static string | null $groupRouteName = 'my-courses';

    public static function handlers(): array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class

        ];



    }
}
