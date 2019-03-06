<?php
error_reporting(0);
session_start();
include "../config.php";
if($_SESSION['user']=="admintech@gmail.com")
{
	$usertype=$_REQUEST["usertype"];
	$username=$_REQUEST["username"];
	$qry_uinfo="SELECT * FROM `user_master_data` WHERE `usertype`='$usertype' AND `username`='$username'";
$sql_uinfo=mysqli_query($conn, $qry_uinfo);
$res_uinfo=mysqli_fetch_array($sql_uinfo);
	?>
<tr>
                  <td>Phone</td>
                  <td><input type="text" value="<?php echo $res_uinfo["phoneno"]; ?>" id="phone2" name="phone2" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Password</td>
                  <td><input type="password" value="<?php echo $res_uinfo["password"]; ?>" id="pw2" name="pw2" class="form-control"/></td>
                  </tr>
                  <?php
}
?>