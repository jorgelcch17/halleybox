<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Banner;

class BannerHome extends Component
{
    public $banners;

    public function mount(){
        $this->banners = Banner::orderBy('order', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.banner-home');
    }
}
