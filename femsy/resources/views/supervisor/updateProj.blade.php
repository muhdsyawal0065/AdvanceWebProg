<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <link rel="stylesheet" href="/admin/assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="/admin/assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="/admin/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/style.css" />
    <link rel="shortcut icon" href="/admin/assets/images/favicon.png" />
</head>
<style>
    input[type=text] {
        width: 70%;
        border: none;
        border-bottom: 2px solid #1E90FF;
    }

    input[type=date] {
        width: 70%;
        border: none;
        border-bottom: 2px solid #1E90FF;
    }

    select {
        width: 70%;
        border: none;
        border-bottom: 2px solid #1E90FF;
    }
    .footer {
        position: fixed;
        padding-left:80%;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: white;
        color: white;
        text-align: center;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                        <script>
                                            const setup = () => {
                                                let firstDate = $('#start_date').val();
                                                let secondDate = $('#end_date').val();
                                                const findTheDifferenceBetweenTwoDates = (firstDate, secondDate) => {
                                                    firstDate = new Date(firstDate);
                                                    secondDate = new Date(secondDate);
                                                    let timeDifference = Math.abs(secondDate.getTime() - firstDate.getTime());
                                                    let millisecondsInADay = (1000 * 3600 * 24);
                                                    let differenceOfDays = Math.ceil(timeDifference / millisecondsInADay);
                                                    return differenceOfDays;
                                                }
                                                let result = findTheDifferenceBetweenTwoDates(firstDate, secondDate);
                                                result = Math.floor(result / 30)
                                                $("#duration").val(result);
                                            }

                                            $(document).ready(function() {
                                                $('#start_date').change(function() {
                                                    if ($('#end_date').val() != '') {
                                                        setup();
                                                    }
                                                })
                                                $('#end_date').change(function() {
                                                    if ($('#start_date').val() != '') {
                                                        setup();
                                                    }
                                                })
                                            });
                                        </script>
<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                <a class="sidebar-brand brand-logo" href="{{('/redirect')}}"><img src="/admin/assets/images/logo.png" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="/admin/assets/images/faces/profile.png" alt="profile" />
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column pr-3">
                            <span class="font-weight-medium mb-2">{{Auth::user()->name}}</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{('/list')}}">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <span class="menu-title">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{('/redirect')}}">
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
                    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="/admin/assets/images/logo-mini.svg" alt="logo" /></a>
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
                        <div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 ">
                            @if (Route::has('login'))
                            <div>
                                @auth
                                <div class="card" style="border-radius: 8px;">
                                    <div style="padding:30px; position:center">
                                        <h1> Project Update </h1>
                                        <form action="/editproj" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$projects['id']}}"><br>
                                            <p style="color:red"> * is compulsory </p>
                                            <b>Title</b><br><br>
                                            <input style="border-bottom: 2px solid #DCDCDC;" type="text" name="title" value="{{$projects['title']}}" readonly><br><br>
                                            <b>Category</b><br><br>
                                            <input style="border-bottom: 2px solid #DCDCDC;" type="text" name="category" value="{{$projects['category']}}" readonly><br><br>
                                            <b>Student</b><br><br>
                                            @foreach($students as $row)
                                            @if ($projects['studid'] == $row['id'])
                                            <input style="border-bottom: 2px solid #DCDCDC;" type="text" name="studid" value="{{$row['id']}}" readonly><br><br>
                                            @endif
                                            @endforeach
                                            <b>Start Date*</b><br><br>
                                            <input type="date" name="start_date" id="start_date" value="{{$projects['start_date']}}" required><br><br>
                                            <b>End Date*</b><br><br>
                                            <input type="date" name="end_date" id="end_date" value="{{$projects['end_date']}}" required><br><br>
                                            <b>Supervisor</b><br><br>
                                            @foreach($users as $row)
                                            @if ($projects['svid'] == $row['id'])
                                            <input style="border-bottom: 2px solid #DCDCDC;" type="text" name="svid" value="{{$row['id']}}" readonly><br><br>
                                            @endif
                                            @endforeach
                                            <b>Examiner 1</b><br><br>
                                            @foreach($users as $row)
                                            @if ($projects['exid1'] == $row['id'])
                                            <input style="border-bottom: 2px solid #DCDCDC;" type="text" name="exid1" value="{{$row['id']}}" readonly><br><br>
                                            @endif
                                            @endforeach
                                            <b>Examiner 2</b><br><br>
                                            @foreach($users as $row)
                                            @if ($projects['exid2'] == $row['id'])
                                            <input style="border-bottom: 2px solid #DCDCDC;" type="text" name="exid2" value="{{$row['id']}}" readonly><br><br>
                                            @endif
                                            @endforeach
                                            <b>Duration</b><br><br>
                                            <input style="border-bottom: 2px solid #DCDCDC;" type="text" name="duration" id="duration" value="{{$projects['duration']}}" readonly><br><br>
                                            <b>Progress*</b><br><br>
                                            <select name="progress" required>
                                                <option value="">--Please Select--</option>
                                                <option value="Milestone 1" @if ($projects['progress']=="Milestone 1" ) selected @endif>Milestone 1</option>
                                                <option value="Milestone 2" @if ($projects['progress']=="Milestone 2" ) selected @endif>Milestone 2</option>
                                                <option value="Final Report" @if ($projects['progress']=="Final Report" ) selected @endif>Final Report</option>
                                            </select><br><br>
                                            <b>Status*</b><br><br>
                                            <select name="status" required>
                                                <option value="">--Please Select--</option>
                                                <option value="On Track" @if ($projects['status']=="On Track" ) selected @endif>On Track</option>
                                                <option value="Delayed" @if ($projects['status']=="Delayed" ) selected @endif>Delayed</option>
                                                <option value="Extended" @if ($projects['status']=="Extended" ) selected @endif>Extended</option>
                                                <option value="Completed" @if ($projects['status']=="Completed" ) selected @endif>Completed</option>
                                            </select><br><br>
                                            <div style="text-align:center">
                                                <button style="font-size: 12px;" type="reset" class="btn btn-sm ml-3 btn-secondary"> Reset </button>
                                                <input style="font-size: 12px;" type="submit" class="btn btn-sm ml-3 btn-success" name="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div><br><br><br><br><br><br>
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
    <script src="/admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/admin/assets/vendors/flot/jquery.flot.js"></script>
    <script src="/admin/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="/admin/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="/admin/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="/admin/assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="/admin/assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/admin/assets/js/off-canvas.js"></script>
    <script src="/admin/assets/js/hoverable-collapse.js"></script>
    <script src="/admin/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>