<?php
session_start();
ob_start();

include 'config.php';
if($_SESSION['alumni_tech']){
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

			width: 700px;
			height: 400px;
			
			background-color:#CDAA7D;
			padding: 20px;
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
 <table style="border-style: solid;border-color: #800000;" class="table table-striped">
 <center>
<!-- <center><h2 style="color: #4a235a ; font-family: Times New Roman, Georgia, Serif;"><strong><marquee>KISS ALUMNI DETAILS</marquee></strong></h2></center> -->
<h3 style="color:blue; font-family: Times New Roman, Georgia, Serif;"><strong>Alumni Profile</strong></h3>
<h3 style="color:blue; font-family: Times New Roman, Georgia, Serif;">Stream(Arts / Science / Commerce)</h3>
<i><h3 style="color:blue; font-family: Times New Roman, Georgia, Serif;"><B><u>PERSONAL PROFILE</u></B></h3></i>

</center>


<form method="POST" action="alumni_personal_profile_insert.php" enctype="multipart/form-data">

<h5 style="color: red;text-align: left; margin-left: 170px;">* Marks Fields Are Mandatory</h5>

<!-- <tr>
    <td><h4><b>Sl.No</b></h4></td>
    <td>:</td>
    <td><input type="text" name="slno" placeholder="Enter Sl.No"></td>
 </tr> -->
 <tr>
    <td><h4><b>Passing Year <span style="color:red;">*</span></b></h4></td>
    <td>:</td>
    <td><input type="text" name="pass_year" placeholder="Enter your Pzzassing Year"></td>
</tr>
<tr>
	<td><h4><b>Name Of the Alumni </b><span style="color:red;">*</span></h4></td>
	<td>:</td>
	<td><input type="text" name="alumni_name" placeholder="Enter your name"></td>
</tr>
<tr>
   <td><h4><b>Current Occupation <span style="color:red;">*</span></b></h4></td>
   <td>:</td>
   <td><input type="text" name="occupation" placeholder="Enter your Current Occupation"></td>
</tr>
<tr>
   <td><h4><b>Designation <span style="color:red;">*</span></b></h4></td>
   <td>:</td>
   <td><input type="text" name="designation" placeholder="Enter your Designation"></td>
</tr>
<tr>
	<td><h4><b>Name Of The Employer <span style="color:red;">*</span></b></h4></td>
	<td>:</td>
    <td><input type="text" name="employer" placeholder="Enter Employer Name"></td>
</tr>
<tr>
	<td><h4><b>Tribe</b></h4></td>
    <td>:</td>
   <td><input type="text" name="tribe" placeholder="Enter Tribe"></td>
</tr>

<tr>
	<td><h4><b>Mobile No <span style="color:red;">*</span></b></h4></td>
    <td>:</td>
    <td><input type="text" name="ph_no" placeholder="Enter Mobile No"></td>
</tr>
<tr>
	<td><h4><b>Land Phone No</b></h4></td>
    <td>:</td>
    <td><input type="text" name="Landline" placeholder="Enter Landline No"></td>
</tr>
<tr>
	<td><h4><b>Personal E-mail id <span style="color:red;">*</span></b></h4></td>
    <td>:</td>
    <td><input type="text" name="email" placeholder="Enter your E-mail Id"></td>
</tr>
<tr>
	<td><h4><b>Official E-mail id</b></h4></td>
	<td>:</td>
	<td><input type="text" name="ofc_email" placeholder="Enter your Official E-mail Id"></td>
</tr>
<tr>
	<td><h4><b>Sports Participated(if any)</b></h4></td>
    <td>:</td>
    <td><input type="text" name="sports" placeholder="Enter your Sports Participated"></td>
</tr>
<tr>
	<td><h4><b>Co-curricular Activity</b></h4></td>
    <td>:</td>
    <td><input type="text" name="Co-curricular" placeholder="Enter your Co-curricular Activity"></td>
</tr>
<tr>
	<td><h4><b>Awards / Accolades</b></h4></td>
    <td>:</td>
    <td><input type="text" name="awards" placeholder="Enter your Awards/Accolades"></td>
</tr>

 <tr>
<td colspan="2">
<td style="text-align: right;"> 
<input type="submit" name="submit" value="submit"/>
<a href="alumni_family_profile.php"><input type= "button" value="Next"></a>
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











