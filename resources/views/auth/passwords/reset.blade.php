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

    <title>{{ $title ?? 'RESET PASSWORD | SI TULAR PNS'}}</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&nbsp;</p>
                    <img src="/undraw_my_password_re_ydq7.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Reset</h3>
                                <p class="mb-4">Sistem Informasi Tugas Belajar (SI TULAR PNS).</p>
                            </div>
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group first">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Retype</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>

                                <input type="submit" value="Reset" class="btn btn-block btn-danger">

                                <span class="d-block text-left my-4 text-muted">&mdash; or <a href="{{ route('login') }}">Login</a> &mdash;</span>

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