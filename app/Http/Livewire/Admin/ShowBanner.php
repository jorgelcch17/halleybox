<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Banner;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowBanner extends Component
{
    use WithFileUploads;

    public $banners, $bannerAnt, $ban='jorge', $rand;

    public $file, $link;

    protected $listeners = ['sortBanners'];

    public function mount(){
        $this->banners = Banner::orderBy('order', 'asc')->get();
    }

    public function subirImage(Banner $image){
        if($image->order != 1){
            $bannerAnt = Banner::where('order', $image->order-1)->first();
            $bannerAnt->order = $image->order;
            $bannerAnt->save();
            $image->order -= 1;
            $image->save();
        }
        
        $this->getBanners();
    }

    public function bajarImage(Banner $image){
        $BannerUlt = Banner::orderBy('order', 'desc')->first();
        if($image->order != $BannerUlt->order){
            $BannerAux = Banner::where('order', $image->order+1)->first();
            $BannerAux->order = $image->order;
            $image->order += 1;
            $BannerAux->save();
            $image->save();
        }

        $this->getBanners();
    }

    public function getBanners(){
        $this->banners = Banner::orderBy('order', 'asc')->get();
    }

    public function submit(){
        $this->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $url = Storage::put('banners', $this->file);
        $last = Banner::orderBy('order', 'desc')->first();
        if($last){
            Banner::create([
                'url' => $url,
                'redirect_to'=> $this->link,
                'order' => $last->order+1,
            ]);
        }else{
            Banner::create([
                'url' => $url,
                'redirect_to'=> $this->link,
                'order' => 1,
            ]);
        }
        $this->rand = rand();
        $this->reset('link');
        $this->getBanners();
    }

    public function sortBanners($arreglo){
        $position = 1;
        $sorts = $arreglo;

        foreach($sorts as $sort) {
            $banner = Banner::find($sort);
            $banner->order = $position;
            $banner->save();
            $position++;
        }

        $this->getBanners();
    }

    public function delete(Banner $banner){
        Storage::delete($banner->url);

        $banner->delete();

        $this->getBanners();
    }

    public function render()
    {
        return view('livewire.admin.show-banner')->layout('layouts.admin');
    }
}
