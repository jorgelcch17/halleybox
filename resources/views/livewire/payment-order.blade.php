<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 container py-8">
        <div class="order-2 lg:order-1 xl:col-span-3">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                    Orden-{{ $order->id }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class="grid grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-lg font-semibold uppercase">Envío</p>
                        @if ($order->envio_type == 1)
                            <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                            <p class="text-sm">Calle falsa 123</p>
                        @else
                            <p class="text-sm font-bold">Los productos seran enviados a:</p>
                            <p class="text-sm">{{ $envio->address }}</p>
                            <p>{{ $envio->department }} - {{ $envio->city}} -
                                {{ $envio->district }}</p>
                        @endif
                    </div>
                    <div>
                        <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                        <p class="text-sm"><span class="font-bold">Persona que recibirá el producto:</span> {{ $order->contact }}</p>
                        <p class="text-sm"><span class="font-bold">Telefono de contacto:</span> {{ $order->phone }}</p>
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
                                    <div class="flex">
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
                                    {{ number_format($item->price, 2,'.',',') }} Bs
                                </td>
                                <td class="text-center">
                                    {{ $item->qty }}
                                </td>
                                <td class="text-center">
                                    {{ number_format($item->price * $item->qty,2,'.',',') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="order-1 lg:order-2 xl:col-span-2">
            <div class="bg-white rounded-lg shadow-lg px-6 pt-6">
                <div class=" flex justify-between items-center mb-4">
                    <img class="h-8" src="{{ asset('img/pagos.png') }}" alt="">
                    <div class="text-gray-700">
                        <p class="text-sm font-semibold">
                            Subtotal: {{ number_format($order->total - $order->shipping_cost , 2,'.',',') }} Bs
                        </p>
                        <p class="text-sm font-semibold">
                            Envío: {{ number_format($order->shipping_cost, 2, '.',',') }} Bs
                        </p>
                        <p class="text-lg font-semibold uppercase">
                            Pago: {{ number_format($order->total, 2,'.',',') }} Bs
                        </p>
                    </div>
                </div>

                <div id="paypal-button-container"></div>
            </div>
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 mt-6">
                <p class="text-gray-700 text-sm p-2">Escribemos directamente si buscas otra forma de pago.</p>
                <a class="bg-green-600 py-3 px-5 w-full rounded-sm text-white font-bold text-center text-xl flex items-center justify-center" href="https://wa.me/59175853156" target="_blank"><i class="fa-brands fa-whatsapp mr-2"></i> Contactanos</a>
            </div>
        </div>
    </div>

    @push('script')
        {{-- <script src="https://www.paypal.com/sdk/js?&client-id=<Client-ID>&merchant-id=<Merchant-ID>&currency=USD"></script> --}}
        <script src="https://www.paypal.com/sdk/js?&client-id={{ config('services.paypal.client_id') }}"></script>
        <script>
            paypal.Buttons({

                // Sets up the transaction when a payment button is clicked
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency: "USD",
                                value: "{{ $order->total }}" // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                            }
                        }]
                    });
                },

                // Finalize the transaction after payer approval
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        livewire.emit('payOrder');
                    });
                }
            }).render('#paypal-button-container');
        </script>
    @endpush
</div>
