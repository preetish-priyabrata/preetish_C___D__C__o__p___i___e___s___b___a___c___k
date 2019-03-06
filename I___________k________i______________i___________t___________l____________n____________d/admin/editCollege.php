<?php

include_once './protected.php';
include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg = new Message();
$adm = new Admin();
?>
<script src="../js/ajaxCall.js"></script>
<select name="company" onchange="fetchCollegeDetails(this.value);">
    <option>--Select--</option>
    <?php
    $res = $adm->fetchCollegeList();
    while ($row = mysqli_fetch_array($res)) {
        echo "<option value= '$row[coll_id]'>" . $row['coll_name'] . "</option>";
    }
    ?>
</select>

<?php
if(isset($_POST['editCollege'])){
    $college= $_POST['college'];
    $branch= $_POST['branch'];
    $intake= $_POST['intake'];
    $curintake= $_POST['curintake'];
    $year= $_POST['year'];
    $loop= count($intake);
    for($i=0;$i<$loop;$i++){
        $res= $adm->editBranchInformation($college,$branch[$i],$intake[$i],$curintake[$i],$year[$i]);
    }
    if($res){
        $msg->successMessage("Branch Details Updated Successfully");
    }  else {
        $msg->errorMessage("Failure In Updation. Try Again.");
    }
}
?>
<div id="collegeDetails">
      <div id="message">Choose College To View Details</div>
</div>

