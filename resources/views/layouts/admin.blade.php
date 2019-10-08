<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Supercoach</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="ThemeDesign" name="author">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- App Icons -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="/assets/images/favicon.ico"><!-- morris css -->
    <!-- <link rel="stylesheet" href="/plugins/morris/morris.css">App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div> -->
    <div class="header-bg" id="app">
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">
                    <!-- Logo-->
                    <div><router-link to="/" class="logo">
                        <h3 class="text-white">Supercoach Sacco System</h3>
                    </router-link></div><!-- End Logo-->

                    <div class="clearfix"></div>
                </div><!-- end container -->
            </div><!-- end topbar-main -->
            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="has-submenu"><router-link to="/"><i class="dripicons-home"></i> Dashboard</router-link></li>
                            <li class="has-submenu"><a href="#"><i class="dripicons-suitcase"></i> Members <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><router-link to="/member/create">Add member</router-link></li>
                                            <li><router-link to="/member">Members list</router-link></li>

                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-submenu"><a href="#"><i class="dripicons-suitcase"></i> Vehicles <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><router-link to="/vehicle/create">Add vehicle</router-link></li>
                                            <li><router-link to="/vehicle">Vehicle list</router-link></li>

                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-submenu"><a href="#"><i class="dripicons-suitcase"></i> Shares <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><router-link to="/share/create">Add shares</router-link></li>
                                            <li><router-link to="/share">Shares list</router-link></li>

                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-submenu"><a href="#"><i class="dripicons-suitcase"></i> Loan <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><router-link to="/loan/create">Add loan</router-link></li>
                                            <li><router-link to="/loan">Loan list</router-link></li>
                                            <li><router-link to="/loan">Unsettled loan</router-link></li>

                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-submenu"><a href="#"><i class="dripicons-suitcase"></i> Report <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><router-link to="/share/report">Shares report</router-link></li>
                                            <li><router-link to="/loan">Loan report</router-link></li>


                                        </ul>
                                    </li>

                                </ul>
                            </li>
                        </ul><!-- End navigation menu -->
                    </div><!-- end #navigation -->
                </div><!-- end container -->
            </div><!-- end navbar-custom -->
        </header><!-- End Navigation Bar-->
        <div class="wrapper">
            <div class="container-fluid">

          <router-view></router-view>
        </div>
      </div>

    </div><!-- header-bg -->







    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">© 2019 </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- jQuery  -->
    <script src="/js/app.js"></script>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/modernizr.min.js"></script>
    <script src="/assets/js/waves.js"></script>
    <script src="/assets/js/jquery.slimscroll.js"></script>
    <!--Morris Chart-->
    <!-- <script src="/plugins/morris/morris.min.js"></script> -->
    <script src="/plugins/raphael/raphael.min.js"></script><!-- dashboard js -->
    <!-- <script src="/assets/pages/dashboard.int.js"></script><!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>

</html>
