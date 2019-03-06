<?php
 header('Location:logout');
    exit;
// ob_start();
include 'config.php';
session_start();
// echo "<pre>";
// print_r($_POST);
// print_r($_SESSION);
$date=date('Y-m-d');
$time=date('H:i:s');
$ACTION_URL="https://pgi.billdesk.com/pgidsk/PGIMerchantPayment";
if($_SESSION['user_no']){
	
    require 'FlashMessages.php';
    $msg = new \Preetish\FlashMessages\FlashMessages();
 	if($_SERVER["REQUEST_METHOD"] == "POST"){
 		if(!empty($_POST)){
 			
 			$total_count= count($_SESSION["cart_item"]);
 			$mobile_no=$_SESSION['user_no'];
 			$application_no=$_SESSION['application_no'];
 			$group_id_slno=$_SESSION['group_id'];
 			$sel="SELECT * FROM `application_form` WHERE `candidate_mobile`='$_SESSION[user_no]'";
 			$sql=mysqli_query($conn,$sel);
 			$fetch_q=mysqli_fetch_assoc($sql);
 			$candidate_name=$_SESSION['candidate_name'];
 			$new_can=$fetch_q['candidate_name'];
 			if($candidate_name==$new_can){
 				$candidate_name_new=$candidate_name;
 			}else{
 				header('Location:logout');
       			exit;
 			}
 			$preference_one=$_SESSION['preference_one'];
 			$preference_two=$_SESSION['preference_two'];
 			$amount_to=0;
 			// foreach ($_SESSION["cart_item"] as $item){
 			// 	$post_name_array[]= $item['post_name'];
 			// 	$post_ids_info_array[]= $item['post_code'];
 			// 	$price_list_array[]= $item['price_detail'];
 			// 	$amount_to+= ($item["price_detail"]);

 			// }
 			foreach ($_SESSION["cart_item"] as $item){
				$post_name_arrayq[]= $item['post_name'];
				$post_ids_info_arrayq[]= $item['post_code'];
				$price_list_arrayq[]= $item['price_detail'];
				// <!-- $amount_to+= ($item["price_detail"]); -->

			}
			$arr=array_count_values($post_ids_info_arrayq);
			foreach ($arr as $key => $item) {

				$productByCode ="SELECT * FROM `ilab_post` WHERE `status`='1' and `post_code`='$key'";
				$sql_exe1=mysqli_query($conn,$productByCode);
				$result1_new=mysqli_fetch_assoc($sql_exe1);
				
				$post_name_array[]= $result1_new['post_name'];
				$post_ids_info_array[]= $result1_new['post_code'];
				$price_list_array[]= $result1_new['price_detail'];
				$amount_to+= ($result1_new["price_detail"]);
			}
 			$post_name=json_encode($post_name_array);
			$post_ids_info=json_encode($post_ids_info_array);
			$price_list=json_encode($price_list_array);
			$job_cart_details=json_encode($_SESSION["cart_item"]);
			$get_check="SELECT * FROM `ilab_group_candidate_info` WHERE `group_id_slno`='$group_id_slno' and `candidate_mobile`='$_SESSION[user_no]'  ";
			$sql_get_check=mysqli_query($conn,$get_check);
			 $num_rows=mysqli_num_rows($sql_get_check);
			// 
			if($num_rows==0){
				$insert="INSERT INTO `ilab_group_candidate_info`(`slno_ca_group`, `group_id_slno`, `candidate_mobile`, `paid_status`, `date`, `time`,`preference_one_pay`,`preference_two_pay`,`candidate_application_id`) VALUES (Null,'$group_id_slno','$_SESSION[user_no]','0','$date','$time','$preference_one','$preference_two','$application_no')";
				$sql_insert=mysqli_query($conn,$insert);
				 $payid="INSERT INTO `ilab_payment_info`(`slno_group_pay`, `mobile_no`, `application_no`, `candidate_name`, `amount_to`, `group_id_slno`, `status_applied`, `payment_status`, `post_name`, `post_ids_info`, `price_list`, `total_count`, `date`, `time`, `job_cart_details`) VALUES (Null,'$_SESSION[user_no]','$application_no','$candidate_name_new','$amount_to','$group_id_slno','1','0','$post_name','$post_ids_info','$price_list','$total_count','$date','$time','$job_cart_details')";
				$sql_insert=mysqli_query($conn,$payid);
				// echo mysqli_error($conn);
				$last_id=mysqli_insert_id($conn);
				$reference="SKHF_".date('Ymd')."_".$last_id;
				$update_pay_id="UPDATE `ilab_payment_info` SET `payment_reference_no`='$reference' WHERE `slno_group_pay`='$last_id'";
				$sql_update_pay_id=mysqli_query($conn,$update_pay_id);
			}else{
				$result1_new=mysqli_fetch_assoc($sql_get_check);
				//print_r($result1_new);
				if($result1_new['paid_status']==1){

					header('Location:user_dashboard');
       				exit;

				}else if($result1_new['paid_status']==0){
					 $payid="INSERT INTO `ilab_payment_info`(`slno_group_pay`, `mobile_no`, `application_no`, `candidate_name`, `amount_to`, `group_id_slno`, `status_applied`, `payment_status`, `post_name`, `post_ids_info`, `price_list`, `total_count`, `date`, `time`, `job_cart_details`) VALUES (Null,'$_SESSION[user_no]','$application_no','$candidate_name_new','$amount_to','$group_id_slno','1','0','$post_name','$post_ids_info','$price_list','$total_count','$date','$time','$job_cart_details')";
					$sql_insert=mysqli_query($conn,$payid);
					// echo mysqli_error($conn);
					 $last_id=mysqli_insert_id($conn);

					$reference="SKHF_".date('Ymd')."_".$last_id;
					 $update_pay_id="UPDATE `ilab_payment_info` SET `payment_reference_no`='$reference' WHERE `slno_group_pay`='$last_id'";
					$sql_update_pay_id=mysqli_query($conn,$update_pay_id);
				}
			}
			 //unset($_POST);
			$MerchantID="SIKKIMHLDP";
			$CustomerID=$reference;
			$TxnAmount=$amount_to;
			$CurrencyType='INR';
			$TypeField1=$candidate_name_new;
			$SecurityID="sikkimhldp";
			$TypeField2=$mobile_no;
			$RU="http://www.sikkimhealthrecruitment.org/response_detail";

			 $str = $MerchantID."|".$CustomerID."|NA|".$TxnAmount."|NA|NA|NA|".$CurrencyType."|NA|R|".$SecurityID."|NA|NA|F|".$TypeField1."|".$TypeField2."|".$last_id."|NA|NA|NA|NA|".$RU;

			$checksum = hash_hmac('sha256',$str,'XD90y0NHmiI7', false); 
			  $checksum = strtoupper($checksum);
			// $_SESSION['checksum']=$checksum;
			$_SESSION['CustomerID']=web_encryptIt($CustomerID);
			$_SESSION['TxnAmount']=$TxnAmount;
			$_SESSION['secure_ids']=web_encryptIt($last_id);
			 $message1=$MerchantID."|".$CustomerID."|NA|".$TxnAmount."|NA|NA|NA|".$CurrencyType."|NA|R|".$SecurityID."|NA|NA|F|".$TypeField1."|".$TypeField2."|".$last_id."|NA|NA|NA|NA|".$RU."|".$checksum;

			$file = fopen("message1_nex.txt", "a+");
			fwrite($file, "---" . $message1 . "---");
			if(!empty($message1)){
			session_destroy();
			// exit;
			?>
			<html>
			<body onLoad="document.payment.submit();">
			<h3>Please wait, redirecting to process payment..</h3>
			<form action="<?php echo $ACTION_URL;?>" name="payment" method="POST">
			
			<input type="hidden" value="<?php echo $message1;?>" name="msg"/>
			
			
			</form>
			</body>
			</html>
<?php 
			// MerchantID|CustomerID|NA|TxnAmount|NA|NA|NA|CurrencyType|NA|TypeField1|SecurityID|NA|NA|TypeField2|txtadditional1|txtadditional2|txtadditional3|txtadditional4|txtadditional5| txtadditional6| txtadditional7|RU
 			//  payment
 			}else{
 				$msg->error('At least  apply for one post before proceeding for payment.');
 				header('Location:apply_job');
       			exit;
 			}
 		}else{
 			$msg->error('At least  apply for one post before proceeding for payment.');
 			header('Location:apply_job');
       		exit;
 		}

 	}else{
       header('Location:logout');
       exit;
    }
}else{
  header('Location:logout');
  exit;
}
// $content_details = ob_get_contents();
// ob_clean();
// include 'template1.php';