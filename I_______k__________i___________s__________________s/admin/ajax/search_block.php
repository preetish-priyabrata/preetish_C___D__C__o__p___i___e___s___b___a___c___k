<?php
include '../../config.php';
$dist = $_REQUEST['dist'];

if($dist == 'all')
{
	$str = "SELECT `block_name` FROM `tbl_state_district_block_odisha` ORDER BY `block_name` ";
}else{
	$str = "SELECT `block_name` FROM `tbl_state_district_block_odisha` WHERE district_name='$dist' ORDER BY `block_name` ";
	}
?>
<select class="select" style="height:40px;" name="block" id="block">
                        <option value="">-Select Block-</option>
                        <?php
                        
						$sql = mysqli_query($con,$str);
						while($data = mysqli_fetch_array($sql))
						{
						?>
                        <option><?php echo $data['block_name'];?></option>
                        <?php
						}
						?>
                    </select>
