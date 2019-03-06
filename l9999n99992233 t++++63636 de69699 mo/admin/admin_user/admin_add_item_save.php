<?php
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
    // print_r($_POST);
	// Array ( [model_no] => md2 [primary_code] => PscW [secondary_code] => Pcdr [item_name] => Brake Shoe [category_name] => 2 [manufacture_name] => USHA [brand_name] => Sipra ) 
 	// here information is received 
 	$model_no=$_POST['model_no'];
 	$item_primary_code=strtolower($_POST['primary_code']);
 	$item_category_id=strtolower($_POST['category_name']);
 	$item_second_code=strtolower($_POST['secondary_code']);
 	$item_name=$_POST['item_name'];
 	$manufacture_name=$_POST['manufacture_name'];
 	$brand_name=$_POST['brand_name'];
 	$hsn_code=$_POST['hsn_code'];
 	$name_unit=$_POST['name_unit'];
    // $machine_mfg_date=date('Y-m-d',strtotime(trim($_POST['machine_Mfg'])));
    // $machine_commissioning=date('Y-m-d',strtotime(trim($_POST['machine_commission'])));
 	$date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s'); // default time in online server
 	 
 	// check unique no
 	$check="SELECT * from `lt_master_item_detail` where `item_primary_code`='$item_primary_code' or `item_second_code`='$item_second_code' ";
    $sql_check=mysqli_query($conn,$check);
    $num=mysqli_num_rows($sql_check); // check it number rows is affected 

   	if ($num==0){
 	    $query_insert="INSERT INTO `lt_master_item_detail`(`slno`,`item_primary_code`,`item_category_id`,`item_second_code`,`item_name`,`manufacture_name`, `brand_name`,`hsn_code`,`date`,`time`,`it_de_unit_m`) VALUES (Null,'$item_primary_code','$item_category_id','$item_second_code','$item_name','$manufacture_name','$brand_name','$hsn_code','$date','$time','$name_unit')";
 	    // execute query
	 	$sql_insert=mysqli_query($conn,$query_insert);
	 	 
	 	 $last_id=mysqli_insert_id($conn);
	 	 if($model_no=="preetish"){
   				$query_view = "SELECT  * FROM `lt_master_machine_model_no` where `status`='1'";
	            $exe_vieew = mysqli_query($conn,$query_view);
	                				                
	            while($rec = mysqli_fetch_assoc($exe_vieew)){
	            	$model_no=$rec['model_id'];
	            	$check_model="SELECT * FROM `lt_master_model_item_detail` WHERE `i_item_slno`='$last_id' and `i_model_id`='$model_no'";
			   		$sql_check_MODEL=mysqli_query($conn,$check_model);
			   		$num_check=mysqli_num_rows($sql_check_MODEL); // check it number rows is affected 
			   		if($num_check=="0"){ // IF IT DOES NOT FIND ANY ROW AFFECTED THEN IT WILL WORK FOR STORING INFORMATION IN MODEL TABLE 
			   			$query_insert_model="INSERT INTO `lt_master_model_item_detail`(`i_slno`, `i_item_slno`, `i_model_id`, `item_name`, `item_primary_code`, `item_second_code`, `item_category_id`, `status`, `date`, `time`,`it_de_unit`) VALUES (Null,'$last_id','$model_no','$item_name','$item_primary_code','$item_second_code','$item_category_id','1','$date','$time','$name_unit')";
			   			$sql_insert=mysqli_query($conn,$query_insert_model);
			   		}

	            }
	            $msg->success('Successfull Material Details Are Stored In our record');
				 	header('Location:admin_add_item.php');
					exit;

   			}else{
 				// findind last inserted query
		 		 $query_insert_model="INSERT INTO `lt_master_model_item_detail`(`i_slno`, `i_item_slno`, `i_model_id`, `item_name`, `item_primary_code`, `item_second_code`, `item_category_id`, `status`, `date`, `time`,`it_de_unit`) VALUES (Null,'$last_id','$model_no','$item_name','$item_primary_code','$item_second_code','$item_category_id','1','$date','$time','$name_unit')";
		 	 	$sql_insert=mysqli_query($conn,$query_insert_model);
	 		}
		 	 $msg->success('Successfull Material Details Are Stored In our record');
		 	header('Location:admin_add_item.php');
			exit;

   	}else if ($num==1) { // HERE IT CHECK WHEATHER MATERIAL IS MULTIPULE SO TRY ANOTHER 
   		$res=mysqli_fetch_assoc($sql_check);
   		$last_id=$res['slno'];	// HERE IS MASTER SERIAL GOT THEN IT IS CHECKED AND STORED IN MODEL MATERIAL TABLE
   		$item_primary_codes=$res['item_primary_code'];
   		$item_second_codes=$res['item_second_code'];
   		if($item_primary_codes==$item_primary_code && $item_second_codes==$item_second_code){
   			if($model_no=="preetish"){
   				$query_view = "SELECT  * FROM `lt_master_machine_model_no` where `status`='1'";
	            $exe_vieew = mysqli_query($conn,$query_view);
	                				                
	            while($rec = mysqli_fetch_assoc($exe_vieew)){
	            	$model_no=$rec['model_id'];
	            	$check_model="SELECT * FROM `lt_master_model_item_detail` WHERE `i_item_slno`='$last_id' and `i_model_id`='$model_no'";
			   		$sql_check_MODEL=mysqli_query($conn,$check_model);
			   		$num_check=mysqli_num_rows($sql_check_MODEL); // check it number rows is affected 
			   		if($num_check=="0"){ // IF IT DOES NOT FIND ANY ROW AFFECTED THEN IT WILL WORK FOR STORING INFORMATION IN MODEL TABLE 
			   			$query_insert_model="INSERT INTO `lt_master_model_item_detail`(`i_slno`, `i_item_slno`, `i_model_id`, `item_name`, `item_primary_code`, `item_second_code`, `item_category_id`, `status`, `date`, `time`,`it_de_unit`) VALUES (Null,'$last_id','$model_no','$item_name','$item_primary_code','$item_second_code','$item_category_id','1','$date','$time','$name_unit')";
			   			$sql_insert=mysqli_query($conn,$query_insert_model);
			   		}

	            }
	            $msg->success('Successfull Material Details Are Stored In our record');
				 	header('Location:admin_add_item.php');
					exit;

   			}else{


		   		$check_model="SELECT * FROM `lt_master_model_item_detail` WHERE `i_item_slno`='$last_id' and `i_model_id`='$model_no'";
		   		$sql_check_MODEL=mysqli_query($conn,$check_model);
		   		$num_check=mysqli_num_rows($sql_check_MODEL); // check it number rows is affected 
		   		if($num_check=="0"){ // IF IT DOES NOT FIND ANY ROW AFFECTED THEN IT WILL WORK FOR STORING INFORMATION IN MODEL TABLE 
		   			$query_insert_model="INSERT INTO `lt_master_model_item_detail`(`i_slno`, `i_item_slno`, `i_model_id`, `item_name`, `item_primary_code`, `item_second_code`, `item_category_id`, `status`, `date`, `time`,`it_de_unit`) VALUES (Null,'$last_id','$model_no','$item_name','$item_primary_code','$item_second_code','$item_category_id','1','$date','$time','$name_unit')";
		   			$sql_insert=mysqli_query($conn,$query_insert_model);
		   			unset($_POST);
		   			$msg->success('Successfull Material Details Are Stored In our record');
				 	header('Location:admin_add_item.php');
					exit;
		   		}else{
		   			unset($_POST);
		   			$msg->error('Materials is record as model no is present ');
		 	    	header('Location:admin_add_item.php');
			    	exit; 
		   		}
		   	}

	   	}else{
	   		unset($_POST);
	   		$msg->error('Material Primary Code And Secondary Code Mis-Match');
	 	    header('Location:admin_add_item.php');
		    exit; 
	   	}

 	}else{
 		unset($_POST);
 		$msg->error('Some Error went !!!');
 	    header('Location:admin_add_item.php');
	    exit;
 	}
 // insert query    
}else{
	unset($_POST);
	header('Location:logout.php');
	exit;
}


?>



