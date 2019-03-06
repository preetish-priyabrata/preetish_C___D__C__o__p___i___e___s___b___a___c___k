<?php 
 // print_r($_POST);
 // exit;
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [Desigination_user] => 1 [user_name] => Preetish [user_email] => ppriyabrata@gmail.com [user_mobile] => 9433370001 [user_alt_mobile] => [user_id] => [user_Password] => 123456 [user_conf_Password] => 123456 [state_id] => BR [district_id] => ) 
date_default_timezone_set("Asia/Kolkata");
$state_id=trim($_POST['state_id']);
$Desigination_user=$_POST['Desigination_user'];
$date=date('Y-m-d');
$time=date('H:i:s');
$Desigination_name=trim($_POST['Desigination_name']);
$village=$_POST['village'];
$user_mobile1=trim($_POST['user_mobile']);
$sim=$_POST['sim'];
$user_emails=trim($_POST['user_email']);

$quer_check1="SELECT * FROM `rhc_master_login_user` WHERE `user_email`='$user_emails'";
$sql_exe1=mysqli_query($conn,$quer_check1);
$num1=mysqli_num_rows($sql_exe1);
if($num1==0){
$quer_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$user_mobile1'";
$sql_exe=mysqli_query($conn,$quer_check);
$num=mysqli_num_rows($sql_exe);
if($num==0){
	if($Desigination_user==1){
		// Array ( [Desigination_user] => 1 [user_name] => Preetish [user_email] => ppriyabrata@gmail.com [user_mobile] => 9433370001 [user_alt_mobile] => [user_id] => [user_Password] => 123456 [user_conf_Password] => 123456 [state_id] => BR [district_id] => ) 

		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);

		
		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`,  `user_id`, `password`, `place_state_id`,`date_creation`, `time_creation`) VALUES (NULL,'$user_name' ,'$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','$user_Password','$state_id','$date','$time')";


	}else if($Desigination_user==2){
		// Array ( [Desigination_user] => 2 [user_name] => admin [user_email] => ppriyabrata@gmail.com [user_mobile] => 9433370001 [user_alt_mobile] => [user_id] => [user_Password] => ss [user_conf_Password] => ss [state_id] => BR [district_id] => Pat ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);

		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`, `user_id`, `password`, `place_state_id`, `place_district_id`, `date_creation`, `time_creation`) VALUES (NULL,'$user_name' ,'$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','$user_Password','$state_id','$district_id','$date','$time')";

	}else if($Desigination_user==3){
		// Array ( [Desigination_user] => 3 [user_name] => Preetish [user_email] => aaa [user_mobile] => aaa [user_alt_mobile] => [user_id] => [user_Password] => aaa [user_conf_Password] => aaa [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => PATS ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);
		$optradio=trim($_POST['optradio']);
		$block_id=trim($_POST['block_id']);

		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`,  `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `date_creation`, `time_creation`,`village`,`sim`) VALUES (NULL,'$user_name' ,'$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','$user_Password','$state_id','$district_id','$optradio','$block_id','$date','$time','$village','$sim')";

	}else if($Desigination_user==4){
		// Array ( [Desigination_user] => 4 [user_name] => sddssd [user_email] => sdsdsd [user_mobile] => ssdsd [user_alt_mobile] => [user_id] => [user_Password] => dssd [user_conf_Password] => sddssd [state_id] => BR [district_id] => Pat [optradio] => 1 [district_hospital_id] => PMCH ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);
		$optradio=trim($_POST['optradio']);
		// $block_id=trim($_POST['block_id']);
		$district_hospital_id=trim($_POST['district_hospital_id']);

		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`,  `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `date_creation`, `time_creation`,`village`,`sim`) VALUES (NULL,'$user_name' ,'$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','$user_Password','$state_id','$district_id','$optradio','$district_hospital_id','$date','$time','$village','$sim')";

	}else if($Desigination_user==5){
		// Array ( [Desigination_user] => 5 [user_name] => dddf [user_email] => fdfdfd [user_mobile] => fdfddf [user_alt_mobile] => [user_id] => [user_Password] => fdfdfd [user_conf_Password] => fddffd [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => PHUS [sub_center] => 1 [phc_id] => PHC-PHUS ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);
		$optradio=($_POST['optradio']);
		$block_id=($_POST['block_id']);
		$sub_center=($_POST['sub_center']);
		$phc_id=($_POST['phc_id']);

		 $query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`,  `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `place_phc_aphc_status`, `place_phc_aphc_id`, `date_creation`, `time_creation`,`village`,`sim`) VALUES (NULL,'$user_name' ,'$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','$user_Password','$state_id','$district_id','$optradio','$block_id','$sub_center','$phc_id','$date','$time','$village','$sim')";


	}else if($Desigination_user==6){
		// Array ( [Desigination_user] => 6 [user_name] => sdsds [user_email] => sddssd [user_mobile] => dsdssd [user_alt_mobile] => [user_id] => [user_Password] => sddsds [user_conf_Password] => dsdsds [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => ATHM [sub_center] => 2 [APHC_id] => APHC001 ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);
		$optradio=trim($_POST['optradio']);
		$block_id=trim($_POST['block_id']);
		$sub_center=trim($_POST['sub_center']);
		$APHC_id=trim($_POST['APHC_id']);

		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`,  `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `place_phc_aphc_status`, `place_phc_aphc_id`, `date_creation`, `time_creation`,`village`,`sim`) VALUES (NULL,'$user_name' ,'$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','$user_Password','$state_id','$district_id','$optradio','$block_id','$sub_center','$APHC_id','$date','$time','$village','$sim')";

	}else if($Desigination_user==7){
		// Array ( [Desigination_user] => 7 [user_name] => sddds [user_email] => sddssd [user_mobile] => dsdsds [user_alt_mobile] => [user_id] => [user_Password] => [user_conf_Password] => [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => ATHM [sub_center] => 2 [APHC_id] => APHC001 [sub_APHC_id] => HSC001 ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);
		$optradio=trim($_POST['optradio']);
		$block_id=trim($_POST['block_id']);
		$sub_center=trim($_POST['sub_center']);
		$APHC_id=trim($_POST['APHC_id']);
		if($sub_center==2){
			$sub_APHC_id=trim($_POST['sub_APHC_id']);
			$APHC_id=trim($_POST['APHC_id']);
		}else{
			$sub_APHC_id=trim($_POST['sub_phc_id']);
			$APHC_id=trim($_POST['phc_id']);		
		}
		// S$asha_level_anm_level=$_POST['asha_level_anm_level'];

		// $query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`,  `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `place_phc_aphc_status`, `place_phc_aphc_id`, `sub_center_id`, `date_creation`, `time_creation`,`asha_top_level`) VALUES (NULL,'$user_name' ,'$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','$user_Password','$state_id','$district_id','$optradio','$block_id','$sub_center','$APHC_id','$sub_APHC_id','$date','$time','$asha_top_level')";

		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,`user_designation`, `user_designation_name`, `user_email`, `user_mobile`, `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `place_phc_aphc_status`, `place_phc_aphc_id`, `village`, `sim`, `sub_center_id`,`date_creation`, `time_creation`) VALUES (NULL,'$user_name','$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','1234','$state_id','$district_id','$optradio','$block_id','$sub_center','$APHC_id','$village','$sim','$sub_APHC_id','$date','$time')";
	}else if($Desigination_user==8){
		// Array ( [Desigination_user] => 8 [user_name] => sddds [user_email] => sddssd [user_mobile] => dsdsds [user_alt_mobile] => [user_id] => [user_Password] => [user_conf_Password] => [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => ATHM [sub_center] => 2 [APHC_id] => APHC001 [sub_APHC_id] => HSC001 ) 
		// Array ( [Desigination_user] => 7 [Desigination_name] => ,NLNLKN [Village] => [Sim] => [user_name] => JNLNL [user_email] => KKMK [user_mobile] => LLLL [user_alt_mobile] => [user_id] => KKMK [user_Password] => [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => ATHM [sub_center] => 1 [phc_id] => PHC-ATHM [sub_phc_id] => HSC-ATHM ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);
		$optradio=trim($_POST['optradio']);
		$block_id=trim($_POST['block_id']);
		$sub_center=trim($_POST['sub_center']);
		$APHC_id=trim($_POST['APHC_id']);
		if($sub_center==2){
			$sub_APHC_id=trim($_POST['sub_APHC_id']);
			$APHC_id=trim($_POST['APHC_id']);
		}else{
			$sub_APHC_id=trim($_POST['sub_phc_id']);
			$APHC_id=trim($_POST['phc_id']);		
		}
		//$asha_level_anm_level=$_POST['asha_level_anm_level'];

		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`, `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `place_phc_aphc_status`, `place_phc_aphc_id`, `village`, `sim`, `sub_center_id`,  `date_creation`, `time_creation`) VALUES (NULL,'$user_name','$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','1234','$state_id','$district_id','$optradio','$block_id','$sub_center','$APHC_id','$village','$sim','$sub_APHC_id','$date','$time')";
	}else if($Desigination_user==9){
		// Array ( [Desigination_user] => 9 [Desigination_name] => 1234 [Village] => [Sim] => [user_name] => 112 [user_email] => FF@BBKJ.COMQ [user_mobile] => 5643 [user_alt_mobile] => [user_id] => FF@BBKJ.COMQ [user_Password] => [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => ATHM [sub_center] => 1 [phc_id] => PHC-ATHM [asha_level_anm_level] => 1 [sub_phc_id] => HSC-ATHM ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);
		$optradio=trim($_POST['optradio']);
		$block_id=trim($_POST['block_id']);
		$sub_center=trim($_POST['sub_center']);
		$APHC_id=trim($_POST['APHC_id']);
		if($sub_center==2){
			$sub_APHC_id=trim($_POST['sub_APHC_id']);
			$APHC_id=trim($_POST['APHC_id']);
		}else{
			$sub_APHC_id=trim($_POST['sub_phc_id']);
			$APHC_id=trim($_POST['phc_id']);		
		}
		$asha_level_anm_level=$_POST['asha_level_anm_level'];


		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`, `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `place_phc_aphc_status`, `place_phc_aphc_id`, `village`, `sim`, `sub_center_id`, `date_creation`, `time_creation`, `asha_top_level`) VALUES (NULL,'$user_name','$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','1234','$state_id','$district_id','$optradio','$block_id','$sub_center','$APHC_id','$village','$sim','$sub_APHC_id','$date','$time','$asha_level_anm_level')";
	}else if($Desigination_user==10){
		// Array ( [Desigination_user] => 8 [user_name] => sddds [user_email] => sddssd [user_mobile] => dsdsds [user_alt_mobile] => [user_id] => [user_Password] => [user_conf_Password] => [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => ATHM [sub_center] => 2 [APHC_id] => APHC001 [sub_APHC_id] => HSC001 ) 
		// Array ( [Desigination_user] => 10 [Desigination_name] => demo [Village] => [Sim] => [user_name] => Anm Officer [user_email] => anm@ilab.com [user_mobile] => 120 [user_alt_mobile] => [user_id] => anm@ilab.com [user_Password] => [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => ATHM [sub_center] => 1 [phc_id] => PHC-ATHM [asha_level_anm_level] => 1 [sub_phc_id] => HSC-ATHM ) 
		// Array ( [Desigination_user] => 10 [Desigination_name] => user [Village] => [Sim] => [user_name] => uu [user_email] => u@ilab [user_mobile] => 789 [user_alt_mobile] => [user_id] => u@ilab [user_Password] => [state_id] => BR [district_id] => Pat [optradio] => 2 [block_id] => ATHM [sub_center] => 2 [APHC_id] => APHC001 [asha_level_anm_level] => 2 [sub_APHC_id] => HSC001 ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);
		$optradio=trim($_POST['optradio']);
		$block_id=trim($_POST['block_id']);
		$sub_center=trim($_POST['sub_center']);
		$APHC_id=trim($_POST['APHC_id']);
		if($sub_center==2){
			$sub_APHC_id=trim($_POST['sub_APHC_id']);
			$APHC_id=trim($_POST['APHC_id']);
		}else{
			$sub_APHC_id=trim($_POST['sub_phc_id']);
			$APHC_id=trim($_POST['phc_id']);		
		}
		$asha_level_anm_level=$_POST['asha_level_anm_level'];

		// $query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`,  `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `place_phc_aphc_status`, `place_phc_aphc_id`, `sub_center_id`, `date_creation`, `time_creation`,`asha_top_level`) VALUES (NULL,'$user_name' ,'$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','$user_Password','$state_id','$district_id','$optradio','$block_id','$sub_center','$APHC_id','$sub_APHC_id','$date','$time','$asha_top_level')";

		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`, `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `place_phc_aphc_status`, `place_phc_aphc_id`, `village`, `sim`, `sub_center_id`,  `date_creation`, `time_creation`, `asha_top_level`) VALUES (NULL,'$user_name','$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','1234','$state_id','$district_id','$optradio','$block_id','$sub_center','$APHC_id','$village','$sim','$sub_APHC_id','$date','$time','$asha_level_anm_level')";

	}else if($Desigination_user==11){
		// Array ( [Desigination_user] => 4 [user_name] => sddssd [user_email] => sdsdsd [user_mobile] => ssdsd [user_alt_mobile] => [user_id] => [user_Password] => dssd [user_conf_Password] => sddssd [state_id] => BR [district_id] => Pat [optradio] => 1 [district_hospital_id] => PMCH ) 
		$user_name=trim($_POST['user_name']);
		$user_email=trim($_POST['user_email']);
		$user_mobile=trim($_POST['user_mobile']);
		$user_alt_mobile=trim($_POST['user_alt_mobile']);
		$user_id=trim($_POST['user_id']);
		$user_Password=trim($_POST['user_Password']);
		$user_conf_Password=trim($_POST['user_conf_Password']);
		$district_id=trim($_POST['district_id']);
		$optradio='3';
		// $block_id=trim($_POST['block_id']);
		$district_hospital_id=trim($_POST['uphc']);

		$query_insert="INSERT INTO `rhc_master_login_user`(`slno`, `user_name`,  `user_designation`, `user_designation_name`, `user_email`, `user_mobile`,  `user_id`, `password`, `place_state_id`, `place_district_id`, `place_block_dh_status`, `place_block_dh_id`, `date_creation`, `time_creation`,`village`,`sim`) VALUES (NULL,'$user_name' ,'$Desigination_user','$Desigination_name','$user_email','$user_mobile','$user_id','$user_Password','$state_id','$district_id','$optradio','$district_hospital_id','$date','$time','$village','$sim')";

	}else{
		header('Location:logout.php');
		exit;
	}
	 // echo $query_insert;
	 // exit;
	 $query_exec=mysqli_query($conn,$query_insert);	
	 // echo mysqli_error($conn);
	 // exit();
	if($query_exec)	{
		$msg->success('User Account Created SuccessFully');
 		header("location:admin_user_creation.php");
		exit;
	}else{
		$msg->error('Something Went Wrong Please Try It Again');
 		header("location:admin_user_creation.php");
		exit;
	}
}else{
	$msg->error('Mobile No Is Present In Our Record '.$user_mobile1);
 		header("location:admin_user_creation.php");
		exit;
}
}else{
	$msg->error('User ID Is Present In Our Record '.$user_emails);
 		header("location:admin_user_creation.php");
		exit;
}
}else{
	header('Location:logout.php');
	exit;
}

 ?>