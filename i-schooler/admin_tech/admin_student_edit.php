<?php
session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';
$student_id=$_GET['std_id'];
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="content-wrapper">
<section class="content">
<!-- success or error message alert -->
<div class="text-center">
<?php $msg->display(); ?>
</div>
<!-- end success or error message alert  -->
 <div class="box">

<div class="tab-content">
        <center><h3>Edit Student Details</h3></center>
        

      <form class="form-horizontal" id="reli" action="admin_student_edit_save.php" method="POST" enctype="multipart/form-data">
         <?php
            $query = "SELECT * FROM `master_student_user` where `student_slno`='$student_id'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
          
              While($rec=mysqli_fetch_array($query_exe)){      
            ?>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="student_slno"> Student sl.No:</label>
              <div class="col-sm-10 col-md-8">
                <?php echo $rec['student_slno'] ;?>                        
                <input type="hidden" class="form-control" name="student_slno" value="<?php echo $rec['student_slno'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="u_name"> Student Name:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_name" value="<?php echo $rec['student_name'] ;?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

           

            <div class="form-group">
              <label class="control-label col-sm-2" for="u_class">Current Class:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_class" value="<?php echo $rec['student_current_class'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_section">Current Section:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_section" value="<?php echo $rec['student_current_section'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <!-- <div class="form-group">
              <label class="control-label col-sm-2" for="u_batch">Current Batch:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_batch" placeholder="Enter Current Batch">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
 -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="u_jointsection">Joint Section:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_jointsection" value="<?php echo $rec['student_join_section'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="u_jointbatch">Joint Batch:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_jointbatch" value="<?php echo $rec['student_join_batch'] ;?>">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            -<div class="form-group">
              <label class="control-label col-sm-2" for="u_file">Student Photo:</label>
              <div class="col-sm-10 col-md-8">
              <img width="200" height="150" src="../assert/upload/student_pic/<?php echo $rec ['student_photo'];?> "?>
                <input type="file" name="u_file" placeholder="Enter Photo"  value="<?php echo $rec['student_photo'];?>"  />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="u_gender">Student Gender:</label>
              <div class="col-sm-10 col-md-8">

                Male:<input type="radio"  name="u_gender" value="Male"  <?php if($rec['student_gender']=='Male'){echo "Checked";}?>/>
                
               Female:<input type="radio"  name="u_gender" value="Female" <?php if($rec['student_gender']=='Female'){echo "Checked";}?> />
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <!--<td>Gender</td>
              <td><input type="radio" name="emp_gender" id="emp_gender" value="M" <?php //echo ($emp_gender == 'M')? "CHECKED" : " " ?> />Male
              <input type="radio" name="emp_gender" id="emp_gender" value="F" <?php //echo ($emp_gender == 'F')? "CHECKED" : " " ?> />Female</td>



            <div class="form-group">
              <label class="control-label col-sm-2" for="u_dob">Student DOB:</label>
              <div class="col-sm-10 col-md-8">
                <input type="" class="form-control" name="u_dob" value="<?php //echo $rec['student_dob'] ;?>">
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>-->

            <div class="form-group">
              <label class="control-label col-sm-2" for="u_parentnm">Parent Name:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_parentnm" value="<?php echo $rec['parent_name'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="u_parentph">Parent Phone No:</label>
              <div class="col-sm-10 col-md-8">
                <input type="text" class="form-control" name="u_parentph" value="<?php echo $rec['parent_ph_no'] ;?>"/>
                <br>
                <span id="myerror" style="color: red;"></span>
              </div>
            </div>

             <?php  
            }
          }
            ?>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                
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
  <?php

}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>

