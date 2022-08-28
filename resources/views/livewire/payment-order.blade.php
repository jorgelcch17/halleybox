<div>
    @if (session()->has('message'))
        <div class="absolute top-20 right-10 z-30 flex items-center bg-green-500 rounded-xl shadow-md px-4 py-2 md:px-10 md:py-4 text-white text-semibold" x-data="{ show: true }"  x-init="setTimeout(() => show = false, 5000)"  x-show="show" x-transition.duration.500ms>
            <i class="fa-solid fa-check"></i>
            <div class="ml-2" x-transition.duration.500ms>
                {{ session('message') }}
            </div>
        </div>
    @endif
    <div class="relative grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 container py-8">
        <div class="order-2 lg:order-1 xl:col-span-3">
            <div
                class="absolute top-4 inset-x-0 mx-2 sm:mx-6 lg:static lg:mx-0 bg-white rounded-lg shadow px-6 py-4 mb-6">
                <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                    Orden-{{ $order->id }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <div class="grid grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-lg font-semibold uppercase">Envío</p>
                        @if ($order->envio_type == 1)
                            <p class="text-sm">Los productos deben ser recogidos en nuestro almacén:</p>
                            <p class="text-sm">Barrio San Jose, C/Parapety Esq. el Tunal</p>
                        @else
                            <p class="text-sm font-bold">Los productos seran enviados a:</p>
                            <p class="text-sm">{{ $envio->address }}</p>
                            <p>{{ $envio->department }} - {{ $envio->city }} -
                                {{ $envio->district }}</p>
                        @endif
                    </div>
                    <div>
                        <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                        <p class="text-sm"><span class="font-bold">Persona que recibirá el producto:</span>
                            {{ $order->contact }}</p>
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

        <div class="order-1 lg:order-2 xl:col-span-2 mt-14 lg:mt-0">
            <div class="bg-white rounded-lg shadow px-6 pt-6 pb-2 mb-4">
                <div class=" flex justify-between items-center mb-4">
                    {{-- <img class="h-8" src="{{ asset('img/pagos.png') }}" alt=""> --}}
                    <span class="text-2xl font-bold">Resumen:</span>
                    <div class="text-gray-700">
                        <p class="text-sm ">
                            Subtotal: {{ number_format($order->total - $order->shipping_cost, 2, '.', ',') }} Bs
                        </p>
                        <p class="text-sm ">
                            Envío: {{ number_format($order->shipping_cost, 2, '.', ',') }} Bs
                        </p>
                        <p class="text-lg font-semibold uppercase">
                            Pago: {{ number_format($order->total, 2, '.', ',') }} Bs
                        </p>
                    </div>
                </div>

                {{-- <div id="paypal-button-container"></div> --}}
            </div>

            {{-- <div x-data="accordion" class="w-full max-w-lg mx-auto">
                <div class="w-full bg-white shadow-md">
                    <div x-on:click="selected == 1 ? selected : selected = null" class="flex justify-between items-center shadow-md px-2">
                        <h1 class="font-medium text-gray-800 py-2">Accordion #1</h1>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z" />
                        </svg>
                    </div>
                    <div class="max-h-0 overflow-hidden" x-ref="tab1" :style="selected == 1 ? 'max-height: '+ $refs.tab1.scrollheight+ 'px;':''">
                        <p class="p-2 text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque vero impedit quas quo nihil
                            blanditiis labore, saepe suscipit. Possimus alias, non et nulla eaque suscipit illo a
                            dignissimos tempora mollitia!</p>
                    </div>
                </div>
            </div> --}}

            <div x-data="{ selected: 1 }">
                <ul aria-label="Accordion Control Group Buttons"
                    class="flex flex-col justify-center items-center space-y-1 text-slate-800">
                    <!--Question-->
                    <li class="flex flex-col w-full space-y-1">
                        <button aria-controls="content-1" aria-expanded="true" id="accordion-control-1"
                            @click="selected !== 1 ? selected = 1 : selected = null"
                            class="flex items-center w-full bg-white p-3 rounded-md"
                            :aria-expanded="selected === 1 ? 'true' : 'false'">
                            <span class="mr-auto text-sm"><img class="inline h-6" src="{{ asset('img/pagos.png') }}"
                                    alt=""></span>
                            <svg xmlns="http://www.w3.org/2000/svg" aria-label="chevron"
                                :class="selected === 1 ? 'rotate-180' : ''" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        {{-- <div aria-hidden="true" id="content-5" x-show="selected === 4" class="p-2 text-sm rounded bg-white shadow" :aria-hidden="selected === 2 ? 'false' : 'true'" style="display: none;" x-transition.duration.400> --}}
                        <div aria-hidden="false" x-show="selected === 1" class="p-2 text-sm rounded bg-white shadow"
                            :aria-hidden="selected === 1 ? 'false' : 'true'" style="display: none;"
                            x-transition.duration.400 id="paypal-button-container"><span
                                class="inline-block p-1"><strong>Nota:</strong> pagar a traves de paypal o tarjeta hara
                                que el sistema confirme tu pago de forma inmediata.</span></div>
                        {{-- </div> --}}
                    </li>
                    <!--Question-->
                    <!--Question-->
                    <li class="flex flex-col w-full space-y-1">
                        <button aria-controls="content-2" aria-expanded="false" id="accordion-control-2"
                            @click="selected !== 2 ? selected = 2 : selected = null"
                            class="flex items-center w-full bg-white p-3 rounded-md shadow"
                            :aria-expanded="selected === 2 ? 'true' : 'false'">
                            <span class="mr-auto text-sm"><img class="inline h-6"
                                    src="{{ asset('img/tigo_money.png') }}" alt="">
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" aria-label="chevron"
                                :class="selected === 2 ? 'rotate-180' : ''" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div aria-hidden="true" id="content-2" x-show="selected === 2"
                            class="p-2 text-sm rounded bg-white shadow" :aria-hidden="selected === 2 ? 'false' : 'true'"
                            style="display: none;" x-transition.duration.400>
                            Realiza tu pago a través de tigo money utilizando la siguiente información:
                            <ul class="mt-2">
                                <li>Número de cuenta: <strong>75853156</strong></li>
                                <li>Nombre del titular: <strong>Jorge Luis Condori Chavez</strong></li>
                            </ul>
                        </div>
                    </li>
                    <!--Question-->
                    <!--Question-->
                    <li class="flex flex-col w-full space-y-1">
                        <button aria-controls="content-3" aria-expanded="false" id="accordion-control-3"
                            @click="selected !== 3? selected = 3 : selected = null"
                            class="flex items-center w-full bg-white p-3 rounded-md"
                            :aria-expanded="selected === 3 ? 'true' : 'false'">
                            <span class="mr-auto text-sm"><img class="inline h-6"
                                    src="{{ asset('img/qr_simple.png') }}" alt=""> QR Simple</span>
                            <svg xmlns="http://www.w3.org/2000/svg" aria-label="chevron"
                                :class="selected === 3 ? 'rotate-180' : ''" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div aria-hidden="true" id="content-3" x-show="selected === 3"
                            class="p-2 text-sm rounded bg-white shadow"
                            :aria-hidden="selected === 3 ? 'false' : 'true'" style="display: none;"
                            x-transition.duration.400>
                            Realiza tu pago a través del siguiente QR Simple:
                            <div class="flex justify-center">
                                <img class="w-full aspect-square max-w-lg" src="{{ asset('img/qrsoli.jpeg') }}"
                                    alt="qr soli pagos halleybox">
                            </div>
                            <span class="inline-block my-2 text-red-500">IMPORTANTE: al momento de realizar tu
                                transferencia/depósito debes colocar tu <strong>número de pédido</strong> en el campo de
                                referencia.</span>
                            <span class="inline-block my-2">Tienes <strong>4 horas</strong> para realizar tu pago y
                                enviar los datos de la transacción al correo <span
                                    class="text-blue-500">pagos@halleybox.com</span> o en tu cuenta de halleybox en
                                <strong>(Mis ordenes/enviar datos de pago)</strong></span>
                        </div>
                    </li>
                    <!--Question-->
                    <!--Question-->
                    <li class="flex flex-col w-full space-y-1">
                        <button aria-controls="content-4" aria-expanded="false" id="accordion-control-4"
                            @click="selected !== 4 ? selected = 4 : selected = null"
                            class="flex items-center w-full bg-white p-3 rounded-md"
                            :aria-expanded="selected === 4 ? 'true' : 'false'">
                            <span class="mr-auto text-sm"><img class="inline h-6"
                                    src="{{ asset('img/transferencia.png') }}" alt=""> Deposito/transferencia
                                bancaria</span>
                            <svg xmlns="http://www.w3.org/2000/svg" aria-label="chevron"
                                :class="selected === 4 ? 'rotate-180' : ''" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div aria-hidden="true" id="content-4" x-show="selected === 4"
                            class="p-2 text-sm rounded bg-white shadow"
                            :aria-hidden="selected === 4 ? 'false' : 'true'" style="display: none;"
                            x-transition.duration.400>
                            Realiza tu pago a través de deposito o transferencia utilizando la siguiente información:
                            <ul class="mt-2">
                                <li>Número de cuenta: <strong>0123456789 Moneda Nacional</strong></li>
                                <li>Nombre del titular: <strong>Juan Pérez</strong></li>
                                <li>Banco: <strong>Banco Unión</strong></li>
                            </ul>
                            <span class="inline-block my-2 text-red-500">IMPORTANTE: al momento de realizar tu
                                transferencia/depósito debes colocar tu <strong>número de pédido</strong> en el campo de
                                referencia.</span>
                            <span class="inline-block my-2">Tienes <strong>4 horas</strong> para realizar tu pago y
                                enviar los datos de la transacción al correo <span
                                    class="text-blue-500">pagos@halleybox.com</span> o en tu cuenta de halleybox en
                                <strong>(Mis ordenes/enviar datos de pago)</strong></span>
                        </div>
                    </li>
                    <!--Question-->
                    <!--Question-->
                    <li class="flex flex-col w-full space-y-1 opacity-50">
                        <button disabled aria-controls="content-5" aria-expanded="false" id="accordion-control-5"
                            @click="selected !== 5 ? selected = 5 : selected = null"
                            class="flex items-center w-full bg-white p-3 rounded-md"
                            :aria-expanded="selected === 5 ? 'true' : 'false'">
                            <span class="mr-auto text-sm"><img class="inline h-6"
                                    src="{{ asset('img/nalgas.png') }}" alt=""> Proximamente...</span>
                            <svg xmlns="http://www.w3.org/2000/svg" aria-label="chevron"
                                :class="selected === 5 ? 'rotate-180' : ''" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div aria-hidden="true" id="content-5" x-show="selected === 5"
                            class="p-2 text-sm rounded bg-white shadow"
                            :aria-hidden="selected === 5 ? 'false' : 'true'" style="display: none;"
                            x-transition.duration.400>
                            Proximamente...
                        </div>
                    </li>
                    <!--Question-->

                </ul>
            </div>

            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 mt-6">
                <p class="text-gray-700 text-sm p-2">Puedes ponerte en contacto con nosotros.</p>
                <a class="bg-green-600 py-3 px-5 w-full rounded-sm text-white font-bold text-center text-xl flex items-center justify-center"
                    href="https://wa.me/59175853156" target="_blank"><i class="fa-brands fa-whatsapp mr-2"></i>
                    Contactanos</a>
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
                                currency_code: "USD",
                                value: "{{ number_format($order->total / 7, 2, '.', ',') }}" // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                            }
                        }],
                        payer: {
                            address: {
                                line1: "{{ $order->address }}",
                                city: "{{ $order->city }}",
                                country_code: "BO",
                                postal_code: "00000",
                            },
                        },
                        email_address: "{{ Auth::user()->email }}",
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
