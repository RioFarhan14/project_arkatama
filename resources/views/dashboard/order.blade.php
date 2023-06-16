<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="m-5 p-5">
        <div class="container rounded p-3" style="background-color: #ff9800">
            <div class="row">
                <div class="col-12 mb-4">
                    <h1 class="text-center">Detail Pesanan</h1>
                </div>
                <div class="col-1"></div>
                <div class="col-9 ms-5 text-center">
                    <table class="table table-striped rounded " style="background-color: #EEE3CB">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderitems as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->Product->name }}</td>
                                <td>{{ $item->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-10">
                </div>
                <div class="col-1">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="col-1">
                    <form action="{{ route('dashboard.confirm', $item->order_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Selesai</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>