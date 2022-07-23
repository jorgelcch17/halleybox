<div x-data>
    <p class="text-xl text-gray-700">Color:</p>

    <select wire:model="color_id" class="form-control w-full">
        <option value="" disabled selected>Seleccionar un color</option>
        @foreach ($colors as $item)
            <option value="{{ $item->id }}">{{ __($item->name) }}</option>
        @endforeach
    </select>

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
                wire:target="decrement">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-700">{{ $qty }}</span>
            <x-jet-secondary-button wire:click="increment" x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled" wire:target="increment">
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-button x-bind:disabled="!$wire.quantity" color="orange" class="w-full" wire:click="addItem"
                wire:loading.attr="disabled" wire:target="addItem">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
