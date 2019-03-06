<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['preexam_user'])
{
?>
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
        // no of applied application
        $qry_new="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes'";
        $sql_new=mysqli_query($conn, $qry_new);
        $num_row_new=mysqli_num_rows($sql_new);
        //no of approved appliction
        $qry_verified="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes' AND candidate_application_info.application_verification_officer='1' ";
        $sql_verified=mysqli_query($conn, $qry_verified);
        $num_row_verified=mysqli_num_rows($sql_verified);
 //no of rejected application
        $qry_rejected="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes' AND candidate_application_info.application_verification_officer='5' ";
        $sql_rejected=mysqli_query($conn, $qry_rejected);
        $num_row_rejected=mysqli_num_rows($sql_rejected);


?>


<div class="container-fluid">

<div class="row">

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$num_row_new?></h3>

              <!-- <p>New Orders</p> -->
            </div>
            <div class="icon">
              <i class="fa fa-users "></i>
            </div>
            <a href="#" class="small-box-footer">Total Applications <!-- <i class="fa fa-arrow-circle-right"></i> --></a>
          </div>
        </div>
          <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$num_row_verified?></h3>

              <!-- <p>New Orders</p> -->
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">Verified Applications <!-- <i class="fa fa-arrow-circle-right"></i> --></a>
          </div>
        </div>
         <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$num_row_rejected?></h3>

              <!-- <p>New Orders</p> -->
            </div>
            <div class="icon">
              <i class="fa fa-user-times"></i>
            </div>
            <a href="#" class="small-box-footer">Rejected Applications <!-- <i class="fa fa-arrow-circle-right"></i> --></a>
          </div>
        </div>
      </div>
  </div>
<?php }else{
?>
       <div class="col-md-12">
        <div class="alert alert-success text-center">
          <strong > Please Select The Exam </strong>
        </div>
      </div>
<?php }

?>

  <script type="text/javascript">
  function show_application(){
    var xyz=$('#exam').val();
    if(xyz!=""){
    // alert(xyz);
   
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
 
        

       
