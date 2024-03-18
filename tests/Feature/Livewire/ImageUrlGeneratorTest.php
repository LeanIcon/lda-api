<?php

use App\Livewire\ImageUrlGenerator;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ImageUrlGenerator::class)
        ->assertStatus(200);
});
