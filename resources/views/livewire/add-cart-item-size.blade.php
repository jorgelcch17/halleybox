<div x-data>
    <div>
        <p class="text-xl text-gray-700 dark:text-gray-300">Talla:</p>

        <select wire:model="size_id" class="form-control w-full dark:text-gray-300">
            <option value="" selected disabled>Seleccione una talla</option>

            @foreach($sizes as $size)
                <option value="{{$size->id}}">{{$size->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-2">
        <p class="text-xl text-gray-700">Color:</p>

        <select wire:model="color_id" wire:model="size_id" class="form-control w-full">
            <option value="" selected disabled>Seleccione un color</option>

            @foreach($colors as $color)
                <option value="{{$color->id}}">{{__($color->name)}}</option>
            @endforeach
        </select>
    </div>

    <p class="text-gray-700 my-4"><span class="font-semibold text-lg">Stock disponible:</span>
        @if ($quantity)
            {{ $quantity }}
        @else
            {{ $product->stock }}
        @endif
    </p>

    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button wire:click="decrement" x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" class="dark:text-gray-300 dark:bg-slate-600 dark:border-slate-600">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-700 dark:text-gray-300">{{ $qty }}</span>
            <x-jet-secondary-button wire:click="increment" x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled" wire:target="increment" class="dark:text-gray-300 dark:bg-slate-600 dark:border-slate-600">
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-button x-bind:disabled="!$wire.quantity" color="sky" class="w-full" wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem">
                AGREGAR AL CARRITO DE COMPRAS
            </x-button>
        </div>
    </div>
</div>
