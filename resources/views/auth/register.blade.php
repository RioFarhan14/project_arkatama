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
                            <div class="card-body p-4 text-center">
                                <div class="mb-md-4 mt-md-3">
                                    <form action="{{ route('register.store') }}" method="POST">
                                        @csrf    
                                    <h2 class="fw-bold mb-3 text-uppercase">Register</h2>
                                    <div class="form-outline form-white mb-4">            
                                        <label class="form-label" for="name">Nama</label>
                                        <input type="name" id="name" name="name" value="{{ old('name') }}"class="form-control form-control-lg @error('name') is-invalid @enderror" />
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror" />
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="phone">No.Telepon</label>
                                        <input type="phone" id="phone" name="phone" value="{{ old('phone') }}" class="form-control form-control-lg @error('phone') is-invalid @enderror" />
                                        @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror" />
                                        @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Submit</button>
                                </form>
                                </div>
                                <div>
                                    <p class="mb-0">Do you have an account? <a href="{{ route("login") }}"
                                            class="text-white-50 fw-bold">Sign
                                            in</a></p>
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