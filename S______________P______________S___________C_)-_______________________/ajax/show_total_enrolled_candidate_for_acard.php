<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam_name"];
$mon=$_REQUEST["mon"];
$yr=$_REQUEST["yr"];
$centre=$_REQUEST["centre"];

$qry="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `application_submitted`='yes' AND `exam_centre`='$centre'";
$sql=mysqli_query($conn, $qry);
$num_row=mysqli_num_rows($sql);
if($num_row!='0')
{
	$total_cand=$num_row;
}
else
{
	$total_cand="No Records Found";
}
?>
<div class="tab-content">

<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

<h4 style="text-align:center">Total Number Of Candidates</h4>

                     <h5 align="center"><?php echo $total_cand; ?></h5>
                    <?php if($num_row!='0') { ?> <h6 align="center"><input type="button" id="view_details" value="View Details" onclick="view_enrolled_cand_list_for_acard('<?php echo $exam_name; ?>', '<?php echo $centre; ?>');" class="btn-primary"></h6> <?php } ?>      
                  </div>
                  
                     </div>
