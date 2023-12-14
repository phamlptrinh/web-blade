<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Web1_test') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('asset/js/jquery-ui-1.13.2.custom/jquery-ui.min.css')}}">
        <script src="{{asset('asset/js/code.jquery.com_jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('asset/js/jquery-ui-1.13.2.custom/jquery-ui.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('asset/js/sweetalert2.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('asset/js/index.min.css')}}"/>
        <script src="{{asset('asset/js/index.min.js')}}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
        /* <!-- de script o cuoi de dam bao cac thanh phan script yeu cau da co trong trang --> */
        $( function() {
            $( ".my-datepicker" ).datepicker({
                'dateFormat': 'dd/mm/yy',
                changeMonth: true,
                changeYear: true
            });
        } );
        </script>
        @stack('script')
        @stack('page')
    </body>
</html>
