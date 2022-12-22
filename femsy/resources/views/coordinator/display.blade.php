<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Site</title>
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
        padding-left:80%;
        left: 0%;
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
                <a class="sidebar-brand brand-logo" href="{{('redirect')}}"><img src="/admin/assets/images/logo.png" alt="logo" /></a>

            </div>
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="admin/assets/images/faces/profile.png" alt="profile" />
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column pr-3">
                            <span class="font-weight-medium mb-2">{{Auth::user()->name}}</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <span class="menu-title">Users</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{('/list')}}">Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{('/list2')}}">Users</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{('redirect')}}">
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        <span class="menu-title">Project List</span>
                    </a>
                </li>
            </ul>
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

                    <ul class="navbar-nav navbar-nav-right ml-lg-auto">

                        <li class="nav-item nav-profile dropdown border-0">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                                <span class="profile-name">{{Auth::user()->name}}</span>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <i class="mdi mdi-logout mr-2 text-primary"></i>
                                </a>
                            </div>
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
                            <div>
                                @auth
                                <div class="page-header flex-wrap">
                                    <h3 class="mb-0"> Hi, {{Auth::user()->name}}. Welcome back!</h3>
                                </div>
                                <div style="position: relative; right:0px">
                                    <h5> Registered Projects
                                        <div class="d-flex" style="float:right">
                                            <a style="font-size: 12px;" ; class="btn btn-sm ml-3 btn-success" ; href={{('pushproj')}}> Add New Project </a>
                                        </div><br>
                                    </h5><br>
                                    <table bgcolor="white" style="border-radius: 8px;">
                                        <tr style="font-size: 12px;">
                                            <th style="padding:20px">ID</th>
                                            <th style="padding:20px">Title</th>
                                            <th style="padding:20px">Category</th>
                                            <th style="padding:20px">Student</th>
                                            <th style="padding:20px">Start Date</th>
                                            <th style="padding:20px">End Date</th>
                                            <th style="padding:20px">Supervisor</th>
                                            <th style="padding:20px">Examiner 1</th>
                                            <th style="padding:20px">Examiner 2</th>
                                            <th style="padding:20px">Duration <br />(Months)</th>
                                            <th style="padding:20px">Progress</th>
                                            <th style="padding:20px">Status</th>
                                            <th style="padding:20px">Operation</th>

                                        </tr>
                                        @foreach($projects as $x)
                                        <tr align="center" style="font-size: 12px;">
                                            <td>{{$x['id']}}</td>
                                            <td>{{$x['title']}}</td>
                                            <td>{{$x['category']}}</td>
                                            @foreach($students as $y)
                                            @if($x['studid'] == $y['id'])
                                            <td>{{$y['name']}}</td>
                                            @endif
                                            @endforeach
                                            <td>{{$x['start_date']}}</td>
                                            <td>{{$x['end_date']}}</td>
                                            @foreach($users as $y)
                                            @if($x['svid'] == $y['id'])
                                            <td>{{$y['name']}}</td>
                                            @endif
                                            @if($x['exid1'] == $y['id'])
                                            <td>{{$y['name']}}</td>
                                            @endif
                                            @if($x['exid2'] == $y['id'])
                                            <td>{{$y['name']}}</td>
                                            @endif
                                            @endforeach
                                            <td>{{$x['duration']}}</td>
                                            <td>{{$x['progress']}}</td>
                                            <td>{{$x['status']}}</td>
                                            <td style="font-size: 10px;" ; class="button button2"><a href={{"delproj/".$x['id']}}> DELETE </td>
                                            <td style="font-size: 10px;" ; class="button button1"><a href={{"updproj/".$x['id']}}> UPDATE </td>
                                        </tr>
                                        @endforeach
                                    </table><br>
                                    <span>
                                        {{$projects->links()}}
                                    </span>

                                    <div class="card" style="border-radius: 8px;">
                                        <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                                            <!--datepicker-->
                                            <div class="card-body">
                                                <div id="inline-datepicker" class="datepicker table-responsive"></div>
                                            </div>
                                        </div>
                                        <!--datepicker ends-->
                                    </div>
                                </div>
                                <br><br><br><br><br>
                                <div class="card">

                                </div>
                                <footer class="footer">
                                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © FEMSY 2022</span>
                                    </div>
                                </footer>
                            </div>

                            @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                            @endauth
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
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