<?php
error_reporting(0);
session_start();
include "../config.php";
$examname=$_REQUEST["examname"];
$mon=$_REQUEST["mon"];
$yr=$_REQUEST["yr"];

$qry_total_applied="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$examname'";
$sql_total_applied=mysqli_query($conn, $qry_total_applied);
$num_total_applied=mysqli_num_rows($sql_total_applied);

$qry_total_appeared="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$examname' AND `attendance_status`='P'";
$sql_total_appeared=mysqli_query($conn, $qry_total_appeared);
$num_total_appeared=mysqli_num_rows($sql_total_appeared);

$qry_total_notappeared="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$examname' AND `attendance_status`='A'";
$sql_total_notappeared=mysqli_query($conn, $qry_total_notappeared);
$num_total_notappeared=mysqli_num_rows($sql_total_notappeared);
?>
<div class="tab-content">
<div class="col-lg-12">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<table class="table">
<tr>
<th>Total Applied:</th>
<td><?php echo $num_total_applied; ?></td>
</tr>
<tr>
<th>Total Appeared:</th>
<td><?php echo $num_total_appeared; ?></td>
</tr>
<tr>
<th>Total Not Appeared:</th>
<td><?php echo $num_total_notappeared; ?></td>
</tr>
<tr>
<th>Total Rejected:</th>
<td>0</td>
</tr>
<tr>
<td colspan="2" style="text-align:center"><input type="button" class="btn-primary" value="Details As Per Category" id="cat_details" onclick="show_cat_details('<?php echo $examname; ?>');" /></td>
</tr>
</table>
</div>
</div>


</div>

