@extends('layouts.user')
@section('content')
<header class="py-5 px-5">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                <img src="{{ asset('storage/slider/' . $slider->image) }}" class="container-fluid"
                    style="height: 450px; border-radius:30px;" alt="{{ $slider->image }}">
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
<!-- Section Sale Products-->
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
                    <img class="card-img-top img-product px-2 pt-2"
                        src="{{ asset('storage/product/' . $sale_item->image) }}" alt="{{ $sale_item->image }}" />
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
                        <div class="text-end"><a class="btn btn-outline-dark"
                                href="{{ route('dashboard.info', $sale_item->id) }}"><i
                                    class="bi-cart-fill me-1 m-1"></i></a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- all Products-->
<section class="py-5 px-4 container-fluid" id="popular">
    <div class="container-fluid">
        <h2 class="fw-bolder mb-4">All Products</h2>
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Filter</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard') }}" method="GET">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="mb-2" for="sort">Sort by:</label>
                                <select class="form-control" id="sort" name="sort">
                                    <option value="" {{ request('sort') == '' ? 'selected' : '' }}>All</option>
                                    <option value="sold_out" {{ request('sort') == 'sold_out' ? 'selected' : '' }}>Popularity</option>
                                    <option value="new" {{ request('sort') =='new' ? 'selected' : '' }}>New</option>
                                </select>
                            </div>                            
                            <div class="form-group mb-2">
                                <label class="mb-2" for="category">Category:</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="all" {{ empty(request('category')) ? 'selected' : 'all' }}>All
                                    </option>
                                    @foreach($categorys as $cat)
                                    <option value="{{ $cat->id }}" {{ request('category')==$cat->id ? 'selected' : ''
                                        }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2" for="price">Price:</label>
                                <select class="form-control" name="price" id="price">
                                    <option value="" {{ empty(request('price')) ? 'selected' : '' }}>All</option>
                                    <option value="0-10000" {{ request('price')==='0-10000' ? 'selected' : '' }}>0 >
                                        10000</option>
                                    <option value="10000-25000" {{ request('price')==='10000-25000' ? 'selected' : ''
                                        }}>Rp.10000 > Rp.25000</option>
                                    <option value="25000-50000" {{ request('price')==='25000-50000' ? 'selected' : ''
                                        }}>Rp.25000 > Rp.50000</option>
                                    <option value="50000-75000" {{ request('price')==='50000-75000' ? 'selected' : ''
                                        }}>Rp.50000 > Rp.75000</option>
                                    <option value="75000-" {{ request('price')==='75000-' ? 'selected' : '' }}>Rp.75000
                                        ></option>
                                </select>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Apply Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 justify-content-start">
                    @foreach ($products as $product)
                    <div class="mb-5">
                        <div class="bg-light rounded">
                            <!-- Sale badge-->
                            @if ($product->discount > 0)
                            <div class="badge p-3 m-1 position-absolute">{{ $product->discount }}%</div>
                            @endif
                            <!-- Product image-->
                            <img class="card-img-top img-product px-2 pt-2"
                                src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->image }}" />
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
                                    <span class="text-muted text-decoration-line-through">Rp.{{ $product->price
                                        }}</span>
                                    @endif
                                    Rp.{{ $product->final_price }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-end"><a class="btn btn-outline-dark"
                                        href="{{ route('dashboard.info', $product->id) }}"><i
                                            class="bi-cart-fill me-1 m-1"></i></a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
</section>
@endsection