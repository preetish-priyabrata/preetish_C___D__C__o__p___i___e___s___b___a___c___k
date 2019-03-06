<?php
error_reporting(0);
session_start();
include "../config.php";
if($_SESSION['user']=="admintech@gmail.com")
{
$examname=$_REQUEST["examname"];
$examdep=$_REQUEST["examdep"];
$qry_info="SELECT * FROM `exam_master_data` WHERE `examname`='$examname' AND `department`='$examdep'";
$sql_info=mysqli_query($conn, $qry_info);
$res_info=mysqli_fetch_array($sql_info);
?>
<tr>
                  <td>Date Of Exam</td>
                  <td><input type="text" id="doe2" name="doe2" value="<?php echo $res_info["exam_date"]; ?>" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Venue</td>
                  <td><input type="text" id="ven2" name="ven2" value="<?php echo $res_info["venue"]; ?>" class="form-control"/></td>
                  </tr>
                  <?php
}
?>