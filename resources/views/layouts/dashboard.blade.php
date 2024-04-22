<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/animate.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    @stack('pluginCss')
    @stack('customeCss')
    @stack('paginationCss')
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="index.html" class="logo">
                    <img src="{{ asset('assets') }}/img/logo.png" alt="">
                </a>
                <a href="index.html" class="logo-small">
                    <img src="{{ asset('assets') }}/img/logo-small.png" alt="">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="javascript:void(0);" class="dropdown-toggle nav-link userset"
                            data-bs-toggle="dropdown">
                            <span class="user-img"><img src="{{ asset('assets') }}/img/profiles/avator1.jpg"
                                    alt="">
                                <span class="status online"></span></span>
                        </a>
                        <div class="dropdown-menu menu-drop-user">
                            <div class="profilename">
                                <div class="profileset">
                                    <span class="user-img"><img src="{{ asset('assets') }}/img/profiles/avator1.jpg"
                                            alt="">
                                        <span class="status online"></span></span>
                                    <div class="profilesets">
                                        <h6>John Doe</h6>
                                        <h5>Admin</h5>
                                    </div>
                                </div>
                                <hr class="m-0">
                                <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="generalsettings.html"><i class="me-2"
                                        data-feather="settings"></i>Settings</a>
                                <hr class="m-0">
                                <a class="dropdown-item logout pb-0" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                    <img src="{{ asset('assets') }}/img/icons/log-out.svg" class="me-2"
                                        alt="img">Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                @else
                <a href="{{ route('student_logout') }}" class="btn btn-danger my-2">Logout</a>
                @endif
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.html">Settings</a>
                    <a class="dropdown-item" href="signin.html">Logout</a>
                </div>
            </div>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>

                        @if (auth()->user()->role == 'admin')
                            <li class="active">
                                <a href="{{ route('home') }}">
                                    <i class="fa-solid fa-gauge"></i>
                                    <span>
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile') }}">
                                    <i class="fa-solid fa-user"></i>
                                    <span>
                                        Profile
                                    </span>
                                </a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="fa-solid fa-book-open-reader"></i>
                                    <span> Course</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="{{ route('caterory') }}">Category</a></li>
                                    <li><a href="{{ route('courses') }}">Course</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="fa-solid fa-users"></i>
                                    <span> Users</span>
                                    <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="{{ route('students') }}">Students</a></li>
                                    {{-- <li><a href="{{ route('courses') }}">Course</a></li> --}}
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('enroll') }}">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span>
                                        Enrollment
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('payments') }}">
                                    <i class="fa-solid fa-money-bill-wave"></i>
                                    <span>
                                        Payment Management
                                    </span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->role == 'student')
                            <li>
                                <a href="{{ route('student_dashboard') }}">
                                    <i class="fa-solid fa-gauge"></i>
                                    <span>
                                        Student Dashboard
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('student_profile') }}">
                                    <i class="fa-solid fa-address-card"></i>
                                    <span>
                                        Student Profile
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('enrolled_courses') }}">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <span>
                                        Enrolled Courses
                                    </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- main content start
        ================================================== -->
        <div class="page-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <!-- main content end
        ================================================== -->

    </div>


    <script src="{{ asset('assets') }}/js/jquery-3.6.0.min.js" type="text/javascript"></script>

    <script src="{{ asset('assets') }}/js/feather.min.js" type="text/javascript"></script>

    <script src="{{ asset('assets') }}/js/jquery.slimscroll.min.js" type="text/javascript"></script>



    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/js/feather.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    @stack('tableJS')

    <script src="{{ asset('assets') }}/plugins/apexchart/apexcharts.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/plugins/apexchart/chart-data.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>


    <script src="{{ asset('assets') }}/js/script.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/js/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="a0ab8ad93cdb647a28609877-|49" defer=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @yield('alert')
    @stack('customeJS')
    @stack('pluginJs')
</body>

</html>
