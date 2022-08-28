<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class PaymentInfoController extends Controller
{
    public function sendPaymentData(Order $order){
        return view('orders.payment_info.create', compact('order'));
    }

    public function paymentStore(Request $request, Order $order){
        $request->validate([
            'file' => 'required|image|max:5120',
            'date' => 'required',
            'time' => 'required',
            'payment_method' => 'required',
            'transaction_number' => 'required|numeric',
        ]);

        // $order->paymentInfo()->create($request->all());
        return redirect()->route('orders.show', $order);
    }
}
