<?php 
session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Login Page</title>

    <!-- Favicon -->
    <link href="../assert/img/logo.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="../assert/img/logo.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="../assert/img/logo.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="../assert/img/logo.png" rel="apple-touch-icon" type="image/png">
	<link href="../assert/img/logo.png" rel="icon" type="image/png">
	<link href="../assert/img/logo.png" rel="shortcut icon">
    <!-- /Favicon -->

    <!-- Global stylesheets -->
	<link type="text/css" rel="stylesheet" href="login/login_assert/lib/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="login/login_assert/lib/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="login/login_assert/lib/css/main.css">
    <!-- /Global stylesheets -->
</head>

<body>
<body>

    <div class="auth-container">
        <div class="center-block">
            <div class="auth-module">
                <div class="toggle">
                    <i class="icon-user-lock"></i>
                    <!-- <div class="tip">Click here to register</div> -->
                </div>

                <!-- Login form -->
                <div class="form">

                    <h1 class="text-light">Login to your account</h1>
                    <br>
                    <h5 class="text-light"><?php $msg->display(); ?></h5>
                    <form class="form-horizontal" action="login_process" method="POST">
                        <div class="form-group">
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" name="userid" class="form-control" autocomplete="off" placeholder="Username" required="">
                                <div class="form-control-feedback">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required="">
                                <div class="form-control-feedback">
                                    <i class="icon-key"></i>
                                </div>
                            </div>
                           <!--  <div class="login-options">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="styled" checked="checked">
                                        Remember me
                                    </label>
                                </div>
                            </div> -->
                            <button class="btn btn-info btn-block">Sign In</button>
                        </div>
                    </form>
                </div>
                <!-- /Login form -->
                <!-- Registration form -->
                <!-- <div class="form">
                    <h1>Create an account</h1>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control" placeholder="Username">
                                <div class="form-control-feedback">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" placeholder="Password">
                                <div class="form-control-feedback">
                                    <i class="icon-key"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" placeholder="Confirm Password">
                                <div class="form-control-feedback">
                                    <i class="icon-key"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="email" class="form-control" placeholder="Email">
                                <div class="form-control-feedback">
                                    <i class="icon-envelop3"></i>
                                </div>
                            </div>
                            <div class="login-options">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="styled">
                                        Mail me my account details
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="styled">
                                        Accept <a href="%24.html">terms &amp; conditions</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-info btn-block">Create my account</button>
                        </div>
                    </form>
                </div> -->
                <!-- /Registeration form -->

                <div class="forgot">
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
            <div class="footer">
                <div class="pull-left">
                    ©  <?=date('Y')?> Innovadors Lab&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;Web app kit by <a href="http://innovadorslab.com/" target="_blank">I-lab</a>.             </div>
                <div class="pull-right">
                    <div class="label label-info">Version: 1.0</div>
                </div>
            </div>
        </div>
    </div>

<!-- Global scripts -->
<script src="login/login_assert/lib/js/core/jquery/jquery.js"></script>
<script src="login/login_assert/lib/js/core/jquery/jquery.ui.js"></script>
<script src="login/login_assert/lib/js/core/bootstrap/bootstrap.js"></script>
<script src="login/login_assert/lib/js/core/hammer/hammerjs.js"></script>
<script src="login/login_assert/lib/js/core/hammer/jquery.hammer.js"></script>
<script src="login/login_assert/lib/js/core/slimscroll/jquery.slimscroll.js"></script>
<script src="login/login_assert/lib/js/forms/uniform.min.js"></script>
<!-- <script src="login/login_assert/lib/js/core/app/layouts.js"></script> -->
<!-- <script src="login/login_assert/lib/js/core/app/core.js"></script> -->
<!-- /Global scripts -->

<!-- Page scripts -->
<script src="login/login_assert/lib/js/pages/auth/authentication.js"></script>
<!-- /Page scripts -->

</body>

<!-- Mirrored from followtechnique.com/themes/bird/demo/auth_login.php?t= by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jul 2017 12:17:40 GMT -->
</html>
