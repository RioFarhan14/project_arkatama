@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-yellow text-white mb-4">
                    <div class="card-body info-card row"><div class="col-10"><i class="fa-solid fa-box-open"></i> Product</div><div class="col">{{ $totalproduct }}</div></div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-orange text-white mb-4">
                    <div class="card-body info-card row"><div class="col-10"><i class="fa-solid fa-list"></i> Category</div> <div class="col">{{ $category }}</div></div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body info-card row"><div class="col-10"><i class="fa-solid fa-users"></i> Users</div> <div class="col">{{ $users }}</div></div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body info-card row"><div class="col-10"><i class="fa-solid fa-cart-shopping"></i> Product terjual</div> <div class="col">1</div></div>
                </div>
            </div>
        </div>
        <div class="row">
            <span class="py-3">Pesanan</span>
        <div class="card mb-4">
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection