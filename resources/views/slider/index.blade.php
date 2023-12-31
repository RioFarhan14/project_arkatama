@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Slider</h1>

        <a class="btn text-light mb-2" style="background-color: #fd7e14;" href="{{ route('slider.create') }}" role="button">Create New</a>

        <div class="card mb-4">
            <div class="card-body">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slider->name }}</td>
                            <td>
                                <img src="{{ asset('storage/slider/' . $slider->image) }}" class="img-fluid"
                                    style="max-width: 100px; max-height: 50px" alt="{{ $slider->image }}">
                            </td>

                            <td>
                                <form onsubmit="return confirm('Are you sure? ');"
                                    action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                    <a href="{{ route('slider.edit', $slider->id) }}"
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