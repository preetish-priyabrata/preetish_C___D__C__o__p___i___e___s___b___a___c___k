<?php
error_reporting(0);
include 'config.php';
function block($mobiles,$message1s){
    	
    	   $mobs=$mobiles;
    	   $sms_district=$message1s;
    	  $message1=strtolower($sms_district);
    	   if (preg_match('/ind/',$message1)){
    	   		return block_indent($message1,$mobs);

    	   }else{
    	   		if (preg_match('/update/',$message1)){
    	   			return block_update($message1,$mobs);
    	   		}else{
    	   			// echo "hello";
    	   			return block_iss_rec($message1,$mobs);
    	   		}
    	   		
    	   }

    }
    function block_indent($message_ind,$mobs1){
    	global $conn;
    	// include 'config.php';
    	$message_ind;
    	$mobs1;
    	// echo  "<br>".$message_ind;
    	// echo  "<br>".$mobs1;
    	// echo "<pre>";
    	$message2=str_replace("br","",strtolower($message_ind));
	    $message12=str_replace("ind","",$message2);
	    $item_details1=(explode(",",$message12));
	    $item_details=json_encode(explode(",",$message12));
	    $count_details=count($item_details1);
	    // print_r($item_details1);
	    for ($i=0; $i < $count_details ; $i++) { 
	    	if(!empty($item_details1[$i])){
	    	$item_details_sub=(explode(" ", trim($item_details1[$i])));
	    	if(ctype_digit($item_details_sub[0])){
	    		if(($item_details_sub[0]=='1')||($item_details_sub[0]=='2')||($item_details_sub[0]=='3')||($item_details_sub[0]=='4')||($item_details_sub[0]=='5')||($item_details_sub[0]=='6')){
	    			$check_int=1;
	    			$item_code1[]=$item_details_sub[0];
	    		}else{
	    			echo "Invalid Entry ";
	    			exit;
	    		}
	    	}else{
	    		$check_int=0;
	    		$item_code[]=$item_details_sub[0];
	    	}
	    	if(($item_details_sub[2]==='p')||($item_details_sub[2]=='f')){
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
	    }else{
	    	echo "Invalid Entry ";
	    	exit;
	    }
	    			
	    }
	    //  here is count all list is been set so there should be only alph code or numeric coe
	    if($check_int==0){
	    	$item_counts=count($item_code);
	    	$type_counts=count($item_type);
	    	$quantity_count=count($item_quantity);
	    }else{
	    	$item_counts=count($item_code1);
	    	$type_counts=count($item_type);
	    	$quantity_count=count($item_quantity);
	    }
	    // here it is check by count where separates by comma
	     if(($item_counts==$count_details) && ($type_counts==$count_details) &&($quantity_count==$count_details)){
	     	if($check_int==0){
	     		for ($i=0; $i <count($item_code) ; $i++) { 
	    			$item=$item_code[$i];
	    			$query_item_match="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item'";   			
	    			$sql_exe_item=mysqli_query($conn,$query_item_match);
	    			$fetch_item=mysqli_fetch_assoc($sql_exe_item);    			
	    			$num_rows_item=mysqli_num_rows($sql_exe_item);
	    			if($num_rows_item!=0){
	    				$res_ok=0;
	    			}else{
	    				echo "Invalid RHC Code1 ";
	    				exit;
	    			}
	    		}

	     	}else{
	     		for ($i=0; $i <count($item_code1) ; $i++) { 
	    			$item=$item_code1[$i];
	    			$query_item_match="SELECT * FROM `rhc_master_item_code_list` WHERE `slno`='$item'";
	    			$sql_exe_item=mysqli_query($conn,$query_item_match);
	    			
	    			$num_rows_item=mysqli_num_rows($sql_exe_item);
	    			//$fetch_item=mysqli_fetch_assoc($sql_exe_item);
	    			//print_r($fetch_item);
	    			if($num_rows_item!=0){
	    				$fetch_item=mysqli_fetch_assoc($sql_exe_item);

	    				$item_code[]=$fetch_item['item_code'];
	    				$res_ok=0;
	    			}else{
	    				echo "Invalid RHC Code ";
	    				exit;
	    			}
	    		}
	     	}
	     }else{
	     	echo "Invalid Input";
	     	exit;
	     }
	     // print_r($item_code);
	     if($res_ok==0){
	     	$query_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mobs1'";
			$sql_exe=mysqli_query($conn,$query_check);
			$result_fetch=mysqli_fetch_assoc($sql_exe);
			 $top_place_id=$result_fetch['place_district_id'];
	    	 $raise_place_id=$result_fetch['place_block_dh_id'];
	    	$user=$result_fetch['user_id'];
	    	// checking similar rhc can't indented
	    	$simalar=0;
	    	for ($i=0; $i <$count_details ; $i++) { 
	    		for ($j=0; $j <$count_details ; $j++) { 
	    			if($i!=$j){
	    				$item_single1=$item_code[$i].$item_type[$i];
	    				$item_single2=$item_code[$j].$item_type[$j];
	    				if($item_single1==$item_single2){
	    					$simalar=1;
	    					echo "Same Item Code & Type Combination Cannot Be Indented More Than  Once";
	    					exit;
	    				}else{
	    					$simalar=0;
	    				}
	    			}
	    		}
	    	}

	     }else {
	     	echo "Invalid RHC Code";
	     	exit;
	     }
	     if($simalar=="0"){
	     	 $date=date('Y-m-d');
  			$time= date('H:i:s');
  			$da=date('md');
   			$query_intent_details="INSERT INTO `rhc_master_dh_block_indent`(`slno`, `indent_place_raised_to`, `indent_place_raised_by`, `date_creation`, `time_creation`,`inserted_by_id`) VALUES (NULL,'$top_place_id','$raise_place_id' ,'$date','$time','$user')";
  				$sql_exe_insert=mysqli_query($conn,$query_intent_details);
  				
    				$last_id = mysqli_insert_id($conn);
    				$get_id="dhb00".$da.$last_id;
     				$query_update_indent="UPDATE `rhc_master_dh_block_indent` SET `indent_id`='$get_id' WHERE `slno`='$last_id'";
    				$sql_exe_Update=mysqli_query($conn,$query_update_indent);
    				if($sql_exe_Update){

		      			for ($i=0; $i <$count_details ; $i++) { 
		        			// print_r($item_code);
			        		$item_codes=$item_code[$i];
			       			 $item_types=$item_type[$i];
			         		$item_quantitys=$item_quantity[$i];
			        
			       
			          		// echo "hi";
			           		$check_indent="SELECT * FROM `rhc_master_dh_block_indent_id_details` WHERE `indent_id`='$get_id' and `item_code`='$item_codes' and `Item_type`='$item_types'";
			         		 $sql_check=mysqli_query($conn,$check_indent);
			          		$num_check=mysqli_num_rows($sql_check); 
			          		if($num_check==0){        
			          			$query_item_insert="INSERT INTO `rhc_master_dh_block_indent_id_details`(`slno`, `indent_id`, `item_code`, `Item_type`, `item_quantity`, `date_creation`, `time_creation`) VALUES (NULL, '$get_id','$item_codes','$item_types','$item_quantitys','$date','$time')";
			            		$sql_insert_item=mysqli_query($conn,$query_item_insert);

			            		$array_list[]=$item_codes." ".$item_quantitys." ".$item_types;
			        		}
		       			}
			       	}
			        $code_details= implode(",",$array_list);
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$top_place_id' and `user_designation`='2' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
			 		}
			    	$mobileno_top=implode(";",$array_list_user_mobile);
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$raise_place_id' and `user_designation`='3' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);			  
			  		$datetime=date('Y-m-d H:i:s');
			   // $mobileno=$result_fetch1['user_mobile'];
			   		$new_message="Indent From ".$raise_place_id. '  with '.$code_details. ' has been raised on '.$datetime. ' against indent id  '.$get_id;
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
						  // receive server response ...
						  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			    		$server_output = curl_exec ($ch);

			  			curl_close ($ch);     
					if($server_output){
					   $datetime=date('Y-m-d H:i:s');
					   // $mobileno=$result_fetch1['user_mobile'];

					    $new_message1='Indent Generated Success-fully ';
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

				 
				    		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

				    		$server_output1 = curl_exec ($ch1);

				    		curl_close ($ch1);
				    		if($server_output1){
				      			echo "Indent Generated Success-fully";
				      			exit;
				    		}else{
				     			echo "Indent Generated Success-fully";
				      			exit;
				    		}		
			      		}
			 		}else{
			      		echo "Indent Generated Success-fully";
				      			exit;
			  		}
			      
			 	}   

	     }else{
	       echo "Same Item Code & Type Combination Cannot Be Indented More Than  Once";
	       exit;	
	     }
   	}