<?php

include_once './protected.php';
include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg= new Message();
$adm= new Admin();
?>
<script src="../js/ajaxCall.js"></script>
<div id="approveUser"></div>
<!--<div id="studentList"></div>-->

<?php
    if(isset($_POST['student'])){
        ?>
<?php
        $student= $_POST['student'];
        $loop= count($student);
        for($i=0;$i<$loop;$i++){
//            echo $student[$i];
            $res= $adm->approveStudent($student[$i]);
        }
        if($res){
            $msg->successMessage("Requested Student Approves Successfully");
        }  else {
            $msg->errorMessage("Errror !! Try Again");
        }
    }
?>
<?php
$res= $adm->generatePendingStudList();
$rows= mysqli_num_rows($res);
if($rows){
    ?>
<select name="visit" onchange="viewRegStudListForApproval(this.value);">
    <option>--Select College--</option>
    <?php
    $comp= $adm->fetchCollegeList();
    while($rowComp= mysqli_fetch_array($comp)){
        echo "<option value='$rowComp[coll_id]'>".$rowComp['coll_name']."</option>";
    }
    ?>
</select>
<form method="post" id="form_approval">
    <table width="800">
            <tr>
                <td>#Sl</td>
                <td>                    
                    <!--<input type="submit" name="approveStud" value="Approve">-->
                    <a href="#approve" onclick="document.getElementById('form_approval').submit();">Approve</a>
                </td>
                <td>Name</td>
                <td>Dob</td>
                <td>Address</td>
                <td>10Th</td>
                <td>Mark 10</td>
                <td>12Th</td>
                <td>Mark 12</td>
                <td>ITI</td>
                <td>Mark ITI</td>
                <td>Diploma</td>
                <td>Mark Diploma</td>
                <td>Approval</td>
            </tr>
            <tbody id="studentList">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td>
                        <input type="checkbox" name="student[]" value="<?php echo $row['user_id']; ?>">
                    </td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['user_dob']; ?></td>
                    <td><?php echo $row['user_address']; ?></td>
                    <td><?php echo $row['user_school_10']; ?></td>
                    <td><?php echo $row['user_per_10']; ?></td>
                    <td><?php echo $row['user_school_12']; ?></td>
                    <td><?php echo $row['user_per_12']; ?></td>
                    <td><?php echo $row['user_school_iti']; ?></td>
                    <td><?php echo $row['user_per_iti']; ?></td>
                    <td><?php echo $row['user_school_dip']; ?></td>
                    <td><?php echo $row['user_per_dip']; ?></td>
                    <td><a href="#approval" onclick="approveCandidate(<?php echo $row['user_id'];?>)">Approve</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
</form>

<?php
}  else {
    $msg->errorMessage("No Pending Student");
}
