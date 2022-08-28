<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\PaymentInfo;

use Livewire\Component;

use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;

class PaymentConfirm extends Component
{
    use WithFileUploads;
    public $order;

   public $file, $date, $time, $payment_method, $transaction_number, $comment = '';

    protected $rules = [
        'file' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'payment_method' => 'required|numeric|min:1|max:3',
        'transaction_number' => 'required|numeric',
    ];

    public function store(){
        $this->validate();
        if($this->order->paymentInfo){
            Storage::disk('public')->delete($this->order->paymentInfo->payment_photo); 
            $this->order->paymentInfo->update([
                'payment_photo' => $this->file->store('paymentConfirm', 'public'),
                'payment_date' => $this->date,
                'payment_time' => $this->time,
                'payment_method' => $this->payment_method,
                'transaction_number' => $this->transaction_number,
                'order_id' => $this->order->id,
                'comment' => $this->comment,
            ]);
        }else{
            PaymentInfo::create([
                'payment_photo' => $this->file->store('paymentConfirm', 'public'),
                'payment_date' => $this->date,
                'payment_time' => $this->time,
                'payment_method' => $this->payment_method,
                'transaction_number' => $this->transaction_number,
                'order_id' => $this->order->id,
                'comment' => $this->comment,
            ]);
        }
        return redirect()->route('orders.show', $this->order);
    }

    public function mount($order)
    {
        $this->order = Order::find($order);
    }

    public function render()
    {
        return view('livewire.payment-confirm')->layout('layouts.app');
    }
}
