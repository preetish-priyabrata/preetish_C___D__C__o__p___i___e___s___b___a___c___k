<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam_name"];
$mon=$_REQUEST["mon"];
$yr=$_REQUEST["yr"];
$center=$_REQUEST["center"];

$qry_totallotd="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `exam_centre`='$center'";
$sql_totallotd=mysqli_query($conn, $qry_totallotd);
$num_totallotd=mysqli_num_rows($sql_totallotd);

$qry_totattnd="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `exam_centre`='$center' AND `attendance_status`='P'";
$sql_totattnd=mysqli_query($conn, $qry_totattnd);
$num_totattnd=mysqli_num_rows($sql_totattnd);

$qry_totnotattnd="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `exam_centre`='$center' AND `attendance_status`='A'";
$sql_totnotattnd=mysqli_query($conn, $qry_totnotattnd);
$num_totnotattnd=mysqli_num_rows($sql_totnotattnd);
?>
<div class="tab-content">
<div class="col-md-3">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h4 align="center"><b>Total Alloted</b></h4>
<h5 align="center"><?php echo $num_totallotd; ?></h5>
</div>
</div>
</div>
<div class="tab-content">
<div class="col-md-3">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h4 align="center"><b>Attended</b></h4>
<h5 align="center"><?php echo $num_totattnd; ?></h5>
</div>
</div>
</div>
<div class="tab-content">
<div class="col-md-3">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h4 align="center"><b>Not Attended</b></h4>
<h5 align="center"><?php echo $num_totnotattnd; ?></h5>
</div>
</div>
</div>
<div class="tab-content">
<div class="col-md-3">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h4 align="center"><b>MP</b></h4>
<h5 align="center">0</h5>
</div>
</div>
</div>