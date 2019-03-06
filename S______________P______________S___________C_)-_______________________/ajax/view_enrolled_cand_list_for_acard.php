<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam"];
$centre=$_REQUEST["centre"];
$qry="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam_name' AND `application_submitted`='yes' AND `exam_centre`='$centre'";
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
?>
<tr>
<td><?php echo $res["roll_no"]; ?></td>
</tr>
<?php
}
?>
</table>
</div>

                  </div>
                  
                               
                               </div>
                  
