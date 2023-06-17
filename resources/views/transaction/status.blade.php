<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/status.css') }}">
</head>
<body>
    <div class="content mx-4 my-5 p-2 mx-sm-5 my-sm-5 p-md-4 rounded">
        <div class="row">
            <div class="col-12 fs-4 fw-bold">
                Detail Pembayaran
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-9 col-xl-10">
                Status
            </div>
            @if($order->status == 'selesai')
            <div class="col-2 col-xl-1 ms-xl-5 bg-success d-flex justify-content-center rounded">
                {{ $order->status }}
            </div>
            @elseif($order->status =='pending')
            <div class="col-2 col-xl-1 ms-xl-5 bg-warning d-flex justify-content-center rounded">
                {{ $order->status }}
            </div>
            @elseif($order->status =='gagal')
            <div class="col-2 col-xl-1 ms-xl-5 bg-danger d-flex justify-content-center rounded">
                {{ $order->status }}
            </div>
            @endif
        </div>
        <div class="row pt-1 m-1">
            <span>Detail Produk</span>
            @foreach ($orderItems as $item)
            <a class="col-11 col-xl-12 col-xl-12 mx-2 mt-1 btn border border-dark">
                <div class="row">
                    <img src="{{ asset('dataku/product/'. $item->product->image) }}" alt="{{ $item->product->image}}" class="col-2 col-xl-1 img-card">
                <div class="col-9 col-lg-10 text-start child-text">
                        <div class="row">
                            <div class="col-7 col-sm-9 col-xl-11 fw-bold">
                                {{ $item->product->name }}
                                </div>
                                <div class="col-5 col-sm-3 col-xl-1">
                                    Total
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-7 col-sm-9 col-xl-11">
                                {{ $item->quantity }} x Rp.{{ $item->product->final_price }}
                                </div>
                            <div class="col-5 col-sm-3 col-xl-1">
                                Rp.{{ $item->quantity * $item->product->final_price }}
                            </div>
                        </div>
                </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="row mt-2">
            <div class="col-12">
                Detail Pembayaran
            </div>
            <div class="col-10 col-xl-11 mx-3 child-text">
                <div class="row mt-1">
                    <div class="col-10 col-xl-11">
                        Metode Pembayaran
                    </div>
                    <div class="col-2 col-xl-1">
                        Kredit
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-10 col-xl-11">
                        Total Harga
                    </div>
                    <div class="col-2 col-xl-1">
                        Rp.{{ $order->total_price }}
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-10 col-xl-11">
                        Total Ongkos kirim
                    </div>
                    <div class="col-2 col-xl-1">
                        Rp.20000
                    </div>
                </div>
                <div class="row fw-bold mt-2">
                    <div class="col-10 col-xl-11">
                        Total Belanja
                    </div>
                    <div class="col-2 col-xl-1">
                        Rp.{{ $order->total_price + 20000 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 ms-2">
            <a href="{{ route('dashboard') }}" class="btn btn-primary col-6 col-md-4 col-xl-3 child-text">Halaman Utama</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>