<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>FEMSY Site</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="admin/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="admin/assets/css/style.css" />
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

</head>
<style>
    .button {
        border: none;
        color: white;
        border-radius: 4px;
        padding: 4px 8px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button1 {
        background-color: white;
        color: black;
        border: 2px solid #FFD700;
    }

    .button1:hover {
        background-color: #FFD700;
        color: white;
    }

    .button2 {
        background-color: white;
        color: black;
        border: 2px solid #DC143C;
    }

    .button2:hover {
        background-color: #DC143C;
        color: white;
    }

    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: white;
        color: white;
        text-align: center;
    }
</style>

<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                <a class="sidebar-brand brand-logo" href="/"><img src="/admin/assets/images/logo.png" alt="logo" /></a>

            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles light"></div>
                    <div class="tiles dark"></div>
                </div>
            </div>
            <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
                    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <ul class="navbar-nav ">
                        <li class="nav-item nav-profile dropdown border-0">
                            <a href="{{ route('login') }}" style="color:grey ">Login</a>
                        </li>
                        <li class="nav-item nav-profile dropdown border-0">
                            <a href="{{ route('register') }}" style="color:grey ">Register</a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper pb-0">

                    <div class="row">
                        <div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
                            @if (Route::has('login'))
                            @auth
                            @else
                            <div class="page-header flex-wrap">
                                <h3 class="mb-0"> Hi, Welcome to Femsy!</h3>
                            </div>
                            <footer class="footer">
                                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © FEMSY 2022</span>
                                </div>
                            </footer>
                            <a style="font-size: 16px;" ; class="button button2" href="{{ route('login') }}"> Login
                                @if (Route::has('register'))
                                <a style="font-size: 16px;" ; class="button button2" href="{{ route('register') }}"> Register
                                    @endif
                                    @endauth

                                    @endif


                                    <!-- container-scroller -->
                                    <!-- plugins:js -->
                                    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
                                    <!-- endinject -->
                                    <!-- Plugin js for this page -->
                                    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
                                    <script src="admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
                                    <script src="admin/assets/vendors/flot/jquery.flot.js"></script>
                                    <script src="admin/assets/vendors/flot/jquery.flot.resize.js"></script>
                                    <script src="admin/assets/vendors/flot/jquery.flot.categories.js"></script>
                                    <script src="admin/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
                                    <script src="admin/assets/vendors/flot/jquery.flot.stack.js"></script>
                                    <script src="admin/assets/vendors/flot/jquery.flot.pie.js"></script>
                                    <!-- End plugin js for this page -->
                                    <!-- inject:js -->
                                    <script src="admin/assets/js/off-canvas.js"></script>
                                    <script src="admin/assets/js/hoverable-collapse.js"></script>
                                    <script src="admin/assets/js/misc.js"></script>
                                    <!-- endinject -->
                                    <!-- Custom js for this page -->
                                    <script src="admin/assets/js/dashboard.js"></script>
                                    <!-- End custom js for this page -->
</body>

</html>