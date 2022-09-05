<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\PaymentInfo;

class Payment extends Component
{
    public $payments;

    public function mount()
    {
        $this->payments = PaymentInfo::whereHas('order', function($query){
            $query->where('status', '1');
        })->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.admin.payment')->layout('layouts.admin');
    }
}
