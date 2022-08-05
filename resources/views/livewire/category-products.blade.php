<div wire:init="loadPosts">
    @if (count($products))
        <div class="glider-contain relative">
            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <li class="rounded-lg {{ $loop->last ? '' : 'mr-2 sm:mr-4' }}">
                        <article>
                            <figure>
                                <a href="{{ route('products.show', $product) }}">
                                    <img class="w-full aspect-square object-cover object-center"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </a>
                            </figure>
                            <div class="px-1 py-2 flex flex-col justify-between">
                                <h3 class="font-semibold font-sans">
                                    {{-- <a href="{{ route('products.show', $product)}}">{{ Str::limit($product->name, 20) }}</a> --}}
                                    <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="text-neutral-700">Bs {{ $product->price }}</p>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev hidden sm:block">«</button>
            <button aria-label="Next" class="glider-next hidden sm:block">»</button>
            <div role="tablist" class="md:hidden dots"></div>
        </div>
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
