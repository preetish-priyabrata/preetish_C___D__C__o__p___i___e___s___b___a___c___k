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
        <center><h3>Update Personal Details</h3></center>
        <form class="form-horizontal" id="myform1" action="alumni_personal_profile_update_save.php" method="POST" enctype="multipart/form-data">
         <?php
            $query = "SELECT * FROM `master_personal_profile` where `user_id`='$student_id'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
            $rec=mysqli_fetch_assoc($query_exe);
            ?>

            
             <div class="form-group">
              <label class="control-label col-sm-2" for="current_occupation">Current Occupation :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="current_occupation" id="current_occupation" value="<?php echo $rec['current_occupation'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="designation">Designation :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="designation" id="designation" value="<?php echo $rec['designation'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
           

            <div class="form-group">
              <label class="control-label col-sm-2" for="employer_name">Employer_name :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="employer_name" id="employer_name" value="<?php echo $rec['employer_name'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="tribe">Tribe :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="tribe" id="tribe" value="<?php echo $rec['tribe'] ;?>">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="mobile_no">Mobile No :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="<?php echo $rec['mobile_no'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-2" for="land_Ph_no">Landline No :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="land_Ph_no" id="land_Ph_no" value="<?php echo $rec['land_Ph_no'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="official_email_id">Office Email Id :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="official_email_id" id="official_email_id" value="<?php echo $rec['official_email_id'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="sports_participate">Sports Participate :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="sports_participate" id="sports_participate" value="<?php echo $rec['sports_participate'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


             <div class="form-group">
              <label class="control-label col-sm-2" for="co_curricular_activity ">Co_curriculam Activity :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="co_curricular_activity" value="<?php echo $rec['co_curricular_activity'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>


             <div class="form-group">
              <label class="control-label col-sm-2" for="awards">Awards :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="awards" value="<?php echo $rec['awards'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="awards">Date Of Birth :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="dob" id="dob" required="" value="<?php echo $rec['DOB'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="gen">Gender :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="gen" required="" value="<?php echo $rec['gender'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div> 

        
             <div class="form-group">
              <label class="control-label col-sm-2" for="alter">Alternative Mobile No :</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" id="alter" name="alter" required="" value="<?php echo $rec['alter_mob'] ;?>" required=""/>
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
       
        $("#myform1").validate({
            // onfocusout: function(element) {
            //        this.element(element);
            //     },
                rules: {
                 // pass_year:"required",
                
                  current_occupation:{
                    required:true,
                   // alphabet:true
                  },

                  designation:{
                    required:true,
                   // alphabet:true
                  },

                  tribe:{
                    required:true,
                    
                  },

                  mobile_no:{
                    required:true,
                     number:true
                  },
            

              },
                messages: {
            
                 current_occupation:{
                    required:"Please Enter Your Occupation.",
                   // alphabet:true
                  },
                 
                  designation:{
                    required:"Please Enter Your Designation.",
                   // alphabet:true
                  },

                  tribe:{
                    required:"Please Enter Your Tribe.",
                    
                  },

                  mobile_no:{
                    required:"Please Enter Your Phone No.",
                     number:"Please Enter Numbers."
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

