<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
if($_SESSION['preexam_user'])
{
  $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<div class="col-md-12">
<div class="col-md-3"></div>
<div class="col-md-6"> 
<div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

<form action="roll_no_generation.php" id="personalinfo" enctype="multipart/form-data" method="post" role="form" >                 
<legend><h3>Generate Roll No</h3></legend>
<div class="text-center">
    <?php $msg->display(); ?>   
   </div>              
                  <table class="table">
                  
                  <tr>
                  <td>Exam</td>
                  <td>
                    <select id="exam" name="exam" class="form-control" required>
                    <option value="">--Select Exam--</option>
                    <?php
      				            $qry_exam="SELECT * FROM `exam_master_data` where `roll_prefix_status`='0'";
      				            $sql_exam=mysqli_query($conn, $qry_exam);
      				            while($res_exam=mysqli_fetch_array($sql_exam)){
  				          ?>
                            <option value="<?php echo $res_exam["examname"]; ?>"><?php echo $res_exam["examname"]; ?></option>
                    <?php
  				                }
  				          ?>
                    </select>
                  <tr>
                  <td>Roll No Prefix</td>
                  <td><input type="text" placeholder="Enter prefix for roll no" id="rlno_prefix" name="rlno_prefix" class="form-control" required></td>
                  </tr>
                  <tr>
                    <td colspan="2"><span style="color:red;">Note : Roll No. Is Generate One Time For Exam </span></td>
                    </tr>
                    </table>
<center><input type="submit" class="btn-primary" id="generate" name="generate" value="Generate"></center>
</form>

</div>

 </div>
 </div>
 <div class="col-md-3"></div>
 </div>
 <?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template_data_table.php';
?>