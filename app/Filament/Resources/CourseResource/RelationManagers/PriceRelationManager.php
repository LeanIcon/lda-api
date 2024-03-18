<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Health\Enums\Status;

class PriceRelationManager extends RelationManager
{
    protected static string $relationship = 'Prices';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make() ->label('Regular Price')
                    ->schema([
                        Hidden::make('course_id'),
                        TextInput::make('price')
                            ->numeric(),
                        Select::make('currency')
                            ->options([
                                'GHS' => 'GH₵',
                                'EUR' => 'EUR',
                                'USD' => 'USD',
                            ]),
                        Textarea::make('discription')
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('price') // Use 'price' for record title unless you want something else
            ->columns([
                TextColumn::make('currency')
                    ->label('Currency'),
                TextColumn::make('price')
                    ->label('Price'),
                TextColumn::make('description')
                    ->label('Description'),
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
