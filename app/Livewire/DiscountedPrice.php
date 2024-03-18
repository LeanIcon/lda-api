<?php

namespace App\Livewire;

use Livewire\Component;

class DiscountedPrice extends Component
{
    public $price;
    public $discount;

    public function getDiscountedPriceAttribute()
    {
        if (!isset($this->price) || !isset($this->discount)) {
            return '-'; // Return "-" if price or discount is missing
        }

        $discountAmount = $this->price * ($this->discount / 100);
        return number_format($this->price - $discountAmount, 2, '.', ',');
    }

    public function mount($price, $discount)
    {
        $this->price = $price;
        $this->discount = $discount;
    }

    public function render()
    {
        return view('livewire.discounted-price');
    }
}
