<?php

namespace App\Filament\Resources\CourseResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\CourseResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = CourseResource::class;


    public function handler(Request $request)
    {
        $id = $request->route('id');

        $model = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $model->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        $transformer = static::getApiTransformer();

        return new $transformer($query);
    }
}
