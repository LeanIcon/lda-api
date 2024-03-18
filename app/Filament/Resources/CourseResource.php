<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function (Set $set, $state) {
                    $set('slug', Str::slug($state));

                // Extract initials for abbreviation
                $initials = array_reduce(
                    explode(' ', $state),
                    function ($carry, $word) {
                        return $carry . strtoupper($word[0]);
                    },
                    ''
                );

                // Validate and set abbreviation
                $abbreviation = Str::limit($initials, 10);
                if (strlen($abbreviation) > 10) {
                    $set('errors', ['abbreviation' => 'Abbreviation cannot exceed 10 characters.']);
                } else {
                    $set('abbreviation', $abbreviation);
                }
            }),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->readOnly(),
            Forms\Components\TextInput::make('abbreviation')
                ->required()
                ->maxLength(10)
                ->readOnly(),
                Forms\Components\Textarea::make('summary')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('featured'),
                Forms\Components\TextInput::make('level'),
                Forms\Components\Select::make('status')
                    ->options([
                        'enabled' => 'Enabled',
                        'disabled' => 'Disabled',
                    ]),
                Forms\Components\TextInput::make('duration'),
                Forms\Components\FileUpload::make('banner')
                    ->image(),
                Forms\Components\FileUpload::make('thumbnail')
                    ->image(),
                Forms\Components\FileUpload::make('badge')
                    ->image(),
                Forms\Components\TextInput::make('brochure'),
                Forms\Components\Select::make('delivery_mode')
                ->label('Delivery Mode')
                    ->options([
                        'In_person' => 'In-Person',
                        'virtual' => 'Virtual',
                        'hybrid' => 'Hybrid',
                    ]),
                // Forms\Components\Select::make('course_trainer_id')
                //     ->relationship(name: 'trainers', titleAttribute: 'name')
                //     ->multiple()
                //     ->preload()
                //     ->pivotData([
                //         'is_trainer' => true,
                //     ]),

                Forms\Components\Select::make('course_trainer_id')
                    ->relationship('trainers', 'name')
                    ->preload()
                    ->searchable(),

                // Other form fields...
                Forms\Components\TextInput::make('tag'),
                Forms\Components\FileUpload::make('cert_sample'),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('badge')
                ->circular()
                ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                    Tables\Columns\ImageColumn::make('thumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('abbreviation')
                    ->searchable(),
                Tables\Columns\IconColumn::make('featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('level')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\DateRelationManager::class,
            RelationManagers\PriceRelationManager::class,
            RelationManagers\ResourceRelationManager::class,
            RelationManagers\CurriculumRelationManager::class,
            // RelationManagers\TrainersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
