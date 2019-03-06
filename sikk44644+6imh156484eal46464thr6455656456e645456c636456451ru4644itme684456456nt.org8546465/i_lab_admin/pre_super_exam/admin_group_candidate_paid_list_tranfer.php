<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
<?php
session_start();
if($_SESSION['admin_Pre_tech_s']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();	     
  // [0] => 9 [slno_ca_group] => 9 [1] => 2 [group_id_slno] => 2 [2] => 9614655935 [candidate_mobile] => 9614655935 [3] => 2018-02-16732519 [candidate_application_id] => 2018-02-16732519 [4] => SK_2018-02-23_512 [candidate_applied] => SK_2018-02-23_512 [5] => 1 [paid_status] => 1 [6] => 2018-02-16 [date] => 2018-02-16 [7] => 12:49:19 [time] => 12:49:19 [8] => 512 [paid_id_slno] => 512 [9] => 0 [roll_status] => 0 [10] => [preference_one_pay] => [11] => [preference_two_pay] => [12] => 0 [transfer_paid_status] => 0 )  
  //  [slno_ca_group] => 9 [group_id_slno] => 2 [candidate_mobile] => 9614655935 [candidate_application_id] => 2018-02-16732519 [candidate_applied] => SK_2018-02-23_512 [paid_status] => 1 [date] => 2018-02-16 [time] => 12:49:19 [paid_id_slno] => 512 [roll_status] => 0 [preference_one_pay] => [preference_two_pay] => [transfer_paid_status] => 0 ) 							// 
  $i=0;
	$qry_exam="SELECT * FROM `ilab_group_candidate_info` WHERE `paid_status`='1' and `transfer_paid_status`='0' ";
    $sql_exam=mysqli_query($conn, $qry_exam);
   	$total=$NUM_PAID=mysqli_num_rows($sql_exam);
    if($NUM_PAID!="0"){

	    while($res_exam=mysqli_fetch_assoc($sql_exam)){
	    	$i++;
	    	$percent = intval($i/$total * 100)."%";
	    	// print_r($res_exam);
	    	$slno_ca_group=$res_exam['slno_ca_group'];
			$group_id_slno=$res_exam['group_id_slno'];
			$candidate_mobile=$res_exam['candidate_mobile'];
			$candidate_application_id=$res_exam['candidate_application_id'];
			$candidate_applied=$res_exam['candidate_applied'];
			$paid_status=$res_exam['paid_status'];
			$date=$res_exam['date'];
			$time=$res_exam['time'];
			$paid_id_slno=$res_exam['paid_id_slno'];
			$roll_status=$res_exam['roll_status'];
			$preference_one_pay=$res_exam['preference_one_pay'];
			$preference_two_pay=$res_exam['preference_two_pay'];
			$transfer_paid_status=$res_exam['transfer_paid_status'];

			$insert="INSERT INTO `ilab_group_candidate_info_paid`(`slno_ca_group`,`slno_ca_group_id`, `group_id_slno`, `candidate_mobile`, `candidate_application_id`, `candidate_applied`, `paid_status`, `date`, `time`, `paid_id_slno`, `roll_status`, `preference_one_pay`, `preference_two_pay`) VALUES (NULL,'$slno_ca_group','$group_id_slno','$candidate_mobile','$candidate_application_id','$candidate_applied','$paid_status','$date','$time','$paid_id_slno','$roll_status','$preference_one_pay','$preference_two_pay')";
			$sql_exe_insert=mysqli_query($conn, $insert);
			$check_login="SELECT * FROM `ilab_login` WHERE `mobile_no_L`='$candidate_mobile' and `paid_status`='0'";
			$sql_check_login=mysqli_query($conn, $check_login);
			$num_rows=mysqli_num_rows($sql_check_login);
			if($num_rows==1){
				// `slno_L`, `mobile_no_L`, `date`, `time`, `status`, `basic_status`, `complete_status`, `paid_status`
				$res_login_mobile=mysqli_fetch_assoc($sql_check_login);

				$slno_L=$res_login_mobile['slno_L'];
				$mobile_no_L=$res_login_mobile['mobile_no_L'];
				$date=$res_login_mobile['date'];
				$time=$res_login_mobile['time'];
				$status=$res_login_mobile['status'];
				$basic_status=$res_login_mobile['basic_status'];
				$complete_status=$res_login_mobile['complete_status'];
				$password=rand(100000,10000000);
				
				$INSERT_ID="INSERT INTO `ilab_login_paid`(`slno_L`,`slno_L_ID`, `mobile_no_L`, `date`, `time`, `status`, `basic_status`, `complete_status`, `paid_status_check`,`password`) VALUES (NULL,'$slno_L','$mobile_no_L','$date','$time','$status','$basic_status','$complete_status','1','$password')";
				mysqli_query($conn, $INSERT_ID);

				$UPDATE_LOGIN="UPDATE `ilab_login` SET `paid_status`='1' WHERE `slno_L`='$slno_L'";
				mysqli_query($conn, $UPDATE_LOGIN);

			}
			$UPDATE_PAID="UPDATE `ilab_group_candidate_info` SET`transfer_paid_status`='1' WHERE `slno_ca_group`='$slno_ca_group'";
			mysqli_query($conn, $UPDATE_PAID);

			echo '<script language="javascript">
			    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(pbar-ani.gif);\">&nbsp;</div>";
			    document.getElementById("information").innerHTML="'.$i.' to '.$total.' row(s) processed.";
			    </script>';

			// This is for the buffer achieve the minimum size in order to flush data
			    echo str_repeat(' ',1024*64);

			    
			// Send output to browser immediately
			    flush();


		}
		
		echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
		
		$msg->success('Successfull Filter Candidate for payment ');	
			header("location:index");
			exit;
	}else{
		$msg->error('No Candidate is present For Roll Generation Process');	
		header("location:index");
		exit;
	}


}else{
	header('Location:logout');
	exit;
}

