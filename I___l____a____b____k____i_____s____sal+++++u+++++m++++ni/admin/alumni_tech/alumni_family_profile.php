<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 




  <style type="text/css">



      body{

        background-color:;

          }
    form{

      width: 700px;
      /*height: 650px;*/
      
      background-color:  #72C2C2;
      padding: 30px;
      margin-left: 150px;
      border-radius:5px;
      border-style: solid; 
      border-color: #812929;


      }
    input[type='text']{
      width: 600px;
      height: 36px;
      }
    input[type='password']{
      width: 550px;
      height: 36px;
      }
       
        
    </style>

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
    	





 
<div class="container">
<center>
<i><h4 style="color:blue; font-family: Times New Roman, Georgia, Serif;"><B><u>FAMILY PROFILE</u></B></h4></i>

</center>

<h5 style="color: red;text-align: left; margin-left: 170px;"><span style="color:red; font-size:21px">*</span> <i>Marks Fields Are Mandatory</i></h5>
<form method="POST" action="alumni_family_profile_insert.php" enctype="multipart/form-data">
<!-- <center><h2 style="color: #4a235a ; font-family: Times New Roman, Georgia, Serif;"><strong><marquee>KISS ALUMNI DETAILS</marquee></strong></h2></center> -->

   <b>Father's Name</b><span style="color:red; font-size:20px">*</span>:<br>
   <input type="text" id="father_name" placeholder="Enter Your Father's Name" name="father_name">
   <br>

   <b>Occupaton</b><span style="color:red; font-size:20px">*</span>:<br>
   <input type="text" id="father_occupation" placeholder="Enter Your Father's Occupaton" name="father_occupation">
   <br>

  <b> Designation</b><span style="color:red; font-size:20px">*</span>:</br>
  <input type="text"  id="father_designation" placeholder="Enter Your Father's Designation" name="father_designation">
  <br>

  <b>Mobile No</b><span style="color:red; font-size:20px">*</span>:<br>
  <input type="text" id="father_mob_no" placeholder="Enter Your Father's Mobile No" name="father_mob_no">
  <br>

  <b>Land Phone No</b> :<br>
  <input type="text" id="father_land_ph_no" placeholder="Enter Land Phone No" name="father_land_ph_no">
  <br>

  <b>e-mail id (if any)</b>:<br>
  <input type="text"  class="form-control" id="father_email" placeholder="Enter Your Father's e-mail id (if any)" name="father_email">
  <br>

  <b>Mother's Name</b><span style="color:red; font-size:20px">*</span>:<br>
  <input type="text" id="mother_name" placeholder="Enter Your Mother's Name" name="mother_name">
  <br>

  <b> Occupaton</b><span style="color:red; font-size:20px">*</span>:<br>
  <input type="text" id="mother_occupation" placeholder="Enter Your Mother's Occupaton" name="mother_occupation">
  <br>

  <b>Designation</b><span style="color:red; font-size:20px">*</span>:</br>
  <input type="text"  id="mother_designation" placeholder="Enter Mother's Designation" name="mother_designation">
  <br>

  <b>Mobile No</b><span style="color:red; font-size:20px">*</span>:<br>
  <input type="text"  id="mother_mob_no" placeholder="Enter Your Mother's Mobile No" name="mother_mob_no">
  <br>

  <b>Land Phone No</b> :<br>
  <input type="text"  id="mother_land_ph_no" placeholder="Enter Land Phone No" name="mother_land_ph_no">
  <br>

  <b>e-mail id (if any)</b> :<br>
  <input type="text"  id="mother_email" placeholder="Enter Your Mother's e-mail id (if any)" name="mother_email">
  <br><br>

<tr>
<td colspan="2">
<a href="alumni_personal_profile.php"><input type= "button" value="Back"></a><td>
<td style="text-align: right;">
<input type="submit" name="submit" value="Save"/>
<a href="alumni_present_address.php"><input type= "button" value="Next"></a>
</td>
</tr>

</form>
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












<!--class="form-control"