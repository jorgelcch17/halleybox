<div class="container py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para editar un producto</h1>

        <form wire:submit.prevent="submit" enctype="multipart/form-data" class="w-full">
            <input type="file" class="form-control" wire:model="file" name="file" id="{{ $rand }}">
            <x-jet-input-error for="file"></x-jet-input-error>

            {{-- input para guardar un link al que va llevar al dar click en la imagen usando livewire --}}
            <input type="text" class="form-control w-full" wire:model="link" name="link">
            <x-jet-input-error for="link"></x-jet-input-error>
            <x-button>Subir</x-button>
        </form>
    </div>

    <x-table-responsive class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
        <div class="px-6 py-4 bg-white">
            <h1 class="text-lg font-semibold text-gray-700">BANNERS</h1>
        </div>

        @if ($banners)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Orden
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Imagen
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="banners">
                    @foreach ($banners as $banner)
                        <tr data-id="{{ $banner->id }}">
                            <td class="px-1 py-2 text-center whitespace-nowrap">
                                <p class="inline-flex justify-center items-center text-xl">{{ $banner->order }}</p>
                            </td>
                            <td class="px-1 py-2 w-max whitespace-nowrap handle cursor-pointer">
                                <img class="h-32" src="{{ Storage::url($banner->url) }}" alt="">
                            </td>
                            <td class="px-1 py-2 whitespace-nowrap">
                                <div class="flex justify-center items-center gap-1">
                                    {{-- <a class="bg-blue-300 px-4 py-2 rounded-md" href="#"><i
                                            class="fa-solid fa-pencil"></i></a> --}}
                                    <a class="bg-neutral-300 p-2 rounded-md" href="#"
                                        wire:click="subirImage({{ $banner }})"><i
                                            class="fa-solid fa-arrow-up"></i></a>
                                    <a class="bg-neutral-300 p-2 rounded-md" href="#"
                                        wire:click="bajarImage({{ $banner }})"><i
                                            class="fa-solid fa-arrow-down"></i></a>
                                    <a class="bg-red-300 px-4 py-2 rounded-md" href="#" wire:click="delete({{$banner}})"><i
                                            class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="flex flex-col items-center my-4">
                <p class="text-lg text-gray-700 mt-4">No existe ningun Banner.</p>
            </div>
        @endif
    </x-table-responsive>

    @push('script')
        <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            new Sortable(banners, {
                handle: '.handle',
                animation: 150,
                ghostClass: 'bg-gray-100',
                store: {
                    set: function(sortable) {
                        const arreglo = sortable.toArray();

                        Livewire.emitTo('admin.show-banner', 'sortBanners', arreglo);
                    }
                }
            });


            Dropzone.options.myAwesomeDropzone = { // camelized version of the `id`
                headers: {
                    'x-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                acceptedFiles: "image/*",
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                // complete: function(file) {
                //     this.removeFile(file);
                // },
                // queuecomplete: function() {
                //     Livewire.emit('refreshProduct');
                // }
            };
        </script>
    @endpush
</div>
