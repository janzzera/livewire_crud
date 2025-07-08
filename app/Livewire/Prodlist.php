<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Prodlist extends Component
{
    public function render()
    {  
        return view('livewire.prodlist', [
            'products' => Product::latest()->paginate(5)
        ]);
    }



}
