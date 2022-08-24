<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Featured;
use Livewire\Component;

use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;

    public $search='';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function destacado($product){
        $product = Product::where('id', $product)->first();
        if($product->featured){
            $destacado = Featured::where('featuredable_id', $product->id);
            $destacado->delete();
        }else{
            Featured::create([
                'featuredable_id' => $product->id,
                'featuredable_type' => Product::class,
            ]);
            // dd($product);
        }

        $this->render();
    }

    public function render()
    {
        $products = Product::where('name', 'like','%'.$this->search.'%')->paginate(10);

        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');
    }
}
