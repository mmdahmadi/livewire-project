<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function addToCart(Product $product)
    {
        if (\Cart::get($product->id) === null) {
            \Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => 1,
                'associatedModel' => $product
            ]);

            $this->emitTo('cart.header', 'refresh');

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thanks!',
                'text' => 'The product added to cart',
                'icon' => 'success',
                'timer' => 3000,
                'confirmButtonText' => 'OK'
            ]);
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Error!',
                'text' => 'The product has been added to cart',
                'icon' => 'error',
                'timer' => 3000,
                'confirmButtonText' => 'OK'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => Product::all()
        ])->extends('layouts.app')->section('content');
    }
}
