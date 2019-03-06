<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam_name"];
$mon=$_REQUEST["mon"];
$yr=$_REQUEST["yr"];

$qry_centre="SELECT * FROM `center_master_data` WHERE `examname`='$exam_name'";
$sql_centre=mysqli_query($conn, $qry_centre);
while($res_center=mysqli_fetch_array($sql_centre))
{
$qry_totallotd="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `exam_centre`='$res_center[examcenter]'";
$sql_totallotd=mysqli_query($conn, $qry_totallotd);
$num_totallotd=mysqli_num_rows($sql_totallotd);

$qry_totattnd="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `exam_centre`='$res_center[examcenter]' AND `attendance_status`='P'";
$sql_totattnd=mysqli_query($conn, $qry_totattnd);
$num_totattnd=mysqli_num_rows($sql_totattnd);

$qry_totnotattnd="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `exam_centre`='$res_center[examcenter]' AND `attendance_status`='A'";
$sql_totnotattnd=mysqli_query($conn, $qry_totnotattnd);
$num_totnotattnd=mysqli_num_rows($sql_totnotattnd);
?>
<div class="tab-content">
<div class="col-md-4">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<h3 align="center"><b><?php echo $res_center["examcenter"]; ?></b></h3>
<h5 align="center">Total Alloted:- <?php echo $num_totallotd; ?></h5>
<h5 align="center">Attended:- <?php echo $num_totattnd; ?></h5>
<h5 align="center">Not Attended:- <?php echo $num_totnotattnd; ?></h5>
<h5 align="center">MP:- 0</h5>
</div>
</div>
</div>
<?php
}
?>