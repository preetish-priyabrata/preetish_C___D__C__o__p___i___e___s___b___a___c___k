<?php
session_start();
ob_start();
include '../config.php';
if(isset($_SESSION['alumni_tech'])){
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
<h3 style="color:green; font-family: Times New Roman, Georgia, Serif; margin-left: -90px;"><strong>Create User</strong></h3>
</center>


<form method="POST" id="myForm" action="create_admin_user_insert.php" enctype="multipart/form-data">

<h5 style="color: red;text-align: left; margin-left: 20px;">* Marked Fields Are Mandatory</h5>

<div class="form-group">
    <label class="control-label col-sm-2" for="name">Name :<span style="color:red;font-size:20px;">*</span></label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required="" />
      <br>
    <span id="myerror" style="color: red;"></span>
 </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email Id :<span style="color:red;font-size:20px">*</span></label>
      <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Email" required="" />
      <br>
    <span id="myerror" style="color: red;"></span>
</div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="Phone">Phone No :<span style="color:red;font-size:20px">*</span></label>
     
      <input type="text" class="form-control" name="Phone" id="Phone" placeholder="Enter Phone No" required="" />
      <br>
    <span id="myerror" style="color: red;"></span>
    
 </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="designation">Designation :<span style="color:red;font-size:20px">*</span></label>
     <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Your Designation" required="" />
      <br>
    <span id="myerror" style="color: red;"></span>
    
 </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password :<span style="color:red;font-size:20px">*</span></label>
    
      <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter Password" required=""/>
      <br>
    <span id="myerror" style="color: red;"></span>
    
 </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="cn_pwd">Confirm Password :<span style="color:red;font-size:20px">*</span></label>
    <input type="password" class="form-control" name="cn_pwd" id="cn_pwd" placeholder="Enter Confirm password" required=""/>
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
 
    <!-- /.content -->
 


 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
       <!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> -->
      <script type="text/javascript">


      //FORM VALIDATION//
       
        $("#myForm").validate({
            // onfocusout: function(element) {
            //        this.element(element);
            //     },
                rules: {


                  //father_name:"required",
                   name:{
                    required:true,
                    //alphabet:true
                  }, 
                  email:{
                    required:true,
                    email:true
                  },
                  Phone:{
                    required:true,
                   number:true
                  },

                  designation:{
                    required:true,
                   // alphabet:true
                  },

                  pwd:{
                    required:true,
                   // alphabet:true 
                 },
                  cn_pwd:{
                    required:true,
                    
                  },
                

                },
                messages: {
                  
                  name:{
                    required:"Please Enter Name.",
                    //alphabet:"Please Enter Alphabets"               
                  },                 
                  email:{
                     required:"Email Id Should Left Blank.",
                     email:"Please put vaild email."            
                  },
                  Phone:{
                    required:"Please Enter Phone No.",
                    number:"Please Enter Numbers"              
                  },

                   
                  designation:{
                    required:"Please Enter Designation.",
                   // alphabet:"Please Enter Alphabets" 
                  },
                   pwd:{
                   
                     required:"Please Enter Password.",
                    // alphabet:"Please Enter Alphabets"
                  },

                  cn_pwd:{
                    required:"Please Enter Confirm Firstword.",
                    //number:"Please Enter Numbers"               
                  },

                 
                  
              },
             
          
             //   submitHandler: function(form) {
             //   form.submit();
             // }
               
            })
        jQuery.validator.setDefaults({
          debug: true,
          // success: "valid"
        });

        </script>

<?php

}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>











