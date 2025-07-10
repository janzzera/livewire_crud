<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;

class ProductCreate extends Component
{
    public $code = '';
    public $name ='';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public $imageurl = '';

    #[Title('Create Product')]
    public function render()
    {
        return view('livewire.product-create');
    }

    public function storeProduct() {
        $validated = $this->validate([
            'code' => 'required|string|max:50|unique:products,code',
            'name' => 'required|string|max:250',
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required',
            'description' => 'nullable|string',
            'imageurl' => 'image'
        ]);

        Product::create([
            'code' => $this->code,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description,
            'imageurl' => $this->imageurl,
        ]);
    }
}
