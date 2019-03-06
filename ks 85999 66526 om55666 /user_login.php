<?php
session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Form </title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
             <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                         <div id="logo">
                            <a href="#">
                              <img alt="Alumni" height="70" src="img/logo4.jpg" width="225">
                            </a>
                          </div>
                          
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="text-center ">       
                            <?php $msg->display(); ?>
    
                        </div>
                            <div class="form-top" back>
                                <div class="form-top-left">
                                    <h3>Login </h3>
                                    <!-- <p>Enter your mail id , password and registration no to log on:</p> -->
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom text-center">
                                <form role="form" action="user_login_save.php" method="post" class="login-form form-inline">
                                    <div class="form-group">
                                        <label  for="form-username">Username</label>
                                        <input type="text" name="email"  placeholder="Enter your email..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-password">Password</label>
                                        <input type="password"  name="password"  placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn">Sign in!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                            <h3>...OR...</h3>
                            <div class="social-login-buttons">
                                <a class="btn btn-link-2" href="http://www.innovadorslab.co.in/ksom">
                                    <i class="fa fa-home"></i> HOME
                                </a>                             
                               
                                <a class="btn btn-link-2" href="user_registration_form.php">
                                    <i class="fa fa-user-o"></i> Alumni Registered
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>


           <!-- Javascript -->
          <script src="assets/js/jquery-1.11.1.min.js"></script>
          <script src="assets/bootstrap/js/bootstrap.min.js"></script>
          <script src="assets/js/jquery.backstretch.min.js"></script>
          <script src="assets/js/scripts.js"></script>
          
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>
</html>