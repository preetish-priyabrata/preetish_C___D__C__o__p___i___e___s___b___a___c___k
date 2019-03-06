<?php
session_start();
error_reporting(0);
include './config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kalinga Institute of Social Sciences</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/pastel-stream.css" />
<link rel="stylesheet" type="text/css" href="css/style_avi.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<style>
body {
	background: ghostwhite;
}
.panel-default {
	opacity: 0.95;
	margin-top: 30px;
}
.form-group.last {
	margin-bottom: 0px;
}
</style>
</head>
<body>
<div class="container"> <!-- sample templates start --> <!-- Navbar -->
  <div class="row">
    <div class="col-lg-12">
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-lg-4 col-xs-12 text-center"> <a class="" href="studentStatus.php" target= "_blank"><img class="img-responsive img-thumbnail logo" src="Images/left.png"></a> </div>
          <div class="col-lg-4 wrapper text-center hidden-xs "> <span>Students / Family information sheet</span> </div>
          <div class="col-lg-4 text-center hidden-xs"> <a class="" target="_blank" href="http://achyutasamanta.com/"><img class="img-responsive img-thumbnail logo" src="Images/sir2.jpg"></a> </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <!-- Forms  -->
  <?php
  if ($_SESSION['user_id'])
  {
    ?>
  <div class="container" style="padding-top:8%">
  <h2 style="float:right;"><a href="logout.php" class="btn btn-primary">Logout</a> </span> </span></h2>
    <h2>Kindly choose what to do ?</h2>
    <div class="row form-group product-chooser">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> <a href="registration.php">
        <div class="product-chooser-item text-center"> <img src="Images/data-entry.jpg" class="img-rounded" alt="Data Entry">
          <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12"> <span class="title">Data Entry</span> <span class="description">Click this section to get a page where the information of a student will be saved after being captured.</span> </div>
          <div class="clear"></div>
        </div>
        </a> </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> <a href="admin/index.php">
        <div class="product-chooser-item text-center"> <img src="Images/Report1.jpg" class="img-rounded" alt="Report">
          <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12"> <span class="title">Report</span> <span class="description">Get a proper report of a student in a formatted manner. This report contains the past , present and the future of a student.</span> </div>
          <div class="clear"></div>
        </div>
        </a> </div>
    </div>
  </div>
  <?php
  }
  else if($_SESSION['updation_user_id'])
  {
	  ?>
      <div class="container" style="padding-top:8%">
  <h2 style="float:right;"><a href="logout.php" class="btn btn-primary">Logout</a> </span> </span></h2>
    <h2>Kindly choose what to do ?</h2>
    <div class="row form-group product-chooser">
    <div class="col-lg-3"></div>
     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> <a href="admin/update_registration_info.php">
        <div class="product-chooser-item text-center"> <img src="Images/data-entry.jpg" class="img-rounded" alt="Data Entry">
          <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12"> <span class="title">Update Student Data</span> <span class="description">Click this section to get a page where the information of a student will be updated after being edited.</span> </div>
          <div class="clear"></div>
        </div>
        </a> </div>
        <div class="col-lg-3"></div>
    </div>
  </div>
      <?php
  }
  else
  {
	  header("location:login.php");
  }
  ?>
  <div class="clearfix" style="height:50px;"></div>
  <script type="text/javascript">jQuery(function ($){$('[data-toggle="popover"]').popover();$('[data-toggle="tooltip"]').tooltip();});</script> <!-- sample templates end --> </div>
</body>
</html>