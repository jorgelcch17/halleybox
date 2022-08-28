<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        $more = $product->subcategory->products->where('id', '!=', $product->id)->take(3);

        return view('products.show', compact('product', 'more'));
    }
}
