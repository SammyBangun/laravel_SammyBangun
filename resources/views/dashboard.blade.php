<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>

                <!-- Tambahkan link navigasi -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hospitals.index') }}">Rumah Sakit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('patients.index') }}">Pasien</a>
                    </li>
                </ul>

                <form action="{{ route('logout') }}" method="POST" class="ms-auto">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            </div>
        </nav>
    </nav>
    <div class="py-4">
        @yield('content')
    </div>
</body>

</html>
