<?php 
session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Innovadorslab | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assert/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assert/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assert/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assert/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="login.css">
  <!-- iCheck -->
  <!-- fontawesome -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../assert/fontawesome/web-fonts-with-css/css/fontawesome-all.css">
  <link rel="stylesheet" href="../assert/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style media="screen">
            #background {
                /*min-height: 460px;*/
                background-image: url('water.jpg');
                /*background-repeat: no-repeat;*/
                /*background-size: cover;*/
            }

        </style>
  <!-- Google Font -->
  <script src="../assert/js/rainyday.min.js"></script>
        <script>
        
            function run() {
                var rainyDay = new RainyDay({
                    image: 'background' // Target p element with ID, RainyDay.js will use backgorund image to simulate rain effects.
                });
                window.setTimeout(function () {
                    // rainyDay.destroy()
                }, 1000)
            }

        </script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" onload="run()">
<div class="auth-container" id="background">
 <div class="center-block">
            <div class="auth-module">
                <div class="toggle">
                    <!-- <i class="fa fa-user-shield"></i> -->
                    <i class="fas fa-user-lock"></i>
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
                                <input name="userid" class="form-control" autocomplete="off" placeholder="Username" required="" type="text">
                                <div class="form-control-feedback">
                                    <i class="fa fa-user-shield"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input name="password" class="form-control" autocomplete="off" placeholder="Password" required="" type="password">
                                <div class="form-control-feedback">
                                    <i class="fa fa-key" ></i>
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
            

                <div class="forgot">
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
            <div class="footer">
                <div class="pull-left">
                    ©  2018 Innovadors Lab&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;Web app kit by <a href="http://innovadorslab.co.in/" target="_blank">I-lab</a>.             </div>
                <div class="pull-right">
                    <div class="label label-info">Version: 1.0</div>
                </div>
            </div>
        </div>

</div>
<!-- jQuery 3 -->
<script src="../assert/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assert/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../assert/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
