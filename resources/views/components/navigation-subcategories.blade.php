@props(['category'])
<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-neutral-500 mb-3">Subcategorias</p>

        <ul>
            @isset ($category->subcategories)
                @foreach ($category->subcategories as $subcategory)
                    <li>
                        <a href="{{ route('categories.show', $category) . '?subcategoria=' . $subcategory->slug }}"
                            class="text-neutral-500 inline-block font-semibold py-1 px-4 hover:text-orage-500">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            @endisset
        </ul>
    </div>
    <div class="col-span-3">
        @isset ($category->image)
            <img class="h-64 w-full object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
        @endisset
    </div>
</div>
