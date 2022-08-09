<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-24 py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <div>
                <div class="flexslider shadow-md">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="-mt-16 md:mt-0">
                <h1 class="text-2xl font-bold text-neutral-700">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-neutral-700">Marca: <a
                            class="underline capitalize hover:text-orange-500">{{ $product->brand->name }}</a></p>
                    <p class="text-neutral-700 mx-6">{{ round($product->reviews->avg('rating')) }} <i
                            class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a href=""
                        class="text-orange-500 underline hover:text-orange-600">{{ $product->reviews->count() }}
                        reseñas</a>
                </div>

                <p class="text-2xl font-semibold text-neutral-700 my-4">Bs {{ number_format($product->price, 2,'.',',') }}</p>

                <div class="bg-white rounded-lg shadow-md mb-6">
                    <div class="flex p-4 items-center">
                        <span class="flex items-center justify-center h-10 aspect-square rounded-full bg-lime-600">
                            <i class="fas fa-truck text-sm text-white"> </i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-lime-600 leading-none">Se hace envios a domicilio en
                                Camiri, Villamontes, Yacuiba.</p>
                            <p class="text-sm leading-none mt-2">Recibelo el
                                {{ Date::now()->addDay(1)->locale('es')->format('l j F') }} a partir de 18:00 Horas</p>
                        </div>
                    </div>
                </div>

                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif ($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif

            </div>
        </div>

        <x-tab-product :product="$product" />

    </div>
    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                })
                .catch(error => {
                    console.log(error);
                });
        </script>
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
