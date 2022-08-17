<div class="flex-1 relative" x-data>
    <form action="{{ route('search') }}" autocomplete="off">
        <x-jet-input name="name" wire:model="search" type="text" class="w-full rounded-full pl-5"
            placeholder="¿Estas buscando algo?"></x-jet-input>
        <button class="absolute top-0 right-0 w-12 h-full bg-sky-500 flex items-center justify-center rounded-r-full">
            <x-search size="35" color="white" />
        </button>
    </form>

    <div class="absolute w-full mt-1 hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow">
            <div class="p-1 md:px-4 md:py-3 space-y-1">
                @forelse($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex items-center p-1 rounded-md justify-between hover:bg-gray-100">
                        <div class="flex">
                            <img class="w-16 h-12 object-cover shadow-sm"
                                src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            <div class="ml-1 md:ml-4 text-gray-700">
                                <p class="text-lg font-semibold leading-5 hover:underline">
                                    {{ $product->name }}
                                </p>
                                <p class="font-semibold">
                                    Categoria: <span
                                        class="font-extralight">{{ $product->subcategory->category->name }}</span>
                                </p>
                            </div>
                        </div>
                        <p>Bs {{ number_format($product->price, 2, '.', ',') }}</p>
                    </a>
                @empty
                    <p class="text-lg leading-5">
                        No existe ningun registro con los parametros especificados
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
