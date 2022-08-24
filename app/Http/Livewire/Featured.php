<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Featured as Feat;
use App\Models\Product;


class Featured extends Component
{
    public $products = [];

    public function loadFeatured(){
        $this->products = Product::has('featured')->get();

        $this->emit('glider', 'featured');
    }

    public function render()
    {
        // $products = Product::has('featured')->get();
        return view('livewire.featured');
    }
}
