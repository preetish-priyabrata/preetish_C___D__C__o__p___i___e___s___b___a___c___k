<?php
include '../config.php';
$state=$_GET['state'];
$state1=  strtolower($state);
echo $query="SELECT distinct `district_name` FROM `tbl_state_district_block_".$state1."` WHERE `state_name`='$state' order by `district_name` asc;";
$res=  mysqli_query($con, $query);
while ($row = mysqli_fetch_array($res)) {
    ?>
<option><?php echo ucfirst(strtolower($row['district_name'])); ?></option>
    <?php
}
?>