<?php
session_start();
if($_SESSION['admin_hq']){
	include '../config.php';

// hq_id	hq1
	$hq_id=$_POST['hq_id'];
	$query="SELECT * FROM `lt_master_machine__transfer_information` WHERE `t_status`='1' and `t_store_site_location`='$hq_id'";
	$sql_exe=mysqli_query($conn,$query);
	$num=mysqli_num_rows($sql_exe);

	if($num=="0"){
		?>
		<option value="">--No Machine found In this Site--</option>
		<?php
	}else{
		?>
		<option value="">--Select Machine No--</option>

		<?php
		while ($res=mysqli_fetch_assoc($sql_exe)) {
		?>
			<option value="<?=$res['t_unique_id_machine']?>"><?=$res['t_unique_id_machine']?></option>
			<?php
		}
	}

}else{
	header('Location:logout.php');
	exit;
}
