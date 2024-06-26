
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://source.unsplash.com/160x160/" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('daftarPeminjam.index') }}" class="nav-link {{ Request::is('daftar-peminjam') ? 'active' : '' }}">
                        <p>
                            Daftar Peminjam
                            {!! Request::is('admin/') ? '<i class="right fas fa-angle-left"></i>' : '' !!}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.book.index') }}" class="nav-link {{ Request::is('admin-dashboard/book') ? 'active' : '' }}">
                        <p>
                            Book
                            {!! Request::is('admin/') ? '<i class="right fas fa-angle-left"></i>' : '' !!}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.favorite.index') }}" class="nav-link {{ Request::is('admin-dashboard/favorite') ? 'active' : '' }}">
                        <p>
                            Favorited Book
                            {!! Request::is('admin/') ? '<i class="right fas fa-angle-left"></i>' : '' !!}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>