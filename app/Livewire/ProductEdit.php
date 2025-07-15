<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;

class ProductEdit extends Component
{
    use WithFileUploads;
    public Product $product;
    public $code = '';
    public $name ='';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public $imageurl;

    public function mount(Product $product) {
        $this->product = $product;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->imageurl = $product->imageurl;
    }

    #[Title('Edit Product')]
    public function render()
    {
        return view('livewire.product-edit');
    }

    public function updateProduct() {
        $rules = [
            'code' => 'required|string|max:50|unique:products,code,'.$this->product->id,
            'name' => 'required|string|max:250',
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required',
            'description' => 'nullable|string',
        ];
        if ($this->imageurl instanceof TemporaryUploadedFile) {
            $rules['imageurl'] = 'image';
        }

        $validated = $this->validate($rules);

        if(!($this->imageurl === $this->product->imageurl)) {
            $filePath = $this->imageurl->store('file-uploads', 'public');
            $validated['imageurl'] = 'storage/' . $filePath;
        }
        
        $this->product->update($validated);

        return $this->redirectRoute('productlist', navigate: true);
    }
}
