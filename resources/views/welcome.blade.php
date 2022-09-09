<x-app-layout>
    @livewire('banner-home')
    <div class="container pb-8">
        <section>
            <div class="bg-sky-100 dark:bg-sky-900 rounded-b-xl mb-8 px-2 pt-2 pb-4">
                <h2 class="text-lg uppercase text-gray-700 dark:text-gray-300 font-bold">Top categorías</h2>
                @livewire('top-categories')
            </div>
        </section>
        @foreach ($categories as $category)
            @if ($featureds->count())
                <section>
                    <div class="mb-2">
                        <h2 class="text-lg uppercase text-gray-700 dark:text-gray-300 font-bold border-b-2 border-gray-300">Productos destacados</h2>
                    </div>
                    @livewire('featured')
                </section>
            @endif
            {{-- @if ($category->products->count())
                <section class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg uppercase font-semibold text-gray-700">{{ $category->name }}</h2>
                        <a class="text-red-500 hover:text-orange-400 hover:underline ml-2 font-semibold"
                            href="{{ route('categories.show', $category) }}">Ver más <i
                                class="fa-solid fa-angle-right"></i></a>
                    </div>
                    @livewire('category-products', ['category' => $category])
                </section>
            @endif --}}
        @endforeach
    </div>

    @push('script')
        {{-- <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    draggable: true,
                    dragVelocity: 1,
                    autoPlay: true,
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
                });
            });

            new Glide('.glide', {
                type: 'carousel',
                autoplay: 4000,
            }).mount()
        </script> --}}
        <script>
            // Livewire.on('glider', function(id) {
            //     new Glider(document.querySelector('.glider-' + id), {
            //         slidesToShow: 2,
            //         slidesToScroll: 1,
            //         draggable: true,
            //         dragVelocity: 1,
            //         autoPlay: true,
            //         duration: 1,
            //         dots: '.glider-' + id + '~ .dots',
            //         arrows: {
            //             prev: '.glider-' + id + '~ .glider-prev',
            //             next: '.glider-' + id + '~ .glider-next'
            //         },
            //         responsive: [{
            //                 breakpoint: 640,
            //                 settings: {
            //                     slidesToShow: 2.5,
            //                     slidesToScroll: 2,
            //                 }
            //             },
            //             {
            //                 breakpoint: 768,
            //                 settings: {
            //                     slidesToShow: 3.5,
            //                     slidesToScroll: 3,
            //                 }
            //             },
            //             {
            //                 breakpoint: 1024,
            //                 settings: {
            //                     slidesToShow: 4.5,
            //                     slidesToScroll: 4,
            //                 }
            //             },
            //             {
            //                 breakpoint: 1280,
            //                 settings: {
            //                     slidesToShow: 5.5,
            //                     slidesToScroll: 5,
            //                 }
            //             },
            //         ]
            //     });
            // });

            new Glide('.glide', {
                type: 'carousel',
                perView: 1,
                autoplay: 4000,
            }).mount();
        </script>
    @endpush
</x-app-layout>
