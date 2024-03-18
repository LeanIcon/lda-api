<?php
namespace App\Filament\Resources\ParticipantResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\ParticipantResource;
use Illuminate\Routing\Router;


class ParticipantApiService extends ApiService
{
    protected static string | null $resource = ParticipantResource::class;

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
