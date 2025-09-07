<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('components.navbar')

    @if (request()->routeIs('dashboard'))
        <div>
            <h1 class="text-center mt-5">Selamat Datang, {{ Auth::user()->name }}</h1>
            <h4 class="text-center">Pilih menu di atas untuk mengelola data pasien dan rumah sakit</h4>
        </div>
    @endif

    <div class="py-4">
        @yield('content')
    </div>
</body>

</html>
