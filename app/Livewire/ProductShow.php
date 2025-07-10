<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;

class ProductShow extends Component
{
    public Product $product;

    public function mount(Product $product) {
        $this->product = $product;
    }

    #[Title('Show Product')]
    public function render()
    {
        return view('livewire.product-show');
    }
}
