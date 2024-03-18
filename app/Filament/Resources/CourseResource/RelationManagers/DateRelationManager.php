<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DateRelationManager extends RelationManager
{
    protected static string $relationship = 'Dates';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make() ->label('Course Date')
                    ->schema([
                        Hidden::make('course_id'),
                        DatePicker::make('date')
                            ->displayFormat('d/m/Y')
                            ->nullable(),
                        Select::make('type')
                            ->label('Type of date:')
                            ->options([
                                'start' => 'Start Date',
                                'early_bird_start' => 'Early Bird Start Date',
                                'early_bird_end' => 'Early Bird Deadline',
                                'application_start' => 'Application Sart',
                                'application_end' => 'Application Deadline',
                            ]),
                        TimePicker::make('time')
                        ->datalist([
                            '09:00',
                            '09:30',
                            '10:00',
                            '10:30',
                            '11:00',
                            '11:30',
                            '12:00',
                        ]),
                        TextInput::make('description'),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Dates')
            ->columns([
                Tables\Columns\TextColumn::make('date'),
                Tables\Columns\TextColumn::make('type'),
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
