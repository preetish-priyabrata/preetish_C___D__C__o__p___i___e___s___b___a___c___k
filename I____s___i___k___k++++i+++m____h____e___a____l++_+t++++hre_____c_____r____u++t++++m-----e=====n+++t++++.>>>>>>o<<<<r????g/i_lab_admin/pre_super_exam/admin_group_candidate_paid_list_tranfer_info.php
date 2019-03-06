<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
<?php
session_start();
if($_SESSION['admin_Pre_tech_s']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $i=0;	     
 $check_paid="SELECT * FROM `ilab_group_candidate_info_paid` WHERE `transfer_paid_info`='0'";
 $sql_check_paid=mysqli_query($conn,$check_paid);
 $total=$NUM_PAID=mysqli_num_rows($sql_check_paid);
    if($NUM_PAID!="0"){
    	while($res_check_paid=mysqli_fetch_assoc($sql_check_paid)){
    		$i++;
    		// print_r($res_check_paid);
    		// Array ( [slno_ca_group] => 1 [slno_ca_group_id] => 9 [group_id_slno] => 2 [candidate_mobile] => 9614655935 [candidate_application_id] => 2018-02-16732519 [candidate_applied] => SK_2018-02-23_512 [paid_status] => 1 [date] => 2018-02-16 [time] => 12:49:19 [paid_id_slno] => 512 [roll_status] => 0 [preference_one_pay] => [preference_two_pay] => [transfer_paid_info] => 0 )
    		
    		$slno_ca_group=$res_check_paid['slno_ca_group'];
    		$paid_id_slno=$res_check_paid['paid_id_slno'];

    		$query_paid_info="SELECT * FROM `ilab_payment_info` WHERE `slno_group_pay`='$paid_id_slno' and `paid_status_transfer`='0' and `payment_status`='1'";
    		$sql_query_paid_info=mysqli_query($conn,$query_paid_info);
    		$num_query_paid_info=mysqli_num_rows($sql_query_paid_info);
    		if($num_query_paid_info==1){
    			$res_query_paid_info=mysqli_fetch_assoc($sql_query_paid_info);
    				// print_r($res_query_paid_info);
    			
    				$paid_info_slno=$slno_group_pay=$res_query_paid_info['slno_group_pay'];
					$payment_reference_no=$res_query_paid_info['payment_reference_no'];
					$mobile_no=$res_query_paid_info['mobile_no'];
					$application_no=$res_query_paid_info['application_no'];
					$candidate_name=$res_query_paid_info['candidate_name'];
					$amount_to=$res_query_paid_info['amount_to'];
					$group_id_slno=$res_query_paid_info['group_id_slno'];
					$status_applied=$res_query_paid_info['status_applied'];
					$payment_status=$res_query_paid_info['payment_status'];
					$post_name=$res_query_paid_info['post_name'];
					$post_ids_info=$res_query_paid_info['post_ids_info'];
					$total_count=$res_query_paid_info['total_count'];
					$date=$res_query_paid_info['date'];
					$time=$res_query_paid_info['time'];
					$payment_date=$res_query_paid_info['payment_date'];
					$payment_time=$res_query_paid_info['payment_time'];
					$TxnReferenceNo=$res_query_paid_info['TxnReferenceNo'];
					$ErrorDescription=$res_query_paid_info['ErrorDescription'];
					$BankReferenceNo=$res_query_paid_info['BankReferenceNo'];
					$gen_roll_status=$res_query_paid_info['gen_roll_status'];
					$job_cart_details=$res_query_paid_info['job_cart_details'];
					$AuthStatus=$res_query_paid_info['AuthStatus'];
					$responde_receiced=$res_query_paid_info['responde_receiced'];
					$s2s_respose=$res_query_paid_info['s2s_respose'];
					$paid_status_transfer=$res_query_paid_info['paid_status_transfer'];

					$insert="INSERT INTO `ilab_payment_info_PAID`(`slno_group_pay`, `paid_info_slno`, `payment_reference_no`, `mobile_no`, `application_no`, `candidate_name`, `amount_to`, `group_id_slno`, `status_applied`, `payment_status`, `post_name`, `post_ids_info`, `price_list`, `total_count`, `date`, `time`, `payment_date`, `payment_time`, `TxnReferenceNo`, `ErrorDescription`, `BankReferenceNo`, `gen_roll_status`, `job_cart_details`, `AuthStatus`, `responde_receiced`, `s2s_respose`) VALUES (NULL, '$paid_info_slno','$payment_reference_no','$mobile_no','$application_no','$candidate_name','$amount_to','$group_id_slno','$status_applied','$payment_status','$post_name','$post_ids_info','$price_list','$total_count','$date','$time','$payment_date','$payment_time','$TxnReferenceNo','$ErrorDescription','$BankReferenceNo','$gen_roll_status','$job_cart_details','$AuthStatus','$responde_receiced','$s2s_respose')";
					mysqli_query($conn,$insert);

					$update="UPDATE `ilab_payment_info` SET `paid_status_transfer`='1' WHERE `slno_group_pay`='$slno_group_pay'";
					mysqli_query($conn,$update);
    			

    			$update_group_paid="UPDATE `ilab_group_candidate_info_paid` SET `transfer_paid_info`='1' WHERE`slno_ca_group`='$slno_ca_group'";
    			mysqli_query($conn,$update_group_paid);

    		}
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
    	$msg->error('Paid Id is Not Present To Transfer');	
		header("location:index");
		exit;
    }


}else{
	header('Location:logout');
	exit;
}

