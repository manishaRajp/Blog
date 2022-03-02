<?php 
$setting = App\Models\Setting::get()->first();
// dd($setting);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Welcome To My Website')</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{asset('admin/assets/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/chartist.min.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!-- <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" /> -->
    @stack('css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center">
                <a class="navbar-brand brand-logo" href="index">
                    <img src='{{asset("$setting->logo")}}' alt="logo" class="logo-dark" />
                </a>

                <a class="navbar-brand brand-logo-mini" href="index"><img src="{{asset('admin/assets/images/logo-mini.svg')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
                <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome blog dashboard! </h5>
                <ul class="navbar-nav navbar-nav-right ml-auto">
                    <form class="search-form d-none d-md-block" action="#">
                        <i class="icon-magnifier"></i>
                        <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>

                    <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle ml-2" src="{{asset('./admin/assets/images/face8.jpg')}}" alt="Profile image"> <span class="font-weight-normal">Hinal Mevada </span></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="{{asset('./admin/assets/images/face8.jpg')}}" alt="Profile image">
                                <p class="mb-1 mt-3">Hinal Mevada</p>
                                <p class="font-weight-light text-muted mb-0">hinal5729@gmail.com</p>
                            </div>
                            <!-- <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a> -->
                            <a class="dropdown-item" href="{{ route('admin.adminchange',Auth::guard('admin')->user()->id) }}"><i class="fa fa-key icon-speech text-primary" style="font-size:25px"></i>&nbsp; Change Password</a>
                            <a class="dropdown-item" href="{{ route('admin.setting',Auth::guard('admin')->user()->id) }}"><i class="fa fa-cog text-primary"></i>&nbsp; Setting</a>
                            
                            <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();"> <i class="dropdown-item-icon icon-power text-primary" aria-hidden="true" style="font-size:26px;"></i>logout</a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="profile-image">
                                <img class="img-xs rounded-circle" src="{{asset('./admin/assets/images/face8.jpg')}}" alt="profile image">
                                <div class="dot-indicator bg-success"></div>
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name">Hinal Mevada</p>
                                <p class="designation">Administrator</p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item nav-category">
                        <span class="nav-link">Dashboard</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard">
                            <span class="menu-title">Dashboard</span>
                            <i class="icon-screen-desktop menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.category.index')}}">
                            <span class="menu-title">Category</span>
                            <i class="icon-book-open menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.blogs.index')}}">
                            <span class="menu-title">Blog</span>
                            <i class="icon-book-open menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-list">
                            <span class="menu-title">User list</span>
                            <i class="icon-grid menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.about_show')}}">
                            <span class="menu-title">About Us</span>
                            <i class="icon-grid menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.contact_show')}}">
                            <span class="menu-title">Contact Us</span>
                            <i class="icon-grid menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-category"><span class="nav-link">Sample Pages</span></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <span class="menu-title">General Pages</span>
                            <i class="icon-doc menu-icon"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.login') }}"> Login </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('register')}}"> Register </a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            @yield('main')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('admin/assets/js/vendor.bundle.base.js')}}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- <script src="{{asset('admin/assets/js/Chart.min.js')}}"></script> -->
    <script src="{{asset('admin/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/daterangepicker.js')}}"></script>
    <!-- <script src="{{asset('admin/assets/js/chartist.min.js')}}"></script> -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="{{asset('admin/assets/js/dashboard.js')}}"></script> -->
    <!-- End custom js for this page -->
</body>
@stack('js')

</html>