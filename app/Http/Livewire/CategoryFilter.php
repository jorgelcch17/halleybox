<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;
use Hamcrest\Core\HasToString;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use withPagination;

    protected $listeners = ['setGrid'];

    public $category, $subcategoria='', $marca='';

    public $sorting = '';

    public $view = 'grid';

    protected $queryString = ['subcategoria', 'marca'];

    public function orderAsc(){
        $this->sorting = 'asc';
    }

    public function orderDesc(){
        $this->sorting = 'desc';
    }

    public function limpiar(){
        $this->reset(['subcategoria','marca', 'page', 'sorting']);
    }

    public function updatedSubcategoria(){
        $this->resetPage();
    }
   
    public function updatedMarca(){
        $this->resetPage();
    }

    public function setGrid(){
        $this->view = 'grid';
    }

    public function render()
    {
        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        });
        if($this->subcategoria){
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('slug', $this->subcategoria);
            });
        }
        if($this->marca){
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }
        if($this->sorting != ''){
            $products = $productsQuery->orderBy('price', $this->sorting)->paginate(20);
        }else{
            $products = $productsQuery->paginate(20);
        }
        return view('livewire.category-filter', compact('products'));
    }
}
