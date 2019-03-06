<?php
error_reporting(0);
session_start();
include "../config.php";
if($_SESSION['user']=="admintech@gmail.com")
{
$examname=$_REQUEST["examname"];
$qry_dep="SELECT * FROM `exam_master_data` WHERE `examname`='$examname'";
$sql_dep=mysqli_query($conn, $qry_dep);
?>
<option value="">--Select Department--</option>
<?php
while($res_dep=mysqli_fetch_array($sql_dep))
{
?>
<option value="<?php echo $res_dep["department"]; ?>"><?php echo $res_dep["department"]; ?></option>
<?php
}
}
?>