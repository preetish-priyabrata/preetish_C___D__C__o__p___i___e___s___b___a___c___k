<?php 
session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Login Page</title>

    <!-- Favicon -->
    <link href="img/logo.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/logo.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/logo.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/logo.png" rel="apple-touch-icon" type="image/png">
	<link href="img/logo.png" rel="icon" type="image/png">
	<link href="img/logo.png" rel="shortcut icon">
    <!-- /Favicon -->

    <!-- Global stylesheets -->
	<link type="text/css" rel="stylesheet" href="login/login_assert/lib/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="login/login_assert/lib/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="login/login_assert/lib/css/main.css">
     <link type="text/css" rel="stylesheet" href="login/login_assert/lib/css/nav.css">
     <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <!-- /Global stylesheets -->
</head>


<body>
    <nav class="navbar navbar-fixed-left navbar-minimal animate" role="navigation">
        <div class="navbar-toggler animate">
            <span class="menu-icon"></span>
        </div>
        <ul class="navbar-menu animate">
            <li>
                <a href="#" id="show" class="animate">
                    <span class="desc animate"> Login </span>
                    <span class="fa fa-user"></span>
                </a>
            </li>
            <!-- <li>
                <a href="#blog" class="animate">
                    <span class="desc animate"> What We Say </span>
                    <span class="glyphicon glyphicon-info-sign"></span>
                </a>
            </li>
            <li>
                <a href="#contact-us" class="animate">
                    <span class="desc animate"> How To Reach Us </span>
                    <span class="glyphicon glyphicon-comment"></span>
                </a>
            </li>
 -->        
        </ul>
    </nav>
    <div class="auth-container">
       <!-- <img src="img/header-img.png" alt="company logo" > -->
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
                    <form class="form-horizontal" action="login_process.php" method="POST">
                        <div class="form-group">
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" name="email_id" class="form-control" autocomplete="off" placeholder="Username" required="">
                                <div class="form-control-feedback">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" name="pass_word" class="form-control" autocomplete="off" placeholder="Password" required="">
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

                
            </div>
            <div class="footer">
                <div class="pull-left">
                    ©  2017 Innovadors Lab&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;Web app kit by <a href="http://innovadorslab.com/" target="_blank">I-lab</a>.             </div>
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
<script src="login/login_assert/lib/js/core/app/layouts.js"></script>
<script src="login/login_assert/lib/js/core/app/core.js"></script>
<!-- /Global scripts -->

<!-- Page scripts -->
<script src="login/login_assert/lib/js/pages/auth/authentication.js"></script>
<script type="text/javascript">
     $(".auth-module").hide();
    $(function () {
    // /* START OF DEMO JS - NOT NEEDED */
    // if (window.location == window.parent.location) {
    //     $('#fullscreen').html('<span class="glyphicon glyphicon-resize-small"></span>');
    //     $('#fullscreen').attr('href', 'http://bootsnipp.com/mouse0270/snippets/PbDb5');
    //     $('#fullscreen').attr('title', 'Back To Bootsnipp');
    // }    
    // $('#fullscreen').on('click', function(event) {
    //     event.preventDefault();
    //     window.parent.location =  $('#fullscreen').attr('href');
    // });
    // $('#fullscreen').tooltip();
    // /* END DEMO OF JS */
    
    $('.navbar-toggler').on('click', function(event) {
        event.preventDefault();

        $(this).closest('.navbar-minimal').toggleClass('open');
    });
    $(".navbar-toggler").click(function(){
        $(".auth-module").hide();
    });

    $("#show").click(function(){
        $(".auth-module").show();
    });
});
</script>
<!-- /Page scripts -->

</body>

</html>
