<?php
session_start();
ob_start();

include '../config.php';
if(isset($_SESSION['admin_user'])){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 


	<style type="text/css">



	    body{

		    background-color:#f2f4f4;

	        }
		.table{

			width: 350px;
			height: 230px;
			
			background-color:#08CCAF;
			padding: 10px;
			margin-left: 150px;
			border-radius:10px; 
		  }
		.table input[type='text']{
			width: 330px;
			height: 37px;
		  }
		.table input[type='password']{
			width: 330px;
			height: 37px;
		  }
        h4{

           font-size:15px;
           margin-left: 50px;
          }    
        
    </style>




<div class="container">
 <table style="border-style: solid;border-color: #90C0B9; margin-left: 233px; margin-top: 118px;" class="table table-striped">
 <center>
<!-- <center><h2 style="color: #4a235a ; font-family: Times New Roman, Georgia, Serif;"><strong><marquee>KISS ALUMNI DETAILS</marquee></strong></h2></center> -->
<h3 style="color:#4d4d95; font-family: Times New Roman, Georgia, Serif; margin-left: -110px;"><strong> User Login</strong></h3>


</center>


<form method="POST" action="create_admin_user_login_save.php" enctype="multipart/form-data">

<tr>
	<td><h4><b>Email Id</b></h4></td>
	<td>:</td>
	<td><input type="text" name="email" placeholder="Enter Your Email" required=""></td>
</tr>

<tr>
	<td><h4><b>Password</b></h4></td>
    <td>:</td>
   <td><input type="password" name="pwd" placeholder="Enter Password" required=""></td>
</tr>

 <tr>
<td colspan="2">
<td style="text-align: right;"> 
<center>
<input type="submit" name="submit" value="submit"/>
</center>
</td>
</tr>
</td>
</tr>
</form>
</table>
</div>
</section>
    <!-- /.content -->
</div>


<?php

}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
