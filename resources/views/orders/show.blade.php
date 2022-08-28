<x-app-layout>
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-8">
        @if ($paymentinfo)
        <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
            role="alert">
            <span class="font-bold">Usted ya envio datos del pago de esta orden</span> solo realize un nuevo envio en caso de que ubiese introducido un dato erroneo.
        </div>
        @endif
        <div class="bg-white rounded-lg shadow-lg">
            <p class="py-2 px-6 font-bold">Estado de la orden:</p>
            @if ($order->status == 1)
            <div class="px-12 pb-8 mb-6">
                <P class="text-center font-bold text-xl sm:text-2xl text-orange-400">PENDIENTE DE PAGO</P>
            </div>
            @elseif($order->status == 5)
            <div class="px-12 pb-8 mb-6">
                <P class="text-center font-bold text-2xl text-red-600">ANULADO</P>
            </div>
            
            @else
            <div class="flex items-center px-12 pb-8 mb-6">
                <div class="relative">
                    @if ($order->status >= 4)
                        <div
                            class="{{ $order->status == 4 ? 'bg-green-500' : '' }} rounded-full h-12 w-12 flex items-center justify-center">
                            @if ($order->status == 4)
                                <img class="object-center"
                                    src="https://img.icons8.com/metro/24/ffffff/banknotes.png" />
                            @else
                                <i class="fa-solid fa-xmark text-white"></i>
                            @endif
                        </div>
                    @else
                        <div
                            class="{{ $order->status >= 2 ? 'bg-sky-500' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                            @if ($order->status >= 2)
                                <img class="object-center"
                                    src="https://img.icons8.com/metro/24/ffffff/banknotes.png" />
                            @else
                                <i class="fa-solid fa-xmark text-white"></i>
                            @endif
                        </div>
                    @endif
                    <div class="absolute -left-1.5 mt-0.5 flex">
                        <p class="{{ $order->status >= 2 && $order->status != 5 ? 'font-semibold' : '' }}">Pagado
                        </p>
                    </div>
                </div>

                @if ($order->status >= 4)
                    <div
                        class="{{ $order->status == 4 ? 'bg-green-500' : '' }} h-1 flex-1 mx-2">
                    </div>
                @else
                    <div class="{{ $order->status == 3 ? 'bg-sky-500' : 'bg-gray-400' }} h-1 flex-1 mx-2">
                    </div>
                @endif

                <div class="relative">
                    @if ($order->status >= 4)
                        <div
                            class="{{ $order->status == 4 ? 'bg-green-500' : '' }} rounded-full h-12 w-12 flex items-center justify-center">
                            @if ($order->status == 4)
                                <i class="fa-solid fa-truck text-xl text-white"></i>
                            @else
                                <i class="fa-solid fa-xmark text-white"></i>
                            @endif
                        </div>
                    @else
                        <div
                            class="{{ $order->status >= 3 ? 'bg-sky-500' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                            @if ($order->status >= 3)
                                <i class="fa-solid fa-truck text-xl text-white"></i>
                            @else
                                <i class="fa-solid fa-xmark text-white"></i>
                            @endif
                        </div>
                    @endif
                    <div class="absolute -left-1 mt-0.5">
                        <p class="{{ $order->status >= 2 && $order->status != 5 ? 'font-semibold' : '' }}">Enviado
                        </p>
                    </div>
                </div>
                @if ($order->status >= 4)
                    <div
                        class="{{ $order->status == 4 ? 'bg-green-500' : '' }} h-1 flex-1 mx-2">
                    </div>
                @else
                    <div class="bg-gray-400 h-1 flex-1 mx-2">
                    </div>
                @endif
                <div class="relative">
                    @if ($order->status >= 4)
                        <div
                            class="{{ $order->status == 4 ? 'bg-green-500' : '' }} rounded-full h-12 w-12 flex items-center justify-center">
                            @if ($order->status == 4)
                                <i class="fa-solid fa-check text-xl text-white"></i>
                            @else
                                <i class="fa-solid fa-xmark text-white"></i>
                            @endif
                        </div>
                    @else
                        <div class="bg-gray-400 rounded-full h-12 w-12 flex items-center justify-center">
                            {{-- @if ($order->status >= 4)
                            <i class="fa-solid fa-truck text-xl text-white"></i>
                        @else --}}
                            <i class="fa-solid fa-xmark text-white"></i>
                            {{-- @endif --}}
                        </div>
                    @endif
                    <div class="absolute -left-2 mt-0.5">
                        <p class="{{ $order->status >= 2 && $order->status != 5 ? 'font-semibold' : '' }}">
                            Entregado</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center justify-between">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Orden-{{ $order->id }}</p>

            @if ($order->status == 1)
                <div class="absolute top-0 inset-x-0 md:static flex md:block justify-between items-center px-4 sm:px-6 md:px-0 mt-4 md:mt-0">
                    <x-button-enlace class="md:ml-auto" href="{{ route('orders.payment', $order) }}">
                        Ir a pagar
                    </x-button-enlace>
                    <x-button-enlace class="bg-blue-500 hover:bg-blue-600 md:ml-auto" href="{{ route('orders.paymentconfirm', $order) }}">
                        Enviar datos de pago
                    </x-button-enlace>
                </div>
            @endif
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>
                    @if ($order->envio_type == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                        <p class="text-sm">Barrio San Jose Calle Parapety y Calle el Tunal</p>
                    @else
                        <p class="text-sm">Los productos seran enviados a:</p>
                        <p class="text-sm">{{ $envio->address }}</p>
                        <p>{{ $envio->department }} - {{ $envio->city }} -
                            {{ $envio->district }}</p>
                    @endif
                </div>
                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                    <p class="text-sm">Persona que recibirá el producto: {{ $order->contact }}</p>
                    <p class="text-sm">Telefono de contacto: {{ $order->phone }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex items-center">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $item->name }}</h1>
                                        <div class="flex text-xs">
                                            @isset($item->options->color)
                                                Color: {{ __($item->options->color) }}
                                            @endisset
                                            @isset($item->options->size)
                                                - {{ $item->options->size }}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                                {{ number_format($item->price, 2, '.', ',') }} Bs
                            </td>
                            <td class="text-center">
                                {{ $item->qty }}
                            </td>
                            <td class="text-center">
                                {{ number_format($item->price * $item->qty, 2, '.', ',') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
