@php ($pagina = Route::currentRouteName())
<nav class="w-full bg-white navbar">
    <div class="px-0 container-lg">
        <div class="flex items-center w-full">
        <a class="ml-0 mr-auto nav-brand" href="{{ url('/')}}">LARABIKES</a>
        <button
            navbar-trigger=""
            class="mb-0 ml-auto mr-0 navbar-trigger lg:hidden xl:hidden"
            type="button"
            aria-controls="navigation"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-trigger-icon">
            <span bar1="" class="mt-1 navbar-trigger-bar"
                ><span class="hidden origin-[10%_10%] rotate-45"></span
            ></span>
            <span bar2="" class="mt-2 bar2 navbar-trigger-bar"></span>
            <span bar3="" class="mt-2 bar3 navbar-trigger-bar"
                ><span
                class="mt-mt-[0.4375rem] hidden origin-[10%_90%] -rotate-45"
                ></span
            ></span>
            </span>
        </button>
        </div>
        <div class="collapse navbar-collapse" navbar-menu="">
            <!-- search bar -->
    <div class="justify-start flex-grow-0 flex-shrink hidden px-2 sm:block">
        <div class="inline-block">
            <div class="inline-flex items-center max-w-full">
                <form action="{{ route('bike.search') }}" method="POST">
                    @csrf
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="marca" id="marca" placeholder="Marca" value="{{ empty($marca)? '': $marca }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <button class="relative flex items-center flex-grow-0 flex-shrink px-1 py-1 pl-2 border rounded-full w-60" type="submit">
                        <div class="flex-grow flex-shrink block overflow-hidden">Start your search</div>
                        <div class="relative flex items-center justify-center w-8 h-8 rounded-full">
                            <svg
                                viewBox="0 0 32 32"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                role="presentation"
                                focusable="false"
                                style="
                                    display: block;
                                    fill: none;
                                    height: 12px;
                                    width: 12px;
                                    stroke: currentcolor;
                                    stroke-width: 5.33333;
                                    overflow: visible;
                                "
                            >
                                <g fill="none">
                                    <path
                                        d="m13 24c6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11 0 6.0751322 4.92486775 11 11 11zm8-3 9 9"
                                    ></path>
                                </g>
                            </svg>
                        </div>
                    </button>
                </form>

            </div>
        </div>
    </div>
    <!-- end search bar -->
        <ul class="navbar-nav">
            <li>
            <a class="nav-link" aria-current="page" href="{{ route('bike.index')}}">
                <i class="mr-2 text-base material-icons opacity-60">bike</i>
                <span class="{{ $pagina == 'bike.index' ? 'underline font-bold': ''}}">NUESTRAS MOTOS</span>
            </a>
            </li>
            <li>
            <a class="nav-link" href="{{ route('bike.create')}}">
                <i class="mr-2 text-base material-icons opacity-60">apps</i>
                <span class="{{ $pagina == 'bike.create' ? 'underline font-bold': ''}}">CREAR MOTO</span>
            </a>
            </li>
            <li class="flex">
                <a class="nav-link" href="{{ route('clearcache')}}">
                    <i class="mr-2 text-base material-icons opacity-60"></i>
                    <span class="{{ $pagina == 'clearcache' ? 'underline font-bold': ''}}">Clear Cache</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="mr-2 text-base fab fa-github opacity-60"></i>
                    <span>Github</span>
                </a>
            </li>
        </ul>
        </div>
    </div>
</nav>
