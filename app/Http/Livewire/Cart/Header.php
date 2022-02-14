<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Header extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.cart.header');
    }
}
