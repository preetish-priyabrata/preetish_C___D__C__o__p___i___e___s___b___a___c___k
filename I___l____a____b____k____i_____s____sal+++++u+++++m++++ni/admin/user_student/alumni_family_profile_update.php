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
        <center><h3>Update Family Details</h3></center>

        

      <form class="form-horizontal" id="myForm" action="alumni_family_profile_update_save.php" method="POST" enctype="multipart/form-data">
         <?php
            $query = "SELECT * FROM `master_family_Profile` where `user_id`='$student_id'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
            $rec=mysqli_fetch_assoc($query_exe);
            ?>

            
             <div class="form-group">
              <label class="control-label col-sm-2" for="father_name">Father's Name:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" id="father_name" name="father_name" required="" value="<?php echo $rec['father_name'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="father_occupation">Occupation:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" id="father_occupation" name="father_occupation" required="" value="<?php echo $rec['father_occupation'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
           

            <div class="form-group">
              <label class="control-label col-sm-2" for="father_designation">Designation:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" id="father_designation" name="father_designation" required="" value="<?php echo $rec['father_designation'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="father_mob_no">Mobile No:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" id="father_mob_no" name="father_mob_no" required="" value="<?php echo $rec['father_mob_no'] ;?>">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>



             <div class="form-group">
              <label class="control-label col-sm-2" for="father_land_ph_no:">Landline No:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" id="father_land_ph_no" name="father_land_ph_no" value="<?php echo $rec['father_land_ph_no'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="father_email">E-mail id (if any):</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="father_email" id="father_email"  required="" value="<?php echo $rec['father_email'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="mother_name">Mother's Name:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="mother_name" id="mother_name" required="" value="<?php echo $rec['mother_name'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="mother_occupation ">Mother's Occupaton:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="mother_occupation" id="mother_occupation" required="" value="<?php echo $rec['mother_occupation'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


             <div class="form-group">
              <label class="control-label col-sm-2" for="mother_designation">MOther's Designation</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="mother_designation" id="mother_designation" required=""  value="<?php echo $rec['mother_designation'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="mother_mob_no">Mother's Mobile No:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="mother_mob_no" id="mother_mob_no" required="" value="<?php echo $rec['mother_mob_no'] ;?>" />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


              <div class="form-group">
              <label class="control-label col-sm-2" for="mother_land_ph_no">Mother's Landline No:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="mother_land_ph_no" id="mother_land_ph_no" value="<?php echo $rec['mother_land_ph_no'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


            
             <div class="form-group">
              <label class="control-label col-sm-2" for="mother_email">E-mail id (if any)</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" id="mother_email" name="mother_email" id="mother_email" value="<?php echo $rec['mother_email'] ;?>"/>
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
            // onfocusout: function(element) {
            //        this.element(element);
            //     },
                rules: {


                  //father_name:"required",
                   father_name:{
                    required:true,
                    //alphabet:true
                  }, 
                  father_occupation:{
                    required:true,
                    //alphabet:true
                  },
                  mother_name:{
                    required:true,
                   // alphabet:true
                  },

                  mother_occupation:{
                    required:true,
                   // alphabet:true
                  },

                  father_designation:{
                    required:true,
                    //alphabet:true

                  },

                  father_mob_no:{
                    required:true,
                    number:true
                  },

                  mother_designation:{
                    required:true,
                   // alphabet:true 
                 },
                  mother_mob_no:{
                    required:true,
                    number:true

                 },

                

                },
                messages: {
                  
                  father_name:{
                    required:"Please Enter Your Father Name.",
                    //alphabet:"Please Enter Alphabets"               
                  },                 
                  father_occupation:{
                    required:"Please Enter Your Father occupation.  ",
                    //alphabet:"Please Enter Alphabets"               
                  },
                  mother_name:{
                    required:"Please Enter Your Mother Name.",
                   // alphabet:"Please Enter Alphabets"               
                  },

                   mother_occupation:{
                    required:"Please Enter Your Mother Occupation.",
                   // alphabet:"Please Enter Alphabets" 
                  },
                  father_designation:{
                     required:"Please Enter Your Father's Designation.",
                    // alphabet:"Please Enter Alphabets"
                  },

                  father_mob_no:{
                    required:"Please Enter Father's Contact No.",
                    number:"Please Enter Numbers"               
                  },

                  mother_designation:{
                    required:"Please Enter Your Mother's Designation.",
                   // alphabet:"Please Enter Alphabets"
                   },

                  mother_mob_no:{
                     required:"Please Enter Mother's Contact No.",
                     number:"Please Enter Numbers"               
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

