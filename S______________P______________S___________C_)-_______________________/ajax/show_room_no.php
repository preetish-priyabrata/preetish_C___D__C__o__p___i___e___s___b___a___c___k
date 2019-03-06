<?php
error_reporting(0);
session_start();
include "../config.php";

$exam=$_REQUEST["examname"];
$center=$_REQUEST["center"];

$qry="SELECT * FROM `preexam_sitting_arrangement_info` WHERE `exam_name`='$exam' AND `center_name`='$center'";
$sql=mysqli_query($conn, $qry);
?>
<option value="">--Select room--</option>
<?php
while($res=mysqli_fetch_array($sql))
{
	?>
<option value="<?php echo $res["room_no"]; ?>"><?php echo $res["room_no"]; ?></option>
<?php
}
?>