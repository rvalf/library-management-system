<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <h4 class="text-primary mb-5">Library Management System</h4>
        <h5 class=" d-flex align-items center mb-0"><i class="bi bi-person-fill me-3"></i> {{ Auth::user()->name }} ({{ Auth::user()->role }})</h5>
    </div>

    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            @auth
            @if (Auth::user()->role === 'admin')
            <li class="sidebar-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                <a href="{{ url('/admin/users') }}" class="sidebar-link">
                    <i class="bi bi-person"></i>
                    <span>Users</span>
                </a>
            </li>

            @elseif (Auth::user()->role === 'librarian')
            <li class="sidebar-item {{ request()->is('librarian/category*') ? 'active' : '' }}">
                <a href="{{ url('/librarian/category') }}" class="sidebar-link">
                    <i class="bi bi-folder"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->is('librarian/books*') ? 'active' : '' }}">
                <a href="{{ url('/librarian/books') }}" class="sidebar-link">
                    <i class="bi bi-book"></i>
                    <span>Book</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->is('librarian/loans*') ? 'active' : '' }}">
                <a href="{{ url('/librarian/loans') }}" class="sidebar-link">
                    <i class="bi bi-book-fill"></i>
                    <span>Loans</span>
                </a>
            </li>

            @endif

            <li class="sidebar-item">
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-secondary" type="submit">Logout</button>
                </form>
            </li>
            @endauth

            {{-- Transaksi --}}
            <!-- <li class="sidebar-item {{ request()->is('transaksi*') ? 'active' : '' }}">
                <a href="{{ url('/transaksi') }}" class="sidebar-link">
                    <i class="bi bi-cash-stack"></i>
                    <span>Transaksi</span>
                </a>
            </li> -->
        </ul>
    </div>

    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>