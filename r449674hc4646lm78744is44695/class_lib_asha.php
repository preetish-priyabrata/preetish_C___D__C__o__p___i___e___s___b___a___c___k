<?php
error_reporting(0);
include 'config.php';

//////////////////////////////////////////////////////////////////////////////////////////////////
//																								// 
// 			 							asha Section For Issue  								//
// 																								//
//////////////////////////////////////////////////////////////////////////////////////////////////

    function asha($mobiles,$message1s){
    	
    	   $mobs=$mobiles;
    	   $sms_district=$message1s;
    	  $message1=strtolower($sms_district);
    	   	if (preg_match('/ind/',$message1)){
    	   		return asha_indent($message1,$mobs);
    	   	}else{
    	   		if (preg_match('/update/',$message1)){
    	   			return asha_update($message1,$mobs);
    	   		}else{
    	   			return asha_received($message1,$mobs);
    	   		}
    	   	}


    }

//////////////////////////////////////////////////////////////////////////////////////////////////
//																								// 
// 			 							asha INDENT SECTION 									//
// 																								//
//////////////////////////////////////////////////////////////////////////////////////////////////

    function asha_indent($message_ind,$mobs1){
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
	    echo $count_details=count($item_details1);
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
  			$query_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mobs1'";

			$sql_exe=mysqli_query($conn,$query_check);
			$result_fetch=mysqli_fetch_assoc($sql_exe);
			$asha_level=$result_fetch['asha_top_level'];
			switch ($asha_level) {
				case '1': // phc asha where asha_top_level==1
					$top_place_id=$result_fetch['place_phc_aphc_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];
	    			$query_intent_details="INSERT INTO `rhc_master_phc_asha_indent`(`slno`, `indent_place_raised_to`, `indent_place_raised_by`,`place_status`, `date_creation`, `time_creation`,`inserted_by_id`) VALUES (NULL,'$top_place_id','$raise_place_id','2','$date','$time','$user')";
  					$sql_exe_insert=mysqli_query($conn,$query_intent_details);
  				
    				$last_id = mysqli_insert_id($conn);
    				$get_id="ashaph00".$da.$last_id;
     				$query_update_indent="UPDATE `rhc_master_phc_asha_indent` SET `indent_id`='$get_id' WHERE `slno`='$last_id'";
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);		
					break;
				case '2':  // phc-hsc asha where asha_top_level==2
					$top_place_id=$result_fetch['sub_center_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];
	    			$query_intent_details="INSERT INTO `rhc_master_asha_indent`(`slno`, `indent_place_raised_to`, `indent_place_raised_by`,`place_status`, `date_creation`, `time_creation`,`inserted_by_id`) VALUES (NULL,'$top_place_id','$raise_place_id','1','$date','$time','$user')";
  					$sql_exe_insert=mysqli_query($conn,$query_intent_details);
  				
    				$last_id = mysqli_insert_id($conn);
    				$get_id="asha00".$da.$last_id;
     				$query_update_indent="UPDATE `rhc_master_asha_indent` SET `indent_id`='$get_id' WHERE `slno`='$last_id'";
    				$sql_exe_Update=mysqli_query($conn,$query_update_indent);
    				if($sql_exe_Update){

		      			for ($i=0; $i <$count_details ; $i++) { 
		        			// print_r($item_code);
			        		$item_codes=$item_code[$i];
			       			 $item_types=$item_type[$i];
			         		$item_quantitys=$item_quantity[$i];
			        
			       
			          		// echo "hi";
			           		$check_indent="SELECT * FROM `rhc_master_asha_indent_id_details` WHERE `indent_id`='$get_id' and `item_code`='$item_codes' and `Item_type`='$item_types'";
			         		 $sql_check=mysqli_query($conn,$check_indent);
			          		$num_check=mysqli_num_rows($sql_check); 
			          		if($num_check==0){        
			          			$query_item_insert="INSERT INTO `rhc_master_asha_indent_id_details`(`slno`, `indent_id`, `item_code`, `Item_type`, `item_quantity`, `date_creation`, `time_creation`) VALUES (NULL, '$get_id','$item_codes','$item_types','$item_quantitys','$date','$time')";
			            		$sql_insert_item=mysqli_query($conn,$query_item_insert);

			            		$array_list[]=$item_codes." ".$item_quantitys." ".$item_types;
			        		}
		       			}
			       	}
			        $code_details= implode(",",$array_list);
			        $array_list_user_mobile=array();
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='7' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
			    		$place_phc_aphc_id[]=$res_top_level_mobile['place_phc_aphc_id'];

			 		}
			 		$top_level_mobile4="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$place_phc_aphc_id' and `user_designation`='5' And `status`='1'";
					$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile4);
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);	
					break;
				case '3':  // aphc ann where asha_top_level==3
					$top_place_id=$result_fetch['place_phc_aphc_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];
	    			$query_intent_details="INSERT INTO `rhc_master_aphc_asha_indent`(`slno`, `indent_place_raised_to`, `indent_place_raised_by`,`place_status`, `date_creation`, `time_creation`,`inserted_by_id`) VALUES (NULL,'$top_place_id','$raise_place_id','2','$date','$time','$user')";
  					$sql_exe_insert=mysqli_query($conn,$query_intent_details);
  				
    				$last_id = mysqli_insert_id($conn);
    				$get_id="asha00".$da.$last_id;
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);
					break;
				case '4':  // aphc hsc ann where asha_top_level==4
					$top_place_id=$result_fetch['sub_center_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];
	    			$query_intent_details="INSERT INTO `rhc_master_asha_indent`(`slno`, `indent_place_raised_to`, `indent_place_raised_by`,`place_status`, `date_creation`, `time_creation`,`inserted_by_id`) VALUES (NULL,'$top_place_id','$raise_place_id','2','$date','$time','$user')";
  					$sql_exe_insert=mysqli_query($conn,$query_intent_details);
  				
    				$last_id = mysqli_insert_id($conn);
    				$get_id="asha00".$da.$last_id;
     				$query_update_indent="UPDATE `rhc_master_asha_indent` SET `indent_id`='$get_id' WHERE `slno`='$last_id'";
    				$sql_exe_Update=mysqli_query($conn,$query_update_indent);
    				if($sql_exe_Update){

		      			for ($i=0; $i <$count_details ; $i++) { 
		        			// print_r($item_code);
			        		$item_codes=$item_code[$i];
			       			 $item_types=$item_type[$i];
			         		$item_quantitys=$item_quantity[$i];
			        
			       
			          		// echo "hi";
			           		$check_indent="SELECT * FROM `rhc_master_asha_indent_id_details` WHERE `indent_id`='$get_id' and `item_code`='$item_codes' and `Item_type`='$item_types'";
			         		 $sql_check=mysqli_query($conn,$check_indent);
			          		$num_check=mysqli_num_rows($sql_check); 
			          		if($num_check==0){        
			          			$query_item_insert="INSERT INTO `rhc_master_asha_indent_id_details`(`slno`, `indent_id`, `item_code`, `Item_type`, `item_quantity`, `date_creation`, `time_creation`) VALUES (NULL, '$get_id','$item_codes','$item_types','$item_quantitys','$date','$time')";
			            		$sql_insert_item=mysqli_query($conn,$query_item_insert);

			            		$array_list[]=$item_codes." ".$item_quantitys." ".$item_types;
			        		}
		       			}
			       	}
			        $code_details= implode(",",$array_list);
			        $place_phc_aphc_id=array();
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='8' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];			 		
			 			$place_phc_aphc_id[]=$res_top_level_mobile['place_phc_aphc_id'];

			 		}
			 		$top_level_mobile4="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$place_phc_aphc_id' and `user_designation`='5' And `status`='1'";
					$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile4);
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);
					break;
				case '6':// uphc internal indenting when asha top status==6
					$top_place_id=$result_fetch['place_block_dh_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];
	    			$query_intent_details="INSERT INTO `rhc_master_uphc_asha_indent`(`slno`, `indent_place_raised_to`, `indent_place_raised_by`,`place_status`, `date_creation`, `time_creation`,`inserted_by_id`) VALUES (NULL,'$top_place_id','$raise_place_id','2','$date','$time','$user')";
  					$sql_exe_insert=mysqli_query($conn,$query_intent_details);
  				
    				$last_id = mysqli_insert_id($conn);
    				$get_id="uphc_asha00".$da.$last_id;
     				$query_update_indent="UPDATE `rhc_master_uphc_asha_indent` SET `indent_id`='$get_id' WHERE `slno`='$last_id'";
    				$sql_exe_Update=mysqli_query($conn,$query_update_indent);
    				if($sql_exe_Update){

		      			for ($i=0; $i <$count_details ; $i++) { 
		        			// print_r($item_code);
			        		$item_codes=$item_code[$i];
			       			 $item_types=$item_type[$i];
			         		$item_quantitys=$item_quantity[$i];
			        
			       
			          		// echo "hi";
			           		$check_indent="SELECT * FROM `rhc_master_uphc_asha_indent_id_details` WHERE `indent_id`='$get_id' and `item_code`='$item_codes' and `Item_type`='$item_types'";
			         		 $sql_check=mysqli_query($conn,$check_indent);
			          		$num_check=mysqli_num_rows($sql_check); 
			          		if($num_check==0){        
			          			$query_item_insert="INSERT INTO `rhc_master_uphc_asha_indent_id_details`(`slno`, `indent_id`, `item_code`, `Item_type`, `item_quantity`, `date_creation`, `time_creation`) VALUES (NULL, '$get_id','$item_codes','$item_types','$item_quantitys','$date','$time')";
			            		$sql_insert_item=mysqli_query($conn,$query_item_insert);

			            		$array_list[]=$item_codes." ".$item_quantitys." ".$item_types;
			        		}
		       			}
			       	}
			        $code_details= implode(",",$array_list);
			        $place_phc_aphc_id=array();
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$top_place_id' and `user_designation`='11' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];			 		
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);
				break;
				case '8':// dh internal indenting when asha top status==8

				break;
				default:
					echo "Invalid/User";
					break;
			}
   				  
			  		$datetime=date('Y-m-d H:i:s');
			   // $mobileno=$result_fetch1['user_mobile'];
			   		$new_message="Indent From ".$raise_place_id. '  with '.$code_details. ' has been raised on '.$datetime. ' against indent id  '.$get_id;
			   		// $new_message="Indent From ".$raise_place_id. '  with '.$code_details. ' has been raised on '.$datetime. ' against indent id  '.$get_id;
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

					    // $new_message1='Indent Generated Success-fully ';
					    $new_message1="इंडेंट सफलतापूर्वक बनाई गई";

					    $no_charaater1=strlen($new_message1);
					    $api_params1 = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_raise.'&text='.$new_message1.'&route=Informative&type=unicode&datetime='. $datetime.'';
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
// 			 							Dh UPDATE SECTION 	     								//
// 																								//
//////////////////////////////////////////////////////////////////////////////////////////////////
  
   	function asha_update($message_ind,$mobs1){
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
	     	$date=date('Y-m-d');
		  $time=date('H:i:s');
	     	$query_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mobs1'";

			$sql_exe=mysqli_query($conn,$query_check);
			$result_fetch=mysqli_fetch_assoc($sql_exe);
			$asha_level=$result_fetch['asha_top_level'];
			switch ($asha_level) {
				case '1':
					$top_place_id=$result_fetch['place_phc_aphc_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];
	    			 $array_list_user_mobile=array();
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);		
					break;
				case '2':
					$top_place_id=$result_fetch['sub_center_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];
	    			$array_list_raise_user_mobile=array();
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='7' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
			 			$place_phc_aphc_id[]=$res_top_level_mobile['place_phc_aphc_id'];

			 		}
			 		$top_level_mobile4="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$place_phc_aphc_id' and `user_designation`='5' And `status`='1'";
					$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile4);
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);	
					break;
				case '3':
					$top_place_id=$result_fetch['place_phc_aphc_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];
	    			$array_list_raise_user_mobile=array();
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);
					break;
				case '4':
					$top_place_id=$result_fetch['sub_center_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];	
	    			$array_list_raise_user_mobile=array();    			
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='8' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
			 			$place_phc_aphc_id[]=$res_top_level_mobile['place_phc_aphc_id'];

			 		}
			 		$top_level_mobile4="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$place_phc_aphc_id' and `user_designation`='5' And `status`='1'";
					$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile4);
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);
					break;
				case '6':
					$top_place_id=$result_fetch['place_block_dh_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$mobs1;	
	    			$array_list_raise_user_mobile=array();    			
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$top_place_id' and `user_designation`='11' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);

				break;
				default:
					echo "Invalid/User";
					break;
			}
	     	for ($i=0; $i <$count_details ; $i++) { 
		     	$item_codes=$item_code[$i];
		     	$item_types=$item_type[$i];
		     	$item_quantitys=$item_quantity[$i];    		

		     		
		     	if($item_quantitys==0){      
         			$query_update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$item_quantitys',`date_creation`='$date',`time_creation`='$time',`status`='2' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$raise_place_id' ";
     				$updated_stock[] = array('item_codes' =>$item_codes ,'item_types' =>$item_types,'item_quantity' =>$item_quantitys );
     				$array_list[]=$item_code[$i]." ".$item_quantity[$i]." ".$item_type[$i];
     
    			}else{
      				if($item_quantitys>0){      
       					$query_update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$item_quantitys',`date_creation`='$date',`time_creation`='$time',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$raise_place_id'";
       					$updated_stock[] = array('item_codes' =>$item_codes ,'item_types' =>$item_types,'item_quantity' =>$item_quantitys );
       					$array_list[]=$item_code[$i]." ".$item_quantity[$i]." ".$item_type[$i];

     				}else{
     				 	echo "Invalid Entry";
	       				exit;
         				
      				}

		     	}
		     	$sql_exe=mysqli_query($conn,$query_update);
		    }
		    
	     	$query_get_stock="SELECT * FROM `rhc_master_stock_asha_items` WHERE `asha_place_id`='$raise_place_id'";
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
		    switch ($asha_level) {
				case '1':
					$insert_query="INSERT INTO `rhc_master_update_asha_stock`(`slno`, `updated_place_to`, `updated_place_from`, `present_info`, `updated_info`, `place_status`, `date`, `time`, `updated_user_id`) VALUES (NULL,'$top_place_id','$raise_place_id','$pres_stock','$updtd_stock','1','$date','$time','$user')";
					break;
				case '2':
					$insert_query="INSERT INTO `rhc_master_update_asha_stock`(`slno`, `updated_place_to`, `updated_place_from`, `present_info`, `updated_info`, `place_status`, `date`, `time`, `updated_user_id`) VALUES (NULL,'$top_place_id','$raise_place_id','$pres_stock','$updtd_stock','2','$date','$time','$user')";
					break;
				case '3':
					$insert_query="INSERT INTO `rhc_master_update_asha_stock`(`slno`, `updated_place_to`, `updated_place_from`, `present_info`, `updated_info`, `place_status`, `date`, `time`, `updated_user_id`) VALUES (NULL,'$top_place_id','$raise_place_id','$pres_stock','$updtd_stock','3','$date','$time','$user')";
					break;
				case '4':
					$insert_query="INSERT INTO `rhc_master_update_asha_stock`(`slno`, `updated_place_to`, `updated_place_from`, `present_info`, `updated_info`, `place_status`, `date`, `time`, `updated_user_id`) VALUES (NULL,'$top_place_id','$raise_place_id','$pres_stock','$updtd_stock','4','$date','$time','$user')";
					break;
				case '6':
					$query_get_stock="SELECT * FROM `rhc_master_stock_uphc_asha_items` WHERE `uphc_asha_place_id`='$raise_place_id'";
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

					$insert_query="INSERT INTO `rhc_master_update_uphc_asha_stock`(`slno`, `updated_place_to`, `updated_place_from`, `present_info`, `updated_info`, `place_status`, `date`, `time`, `updated_user_id`) VALUES (NULL,'$top_place_id','$raise_place_id','$pres_stock','$updtd_stock','1','$date','$time','$user')";
					break;
				default:
					echo "Invalid/User";
					break;
			}
		    
   			$sql_exe_insert=mysqli_query($conn,$insert_query);
   			
		  
		  
		  $code_details= implode(",",$array_list);
		 
		  
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

		     // $new_message1='Stock Updated Successfully';
		    $new_message1="दवाओं के स्टॉक सफलतापूर्वक अपडेट किया गया";
		    $no_charaater1=strlen($new_message1);
		    $api_params1 = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_raise.'&text='.$new_message1.'&route=Informative&type=unicode&datetime='. $datetime.'';
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
// 			                  receive setion asha where indent will         					//
// 																								//
// ///////////////////////////////////////////////////////////////////////////////////////////////

	function asha_received($message1,$mobs){
		global $conn; // connection 
		$message_value=$message1; // original message we received
		$mobs_value=$mobs;	//mobile no 
		
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

		$challan_value=$values;// challan no

		$query_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mobs'";
		$sql_exe=mysqli_query($conn,$query_check);
		$result_fetch=mysqli_fetch_assoc($sql_exe);
		$place_block_dh_id=$result_fetch['place_block_dh_id'];

		
		$challan_no=$challan_value; // challan no
		// $item_details1;// item array
		
		$count_details=count($item_details1);

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
	    	$date=date('Y-m-d');
			$time=date('H:i:s');
	     	$query_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mobs1'";
			$array_list_user_mobile=array();
			$sql_exe=mysqli_query($conn,$query_check);
			$result_fetch=mysqli_fetch_assoc($sql_exe);
			$asha_level=$result_fetch['asha_top_level'];
			$received_no=$mobs1;
			#####################################################################################
			#																					#
			#		Here it will check wheather recevied challan is valid or not 				#
			#																					#
			#####################################################################################
			switch ($asha_level) {
				case '1':
					$check_challan="SELECT * FROM `rhc_master_phc_asha_challan_no` WHERE `challen_no`='$challan_no' and `receiver_place_id`='$received_no' and  `status`='0' or `status`='2' ";					
					break;
				case '2';
					$check_challan="SELECT * FROM `rhc_master_asha_challan_no` WHERE `challen_no`='$challan_no' and `receiver_place_id`='$received_no' and  `status`='0' or `status`='2' ";		
					break;
				case '3':
					$check_challan="SELECT * FROM `rhc_master_aphc_asha_challan_no` WHERE `challen_no`='$challan_no' and `receiver_place_id`='$received_no' and  `status`='0' or `status`='2' ";		
					break;
				case '4':
					$check_challan="SELECT * FROM `rhc_master_asha_challan_no` WHERE `challen_no`='$challan_no' and `receiver_place_id`='$received_no' and  `status`='0' or `status`='2' ";
					break;
				case '6':
					$check_challan="SELECT * FROM `rhc_master_uphc_asha_challan_no` WHERE `challen_no`='$challan_no' and `receiver_place_id`='$received_no' and  `status`='0' or `status`='2' ";
					break;
				default:
					echo "Sorry Entered Challan No Mismatch";
					exit();
					break;


			}
			$sql_exe_check_challan=mysqli_query($conn,$check_challan);
	 		$num_rows=mysqli_num_rows($sql_exe_check_challan);
	 		if(($num_rows!=1) && ($num_rows==0)){
	 			echo "Sorry Entered Challan No Mismatch";
				exit();
	 		}
				#################################################################################
				#																				#
				#						Here SMS group is been Prepared			 				#
				#																				#
				#################################################################################

			switch ($asha_level) {
				#################################################################################
				#																				#
				#				Here Phc asha will intemate what stock is received 				#
				#																				#
				#################################################################################
				case '1':

					$top_place_id=$result_fetch['place_phc_aphc_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$mobs1;
	    			// phc level officer who have act6ived yo received message
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);		
					break;
				#################################################################################
				#																				#
				#		Here Phc-hsc level asha will intemate what stock is received 			#
				#																				#
				#################################################################################

				case '2':

					$top_place_id=$result_fetch['sub_center_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$mobs1;
	    			
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='7' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
			    		$place_phc_aphc_id[]=$res_top_level_mobile['place_phc_aphc_id'];

			 		}
			 		$top_level_mobile4="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$place_phc_aphc_id' and `user_designation`='5' And `status`='1'";
					$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile4);
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);	
					break;
				#################################################################################
				#																				#
				#			Here APhc level asha will intemate what stock is received 			#
				#																				#
				#################################################################################
				case '3':
					$top_place_id=$result_fetch['place_phc_aphc_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$mobs1;	    			
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='6' And `status`='1'";
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);
					break;
				#################################################################################
				#																				#
				#		Here APHC-HSC level asha will intemate what stock is received 			#
				#																				#
				#################################################################################
				case '4':
					$top_place_id=$result_fetch['sub_center_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];	    			
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='8' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
			 			$place_phc_aphc_id[]=$res_top_level_mobile['place_phc_aphc_id'];

			 		}
			 		$top_level_mobile4="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$place_phc_aphc_id' and `user_designation`='5' And `status`='1'";
					$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile4);
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);
					break;
				#################################################################################
				#																				#
				#		Here UPHC-HSC level asha will intemate what stock is received 			#
				#																				#
				#################################################################################
				case '6':
					$top_place_id=$result_fetch['place_block_dh_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$mobs1;	    			
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$top_place_id' and `user_designation`='11' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
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
			  		$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$raise_place_id' and `user_designation`='9' And `status`='1'";
			 		$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
			  		while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
			    // print_r($res);
			   			 $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
			  		}
			   		$mobileno_raise=implode(";",$array_list_raise_user_mobile);
					break;
				default:
					echo "Sorry Entered Challan No Mismatch";
					exit();
					break;
			}
			#############################################################################
			#																			#
			# 		Here stock to respective asha table will be updated according		#
			#																			#
			#############################################################################
			switch ($asha_level) {
				#################################################################################
				#																				#
				#		issued will be received by asha or ann or staff nurch From phc			#
				#																				#
				#################################################################################
				case '1':
					$cat=0;
    				for ($i=0; $i <count($item_code); $i++) { 
						$item_codes=$item_code[$i];
						$item_types=$item_type[$i];
						$item_quantitys=$item_quantity[$i];
	    				$query_get_item_details="SELECT * FROM `rhc_master_phc_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types' And `quantity_issued`='$item_quantitys'	";
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

		    	 			$query_update_item_challan="UPDATE `rhc_master_phc_asha_item_details_challan_no` SET `quantity_received`='$item_quantity_issues',`status`='1' WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types'";
							$sql_exe_update_item=mysqli_query($conn,$query_update_item_challan);
							// get quantity present
							$query_get_item_code_id="SELECT * FROM `rhc_master_stock_asha_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							$sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);	
							$result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);	
							$item_quantityss=$result_detail['item_quantity'];
				 			$cal=$item_quantity_issues+$item_quantityss;
				 			if($cal==0){	
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							}else{
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							}
							$sql_exe_update=mysqli_query($conn,$update);
		    			}
		    			$query_get_item_details1="SELECT * FROM `rhc_master_phc_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' 	";
	    				$sql_exe_get_item_details1=mysqli_query($conn,$query_get_item_details1);
		    			while($res_get_item_details=mysqli_fetch_assoc($sql_exe_get_item_details1)){
		    				// print_r($res_get_item_details);
		    				$item_code=$res_get_item_details['item_code'];
		    				$item_type=$res_get_item_details['item_type'];
		    				$item_batch_id=$res_get_item_details['item_batch_id'];
		    				$batch_id_item_details[]=array('item_batch_id'=>"$item_batch_id",'item_code'=>"$item_code",'item_type'=>"$item_type");
		    			}
		   
			    		for ($i=0; $i <count($batch_id_item_details) ; $i++) { 
			    			$item_codes=$batch_id_item_details[$i]['item_code'];
			    			$item_types=$batch_id_item_details[$i]['item_type'];
			    			$item_batch_ids=$batch_id_item_details[$i]['item_batch_id'];
				    		$query_batch_detail_item_challen="SELECT * FROM `rhc_master_phc_asha_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_ids' and `item_type`='$item_types' and `item_code` ='$item_codes'";
				   			$sql_exe_batch_details=mysqli_query($conn,$query_batch_detail_item_challen);
				    		while ($res_batch_detail=mysqli_fetch_assoc($sql_exe_batch_details)) {
				    	
				    			$item_code=$res_batch_detail['item_code'];
			    				$item_type=$res_batch_detail['item_type'];
			    				$batch_quantity=$res_batch_detail['batch_quantity'];
			    				$batch_no=$res_batch_detail['batch_no'];
			    				$date_expire=$res_batch_detail['date_expire'];

	    						$query_get_item_code_id1="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_place_id`='$receiver_id'";
								$sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
								$result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

								$asha_stock_batch_id=$result_detail1['asha_stock_batch_id'];
								if($batch_no!=0){
									$batch_insert="INSERT INTO `rhc_master_stock_aphc_batch_details`(`slno`, `asha_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `aphc_place_id`) VALUES (NULL,'$asha_stock_batch_id','$batch_no','$date_expire','$batch_quantity','$batch_quantity','1','$date','$time','$receiver_id')";
						
									$sql_exe_batch_insert=mysqli_query($conn,$batch_insert);
								}
				    		}
						}
						$user_id=$mobs_value;
						$quer_challan_update="UPDATE `rhc_master_phc_asha_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1' WHERE `challen_no`='$challan_no'";
						$sql_exe_challan_update=mysqli_query($conn,$quer_challan_update);
					}
	
					break;
				####################################################################################@
				#																					#
				#		issued will be received by asha or ann or staff nurch From phc-hsc			#
				#																					#
				#####################################################################################
				case '2':
					$cat=0;
    				for ($i=0; $i <count($item_code); $i++) { 
						$item_codes=$item_code[$i];
						$item_types=$item_type[$i];
						$item_quantitys=$item_quantity[$i];
	    				$query_get_item_details="SELECT * FROM `rhc_master_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types' And `quantity_issued`='$item_quantitys'	";
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

		    	 			$query_update_item_challan="UPDATE `rhc_master_asha_item_details_challan_no` SET `quantity_received`='$item_quantity_issues',`status`='1' WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types'";
							$sql_exe_update_item=mysqli_query($conn,$query_update_item_challan);
							// get quantity present
							$query_get_item_code_id="SELECT * FROM `rhc_master_stock_asha_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							$sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);	
							$result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);	
							$item_quantityss=$result_detail['item_quantity'];
				 			$cal=$item_quantity_issues+$item_quantityss;
				 			if($cal==0){	
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							}else{
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							}
							$sql_exe_update=mysqli_query($conn,$update);
		    			}
		    			$query_get_item_details1="SELECT * FROM `rhc_master_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' 	";
	    				$sql_exe_get_item_details1=mysqli_query($conn,$query_get_item_details1);
		    			while($res_get_item_details=mysqli_fetch_assoc($sql_exe_get_item_details1)){
		    				// print_r($res_get_item_details);
		    				$item_code=$res_get_item_details['item_code'];
		    				$item_type=$res_get_item_details['item_type'];
		    				$item_batch_id=$res_get_item_details['item_batch_id'];
		    				$batch_id_item_details[]=array('item_batch_id'=>"$item_batch_id",'item_code'=>"$item_code",'item_type'=>"$item_type");
		    			}
		   
			    		for ($i=0; $i <count($batch_id_item_details) ; $i++) { 
			    			$item_codes=$batch_id_item_details[$i]['item_code'];
			    			$item_types=$batch_id_item_details[$i]['item_type'];
			    			$item_batch_ids=$batch_id_item_details[$i]['item_batch_id'];
				    		$query_batch_detail_item_challen="SELECT * FROM `rhc_master_phc_asha_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_ids' and `item_type`='$item_types' and `item_code` ='$item_codes'";
				   			$sql_exe_batch_details=mysqli_query($conn,$query_batch_detail_item_challen);
				    		while ($res_batch_detail=mysqli_fetch_assoc($sql_exe_batch_details)) {
				    	
				    			$item_code=$res_batch_detail['item_code'];
			    				$item_type=$res_batch_detail['item_type'];
			    				$batch_quantity=$res_batch_detail['batch_quantity'];
			    				$batch_no=$res_batch_detail['batch_no'];
			    				$date_expire=$res_batch_detail['date_expire'];

	    						$query_get_item_code_id1="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_place_id`='$receiver_id'";
								$sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
								$result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

								$asha_stock_batch_id=$result_detail1['asha_stock_batch_id'];
								if($batch_no!=0){
									$batch_insert="INSERT INTO `rhc_master_stock_aphc_batch_details`(`slno`, `asha_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `aphc_place_id`) VALUES (NULL,'$asha_stock_batch_id','$batch_no','$date_expire','$batch_quantity','$batch_quantity','1','$date','$time','$receiver_id')";
						
									$sql_exe_batch_insert=mysqli_query($conn,$batch_insert);
								}
				    		}
						}
						$user_id=$mobs_value;
						$quer_challan_update="UPDATE `rhc_master_asha_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1' WHERE `challen_no`='$challan_no'";
						$sql_exe_challan_update=mysqli_query($conn,$quer_challan_update);
					}
					break;
				#################################################################################
				#																				#
				#		issued will be received by asha or ann or staff nurch From aphc			#
				#																				#
				#################################################################################
				case '3':
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
							$query_get_item_code_id="SELECT * FROM `rhc_master_stock_asha_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							$sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);	
							$result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);	
							$item_quantityss=$result_detail['item_quantity'];
				 			$cal=$item_quantity_issues+$item_quantityss;
				 			if($cal==0){	
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							}else{
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
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
		   
			    		for ($i=0; $i <count($batch_id_item_details) ; $i++) { 
			    			$item_codes=$batch_id_item_details[$i]['item_code'];
			    			$item_types=$batch_id_item_details[$i]['item_type'];
			    			$item_batch_ids=$batch_id_item_details[$i]['item_batch_id'];
				    		$query_batch_detail_item_challen="SELECT * FROM `rhc_master_phc_asha_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_ids' and `item_type`='$item_types' and `item_code` ='$item_codes'";
				   			$sql_exe_batch_details=mysqli_query($conn,$query_batch_detail_item_challen);
				    		while ($res_batch_detail=mysqli_fetch_assoc($sql_exe_batch_details)) {
				    	
				    			$item_code=$res_batch_detail['item_code'];
			    				$item_type=$res_batch_detail['item_type'];
			    				$batch_quantity=$res_batch_detail['batch_quantity'];
			    				$batch_no=$res_batch_detail['batch_no'];
			    				$date_expire=$res_batch_detail['date_expire'];

	    						$query_get_item_code_id1="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_place_id`='$receiver_id'";
								$sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
								$result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

								$asha_stock_batch_id=$result_detail1['asha_stock_batch_id'];
								if($batch_no!=0){
									$batch_insert="INSERT INTO `rhc_master_stock_aphc_batch_details`(`slno`, `asha_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `aphc_place_id`) VALUES (NULL,'$asha_stock_batch_id','$batch_no','$date_expire','$batch_quantity','$batch_quantity','1','$date','$time','$receiver_id')";
						
									$sql_exe_batch_insert=mysqli_query($conn,$batch_insert);
								}
				    		}
						}
						$user_id=$mobs_value;
						$quer_challan_update="UPDATE `rhc_master_aphc_asha_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1' WHERE `challen_no`='$challan_no'";
						$sql_exe_challan_update=mysqli_query($conn,$quer_challan_update);
					}
					break;
				#################################################################################
				#																				#
				# 	issued will be received by asha or ann or staff nurch From aphc-hsc	        #
				#																				#
				#################################################################################

				case '4':
					$cat=0;
    				for ($i=0; $i <count($item_code); $i++) { 
						$item_codes=$item_code[$i];
						$item_types=$item_type[$i];
						$item_quantitys=$item_quantity[$i];
	    				$query_get_item_details="SELECT * FROM `rhc_master_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types' And `quantity_issued`='$item_quantitys'	";
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

		    	 			$query_update_item_challan="UPDATE `rhc_master_asha_item_details_challan_no` SET `quantity_received`='$item_quantity_issues',`status`='1' WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types'";
							$sql_exe_update_item=mysqli_query($conn,$query_update_item_challan);
							// get quantity present
							$query_get_item_code_id="SELECT * FROM `rhc_master_stock_asha_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							$sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);	
							$result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);	
							$item_quantityss=$result_detail['item_quantity'];
				 			$cal=$item_quantity_issues+$item_quantityss;
				 			if($cal==0){	
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							}else{
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `asha_place_id`='$receiver_id'";
							}
							$sql_exe_update=mysqli_query($conn,$update);
		    			}
		    			$query_get_item_details1="SELECT * FROM `rhc_master_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' 	";
	    				$sql_exe_get_item_details1=mysqli_query($conn,$query_get_item_details1);
		    			while($res_get_item_details=mysqli_fetch_assoc($sql_exe_get_item_details1)){
		    				// print_r($res_get_item_details);
		    				$item_code=$res_get_item_details['item_code'];
		    				$item_type=$res_get_item_details['item_type'];
		    				$item_batch_id=$res_get_item_details['item_batch_id'];
		    				$batch_id_item_details[]=array('item_batch_id'=>"$item_batch_id",'item_code'=>"$item_code",'item_type'=>"$item_type");
		    			}
		   
			    		for ($i=0; $i <count($batch_id_item_details) ; $i++) { 
			    			$item_codes=$batch_id_item_details[$i]['item_code'];
			    			$item_types=$batch_id_item_details[$i]['item_type'];
			    			$item_batch_ids=$batch_id_item_details[$i]['item_batch_id'];
				    		$query_batch_detail_item_challen="SELECT * FROM `rhc_master_phc_asha_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_ids' and `item_type`='$item_types' and `item_code` ='$item_codes'";
				   			$sql_exe_batch_details=mysqli_query($conn,$query_batch_detail_item_challen);
				    		while ($res_batch_detail=mysqli_fetch_assoc($sql_exe_batch_details)) {
				    	
				    			$item_code=$res_batch_detail['item_code'];
			    				$item_type=$res_batch_detail['item_type'];
			    				$batch_quantity=$res_batch_detail['batch_quantity'];
			    				$batch_no=$res_batch_detail['batch_no'];
			    				$date_expire=$res_batch_detail['date_expire'];

	    						$query_get_item_code_id1="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_place_id`='$receiver_id'";
								$sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
								$result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

								$asha_stock_batch_id=$result_detail1['asha_stock_batch_id'];
								if($batch_no!=0){
									$batch_insert="INSERT INTO `rhc_master_stock_aphc_batch_details`(`slno`, `asha_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `aphc_place_id`) VALUES (NULL,'$asha_stock_batch_id','$batch_no','$date_expire','$batch_quantity','$batch_quantity','1','$date','$time','$receiver_id')";
						
									$sql_exe_batch_insert=mysqli_query($conn,$batch_insert);
								}
				    		}
						}
						$user_id=$mobs_value;
						$quer_challan_update="UPDATE `rhc_master_asha_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1' WHERE `challen_no`='$challan_no'";
						$sql_exe_challan_update=mysqli_query($conn,$quer_challan_update);
					}
					break;
				#################################################################################
				#																				#
				#		issued will be received by asha or ann or staff nurch From uphc			#
				#																				#
				#################################################################################
					case '6':
					$cat=0;
    				for ($i=0; $i <count($item_code); $i++) { 
						$item_codes=$item_code[$i];
						$item_types=$item_type[$i];
						$item_quantitys=$item_quantity[$i];
	    				$query_get_item_details="SELECT * FROM `rhc_master_uphc_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types' And `quantity_issued`='$item_quantitys'	";
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

		    	 			$query_update_item_challan="UPDATE `rhc_master_uphc_asha_item_details_challan_no` SET `quantity_received`='$item_quantity_issues',`status`='1' WHERE `challan_no`='$challan_no' and `item_code`='$item_codes' And `item_type`='$item_types'";
							$sql_exe_update_item=mysqli_query($conn,$query_update_item_challan);
							// get quantity present
							$query_get_item_code_id="SELECT * FROM `rhc_master_stock_uphc_asha_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `uphc_asha_place_id`='$receiver_id'";
							$sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);	
							$result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);	
							$item_quantityss=$result_detail['item_quantity'];
				 			$cal=$item_quantity_issues+$item_quantityss;
				 			if($cal==0){	
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `uphc_asha_place_id`='$receiver_id'";
							}else{
								$update="UPDATE `rhc_master_stock_asha_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `uphc_asha_place_id`='$receiver_id'";
							}
							$sql_exe_update=mysqli_query($conn,$update);
		    			}
		    			$query_get_item_details1="SELECT * FROM `rhc_master_uphc_asha_item_details_challan_no` WHERE `challan_no`='$challan_no' 	";
	    				$sql_exe_get_item_details1=mysqli_query($conn,$query_get_item_details1);
		    			while($res_get_item_details=mysqli_fetch_assoc($sql_exe_get_item_details1)){
		    				// print_r($res_get_item_details);
		    				$item_code=$res_get_item_details['item_code'];
		    				$item_type=$res_get_item_details['item_type'];
		    				$item_batch_id=$res_get_item_details['item_batch_id'];
		    				$batch_id_item_details[]=array('item_batch_id'=>"$item_batch_id",'item_code'=>"$item_code",'item_type'=>"$item_type");
		    			}
		   
			    		for ($i=0; $i <count($batch_id_item_details) ; $i++) { 
			    			$item_codes=$batch_id_item_details[$i]['item_code'];
			    			$item_types=$batch_id_item_details[$i]['item_type'];
			    			$item_batch_ids=$batch_id_item_details[$i]['item_batch_id'];
				    		$query_batch_detail_item_challen="SELECT * FROM `rhc_master_uphc_asha_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_ids' and `item_type`='$item_types' and `item_code` ='$item_codes'";
				   			$sql_exe_batch_details=mysqli_query($conn,$query_batch_detail_item_challen);
				    		while ($res_batch_detail=mysqli_fetch_assoc($sql_exe_batch_details)) {
				    	
				    			$item_code=$res_batch_detail['item_code'];
			    				$item_type=$res_batch_detail['item_type'];
			    				$batch_quantity=$res_batch_detail['batch_quantity'];
			    				$batch_no=$res_batch_detail['batch_no'];
			    				$date_expire=$res_batch_detail['date_expire'];

	    						$query_get_item_code_id1="SELECT * FROM `rhc_master_stock_uphc_asha_items` WHERE `item_types`='$item_types' and `item_codes`='$item_codes' and `aphc_place_id`='$receiver_id'";
								$sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
								$result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

								$asha_stock_batch_id=$result_detail1['uphc_asha_stock_batch_id'];
								if($batch_no!=0){
									$batch_insert="INSERT INTO `rhc_master_stock_uphc_asha_batch_details`(`slno`, `uphc_asha_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `uphc_asha_place_id`) VALUES (NULL,'$asha_stock_batch_id','$batch_no','$date_expire','$batch_quantity','$batch_quantity','1','$date','$time','$receiver_id')";
						
									$sql_exe_batch_insert=mysqli_query($conn,$batch_insert);
								}
				    		}
						}
						$user_id=$mobs_value;
						$quer_challan_update="UPDATE `rhc_master_uphc_asha_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1' WHERE `challen_no`='$challan_no'";
						$sql_exe_challan_update=mysqli_query($conn,$quer_challan_update);
					}
					break;
				default:
					echo "Invalid/User";
					break;
			}
			$code_details= implode(",",$array_list);
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

	

			// receive server response ...
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	 			$server_output = curl_exec ($ch);

				curl_close ($ch);			
				if($server_output){
					$datetime=date('Y-m-d H:i:s');
	 				// $mobileno=$result_fetch1['user_mobile'];

		 			// $new_message1='Receipt Confirmation Sent Success-fully'.$datetime;

		 			$new_message1="रसीद पुष्टि सफलतापूर्वक भेजा".$datetime;

	 				$no_charaater1=strlen($new_message1);
					$api_params1 = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_raise.'&text='.$new_message1.'&route=Informative&type=unicode&datetime='. $datetime.'';
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