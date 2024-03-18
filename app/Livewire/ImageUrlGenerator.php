<?php

namespace App\Livewire;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ImageUrlGenerator extends Component
{
    public $model; // Replace with the actual model instance
    public $image;
    public $imageUrl;

    protected string $disk = 'public';
    protected string $directory = 'photos';

    public function updatedImage($value)
    {
        if ($value) {
            $uniqueId = uniqid();
            $extension = $value->getClientOriginalExtension();
            $fileName = time() . '_' . $uniqueId . '.' . $extension;
            $path = $value->storeAs($this->directory, $fileName);

            if ($path) {
                $this->image = $fileName; // Store only the filename for storage
                $this->imageUrl = Storage::disk($this->disk)->url($path);
                $this->saveModel(); // Save the updated URL to the model (explained later)
            }
        } else {
            $this->image = null;
            $this->imageUrl = null;
        }
    }

    public function getFormSchema(): array
    {
        return [
            FileUpload::make('image')
                ->label('Image')
                ->required()
                ->mutateUsing(function ($value) {
                    // Additional image manipulation or validation logic here

                    return $value;
                }),
            TextInput::make('imageUrl')
                ->label('Image URL')
                ->readonly(), // Make the URL field read-only for display
        ];
    }

    private function saveModel()
    {
        // Update the model's attribute with the generated URL
        $this->model->image_url = $this->imageUrl; // Replace with your actual attribute name
        $this->model->save();
    }
    // public function render()
    // {
    //     return view('livewire.image-url-generator');
    // }
}
