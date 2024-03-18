<?php
namespace App\Filament\Resources\ParticipantResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\ParticipantResource;

class DeleteHandler extends Handlers {
    public static bool $public = true;
    public static string | null $uri = '/{id}';
    public static string | null $resource = ParticipantResource::class;

    public static function getMethod()
    {
        return Handlers::DELETE;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    public function handler(Request $request, $id)
    {
        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->delete();

        return static::sendSuccessResponse($model, "Successfully Delete Resource");
    }
}
