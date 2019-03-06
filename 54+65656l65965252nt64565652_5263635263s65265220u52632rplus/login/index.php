<?php 
session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<!DOCTYPE html>
<html>
    

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Innovadors Lab  - Login Panel</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="../assert/assets/images/favicon.ico">

        <!-- App css -->
        <link href="../assert/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assert/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assert/assets/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <style media="screen">
            #background {
               /* min-height: 0;*/
                background-image: url('back.jpg');
                /*background-repeat: no-repeat;
                background-size: cover;*/
            }

        </style>
  <!-- Google Font -->
  <script src="../js/rainyday.min.js"></script>
        <script>
        
            // function run() {
            //     var rainyDay = new RainyDay({
            //         image: 'background' 
            //         // Target p element with ID, RainyDay.js will use backgorund image to simulate rain effects.
            //     });
            //     window.setTimeout(function () {
            //         // rainyDay.destroy()
            //     }, 1000)
            // }

        </script>



    <body  >
        
        <!-- Begin page -->
        <div class="accountbg" id="background"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.php" class="logo logo-admin"><img src="logo.jpg" height="35" alt="logo"></a>
                    </h3>

                    <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>
                      <h5 class="text-light"><?php $msg->display(); ?></h5>
                    <div class="p-3">
                        <form class="form-horizontal m-t-20" action="login_process.php" autocomplete="off" method="POST">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" required="" name="email" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                </div>
                            </div>

                           

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                        
                        </form>
                    </div>

                </div>
            </div>
        </div>



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
             $(document).ready(function(){
                // alert();
                $('body').css({height: 0});
                $('body').css('height', '100');
                  var rainyDay = new RainyDay({
                    image: 'background' // Target p element with ID, RainyDay.js will use backgorund image to simulate rain effects.
                });
                $('body').css({height: 0});
                window.setTimeout(function () {
                    // rainyDay.destroy()
                }, 1000)
                // $('body').css('height', null);
                $('body').css({height: 0});
                $('body').css('height', '100');
                });
            

        </script>

    </body>
</html>