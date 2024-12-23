<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index-2.html">
            <span class="align-middle me-3">{{ config('app.name') }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Master</li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>
            @if(auth()->check() && auth()->user()->role == 'admin')
                <li class="sidebar-item {{ request()->routeIs('dashboard.donation.*') ? 'active' : '' }}">
                    <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle" data-feather="heart"></i>
                        <span class="align-middle">Donasi</span>
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item {{ request()->routeIs('dashboard.donation.barang.*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('dashboard.donation.barang.index') }}">Barang</a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('dashboard.donation.uang') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('dashboard.donation.uang') }}">Uang</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ request()->routeIs('dashboard.events.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard.events.index') }}">
                        <i class="align-middle" data-feather="calendar"></i>
                        <span class="align-middle">Event</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('dashboard.child.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard.child.index') }}">
                        <i class="align-middle me-2" data-feather="smile"></i>
                        <span class="align-middle">Data Anak</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('dashboard.feedback.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard.feedback.index') }}">
                        <i class="align-middle me-2" data-feather="message-circle"></i>
                        <span class="align-middle">Data Feedback</span>
                    </a>
                </li>
            @elseif(auth()->check() && auth()->user()->roles->isNotEmpty() && auth()->user()->roles[0]->name == 'rental')
                {{-- Kode untuk pengguna dengan role 'rental' --}}
                <li class="sidebar-item {{ request()->routeIs('rental.cars.*') ? 'active' : '' }}">
                    <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle me-2 fas fa-fw fa-car"></i>
                        <span class="align-middle">Mobil</span>
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse {{ request()->routeIs('rental.cars.*') ? 'show' : '' }}" data-bs-parent="#sidebar">
                        <li class="sidebar-item {{ request()->routeIs('rental.cars.create') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('rental.cars.create') }}">Tambah Mobil</a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('rental.cars.index') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('rental.cars.index') }}">List Mobil</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ request()->routeIs('rental.drivers.*') ? 'active' : '' }}">
                    <a data-bs-target ="#pages-drivers" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle me-2 fas fa-fw fa-users"></i>
                        <span class="align-middle">Sopir</span>
                    </a>
                    <ul id="pages-drivers" class="sidebar-dropdown list-unstyled collapse {{ request()->routeIs('rental.drivers.*') ? 'show' : '' }}" data-bs-parent="#sidebar">
                        <li class="sidebar-item {{ request()->routeIs('rental.drivers.create') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('rental.drivers.create') }}">Tambah Sopir</a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('rental.drivers.index') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('rental.drivers.index') }}">List Sopir</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>