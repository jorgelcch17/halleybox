@props(['product', 'stars'])
<li class="bg-white dark:bg-gray-900 rounded-lg mb-4 overflow-hidden">
    <article class="md:flex">
        <figure>
            <img class="h-48 w-48 object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">
        </figure>
        <div class="flex-1 py-4 px-6 flex flex-col">
            <div class="lg:flex justify-between">
                <div class="">
                    <h1 class="text-lg font-semibold text-gray-700 dark:text-gray-300 ">{{ $product->name}}</h1>
                    <p class="font-bold text-gray-700 dark:text-gray-100">Bs {{$product->price}}</p>
                </div>
                <div class="flex items-center">
                    <ul class="flex text-sm">
                        <li class="fas fa-star dark:text-gray-700 {{ $stars > 0? 'text-yellow-400': ''}} mr-1"></li>
                        <li class="fas fa-star dark:text-gray-700 {{ $stars > 1? 'text-yellow-400': ''}} mr-1"></li>
                        <li class="fas fa-star dark:text-gray-700 {{ $stars > 2? 'text-yellow-400': ''}} mr-1"></li>
                        <li class="fas fa-star dark:text-gray-700 {{ $stars > 3? 'text-yellow-400': ''}} mr-1"></li>
                        <li class="fas fa-star dark:text-gray-700 {{ $stars > 4? 'text-yellow-400': ''}} mr-1"></li>
                    </ul>
                    <span class="text-gray-700 text-sm dark:text-gray-300">({{ $product->reviews->count() }})</span>
                </div>
            </div>
            <div class="mt-4 md:mt-auto mb-6 text-right">
                <x-danger-enlace class="bg-sky-500 hover:bg-sky-600 dark:bg-sky-700 dark:hover:bg-sky-800" href="{{ route('products.show', $product)}}">
                    Más información
                </x-danger-enlace>
            </div>
            
        </div>
    </article>
</li>