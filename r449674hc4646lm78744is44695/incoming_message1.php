<?php
require 'config.php';
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
	 $result_fetch=mysqli_fetch_assoc($sql_exe);
	 $user_designation=$result_fetch['user_designation'];
	 switch ($user_designation) {
	 	case '1':
	 		echo "Sorry This Facilities Not Available Now";// her it will storr in database or istock or bstock
			exit;
	 		break;
	 	case '2':
	 		# code...
	 		
	 		break;
	 	case '3':
	 		# code...
	 		$message1=strtolower($_REQUEST['message']);
	 		// check ind
	 		if (preg_match('/ind/',$message)){

	 			
	    		$message2=str_replace("br","",strtolower($_REQUEST['message']));
	    		$message12=str_replace("ind","",$message2);
	    		$item_details1=(explode(",",$message12));
	    		$item_details=json_encode(explode(",",$message12));
	    		$count_details=count($item_details1);
	    		for ($i=0; $i < $count_details ; $i++) { 
	    			$item_details_sub=(explode(" ", trim($item_details1[$i])));
	    			
	    			$item_code[]=$item_details_sub[0];
	    			if(($item_details_sub[2]=='p')||($item_details_sub[2]=='f')){
	    				$item_type[]=$item_details_sub[2];
	    			}else{
	    				echo "Invalid Entry ";
	    				exit;
	    			}
	    			
	    			if(ctype_digit($item_details_sub[1])){  
	    				$item_quantity[]=$item_details_sub[1];
	    			}else{
	    				echo "Invalid Entry ";
	    				exit;
	    			}
	    			
	    		}
	    		// print_r($item_quantity);
	    		// $res_ok=0;// intialized value to 0
	    		for ($i=0; $i <count($item_code) ; $i++) { 
	    			$item=$item_code[$i];
	    			$query_item_match="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item'";
	    			$sql_exe_item=mysqli_query($conn,$query_item_match);
	    			$num_rows_item=mysqli_num_rows($sql_exe_item);
	    			if($num_rows_item!=0){
	    				$res_ok=0;
	    			}else{
	    				echo "Invalid Entry ";
	    				exit;
	    			}
	    		}
	    		if($res_ok==0){
	    			$indent_place_raised_to=$result_fetch['place_district_id'];
	    			$indent_place_raised_by=$result_fetch['place_block_dh_id'];
	    			$date=date('Y-m-d');
					$time= date('H:i:s');

					 $query_intent_details="INSERT INTO `rhc_master_indent`(`slno`, `indent_place_raised_to`, `indent_place_raised_by`, `date_creation`, `time_creation`) VALUES (NULL,'$indent_place_raised_to','$indent_place_raised_by' ,'$date','$time')";
					$sql_exe_insert=mysqli_query($conn,$query_intent_details);
					if($sql_exe_insert){
						$last_id = mysqli_insert_id($conn);
						$get_id="ind00".$last_id;
						 $query_update_indent="UPDATE `rhc_master_indent` SET `indent_id`='$get_id' WHERE `slno`='$last_id'";
						$sql_exe_Update=mysqli_query($conn,$query_update_indent);
						if($sql_exe_Update){
							$x_id=0;
							for ($i=0; $i <count($item_code); $i++) { 
								// print_r($item_code);
								$item_codes=$item_code[$i];
								$item_types=$item_type[$i];
								$item_quantitys=$item_quantity[$i];
								
					
								// echo "hi";
								 $check_indent="SELECT * FROM `rhc_master_indent_id_details` WHERE `indent_id`='$get_id' and `item_code`='$item_codes' and `Item_type`='$item_types'";
								$sql_check=mysqli_query($conn,$check_indent);
								 $num_check=mysqli_num_rows($sql_check);
								if($num_check==0){
									 $query_item_insert="INSERT INTO `rhc_master_indent_id_details`(`slno`, `indent_id`, `item_code`, `Item_type`, `item_quantity`, `date_creation`, `time_creation`) VALUES (NULL, '$get_id','$item_codes','$item_types','$item_quantitys','$date','$time')";
									$sql_insert_item=mysqli_query($conn,$query_item_insert);
									if($sql_insert_item){
										$x_id++;
										$failed=$x_id;
									}else{
										$failed="0";
									}
								}
							}
						}else{
							echo "failed By Network";
							exit;
						}
					}else{
						echo "failed By Network";
							exit;
					}
					
					if($failed==0){

					}else if($x_id!=0){
						$datetime=date('Y-m-d H:i:s');
						$indent_place_raised_to==$result_fetch['place_district_id'];
						$query_check1="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$indent_place_raised_to'";
						$sql_exe1=mysqli_query($conn,$query_check1);
						$result_fetch1=mysqli_fetch_assoc($sql_exe1);

						$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$indent_place_raised_to' and `user_designation`='2'";
						$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
						while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
							// print_r($res);
							$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
						}
	 						$mobileno_top=implode(";",$array_list_user_mobile);

	 					$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$indent_place_raised_by' and `user_designation`='3'";
						$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
						while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
							// print_r($res);
							$array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
						}
	 					$mobileno_raise=implode(";",$array_list_raise_user_mobile);
	 					
					 	 $new_message="Indent from".$indent_place_raised_by. '  with '.$message12. ' has been raised on '.$datetime. 'against indent id '.$get_id;
					 	 $no_charaater1=strlen($new_message);
					 	 	$api_params = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_top.'&text='.$new_message.'&route=Informative&type=text&datetime='. $datetime.'';
					        $smsGatewayUrl = "https://promo.webtwosms.com/api/api_http.php?";  
					        $smsgatewaydata = $smsGatewayUrl.$api_params;
					        $url = $smsgatewaydata;
					        $ch = curl_init();
						$query1="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message','$mobileno_top','$message12','$no_charaater1','2','$date','$time')";
	 					$sql_exe_sms1=mysqli_query($conn,$query1);
	 					if($sql_exe_sms1){        
							curl_setopt($ch, CURLOPT_URL,$smsGatewayUrl);
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS,$api_params);

							// in real life you should use something like:
							// curl_setopt($ch, CURLOPT_POSTFIELDS, 
							//          http_build_query(array('postvar1' => 'value1')));

							// receive server response ...
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

							 $server_output = curl_exec ($ch);

							curl_close ($ch);

							// further processing .... 

							    
							if($server_output){
								$datetime=date('Y-m-d H:i:s');
							 // $mobileno=$result_fetch1['user_mobile'];

								 $new_message1='Indent Generated Success-fully on '.$datetime;
							 	$no_charaater1=strlen($new_message1);
								$api_params1 = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_raise.'&text='.$new_message1.'&route=Informative&type=text&datetime='. $datetime.'';
						   	 	$smsGatewayUrl1 = "https://promo.webtwosms.com/api/api_http.php?";  
						   		 $smsgatewaydata = $smsGatewayUrl.$api_params;
						    	$url = $smsgatewaydata;
						    	$ch1 = curl_init();
								$query11="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message1','$mobileno_raise','$new_message1','$no_charaater1','2','$date','$time')";
								$sql_exe_sms11=mysqli_query($conn,$query11);
								if($sql_exe_sms11){        
								curl_setopt($ch1, CURLOPT_URL,$smsGatewayUrl1);
								curl_setopt($ch1, CURLOPT_POST, 1);
								curl_setopt($ch1, CURLOPT_POSTFIELDS,$api_params1);

							// in real life you should use something like:
							// curl_setopt($ch, CURLOPT_POSTFIELDS, 
							//          http_build_query(array('postvar1' => 'value1')));

							// receive server response ...
								curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

							 	$server_output1 = curl_exec ($ch1);

								curl_close ($ch1);
								if($server_output1){
									echo "Indent Generated SuccessFull on ".$datetime;
									exit;
								}else{
									echo "Indent Generated SuccessFull on ".$datetime;
									exit;
								}
									}
								
							}else{
								echo "Save2";
							}
				}
					}else{
						echo "failed By Network";
							exit;
					}
					

				
	    		}else{
	    			echo "Invalid Entry";
	    			exit;
	    		}
	 		}else{
	 			// here is receiving part
	 			 $message2=str_replace("br","",strtolower($_REQUEST['message'])); //hre BR Is Remove
	    		//$message12=str_replace("ind","",$message2);
	    		$arr = explode(' ',trim($message2));
	    		$challan_no=$arr[0];
	    		$message3=str_replace($challan_no,"",$message2); // here challan nos is been romove
	    		
	    		$item_details1=(explode(",",$message3)); // here , is be roved into array

	    		$item_details=json_encode(explode(",",$message3));
	    		// $count_details=count($item_details1);
	    		$query_get_detail="SELECT * FROM `rhc_master_challan_no` WHERE `challen_no`='$challan_no'";
	    		$sql_exe_get_details=mysqli_query($conn,$query_get_detail);
	    		$num_rows_get_details=mysqli_num_rows($sql_exe_get_details);
	    		if($num_rows_get_details==0){
	    			echo "Invalid Challan No Not Match";
	    			exit;
	    		}else{
	    			$fetch_get_details=mysqli_fetch_assoc($sql_exe_get_details);
	    			$receiver_id=$fetch_get_details['receiver_place_id'];
	    			$issuer_id=$fetch_get_details['issuer_place_id'];

	    			 $count_details=count($item_details1);
	    			for ($i=0; $i < $count_details ; $i++) { 
		    			$item_details_sub=(explode(" ", trim($item_details1[$i])));
		    			
		    			$item_code[]=$item_details_sub[0];
		    			if(($item_details_sub[2]=='p')||($item_details_sub[2]=='f')){
		    				$item_type[]=$item_details_sub[2];
		    			}else{
		    				echo "Invalid Entry ";
		    				exit;
		    			}
		    			
		    			if(ctype_digit($item_details_sub[1])){  
		    				$item_quantity[]=$item_details_sub[1];
		    			}else{
		    				echo "Invalid Entry ";
		    				exit;
		    			}
	    			
	    			}
	    		//print_r($item_code);
	    		// $res_ok=0;// intialized value to 0
		    		for ($i=0; $i <count($item_code) ; $i++) { 
		    			$item=$item_code[$i];
		    			$query_item_match="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item'";
		    			$sql_exe_item=mysqli_query($conn,$query_item_match);
		    			$num_rows_item=mysqli_num_rows($sql_exe_item);
		    			if($num_rows_item!=0){
		    				$res_ok=0;
		    			}else{
		    				echo "Invalid Entry ";
		    				exit;
		    			}
	    			}
	    			
	    			// 
	    			$cat=0;
	    			for ($i=0; $i <count($item_code); $i++) { 
								$item_codes=$item_code[$i];
								$item_types=$item_type[$i];
								$item_quantitys=$item_quantity[$i];

	    			 $query_get_item_details="SELECT * FROM `rhc_master_itemdetails_challan_no` WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types'	";
	    			$sql_exe_get_item_details=mysqli_query($conn,$query_get_item_details);
	    			$num_rows_item_challan=mysqli_num_rows($sql_exe_get_item_details);
	    			if($num_rows_item_challan==0){
	    				$cat++;
	    			}
	    		}
	    		
// till
	    			if($cat==0){
	    				for ($j=0; $j <count($item_code); $j++) { 
								$item_codes=$item_code[$j];
								$item_types=$item_type[$j];
								$item_quantity_issues=$item_quantity[$j];
	    						 
		    					$array_list[]=$item_codes." ".$item_quantity_issues." ".$item_types;

		    					$query_update_item_challan="UPDATE `rhc_master_itemdetails_challan_no` SET `quantity_received`='$item_quantity_issues',`status`='1' WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types'";
								$sql_exe_update_item=mysqli_query($conn,$query_update_item_challan);

								$query_get_item_code_id="SELECT * FROM `rhc_master_stock_block_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `block_place_id`='$receiver_id'";
								$sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);
	
								$result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);
	
								$item_quantityss=$result_detail['item_quantity'];
								$cal=$item_quantity_issues+$item_quantityss;
	
								$update="UPDATE `rhc_master_stock_block_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `block_place_id`='$receiver_id'";
								$sql_exe_update=mysqli_query($conn,$update);
		    			}
		    			$query_get_item_details1="SELECT * FROM `rhc_master_itemdetails_challan_no` WHERE `challan_no`='$challan_no' 	";
	    						$sql_exe_get_item_details1=mysqli_query($conn,$query_get_item_details1);
		    					while($res_get_item_details=mysqli_fetch_assoc($sql_exe_get_item_details1)){
		    						// print_r($res_get_item_details);
		    						$item_code=$res_get_item_details['item_code'];
		    						$item_type=$res_get_item_details['item_type'];
		    						$item_batch_id=$res_get_item_details['item_batch_id'];

		    						$batch_id_item_details[]=array('item_batch_id'=>"$item_batch_id",'item_code'=>"$item_code",'item_type'=>"$item_type");
		    					}
		    			// 		print_r($batch_id_item_details);
		    			// print_r($batch_id_item_details); //her is batche issue id
		    			// exit;
		    			for ($i=0; $i <count($batch_id_item_details) ; $i++) { 
		    				$item_codes=$batch_id_item_details[$i]['item_code'];
		    				$item_types=$batch_id_item_details[$i]['item_type'];
		    				$item_batch_ids=$batch_id_item_details[$i]['item_batch_id'];

			    			$query_batch_detail_item_challen="SELECT * FROM `rhc_master_receive_batch_detail_item_block` WHERE `item_batch_id`='$item_batch_ids' and `item_type`='$item_types' and `item_code` ='$item_codes'";
			    			$sql_exe_batch_details=mysqli_query($conn,$query_batch_detail_item_challen);
			    			while ($res_batch_detail=mysqli_fetch_assoc($sql_exe_batch_details)) {
			    				$item_code=$res_get_item_details['item_code'];
		    					$item_type=$res_get_item_details['item_code'];
		    					$batch_quantity=$res_get_item_details['batch_quantity'];
		    					$batch_no=$res_get_item_details['batch_no'];
		    					$date_expire=$res_get_item_details['date_expire'];

			    				$query_get_item_code_id1="SELECT * FROM `rhc_master_stock_block_items` WHERE `item_types`='$item_type' and `item_codes`='$item_code' and `block_place_id`='$receiver_id'";
								$sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
								$result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

								$block_stock_batch_id=$result_detail1['block_stock_batch_id'];

								$batch_insert="INSERT INTO `rhc_master_stock_block_batch_details`(`slno`, `block_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `block_place_id`) VALUES (NULL,'$block_stock_batch_id','$batch_no','$date_expire','$batch_quantity','$batch_quantity','1','$date','$time','$receiver_id')";

								$sql_exe_batch_insert=mysqli_query($conn,$batch_insert);
			    			}

			    		}
			    		$user_id=$mob;
			    		$quer_challan_update="UPDATE `rhc_master_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1' WHERE `challen_no`='$challan_no'";
						$sql_exe_challan_update=mysqli_query($conn,$quer_challan_update);
	
						//$item_code=($_REQUEST['item_code']);
						$date=date('Y-m-d');
						$time=date('H:i:s');
						
						
						$code_details= implode(",",$array_list);
						$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$issuer_id' and `user_designation`='2'";
						$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
						while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
							// print_r($res);
							$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
						}
						 $mobileno_top=implode(";",$array_list_user_mobile);

						 $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$receiver_id' and `user_designation`='3'";
						$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
						while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
							// print_r($res);
							$array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
						}
						 $mobileno_raise=implode(";",$array_list_raise_user_mobile);
						
						$datetime=date('Y-m-d H:i:s');
						 // $mobileno=$result_fetch1['user_mobile'];

						 $new_message=" Challan No ".$challan_no. '  with '.$code_details. ' has been recevied  on '.$datetime. ' at '.$receiver_id;
						 $no_charaater1=strlen($new_message);
						$api_params = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_top.'&text='.$new_message.'&route=Informative&type=text&datetime='. $datetime.'';
					    $smsGatewayUrl = "https://promo.webtwosms.com/api/api_http.php?";  
					    $smsgatewaydata = $smsGatewayUrl.$api_params;
					    $url = $smsgatewaydata;
					    $ch = curl_init();
						$query1="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message','$mobileno_top','$code_details','$no_charaater1','2','$date','$time')";
						$sql_exe_sms1=mysqli_query($conn,$query1);
						if($sql_exe_sms1){        
						curl_setopt($ch, CURLOPT_URL,$smsGatewayUrl);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS,$api_params);

						// in real life you should use something like:
						// curl_setopt($ch, CURLOPT_POSTFIELDS, 
						//          http_build_query(array('postvar1' => 'value1')));

						// receive server response ...
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

						 $server_output = curl_exec ($ch);

						curl_close ($ch);			
						if($server_output){
							$datetime=date('Y-m-d H:i:s');
						 // $mobileno=$result_fetch1['user_mobile'];

							 $new_message1='RHC is Received Success-fully on '.$datetime;
						 	$no_charaater1=strlen($new_message1);
							$api_params1 = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_raise.'&text='.$new_message1.'&route=Informative&type=text&datetime='. $datetime.'';
					   	 	$smsGatewayUrl1 = "https://promo.webtwosms.com/api/api_http.php?";  
					   		 $smsgatewaydata = $smsGatewayUrl.$api_params;
					    	$url = $smsgatewaydata;
					    	$ch1 = curl_init();
							$query11="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message1','$mobileno_raise','$new_message1','$no_charaater1','2','$date','$time')";
							$sql_exe_sms11=mysqli_query($conn,$query11);
							if($sql_exe_sms11){        
							curl_setopt($ch1, CURLOPT_URL,$smsGatewayUrl1);
							curl_setopt($ch1, CURLOPT_POST, 1);
							curl_setopt($ch1, CURLOPT_POSTFIELDS,$api_params1);

						// in real life you should use something like:
						// curl_setopt($ch, CURLOPT_POSTFIELDS, 
						//          http_build_query(array('postvar1' => 'value1')));

						// receive server response ...
							curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

						 	$server_output1 = curl_exec ($ch1);

							curl_close ($ch1);
							if($server_output1){
								echo $new_message1;
								exit;
							}else{
								echo  $new_message1;;
								exit;
							}
								}
						}else{
								echo $new_message1;
								exit;
						}
					}

			    	}else{
			    		echo "Please ensure correct item codes has been entered ";
			    		exit;
			    	}
		    		// till


	    		}
	 		}
	 		break;
	 	case '4':
	 		echo "Sorry This Facilities Not Available Now";// her it will storr in database or istock or bstock
			exit;
	 		break;
	 	case '5':
	 		echo "Sorry This Facilities Not Available Now";// her it will storr in database or istock or bstock
			exit;
	 		break;
	 	case '6':
	 		echo "Sorry This Facilities Not Available Now";// her it will storr in database or istock or bstock
			exit;
	 		break;
	 	case '7':
	 		echo "Sorry This Facilities Not Available Now";// her it will storr in database or istock or bstock
			exit;
	 		break;
	 	case '8':
	 		echo "Sorry This Facilities Not Available Now";// her it will storr in database or istock or bstock
			exit;
	 		break;
	 	// case '1':
	 		# code...
	 		// break;
	 	
	 	default:
	 		echo "Sorry This Facilities Not Available Now";// her it will storr in database or istock or bstock
			exit;
	 		break;
	 }
	}
}else{
 	echo "fail";
 	exit;
 }