<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('mazer/images/logo/logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block">
                    <i class="bi bi-x bi-middle"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            {{-- Dashboard --}}
            <li class="sidebar-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}" class="sidebar-link">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Master --}}
            <li class="sidebar-item {{ request()->is('master*') ? 'active' : '' }}">
                <a href="{{ url('/master') }}" class="sidebar-link">
                    <i class="bi bi-folder-fill"></i>
                    <span>Master</span>
                </a>
            </li>

            {{-- Transaksi --}}
            <li class="sidebar-item {{ request()->is('transaksi*') ? 'active' : '' }}">
                <a href="{{ url('/transaksi') }}" class="sidebar-link">
                    <i class="bi bi-cash-stack"></i>
                    <span>Transaksi</span>
                </a>
            </li>
        </ul>
    </div>

    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
