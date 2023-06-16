<nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading"></div>
            <a class="nav-link" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Menu</div>
            @if (Auth::user()->role->name == 'Admin')
            <a class="nav-link collapsed" href="{{ route('slider.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-images"></i></i></div>
                Slider
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link collapsed" href="{{ route('history.admin') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-images"></i></i></div>
                History Transaksi
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            @endif
            @if (Auth::user()->role->name == 'Admin' || Auth::user()->role->name == 'Staff')
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-box-open"></i></div>
                Products
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="{{ route('category.index') }}">
                        Category
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="{{ route('product.index') }}">
                        Product
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </nav>
            </div>
            @endif
            @if (Auth::user()->role->name == 'Admin')
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesUser" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-pen"></i></div>
                Users
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePagesUser" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="{{ route('role.index') }}">
                        Role
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link collapsed" href="{{ route('user.index') }}">
                        User
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </nav>
            </div>
            @endif
        </div>
    </div>
    <div class="sb-sidenav-footer "style="text-transform: uppercase">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }} ({{ Auth::user()->role->name }})
    </div>
</nav>