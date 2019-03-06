<?php
error_reporting(0);
session_start();
include "../config.php";
if($_SESSION['user']=="admintech@gmail.com")
{
$utype=$_REQUEST["usertype"];
$qry_uname="SELECT * FROM `user_master_data` WHERE `usertype`='$utype'";
$sql_uname=mysqli_query($conn, $qry_uname);
?>
<option value="">--Select Username--</option>
<?php
while($res_uname=mysqli_fetch_array($sql_uname))
{
?>
<option value="<?php echo $res_uname["username"]; ?>"><?php echo $res_uname["username"]; ?></option>
<?php
}
}
?>