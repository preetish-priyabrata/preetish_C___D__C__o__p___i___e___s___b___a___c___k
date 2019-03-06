<?php

include_once './protected.php';
include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg = new Message();
$adm = new Admin();
?>
<script src="../js/ajaxCall.js"></script>
<?php
if(isset($_POST['visit'])){
    $visit= $_POST['visit'];
    $student= $_POST['student'];
    $loop= count($student);
    for($i=0;$i<$loop;$i++){
        $res= $adm->studentCampusselection($student[$i], $visit);
    }
    if($res){
        $msg->successMessage("Campus Result Updated Successfully");
    }  else {
        $msg->errorMessage("Error in updation.. Please Try Again");
    }
}
?>
<?php
$resComp = $adm->generateLastVisitedCompanyList();
$i = 0;
$rows = mysqli_num_rows($resComp);
if ($rows) {
    while ($rowComp = mysqli_fetch_array($resComp)) {
        if ($i % 4 == 0) {
            echo "<p style= 'clear:both;'></p>";
        }
        ?>

        <div style="float: left;padding: 15px">
            <a style="display: block" href="#reg" onclick="viewRegStudListForSelection(<?php echo $rowComp['visi_id']; ?>);">
                <img src="../content/company_logo/<?php echo $rowComp['comp_logo'] ?>" height="150" width="150"/>
            </a>
        </div>

        <?php
        $i++;
    }
} else {
    $msg->errorMessage("No Upcoming Company Found");
}
?>
<div id="studentList"></div>

<!--<div id="userStatus"></div>-->