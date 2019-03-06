<?php
require 'config.php';
require 'class_lib_district.php';
require 'class_lib_state.php';
require 'class_lib_block.php';
require 'class_lib_district_hospital.php';
require 'class_lib_phc.php';
require 'class_lib_aphc.php';
require 'class_lib_phc_sub.php';
require 'class_lib_aphc_sub.php';
require 'class_lib_asha.php';
require 'class_lib_uphc.php';

date_default_timezone_set("Asia/Kolkata");
// echo "<pre>";
// print_r($_REQUEST);
// Array ( [from] => [message] => [messages] => Submit Query ) 
$mobile=$_REQUEST['from']; // raw mobile no with 91
$message=$_REQUEST['message']; // rw message
$mob=substr($mobile,2); //remove 91 from mobile
$no_charaater=strlen($message);
$item_details=json_encode(explode(" ",$message));
$date=date('Y-m-d');
$time= date('H:i:s');

 $query="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`, `date`, `time`) VALUES (NULL, '$message','$mobile','$item_details','$no_charaater','$date','$time')";
 $sql_exe_sms=mysqli_query($conn,$query);
 if($sql_exe_sms){
	$query_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mob'";
	$sql_exe=mysqli_query($conn,$query_check);
	$num_rows=mysqli_num_rows($sql_exe);
	if($num_rows==0){
	echo "Sorry This Facilities Not Available Now";// her it will storr in database or istock or bstock
	exit;
	}else{
	//	$messages=new msg();

	 $result_fetch=mysqli_fetch_assoc($sql_exe);
	 $user_designation=$result_fetch['user_designation'];
	 switch ($user_designation) {
	 	case '1':
	 		echo state($mob,$message);
	 		break;
	 	case '2':
	 			// $messages->mobiles=$mob;
	 			// $messages->message1s=$message;
	 		echo districts($mob,$message);
	 		exit;
	 		break;
	 	case '3':
	 		echo block($mob,$message);
	 		exit;
	 		break;
	 	case '4':
	 		echo dh($mob,$message);
	 		exit;
	 		break;
	 	case '5':
	 		echo phc($mob,$message);
	 		exit;
	 		break;
	 	case '6':
	 		echo aphc($mob,$message);
	 		exit;
	 		break;
	 	case '7':
	 		echo phc_sub($mob,$message);
	 		exit;
	 		break;
	 	case '8':
	 		echo aphc_sub($mob,$message);
	 		exit;
	 		break;
	 	case '9':
	 		echo asha($mob,$message);
	 		exit;
	 		break;
	 	case '11':
	 		echo uphc($mob,$message);
	 		exit;
	 		break;
	 	
	 	default:
	 		echo "Sorry This Facilities Not Available Now";
	 		exit;
	 		break;
	 }
	 
	}
}else{
 	echo "fail";
 	exit;
 }