<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/login-form-07/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/login-form-07/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/login-form-07/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/login-form-07/css/style.css">

    <title>{{ $title ?? 'LOGIN | SI TULAR PNS'}}</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/bg-sitular.png" alt="Image" class="img-fluid mt-n4">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4">Sistem Informasi Tugas Belajar (SI TULAR PNS).</p>
                            </div>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a>
                                        @endif
                                    </span>
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-danger">

                                <span class="d-block text-left my-4 text-muted">&mdash; or <a href="{{ route('register') }}">Register</a> &mdash;</span>


                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="/login-form-07/js/jquery-3.3.1.min.js"></script>
    <script src="/login-form-07/js/popper.min.js"></script>
    <script src="/login-form-07/js/bootstrap.min.js"></script>
    <script src="/login-form-07/js/main.js"></script>
</body>

</html>