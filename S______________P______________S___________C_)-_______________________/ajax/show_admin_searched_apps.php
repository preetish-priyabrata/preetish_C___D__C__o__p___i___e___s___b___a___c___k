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
                     <h5 align="center"><input type="button" id="view_details1" value="View Details" onclick="view_app_submitted('<?php echo $exam_name;?>');" class="btn-primary"></h5>       
                  </div>
                   <div class="col-md-12" id="app_submitted">
                     </div>
                              </div>
                               </div>
                               <div class="tab-content">
<div class="col-md-4">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

<legend><h4>Application Approved</h4></legend>

                      <h5 align="center">0</h5>
                     <!--<h5 align="center"><input type="button" id="view_details2" value="View Details" onclick="view_app_approved();" class="btn-primary"></h5>-->            
                  </div>
                  <div class="col-md-12" id="app_approved">
                     </div>
                              </div>
                               </div>
                               <div class="tab-content">
<div class="col-md-4">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

<legend><h4>Application Rejected</h4></legend>

                     <h5 align="center">0</h5>
                     <!--<h5 align="center"><input type="button" id="view_details3" value="View Details" onclick="view_app_rejected();" class="btn-primary"></h5>-->
                                        
                  </div>
                  <div class="col-md-12" id="app_rejected">
                     </div>
                              </div>
                               </div>