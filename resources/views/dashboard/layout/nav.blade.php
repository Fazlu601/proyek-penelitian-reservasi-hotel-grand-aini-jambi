<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    @can('owner')
                    <div class="sb-sidenav-menu-heading">Owner</div>
                    @else
                    <div class="sb-sidenav-menu-heading">Administrator</div>
                    @endcan
                    <a class="nav-link {{ Request::is('dashboard/orders') ? 'active' : '' }}" href="/dashboard/orders">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link collapsed {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data Master
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">Data Pelanggan</a>
                            <a class="nav-link {{ Request::is('dashboard/rooms*') ? 'active' : '' }}" href="/dashboard/rooms">Data Kamar</a>
                        </nav>
                    </div>

                    @can('owner')            
                    <a class="nav-link {{ Request::is('dashboard/role_access') ? 'active' : '' }}" href="/dashboard/role_access" >
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Role Access
                    </a>
                    <a class="nav-link {{ Request::is('/dashboard/laporan_pendapatan') ? 'active' : '' }}" href="/dashboard/laporan_pendapatan" >
                        <div class="sb-nav-link-icon"><i class="fas fa-line-chart"></i></div>
                        Laporan Pendapatan
                    </a>
                    @endcan
        </nav>
    </div>
    <div id="layoutSidenav_content">