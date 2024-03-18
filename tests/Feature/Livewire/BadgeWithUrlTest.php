<?php

use App\Livewire\BadgeWithUrl;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(BadgeWithUrl::class)
        ->assertStatus(200);
});
