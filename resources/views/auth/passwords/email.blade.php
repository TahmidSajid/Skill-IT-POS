<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset ">
                        <div class="login-logo">
                            <img src="{{ asset('assets') }}/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Forgot password?</h3>
                            <h4>Don’t worry! it happens. Please enter the address <br>
                                associated with your account.</h4>
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your email address" name="email" value="{{ old('email') }}">
                                    <img src="{{ asset('assets') }}/img/icons/mail.svg" alt="img">
                                    @error('email')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login">
                                <button class="btn btn-login" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img">
                    <img src="{{ asset('assets') }}/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('assets')}}/js/jquery-3.6.0.min.js" type="092aa155dd6ecc00401b9857-text/javascript"></script>

    <script src="{{asset('assets')}}/js/feather.min.js" type="092aa155dd6ecc00401b9857-text/javascript"></script>

    <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js" type="092aa155dd6ecc00401b9857-text/javascript"></script>

    <script src="{{asset('assets')}}/js/script.js" type="092aa155dd6ecc00401b9857-text/javascript"></script>
    <script src="{{ asset('assets') }}/js/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="092aa155dd6ecc00401b9857-|49" defer=""></script>
</body>

</html>
