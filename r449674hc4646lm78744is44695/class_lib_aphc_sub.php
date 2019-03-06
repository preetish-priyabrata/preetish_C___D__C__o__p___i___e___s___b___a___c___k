<?php
error_reporting(0);
include 'config.php';

//////////////////////////////////////////////////////////////////////////////////////////////////
//																								// 
// 			 							 Section For Issue  									//
// 																								//
//////////////////////////////////////////////////////////////////////////////////////////////////

    function aphc_sub($mobiles,$message1s){
    	
    	   $mobs=$mobiles;
    	   $sms_district=$message1s;
    	  $message1=strtolower($sms_district);
    	   if (preg_match('/ind/',$message1)){
    	   		return aphc_sub_indent($message1,$mobs);

    	   }else{
    	   		if (preg_match('/update/',$message1)){
    	   			return aphc_sub_update($message1,$mobs);
    	   		}else{
    	   			// echo "hello";
    	   			return aphc_sub_iss_rec($message1,$mobs);
    	   		}
    	   		
    	   }


    }

//////////////////////////////////////////////////////////////////////////////////////////////////
//																								// 
// 			 							 INDENT SECTION 									//
// 																								//
//////////////////////////////////////////////////////////////////////////////////////////////////

    function aphc_sub_indent($message_ind,$mobs1){
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
			 $top_place_id=$result_fetch['place_phc_aphc_id'];
	    	 $raise_place_id=$result_fetch['sub_center_id'];
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
   			$query_intent_details="INSERT INTO `rhc_master_aphc_asha_indent`(`slno`, `indent_place_raised_to`, `indent_place_raised_by`,`place_status`, `date_creation`, `time_creation`,`inserted_by_id`) VALUES (NULL,'$top_place_id','$raise_place_id' ,'2',$date','$time','$user')";
  				$sql_exe_insert=mysqli_query($conn,$query_intent_details);
  				
    				$last_id = mysqli_insert_id($conn);
    				$get_id="ashaphc00".$da.$last_id;
     				$query_update_indent="UPDATE `rhc_master_aphc_asha_indent` SET `indent_id`='$get_id' WHERE `slno`='$last_id'";
    				$sql_exe_Update=mysqli_query($conn,$query_update_indent);
    				if($sql_exe_Update){

		      			for ($i=0; $i <$count_details ; $i++) { 
		        			// print_r($item_code);
			        		$item_codes=$item_code[$i];
			       			 $item_types=$item_type[$i];
			         		$item_quantitys=$item_quantity[$i];
			        
			       
			          		// echo "hi";
			           		$check_indent="SELECT * FROM `rhc_master_phc_asha_indent_id_details` WHERE `indent_id`='$get_id' and `item_code`='$item_codes' and `Item_type`='$item_types'";
			         		 $sql_check=mysqli_query($conn,$check_indent);
			          		$num_check=mysqli_num_rows($sql_check); 
			          		if($num_check==0){        
			          			$query_item_insert="INSERT INTO `rhc_master_phc_asha_indent_id_details`(`slno`, `indent_id`, `item_code`, `Item_type`, `item_quantity`, `date_creation`, `time_creation`) VALUES (NULL, '$get_id','$item_codes','$item_types','$item_quantitys','$date','$time')";
			            		$sql_insert_item=mysqli_query($conn,$query_item_insert);

			            		$array_list[]=$item_codes." ".$item_quantitys." ".$item_types;
			        		}
		       			}
			       	}
			        $code_details= implode(",",$array_list);
			        $array_list_user_mobile=array();
			        // top mobile no
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$top_place_id' and `user_designation`='5' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
			    		$block=$res_top_level_mobile['place_block_dh_id'];
			 		}
			 		// block
					  $top_level_mobile3="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$block' and `user_designation`='3' And `status`='1'";
					  $sql_exe_top_level_mobile3=mysqli_query($conn,$top_level_mobile3);
					  while($res_top_level_mobile3=mysqli_fetch_assoc($sql_exe_top_level_mobile3)){
					    // print_r($res);
					    $array_list_user_mobile[]=$res_top_level_mobile3['user_mobile'];
					   
					    $district=$res_top_level_mobile3['place_district_id'];
					  }
					    // district
					  $top_level_mobile2="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$district' and `user_designation`='2' And `status`='1'";
						 		$sql_exe_top_level_mobile2=mysqli_query($conn,$top_level_mobile2);
						  		while($res_top_level_mobile2=mysqli_fetch_assoc($sql_exe_top_level_mobile2)){
						    // print_r($res);
						   			 $array_list_user_mobile[]=$res_top_level_mobile2['user_mobile'];
						   			  $state=$res_top_level_mobile2['place_state_id'];
						  		}
					  // state
					  $top_level_mobile1="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$state' and `user_designation`='1' And `status`='1'";
						 		$sql_exe_top_level_mobile1=mysqli_query($conn,$top_level_mobile1);
						  		while($res_top_level_mobile1=mysqli_fetch_assoc($sql_exe_top_level_mobile1)){
						    // print_r($res);
						    		$array_list_user_mobile[]=$res_top_level_mobile1['user_mobile'];
						 		}
					
			    	$mobileno_top=implode(";",$array_list_user_mobile);
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$raise_place_id' and `user_designation`='8' And `status`='1'";
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
//////////////////////////////////////////////////////////////////////////////////////////////////
//																								// 
// 			 							BLOCK UPDATE SECTION 									//
// 																								//
//////////////////////////////////////////////////////////////////////////////////////////////////
  
   	function aphc_sub_update($message_ind,$mobs1){
    	global $conn;

    	$message_ind;
    	$mobs1;
    	// echo  "<br>".$message_ind;
    	// echo  "<br>".$mobs1;
    	// echo "<pre>";
    	$message2=str_replace("br","",strtolower($message_ind));
	    $message12=str_replace("update","",$message2);
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
			 $top_place_id=$result_fetch['place_phc_aphc_id'];
	    	 $raise_place_id=$result_fetch['sub_center_id'];
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
	     $date=date('Y-m-d');
		    $time=date('H:i:s');
	     if($simalar=="0"){
	     	for ($i=0; $i <$count_details ; $i++) { 
		     	$item_codes=$item_code[$i];
		     	$item_types=$item_type[$i];
		     	$item_quantitys=$item_quantity[$i];    		

		     		
		     	if($item_quantitys==0){      
         			$query_update="UPDATE `rhc_master_stock_aphc_subcenter_items` SET `item_quantity`='$item_quantitys',`date_creation`='$date',`time_creation`='$time',`status`='2' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_sub_place_id`='$raise_place_id' ";
     				$updated_stock[] = array('item_codes' =>$item_codes ,'item_types' =>$item_types,'item_quantity' =>$item_quantitys );
     				$array_list[]=$item_code[$i]." ".$item_quantity[$i]." ".$item_type[$i];
     
    			}else{
      				if($item_quantitys>0){      
       					$query_update="UPDATE `rhc_master_stock_aphc_subcenter_items` SET `item_quantity`='$item_quantitys',`date_creation`='$date',`time_creation`='$time',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_sub_place_id`='$raise_place_id'";
       					$updated_stock[] = array('item_codes' =>$item_codes ,'item_types' =>$item_types,'item_quantity' =>$item_quantitys );
       					$array_list[]=$item_code[$i]." ".$item_quantity[$i]." ".$item_type[$i];

     				}else{
     				 	echo "Invalid Entry";
	       				exit;
         				
      				}

		     	}
		     	$sql_exe=mysqli_query($conn,$query_update);
		    }
		    
	     	$query_get_stock="SELECT * FROM `rhc_master_stock_aphc_subcenter_items` WHERE `aphc_sub_place_id`='$raise_place_id'";
	     	$sql_exe_stock=mysqli_query($conn,$query_get_stock);
	     	$num_stock_place=mysqli_num_rows($sql_exe_stock);
	     	if($num_stock_place!=0){
		     	while ($res=mysqli_fetch_assoc($sql_exe_stock)) {
		     		$present_stock[] = array('item_codes' =>$res['item_codes'] ,'item_types' =>$res['item_types'],'item_quantity' =>$res['item_quantity'] );
		     	}
		    }else{
		    	echo "No Record Is Avaliable Now";
		    	exit;
		    }
		    $pres_stock=json_encode($present_stock);
		    $updtd_stock=json_encode($updated_stock);
		    $insert_query="INSERT INTO `rhc_master_update_aphc_subcenter_stock`(`slno`, `updated_place_to`, `updated_place_from`, `present_info`, `updated_info`, `place_status`, `date`, `time`, `updated_user_id`) VALUES (NULL,'$top_place_id','$raise_place_id','$pres_stock','$updtd_stock','1','$date','$time','$user')";
   			$sql_exe_insert=mysqli_query($conn,$insert_query);
   			$date=date('Y-m-d');
		  $time=date('H:i:s');
		  
		  
		  $code_details= implode(",",$array_list);
		  // $top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$top_place_id' and `user_designation`='6' And `status`='1'";
		  // $sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
		  // while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
		  //   // print_r($res);
		  //   $array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
		  // }
		  	 $array_list_user_mobile=array();
	        // top mobile no
	  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$top_place_id' and `user_designation`='6' And `status`='1'";
	 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
	  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
	    // print_r($res);
	    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
	    		$block=$res_top_level_mobile['place_block_dh_id'];
	 		}
	 		// block
			  $top_level_mobile3="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$block' and `user_designation`='3' And `status`='1'";
			  $sql_exe_top_level_mobile3=mysqli_query($conn,$top_level_mobile3);
			  while($res_top_level_mobile3=mysqli_fetch_assoc($sql_exe_top_level_mobile3)){
			    // print_r($res);
			    $array_list_user_mobile[]=$res_top_level_mobile3['user_mobile'];
			   
			    $district=$res_top_level_mobile3['place_district_id'];
			  }
			    // district
			  $top_level_mobile2="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$district' and `user_designation`='2' And `status`='1'";
				 		$sql_exe_top_level_mobile2=mysqli_query($conn,$top_level_mobile2);
				  		while($res_top_level_mobile2=mysqli_fetch_assoc($sql_exe_top_level_mobile2)){
				    // print_r($res);
				   			 $array_list_user_mobile[]=$res_top_level_mobile2['user_mobile'];
				   			  $state=$res_top_level_mobile2['place_state_id'];
				  		}
			  // state
			  $top_level_mobile1="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$state' and `user_designation`='1' And `status`='1'";
				 		$sql_exe_top_level_mobile1=mysqli_query($conn,$top_level_mobile1);
				  		while($res_top_level_mobile1=mysqli_fetch_assoc($sql_exe_top_level_mobile1)){
				    // print_r($res);
				    		$array_list_user_mobile[]=$res_top_level_mobile1['user_mobile'];
				 		}
		   $mobileno_top=implode(";",$array_list_user_mobile);

		   $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$raise_place_id' and `user_designation`='8' And `status`='1'";
		  $sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
		  while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
		    // print_r($res);
		    $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
		  }
		   $mobileno_raise=implode(";",$array_list_raise_user_mobile);
		  
		  $datetime=date('Y-m-d H:i:s');
		   // $mobileno=$result_fetch1['user_mobile'];

		   $new_message="Stocks of ".$code_details.  ' on  '.$datetime. ' updated Success-fully '; // new message is need
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

		     $new_message1='Stock Updated Successfully';
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
		      	echo "Stock Updated Successfully";
				exit;
		    }else{
		      	echo "Stock Updated Successfully";
				exit;
		    }
		      }
		  }else{
		    echo "Stock Updated Successfully";
			exit;
		  }
		}
	     }else{
	     	echo "Same Item Code & Type Combination Cannot Be Indented More Than  Once";
	       	exit;
	     }

    }

