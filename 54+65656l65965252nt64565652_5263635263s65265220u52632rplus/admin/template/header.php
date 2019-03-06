<!DOCTYPE html>
<html>
    

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?=$title?></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="../assert/assets/images/favicon.ico">

        <!-- App css -->
        <link href="../assert/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assert/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assert/assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                        <!--Upcube-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="admin_dashboard.php" class="logo">
                            <img src="../assert/assets/images/logos.png" alt="" height="40" class="logo-small" style="background: white; border-radius: 22px;">
                            <img src="../assert/assets/images/ltgrouplogo.jpg" alt="" height="50" class="logo-large">
                            <!-- <img src="../assert/assets/images/logo-sm.png" alt="" height="22" class="logo-small">
                            <img src="../assert/assets/images/logo.png" alt="" height="24" class="logo-large"> -->
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <!-- Search input -->
                        <!-- <div class="search-wrap" id="search-wrap">
                            <div class="search-bar">
                                <input class="search-input" type="search" placeholder="Search" />
                                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                    <i class="mdi mdi-close-circle"></i>
                                </a>
                            </div>
                        </div> -->

                        <ul class="list-inline float-right mb-0">
                            <!-- Search -->
                           <!--  <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                                    <i class="mdi mdi-magnify noti-icon"></i>
                                </a>
                            </li> -->
                            <!-- Messages-->
                           
                            <!-- notification-->
                             
                            <!-- User-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="../assert/assets/images/logos.png" alt="user" class="rounded-circle" style="background: white; border-radius: 22px;">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                                    <a class="dropdown-item" href="#"><span class="badge badge-success pull-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a> -->
                                    <!-- <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"><i class="dripicons-exit text-muted"></i> Logout</a>
                                </div>
                            </li>
                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <?php include 'menu.php';

            ?>
        </header>
        <!-- End Navigation Bar-->

 <?php
  // include 'content.php';
   echo "$contents"; 

  ?>

        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © <?php echo date('Y')?> <a href ="#" >I-lab</a> <img src="../assert/assets/images/logo-light.png"> -  <!-- <i class="mdi mdi-heart text-danger"></i> --> by Preetish.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="../assert/assets/js/jquery.min.js"></script>
        <script src="../assert/assets/js/popper.min.js"></script>
        <script src="../assert/assets/js/bootstrap.min.js"></script>
        <script src="../assert/assets/js/modernizr.min.js"></script>
        <script src="../assert/assets/js/waves.js"></script>
        <script src="../assert/assets/js/jquery.slimscroll.js"></script>
        <script src="../assert/assets/js/jquery.nicescroll.js"></script>
        <script src="../assert/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="../assert/assets/js/app.js"></script>
        <script type="text/javascript">
             $(document).on("keypress", "form", function(event) { 
          return event.keyCode != 13;
      });
        // here this restrict back button submition
        $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });
        </script>
    </body>
</html>