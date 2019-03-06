<?php
include '../../config.php';
$state=$_REQUEST['state'];
$state1=  strtolower($state);

$query="SELECT distinct `district_name` FROM `tbl_state_district_block_".$state1."` WHERE `state_name`='$state' order by `district_name` asc;";
$res=  mysqli_query($con, $query);
while ($row = mysqli_fetch_array($res)) {
    ?>
<option value="<?php echo $row['district_name']; ?>" ><?php echo $row['district_name']; ?></option>
    <?php
}
?>