// ///////////////////////////////////////////////////////////////////////////////////////////////
//																								// 
// 			  Issuce section and receive setion of block HERE IT SEPRATED						//
// 																								//
// ///////////////////////////////////////////////////////////////////////////////////////////////

function aphc_sub_iss_rec($message1,$mobs){
	$message_value=$message1;
	$mobs_value=$mobs;
	global $conn;
	$date1=$date=date('Y-m-d');
	$time1=$time=date('H:i:s');   			
	$message2=str_replace("br","",strtolower($message1)); //hre BR Is Remove
	//$message12=str_replace("ind","",$message2);
	$arr = explode(' ',trim($message2));
	$values=$arr[0]; // defined indent id
	$message3=str_replace($values,"",$message2); // here challan nos is been romove		    		
	$item_details1=(explode(",",$message3)); // here , is be roved into array
	// print_r($item_details1);
	$item_details=json_encode(explode(",",$message3));
	$count_details=count($item_details1); // count no of array separated by comma

	$query_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mobs'";
	$sql_exe=mysqli_query($conn,$query_check);
	$result_fetch=mysqli_fetch_assoc($sql_exe);
	 $sub_center_id=$result_fetch['sub_center_id'];

	$check_challan="SELECT * FROM `rhc_master_aphc_asha_challan_no` WHERE `challen_no`='$values' and `receiver_place_id`='$sub_center_id' and  `status`='0' or `status`='2' ";
	$sql_exe_check_challan=mysqli_query($conn,$check_challan);
	 $num_rows=mysqli_num_rows($sql_exe_check_challan);

	$check_indent1="SELECT * FROM `rhc_master_asha_indent` WHERE `indent_id`='$values' and `indent_place_raised_to`='$sub_center_id' and  `status`='1'  ";
	$sql_exe_check_indent1=mysqli_query($conn,$check_indent1);
	 $num_rows1=mysqli_num_rows($sql_exe_check_indent1);

	if(($num_rows==1) && ($num_rows1==0)){
		$fetch_get_details=mysqli_fetch_assoc($sql_exe_check_challan);
		$receiver_id=$fetch_get_details['receiver_place_id'];
	    $issuer_id=$fetch_get_details['issuer_place_id'];
		$challan_value=$values;
		return aphc_sub_receive($message_value,$mobs_value,$challan_value,$item_details1,$receiver_id,$issuer_id);

	}else if(($num_rows==0) && ($num_rows1==1)){
		$fetch_get_details=mysqli_fetch_assoc($sql_exe_check_challan);
		$receiver_id=$fetch_get_details['indent_place_raised_by'];
	    $issuer_id=$fetch_get_details['indent_place_raised_to'];
		$indent_value=$values;
		return aphc_sub_issue($message_value,$mobs_value,$indent_value,$item_details1,$receiver_id,$issuer_id);
	}else{
		echo "Sorry Entered Value Mismatch";
		exit();
	}


}
//////////////////////////////////////////////////////////////////////////////////////////////////
//																								// 
// 			 							PHC RECEIVED SECTION 									//
// 																								//
//////////////////////////////////////////////////////////////////////////////////////////////////
// receiver section
function aphc_sub_receive($message_value,$mobs_value,$challan_value,$item_details1,$receiver_id,$issuer_id){
	global $conn;
	 $message_value; //orginal message
	 $mobs_value; // user mobile no
	 $challan_no=$challan_value; // challan no
	$item_details1;// item array
	 $receiver_id; // receiver id
	$issuer_id; // Issuer Id
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
    if($res_ok==0){
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
    $date=date('Y-m-d');
    $time=date('H:i:s');
    if($simalar!="0"){
    	echo "Same Item Code & Type Combination Cannot Be Indented More Than  Once";
	    exit;
    }else{
    	$cat=0;
    	for ($i=0; $i <count($item_code); $i++) { 
			$item_codes=$item_code[$i];
			$item_types=$item_type[$i];
			$item_quantitys=$item_quantity[$i];

			$query_get_item_details="SELECT * FROM `rhc_master_aphc_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types' And `quantity_issued`='$item_quantitys'	";
	    	$sql_exe_get_item_details=mysqli_query($conn,$query_get_item_details);
	    	$num_rows_item_challan=mysqli_num_rows($sql_exe_get_item_details);
	    	if($num_rows_item_challan==0){
	    		$cat++;
	    	}
	    }
	    if($cat!=0){
	    	echo "Invalid Entry";
     		exit;
	    }else{
	    	for ($j=0; $j <count($item_code); $j++) { 
				$item_codes=$item_code[$j];
				$item_types=$item_type[$j];
				$item_quantity_issues=$item_quantity[$j];
	    	
	    		$array_list[]=$item_codes." ".$item_quantity_issues." ".$item_types;

		    	 $query_update_item_challan="UPDATE `rhc_master_aphc_asha_item_details_challan_no` SET `quantity_received`='$item_quantity_issues',`status`='1' WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types'";
					$sql_exe_update_item=mysqli_query($conn,$query_update_item_challan);
					// get quantity present
					$query_get_item_code_id="SELECT * FROM `rhc_master_stock_aphc_subcenter_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_sub_place_id`='$receiver_id'";
				$sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);	
				$result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);	
				$item_quantityss=$result_detail['item_quantity'];
				 $cal=$item_quantity_issues+$item_quantityss;
				 if($cal==0){	
					$update="UPDATE `rhc_master_stock_aphc_subcenter_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_sub_place_id`='$receiver_id'";
				}else{
					$update="UPDATE `rhc_master_stock_aphc_subcenter_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_sub_place_id`='$receiver_id'";
				}
				$sql_exe_update=mysqli_query($conn,$update);
		    }
		    $query_get_item_details1="SELECT * FROM `rhc_master_aphc_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' 	";
	    	$sql_exe_get_item_details1=mysqli_query($conn,$query_get_item_details1);
		    while($res_get_item_details=mysqli_fetch_assoc($sql_exe_get_item_details1)){
		    						// print_r($res_get_item_details);
		    	$item_code=$res_get_item_details['item_code'];
		    	$item_type=$res_get_item_details['item_type'];
		    	$item_batch_id=$res_get_item_details['item_batch_id'];
		    	$batch_id_item_details[]=array('item_batch_id'=>"$item_batch_id",'item_code'=>"$item_code",'item_type'=>"$item_type");

		    }
		    // print_r($batch_id_item_details);
		    // exit;
		    for ($i=0; $i <count($batch_id_item_details) ; $i++) { 
		    	$item_codes=$batch_id_item_details[$i]['item_code'];
		    	$item_types=$batch_id_item_details[$i]['item_type'];
		    	$item_batch_ids=$batch_id_item_details[$i]['item_batch_id'];
			    $query_batch_detail_item_challen="SELECT * FROM `rhc_master_aphc_asha_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_ids' and `item_type`='$item_types' and `item_code` ='$item_codes'";
			    $sql_exe_batch_details=mysqli_query($conn,$query_batch_detail_item_challen);
			    while ($res_batch_detail=mysqli_fetch_assoc($sql_exe_batch_details)) {
			    	//print_r($res_batch_detail);
			    	// [slno] => 6 [received_place_id] => Pat [issued_place_id] => BR [item_code] => cc [item_type] => f [batch_no] => b100 [batch_quantity] => 2000 [date_expire] => 2017-04-20 [date_creation] => 2017-04-14 [time_creation] => 14:18:39 [item_batch_id] => disbatch0012 ) 
			    	$item_code=$res_batch_detail['item_code'];
		    		$item_type=$res_batch_detail['item_type'];
		    		$batch_quantity=$res_batch_detail['batch_quantity'];
		    		$batch_no=$res_batch_detail['batch_no'];
		    		$date_expire=$res_batch_detail['date_expire'];

    				 $query_get_item_code_id1="SELECT * FROM `rhc_master_stock_aphc_subcenter_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_sub_place_id`='$receiver_id'";
					$sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
					$result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

					$aaphc_sub_stock_batch_id=$result_detail1['aaphc_sub_stock_batch_id'];
						if($batch_no!=0){
							$batch_insert="INSERT INTO `rhc_master_stock_aphc_batch_details`(`slno`, `aaphc_sub_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `aphc_sub_place_id`) VALUES (NULL,'$aphc_sub_stock_batch_id','$batch_no','$date_expire','$batch_quantity','$batch_quantity','1','$date','$time','$receiver_id')";
					
								$sql_exe_batch_insert=mysqli_query($conn,$batch_insert);
						}
			    	}

			}
			$user_id=$mobs_value;
			$quer_challan_update="UPDATE `rhc_master_aphc_asha_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1' WHERE `challen_no`='$challan_no'";
			$sql_exe_challan_update=mysqli_query($conn,$quer_challan_update);
	
						//$item_code=($_REQUEST['item_code']);
			
	//$item_code=($_REQUEST['item_code']);
	$date=date('Y-m-d');
	$time=date('H:i:s');
	
	
	$code_details= implode(",",$array_list);
	$array_list_user_mobile=array();
	$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$issuer_id' and `user_designation`='6' And `status`='1'";
	$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
	while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
		// print_r($res);
		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
		$block=$res_top_level_mobile['place_block_dh_id'];
	}

        // top mobile no
  	// 	$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$top_place_id' and `user_designation`='5' And `status`='1'";
 		// $sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
  	// 	while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
   //  // print_r($res);
   //  		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
   //  		$block=$res_top_level_mobile['place_block_dh_id'];
 		// }
 		// block
		  $top_level_mobile3="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$block' and `user_designation`='3' And `status`='1'";
		  $sql_exe_top_level_mobile3=mysqli_query($conn,$top_level_mobile3);
		  while($res_top_level_mobile3=mysqli_fetch_assoc($sql_exe_top_level_mobile3)){
		    // print_r($res);
		    $array_list_user_mobile[]=$res_top_level_mobile3['user_mobile'];
		   
		    $district=$res_top_level_mobile3['place_district_id'];
		  }
		    // district
		  $top_level_mobile2="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$district' and `user_designation`='2' And `status`='1'";
			 		$sql_exe_top_level_mobile2=mysqli_query($conn,$top_level_mobile2);
			  		while($res_top_level_mobile2=mysqli_fetch_assoc($sql_exe_top_level_mobile2)){
			    // print_r($res);
			   			 $array_list_user_mobile[]=$res_top_level_mobile2['user_mobile'];
			   			  $state=$res_top_level_mobile2['place_state_id'];
			  		}
		  // state
		  $top_level_mobile1="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$state' and `user_designation`='1' And `status`='1'";
			 		$sql_exe_top_level_mobile1=mysqli_query($conn,$top_level_mobile1);
			  		while($res_top_level_mobile1=mysqli_fetch_assoc($sql_exe_top_level_mobile1)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile1['user_mobile'];
			 		}
	 $mobileno_top=implode(";",$array_list_user_mobile);

	 $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$receiver_id' and `user_designation`='8' And `status`='1'";
	$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
	while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
		// print_r($res);
		$array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
	}
	 $mobileno_raise=implode(";",$array_list_raise_user_mobile);
	
	$datetime=date('Y-m-d H:i:s');
	 // $mobileno=$result_fetch1['user_mobile'];

	 $new_message=$code_details. " with Challan No ".$challan_no.  ' on  '.$datetime. ' Received Success-fully ';
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

		 $new_message1='Receipt Confirmation Sent Success-fully'.$datetime;
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
			echo $new_message1='Receipt Confirmation Sent Success-fully'.$datetime;
			exit;
		}else{
			echo $new_message1='Receipt Confirmation Sent Success-fully'.$datetime;
			exit;
		}
			}
	}else{
		echo $new_message1='Receipt Confirmation Sent Success-fully'.$datetime;
		exit;
	}
			
	}	
						
	    }	    	
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////
//																								// 
// 			 							BLOCK ISSUEED SECTION 									//
// 																								//
//////////////////////////////////////////////////////////////////////////////////////////////////
function aphc_sub_issue($message_value,$mobs_value,$indent_value,$item_details1,$receiver_id,$issuer_id){
// starting of dist_issue {
	global $conn;
	$message_value; //orginal message
	$mobs_value; // user mobile no
	$indent_value=$indent_value; // challan no
	$item_details1;// item array
	$receiver_id; // receiver id
	$issuer_id; // Issuer Id
	$count_details=count($item_details1);
	

	// stating of issue 
	$date1=$date=date('Y-m-d');
	$time1=$time=date('H:i:s');   			
	$message2=str_replace("br","",strtolower($message_value)); //hre BR Is Remove
	//$message12=str_replace("ind","",$message2);
	$arr = explode(' ',trim($message2));
	$indent_id=$indent_no=$arr[0]; // defined indent id
		    $message3=str_replace($indent_no,"",$message2); // here challan nos is been romove		    		
		    $item_details1=(explode(",",$message3)); // here , is be roved into array
		   	// print_r($item_details1);
		   	$item_details=json_encode(explode(",",$message3));
		   	$count_details=count($item_details1); // count no of array separated by comma
		   	//  seprate itemcode , itemtype,  itemquantity
		   	for ($i=0; $i < $count_details ; $i++) { 
		    	if(!empty($item_details1[$i])){
		    		$item_details_sub=(explode(" ", trim($item_details1[$i])));
		    		if(ctype_digit($item_details_sub[0])){
		    			if(($item_details_sub[0]=='1')||($item_details_sub[0]=='2')||($item_details_sub[0]=='3')||($item_details_sub[0]=='4')||($item_details_sub[0]=='5')||($item_details_sub[0]=='6')){ 
		    			// here only numeriacl value is seprated
		    				$check_int=1;
		    				$item_code1[]=$item_details_sub[0];
		    			}else{
		    				echo "Invalid Entry ";
		    				exit;
		    			}
		    		}else{
		    			// here only code which is alphabets is allowed
		    			$check_int=0;
		    			$item_code[]=$item_details_sub[0];
		    		}
		    		// item type is by p -> paid f-> free 
		    		if(($item_details_sub[2]==='p')||($item_details_sub[2]=='f')){
		    			$item_type[]=$item_details_sub[2];
		    		}else{
		    			echo "Invalid Entry ";
		    			exit;
		    		}
		    		// here only item quantity is 
		    		if(ctype_digit($item_details_sub[1])){  
		    			$item_quantity[]=$item_details_sub[1];
		    		}else{
		    			echo "Invalid Entry ";
		    			exit;
		    		}
		    		// if additional comma is 
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
			// 
			if($res_ok==0){	     		
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
	    	if($simalar!="0"){
	    		echo "Same Item Code & Type Combination Cannot Be Indented More Than  Once";
	    	}else{
	    		$query_get_detail="SELECT * FROM `rhc_master_asha_indent` WHERE `indent_id`='$indent_no' AND `status`='1'";
		    	$sql_exe_get_details=mysqli_query($conn,$query_get_detail);
		    	$num_rows_get_details=mysqli_num_rows($sql_exe_get_details);
		    	if($num_rows_get_details==0){
		    		echo "Invalid Indent No Not Match1";
		    		exit;
		    	}else{
		    		//here user information is received here to indent 
		    		$query_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mobs_value'";
					$sql_exe=mysqli_query($conn,$query_check);
					$result_fetch=mysqli_fetch_assoc($sql_exe);
			 		$place_id=$top_place_id=$issuer_id; // here state issue indent
	    	 		// echo=$result_fetch['place_district_id']; // raised place id or issued place id is given 
	    			$user_name=$user=$result_fetch['user_id']; // user or user_name is defined	    			
	    			 $check_indent_status="SELECT * FROM `rhc_master_asha_indent` WHERE `indent_place_raised_to`='$issuer_id' and `indent_id`='$indent_no' AND `status`='1'";
		    		$sql_exe_get_details_status=mysqli_query($conn,$check_indent_status);
		    		$num_rows_get_details1=mysqli_num_rows($sql_exe_get_details_status);
		    		if($num_rows_get_details1==0){ // checking valid indent id for for state or not..
		    			echo "Invalid Indent No Not Match2";
		    			exit;
		    		}else{ // start of else bracket
		    			$result_list=mysqli_fetch_assoc($sql_exe_get_details_status);
		    			 $receiver_id=$raise_place_id=$place_id_district=$result_list['indent_place_raised_by'];
		    			// print_r($result_list1);
		    			// challan no is generated here
 						while(1){        
					        // generate unique random number
					        $numbers = "0123456789";
					        $appno = "chal".substr( str_shuffle( $numbers ), 0, 6 );
					        // check if it exists in database
					        $qry_check = "SELECT * FROM `rhc_master_challan_no_creation` WHERE `challen_no`='$appno'";       
					        $sql_check = mysqli_query($conn, $qry_check);         
					        $rowCount = mysqli_num_rows($sql_check);      
					        // if not found in the db (it is unique), break out of the loop
					        if($rowCount < 1){
					          	$challen_no=$appno;
					          	$query="INSERT INTO `rhc_master_challan_no_creation`(`slno`, `challen_no`, `place_issuer_id`, `place_issue_to`, `date_creation`, `time_creation`) VALUES (NULL,'$challen_no','$place_id' ,'$place_id_district','$date1','$time1')";
						          $sql_check = mysqli_query($conn, $query);
						          break;
						    }
						}

						$sql_check="SELECT * FROM `rhc_master_asha_challan_no` WHERE `indent_id`='$indent_id' and `status`!='5'";
						$sql_exe_checks_indent_issued=mysqli_query($conn,$sql_check);
						$num_indents=0;
						 // $num_indents=mysqli_num_rows($sql_exe_checks_indent_issued);
						if($num_indents!=0){
							echo "Invalid Indent No Not Match3";
		    				exit;
						}else{
							$query_challen="INSERT INTO `rhc_master_asha_challan_no`(`slno`, `receiver_place_id`, `issuer_place_id`, `indent_id`, `challen_no`, `date_creation`, `time_creation`, `issuer_id`,`status`) VALUES (NULL,'$receiver_id','$issuer_id' ,'$indent_id','$challen_no','$date','$time','$user_name','4')";
						$sql_exe_challen=mysqli_query($conn,$query_challen);
							// $item_details=array();
							$item_details=array();
						for ($i=0; $i <count($item_code) ; $i++) { 
						
							$item_code_single=$item_code[$i];
							$Item_type_single=$item_type[$i];
							$item_quantity_single=$item_quantity[$i];
							$qnt_issue_single=$item_quantity[$i];
							// challen item value is inserted
							 $query_item="INSERT INTO `rhc_master_asha_item_details_challan_no`(`slno`, `challan_no`, `receiver_place_id`, `issuer_place_id`, `item_code`, `item_type`, `quantity_indent`, `quantity_issued`,`date_creation`, `time_creation`) VALUES (NULL, '$challen_no','$receiver_id','$issuer_id','$item_code_single','$Item_type_single','$item_quantity_single','$qnt_issue_single','$date','$time')";

							$sql_exe_item_challen=mysqli_query($conn,$query_item);

							$last_id = mysqli_insert_id($conn);
							$item_batch_id="ashaphclbatch00".$last_id;
							$item_batch_array[] = array('item_code_single' =>"$item_code_single" ,'Item_type_single'=>"$Item_type_single",'item_batch_id'=>"$item_batch_id" ,"qnt_issue_single"=>"$qnt_issue_single" );

							//challen item batch id is update 
							$quer_item_update="UPDATE `rhc_master_asha_item_details_challan_no` SET `item_batch_id`='$item_batch_id' WHERE  `slno`='$last_id'";
							$sql_exe_update_batch_challen=mysqli_query($conn,$quer_item_update);
						// }
						// for ($i=0; $i <count($item_code) ; $i++) { 
						// 	$item_code_single=$item_code[$i];
						// 	$Item_type_single=$Item_type[$i];
						// 	$item_quantity_single=$item_quantity[$i];
						// 	$qnt_issue_single=$qnt_issue[$i];

							$query_check="SELECT * FROM `rhc_master_stock_aphc_subcenter_items` WHERE `status`='1' AND `aphc_sub_place_id`='$issuer_id' And `item_codes`='$item_code_single' And `item_types`='$Item_type_single'";
							$sql_exe_item=mysqli_query($conn,$query_check);
							$num_rows=mysqli_num_rows($sql_exe_item);
							$result_fetch=mysqli_fetch_assoc($sql_exe_item);
							$place_item_quantity=$result_fetch['item_quantity'];
							if($num_rows!=0){
							

								$available_stock=$result_fetch['item_quantity'];
							 	$aphc_sub_stock_batch_id=$result_fetch['aphc_sub_stock_batch_id'];
							 	$remain_stock=$available_stock-$qnt_issue_single;
								if(0>$remain_stock){
									$issue_stock=$qnt_issue_single+($remain_stock);
									$qnt_issue1=$issue_stock;

									$query_batch="SELECT * FROM `rhc_master_stock_aphc_subcenter_batch_details` WHERE `aphc_sub_stock_batch_id`='$aphc_sub_stock_batch_id' and `status`='1' and `date_exp`>'$date' ORDER BY YEAR(`date_exp`) ASC, MONTH(`date_exp`) ASC, DAY(`date_exp`) ASC";
									$sql_exe_batch=mysqli_query($conn,$query_batch);
									$num_rows1=mysqli_num_rows($sql_exe_batch);
									$issue_stocks=0;
									if($num_rows1!=0){
										while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {
											$issue_stocks2=0;
											$issue_stocks1=0;
										 	$remaining_quantity=$res_batch['remaining_quantity'];
										 	$issue_stocks2=$qnt_issue1-$issue_stocks;
										 	$check_avaialble=$remaining_quantity-$issue_stocks2;
											if($issue_stocks<$qnt_issue1){
												if(0>$check_avaialble){
													$issue_stocks1=$issue_stocks2+($check_avaialble);
												 	$issue_stocks=$issue_stocks1+$issue_stocks;
												
													$batch_nos=$res_batch['batch_nos'];
													$remaining_quantity=$res_batch['remaining_quantity'];
													$remaining_quantity1=$res_batch['remaining_quantity'];
													$date_exp=$res_batch['date_exp'];
													$slnos=$res_batch['slno'];

													$item_details[]=array("aphc_sub_stock_batch_id"=>"$aphc_sub_stock_batch_id","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"$batch_nos","remaining_quantity"=>"$remaining_quantity","date_exp"=>"$date_exp","remaining_quantity1"=>"$remaining_quantity1",'place_item_quantity'=>"$place_item_quantity",'slno'=>"$slnos");

												}else{
												
													$issue_stocks1=$remaining_quantity-$check_avaialble;
													$issue_stocks=$issue_stocks1+$issue_stocks;
													$batch_nos=$res_batch['batch_nos'];
													$remaining_quantity=$issue_stocks1;
													$date_exp=$res_batch['date_exp'];
													$remaining_quantity1=$res_batch['remaining_quantity'];
													$slnos=$res_batch['slno'];

													$item_details[]=array("aphc_sub_stock_batch_id"=>"$aphc_sub_stock_batch_id","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"$batch_nos","remaining_quantity"=>"$remaining_quantity","date_exp"=>"$date_exp","remaining_quantity1"=>"$remaining_quantity1",'place_item_quantity'=>"$place_item_quantity",'slno'=>"$slnos");
												}
											}
										}
									}else{
										$item_details[]=array("aphc_sub_stock_batch_id"=>"0","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"0","remaining_quantity"=>"0","date_exp"=>"0",'remaining_quantity1'=>"0",'place_item_quantity'=>"$place_item_quantity",'slno'=>"0");
								 	}
								}else{
								 	$query_batch="SELECT * FROM `rhc_master_stock_aphc_subcenter_batch_details` WHERE `aphc_sub_stock_batch_id`='$aphc_sub_stock_batch_id' and `status`='1' and `date_exp`>'$date' ORDER BY YEAR(`date_exp`) ASC, MONTH(`date_exp`) ASC, DAY(`date_exp`) ASC";
									$sql_exe_batch=mysqli_query($conn,$query_batch);
									$num_rows1=mysqli_num_rows($sql_exe_batch);
									$issue_stocks=0;
									if($num_rows1!=0){
										while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {
											$issue_stocks2=0;
											$issue_stocks1=0;
										 	$remaining_quantity=$res_batch['remaining_quantity'];
										 	$issue_stocks2=$qnt_issue_single-$issue_stocks;
										 	$check_avaialble=$remaining_quantity-$issue_stocks2;
											if($issue_stocks<$qnt_issue_single){
												if(0>$check_avaialble){
													$issue_stocks1=$issue_stocks2+($check_avaialble);
												 	$issue_stocks=$issue_stocks1+$issue_stocks;
												
													$batch_nos=$res_batch['batch_nos'];
													$remaining_quantity=$res_batch['remaining_quantity'];
													$date_exp=$res_batch['date_exp'];
													$remaining_quantity1=$res_batch['remaining_quantity'];
													$slnos=$res_batch['slno'];
												
													$item_details[]=array("aphc_sub_stock_batch_id"=>"$aphc_sub_stock_batch_id","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"$batch_nos","remaining_quantity"=>"$remaining_quantity","date_exp"=>"$date_exp","remaining_quantity1"=>"$remaining_quantity1",'place_item_quantity'=>"$place_item_quantity",'slno'=>"$slnos");
												}else{
												
													$issue_stocks1=$remaining_quantity-$check_avaialble;
													$issue_stocks=$issue_stocks1+$issue_stocks;
												
												
													$batch_nos=$res_batch['batch_nos'];
													$remaining_quantity=$issue_stocks1;
													$date_exp=$res_batch['date_exp'];
													$remaining_quantity1=$res_batch['remaining_quantity'];
													$slnos=$res_batch['slno'];
											 
													$item_details[]=array("aphc_sub_stock_batch_id"=>"$aphc_sub_stock_batch_id","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"$batch_nos","remaining_quantity"=>"$remaining_quantity","date_exp"=>"$date_exp","remaining_quantity1"=>"$remaining_quantity1",'place_item_quantity'=>"$place_item_quantity" ,'slno'=>"$slnos");
												}
											}						
										}
									// echo $issue_stocks;
									}else{
										$item_details[]=array("aphc_sub_stock_batch_id"=>"0","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"0","remaining_quantity"=>"0","date_exp"=>"0",'remaining_quantity1'=>"0",'place_item_quantity'=>"$place_item_quantity",'slno'=>"0");
								 	}
								}

							}else{
								$item_details[]=array("aphc_sub_stock_batch_id"=>"0","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"0","remaining_quantity"=>"0","date_exp"=>"0",'remaining_quantity1'=>"0",'place_item_quantity'=>"$place_item_quantity",'slno'=>'0');
							}

						}
						// echo "<pre>";
					// print_r($item_details);
					// 	// exit;
					// 	// batch detailsid
						
					//   print_r($item_batch_array);
					//   exit;
							// store batch information in block tables AND UPDATE DISTICT BATCH STOCK  AS WELL AS DISTICT ITEM STOCK
							for ($i=0; $i <count($item_batch_array) ; $i++) { 
								for ($j=0; $j <count($item_details) ; $j++) { 
									$ty=$item_batch_array[$i]['item_code_single'].$item_batch_array[$i]['Item_type_single'];
									
									$ty1=$item_details[$j]['item_code_single'].$item_details[$j]['Item_type_single'];
									if($ty==$ty1){

										$code_item=$item_details[$j]['item_code_single'];
										$type_item=$item_details[$j]['Item_type_single'];
										$batch_no=$item_details[$j]['batch_nos'];
										$batch_quantity=$item_details[$j]['remaining_quantity'];
										$total_remain_batch_quantity=$item_details[$j]['remaining_quantity1'];
										$date_expire=$item_details[$j]['date_exp'];
										$item_batch_id=$item_batch_array[$i]['item_batch_id'];
										$aphc_sub_stock_batch_ids=$item_details[$j]['aphc_sub_stock_batch_id'];
										$place_item_quantity=$item_details[$j]["place_item_quantity"];
										$slno=$item_details[$j]["slno"];

										// $stock_remain_qnt=$total_remain_batch_quantity-$batch_quantity;

										if($aphc_sub_stock_batch_ids!="0"){
										if($ty==$ty1){
											$query_store_batch="INSERT INTO `rhc_master_asha_receive_batch_detail_item`(`slno`, `received_place_id`, `issued_place_id`, `item_code`, `item_type`, `batch_no`, `batch_quantity`, `date_expire`, `date_creation`, `time_creation`, `item_batch_id`) VALUES (NULL,'$receiver_id','$issuer_id','$code_item','$type_item','$batch_no','$batch_quantity','$date_expire','$date1','$time1','$item_batch_id')";
										
										 	$sql_exe_batch_insert=mysqli_query($conn,$query_store_batch);
											 
												if($sql_exe_batch_insert){
													$remain_qnt=$total_remain_batch_quantity-$batch_quantity;
													if($remain_qnt==0){
													 	$status="2";
													
														$stock_update_district="UPDATE `rhc_master_stock_aphc_subcenter_batch_details` SET `remaining_quantity`='$remain_qnt',`status`='$status',`date_creation`='$date1',`time_creation`='$time1' WHERE `aphc_sub_stock_batch_id`='$aphc_sub_stock_batch_ids' AND `batch_nos`='$batch_no' and `slno`='$slno'";
													}else{
													 	$status="1";
														$stock_update_district="UPDATE `rhc_master_stock_aphc_subcenter_batch_details` SET `remaining_quantity`='$remain_qnt',`status`='$status',`date_creation`='$date1',`time_creation`='$time1' WHERE `aphc_sub_stock_batch_id`='$aphc_sub_stock_batch_ids' AND `batch_nos`='$batch_no' and `slno`='$slno'";
													}
													$sql_exe_update_batch_district=mysqli_query($conn,$stock_update_district);
												}
											}
										}
									}			
								}
								if($place_item_quantity!="0"){
									$qnt_issue_single=$item_batch_array[$i]['qnt_issue_single'];
									$stock_remain_qnt=$place_item_quantity-$qnt_issue_single;
									if($stock_remain_qnt==0){
										$status1="2";
										$query_stock_item_update="UPDATE `rhc_master_stock_aphc_subcenter_items` SET `item_quantity`='$stock_remain_qnt',`date_creation`='$date1',`time_creation`='$time1',`status`='$status1' WHERE `aphc_sub_stock_batch_id`='$aphc_sub_stock_batch_ids' and `item_codes`='$code_item' and `item_types`='$type_item' and `aphc_sub_place_id`='$issuer_id'  ";

									}else{
										$status1="1";
										$query_stock_item_update="UPDATE `rhc_master_stock_aphc_subcenter_items` SET `item_quantity`='$stock_remain_qnt',`date_creation`='$date1',`time_creation`='$time1',`status`='$status1' WHERE `aphc_sub_stock_batch_id`='$aphc_sub_stock_batch_ids' and `item_codes`='$code_item' and `item_types`='$type_item' and `phc_sub_place_id`='$issuer_id'  ";

									}
									// echo $query_stock_item_update;
									// exit;
									 $sql_exe_update_item_district=mysqli_query($conn,$query_stock_item_update);
									
								}
							}
							
							$query_update_challen="UPDATE `rhc_master_challan_no_creation` SET `status`='1' WHERE `challen_no`='$challen_no'";
							$sql_exe_update_challen=mysqli_query($conn,$query_update_challen);
							$query_update_indent="UPDATE `rhc_master_asha_indent` SET `status`='2' WHERE `indent_id`='$indent_id' ";
							$sql_exe_update_indent=mysqli_query($conn,$query_update_indent);

						 	$query_update_status_challan="UPDATE `rhc_master_asha_challan_no` SET `status`='0' WHERE `challen_no`='$challen_no'";
							$sql_exe_update_status_challan=mysqli_query($conn,$query_update_status_challan);
					 		// $msg->success('Challan No:- "'.$challen_no.'" To '.$receiver_id.' on Date ' .$date.' '.$time. ' SuccessFully' );
					 		if($sql_exe_update_indent){
							if($sql_exe_update_status_challan){
							//$item_code=($_REQUEST['item_code']);
							$date=date('Y-m-d');
							$time=date('H:i:s');
							$get_item="SELECT * FROM `rhc_master_asha_item_details_challan_no` WHERE `challan_no`='$challen_no'";
							$sql_exe_indent=mysqli_query($conn,$get_item);
							while($res=mysqli_fetch_assoc($sql_exe_indent)){
							// print_r($res);
								$array_list[]=$res['item_code']." ".$res['quantity_issued']." ".$res['item_type'];
							}
						
						
							$code_details= implode(",",$array_list);
							$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$issuer_id' and `user_designation`='8' and `status`='1' ";
							$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
							while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
							// print_r($res);
								$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
							}
						 	$mobileno_top=implode(";",$array_list_user_mobile);

						 	$array_list_raise_user_mobile=array();
						  	$query_list="SELECT * FROM `rhc_master_asha_indent` WHERE `indent_place_raised_to`='$place_id' and `indent_id`='$indent_id' ";
					  		$sql_exe_list=mysqli_query($conn,$query_list);
							$result_list=mysqli_fetch_assoc($sql_exe_list);
					   		
					    		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$receiver_id' and `user_designation`='9' and `status`='1'";
					    	
						 
								$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
								while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
	 // print_r($res);
									$array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
								$place_phc_aphc_id=$res_raise_level_mobile['place_phc_aphc_id'];
								}
								$raise_level_mobile4="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$place_phc_aphc_id' and `user_designation`='6' and `status`='1' ";
								$sql_exe_raise_level_mobile4=mysqli_query($conn,$raise_level_mobile4);
								while($res_raise_level_mobile4=mysqli_fetch_assoc($sql_exe_raise_level_mobile4)){
								// print_r($res);
									$array_list_raise_user_mobile[]=$res_raise_level_mobile4['user_mobile'];
									$block=$res_raise_level_mobile['place_block_dh_id'];
								}
								// block
								$raise_level_mobile3="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$block' and `user_designation`='3' And `status`='1'";
								$sql_exe_raise_level_mobile3=mysqli_query($conn,$raise_level_mobile3);
								while($res_raise_level_mobile3=mysqli_fetch_assoc($sql_exe_raise_level_mobile3)){
								// print_r($res);
									$array_list_raise_user_mobile[]=$res_raise_level_mobile3['user_mobile'];

									$district=$res_raise_level_mobile3['place_district_id'];
								}
								// district
								$raise_level_mobile2="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$district' and `user_designation`='2' And `status`='1'";
								$sql_exe_raise_level_mobile2=mysqli_query($conn,$raise_level_mobile2);
								while($res_raise_level_mobile2=mysqli_fetch_assoc($sql_exe_raise_level_mobile2)){
								// print_r($res);
									$array_list_raise_user_mobile[]=$res_raise_level_mobile2['user_mobile'];
									$state=$res_raise_level_mobile2['place_state_id'];
								}
								// state
								$raise_level_mobile1="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$state' and `user_designation`='1' And `status`='1'";
								$sql_exe_raise_level_mobile1=mysqli_query($conn,$raise_level_mobile1);
								while($res_raise_level_mobile1=mysqli_fetch_assoc($sql_exe_raise_level_mobile1)){
								// print_r($res);
								$array_list_raise_user_mobile[]=$res_raise_level_mobile1['user_mobile'];
								}
						  		$mobileno_raise=implode(";",$array_list_raise_user_mobile);
						
						

								$datetime=date('Y-m-d H:i:s');
						 		// $mobileno=$result_fetch1['user_mobile'];

						 		$new_message='Stock Issued Successfully ';
								 $no_charaater1=strlen($new_message);
								$api_params = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_top.'&text='.$new_message.'&route=Informative&type=text&datetime='. $datetime.'';
					    		$smsGatewayUrl = "https://promo.webtwosms.com/api/api_http.php?";  
					    		$smsgatewaydata = $smsGatewayUrl.$api_params;
					    		$url = $smsgatewaydata;
					    		$ch = curl_init();
								$query1="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message','$mobileno_top','$code_details','$new_message','2','$date','$time')";
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
							 		$new_message1=$code_details. '  has been issued on '.$datetime. ' with Challan No '.$challen_no;
						 			$no_charaater1=strlen($new_message1);
									$api_params1 = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_raise.'&text='.$new_message1.'&route=Informative&type=text&datetime='. $datetime.'';
					   	 			$smsGatewayUrl1 = "https://promo.webtwosms.com/api/api_http.php?";  
					   		 		$smsgatewaydata = $smsGatewayUrl.$api_params;
					    			$url = $smsgatewaydata;
					    			$ch1 = curl_init();
									$query11="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message1','$mobileno_raise','$code_details','$no_charaater1','2','$date','$time')";
									$sql_exe_sms11=mysqli_query($conn,$query11);
									if($sql_exe_sms11){        
										curl_setopt($ch1, CURLOPT_URL,$smsGatewayUrl1);
										curl_setopt($ch1, CURLOPT_POST, 1);
										curl_setopt($ch1, CURLOPT_POSTFIELDS,$api_params1);					
										// receive server response ...
										curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

						 				$server_output1 = curl_exec ($ch1);

										curl_close ($ch1);
									if($server_output1){

										echo "Stock Issued Successfully";
										exit;
									}else{
										echo "Stock Issued Successfully";
										exit;
									}
										}
								}else{
										echo "Stock Issued Successfully";
										exit;
								}
							}

						}

						}

		    		// end else bracket
		    		}
		    	}
	    	}
	    		
			}


// end of dist_issue}
}