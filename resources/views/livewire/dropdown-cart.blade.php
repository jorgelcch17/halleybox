<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <a class="pl-3 inline-block no-underline" href="#">
                    <svg class="fill-current hover:text-sky-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                        <circle cx="10.5" cy="18.5" r="1.5" />
                        <circle cx="17.5" cy="18.5" r="1.5" />
                    </svg>
                </a>
                {{-- <x-cart color="black" /> --}}
                @if (Cart::count())
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                @else
                    <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                @endif
            </span>
        </x-slot>

        <x-slot name="content">
{{-- 
            <ul>
                @forelse(Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>

                            <div class="flex">
                                <p>Cant: {{$item->qty}}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: {{__($item->options['color'])}}</p>
                                @endisset
                                @isset($item->options['size'])
                                    <p class="mx-2">{{__($item->options['size'])}}</p>
                                @endisset
                                
                            </div>
                            
                            <p>Bs {{ number_format($item->price, 2,'.',',') }}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700 select-none">
                            No tiene agregado ningun item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            @if(Cart::count())
                <div class="py-2 px-3">
                    <p class="font-bold text-lg text-gray-700 mt-2 mb-3"><span>Total:</span> Bs {{Cart::subtotal()}}</p>

                    <x-button-enlace href="{{route('shopping-cart')}}" color="red" class="w-full">
                        Ir al carrito de compras
                    </x-button-enlace>
                </div>
            @endif --}}

            <div class="flex flex-col p-6 space-y-4 sm:p-2 overflow-y-auto max-h-96">
                <h2 class="text-md font-semibold text-center">Mi Carrito de Compra</h2>
                <hr>      
                <ul class="flex flex-col divide-y divide-gray-300">
                    @forelse(Cart::content() as $item)
                        <li class="flex p-2 border-b border-gray-200">
                            <img class="h-20 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                            <article class="flex-1">
                                <h2 class="text-sm text-gray-700 font-bold">{{ $item->name }}</h2>

                                <div class="flex">
                                    <p class="text-gray-500">cant: {{$item->qty}}</p>
                                    @isset($item->options['color'])
                                        <p class="mx-2">- Color: {{__($item->options['color'])}}</p>
                                    @endisset
                                    @isset($item->options['size'])
                                        <p class="mx-2">{{__($item->options['size'])}}</p>
                                    @endisset
                                    
                                </div>
                                
                                <p class="font-semibold text-right">Bs {{ number_format($item->price, 2,'.',',') }}</p>
                            </article>
                        </li>
                    {{-- <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
                        <div class="flex w-full space-x-2 sm:space-x-4">
                            <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="Polaroid camera">
                            <div class="flex flex-col justify-between w-full pb-4">
                                <div class="flex justify-between w-full pb-2 space-x-2">
                                    <div class="space-y-1">
                                        <h3 class="text-md font-semibold leading-snug sm:pr-8">{{ $item->name }}</h3>
                                        
                                        <div class="flex">
                                            <p>Cant: {{$item->qty}}</p>
                                            @isset($item->options['color'])
                                                <p class="mx-2">- Color: {{__($item->options['color'])}}</p>
                                            @endisset
                                            @isset($item->options['size'])
                                                <p class="mx-2">{{__($item->options['size'])}}</p>
                                            @endisset
                                            
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-semibold">Bs {{ number_format($item->price, 2,'.',',') }}</p>
                                        </div>
                                    </div>
                                </div>
                  
                            </div>
                        </div>
                    </li> --}}
                    @empty

                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700 select-none">
                            No tienes agregado ningun item en el carrito
                        </p>
                    </li>
                    @endforelse

            
                </ul>
            
                @if(Cart::count())
                    <div class="space-y-1 text-right">
                        <p>Monto Total:
                            <span class="font-semibold">Bs {{Cart::subtotal()}}</span>
                        </p>
                        <p class="text-sm text-gray-400">No incluye los costos de envio</p>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <a href="{{route('shopping-cart')}}" class="px-6 py-2 border rounded-md bg-sky-200 hover:bg-sky-300">
                            <span class="sr-only sm:not-sr-only"></span>Ir al carrito de compras
                        </a>
                    </div>
 
                @endif
            
            </div>
         
        </x-slot>
    </x-jet-dropdown>
</div>


