<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\User;

class Register extends Component
{
    public $name = '';
    public $password = '';
    public $password2 = '';

    #[Title("Register")]
    public function render()
    {
        return view('livewire.register');
    }

    public function store() {
        $validated = $this->validate([
            'name' => 'required|unique:users,name',
            'password' => 'required|min:7',
            'password2' => 'required|confirmed:password',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        
        User::create([
            'name' => $validated['name'],
            'password' => $validated['password']
        ]);

        return $this->redirectRoute('login', navigate: true);
    }
}
