<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use App\Models\CourseTrainer;
use App\Models\User;
use DeepCopy\Filter\Filter;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrainersRelationManager extends RelationManager
{
    protected static string $relationship = 'trainers';

    public function form(Form $form): Form
    {

        return $form
            ->schema([
                Section::make()
                    ->schema([


                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\FileUpload::make('image')
                            ->image(),
                        Forms\Components\TextInput::make('email')
                            ->email(),
                        Forms\Components\Textarea::make('social_url')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('biography')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('phone_number')
                            ->tel(),
                        Forms\Components\Toggle::make('is_trainer'),
            ])
                    //         Section::make()->schema([
                    //             FileUpload::make('image')
                    //             ->image()
                    //             ->imagePreviewHeight(320)
                    //             ->directory(('courses')),
                    //         ])
                    //         ->columnSpan(1),
                    //         Section::make()->schema([
                    //             TextInput::make('name')
                    //                     ->label('Trainer Name')
                    //                     ->required(),
                    //             TextInput::make('occupation')
                    //                     ->maxLength(255),
                    //         ])
                    //         ->columnSpan(1),

                    //         TextInput::make('phone')
                    //             ->tel()
                    //             ->maxLength(255),
                    //         Select::make('social_media')
                    //                 ->label('Social Profile')
                    //                 ->options([
                    //                     'linkedin' => 'LinkedIn',
                    //                     'facebook' => 'Facebook',
                    //                     'github' => 'Github',
                    //                     'x' => 'X (Twitter)',
                    //                     'instagram' => 'Instagram',
                    //                     'website' => 'Website',
                    //                 ]),
                    //         TextInput::make('social_url')
                    //                 ->url()
                    //                 ->maxLength(255),
                    // ])
                    // ->columns(2),
            ]);

    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                ImageColumn::make('image')
                    ->circular(),
                TextColumn::make('name')
                    ->label('Trainer Name')
                    ->sortable(),
                TextColumn::make('course.title')
                    ->label('Course'),
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

    // protected $selectedTrainerId;

    // public function mount()
    // {
    //     $trainerId = $this->form->getState()['trainer_id'] ?? null;
    //     if ($trainerId) {
    //         $this->selectedTrainerId = $trainerId;
    //         $this->trainerSelected(Trainer::find($trainerId)->toArray());
    //     }
    // }

    // public function trainerSelected($trainerData)
    // {
    //     // dd($trainerData);
    //     $form = $this->getForm(); // Get the form instance
    //     $form->state($trainerData); // Update form state with trainer data
    // }
}
