<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam"];
$_SESSION["exam"]=$exam_name;
$qry="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `application_submitted`='yes'";
$sql=mysqli_query($conn, $qry);
?>
<div class="tab-content">

<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
 <div style="height:470px; overflow:scroll; ">
<table class="table">
<tr>
<th>Enrollment No</th>
</tr>
<?php
while($res=mysqli_fetch_array($sql))
{
	$qry_cen="SELECT * FROM `candidate_application_info` WHERE `roll_no`='$res[roll_no]'";
$sql_cen=mysqli_query($conn, $qry_cen);
$res_cen=mysqli_fetch_array($sql_cen);
?>
<tr>
<td<?php if($res_cen["exam_centre"]!="") {?> style="color:#F00" <?php }?>><?php echo $res["roll_no"]; ?></td>
</tr>
<?php
}
?>
</table>
</div>
                  </div>
                  
                               
                               </div>
                  
