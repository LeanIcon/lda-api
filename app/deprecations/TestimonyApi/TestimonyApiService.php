<?php
namespace App\Filament\Resources\TestimonyResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\TestimonyResource;
use Illuminate\Routing\Router;


class TestimonyApiService extends ApiService
{
    protected static string | null $resource = TestimonyResource::class;

    public static function handlers() : array
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
