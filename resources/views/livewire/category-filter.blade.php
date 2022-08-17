<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center" x-data>
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>
            <div
                class="hidden md:grid md:grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500 cursor-pointer">
                <i class="fa-solid fa-border-all p-3 {{ $view == 'grid' ? 'text-orange-500' : '' }}"
                    x-on:click="$wire.set('view','grid')"></i>
                <i class="fas fa-list p-3 {{ $view == 'list' ? 'text-orange-500' : '' }}"
                x-on:click="$wire.set('view','list')"></i>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <aside class="flex sm:block sm:col-span-1 bg-gray-50 rounded-md px-3 py-2 h-max">
            <div class="hidden sm:block">
                <h2 class="font-semibold text-center mb-2 uppercase">Subcategorias</h2>
                <ul class="divide-y divide-gray-200">
                    @foreach ($category->subcategories as $subcategory)
                        <li class="py-2 text-sm">
                            <a class="cursor-pointer hover:text-orange-500 capitalize {{ $subcategoria == $subcategory->slug ? 'text-orange-500 font-semibold' : '' }}"
                                wire:click="$set('subcategoria','{{ $subcategory->slug }}')">{{ $subcategory->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <h2 class="font-semibold text-center mt-4 mb-2 uppercase">Marcas</h2>
                <ul class="divide-y divide-gray-200">
                    @foreach ($category->brands as $brand)
                        <li class="py-2 text-sm">
                            <a class="cursor-pointer hover:text-orange-500 capitalize {{ $marca == $brand->name ? 'text-orange-500 font-semibold' : '' }}"
                                wire:click="$set('marca','{{ $brand->name }}')">{{ $brand->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex sm:hidden w-full">
                <select class="flex-1 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500 mr-2" wire:model="subcategoria">
                    <option value="" disabled selected>Subcategoria:</option>
                    @foreach ($category->subcategories as $subcategory)
                        <option value="{{ $subcategory->slug }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
                <select class="flex-1 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500 mr-2" wire:model="marca">
                    <option value="" disabled selected>Marcas:</option>
                    @foreach ($category->brands as $brand)
                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <x-button class="inline-flex justify-center items-center sm:mt-4 sm:w-full" color="red" wire:click="limpiar">
                <i class="fa-solid fa-trash-can"></i>
                <span class="hidden md:inline ml-2">Eliminar filtros</span>
                <span class="hidden sm:inline md:hidden ml-2">Limpiar</span>
            </x-button>
        </aside>
        <div class="sm:col-span-2 lg:col-span-3">
            @if ($view == 'grid')
                <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($products as $product)
                        <li class="rounded-lg">
                            <article>
                                <figure class="aspect-square overflow-hidden">
                                    <a href="{{ route('products.show', $product) }}">
                                        <img class="w-full object-cover object-center transition duration-200 hover:transform hover:scale-105"
                                            src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                    </a>
                                </figure>
                                <div class="px-1 py-2 flex flex-col justify-between">
                                    <h3 class="font-semibold font-sans">
                                        <a class="hover:underline"
                                            href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                    </h3>
                                    <p class="text-neutral-700">Bs {{ number_format($product->price,2,'.',',') }}</p>
                                </div>
                            </article>
                        </li>
                    @empty
                        <li class="col-span-2 md:col-span-4">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Upss!</strong>
                                <span class="block sm:inline">No existe ningun producto con ese filtro.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            @else
                <ul>
                    @forelse ($products as $product)
                        <x-product-list :product="$product" :stars="$product->reviews->avg('rating')"/>
                    @empty
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Upss!</strong>
                            <span class="block sm:inline">No existe ningun producto con ese filtro.</span>
                        </div>
                    @endforelse
                </ul>
            @endif
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    @push('script')
        <script>
            //funcion que al llegar a un ancho de pantalla de 900px o menos, cambia la vista de productos a grid
            window.addEventListener('resize', function() {
                if (window.innerWidth <= 768) {
                    Livewire.emitTo('category-filter','setGrid');
                }
            })
        </script>
    @endpush
</div>
