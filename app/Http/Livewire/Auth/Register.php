<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name, $email, $password, $passwordConfirm;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255|email|unique:users',
        'password' => 'required|string|min:8|same:passwordConfirm'
    ];

    public function register()
    {
        $this->validate();

        try {
            User::Create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            session()->flash('success', 'You have been successfully registered');
        } catch (\Exception $e) {
            session()->flash('error', 'Error ...' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
