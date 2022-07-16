<div>
    <div class="my-12 bg-white shadow-lg rounded-lg p-6">

        {{-- color --}}
        <div>
            <x-jet-label value="Color" />

            <div class="grid grid-cols-6 gap-6">
                @foreach ($colors as $color)
                    <label>
                        <input wire:model.defer="color_id" type="radio" name="color_id" value="{{ $color->id }}">
                        <span class="ml-2 text-gray-700 capitalize">{{ __($color->name) }}</span>
                    </label>
                @endforeach
            </div>
            <x-jet-input-error for="color_id"></x-jet-input-error>
        </div>

        {{-- cantidad --}}
        <div>
            <x-jet-label>
                Cantidad
            </x-jet-label>
            <x-jet-input class="w-full" wire:model.defer="quantity" type="number" placeholder="Ingrese una cantidad">
            </x-jet-input>
            <x-jet-input-error for="quantity"></x-jet-input-error>
        </div>

        <div class="flex justify-end items-center mt-4">
            <x-jet-action-message class="mr-3" on="saved">
                Agregado
            </x-jet-action-message>
            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Agregar
            </x-jet-button>
        </div>

    </div>

    @if ($product_colors->count())
        <div class="bg-white shadow-lg rounded-lg p-6">
            <table>
                <thead>
                    <tr>
                        <th class="px-4 py-2 w-1/3">Color</th>
                        <th class="px-4 py-2 w-1/3">Cantidad</th>
                        <th class="px-4 py-2 w-1/3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_colors as $product_color)
                        <tr wire:key="product_color-{{ $product_color->pivot->id }}">
                            <td class="capitalize px-4 py-2">
                                {{ __($colors->find($product_color->pivot->color_id)->name) }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $product_color->pivot->quantity }} Unidades
                            </td>
                            <td class="px-4 py-2 flex">
                                <x-jet-secondary-button wire:loading.attr="disabled"
                                    wire:target="edit({{ $product_color->pivot->id }})" class="ml-auto mr-2"
                                    wire:click="edit({{ $product_color->pivot->id }})">
                                    Actualizar
                                </x-jet-secondary-button>
                                <x-jet-danger-button
                                    wire:click="$emit('deletePivot', {{ $product_color->pivot->id }})">
                                    Eliminar
                                </x-jet-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Colores
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>
                    Color
                </x-jet-label>
                <select wire:model="pivot_color_id" class="form-control w-full">
                    <option value="" selected disabled>Seleccione un color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ ucfirst(__($color->name)) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-jet-label>
                    Cantidad
                </x-jet-label>
                <x-jet-input wire:model="pivot_quantity" class="w-full" type="number"
                    placeholder="Ingrese una cantidad"></x-jet-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
