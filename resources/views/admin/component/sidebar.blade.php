        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img src="{{ asset('startbootstrap') }}/img/logo.jfif" alt="" height="40px">
                </div>
                <div class="sidebar-brand-text mx-3">ECOM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ (request()->is('category*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/category">
                    <i class="fas fa-regular fa-clipboard"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('subcategory*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/subcategory">
                    <i class="fas fa-solid fa-file"></i>
                    <span>Sub Kategory</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('product*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/product">
                    <i class="fas fa-solid fa-list-check"></i>
                    <span>Produk</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('cart*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Keranjang</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <li class="nav-item {{ (request()->is('carousel*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/carousel">
                    <i class="fa-solid fa-tree"></i>
                    <span>Carousel</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('feed*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/feed">
                    <i class="fa-solid fa-comment"></i>
                    <span>Feeds</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('help*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/help">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Bantuan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
