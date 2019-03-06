<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';

if($_SESSION['postexam_user'])
{
	
$center="";
    
      $msg = new \Preetish\FlashMessages\FlashMessages();
      if(isset($_POST['search'])){
        $center=$_POST['center'];
      }
?>
  <div class="text-center">
    <?php $msg->display(); ?>   
   </div>
<style>
#cssmenu > ul > li > a{
	padding: 0 12px;
}
</style>
        <div class="col-lg-12">
          <div class="col-lg-4"></div>
            <div class="col-lg-4">
              <?php include'application_form_exam.php';?>
            </div>
          <div class="col-lg-4"></div>
        </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template_data_table.php';
?>
<?php  
    if(!empty($_SESSION['exam_selected'])){
        $exam=$_SESSION['exam_selected'];
        $qry_check="SELECT * FROM `assign_exam_center` where `exam_name`='$exam' And `generated_sheet_status`='1' AND `generated_admit_card`='1'";
        $sql_check=mysqli_query($conn,$qry_check);
        $num_rows_check=mysqli_num_rows($sql_check);
        $res_admit=mysqli_fetch_assoc($sql_check);
        if($num_rows_check==0){          
            
?>
        <div class="col-md-12">
            <div class="alert alert-success text-center">
              <strong > Please Select Generate Admit Card  For : <?=$exam?> </strong>
            </div>
          </div>
<?php
      }else{  
        // check wheater admit card is generated
        if($res_admit['update_attendance_exam']==1){
            $qry_checks="SELECT * FROM `assign_exam_center` where `exam_name`='$exam' AND `generated_admit_card`='1'And `update_attendance_exam`='1' ";
            $sql_checks=mysqli_query($conn,$qry_checks);
            $num_rows_checks=mysqli_num_rows($sql_checks);
            if($num_rows_checks==0){
          ?>
              <div class="col-md-12">
            <div class="alert alert-success text-center">
              <strong > Please Update Attendance sheet For The : <?=$exam?> </strong>
            </div>
          </div>
           <?php }else{

           ?>
                <form class="form-horizontal" action="postexam_preview_attendance.php" method="POST" role="form">
            <div class="col-lg-3"></div>
            <input type="hidden" name="exam" value="<?=$exam?>">
              <div class="form-group">
                <label class="control-label col-sm-2" for="Center">Center Name:</label>
                  <div class="col-lg-3">
                    <select id="center" name="center" class="form-control"  required>
                        <option value="">--Select Center--</option>
<?php
                    
                
                    while($res_centre=mysqli_fetch_array($sql_checks)){
  ?>
                              <option value="<?php echo $res_centre["center_name"]; ?>" <?php if($res_centre["center_name"]==$center){ echo "selected"; }?>><?php echo $res_centre["center_name"]; ?></option>
                              <?php
                      }
                     
                      
                      ?>
                          </select>
                </div>
              </div>
              <div class="col-lg-3"></div>

            

                <div class="form-group">
                  <div class="col-sm-offset-6 col-sm-6">
                      <button type="submit" name='search' class="btn btn-default">Search</button>
                  </div>
                </div>

          </form> 

<?php      }  }else{?>
          <div class="col-md-12">
            <div class="alert alert-success text-center">
              <strong > Please Select Generate Admit Card  For The : <?=$exam?> And Come Back To Here </strong>
            </div>
          </div>
       <?php } 

      }
       ?>


<?php  
    }else{
?>
       <div class="col-md-12">
        <div class="alert alert-success text-center">
          <strong > Please Select The Exam </strong>
        </div>
      </div>
<?php 
  }
  if(isset($_POST['search'])){
      $qry_exams="SELECT * FROM `exam_master_data` Where `examname`='$exam'";
      $sql_exams=mysqli_query($conn, $qry_exams);
      $res_exams=mysqli_fetch_array($sql_exams);

?>
     
      
       
      <div class="container">
           <div class="row">        
          <table class="table table-striped ">
            <thead>
              <tr>
                <th >Enrollment No</th>
                <th >Appliction No</th>
                <th >Attendance</th>              
              </tr>
            </thead>
            <tbody>
<?php         
          $qry_application="SELECT * FROM `post_exam_attendance_candidate` where `exam_name`='$exam' AND `center_name`='$center' ";
          $i=0;//absent
          $y=0;//present
          $sql_appliactiobn=mysqli_query($conn,$qry_application);
           $number=mysqli_num_rows($sql_appliactiobn);
          while($res_app=mysqli_fetch_array($sql_appliactiobn)){

         
?>            <?php if($res_app['attendance_status']==0){?>
              <tr class="warning">
                <td><?=$res_app['roll_no']?></td>
                <td><?=$res_app['application_no']?></td>
                 <td> <?php if($res_app['attendance_status']==0){
                    echo "Absent";
                    $i++;
                 }else{
                  echo "Present";
                  $y++;
                 }?>
                 </td>                
              </tr>
              <?php }else{?>
                <tr class="success">
                <td><?=$res_app['roll_no']?></td>
                <td><?=$res_app['application_no']?></td>
                 <td> <?php if($res_app['attendance_status']==0){
                    echo "Absent";
                    $i++;
                 }else{
                  echo "Present";
                  $y++;
                 }?>
                 </td>                
              </tr>

<?php              } 
 
          }
?>
            </tbody>
          </table>
          </div>
          <div class="row">
            <div class="col-md-12">
            <h4 style="text-align:center">Total Number Of Candidates  : - <?=$number?></h4> 
            </div>
             <div class="col-md-12">
            <h4 style="text-align:center">Total Number Of Candidates Absent : - <?=$i?></h4> 
            </div>
             <div class="col-md-12">
            <h4 style="text-align:center">Total Number Of Candidates Present  : - <?=$y?></h4> 
            </div>
          </div>
          
         
      </div>


<?php   
          
    }
?>
<style type="text/css">
  input[type="radio"] {
    -webkit-appearance: checkbox;
    -moz-appearance: checkbox;
    -ms-appearance: checkbox;     /* not currently supported */
    -o-appearance: checkbox;      /* not currently supported */
}
</style>
 <script type="text/javascript">
  function show_application(){
    var xyz=$('#exam').val();
    if(xyz!=""){ 
      $.ajax({
        type: "POST",
        url: "select_exam_application.php",
        data: {exam_type:xyz},
        success: function(result)   {
          if(result==1){
            // alert('hi');
            location.reload();
          }
        }
      });
    }   
  }
  </script>