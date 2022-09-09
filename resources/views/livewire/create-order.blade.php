<div class="container py-8 grid lg:grid-cols-2 xl:grid-cols-5 gap-6">
    <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">

        <div class="bg-white dark:bg-slate-900 rounded-lg shadow p-6 dark:text-gray-200">
            <div class="mb-4">
                <x-jet-label class="dark:text-gray-200" value="Nombre de contácto" />
                <x-jet-input type="text" wire:model.defer="contact"
                    placeholder="Ingrese el nombre de la persona que recibira el producto"
                    class="w-full dark:bg-slate-700 dark:border-gray-600 dark:text-gray-200" />
                <x-jet-input-error for="contact" />
            </div>
            <div>
                <x-jet-label value="Telélono de contácto" />
                <x-jet-input type="number" wire:model.defer="phone"
                    placeholder="Ingrese un número de telefono de contácto"
                    class="w-full dark:text-gray-200 dark:bg-slate-700 dark:border-gray-600" />
                <x-jet-input-error for="phone" />
            </div>
        </div>

        <div x-data="{ envio_type: @entangle('envio_type') }">
            <p class="mt-6 mb-3 text-lg text-gray-700 dark:text-gray-200 font-semibold">Envios</p>



            <label class="bg-white dark:bg-slate-900 rounded-lg shadow px-6 py-4 flex items-center mb-4">
                <input x-model="envio_type" type="radio" value="1" name="envio_type"
                    class="text-gray-600 dark:text-sky-500">
                <span class="ml-2 text-gray-700 dark:text-gray-200">
                    Recojo en almacén, Camiri (Barrio San Jose, C/Parapety Esq. el Tunal)
                </span>
                <span class="font-semibold text-gray-700 ml-auto dark:text-gray-200">
                    Gratis
                </span>
            </label>

            <div class="bg-white dark:bg-slate-900 rounded-lg shadow">
                <label class="px-6 py-4 flex items-center">
                    <input x-model="envio_type" type="radio" value="2" name="envio_type"
                        class="text-gray-600 dark:text-sky-500">
                    <span class="ml-2 text-gray-700 dark:text-gray-200">
                        Envío a domicilio
                    </span>
                </label>

                <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': envio_type != 2 }">
                    {{-- departamentos --}}
                    <div>
                        <x-jet-label class="dark:text-gray-300" value="Departamento" />
                        <select class="form-control w-full dark:bg-slate-700 dark:border-gray-600 dark:text-gray-200"
                            wire:model="department_id">
                            <option value="" disabled selected>Seleccione un departamento</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="department_id" />
                    </div>
                    {{-- ciudades --}}
                    <div>
                        <x-jet-label class="dark:text-gray-300" value="Ciudad" />
                        <select class="form-control w-full dark:bg-slate-700 dark:border-gray-600 dark:text-gray-200"
                            wire:model="city_id">
                            <option value="" disabled selected>Seleccione una ciudad</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="city_id" />
                    </div>
                    {{-- distritos --}}
                    <div>
                        <x-jet-label class="dark:text-gray-300" value="Distrito" />
                        <select class="form-control w-full dark:bg-slate-700 dark:border-gray-600 dark:text-gray-200"
                            wire:model="district_id">
                            <option value="" disabled selected>Seleccione un distrito</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="district_id" />
                    </div>

                    <div>
                        <x-jet-label class="dark:text-gray-300" value="Dirección" />
                        <x-jet-input class="w-full dark:bg-slate-700 dark:border-gray-600 dark:text-gray-200"
                            wire:model="address" type="text" />
                        <x-jet-input-error for="address" />
                    </div>

                    <div class="col-span-2">
                        <x-jet-label class="dark:text-gray-300" value="Referencia" />
                        <x-jet-input class="w-full dark:bg-slate-700 dark:border-gray-600 dark:text-gray-200 "
                            wire:model="references" type="text" />
                        <x-jet-input-error for="references" />
                    </div>
                </div>
            </div>
        </div>



    </div>
    <div class="order-1 lg:order-2 relative lg:col-span-1 xl:col-span-2">
        <div class="bg-sky-500 scroll-smooth dark:bg-sky-900 shadow p-6">
            <ul>
                @forelse(Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200 dark:border-gray-500">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">

                        <article class="flex-1">
                            <h2 class="font-bold text-gray-800 dark:text-black">{{ $item->name }}</h2>

                            <div class="flex">
                                <p class="dark:text-gray-200">Cant: {{ $item->qty }}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: {{ __($item->options['color']) }}</p>
                                @endisset
                                @isset($item->options['size'])
                                    <p class="mx-2">{{ __($item->options['size']) }}</p>
                                @endisset

                            </div>

                        </article>
                        <p class="text-white font-semibold">Bs {{ $item->price }}</p>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700 select-none">
                            No tiene agregado ningun item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            <div class="mt-4 mb-3"></div>

            <div class="text-white ">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">{{ Cart::subtotal() }} Bs</span>
                </p>
                <p class="flex justify-between items-center ">
                    Envío
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            Gratis
                        @else
                            {{ number_format($shipping_cost, 2, '.', ',') }} Bs
                        @endif
                    </span>
                </p>
                <hr class="mt-4 mb-3 dark:border-gray-500">
                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                    <span class="font-semibold">
                        @if ($envio_type == 1)
                            {{ Cart::subtotal() }} Bs
                        @else
                            {{ number_format(Cart::subtotalFloat() + $shipping_cost, 2, '.', ',') }} Bs
                        @endif
                    </span>
                </p>
                <div class="flex flex-col">
                    <x-jet-button wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4 bg-sky-800 hover:bg-sky-900 dark:bg-gray-800 dark:hover:bg-gray-900 justify-center"
                        wire:click="create_order">
                        Continuar con la compra
                    </x-jet-button>
                    <hr>
                    <p class="text-sm text-gray-700 mt-2 dark:text-white">
                        Si tiene alguna duda sobre los datos que le solicitamos puede leer nuestras
                        <a href="{{ route('politicasdeprivacidad') }}" target="_blank"
                            class="font-semibold text-orange-600">Políticas de privacidad
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
