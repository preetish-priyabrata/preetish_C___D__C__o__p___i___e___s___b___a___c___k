<?php
session_start();
// session barcket
if($_SESSION['admin_preexam']){
	include  '../config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// print_r($_POST);
 	// Array ( [exam] => 1 ) 
 	$date=date('Y-m-d');
 	$time=date("H:i:s");
 	$group_exam_slno=$exam=trim($_POST['exam']);
 	$p1=$p2=$p3=$p4=$p5=$p6=$p7=$p8=$p9=$p10=$p11=$p12=0;
 	 $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='0'and `slno_group`='$exam'";
	$sql_exam=mysqli_query($conn, $qry_exam);
	 $num_check=mysqli_num_rows($sql_exam);
	// exam check bracket
	if($num_check=='1'){

		$check_candidate="SELECT * FROM `ilab_group_candidate_info` WHERE `group_id_slno`='$exam' and `paid_status`='1' and `roll_status`='0'";
		// exit();
		$sql_candidate=mysqli_query($conn, $check_candidate);
		$num_check_candidate=mysqli_num_rows($sql_candidate);
		
		// student bracket close
		if($num_check_candidate!=0){
			// while bracket is closed
			while($fetch_user=mysqli_fetch_assoc($sql_candidate)){
				 
				print_r($fetch_user);
				unset($paid_id_slno);
				unset($post_ids_info);
				unset($sql_get_post_inform);
				$slno_ca_group=$fetch_user['slno_ca_group'];
				$preference_two_pay=$fetch_user['preference_two_pay'];
				$preference_one_pay=$fetch_user['preference_one_pay'];
				$candidate_moblie=$fetch_user['candidate_mobile'];
				 $slno_group_pay=$paid_slno=$paid_id_slno=$fetch_user['paid_id_slno'];
				 
				 $get_post_inform="SELECT * FROM `ilab_payment_info` WHERE `slno_group_pay`='$paid_id_slno'";
				$sql_get_post_inform=mysqli_query($conn, $get_post_inform);
				 //mysqli_error($conn);
				$fetch_sql_get_post_inform=mysqli_fetch_assoc($sql_get_post_inform);
				//print_r($fetch_sql_get_post_inform);
				$post_ids_info=json_decode($fetch_sql_get_post_inform['post_ids_info']);
				 $get_post_ids_info=$post_ids_info[0];
					
					$total_count_id=$fetch_sql_get_post_inform['total_count'];
				$total_count=sprintf("%02d", $total_count_id);
				$candidate_application=$fetch_sql_get_post_inform['application_no'];
				unset($fix1);
				unset($x);
				unset($insert);
				unset($update_pay_roll);
				switch ($get_post_ids_info) {
					case 'p1':
						$fix1="801".$total_count;
						$x=sprintf("%05d", $p1);

						$p1++;
						if($p1=='10000'){
							$p1=0;
						}
						break;
					case 'p2':
						$fix1="802".$total_count;
						$x=sprintf("%05d", $p2);

						$p2++;
						if($p2=='10000'){
							$p2=0;
						}
						break;
					case 'p3':
						$fix1="803".$total_count;
						$x=sprintf("%05d", $p3);

						$p3++;
						if($p3=='10000'){
							$p3=0;
						}
						break;
					case 'p4':
						$fix1="804".$total_count;
						$x=sprintf("%05d", $p4);

						$p4++;
						if($p4=='10000'){
							$p4=0;
						}
						break;
					case 'p5':
						$fix1="805".$total_count;
						$x=sprintf("%05d", $p5);

						$p5++;
						if($p5=='10000'){
							$p5=0;
						}
						break;
					case 'p6':
						$fix1="806".$total_count;
						$x=sprintf("%05d", $p6);

						$p6++;
						if($p6=='10000'){
							$p6=0;
						}
						break;
					case 'p7':
						$fix1="807".$total_count;
						$x=sprintf("%05d", $p7);

						$p7++;
						if($p7=='10000'){
							$p7=0;
						}
						break;
					case 'p8':
						$fix1="808".$total_count;
						$x=sprintf("%05d", $p8);

						$p8++;
						if($p8=='10000'){
							$p8=0;
						}
						break;
					case 'p9':
						$fix1="809".$total_count;
						$x=sprintf("%05d", $p9);

						$p9++;
						if($p9=='10000'){
							$p9=0;
						}
						break;
					case 'p10':
						$fix1="810".$total_count;
						$x=sprintf("%05d", $p10);

						$p10++;
						if($p10=='10000'){
							$p10=0;
						}
						break;
					case 'p11':
						$fix1="811".$total_count;
						$x=sprintf("%05d", $p11);

						$p11++;
						if($p11=='10000'){
							$p11=0;
						}
						break;
					case 'p12':
						$fix1="812".$total_count;
						$x=sprintf("%05d", $p12);

						 $p12++;
						if($p12=='10000'){
							$p12=0;
						}

						break;
					
					default:
						# code...
						break;
				}
				// switch bracket is closed

				 $roll_no=$roll=$fix1.$x;
				
				$status_roll='1';
				$check_before="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `roll_no`='$roll'";
				$sql_check_before=mysqli_query($conn, $check_before);
				$num_check_roll_match=mysqli_num_rows($sql_check_before);

				if($num_check_roll_match=="0"){
					 $insert="INSERT INTO `ilab_pre_exam_roll_no`(`slno_roll_id`, `candidate_moblie`, `candidate_application`, `group_exam_slno`, `roll_no`, `status_roll`, `date`, `time`, `paid_slno`,`location_one`,`location_two`) VALUES (Null,'$candidate_moblie', '$candidate_application', '$group_exam_slno', '$roll_no', '$status_roll', '$date', '$time', '$paid_slno','$preference_one_pay','$preference_two_pay')";
					
					$sql_insert=mysqli_query($conn, $insert);
					


				}else{
					while(1){
						$otp=rand(00000,99999);
						$roll_no=$roll=$roll1=$fix1.$otp;
						$check_before1="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `roll_no`='$roll1'";
						$sql_check_before1=mysqli_query($conn, $check_before1);
						$num_check_roll_match1=mysqli_num_rows($sql_check_before1);
						if($num_check_roll_match1 < 1){
							break;
			    		}
					}
					 $insert="INSERT INTO `ilab_pre_exam_roll_no`(`slno_roll_id`, `candidate_moblie`, `candidate_application`, `group_exam_slno`, `roll_no`, `status_roll`, `date`, `time`, `paid_slno`,`location_one`,`location_two`) VALUES (Null,'$candidate_moblie', '$candidate_application', '$group_exam_slno', '$roll_no', '$status_roll', '$date', '$time', '$paid_slno','$preference_one_pay','$preference_two_pay')";
					$sql_insert=mysqli_query($conn, $insert);
					
				}


				// unset($update_pay_roll);
				 $update_pay_roll ="UPDATE `ilab_group_candidate_info` SET `roll_status`='1' WHERE `slno_ca_group`='$slno_ca_group';";
				
				 $update_pay_roll1 ="UPDATE `ilab_payment_info` SET `gen_roll_status`='1' WHERE`slno_group_pay`='$slno_group_pay';";
				 
				
				mysqli_query($conn,$update_pay_roll);
				mysqli_query($conn,$update_pay_roll1);
				 mysqli_error($conn);
				
				unset($fix1);
				unset($x);
				unset($insert);
				

			}
			// while bracket is closed

			 $query_update1="UPDATE `ilab_exam_group_assign_post` SET `status`='2',`roll_prefix_status`='1' WHERE `group_slno`='$group_exam_slno'";
			 
			 $query_update2 ="UPDATE `ilab_exam_group_assign_class` SET `roll_generate_status`='1' WHERE`group_slno`='$group_exam_slno'";
			
			 $query_update3 ="UPDATE `ilab_exam_group` SET `roll_prefix_status`='1' WHERE `slno_group`='$group_exam_slno'";
			
			mysqli_query($conn,$query_update1);
			mysqli_query($conn,$query_update2);
			mysqli_query($conn,$query_update3);
				
			$msg->success('Roll No  Has been generated successfull');	
			header("location:admin_generate_roll");
			exit;
			exit;
		// student bracket close	
		}else{
			$msg->warning('There Is no Application with successfull payment status');	
			header("location:admin_generate_roll");
			exit;
		}
	// exam check close bracket
	}else{
		//  1;
		// exit;
		header('Location:logout.php');
		exit;
	}





// session barcket closed
}else{
	header('Location:logout.php');
	exit;
}