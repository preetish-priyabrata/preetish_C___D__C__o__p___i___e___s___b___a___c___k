<?php
session_start();
ob_start();
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

<form method="POST" action="" enctype="multipart/form-data">
<center>
<!-- <center><h2 style="color: #4a235a ; font-family: Times New Roman, Georgia, Serif;"><strong><marquee>KISS ALUMNI DETAILS</marquee></strong></h2></center> -->


<i><h4 style="color:blue; font-family: Times New Roman, Georgia, Serif;"><B><u>FAMILY PROFILE</u></B></h4></i>

</center>

<h5 style="color: red;text-align: left; margin-left: 10px;">* Mandatory Fields</h5>


<div class="form-group">    <label for="email">Father's Name<span style="color:red;">*</span> :</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Father's Name" name="email">
</div>



    <div class="form-group">
      <label for="pwd">Occupaton<span style="color:red;">*</span> :</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Occupaton" name="pwd">
    </div>
    
    <div class="form-group">
      <label for="pwd">Designation<span style="color:red;">*</span> :</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Designation" name="pwd">
    </div>
        
    <div class="form-group">
      <label for="pwd">Mobile No<span style="color:red;">*</span> :</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Mobile No" name="pwd">
    </div>

    <div class="form-group">
      <label for="pwd">Land Phone No :</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Land Phone No" name="pwd">
    </div>
    
    <div class="form-group">
      <label for="pwd">e-mail id (if any) :</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter e-mail id (if any)" name="pwd">
    </div>
    
    <div class="form-group">
      <label for="email">Mother's Name<span style="color:red;">*</span> :</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Mother's Name" name="email">
    </div>

    <div class="form-group">
      <label for="pwd">Occupaton<span style="color:red;">*</span> :</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Occupaton" name="pwd">
    </div>
    
    <div class="form-group">
      <label for="pwd">Designation<span style="color:red;">*</span> :</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Designation" name="pwd">
    </div>
        
    <div class="form-group">
      <label for="pwd">Mobile No<span style="color:red;">*</span> :</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Mobile No" name="pwd">
    </div>

    <div class="form-group">
      <label for="pwd">Land Phone No :</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Land Phone No" name="pwd">
    </div>
    
    <div class="form-group">
      <label for="pwd">e-mail id (if any):</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter e-mail id (if any)" name="pwd">
    </div>

    <div class="form-group">
      
      <input type="submit" name="Back" value="Back"/></td>
    </div>

<div style="text-align: center;">
<input type="submit" name="submit" value="Save"/>
<input type="submit" name="submit" value="Next"/>
</div>
  </form>
</div>


</body>
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

