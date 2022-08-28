<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentInfoController;
use App\Http\Livewire\ShoppingCart;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\PaymentConfirm;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Order;

Route::get('/', WelcomeController::class)->name('home');

Route::get('search', SearchController::class)->name('search');

Route::get('categorias/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('productos/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('carrito-de-compras', ShoppingCart::class)->name('shopping-cart');

Route::middleware(['auth'])->group(function(){
    Route::get('orden/{order}/enviar-datos-de-pago', PaymentConfirm::class)->name('orders.paymentconfirm');
    // Route::post('orden/{order}/store', PaymentConfirm::class)->name('confirmpayment.store');

    Route::get('ordenes', [OrderController::class, 'index'])->name('orders.index');

    Route::get('ordenes/create', CreateOrder::class)->name('orders.create');
    
    Route::get('ordenes/{order}', [OrderController::class, 'show'])->name('orders.show');
    
    Route::get('ordenes/{order}/payment', PaymentOrder::class)->name('orders.payment');

});

Route::post('reviews/{product}', [ReviewController::class, 'store'])->name('review.store');


Route::get('terminos-y-condiciones', function(){
    return view('terminosycondiciones');
})->name('terminosycondiciones');

Route::get('politicas-de-privacidad', function(){
    return view('politicasdeprivacidad');
})->name('politicasdeprivacidad');

Route::get('preguntas-frecuentes', function(){
    return view('preguntasfrecuentes');
})->name('preguntasfrecuentes');

Route::get('login/{driver}', [LoginController::class, 'redirectToProvider']);
// Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', [LoginController::class, 'handleProviderCallback']);
// Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');
