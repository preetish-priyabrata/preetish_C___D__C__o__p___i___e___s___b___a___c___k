<?php
error_reporting(0);
session_start();
include "../../config.php";
$class=$_REQUEST["class"];
$qry="SELECT DISTINCT `section` FROM `std_general_information` WHERE `class`='$class' ORDER BY `section` ASC";
$sql=mysqli_query($con, $qry);
?>
<option value="">-Select section-</option>
<?php
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo $row["section"]; ?>"><?php echo $row["section"]; ?></option>
<?php
}
?>
