<?php

include_once './protected.php';
include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg = new Message();
$adm = new Admin();
?>
<?php
    if(isset($_POST['editVisit'])){
        $visit_id= $_POST['visi_id'];
        $visi_date= $_POST['visi_date'];
        $visi_prog= $_POST['visi_prog'];
        $visi_publication= $_POST['visi_publication'];
        $res= $adm->editVisitDetails($visit_id,$visi_date,$visi_prog,$visi_publication);
        if($res){
            $msg->successMessage("Visit Details Updated Successfully");
        }  else {
            $msg->errorMessage("Failure. Try Again");
        }
    }
?>
 
<script src="../js/ajaxCall.js"></script>
<select name="company" onchange="fetchCompanyVisitDetails(this.value);">
    <option>--Company--</option>
    <?php
    $res = $adm->fetchCompanylist();
    while ($row = mysqli_fetch_array($res)) {
        echo "<option value= '$row[comp_id]'>" . $row['comp_name'] . "</option>";
    }
    ?>
</select>
<div id="visit">
    <div id="message">Choose Company To View Visit</div>    
</div>
