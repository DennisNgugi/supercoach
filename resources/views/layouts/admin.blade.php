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
                    <div><a href="index.html" class="logo"><img src="/assets/images/logo.png" alt="" height="26"></a></div><!-- End Logo-->
                    <div class="menu-extras topbar-custom navbar p-0">
                        <ul class="list-inline d-none d-lg-block mb-0">
                            <li class="list-inline-item dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">Create New <i
                                      class="mdi mdi-plus"></i></a>
                                <div class="dropdown-menu dropdown-menu-animated"><a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="list-inline-item notification-list"><a href="#" class="nav-link waves-effect">Activity</a></li>
                        </ul><!-- Search input -->
                        <div class="search-wrap" id="search-wrap">
                            <div class="search-bar"><input class="search-input" type="search" placeholder="Search"> <a href="#" class="close-search toggle-search" data-target="#search-wrap"><i class="mdi mdi-close-circle"></i></a></div>
                        </div>
                        <ul class="list-inline ml-auto mb-0">
                            <!-- notification-->
                            <li class="list-inline-item dropdown notification-list"><a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap"><i class="mdi mdi-magnify noti-icon"></i></a></li>
                            <li class="list-inline-item dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="mdi mdi-bell-outline noti-icon"></i>
                                    <span class="badge badge-pill noti-icon-badge">3</span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>Notification (3)</h5>
                                    </div>
                                    <div class="slimscroll-noti">
                                        <!-- item--> <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                        </a><!-- item--> <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                            <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                                        </a><!-- item--> <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                            <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span></p>
                                        </a><!-- item--> <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                                            <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                                        </a><!-- item--> <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                        </a></div><!-- All--> <a href="javascript:void(0);" class="dropdown-item notify-all">View All</a>
                                </div>
                            </li><!-- User-->
                            <li class="list-inline-item dropdown notification-list nav-user"><a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img
                                      src="/assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle"> <span class="d-none d-md-inline-block ml-1">David M. Bailey <i class="mdi mdi-chevron-down"></i></span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown"><a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a> <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i>
                                        My Wallet</a> <a class="dropdown-item" href="#"><span class="badge badge-success float-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a> <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i>
                                        Lock screen</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="dripicons-exit text-muted"></i> Logout</a>
                                </div>
                            </li>
                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle--> <a class="navbar-toggle nav-link">
                                    <div class="lines"><span></span> <span></span> <span></span></div>
                                </a><!-- End mobile menu toggle-->
                            </li>
                        </ul>
                    </div><!-- end menu-extras -->
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
