<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["examname"];
$mon=$_REQUEST["mon"];
$yr=$_REQUEST["yr"];

$qry="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `application_submitted`='yes'";
$sql=mysqli_query($conn, $qry);
$num_row=mysqli_num_rows($sql);
if($num_row!='0')
{
?>
<div class="tab-content">

<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<div style="height:470px; overflow:scroll; ">
<table class="table">
                  <tr>
                  <th style="text-align:center">Names</th>
                  <th style="text-align:center">Date Of Submit</th>
                  <th style="text-align:center">Verify</th>
                  </tr>
                  <?php
				  while($res=mysqli_fetch_array($sql))
				  {
					  $qry_name="SELECT `candidate_name` FROM `candidate_personal_details` WHERE `application_no`='$res[application_no]'";
					  $sql_name=mysqli_query($conn, $qry_name);
					  $res_name=mysqli_fetch_array($sql_name);
				  ?>
                  <tr>
                  <td><?php echo $res_name["candidate_name"]; ?></td>
                  <td style="text-align:center"><?php echo $res["date_of_submit"]; ?></td>
                  <td style="text-align:center"><a target="_blank" href="view_application.php?appno=<?php echo $res["application_no"];?>">Verify</a></td>
                  </tr>
                  <?php
				  }
				  ?>
                  </table>
                  </div>
</div>
</div>
<?php
}
?>