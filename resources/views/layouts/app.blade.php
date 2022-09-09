<!DOCTYPE html>
<html x-data :class="$store.darkMode.on && 'dark'" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MY3ZB4W26R"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-MY3ZB4W26R');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HALLEYBOX | Pedí un deseo!</title>
    <link rel="icon" href="{{ asset('img/logo-negro.svg') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/glide.core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glide.theme.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/glide.min.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css"
        integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">

    {{-- glidejs --}}


    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js"
        integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>
</head>


<body class="font-monse antialiased">
    <h1 class="hidden">HALLEYBOX</h1>
    <x-jet-banner />

    <div class="min-h-screen bg-gray-200 dark:bg-gray-800">
        @livewire('navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <x-footer></x-footer>

    @stack('modals')

    @livewireScripts

    <script>
        function dropdown() {
            return {
                open: false,
                show() {
                    if (this.open) {
                        // se cierra el menu
                        this.open = false;
                        document.getElementsByTagName("html")[0].style.overflow = "auto";
                    } else {
                        // se abre el menu
                        this.open = true;
                        document.getElementsByTagName("html")[0].style.overflow = "hidden";
                    }
                },
                close() {
                    this.open = false;
                    document.getElementsByTagName("html")[0].style.overflow = "auto";
                }
            }
        }
    </script>

    {{-- <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('darkMode', {
                on: false,


                toggle() {

                    this.on = ! this.on
                }

            })

        })
    </script> --}}

    @stack('script')
</body>

</html>
