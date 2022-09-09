<div class="container py-8">
    <x-table-responsive class="bg-white  rounded-lg shadow-lg p-6 text-gray-700">
        <div class="px-6 py-4 bg-white dark:bg-gray-900 ">
            <h1 class="text-lg font-semibold text-gray-700 dark:text-gray-300">TU CARRITO</h1>
        </div>

        @if (Cart::count())
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-500">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                            Precio
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                            Cantidad
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-500 dark:bg-gray-900">
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover object-center"
                                            src="{{ $item->options->image }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $item->name }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-white">
                                            @if ($item->options->color)
                                                <span>
                                                    Color: {{ __($item->options->color) }}
                                                </span>
                                            @endif

                                            @if ($item->options->size)
                                                <span class="mr-1">-</span>
                                                <span>
                                                    {{ $item->options->size }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500 dark:text-white">
                                    <span>Bs {{ number_format($item->price, 2, '.', ',') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    @if ($item->options->size)
                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                                    @elseif($item->options->color)
                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                    @else
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif
                                </div>
                            </td>
                            <td class="flex flex-row px-6 py-4 whitespace-nowrap  text-sm text-gray-500 ">
                                <div class="text-sm text-gray-500 dark:text-white">
                                    Bs {{ number_format($item->price * $item->qty, 2, '.', ',') }}
                                </div>
                                <a class="ml-6 cursor-pointer hover:text-red-700 text-red-500 "
                                    wire:click="delete('{{ $item->rowId }}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{ $item->rowId }}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4 dark:bg-gray-900 bg-white font-bold text-red-500">
                <a wire:click="destroy" class=" text-sm cursor-pointer hover:underline mt-3 inline-block">
                    <i class="fas fa-trash"></i>
                    Borrar Carrito
                </a>
            </div>
        @else
            <div class="flex flex-col items-center my-4">
                <x-cart />
                <p class="text-lg text-gray-700 dark:text-gray-300 mt-4">Tu carro de compras esta vacío</p>
                <x-button-enlace href="/" class="mt-4 px-16 bg-sky-500 hover:bg-sky-600">
                    Seguir comprando
                </x-button-enlace>
            </div>
        @endif
    </x-table-responsive>

    @if (Cart::count())
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700 dark:text-gray-200">
                        <span class="font-bold text-lg">Total:</span>
                        Bs {{ Cart::subtotal() }}
                    </p>
                </div>
                <div>
                    <x-button-enlace class="bg-sky-500 hover:bg-sky-600 dark:bg-sky-800 dark:hover:bg-sky-900"
                        href="{{ route('orders.create') }}">
                        Continuar
                    </x-button-enlace>
                </div>
            </div>
        </div>
    @endif
</div>
