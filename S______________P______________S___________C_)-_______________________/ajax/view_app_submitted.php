<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam_name"];
$qry_app_sub="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `application_submitted`='yes' ORDER BY `slno` DESC";
$sql_app_sub=mysqli_query($conn, $qry_app_sub);
?>
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
 <div style="height:250px; overflow:scroll; ">
<table class="table">
<tr>
<th>Name</th>
<th>Date Of Apply</th>
<th>View</th>
</tr>
<?php
while($res_app_sub=mysqli_fetch_array($sql_app_sub))
{
	$qry_name="SELECT `candidate_name` FROM `candidate_personal_details` WHERE `application_no`='$res_app_sub[application_no]'";
	$sql_name=mysqli_query($conn, $qry_name);
	$res_name=mysqli_fetch_array($sql_name);
	
	$qry_doa="SELECT `date` FROM `candidate_declaration` WHERE `application_no`='$res_app_sub[application_no]'";
	$sql_doa=mysqli_query($conn, $qry_doa);
	$res_doa=mysqli_fetch_array($sql_doa);
?>
<tr>
<td><?php echo $res_name["candidate_name"]; ?></td>
<td><?php echo $res_doa["date"]; ?></td>
<td><a target="_blank" href="view_application.php?appno=<?php echo $res_app_sub["application_no"];?>">View</a></td>
</tr>
<?php
}
?>
</table>
</div>
</div>