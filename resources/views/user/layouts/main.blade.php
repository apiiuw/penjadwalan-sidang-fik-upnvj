<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FIK - UPNVJ</title>
    <link rel="icon" href="{{ asset('img/logo/Logo-FIK.png') }}">

    {{-- CDN --}}
    <script src="https://kit.fontawesome.com/d7833bfda5.js" crossorigin="anonymous"></script>

    {{-- ICON --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="antialiased overflow-x-hidden">
    @include('user.partials.navbar')
    @yield('container')
    @include('user.partials.footer')
</body>
</html>