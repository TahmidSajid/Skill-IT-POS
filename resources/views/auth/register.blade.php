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
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="{{ asset('assets') }}/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Create an Account</h3>
                            <h4>Continue where you left off</h4>
                        </div>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-login">
                                <label>Name</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your name" name="name"
                                        value="{{ old('name') }}">
                                    <img src="{{ asset('assets') }}/img/icons/users1.svg" alt="img">
                                    @error('name')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your email address" name="email"
                                        value="{{ old('email') }}">
                                    <img src="{{ asset('assets') }}/img/icons/mail.svg" alt="img">
                                </div>
                                @error('email')
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password"
                                        name="password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                @error('password')
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-login">
                                <label>Confirm Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password"
                                        name="password_confirmation">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                @error('password_confirmation')
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign Up</button>
                            </div>
                            @if (session('admin_error'))
                                <div class="form-login">
                                    <p class="text-danger">{{ session('admin_error') }}</p>
                                </div>
                            @endif
                        </form>
                        <div class="signinform text-center">
                            <h4>Already a user? <a href="{{ route('login') }}" class="hover-a">Sign In</a></h4>
                        </div>
                        <div class="form-setlogin">
                            <h4>Or sign up with</h4>
                        </div>
                    </div>
                </div>
                <div class="login-img">
                    <img src="{{ asset('assets') }}/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('assets')}}/js/jquery-3.6.0.min.js" type="95f673da17a42e83a63cab72-text/javascript"></script>

    <script src="{{asset('assets')}}/js/feather.min.js" type="95f673da17a42e83a63cab72-text/javascript"></script>

    <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js" type="95f673da17a42e83a63cab72-text/javascript"></script>

    <script src="{{asset('assets')}}/js/script.js" type="95f673da17a42e83a63cab72-text/javascript"></script>
    <script src="{{ asset('assets') }}/js/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="95f673da17a42e83a63cab72-|49" defer=""></script>
</body>

</html>
