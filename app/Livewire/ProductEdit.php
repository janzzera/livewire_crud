<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    public Product $product;
    public $code = '';
    public $name ='';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public $imageurl;

    #[Title('Edit Product')]
    public function render()
    {
        return view('livewire.product-edit');
    }

    public function updateProduct() {
        $validated = $this->validate([
            'code' => 'required|string|max:50|unique:products,code,'.$this->product->id,
            'name' => 'required|string|max:250',
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required',
            'description' => 'nullable|string',
            'imageurl' => 'image'
        ]);

        $filePath = $this->imageurl->store('file-uploads', 'public');
        $this->imageurl = 'storage/' . $filePath;

        $this->product->update($validated);

        return redirect()->route('productlist');
    }
}
