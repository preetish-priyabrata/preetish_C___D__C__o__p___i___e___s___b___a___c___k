<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam_name"];
$mon=$_REQUEST["mon"];
$yr=$_REQUEST["yr"];

$qry_totappld="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name'";
$sql_totappld=mysqli_query($conn, $qry_totappld);
$num_totappld=mysqli_num_rows($sql_totappld);

$qry_totattnd="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `attendance_status`='P'";
$sql_totattnd=mysqli_query($conn, $qry_totattnd);
$num_totattnd=mysqli_num_rows($sql_totattnd);

$qry_totnotattnd="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `attendance_status`='A'";
$sql_totnotattnd=mysqli_query($conn, $qry_totnotattnd);
$num_totnotattnd=mysqli_num_rows($sql_totnotattnd);

$qry_qualified="SELECT * FROM `candidate_exam_mark` WHERE `exam_name`='$exam_name' AND `status`='$qualified'";
$sql_qualified=mysqli_query($conn, $qry_qualified);
$num_qualified=mysqli_num_rows($sql_qualified);

$qry_notqualified="SELECT * FROM `candidate_exam_mark` WHERE `exam_name`='$exam_name' AND `status`=''";
$sql_notqualified=mysqli_query($conn, $qry_notqualified);
$num_notqualified=mysqli_num_rows($sql_notqualified);
?>
<div class="tab-content">
<div class="col-md-4">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h3 align="center"><b>Total Applied</b></h3>
<h5 align="center"><?php echo $num_totappld; ?></h5>
</div>
</div>
</div>
<div class="tab-content">
<div class="col-md-4">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h3 align="center"><b>Total Attended</b></h3>
<h5 align="center"><?php echo $num_totattnd; ?></h5>
</div>
</div>
</div>
<div class="tab-content">
<div class="col-md-4">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h3 align="center"><b>Total Not Attended</b></h3>
<h5 align="center"><?php echo $num_totnotattnd; ?></h5>
</div>
</div>
</div>
<div class="col-lg-12">
<div class="tab-content">
<div class="col-md-6">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h3 align="center"><b>Total Qualified</b></h3>
<h5 align="center"><?php echo $num_qualified; ?></h5>
<h5 align="center"><input type="button" class="btn-primary" id="q_details" name="q_details" value="View Details" onClick="show_q_details('<?php echo $exam_name; ?>');"></h5>
</div>
</div>
</div>
<div class="tab-content">
<div class="col-md-6">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h3 align="center"><b>Total Not Qualified</b></h3>
<h5 align="center"><?php echo $num_qualified; ?></h5>
<h5 align="center"><input type="button" class="btn-primary" id="nq_details" name="nq_details" value="View Details" onClick="show_nq_details('<?php echo $exam_name; ?>');"></h5>

</div>
</div>
</div>
</div>
<div class="col-lg-12" id="q_nq_details">
</div>