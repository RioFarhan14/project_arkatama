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
                            <div class="card-body p-5">

                                <div class="mb-md-5 mt-md-4">
                                    <form action="{{ route('login.authenticate') }}" method="POST">
                                        @csrf

                                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                        <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                        @if (Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                                            <strong>Sukses!</strong> {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                        @endif
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="typeEmailX">Email</label>
                                            <input type="email" name="email" id="typeEmailX"
                                                class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="typePasswordX">Password</label>
                                            <input type="password" id="typePasswordX" name="password"
                                                class="form-control form-control-lg" />
                                        </div>

                                        <p class="small mb-5 pb-lg-2"><a class="text-white-50"
                                                href="{{ route('forgetpassword') }}">Lupa kata sandi ?</a>
                                        </p>

                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                    </form>
                                </div>

                                <div>
                                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}"
                                            class="text-white-50 fw-bold">Sign
                                            Up</a></p>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        // Menutup pesan saat tombol "Close" ditekan
        $('.alert .btn-close').on('click', function() {
            $(this).closest('.alert').alert('close');
        });
    });
</script>
</body>

</html>