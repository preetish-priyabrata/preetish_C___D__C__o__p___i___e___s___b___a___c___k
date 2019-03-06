<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>(KIIT LND) Innovadors Lab Schooler</title>

    <!-- Bootstrap -->
    <link href="login/css/bootstrap.min.css" rel="stylesheet">
    <link href="login/css/styles.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .error{
        color: red;
      }
    </style>
  </head>
  <body>
    <!-- login -->
<?php 
session_start();
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
   <div class="demo">
    <div class="container">
      <div class="row" style="margin-top:15%; ">
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-lg-offset-3 col-sm-offset-2 col-md-offset-3" id="stra">
          <form role="form" class="form-horizontal text-center" action="login.php" id="login" method="POST">
            <fieldset>
              <h2>Please Sign In</h2>
              <hr class="colorgraph">
              <div class="clearfix"></div>
              <div class="text-center">
                <?php $msg->display(); ?>
              </div>
              <div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                <input type="text" name="userid" id="userid" class="form-control input-sm" placeholder="Please Enter Email/Userid">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                  <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Please Enter Password">
                  </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                <input type="submit" id="login_button" class="btn btn-md btn-success btn-block" value="Sign In">
                </div>
              </div>
              <hr class="colorgraph">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 ">
                  
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/custom.js"></script>
    <script src="login/js/valid.js"></script>
  </body>
</html>