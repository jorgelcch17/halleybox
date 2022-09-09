<div x-data>
    <p class="text-gray-700 mb-4 dark:text-gray-300"><span class="font-semibold text-lg">Stock disponible:</span> {{ $quantity }}</p>
    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button class="shadow-md" wire:click="decrement" x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" class="dark:text-gray-300 dark:bg-slate-600 dark:border-slate-600">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-700 dark:text-gray-300">{{ $qty }}</span>
            <x-jet-secondary-button class="shadow-md" wire:click="increment" x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled" wire:target="increment" class="dark:text-gray-300 dark:bg-slate-600 dark:border-slate-600">
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-button color="sky" x-bind:disabled="$wire.qty > $wire.quantity" class="w-full shadow-md" wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
