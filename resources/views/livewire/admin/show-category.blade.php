<div class="container py-12">
    {{-- Formulario de crear categoria --}}
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva subcategoria
        </x-slot>
        <x-slot name="description">
            Complete la informacion necesaria para poder crear una nueva cateogoria
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1" />
                <x-jet-input-error for="createForm.name"></x-jet-input-error>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Slug
                </x-jet-label>
                <x-jet-input wire:model="createForm.slug" disabled type="text" class="w-full mt-1 bg-gray-100" />
                <x-jet-input-error for="createForm.slug"></x-jet-input-error>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="flex items-center">
                    <p>¿Esta categoría necesita especificar color?</p>
                    <div class="ml-auto">
                        <label>
                            <input wire:model.defer="createForm.color" type="radio" name="color" value="1">
                            Sí
                        </label>
                        <label>
                            <input wire:model.defer="createForm.color" type="radio" name="color" value="0">
                            No
                        </label>
                    </div>
                </div>
                <x-jet-input-error for="createForm.color"></x-jet-input-error>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <div class="flex items-center">
                    <p>¿Esta categoría necesita especificar talla?</p>
                    <div class="ml-auto">
                        <label>
                            <input wire:model.defer="createForm.size" type="radio" name="size" value="1">
                            Sí
                        </label>
                        <label>
                            <input wire:model.defer="createForm.size" type="radio" name="size" value="0">
                            No
                        </label>
                    </div>
                </div>
                <x-jet-input-error for="createForm.size"></x-jet-input-error>
            </div>

        </x-slot>
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Categoria creada
            </x-jet-action-message>
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    {{-- Lista de subcategorias --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de subcategorias
        </x-slot>
        <x-slot name="description">
            Aquí encontrará todas las subcategorias agregadas
        </x-slot>
        <x-slot name="content">
            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td class="py-2">
                                <span href="{{ route('admin.categories.show', $subcategory) }}"
                                    class="uppercase hover:text-blue-600">
                                    {{ $subcategory->name }}
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $subcategory->id }}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer"
                                        wire:click="$emit('deleteSubcategory', '{{ $subcategory->id }}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section>

    {{-- Modal editar --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar subcategoría
        </x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
                    <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />
                    <x-jet-input-error for="editForm.name"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>
                        Slug
                    </x-jet-label>
                    <x-jet-input wire:model="editForm.slug" disabled type="text" class="w-full mt-1 bg-gray-100" />
                    <x-jet-input-error for="editForm.slug"></x-jet-input-error>
                </div>

                <div>
                    <div class="flex items-center">
                        <p>¿Esta categoría necesita especificar color?</p>
                        <div class="ml-auto">
                            <label>
                                <input wire:model.defer="editForm.color" type="radio" name="color" value="1">
                                Sí
                            </label>
                            <label>
                                <input wire:model.defer="editForm.color" type="radio" name="color" value="0">
                                No
                            </label>
                        </div>
                    </div>
                    <x-jet-input-error for="editForm.color"></x-jet-input-error>
                </div>
                <div>
                    <div class="flex items-center">
                        <p>¿Esta categoría necesita especificar talla?</p>
                        <div class="ml-auto">
                            <label>
                                <input wire:model.defer="editForm.size" type="radio" name="size" value="1">
                                Sí
                            </label>
                            <label>
                                <input wire:model.defer="editForm.size" type="radio" name="size" value="0">
                                No
                            </label>
                        </div>
                    </div>
                    <x-jet-input-error for="editForm.size"></x-jet-input-error>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:loading.attr="disabled" wire:target="update" wire:click="update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deleteSubcategory', subcategoryId => {
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "No podras revertir los cambios!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sí, eliminarla!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.show-category', 'delete', subcategoryId);

                        Swal.fire(
                            'Eliminado!',
                            'La subcategoria fue eliminada.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
