<?php 
session_start();
if (($_SESSION['userId']!="")) {
	
	include 'config.php';
	$course_names=strtolower($_POST['course_names']);
	$check="SELECT * FROM `tbl_batch` WHERE `course_id`='$course_names' and `status`='2' and `certificate_status`='0'";
	$sql_check=mysqli_query($conn,$check);
	$num=mysqli_num_rows($sql_check);
	if($num=='0'){
		?>
		<option value="">--Batch of Course Is not completed--</option>
		<?php
		exit();
	}else{
		?>
		<option value="">--Please Select Batch--</option>
		<?php
		while ($res=mysqli_fetch_assoc($sql_check)) {
			?>
			<option value="<?=$res['sl_no']?>"><?=$res['batch_name']?></option>
			
	<?php	}
		
		exit;
	}
}else{
	header('Location:logout.php');
    exit;
}