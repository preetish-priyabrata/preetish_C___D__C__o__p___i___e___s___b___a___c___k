<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
$exam= $_SESSION['exam_selected'];

if(isset($_POST['search'])){
  $_SESSION['exam_selected']=$_POST['exam'];
  $exam= $_SESSION['exam_selected'];

}
if($_SESSION['verification_exam'])
{
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
  <div class="text-center">
    <?php $msg->display(); ?>   
   </div>
<form action="vrf_verify_application.php" method="POST">
  <div class="col-lg-12"> 
    <div class="tab-content">
      <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
        <legend><h3>Verify Application</h3></legend>
          <table class="table">
            <tr>
              <td>Exam</td>
              <td>
              <select id="exam" name="exam" class="form-control" required>
              <option value="">--Select Exam--</option>
              <?php
              $qry_exam="SELECT * FROM `exam_master_data`";
              $sql_exam=mysqli_query($conn, $qry_exam);
              while($res_exam=mysqli_fetch_array($sql_exam)){
              ?>
              <option value="<?php echo $res_exam["examname"]; ?>" <?php if($res_exam["examname"]==$exam){echo "Selected";}?>><?php echo $res_exam["examname"]; ?></option>
              <?php } ?>
              </select>
              </td>            
            </tr>
          </table>
          <center>          
            <input type="submit" class="btn-primary" name="search" value="Search">
          </center>
        </div>
      </div>
  </div>
</form>
<div class="col-md-12" id="submited_apps"></div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template_data_table.php';
?>

<?php if(!empty($_SESSION['exam_selected'])){
//$exam_name=$_REQUEST["examname"];
//$mon=$_REQUEST["mon"];
//$yr=$_REQUEST["yr"];

//$qry="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `application_submitted`='yes'";
//
$qry_new="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes' AND candidate_application_info.application_verification_officer='0' ";

$sql_new=mysqli_query($conn, $qry_new);
$num_row_new=mysqli_num_rows($sql_new);

?>
  <div class="panel panel-default ">
  <div class = "panel-body">
    <div class="row">
     
       <div class="col-md-12">
        <div class="box clearfix">
          <h3>List Of New Applied For <?=$exam;?> Application</h3>
          <!--<p>Easily turn your tables into datatables.</p>-->
          <div class="table-responsive">           
            <table id="myTable">  
              <thead>  
                <tr>  
                  <th>Name Candidate</th>  
                  <th>Date Of Submited</th>  
                  <th>Application No</th>  
                  <th>View</th>  
                </tr>  
              </thead>  
              <tbody>  
                 <?php
                    while($res=mysqli_fetch_array($sql_new))
                  {?>
                    <tr>
                      <td><?=$res['candidate_name']?></td>
                      <td><?=date("d-m-Y", strtotime($res['date_of_submit']));?></td>
                      <td><?=$res['application_no']?></td>
                      <td><a class="fa fa-eye fa-2x" target="_self" href="view_application.php?appno=<?php echo $res["application_no"];?>"></a></td>
                    </tr>
            <?php }?>
              </tbody>  
            </table>
          </div>
        </div>
      </div>
    
  <br>

<?php }else{
?>
   <div class="col-md-12">
    <div class="alert alert-success text-center">
      <strong > Please Select The Exam </strong>
    </div>
  </div>

<?php }?>