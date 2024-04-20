<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('students-assets') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('students-assets') }}/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('students-assets') }}/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('students-assets') }}/css/style.css">

    <title>Login #4</title>
</head>

<body>


    <div class="d-md-flex half">
        <div class="bg" style="background-image: url('{{ asset('students-assets') }}/images/bg_1.jpg');"></div>
        <div class="contents">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3>Login to <strong>Skill IT</strong></h3>
                            </div>
                            <form action="{{ route('student_login') }}" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" placeholder="your-email@gmail.com"
                                        id="email" name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Your Password"
                                        id="password" name="password">
                                </div>

                                <div class="d-sm-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot
                                            Password</a></span>
                                </div>

                                <button type="submit" class="btn btn-block btn-primary">Submit</button>

                                @if (session('credi_error'))
                                    <div class="form-group last my-3">
                                        <label class="text-danger">{{ session('credi_error') }}</label>
                                    </div>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="{{ asset('students-assets') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('students-assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('students-assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('students-assets') }}/js/main.js"></script>
</body>

</html>
