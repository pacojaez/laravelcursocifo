<div class="flex flex-col items-center w-full min-h-screen pt-2 bg-gray-100 sm:justify-start sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full px-6 py-2 mt-2 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
