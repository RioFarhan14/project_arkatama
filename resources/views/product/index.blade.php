@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Product</h1>

        <a class="btn text-light mb-2" style="background-color: #fd7e14;" href="{{ route('product.create') }}" role="button">Create New</a>

        <div class="card mb-4">
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Nama</th>
                            <th>Price</th>
                            <th>Final Price</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp. {{ number_format($product->price, 0, 2) }}</td>
                            <td>Rp. {{ number_format($product->final_price, 0, 2) }}</td>
                            <td>
                                <img src="{{ asset('storage/product/' . $product->image) }}" class="img-fluid"
                                    style="max-width: 100px; max-height: 50px" alt="{{ $product->image }}">
                            </td>
                            <td>
                                <form onsubmit="return confirm('Are you sure? ');"
                                    action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection