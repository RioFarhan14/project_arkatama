<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/admin2.css') }}">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand p-3 fs-3 text-light bg-secondary" href="#"><strong style="color: #fd7e14;">Speedy</strong> Bites</a>
            <!-- Sidebar Toggle-->
            <div class="container d-flex justify-content-between">
                <div>
                    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars color-icon"></i></button>
                </div>
            <!-- Navbar-->
            @include('includes.adminNav')
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('includes.adminSide')
            </div>
            <div id="layoutSidenav_content">
                @yield('content')
                @include('includes.adminFooter')
            </div>
        </div>
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    </body>
</html>
