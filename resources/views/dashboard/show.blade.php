@extends('layouts.user')
@section('content')
	<div class="container mx-lg-5 my-lg-5 card-info rounded">
        <section class="row px-lg-3 py-lg-3">
            <div class="col-lg-6">
                <img src="{{ asset('storage/product/'. $product->image) }}" alt="{{ $product->image }}" class="img col-lg-12">
            </div>
            <div class="col-lg-6">
                <h1 class="text-start">{{ $product->name }}</h1>
                <div class="d-flex justify-content-start small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                </div>
                <p class="text-start">{{ $product->description }}</p>
                @if($product->discount > 0)
                <span class="price text-muted text-decoration-line-through ">Rp.{{ $product->price }}</span>
                @endif
                Rp.{{ $product->final_price }}
                <form action="{{ route('addtocart') }}" method="post">
                    @csrf
                    <div class="form-group quantity mb-2">
                        <input type="text" hidden name="product_id" value="{{ $product->id }}">
                        <label for="quantity" class="me-2">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" 
                        value="{{ $cartitems ?? 1 }}">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block col-3">Add to Cart</button>
                </form> 

            </div>
        </section>
        @if($related->count() > 0)
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                    @foreach ($related as $product)
                    <div class="col mb-5">
                        <div class="card">
                            @if($product->discount > 0)
                            <!-- Sale badge-->
                            <div class="badge p-3 m-1 position-absolute">{{ $product->discount }}%</div>
                            @endif
                            <!-- Product image-->
                            <img class="card-img-top px-2 pt-2 card-img-relate" src="{{ asset('storage/product/' . $product->image) }}"
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
                                    Rp.{{ $product->final_price }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-end"><a class="btn btn-outline-dark" href="{{ route('dashboard.info', $product->id) }}"><i class="bi-cart-fill me-1 m-1"></i></a></div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </div>
@endsection