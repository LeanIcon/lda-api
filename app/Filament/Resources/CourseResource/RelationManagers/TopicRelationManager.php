<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\CourseTopic;
use Filament\Forms\Components\Hidden;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopicRelationManager extends RelationManager
{
    // protected static ?string $model = CourseTopic::class;
    protected static string $relationship = 'Topics';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('topic')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('description')
                ->required()
                ->maxLength(255),
            Hidden::make('course_id'),
            // Forms\Components\Select::make('course_id')
            //     ->relationship('course', 'abbreviation'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('topic')
            ->columns([
                Tables\Columns\TextColumn::make('topic'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('course.abbreviation'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
