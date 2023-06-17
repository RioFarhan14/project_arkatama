@extends('layouts.user')
@section('content')
<div class="container my-5 p-3 rounded cart bg-light">
    <div class="row no-gutters">
        <div class="col-md-8">
            <div class="product-details mr-2">
                <div class="d-flex flex-row align-items-center bg-warning p-2 rounded"><a
                        href="{{ route('dashboard') }}" class="text-dark" style="text-decoration: none"><i
                            class="fa-solid fa-arrow-left-long pe-1"></i><span class="fw-bold">Continue
                            Shopping</span></a></div>
                <hr>
                <h6 class="mb-0">Shopping cart</h6>
                <div class="d-flex justify-content-between"><span>Kamu Punya {{ $cartitemsId }} jenis makanan di dalam cart</span>
                </div>
                @foreach ($products as $item)
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src="{{ asset('dataku/product/'. $item->product->image) }}" width="40" alt="{{$item->product->image}}">
                        <div class="ms-2"><span class="font-weight-bold d-block">{{ $item->product->name }}</span><span>Item {{ $item->quantity }}</span>
                        </div>
                    </div>
                    <form action="{{ route('checkout.delete',$item->id) }}" method="POST" class="d-flex flex-row align-items-center"><span class="d-block font-weight-bold me-2">Rp.{{ $item->product->final_price }}</span>
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit"><i class="fa fa-trash-o ml-3 text-black-50"></i></button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="payment-info">
                <div class="d-flex justify-content-between align-items-center mb-3"><span class="fs-4">Total</span>
                </div>
                <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                            src="https://img.icons8.com/officel/48/000000/visa.png" /></span> </label>

                <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                            src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span> </label>


                <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                            src="https://img.icons8.com/officel/48/000000/paypal.png" /></span> </label>
                <div><label class="credit-card-label">Name on card</label><input type="text"
                        class="form-control credit-inputs" placeholder="Name"></div>
                <div><label class="credit-card-label">Card number</label><input type="text"
                        class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                <div class="row">
                    <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text"
                            class="form-control credit-inputs" placeholder="12/24"></div>
                    <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text"
                            class="form-control credit-inputs" placeholder="342"></div>
                </div>
                <hr class="line">
                <form action="{{ route('checkout.confirm', $subtotal) }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-between information"><span>Subtotal</span><span><input type="text" name="subtotal" disabled 
                        style="border: none;text-align: right;direction: rtl;color:black;" value="Rp.{{ number_format($subtotal, 0) }}"></span></div>
                <div class="d-flex justify-content-between information"><span>Shipping</span><span>Rp.20,000</span></div>
                <div class="d-flex justify-content-between information"><span>Total</span><span></span>Rp.{{ number_format($total, 0) }}</div>
                <button class="btn btn-primary btn-block d-flex justify-content-between mt-3"
                    type="submit"><span>Checkout</span></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection