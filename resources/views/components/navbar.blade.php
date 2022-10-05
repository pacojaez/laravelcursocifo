@php($pagina = Route::currentRouteName())
<nav class="w-full bg-gray-200 navbar ">
    <div class="px-0 container-lg">
        <div class="flex items-center">
            <a class="ml-0 mr-auto nav-brand" href="{{ url('/') }}">LARABIKES</a>
            <button navbar-trigger="" class="mb-0 ml-auto mr-0 navbar-trigger lg:hidden xl:hidden" type="button"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-trigger-icon">
                    <span bar1="" class="mt-1 navbar-trigger-bar"><span
                            class="hidden origin-[10%_10%] rotate-45"></span></span>
                    <span bar2="" class="mt-2 bar2 navbar-trigger-bar"></span>
                    <span bar3="" class="mt-2 bar3 navbar-trigger-bar"><span
                            class="mt-mt-[0.4375rem] hidden origin-[10%_90%] -rotate-45"></span></span>
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse" navbar-menu="">
            <!-- search bar -->
            <x-bike-search />
            <!-- end search bar -->
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" aria-current="page" href="{{ route('bike.index') }}">
                        <i class="mr-2 text-base material-icons opacity-60">article</i>
                        <span class="{{ $pagina == 'bike.index' ? 'underline font-bold' : '' }}">NUESTRAS MOTOS</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('bike.create') }}">
                        <i class="mr-2 text-base material-icons opacity-60">apps</i>
                        <span class="{{ $pagina == 'bike.create' ? 'underline font-bold' : '' }}">CREAR MOTO</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('bike.editLast') }}">
                        <i class="mr-2 text-base material-icons opacity-60">apps</i>
                        <span class="{{ $pagina == 'bike.editLast' ? 'underline font-bold' : '' }}">LAST UPDATED</span>
                    </a>
                </li>
                <li class="flex">
                    <a class="nav-link" href="{{ route('bike.cleanBikeDirectory') }}">
                        <i class="mr-2 text-base material-icons opacity-60"></i>
                        <span class="{{ $pagina == 'cleanBikeDirectory' ? 'underline font-bold' : '' }}">CLEAN BIKES DIR</span>
                    </a>
                </li>
                <li class="flex">
                    <a class="nav-link" href="{{ route('contact') }}">
                        <i class="mr-2 text-base material-icons opacity-60"></i>
                        <span class="{{ $pagina == 'contact' ? 'underline font-bold' : '' }}">CONTACTO</span>
                    </a>
                </li>
                <li class="flex">
                    <a class="nav-link" href="{{ route('testwelcome') }}">
                        <i class="mr-2 text-base material-icons opacity-60"></i>
                        <span class="{{ $pagina == 'testwelcome' ? 'underline font-bold' : '' }}">TEST</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="https://github.com/pacojaez/laravelcursocifo" target="blank">
                        <i class="mr-2 text-base fab fa-github opacity-60"></i>
                        <span>Github</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
