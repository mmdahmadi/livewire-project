<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Index extends Component
{
    public function increment($rowId)
    {
        \Cart::update($rowId, [
            'quantity' => 1
        ]);
    }

    public function decrement($rowId)
    {
        \Cart::update($rowId, [
            'quantity' => -1
        ]);
    }

    public function delete($rowId)
    {
        \Cart::remove($rowId);

        $this->emitTo('cart.header', 'refresh');

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Warning',
            'text' => 'The product deleted from cart',
            'icon' => 'warning',
            'timer' => 3000,
            'confirmButtonText' => 'OK'
        ]);
    }

    public function clearCart()
    {
        \Cart::clear();

        $this->emitTo('cart.header', 'refresh');

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Warning',
            'text' => 'Cart is empty',
            'icon' => 'warning',
            'timer' => 3000,
            'confirmButtonText' => 'OK'
        ]);
    }

    public function render()
    {
        return view('livewire.cart.index')->extends('layouts.app')->section('content');
    }
}
