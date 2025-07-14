<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $name;
    public $password;

    #[Title('Login')]
    public function render()
    {
        return view('livewire.login');
    }

    public function authenticate() {
        $validated = $this->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['name' => $validated['name'], 'password' => $validated['password']])) {
            session()->regenerate();

            return $this->redirectRoute('productlist', navigate: true);
        }
        
        $this->addError('name',  'Invalid credentials!');
    }
    
}
