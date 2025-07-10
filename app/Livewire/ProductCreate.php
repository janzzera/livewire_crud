<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;
use Livewire\WithFileUploads;
use Livewire\Features\SupportRedirects\Redirector;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $code = '';
    public $name ='';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public $imageurl;

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
            'imageurl' => 'image',
        ]);

        $filePath = $this->imageurl->store('file-uploads', 'public');
        $this->imageurl = 'storage/' . $filePath;

        Product::create([
            'code' => $this->code,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description,
            'imageurl' => $this->imageurl,
        ]);

        return redirect()->route('productlist');
    }


}
