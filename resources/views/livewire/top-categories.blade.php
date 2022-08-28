<div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 md:gap-4 mt-2">
        @foreach ($categories as $category)
            <div class="group relative rounded-xl overflow-hidden shadow-md">
                <div>
                    <img class="w-full aspect-square object-cover object-center" src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-full">
                </div>
                <a href="{{ route('categories.show', $category) }}" class="absolute flex items-center justify-center inset-x-0 bottom-0 group-hover:top-0 bg-black bg-opacity-70">
                    <span class=" font-semibold text-center text-white py-2">{{ $category->name }}</span>
                </a>
            </div>
        @endforeach
    </div>
</div>
