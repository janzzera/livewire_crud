<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class ProductCreate extends Component
{
    #[Title('Create Product')]
    public function render()
    {
        return view('livewire.product-create');
    }
}
