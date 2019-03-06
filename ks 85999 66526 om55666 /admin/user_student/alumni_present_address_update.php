<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
$student_id=$_SESSION['email'];
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="content-wrapper">
<section class="content">
<!-- success or error message alert -->
<div class="text-center">
<?php $msg->display(); ?>
</div>
<!-- end success or error message alert  -->


<style type="text/css">
  
      .error{
        color: red;
        font-size: 12px;
      }
</style>
 <div class="box">
 <div class="tab-content">
     <center><h3>Update Present Address Details</h3></center>
        
       <form class="form-horizontal" id="myForm" action="alumni_present_address_update_save.php" method="POST" enctype="multipart/form-data">
         <?php
            $query = "SELECT * FROM `master_present_address_profile` where `user_id`='$student_id'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
            $rec=mysqli_fetch_assoc($query_exe);
            ?>

            
             <div class="form-group">
              <label class="control-label col-sm-2" for="at">AT:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="at" id="at" value="<?php echo $rec['at'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="post">Post :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="post" id="post" value="<?php echo $rec['post'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
           

            <div class="form-group">
              <label class="control-label col-sm-2" for="via">Via :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="via" id="via" value="<?php echo $rec['via'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="ps">Police Station :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="ps" id="ps" value="<?php echo $rec['ps'] ;?>">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="city">City :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="city" id="city" value="<?php echo $rec['city'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-2" for="district">District :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="district" value="<?php echo $rec['district'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="pin">Pin :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="pin" id="pin" value="<?php echo $rec['pin'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="state">State :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="state" id="state" value="<?php echo $rec['state'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


             <div class="form-group">
              <label class="control-label col-sm-2" for="zone">Zone <span>(East/West/North/South/Central) :</span></label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="zone" id="zone" value="<?php echo $rec['zone'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


             <div class="form-group">
              <label class="control-label col-sm-2" for="country">Country :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="country" id="country" value="<?php echo $rec['country'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-2" for="land_ph_no">Landline No :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="land_ph_no" id="land_ph_no" value="<?php echo $rec['land_ph_no'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

             <?php  
            
          }else{
            header('Location:logout.php');
            exit;
          }
            ?>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
               <a href="profile.php">Back</a> 
             <center> <b><input type="submit" name="submit" value="Update" class="btn btn-default"></b></center>
              </div>
            </div>

          </form>
      </div>
    </div>
   
  </div>
  <br>
          
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
       <!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> -->
      <script type="text/javascript">


      //FORM VALIDATION//
       
        $("#myForm").validate({
           
                rules: {

                  //father_name:"required",
                  at:{
                    required:true,
                    //alphabet:true
                  }, 
                  post:{
                    required:true,
                    //alphabet:true
                  },
                  via:{
                    required:true,
                   // alphabet:true
                  },
                  PS:{
                    required:true,
                  //  number:true
                  },
                  city:{
                    required:true,
                   // alphabet:true
                  },
                  District:{
                    required:true,
                   // alphabet:true
                  },
                  
                  pin:{
                    required:true,
                    number:true
                  },
                   State:{
                    required:true,
                    //alphabet:true
                  },

                  zone:{
                   required:true,
                  // alphabet:true
                  },
                  country:{
                    required:true,
                   // alphabet:true
                   }, 
                
                
                },


                messages: {
                  
                  at:{
                    required:"Please Enter Your AT. ",
                   // alphabet:"Please Enter Alphabets."               
                  },                 
                  post:{
                    required:"Please Enter Your Post.",
                   // alphabet:"Please Enter Alphabets."               
                  },
                  via:{
                    required:"Please Enter Your Via.",
                   // alphabet:"Please Enter Alphabets." 
                  },
                  PS:{
                    required:"Please Enter Your Police Station.",
                  /// alphabet:"Please Enter Alphabets." 
                  },
                  city:{
                    required:"Please Enter Your City.",
                   // alphabet:"Please Enter Alphabets." 
                  },
                  District:{
                    required:"Please Enter Your District.",
                  //  alphabet:"Please Enter Alphabets."
                  },
                  
                  pin:{
                    required:"Please Enter Your Pin.",
                    number:"Please Enter Number." 
                  },
                 State:{
                   required:"Please Enter Your State.",
                   
                  },
                 zone:{
                  required:"Please Enter Your Zone.",
                //   alphabet:"Please Enter Alphabets."
                  },
                 country:{
                   required:"Please Enter Your Country.",
                 //  alphabet:"Please Enter Alphabets."
                  },
                 
                  


              },
             
          
          //         submitHandler: function(form) {
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

