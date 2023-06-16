<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="context">
        <section class="vh-100">
            <div class="container py-4 h-70">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-11 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-orange text-white rounded-3">
                            <div class="card-body p-4">
                                <div class="mb-md-4 mt-md-3">
                                    <form action="{{ route('forget') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <h2 class="fw-bold mb-3 text-uppercase">Lupa Kata Sandi</h2>
                                        @error('data')
                                                <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="name">Nama</label>
                                            <input type="name" id="name" class="form-control form-control-lg" name="name" />
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" class="form-control form-control-lg" name="email" />
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="phone">No.Telepon</label>
                                            <input type="phone" id="phone" maxlength="12" class="form-control form-control-lg" name="phone" />
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="password">Kata Sandi Baru</label>
                                            <input type="password" id="password" class="form-control form-control-lg" name="password" />
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <a href="{{ route('login') }}" class="btn btn-secondary">Kembali</a>
                                        <button class="btn btn-outline-light" type="submit">Submit</button>
                                    </form>                                                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <div class="area bg-warning">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

</body>

</html>