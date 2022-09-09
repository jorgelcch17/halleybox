@props(['category'])
<div class="grid grid-cols-4 py-4 pl-2 pr-4">
    <div>
        <p class="text-lg font-bold text-center text-neutral-500 mb-3">Subcategorias</p>

        <ul>
            @isset ($category->subcategories)
                @foreach ($category->subcategories as $subcategory)
                    <li class="hover:bg-white dark:hover:bg-sky-900 dark:rounded-md  hover:shadow-sm transition duration-300">
                        <a href="{{ route('categories.show', $category) . '?subcategoria=' . $subcategory->slug }}"
                            class="text-neutral-500 dark:text-gray-200 inline-block font-medium py-1 px-2">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            @endisset
        </ul>
    </div>
    <div class="col-span-3">
        @isset ($category->image)
            <img class="h-64 w-full ml-2 object-cover object-center shadow-md" src="{{ Storage::url($category->image) }}" alt="">
        @endisset
    </div>
</div>
