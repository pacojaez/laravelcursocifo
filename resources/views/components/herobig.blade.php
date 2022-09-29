<div class="py-6 bg-white">
    <div class="px-3 mx-auto xl:container sm:px-4 xl:px-2">
        <!-- big grid 1 -->
        <div class="flex flex-row flex-wrap">
            <!--Start left cover-->
            <div class="flex-shrink w-full max-w-full pb-1 lg:w-1/2 lg:pb-0 lg:pr-1">
                <div class="relative overflow-hidden border rounded opacity-50 hover-img max-h-98 hover:opacity-100">
                    <a href="{{ route('bike.show', ['bike' => $bike ])}}">
                        <img class="w-full h-auto max-w-full mx-auto" src="{{ asset($bike->image) }}" alt="Image description">
                    </a>
                    <div class="absolute bottom-0 w-full px-5 pt-8 pb-5 bg-gradient-cover bg-purple-400/60">
                        <a href=" {{ route('bike.show', ['bike' => $bike ])}}">
                            <h2 class="mb-3 text-3xl font-bold text-white capitalize">PRUEBA LA NUEVA YAMAHA XS-1000</h2>
                        </a>
                        <p class="hidden text-gray-100 sm:inline-block">Con un call to Action</p>
                        <div class="pt-2">
                            <div class="text-gray-100">
                                <div class="inline-block h-3 mr-2 border-l-2 border-red-600"></div>Ver
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Start box news-->
            <div class="flex-shrink w-full max-w-full lg:w-1/2">
                <div class="flex flex-row flex-wrap box-one">
                    @foreach ( $bikes as $moto )
                    <article class="flex-shrink w-full max-w-full sm:w-1/2 cursor-pointer">
                        <div class="relative overflow-hidden border rounded opacity-30 hover-img max-h-98 hover:opacity-100 max-h-48">
                            <a href=" {{ route('bike.show', ['bike' => $moto ])}}">
                                <img class="w-full h-auto max-w-full mx-auto" src="{{ asset($moto->image) }}" alt="{{ $moto->marca }}">
                            </a>
                            <div class="absolute bottom-0 w-full px-4 pb-4 bg-purple-200/60 pt-7 bg-gradient-cover">
                                <a href=" {{ route('bike.show', ['bike' => $moto ])}}">
                                    <h2 class="mb-1 text-xl font-bold leading-tight text-gray-900 capitalize">{{ $moto->marca }}{{ $moto->modelo }}</h2>
                                </a>
                                <div class="pt-1">
                                    <div class="text-gray-100 flex flex-row justify-center align-middle">
                                        <div class="inline-block h-3 mr-2 border-l-2 border-red-600"></div>
                                        <h3 class="text-gray-800 h-3 mr-2">{{ $moto->caballos }} CV</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
