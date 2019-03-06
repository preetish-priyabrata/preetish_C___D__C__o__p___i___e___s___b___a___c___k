<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
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
	
        h4{

           font-size:15px;
           margin-left: 50px;
          }    
        
      input[type='text']{
      width: 600px;
      height: 37px;
      }
      input[type='password']{
      width: 600px;
      height: 37px;
      }
    </style>

    <style type="text/css">
    .table{
    background-color:#98F398;
      padding: 20px;
      /*margin-left: 100px;*/
      border-radius:10px; 
      }.error{
        color: red;
        font-size: 12px;
        margin-left: 202px;
      }
</style>



<div class="container">
<div class="row">
 <div class="panel panel-default">
 <div class="panel-body">

 <center>
<h3 style="color:green; font-family: Times New Roman, Georgia, Serif; margin-left: -90px;"><strong>Add Stream</strong></h3><br>
</center>


<form method="POST" id="myForm" action="add_student_regd_stream_save.php" enctype="multipart/form-data">

<div class="form-group">
    <label class="control-label col-sm-2" for="stream">Add Stream :<span style="color:red;font-size:20px;">*</span></label>
      <input type="text" class="form-control" name="stream" id="stream" placeholder="Add Stream" required="" />
      <br>
    <span id="myerror" style="color: red;"></span>
 </div>


<center>
<input type="submit" name="submit" value="submit"/>
</center>
</form>
</div>
</div>
</div>
</div>
</section>
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












