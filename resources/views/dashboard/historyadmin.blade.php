@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">History Transaksi</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>User</th>
                            <th>Total Belanja</th>
                            <th>Order Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="https://placehold.co/50x50" alt="avatar">
                            </td>
                            <td>{{ $order->user->name }}</td>
                            <td>Rp. {{ number_format($order->total_price, 0, 2) }}</td>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection