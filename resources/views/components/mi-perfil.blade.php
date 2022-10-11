<div class="mb-4">
    <div class="bg-gray-100">
        <section>
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-5 mx-auto">
                    <div
                        class="flex flex-col items-center p-5 mx-auto mb-10 bg-white border-b border-gray-200 rounded-lg sm:flex-row">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-20 h-20 sm:w-32 sm:h-32 sm:mr-10">
                            <img
                                src="{{ asset('img/components/logolarabikes.png')}}" alt="logoLarabikes"/>
                        </div>
                        <div class="flex-grow mt-6 text-center sm:text-left sm:mt-0">
                            <h1 class="mb-2 text-2xl font-bold text-black title-font">{{ $user->name }}</h1>
                            <p class="text-base leading-relaxed">{{ $user->email }}</p>
                            <div class="py-4">
                                <div class="inline-block mr-2 ">
                                    <div class="flex items-center h-full pr-2">
                                        <svg class="w-6 h-6 mr-1 text-yellow-500" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="9" />
                                            <path d="M9 12l2 2l4 -4" />
                                        </svg>
                                        <p class="font-medium title-font">CIUDAD: {{ $user->ciudad}} </p>
                                    </div>
                                </div>
                                <div class="inline-block mr-2 ">
                                    <div class="flex items-center h-full pr-2">
                                        <svg class="w-6 h-6 mr-1 text-yellow-500" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="9" />
                                            <path d="M9 12l2 2l4 -4" />
                                        </svg>
                                        <p class="font-medium title-font">PROVINCIA: {{ $user->provincia }}</p>
                                    </div>
                                </div>
                                <div class="inline-block mr-2 ">
                                    <div class="flex items-center h-full pr-2">
                                        <svg class="w-6 h-6 mr-1 text-gray-500" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <line x1="15" y1="9" x2="9" y2="15" />
                                            <line x1="9" y1="9" x2="15" y2="15" />
                                        </svg>
                                        <p class="font-medium title-font">NACIMIENTO: {{ $user->nacimiento }}</p>
                                    </div>
                                </div>
                                <div class="inline-block mr-2 ">
                                    <div class="flex items-center h-full pr-2">
                                        <svg class="w-6 h-6 mr-1 text-gray-500" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <line x1="15" y1="9" x2="9" y2="15" />
                                            <line x1="9" y1="9" x2="15" y2="15" />
                                        </svg>
                                        <p class="font-medium title-font">PHONE:  {{ $user->telefono }}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="font-bold text-gray-800 md:flex">
                                <div class="flex w-full space-x-3 md:w-1/2">
                                    <div class="w-1/2">
                                        <h2 class="text-gray-500">Title</h2>
                                        <p>description</p>
                                    </div>
                                    <div class="w-1/2">
                                        <h2 class="text-gray-500">Title</h2>
                                        <p>description</p>
                                    </div>
                                </div>
                                <div class="flex w-full space-x-3 md:w-1/2">
                                    <div class="w-1/2">
                                        <h2 class="text-gray-500">Title</h2>
                                        <p>description</p>
                                    </div>
                                    <div class="w-1/2">
                                        <h2 class="text-gray-500">Title</h2>
                                        <p>description</p>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <a class="inline-flex items-center mt-3 text-indigo-500">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                    viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
</div>
