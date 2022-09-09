<header x-data="dropdown()" class="bg-white dark:bg-gray-900 sticky top-0" style="z-index: 900">

    <div class="container flex items-center h-16 justify-between md:justify-start">
        {{-- boton de categorias --}}
        <a :class="{ 'bg-opacity-100 text-neutral-700 ': open }" x-on:click="show()"
            class="flex flex-col items-center justify-center px-6 md:px-4 order-last md:order-first bg-gray-200 dark:bg-gray-800  bg-opacity-25 text-black cursor-pointer fornt-semibold h-full hover:text-sky-500 dark:text-gray-300 dark:hover:text-sky-600">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="select-none text-sm hidden md:block">Categorias</span>
        </a>
        <a href="/" class="flex items-center md:mx-6">
            {{-- <x-jet-application-mark class="block h-9 w-auto"/> --}}
            {{-- <img src="https://img.icons8.com/material-outlined/24/ffffff/asteroid.png"/> --}}
            {{-- <img class="h-6 w-6" src="{{ asset('img/logo-negro.svg') }} " alt="logo de halleybox"> --}}

            <svg class="w-6 h-6 text-white" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="100%" viewBox="0 0 480 480" enable-background="new 0 0 480 480" xml:space="preserve">
                <path class="fill-black dark:fill-white" opacity="1.000000" stroke="none" 
                                d="
                            M226.000000,481.000000 
                                C191.312439,481.000000 156.624878,481.000000 121.210785,480.765442 
                                C119.577553,480.130768 118.691795,479.672180 117.761116,479.339111 
                                C88.058189,468.708923 58.304214,458.218933 28.665644,447.412384 
                                C15.480567,442.604950 7.085745,432.916779 2.710762,419.660400 
                                C2.192419,418.089813 1.572717,416.552643 1.000004,415.000000 
                                C1.000000,355.312439 1.000000,295.624878 1.117232,235.132294 
                                C3.505075,228.246597 6.270762,222.470078 9.695787,216.885590 
                                C25.746841,190.714401 48.198078,170.668854 71.699883,151.671265 
                                C114.448204,117.115799 161.032990,88.300713 208.640488,61.076176 
                                C223.959656,52.315845 239.447739,43.837257 255.042969,35.578003 
                                C265.518463,30.030159 276.053894,34.619835 279.751495,45.798706 
                                C280.482361,48.008194 281.179565,50.228844 281.887939,52.445740 
                                C285.599884,64.062172 283.634064,63.242599 295.518768,59.134102 
                                C355.268372,38.478889 415.254547,18.561874 476.000000,1.000000 
                                C477.656342,1.000000 479.312653,1.000000 481.000000,1.000000 
                                C481.000000,22.687551 481.000000,44.375118 480.850616,66.853783 
                                C480.272614,68.725090 479.783722,69.785660 479.424194,70.888390 
                                C471.738953,94.459908 464.171906,118.070564 456.363586,141.601181 
                                C449.392548,162.608688 442.243835,183.558640 434.965973,204.461716 
                                C433.550476,208.527161 434.152344,210.611908 438.507385,211.677994 
                                C442.863281,212.744247 447.138672,214.194687 451.370880,215.697647 
                                C457.528107,217.884232 461.328003,222.229462 462.302368,228.763885 
                                C463.047302,233.759949 461.426208,238.224594 459.098236,242.604904 
                                C441.266113,276.157898 422.561615,309.209412 402.395630,341.419800 
                                C382.397278,373.362427 361.175690,404.435150 336.936493,433.368835 
                                C330.994110,440.462128 323.834259,445.546997 315.123352,448.628784 
                                C292.993469,456.457947 270.861938,464.285400 248.809784,472.329468 
                                C241.172501,475.115326 233.186768,477.021118 226.000000,481.000000 
                            M150.702957,196.350357 
                                C121.083725,206.917374 91.468010,217.494293 61.843857,228.047501 
                                C45.249485,233.959030 37.134232,245.099426 37.105652,262.638611 
                                C37.037792,304.282501 37.048847,345.926666 37.122635,387.570557 
                                C37.155136,405.913147 44.792648,416.613098 62.213650,422.916870 
                                C95.074791,434.807648 127.970810,446.602020 160.836319,458.480743 
                                C168.997253,461.430359 177.050903,461.414215 185.227875,458.475830 
                                C218.119080,446.656433 251.051208,434.950897 283.945831,423.140961 
                                C300.947754,417.036865 309.529572,404.838348 309.583221,386.181213 
                                C309.699677,345.703522 309.684021,305.225098 309.591003,264.747284 
                                C309.547363,245.745682 301.240234,234.155960 283.433655,227.772263 
                                C253.674881,217.103653 223.919724,206.424103 194.114807,195.885529 
                                C186.948959,193.351807 179.978516,189.966263 172.008530,190.344284 
                                C164.673248,190.692169 158.210632,193.877243 150.702957,196.350357 
                            z"/>
                <path class="fill-black dark:fill-white" opacity="1.000000" stroke="none" 
                            d="
                        M250.232101,400.376953 
                            C230.187180,407.518372 210.519089,414.552246 191.071472,421.507294 
                            C189.178009,419.021637 189.652405,416.956757 189.650177,415.025940 
                            C189.615891,385.214691 189.722397,355.402740 189.522583,325.592804 
                            C189.492706,321.134064 191.057999,319.156097 195.125046,317.724548 
                            C220.238068,308.885406 245.264740,299.801117 270.340454,290.855316 
                            C271.997559,290.264130 273.691010,289.203094 275.663025,290.100342 
                            C276.785706,291.721130 276.349396,293.611389 276.350922,295.394623 
                            C276.376648,325.372437 276.268646,355.350922 276.463257,385.327484 
                            C276.492188,389.782013 275.031891,391.892670 270.857605,393.168030 
                            C264.022827,395.256195 257.350037,397.874634 250.232101,400.376953 
                        z"/>
                <path class="fill-black dark:fill-white" opacity="1.000000" stroke="none" 
                        d="
                    M242.934921,266.106506 
                        C221.431183,273.805054 200.276550,281.317657 179.168167,288.958038 
                        C175.420731,290.314484 171.963821,290.711334 168.064407,289.303894 
                        C140.222275,279.254578 112.321503,269.367706 84.442696,259.419891 
                        C83.063187,258.927643 81.558250,258.623444 80.588455,257.241913 
                        C81.098579,255.204193 83.027290,255.201508 84.463593,254.685501 
                        C112.327896,244.674866 140.223297,234.750595 168.071259,224.694916 
                        C171.577179,223.428955 174.773712,223.491913 178.233994,224.735291 
                        C206.094666,234.746429 233.986832,244.669815 261.863251,254.637161 
                        C263.223969,255.123703 264.770203,255.377182 265.885468,257.454803 
                        C258.609528,261.119690 250.739990,263.016541 242.934921,266.106506 
                    z"/>
            </svg>

            <span class="font-bold text-black dark:text-white ml-2">HALLEY<span class="text-sky-500">BOX</span></span>
        </a>

        <div class="flex-1 hidden md:block">@livewire('search')</div>

        {{-- dark mode --}}
        <div class="px-4">
            <button x-data @click="$store.darkMode.toggle()" class="inline-block no-underline" href="#">
                <svg class="w-6 h-6 text-gray-800 hover:text-sky-500 stroke-2 dark:text-gray-200 dark:hover:text-sky-500"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-with="4"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">

                    </path>
                </svg>
            </button>
        </div>
        <div class="mx-6 relative hidden md:block ">

            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        {{-- @if (Laravel\Jetstream\Jetstream::managesProfilePhotos()) --}}
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">

                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->photo_url() }}"
                                alt="{{ Auth::user()->name }}" />
                            {{-- <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> --}}
                        </button>
                        {{-- @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif --}}
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            Administrar cuenta
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('orders.index') }}">
                            Mis ordenes
                        </x-jet-dropdown-link>

                        @role('admin')
                            <x-jet-dropdown-link href="{{ route('admin.index') }}">
                                Panel administrador
                            </x-jet-dropdown-link>
                        @endrole
                        {{-- @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif --}}

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <a class="inline-block no-underline" href="#">
                            <svg class="fill-current hover:text-sky-500 dark:text-white dark:hover:text-sky-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <circle fill="none" cx="12" cy="7" r="3" />
                                <path
                                    d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                            </svg>
                        </a>
                        {{-- <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i> --}}
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>

        <div class="hidden md:block">@livewire('dropdown-cart')</div>
    </div>

    <nav id="navigation-menu" :class="{ 'block': open, 'hidden': !open }" x-show="open"
        class="bg-neutral-700 bg-opacity-25 w-full absolute hidden">
        {{-- Menu computadora --}}
        <div class="container h-full hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white dark:bg-gray-700 ">
                    @foreach ($categories as $category)
                        <li
                            class="navigation-link text-neutral-500 dark:text-gray-200 hover:bg-gray-100 dark:bg-gray-700 hover:text-neutral-700 transition duration-300 dark:hover:bg-sky-900 dark:rounded-md dark:transition dark:duration-300">
                            <a href="{{ route('categories.show', $category) }}"
                                class="py-2 px-4 text-sm flex items-center justify-between">
                                <div class="flex justify-center">
                                    <span class="flex justify-center w-9">
                                        {!! $category->icon !!}
                                    </span>
                                    {{ $category->name }}
                                </div>
                                <i class="fa-solid fa-angle-right"></i>
                            </a>

                            <div
                                class="navigation-submenu bg-gray-100 dark:bg-gray-800 absolute h-full w-3/4 right-0 top-0 hidden">
                                <x-navigation-subcategories :category="$category"></x-navigation-subcategories>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100 dark:bg-gray-900">
                    <x-navigation-subcategories :category="$categories->first()"></x-navigation-subcategories>
                </div>
            </div>
        </div>

        {{-- Menu Mobile --}}
        <div class="bg-white dark:bg-slate-900  h-full overflow-y-auto">
            <div class="container bg-gray-200 dark:bg-gray-900 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-neutral-500 hover:bg-sky-500 hover:text-white dark:text-gray-300 dark:hover:bg-sky-700">
                        <a href="{{ route('categories.show', $category) }}"
                            class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="text-neutral-500 px-6 py-2 dark:text-gray-300">
                USUARIOS
            </p>
            @livewire('cart-mobil')

            @auth
                <a href="{{ route('profile.show') }}"
                    class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-sky-500 hover:text-white dark:text-gray-300 dark:hover:bg-sky-700">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-address-card"></i>
                    </span>
                    Perfil
                </a>
                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href=""
                    class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-sky-500 hover:text-white dark:text-gray-300 dark:hover:bg-sky-700">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </span>
                    Cerrar sesion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="post" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-sky-500 hover:text-white dark:text-gray-300 dark:hover:bg-sky-700">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-circle-user"></i>
                    </span>
                    Iniciar sesion
                </a>
                <a href="{{ route('register') }}"
                    class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-sky-500 hover:text-white dark:text-gray-300 dark:hover:bg-sky-700">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-fingerprint"></i>
                    </span>
                    Registrate
                </a>
            @endauth
        </div>
    </nav>
    @push('script')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('darkMode', {
                    on: Alpine.$persist(false).as('darkMode_on'),


                    toggle() {

                        this.on = !this.on
                    }

                })

            })
        </script>
    @endpush
</header>
