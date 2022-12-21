<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="admin/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="admin/assets/css/style.css" />
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                <a class="sidebar-brand brand-logo" href="{{('redirect')}}"><img src="admin/assets/images/logo.png" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="admin/assets/images/faces/face1.jpg" alt="profile" />
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
                        <div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                            @if (Route::has('login'))
                            <div>
                                @auth
                                <div class="card">
                                    <div style="padding:30px; position:center">
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
                                        <h1> Project Registration </h1>
                                        <form action="/addProject" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input style="border-radius:3px; border: 2px solid #b3b3cc" type="hidden" name="id" placeholder="Enter Student ID:"><br>
                                                <p style="color:red"> * is compulsory </p>
                                                Title*<br>
                                                <input style="border-radius:3px; border: 2px solid #b3b3cc" type="text" name="title" placeholder="Enter Title:" required><br><br>
                                                Category*<br>
                                                <select style="border-radius:3px; border: 2px solid #b3b3cc" name="category" required>
                                                    <option value="" selected>--Please Select--</option>
                                                    <option value="Development">Development</option>
                                                    <option value="Research">Research</option>
                                                </select><br><br>
                                                Student*<br>
                                                <select style="border-radius:3px; border: 2px solid #b3b3cc" name="studid" required>
                                                    <option value="" selected>--Please Select--</option>
                                                    @foreach($students as $row)
                                                    <option>{{$row['id']}}</option>
                                                    @endforeach
                                                </select><br><br>
                                                Start Date*<br>
                                                <input style="border-radius:3px; border: 2px solid #b3b3cc" type="date" name="start_date" id="start_date" placeholder="Date:" required><br><br>
                                                End Date* :<br>
                                                <input style="border-radius:3px; border: 2px solid #b3b3cc" type="date" name="end_date" id="end_date" placeholder="Date:" required><br><br>
                                                Supervisor*<br>
                                                <select style="border-radius:3px; border: 2px solid #b3b3cc" name="svid" required>
                                                    <option value="" selected>--Please Select--</option>
                                                    @foreach($users as $row)
                                                    <option>{{$row['id']}}</option>
                                                    @endforeach
                                                </select><br><br>
                                                Examiner 1*<br>
                                                <select style="border-radius:3px; border: 2px solid #b3b3cc" name="exid1" required>
                                                    <option value="" selected>--Please Select--</option>
                                                    @foreach($users as $row)
                                                    <option>{{$row['id']}}</option>
                                                    @endforeach
                                                </select><br><br>
                                                Examiner 2*<br>
                                                <select style="border-radius:3px; border: 2px solid #b3b3cc" name="exid2" required>
                                                    <option value="" selected>--Please Select--</option>
                                                    @foreach($users as $row)
                                                    <option>{{$row['id']}}</option>
                                                    @endforeach
                                                </select><br><br>
                                                Duration<br>
                                                <input style="border-radius:3px; border: 2px solid #b3b3cc" type="text" name="duration" id="duration" placeholder="Duration:" readonly required><br><br>
                                                Progress*<br>
                                                <select style="border-radius:3px; border: 2px solid #b3b3cc" name="progress" required>
                                                    <option value="" selected>--Please Select--</option>
                                                    <option value="Milestone 1">Milestone 1</option>
                                                    <option value="Milestone 2">Milestone 2</option>
                                                    <option value="Final Report">Final Report</option>
                                                </select><br><br>
                                                Status*<br>
                                                <select style="border-radius:3px; border: 2px solid #b3b3cc" type="text" name="status" required>
                                                    <option value="" selected>--Please Select--</option>
                                                    <option value="On Track">On Track</option>
                                                    <option value="Delayed">Delayed</option>
                                                    <option value="Extended">Extended</option>
                                                    <option value="Completed">Completed</option>
                                                </select><br><br>
                                            </div>
                                            <div style="text-align:center">
                                                <button style="font-size: 12px;" type="reset" class="btn btn-sm ml-3 btn-secondary"> Reset </button>
                                                <input style="font-size: 12px;" type="submit" class="btn btn-sm ml-3 btn-success" name="submit">
                                            </div>
                                        </form>
                                    </div>
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
                <div class="card">

                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © FEMSY 2022</span>
                    </div>
                </footer>
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
