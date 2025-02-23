<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Trucking System</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    {{-- <link rel="icon" href="/assets/img/icon.ico" type="image/x-icon" /> --}}
    {{-- bawah ini buat ganti icon di bar atas web --}}

    <link rel="icon" href="/assets/img/warehouse logo.png" type="image/x-icon" />
    <!-- Fonts and icons -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['/assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/azzara.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>


<style>
    /* Success Animation */
    #alertSuccess {
        position: relative;
        animation-name: success;
        animation-duration: 0.7s;
        animation-iteration-count: 1;
    }

    @keyframes success {
        0% {
            left: 200px;
            top: 0px;
            background-color: rgb(0, 255, 76);
        }

        100% {
            left: 0px;
            top: 0px;
            background-color: white;
        }
    }


    /* Failed Animation */
    #alertFailed {
        position: relative;
        animation-name: failedAnimation;
        animation-duration: 0.7s;
        animation-iteration-count: 1;
    }

    @keyframes failedAnimation {
        0% {
            left: 200px;
            top: 0px;
            background-color: red;
        }

        100% {
            left: 0px;
            top: 0px;
            background-color: white;
        }
    }


    /* Deleted Notification */
    #alertDelete {
        position: relative;
        animation-name: deleteAnimation;
        animation-duration: 0.7s;
        animation-iteration-count: 1;
    }

    @keyframes deleteAnimation {
        0% {
            left: 200px;
            top: 0px;
            background-color: orange;
        }

        100% {
            left: 0px;
            top: 0px;
            background-color: white;
        }
    }

    #overlayPage {
        position: fixed;
        display: none;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: black;
        opacity: 0.2;
        z-index: 1;
        overflow-x: hidden;
        /* Disable horizontal scroll */
    }
</style>

{{-- <body onload=display_ct();> --}}




<body>
    <div id="overlayPage" style="display:none"></div>
    <div class="wrapper">
        <!--
    Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
  -->

        <div class="main-header" data-background-color="blue">
            <!-- Logo Header -->
            <div class="logo-header">

                <a href="#" class="logo text-center">
                    {{-- <img src="/assets/img/logoazzara.svg" alt="navbar brand" class="navbar-brand"> --}}
                    <h2 alt="navbar brand" class="navbar-brand font-weight-bold" style="color: white">Trucking System</h2>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">

                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <div id="time" class="d-flex p-2" style="color: white; font-weight:bold"></div>


                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="/assets/img/552721 user logo.png" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="../../assets/img/552721 user logo.png"
                                                alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text mt-2">
                                            <h4>name</h4>
                                            <p class="text-muted">email</p>
                                        </div>
                                    </div>
                                </li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Change
                                    Password</a>
                                <a class="dropdown-item" href="/logout">Logout</a>
                        </li>
                    </ul>
                    </li>

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <div class="sidebar">

            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="../../assets/img/552721 user logo.png" alt="..."
                                class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" aria-expanded="true">
                                <span>
                                    User: Admin
                                    <span class="user-level">Role: Admin</span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav">
                        <li class="nav-item @yield('home')">
                            <a href="/">
                                <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item @yield('category')">
                            <a href="/trucks">
                                <i class="fa fa-truck"></i>
                                <p>Trucks</p>
                            </a>
                        </li>
                        <li class="nav-item @yield('location')">
                            <a href="/drivers">
                                <i class="fas fa-user"></i>
                                <p>Drivers</p>
                            </a>
                        </li>
                        <li class="nav-item @yield('categoryStock')">
                            <a href="/parts">
                                <i class="fa fa-clone"></i>
                                <p>Spare Parts</p>
                            </a>
                        </li>
                        <li class="nav-item @yield('inactiveItem')">
                            <a href="/about">
                                <i class="fa fa-question-circle"></i>
                                <p>About This Site</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    @if (session('sukses_notif'))
                        <div class="alert alert-success alert-block" id="alertSuccess">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('sukses_notif') }}</strong>
                        </div>
                    @elseif (session('gagal_notif'))
                        <div class="alert alert-danger alert-block" id="alertFailed">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Gagal: {{ session('gagal_notif') }}</strong>
                        </div>
                    @elseif ($errors->any())
                        <div class="alert alert-danger alert-block" id="alertFailed">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Gagal: {{ $errors->first() }}</strong>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- Bootstrap Toggle -->
    <script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Azzara JS -->
    <script src="/assets/js/ready.min.js"></script>
    {{-- select 2 --}}

    <script>
        $(document).ready(function() {
            $('#add-row').DataTable({
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        function showTime() {
            var date = new Date(),
                utc = new Date(Date.UTC(
                    date.getFullYear(),
                    date.getMonth(),
                    date.getDate(),
                    date.getHours() - 7,
                    date.getMinutes(),
                    date.getSeconds()
                ));

            document.getElementById('time').innerHTML = utc.toLocaleTimeString();
        }

        setInterval(showTime, 10);

        // https://stackoverflow.com/questions/45944210/laravel-carbon-reloading-current-time
    </script>

    @yield('script')
</body>

</html>
