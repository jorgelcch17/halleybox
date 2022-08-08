<div x-data="{ activeTab: 1 }">
    <div class="flex justify-center gap-2">
        <a x-on:click="activeTab=1" x-bind:class="activeTab==1 ? 'bg-gray-100 shadow-sm' : ''" class="text-neutral-700 font-bold px-4 py-2 rounded-md cursor-pointer">Descripción</a>
        <a x-on:click="activeTab=2" x-bind:class="activeTab==2 ? 'bg-gray-100 shadow-sm' : ''" class="text-neutral-700 font-bold px-4 py-2 rounded-md cursor-pointer">Reseñas</a>
    </div>
    <div class="bg-gray-100 rounded-md h-64 mt-2 p-2 shadow-sm text-xl" x-show="activeTab==1">
        aqui va ir la descripcion del producto
    </div>
    <div class="bg-gray-100 rounded-md h-64 mt-2 p-2 shadow-sm text-xl" x-show="activeTab==2">
        aqui va ir las reseñas del producto xd
    </div>
</div>
