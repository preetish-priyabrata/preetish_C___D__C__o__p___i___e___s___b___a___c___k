<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam"];

$qry_qualified="SELECT * FROM `candidate_exam_mark` WHERE `exam_name`='$exam_name' AND `status`='$qualified'";
$sql_qualified=mysqli_query($conn, $qry_qualified);
?>
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<legend><h3>Qualified</h3></legend>
<table class="table">
<tr>
<th>Roll No</th>
<th>Profile</th>
<th>Mark</th>
<th></th>
<th></th>
<th></th>
</tr>
<?php
$i=1;
while($res_qualified=mysqli_fetch_array($sql_qualified))
{
$qry_appno="SELECT `application_no`, `category` FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `roll_no`='$res_qualified[roll_no]'";
$sql_appno=mysqli_query($conn, $qry_appno);
$res_appno=mysqli_fetch_array($sql_appno);

$qry_cutoff="SELECT `$res_appno[category]` FROM `exam_cutoff_marks` WHERE `exam_name`='$exam_name'";
$sql_cutoff=mysqli_query($conn, $qry_cutoff);
$res_cutoff=mysqli_fetch_array($sql_cutoff);

$qry_totmark="SELECT * FROM `exam_master_data` WHERE `examname`='$exam_name'";
$sql_totmark=mysqli_query($conn, $qry_totmark);
$res_totmark=mysqli_fetch_array($sql_totmark);
?>
<tr>
<td><?php echo $res_qualified["roll_no"]; ?></td>
<td><a target="_blank" href="view_application.php?appno=<?php echo $res_appno["application_no"];?>">View</a></td>
<td><a onclick="show_mark('<?php echo $i; ?>')">Mark</a></td>
<td id="s<?php echo $i; ?>" style="display:none">Secured:- <?php echo $res_qualified["secured_mark"]; ?></td>
<td id="t<?php echo $i; ?>" style="display:none">Total Mark:- <?php echo $res_totmark["exam_mark"]; ?></td>
<td id="c<?php echo $i; ?>" style="display:none">Cutoff:- <?php echo $res_cutoff[$res_appno["category"]]; ?></td>
</tr>
<?php
$i++;
}
?>

</table>
</div>