<?php
$query_check="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mobs1'";

			$sql_exe=mysqli_query($conn,$query_check);
			$result_fetch=mysqli_fetch_assoc($sql_exe);
			$asha_level=$result_fetch['asha_top_level'];
			switch ($asha_level) {
				case '1':
					$top_place_id=$result_fetch['place_phc_aphc_id'];
	    	 		$raise_place_id=$mobs1;
	    			$user=$result_fetch['user_id'];
	    			
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$top_place_id' and `user_designation`='5' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
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
	    			
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='7' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
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
	    			
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='7' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
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
			  		$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$top_place_id' and `user_designation`='8' And `status`='1'";
			 		$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
			  		while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
			    // print_r($res);
			    		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
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