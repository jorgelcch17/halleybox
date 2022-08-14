<div class="mb-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="h-full glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                @foreach ($banners as $banner)
                    <li class="h-72 md:h-96 glide_slide">
                        @if ($banner->redirect_to)
                            <a href="{{ $banner->redirect_to }}">
                                <img class="h-full w-full object-cover object-center"
                                    src="{{ Storage::url($banner->url) }}" alt="">
                            </a>
                        @else
                            <img class="h-full w-full object-cover object-center" src="{{ Storage::url($banner->url) }}"
                                alt="">
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i
                    class="fa-solid fa-angle-left"></i></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i
                    class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>
</div>
