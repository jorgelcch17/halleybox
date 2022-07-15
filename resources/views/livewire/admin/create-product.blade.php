<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para crear un producto</h1>
    <div class="grid grid-cols-2 gap-6">
        {{-- categoria --}}
        <div>
            <x-jet-label value="Categorías" />
            <select wire:model="category_id" class="w-full form-control">
                <option value="" selected disabled>Seleccione una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="category_id"></x-jet-input-error>
        </div>
        {{-- subcategoria --}}
        <div>
            <x-jet-label value="Subcategorías" />
            <select wire:model="subcategory_id" class="w-full form-control">
                <option value="" selected disabled>Seleccione una subcategoría</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="subcategory_id"></x-jet-input-error>
        </div>
    </div>
    {{-- nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre"></x-jet-label>
        <x-jet-input wire:model="name" class="w-full" type="text" placeholder="Ingrese el nombre del producto">
        </x-jet-input>
        <x-jet-input-error for="name"></x-jet-input-error>
    </div>
    {{-- slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug"></x-jet-label>
        <x-jet-input wire:model="slug" class="w-full bg-gray-200" type="text"
            placeholder="Ingrese el slug del producto" disabled></x-jet-input>
        <x-jet-input-error for="slug"></x-jet-input-error>
    </div>
    {{ $description }}
    {{-- descripcion --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Descripción"></x-jet-label>
            <textarea wire:model="description" class="w-full form-control" rows="4" x-data x-init=" ClassicEditor
                 .create($refs.miEditor).then(function(editor) { editor.model.document.on('change:data', () => { @this.set('description', editor.getData()) }) })
                 .catch(error => {
                     console.error(error);
                 });"
                x-ref="miEditor"></textarea>
        </div>
        <x-jet-input-error for="description"></x-jet-input-error>
    </div>
    
    <div class="grid grid-cols-2 gap-6 mb-4">
        {{-- marca --}}
        <div>
            <x-jet-label value="Marca"></x-jet-label>
            <select class="form-control w-full" wire:model="brand_id">
                <option value="" selected disabled>Seleccione una marca:</option>
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="brand_id"></x-jet-input-error>
        </div>
        {{-- precio --}}
        <div>
            <x-jet-label value="Precio"></x-jet-label>
            <x-jet-input wire:model="price" type="number" class="w-full" step=".01"></x-jet-input>
            <x-jet-input-error for="price"></x-jet-input-error>
        </div>
    </div>

    @if ($subcategory_id)
        @if (!$this->subcategory->color && !$this->subcategory->size)
            <div>
                <x-jet-label value="Cantidad"></x-jet-label>
                <x-jet-input wire:model="quantity" type="number" class="w-full"></x-jet-input>
                <x-jet-input-error for="quantity"></x-jet-input-error>
            </div>
        @endif
    @endif

    <div class="flex mt-4">
        <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
            Crear producto
        </x-jet-button>
    </div>
</div>
