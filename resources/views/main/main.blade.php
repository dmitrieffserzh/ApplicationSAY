<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('main/js/app.js') }}" defer></script>
    <link href="{{ asset('main/css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{-- HEADER --}}
    @include('main.header')

    <div class="container">
        <div class="bg-white rounded shadow">
            <main class="main col-9 px-3 py-4">
                @yield('content')
            </main>
            <aside class="aside col-3">
                @yield('aside')
            </aside>
        </div>
    </div>

    {{-- FOOTER --}}
    @include('main.footer')

</body>
</html>
