<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Category;

class TopCategories extends Component
{
    public $categories = [];

    public function mount(){
        $this->categories = Category::all()->take(5);
    }

    public function render()
    {
        return view('livewire.top-categories');
    }
}
