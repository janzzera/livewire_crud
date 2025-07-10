<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class Prodlist extends Component
{   
    use WithPagination;

    #[Title('Product List')]
    public function render()
    {  
        return view('livewire.prodlist')->with([
            'products' => Product::latest()->paginate(5),
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        session()->flash('success', 'Product is deleted successfully.');
    }


}
