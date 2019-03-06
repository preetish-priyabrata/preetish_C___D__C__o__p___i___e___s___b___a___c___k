<?php 
session_start();
if($_SESSION['admin_zonal']){
	require 'FlashMessages.php';
	include  '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$form_type=web_decryptIt(str_replace(" ", "+", $_POST['form_type']));
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
	$insert="INSERT INTO `lt_master_machine_uses`(`slno`, `w_h`, `i_h`, `m_t`, `b_d_mcl`, `b_d_lnt`, `avl_hrs`, `shift_hrs`, `picks`, `diesel`, `production`, `site_mine_loc`, `entry_user_id`, `year`, `month`, `date`, `time`, `status`,`location_id`,`Machine`) VALUES (Null,'$w_h', '$i_h', '$m_t', '$b_d_mcl', '$b_d_lnt', '$avl_hrs', '$shift_hrs', '$picks', '$diesel', '$production', '$site_mine_loc', '$entry_user_id', '$year', '$month', '$date', '$time','1','$zonal_place','$Machine')";
	$sql_insert_zonal=mysqli_query($conn,$insert);
	$msg->success('Successfully Data Is stored');
	header('Location:index.php');
	exit;

}else{
	header('Location:logout.php');
	exit;
}