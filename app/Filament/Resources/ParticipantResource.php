<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipantResource\Pages;
use App\Filament\Resources\ParticipantResource\RelationManagers;
use App\Models\Participant;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParticipantResource extends Resource
{
    protected static ?string $model = Participant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Forms\Components\Select::make('course')
                    ->label('Selected Course')
                    ->relationship('course', 'title'),
                ]),
                Section::make()
                ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email(),
                Forms\Components\TextInput::make('phone_number'),
                Forms\Components\TextInput::make('whatsapp'),
                ])
                ->columns('2'),
                Section::make()
                ->schema([
                    Forms\Components\Select::make('educational_status')
                        ->label('Educational Qualification')
                        ->options([
                            'shs-graduate' => 'High School Graduate',
                            'university-graduate' => 'University Graduate',
                            'others' => 'Others',
                        ]),
                    Forms\Components\Select::make('employment_status')
                        ->label('Occupantional Status')
                            ->options([
                                'employed' => 'Employed',
                                'unemployed' => 'Unemployed',
                                'self-employed' => 'Self Employed',
                                'student' => 'Student',
                            ]),
                    Forms\Components\Select::make('learning_mode')
                        ->label('Learning Mode')
                        ->options([
                            'In_person' => 'In-Person',
                            'virtual' => 'Virtual',
                            'hybrid' => 'Hybrid',
                        ]),
                ])
                    ->columns('3'),
                Section::make() ->label('Regular Price')
                ->schema([
                    Forms\Components\Select::make('info_source')
                    ->label('How did you hear about us?')
                    ->options([
                        'referral' => 'Friend/ Referral',
                        'linkedin' => 'LinkedIn',
                        'research' => 'Research',
                        'facebook' => 'Facebook',
                        'youtube' => 'Youtube',
                        'x' => 'X (Twitter)',
                        'instagram' => 'Instagram',
                        'online-ad' => 'Online Ad',
                        'flyer-brochure' => 'Flyer/ Brochure',
                        'website' => 'Website',
                        'events' => 'Our Events',
                        'office-visit' => 'Office Visit',
                    ]),
                    Forms\Components\Toggle::make('is_student'),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('course.abbreviation'),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageParticipants::route('/'),
        ];
    }
}
