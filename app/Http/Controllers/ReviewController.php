<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product){
        $request->validate([
            'comment' => 'required|min:5',
            'rating' => 'required|integer|min:1|max:5'
        ]);
        
        // dd('hola mundo');

        $product->reviews()->create([
            'comment' => $request->comment,
            'rating' => $request->rating,
            'user_id' => auth()->id()
        ]);

        session()->flash('flash.banner', 'Tu reseña se agrego con éxito');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}
