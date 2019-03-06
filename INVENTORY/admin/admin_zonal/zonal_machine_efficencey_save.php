<?php
session_start();
if($_SESSION['admin_zonal']){
	require 'FlashMessages.php';
	include  '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));
	$date_enter=date("Y-m-d", strtotime($_POST['date_enter']));;
	$reason_bd=$_POST['reason_bd'];
	$Remark=$_POST['Remark'];
	$Machine=$_POST['Machine'];
	$w_h=$_POST['w_h'];
	$i_h=$_POST['i_h'];
	$m_t=$_POST['m_t'];
	$b_d_mcl=$_POST['b_d_mcl'];
	$b_d_lnt=$_POST['b_d_lnt'];
	$avl_hrs=$_POST['avl_hrs'];
	$shift_hrs=$_POST['shift_hrs'];
	$picks=$_POST['picks'];
	$diesel=$_POST['diesel'];
	$production=$_POST['production'];
	$site_mine_loc=$_POST['site_mine_loc'];
	$entry_user_id=$_SESSION['admin_zonal'];
	$month=date('m');
	$year=date('Y');
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$zonal_place=$_SESSION['zonal_place'];
	$targetDir="../uploads/machine_performance";
	$insert="INSERT INTO `lt_master_machine_uses`(`slno`, `w_h`, `i_h`, `m_t`, `b_d_mcl`, `b_d_lnt`, `avl_hrs`, `shift_hrs`, `picks`, `diesel`, `production`, `site_mine_loc`, `entry_user_id`, `year`, `month`, `date`, `time`, `status`,`location_id`,`Machine`,`date_enter`, `Remark`, `reason_bd`) VALUES (Null,'$w_h', '$i_h', '$m_t', '$b_d_mcl', '$b_d_lnt', '$avl_hrs', '$shift_hrs', '$picks', '$diesel', '$production', '$site_mine_loc', '$entry_user_id', '$year', '$month', '$date', '$time','1','$zonal_place','$Machine','$date_enter','$Remark','$reason_bd')";
	$count=0;
	$sql_insert_zonal=mysqli_query($conn,$insert);
	$last_id=mysqli_insert_id($conn);
	if(count($_FILES["files_attach"]['name'])>0){
		for($j=0; $j < count($_FILES["files_attach"]['name']); $j++){
			$uploads=mt_getrandmax()."-".date('y-m-d')."-".$_FILES['files_attach']['name'][$j];
			if(is_uploaded_file($_FILES['files_attach']['tmp_name'][$j])) {
				$count++;
				$tmpFilePath = $_FILES['files_attach']['tmp_name'][$j];
				if(move_uploaded_file($tmpFilePath,"$targetDir/".$uploads)){
					$file_insert="INSERT INTO `lt_master_machine_efficentent_attach`(`slno_attach`, `slno_id`, `attach_name`, `date`) VALUES (Null, '$last_id','$uploads','$date')";
					mysqli_query($conn,$file_insert);
				}
			}
		}
	}
	$update_details="UPDATE `lt_master_machine_uses` SET `nos_attach_files`='$count' where `slno`='$last_id'";
	mysqli_query($conn,$update_details);
	// lt_master_machine_efficentent_attach
	$msg->success('Successfully Data Is stored');
	header('Location:index.php');
	exit;

}else{
	header('Location:logout.php');
	exit;
}