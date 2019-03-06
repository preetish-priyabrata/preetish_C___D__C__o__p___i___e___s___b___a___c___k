<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam_name"];
$yr=$_REQUEST["yr"];
$mon=$_REQUEST["mon"];

$qry_app_sub="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `application_submitted`='yes'";
$sql_app_sub=mysqli_query($conn, $qry_app_sub);
$num_row_app_sub=mysqli_num_rows($sql_app_sub);
if($num_row_app_sub!='0')
{
	$app_submtd=$num_row_app_sub;
}
else
{
	$app_submtd="No Records Found";
}
?>
<div class="tab-content">
<div class="col-md-4">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

<legend><h4>Application Submitted</h4></legend>

                     <h5 align="center"><?php echo $app_submtd; ?></h5>
                    
                  </div>
                 </div>
                               </div>
                               <div class="tab-content">
<div class="col-md-4">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

<legend><h4>Application Rejected</h4></legend>

                     <h5 align="center">0</h5>
                      </div>
                              </div>
                               </div>
                               <div class="tab-content">
<div class="col-md-4">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

<legend><h4>Application Approved</h4></legend>

                      <h5 align="center">0</h5>
                     
                     </div>
                              </div>
                               </div>
                               