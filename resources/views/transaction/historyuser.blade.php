@extends('layouts.user')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">History Transaksi</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table id="dataTable" class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jumlah Produk</th>
                            <th>Quantity</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ count($order->orderItems) }}</td>
                            <td>Rp. {{ $order->orderItems->sum('quantity') }}</td>
                            <td>Rp. {{ $order->total_price }}</td>
                            <td>{{ $order->status }}</td>
                            <td><a href="{{ route('status', $order->id) }}" class="btn btn-primary">Lihat</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection