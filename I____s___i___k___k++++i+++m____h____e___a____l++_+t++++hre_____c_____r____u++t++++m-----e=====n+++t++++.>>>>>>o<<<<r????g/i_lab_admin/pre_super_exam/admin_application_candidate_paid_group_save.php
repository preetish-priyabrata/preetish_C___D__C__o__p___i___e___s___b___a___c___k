<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
<?php
// flush();
session_start();
if($_SESSION['admin_Pre_tech_s']){
	require 'FlashMessages.php';
	require '../config.php';
	 $msg = new \Preetish\FlashMessages\FlashMessages();
	 $i=0;	     


	$get_checked="SELECT * FROM `ilab_login_paid` WHERE `group_id_status`='0'";
	$sql_check_paid=mysqli_query($conn,$get_checked);
	$total=$NUM_PAID=mysqli_num_rows($sql_check_paid);
	if($NUM_PAID!="0"){
	    	while($res_check_paid=mysqli_fetch_assoc($sql_check_paid)){
	    		// print_r($res_check_paid);
	    		$i++;	
	    		// Array ( [slno_L] => 1 [slno_L_ID] => 18 [mobile_no_L] => 9614655935 [date] => 2018-02-16 [time] => 12:32:07 [status] => 1 [basic_status] => 1 [complete_status] => 1 [paid_status_check] => 1 [password] => 9451760 [paid_application] => 0 )
	    		
	    		$mobile_no_L=$res_check_paid['mobile_no_L'];
	    		$slno_L=$res_check_paid['slno_L'];

	    		$get_detail_paid="SELECT * FROM `ilab_group_candidate_info_paid` WHERE `candidate_mobile`='$mobile_no_L'";
	    		$sql_get_application=mysqli_query($conn,$get_detail_paid);

	    		$num_row=mysqli_num_rows($sql_get_application);
	    		if($num_row==1){
		    		$get_application_fetch=mysqli_fetch_assoc($sql_get_application);
		    			// print_r($get_application_fetch);
		    		// Array ( [slno_ca_group] => 1 [slno_ca_group_id] => 9 [group_id_slno] => 2 [candidate_mobile] => 9614655935 [candidate_application_id] => 2018-02-16732519 [candidate_applied] => SK_2018-02-23_512 [paid_status] => 1 [date] => 2018-02-16 [time] => 12:49:19 [paid_id_slno] => 512 [roll_status] => 1 [preference_one_pay] => [preference_two_pay] => [transfer_paid_info] => 1 ) 
		    		$group_id_slno=$get_application_fetch['group_id_slno'];
		    		if($group_id_slno==1){
		    			$update="UPDATE `ilab_login_paid` SET `group_id_driver`='1', `group_id_d`='2', `group_id_status`='1', `group_both_id`='1' where `slno_L`='$slno_L'";
		    		}else if($group_id_slno==2){
		    			$update="UPDATE `ilab_login_paid` SET `group_id_driver`='2', `group_id_d`='1', `group_id_status`='1', `group_both_id`='1' where `slno_L`='$slno_L'";
		    		}
		    		
		    	}else{
		    		$update="UPDATE `ilab_login_paid` SET `group_id_driver`='1', `group_id_d`='1', `group_id_status`='1', `group_both_id`='2' where `slno_L`='$slno_L'";
		    	}

		    	if(mysqli_query($conn,$update)){

			    	echo '<script language="javascript">
					    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(pbar-ani.gif);\">&nbsp;</div>";
					    document.getElementById("information").innerHTML="'.$i.' to '.$total.' row(s) processed.";
					    </script>';

					// This is for the buffer achieve the minimum size in order to flush data
					    echo str_repeat(' ',1024*64);

					    
					// Send output to browser immediately
					    flush();
				 }

	    	}
	    	$msg->success('Successfull Filter Group Details ');	
			header("location:index");
			exit;
	    }else{
	    	$msg->error('Paid Id is Not Present To Transfer');	
		header("location:index");
		exit;
	    }

	    		
    

}else{
	header('Location:logout');
	exit;
}

