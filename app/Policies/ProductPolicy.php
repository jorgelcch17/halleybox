<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function review(User $user, Product $product){
        $reviews = $product->reviews()->where('user_id', $user->id)->count();

        if($reviews){
            return false;
        }

        $orders = Order::where('user_id', $user->id)->where('status', 2)->select('content')->get()->map(function($orders){
            return json_decode($orders->content, true);
        });
    
        $products = $orders->collapse();

        return $products->contains('id', $product->id);
    }
}
