<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email, $password;
    public $remember = false;

    protected $rules = [
        'email' => 'required|string|max:255|email',
        'password' => 'required|string|min:8'
    ];

    public function login()
    {
        $this->validate();

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->flash('success', 'You have been successfully login');
            return redirect()->route('home');
        } else {
            session()->flash('error', 'Email and Password are wrong');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
