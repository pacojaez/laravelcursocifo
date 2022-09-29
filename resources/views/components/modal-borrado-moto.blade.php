<div>
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto">
        <!-- Modal toggle -->
        <button
            class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-reed-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
            type="button" data-modal-toggle="default-modal">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="white">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg> --}}
            <span>BORRAR MOTO</span>
        </button>

        <!-- Main modal -->
        <div id="default-modal" data-modal-show="false" aria-hidden="true"
            class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto h-modal md:h-full top-4 md:inset-0">
            <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <div class="flex flex-col">
                            <h1 class="text-xl font-semibold text-gray-800 ">
                                BORRADO DE LA MOTO ID: {{ $slot }}
                            </h1>
                            <h2 class="text-xl font-light text-gray-600 ">
                                Esta acción es irreversible...o no si usamos SOFTDELETES
                            </h2>

                        </div>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="default-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        {{-- <img class="w-auto rounded-lg" src="{{ asset($bike->image) }}"
                        alt="{{ $bike->marca . '-' . $bike->modelo }}" /> --}}
                        {{-- <form class="mt-5" action={{ route('bike.destroy', ['bike' => $bike]) }}
                            method="POST"> --}}
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="flex justify-end mt-6">
                                <button type="submit"
                                    class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                    PULSA EL BOTÓN ROJO, VOLAMOS HACIA MOSCÚ
                                </button>
                            </div>
                        {{-- </form> --}}
                    </div>
                    <!-- Modal footer -->
                    {{-- <div
                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-toggle="default-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                            accept</button>
                        <button data-modal-toggle="default-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Decline</button>
                    </div> --}}
                </div>
            </div>
        </div>

        <p class="mt-5">This modal element is part of a larger, open-source library of Tailwind CSS
            components. Learn more by going to the official <a class="text-blue-600 hover:underline"
                href="#" target="_blank">Flowbite Documentation</a>.</p>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
</div>
