<div class="flex items-center justify-center bg-gray-100">
    <div class="mx-5 overflow-hidden bg-gray-800 rounded-lg shadow-2xl">
        <div id="header-buttons" class="flex px-4 py-3">
            <div class="w-3 h-3 mr-2 bg-red-500 rounded-full"></div>
            <div class="w-3 h-3 mr-2 bg-yellow-500 rounded-full"></div>
            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
        </div>
        <div id="code-area" class="px-4 py-4 mt-1 text-xl text-white">
            {{ $slot }}
        </div>
    </div>
</div>
