<div class="md:-mt-16 max-w-7xl mx-auto md:px-4 sm:px-6 lg:px-24 py-6" x-data="{ activeTab: 1 }">
    <div class="flex justify-center gap-2 mt-8 border-b-2 border-gray-300 pb-2">
        <a x-on:click="activeTab=1" x-bind:class="activeTab == 1 ? 'bg-gray-100 shadow-sm' : ''"
            class="text-neutral-700 font-bold px-4 py-2 rounded-md cursor-pointer">Descripción</a>
        <a x-on:click="activeTab=2" x-bind:class="activeTab == 2 ? 'bg-gray-100 shadow-sm' : ''"
            class="text-neutral-700 font-bold px-4 py-2 rounded-md cursor-pointer">Reseñas</a>
    </div>
    <div class="bg-gray-200 rounded-md p-2 text-base ck-content" x-show="activeTab==1" x-transition.duration.300>
        {!! $product->description !!}
    </div>
    <div class="bg-gray-200 rounded-md text-xl" x-show="activeTab==2" x-transition.duration.300>
        @can('review', $product)
            <form class="bg-gray-200 rounded-md p-4 mt-2" action="{{route('review.store', $product)}}" method="POST">
                @csrf
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full object-cover mr-2" src="{{ Auth::user()->profile_photo_url }}"
                        alt="perfil del usuario logeado">
                        <p>{{ Auth::user()->name}}</p>
                </div>
                <input  placeholder="Agrega una reseña" class="border-gray-300 order-4 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-2 w-full" type="text" name="comment">

                <div class="flex items-center mt-2 order-3" x-data="{ rating: 5 }">
                    <ul class="flex space-x-2">
                        <li x-bind:class="rating >= 1 ? 'text-yellow-500' : ''">
                            <button type="button" class="focus:outline-none" x-on:click="rating = 1">
                                <i class="fas fa-star"></i>
                            </button>
                        </li>
                        <li x-bind:class="rating >= 2 ? 'text-yellow-500' : ''">
                            <button type="button" class="focus:outline-none" x-on:click="rating = 2">
                                <i class="fas fa-star"></i>
                            </button>
                        </li>
                        <li x-bind:class="rating >= 3 ? 'text-yellow-500' : ''">
                            <button type="button" class="focus:outline-none" x-on:click="rating = 3">
                                <i class="fas fa-star"></i>
                            </button>
                        </li>
                        <li x-bind:class="rating >= 4 ? 'text-yellow-500' : ''">
                            <button type="button" class="focus:outline-none" x-on:click="rating = 4">
                                <i class="fas fa-star"></i>
                            </button>
                        </li>
                        <li x-bind:class="rating >= 5 ? 'text-yellow-500' : ''">
                            <button type="button" class="focus:outline-none" x-on:click="rating = 5">
                                <i class="fas fa-star"></i>
                            </button>
                        </li>
                    </ul>
                    <input class="hidden" type="number" name="rating" x-model="rating">

                    <x-jet-button class="ml-auto">Agregar reseña</x-jet-button>
                </div>
            </form>
        @endcan
        @if ($product->reviews->isNotEmpty())
            <div class="text-gray-700">
                <div class="mt-2 grid grid-cols-1 lg:grid-cols-2 gap-2 xl:grid-cols-3">
                    @foreach ($product->reviews as $review)
                        <div class="flex bg-white rounded-md p-2 mb-2 shadow-md">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-full object-cover mr-4"
                                    src="{{ $review->user->profile_photo_url }}" alt="{{ $review->user->name }}">
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-lg">{{ $review->user->name }}</p>
                                <p class="text-sm text-neutral-500">{{ $review->created_at->diffForHumans() }}</p>
                                <div class="text-base">
                                    {!! $review->comment !!}
                                </div>
                            </div>
                            <div>
                                <p>
                                    {{ $review->rating }}
                                    <i class="fas fa-star text-yellow-500"></i>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="p-2">No hay reseñas de este producto.</div>
        @endif
    </div>
</div>
