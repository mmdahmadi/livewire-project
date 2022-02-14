<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title, $description, $price, $image;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|integer',
        'image' => 'required|image'
    ];

    public function create()
    {
        $this->validate();

        try {

            $imageName = Carbon::now()->microsecond . '.' . $this->image->extension();
            $this->image->storeAs('images/products', $imageName, 'public');

            Product::create([
                'titlexasxasx' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $imageName,
            ]);

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Thanks!',
                'text' => 'The product created',
                'icon' => 'success',
                'timer' => 3000,
                'confirmButtonText' => 'OK'
            ]);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Error!',
                'text' => 'Error' . $e->getMessage(),
                'icon' => 'error',
                'timer' => 3000,
                'confirmButtonText' => 'OK'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.product.create')->extends('layouts.app')->section('content');
    }
}
