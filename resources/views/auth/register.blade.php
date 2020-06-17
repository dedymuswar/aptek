<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="yEJLdlfn4FUDAlfD2WyDoFrmCjaWF4nniKHVKEko">

    <link rel="shortcut icon" href="../favicon.ico">

    <!-- plugin css -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!-- end plugin css -->


    <!-- common css -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/selalu.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- end common css -->
</head>

<body data-base-url="#">

    <script src="{{ asset('assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper bg-ku"
                                        style="background-image: url('{{ asset('assets/images/carousel/img13.jpg') }}');">
                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-4">
                                        <a href="#" class="noble-ui-logo d-block" style="font-size:30px">TANNYA<span>APTeK</span></a>
                                        <a href="#" class="noble-ui-logo d-block mb-2"><span style="font-size:22px">(Aplikasi Perhitungan Tenaga Keperawatan)</span></a>
                                        <h5 class="text-muted font-weight-normal mb-4">Selamat Datang! Silahkan Login.</h5>
                                        <form class="forms-sample" method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Username</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" id="name" autocomplete="name"
                                                    placeholder="name">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('email') }}" id="email" placeholder="Email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" autocomplete="current-password"
                                                    placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Confirm Password</label>
                                                <input type="password" id="password-confirm"
                                                    name="password_confirmation"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" autocomplete="current-password"
                                                    placeholder="Confirm Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary">Daftar</button>
                                            </div>
                                            <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Sudah punya
                                                akun? Login disini</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- base js -->
    <script src="{{ asset('js/appuku.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- end common js -->

</body>

</html>