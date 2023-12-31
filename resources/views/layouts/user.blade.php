<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid px-4 px-lg-5">
            <a class="navbar-brand fs-3" href="#"><strong>Speedy</strong> Bites</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"></li>
                    <li class="nav-item dropdown"></li>
                </ul>
                <div class="d-flex flex-column flex-lg-row gap-2">
                    <form>
                    <a class="btn btn-outline-dark" href="{{ route('checkout') }}">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{ $cartitemsId }}
                        </span>
                    </a>
                    </form>
                    <div class="dropdown">
                        <a class="btn btn-outline-dark text-uppercase dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-fill me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a href="{{ route('history.user') }}" class="dropdown-item">History Transaksi</a></li>
                          <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>                         
                          </li>
                        </ul>
                      </div>
                    </div>
            </div>
        </div>
    </nav>
    @yield('content')
     <!-- Footer-->
     <footer class="py-5 bg-dark">
        <div class="container text-md-left">
            <div class="row text-md-left">
                
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Speedybites.id</h5>
                    <p class="text-white">Speedybites.id merupakan sebuah website penjualan makanan cepat saji.</p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3 text-white">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                    <p>
                        <i class="fas fa-home mr-3"></i > Depok
                    </p>
                    <p>
                    <i class="fas fa-envelope mr-3"></i > speedybites@gmail.com
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i > 012345678908
                    </p>
                    <p>
                        <i class="fa fa-print mr-3"></i > +16 4759 3245 17
                    </p>
                </div>
            </div>

            <hr class="mb-4">
            <div class="d-flex justify-content-center">
            <div class="text-white">
                <p> Copyright &copy; 2023 All rights reserved by:
                        <a href="#" style="text-decoration: none">
                            <strong class="text-warning">Speedy Bites</strong>
                    </a></p>
            </div>
        </div>
        </div>
    </footer>
    <script src="{{asset("js/scripts.js") }}"></script>
    <script src="{{ asset('js/show.js') }}"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7b727a546b.js" crossorigin="anonymous"></script>
</body>

</html>
