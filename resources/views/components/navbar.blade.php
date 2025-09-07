<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand me-5" href="{{ route('dashboard') }}">Dashboard</a>

        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('hospitals.*') ? 'active fw-bold text-primary' : '' }}"
                    href="{{ route('hospitals.index') }}">
                    Rumah Sakit
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('patients.*') ? 'active fw-bold text-primary' : '' }}"
                    href="{{ route('patients.index') }}">
                    Pasien
                </a>
            </li>
        </ul>

        <form action="{{ route('logout') }}" method="POST" class="ms-auto">
            @csrf
            <button class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>
