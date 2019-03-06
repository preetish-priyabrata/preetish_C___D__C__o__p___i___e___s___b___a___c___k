<?php
session_start();
if($_SESSION['admin']){
	require 'config.php';

// hq_id	hq1
	$hq_id=$_POST['hq_id'];
	$query="SELECT * FROM `lt_master_zonal_place` WHERE `hq_code`='$hq_id' and `status`='1'";
	$sql_exe=mysqli_query($conn,$query);
	$num=mysqli_num_rows($sql_exe);

	if($num=="0"){
		?>
		<option value="">--No Zonal Is Enter To This HeadQuarter--</option>
		<?php
	}else{
		?>
		<option value="">--Select Zonal--</option>

		<?php
		while ($res=mysqli_fetch_assoc($sql_exe)) {
		?>
			<option value="<?=$res['zonal_code']?>"><?=$res['zonal_name']?></option>
			<?php
		}
	}

}else{
	header('Location:logout.php');
	exit;
}
