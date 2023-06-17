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
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#products">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#sale">Sale Items</a></li>
                            <li><a class="dropdown-item" href="#popular">Best Sellers</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex flex-column flex-lg-row gap-2">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                    <a class="btn btn-outline-dark" href="{{ route('login') }}">
                        <i class="bi-person-fill me-1"></i>
                        Login
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="py-5 px-5">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                    <img src="{{ asset('dataku/slider/' . $slider->image) }}" class="container-fluid" style="height: 450px; border-radius:30px;"
                    alt="{{ $slider->image }}">
                </div>
                @endforeach
            </div>
            @if($sliders->count() >= 2)
            <button class="carousel-control-prev ps-4 ps-lg-2" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next pe-4 pe-lg-2" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
    </header>
    <!-- section Sale items-->
    @if($sale_items->count() > 0)
    <section class="py-3" id="sale">
        <div class="container-fluid px-5 mt-5">
            <h2 class="fw-bolder mb-4">Sale items</h2>
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                @foreach ($sale_items as $sale_item)
                <div class="mb-5">
                    <div class="bg-light rounded">
                        <!-- Sale badge-->
                        <div class="badge p-3 m-1 position-absolute">{{ $sale_item->discount }}%</div>
                        <!-- Product image-->
                        <img class="card-img-top img-product px-2 pt-2" src="{{ asset('dataku/product/' . $sale_item->image) }}"
                            alt="{{ $sale_item->image }}" />
                        <!-- Product details-->
                        <div class="card-body pt-2 px-3">
                            <div class="text-start">
                                <!-- Product Category -->
                                <p class="text-secondary cat-name">{{ $sale_item->category->name }}</p>
                                <!-- Product name-->
                                <h5 class="fw-bolder card-desc">{{ $sale_item->name }}</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-start small text-warning mb-1">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">Rp.{{ $sale_item->price }}</span>
                                Rp.{{ $sale_item->final_price }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-end"><a class="btn btn-outline-dark" href="{{ route('login') }}"><i class="bi-cart-fill me-1 m-1"></i></a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- section Popular items-->
    @if($popular_items->count() > 0)
    <section class="py-3" id="popular">
        <div class="container-fluid px-5 mt-5">
            <h2 class="fw-bolder mb-4">Best Sellers</h2>
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                @foreach ($popular_items as $popular)
                <div class="mb-5">
                    <div class="bg-light rounded">
                        <!-- Sale badge-->
                        <div class="badge p-3 m-1 position-absolute">{{ $popular->discount }}%</div>
                        <!-- Product image-->
                        <img class="card-img-top img-product px-2 pt-2" src="{{ asset('dataku/product/' . $popular->image) }}"
                            alt="{{ $popular->image }}" />
                        <!-- Product details-->
                        <div class="card-body pt-2 px-3">
                            <div class="text-start">
                                <!-- Product Category -->
                                <p class="text-secondary cat-name">{{ $popular->category->name }}</p>
                                <!-- Product name-->
                                <h5 class="fw-bolder card-desc">{{ $popular->name }}</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-start small text-warning mb-1">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">Rp.{{ $popular->price }}</span>
                                Rp.{{ $popular->final_price }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-end"><a class="btn btn-outline-dark" href="{{ route('login') }}"><i class="bi-cart-fill me-1 m-1"></i></a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- Section All Product-->
    <section class="py-3" id="products">
        <div class="container-fluid px-5 mt-5">
            <h2 class="fw-bolder mb-4">All Products</h2>
            <div id="carouselExampleIndicators" class="carousel slide row">
                <div class=" justify-content-start mb-4 gap-2 ">
                    @foreach($categories as $category)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->iteration - 1 }}"
                        class="button-cat fw-bolder p-2 button-{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : '' }}"
                        aria-label="Slide">{{ $category->name }}</button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($categories as $category)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                            @foreach($productsByCategory[$category->name] as $product)
                            <div class="col mb-5">
                                <div class="card">
                                    @if($product->discount > 0)
                                    <!-- Sale badge-->
                                    <div class="badge p-3 m-1 position-absolute">{{ $product->discount }}%</div>
                                    @endif
                                    <!-- Product image-->
                                    <img class="card-img-top img-product px-2 pt-2" src="{{ asset('dataku/product/' . $product->image) }}"
                                        alt="{{ $product->image }}" />
                                    <!-- Product details-->
                                    <div class="card-body pt-2 px-3">
                                        <div class="text-start">
                                            <!-- Product Category -->
                                            <p class="text-secondary cat-name">{{ $product->category->name }}</p>
                                            <!-- Product name-->
                                            <h5 class="fw-bolder card-desc">{{ $product->name }}</h5>
                                            <!-- Product reviews-->
                                            <div class="d-flex justify-content-start small text-warning mb-1">
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                            </div>
                                            <!-- Product price-->
                                            @if($product->discount > 0)
                                            <span class="text-muted text-decoration-line-through">Rp.{{ $product->price }}</span>
                                            @endif
                                            <span>Rp.{{ $product->final_price }}</span>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-end"><a href="{{ route('login') }}" class="btn btn-outline-dark" href="#"><i class="bi-cart-fill me-1 m-1"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <script src="{{asset("js/scripts.js") }}"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>