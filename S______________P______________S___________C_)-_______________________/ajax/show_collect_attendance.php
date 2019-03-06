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
<form action="save_collect_attendance.php" id="col_attnd" name="col_attnd" method="post" enctype="multipart/form-data">
<input type="hidden" id="examname" name="examname" value="<?php echo $exam_name; ?>" />
<input type="hidden" id="centername" name="centername" value="<?php echo $centre; ?>" />
<table class="table">
<tr>
<th>Total Attendance Sheet Provided:-</th>
<td><input type="text" readonly="readonly" style="background:none; border:none;" id="total_sheet" name="total_sheet" value="<?php echo (round($total_cand/10)); ?>" /></td>
</tr>
<tr>
<th>Total candidates:-</th>
<td><input type="text" readonly="readonly" style="background:none; border:none;" id="total_cand" name="total_cand" value="<?php echo $total_cand; ?>" /></td>
</tr>
<tr>
<th>Total Present</th>
<td><input type="text" id="present" name="present" class="form-control"></td>
</tr>
<tr>
<th>Total Absent</th>
<td><input type="text" id="absent" name="absent" class="form-control"></td>
</tr>
<tr>
<th>Total MP</th>
<td><input type="text" id="mp" name="mp" class="form-control"></td>
</tr>
<tr>
<th>Submited By</th>
<td><input type="text" id="sub_by" name="sub_by" class="form-control"></td>
</tr>
<tr>
<td colspan="2" style="text-align:center"><input type="submit" id="submit" name="submit" value="Submit" class="btn-primary"></td>
</tr>
</table>
</form>
</div>
    </div>
                  
