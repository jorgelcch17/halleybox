<div wire:init="loadFeatured">
    @if (count($products))
                <div  class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2 md:gap-4">
                    @foreach ($products as $product)
                            <article class="bg-white h-full flex flex-col rounded-lg overflow-hidden">
                                <figure class="aspect-square overflow-hidden">
                                    <a href="{{ route('products.show', $product) }}">
                                        <img class="w-full object-cover object-center"
                                            src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                    </a>
                                </figure>
                                <div class="flex-1 px-1 py-2 text-center">
                                    <h3 class="font-semibold text-lg leading-5">
                                        <a class="hover:underline line-clamp-2 overflow-hidden" href="{{ route('products.show', $product) }}">hola mudno {{ $product->name }}</a>
                                    </h3>
                                    <p class="text-neutral-700 py-1">Bs {{ number_format($product->price, 2,'.',',') }}</p>
                                </div>
                                <a href="#" class="inline-block w-full bg-gray-700 hover:bg-green-600 text-white py-2 text-center uppercase font-medium">
                                    Pedir
                                    <i class="fa-brands fa-whatsapp ml-1"></i>
                                </a>
                            </article>
                    @endforeach
                </div>
            <button aria-label="Previous" class="glider-prev hidden sm:block">«</button>
            <button aria-label="Next" class="glider-next hidden sm:block">»</button>
            <div role="tablist" class="md:hidden dots"></div>
    @else
        <div class="mb-4 container flex items-center justify-center h-48 bg-white shadow-xl border border-gray-200">
            <button type="button"
                class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white bg-orange-500 hover:bg-indigo-400 transition ease-in-out duration-150 cursor-not-allowed"
                disabled="">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Cargando...
            </button>
        </div>
    @endif

</div>
