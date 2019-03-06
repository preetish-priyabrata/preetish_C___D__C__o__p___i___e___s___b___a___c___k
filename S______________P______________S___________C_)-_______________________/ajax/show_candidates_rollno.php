<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam_name"];
$centre=$_REQUEST["centre"];
$qry="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `application_submitted`='yes' AND `exam_centre`='$centre'";
$sql=mysqli_query($conn, $qry);
?>
<div class="tab-content">

<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<div style="height:470px; overflow:scroll; ">
<form action="save_update_attendance.php" id="updt_attnd" name="updt_attnd" enctype="multipart/form-data">
<input type="hidden" id="examname" name="examname" value="<?php echo $exam_name; ?>" />
<input type="hidden" id="centername" name="centername" value="<?php echo $centre; ?>" />
<table class="table">
<tr>
<th>Enrollment No</th>
<th><input type="checkbox" id="all" name="all" onclick="select_all(this)"/>Select All</th>
</tr>
<?php
$i=0;
while($res=mysqli_fetch_array($sql))
{
	$i++;
?>
<tr>
<td><?php echo $res["roll_no"]; ?></td>
<td><input type="checkbox" id="chk<?php echo $i; ?>" name="<?php echo $res["roll_no"]; ?>" /></td>
</tr>
<?php
}
?>

<tr>
<td colspan="2" style="text-align:center"><input type="submit" id="update" name="update" value="Update" class="btn-primary"></td>
</tr>
</table>
</form>
</div>
</div>
                  
                               
                               </div>
                  
