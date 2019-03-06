<?php
include '../../config.php';
$state=$_GET['state'];
$state1=  strtolower($state);
$district=$_GET['district'];
//$block1=  strtolower($block);
$query="SELECT distinct `block_name` FROM `tbl_state_district_block_".$state1."` WHERE `state_name`='$state' and `district_name`='$district' order by `block_name` asc;";
$res=  mysqli_query($con, $query);
while ($row = mysqli_fetch_array($res)) {
    ?>
<option value="<?php echo ucfirst(strtolower($row['block_name'])); ?>"><?php echo ucfirst(strtolower($row['block_name'])); ?></option>
    <?php
}
?>

