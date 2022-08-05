<x-app-layout>
    <div class="container py-8">
        {{-- @if ($categories->count()) --}}
            @foreach ($categories as $category)
                @if ($category->products->count())
                    <section class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="text-lg uppercase font-semibold text-gray-700">{{ $category->name }}</h2>
                            <a class="text-red-500 hover:text-orange-400 hover:underline ml-2 font-semibold"
                                href="{{ route('categories.show', $category) }}">Ver más <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                        @livewire('category-products', ['category' => $category])
                    </section>
                @endif
            @endforeach
        {{-- @endif --}}
    </div>

    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    draggable: true,
                    dragVelocity: 1,
                    duration: 1,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5.5,
                                slidesToScroll: 5,
                            }
                        },
                    ]
                    // responsive: [{
                    //         breakpoint: 640,
                    //         settings: {
                    //             slidesToShow: 2.5,
                    //             slidesToScroll: 2,
                    //         }
                    //     },
                    //     {
                    //         breakpoint: 768,
                    //         settings: {
                    //             slidesToShow: 3.5,
                    //             slidesToScroll: 3,
                    //         }
                    //     },
                    //     {
                    //         breakpoint: 1024,
                    //         settings: {
                    //             slidesToShow: 4.5,
                    //             slidesToScroll: 4,
                    //         }
                    //     },
                    //     {
                    //         breakpoint: 1280,
                    //         settings: {
                    //             slidesToShow: 5.5,
                    //             slidesToScroll: 5,
                    //         }
                    //     },
                    // ]
                });
            });
        </script>
    @endpush
</x-app-layout>
