@php ($pagina = Route::currentRouteName())
<nav class="w-full bg-gray-200 navbar ">
    <div class="px-0 container-lg">
        <div class="flex items-center">
            <a class="ml-0 mr-auto nav-brand" href="{{ url('/')}}">VOLVER A  LARABIKES</a>
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
            <ul class="navbar-nav">
                <li class="flex">
                    <a class="nav-link" href="{{ route('clearcache')}}">
                        <i class="mr-2 text-base material-icons opacity-60"></i>
                        <span class="{{ $pagina == 'clearcache' ? 'underline font-bold': ''}}">Clear Cache</span>
                    </a>
                </li>
                <li>
                <a class="nav-link" aria-current="page" href="{{ route('testMiddleware')}}">
                    <i class="mr-2 text-base material-icons opacity-60">article</i>
                    <span class="{{ $pagina == 'testMiddleware' ? 'underline font-bold': ''}}">TEST MIDDLEWARE</span>
                </a>
                </li>
                <li>
                <a class="nav-link" href="{{ route('testMiddlewareany')}}">
                    <i class="mr-2 text-base material-icons opacity-60">apps</i>
                    <span class="{{ $pagina == 'testMiddlewareany' ? 'underline font-bold': ''}}">Test Middleware Any</span>
                </a>
                </li>
                <li class="flex">
                    <a class="nav-link" href="{{ route('saludar', ['nombre'=>'Paco por default'])}}">
                        <i class="mr-2 text-base material-icons opacity-60"></i>
                        <span class="{{ $pagina == 'saludar' ? 'underline font-bold': ''}}">SALUDAR</span>
                    </a>
                </li>
                <li class="flex">
                    <a class="nav-link" href="{{ route('firefoxrules')}}">
                        <i class="mr-2 text-base material-icons opacity-60"></i>
                        <span class="{{ $pagina == 'firefoxrules' ? 'underline font-bold': ''}}">FIREFOX RULES</span>
                    </a>
                </li>
                <li class="flex">
                    <a class="nav-link" href="{{ route('setcookie')}}">
                        <i class="mr-2 text-base material-icons opacity-60"></i>
                        <span class="{{ $pagina == 'setcookie' ? 'underline font-bold': ''}}">SET COOKIE</span>
                    </a>
                </li>
                <li class="flex">
                    <a class="nav-link" href="{{ route('getcookie')}}">
                        <i class="mr-2 text-base material-icons opacity-60"></i>
                        <span class="{{ $pagina == 'getcookie' ? 'underline font-bold': ''}}">GET COOKIE</span>
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
