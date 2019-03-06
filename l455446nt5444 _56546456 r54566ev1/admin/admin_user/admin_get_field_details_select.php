<?php
session_start();
if($_SESSION['admin']){
	require 'config.php';

// hq_id	hq1
?>
<div class="form-group">
	<label class="control-label col-lg-4 text-right">Field Store</label>
	<div class="col-lg-8">
		<select name="site_field_name" id="site_field_name" class="form-control" type="dropdown" required="">
<?php
	$hq_id=$_POST['hq_id'];
	$site_id=$_POST['site_id'];

	$query_field="SELECT * FROM `lt_master_field_place` WHERE `status`='1' and `zonal_code`='$site_id'";
	$sql_exe_field=mysqli_query($conn,$query_field);
	$num_field=mysqli_num_rows($sql_exe_field);

	if($num_field=="0"){
		?>
		<option value="">--No Field  Is Enter To This Site Store--</option>
		<?php
	}else{
		?>
		<option value="">--Select Field Store--</option>

		<?php
		while ($result_location=mysqli_fetch_assoc($sql_exe_field)) {
		?>
			<option value="<?=$result_location['field_code']?>"><?=$result_location['field_name']?></option>
			<?php
		}
	}
	?>
		</select>
	</div>
</div>
<br>


	<?php 
exit;
}else{
	header('Location:logout.php');
	exit;
}
?>
