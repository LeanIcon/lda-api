<?php
namespace App\Filament\Resources\TestimonyResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\TestimonyResource;

class CreateHandler extends Handlers {
    public static bool $public = true;
    public static string | null $uri = 'create/';
    public static string | null $resource = TestimonyResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    public function handler(Request $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}
