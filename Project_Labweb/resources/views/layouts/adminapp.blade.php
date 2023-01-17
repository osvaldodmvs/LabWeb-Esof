<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Viral VR') }}</title>
    <link rel="shortcut icon" href="{{asset ('favicon.ico')}}" type="image/x-icon">

    <!-- Fonts -->
    
    <link href="/style.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Saira|saira:700|saira:600|saira:500|saira:400|Nunito" rel="stylesheet">
    <link href="//fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">

    <script src='fullcalendar/dist/index.global.js'></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
    @include('includes.header')
    <div class="d-flex">
        <div style="width:288px">
            @yield('sidebar')
        </div>
        <div class="container-md p-3">
            @yield('content')
        </div>
    </div>
    @include('includes.footer')
</body>
</html>
