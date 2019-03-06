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


	$get_checked="SELECT * FROM `ilab_login_paid` WHERE `paid_application`='0'";
	$sql_check_paid=mysqli_query($conn,$get_checked);
	$total=$NUM_PAID=mysqli_num_rows($sql_check_paid);
	if($NUM_PAID!="0"){
	    	while($res_check_paid=mysqli_fetch_assoc($sql_check_paid)){
	    		// print_r($res_check_paid);
	    		$i++;	
	    		// Array ( [slno_L] => 1 [slno_L_ID] => 18 [mobile_no_L] => 9614655935 [date] => 2018-02-16 [time] => 12:32:07 [status] => 1 [basic_status] => 1 [complete_status] => 1 [paid_status_check] => 1 [password] => 9451760 [paid_application] => 0 )
	    		
	    		$mobile_no_L=$res_check_paid['mobile_no_L'];
	    		$slno_L=$res_check_paid['slno_L'];


	    		$get_application="SELECT * FROM `application_form` WHERE `candidate_mobile`='$mobile_no_L' and `paid_status`='0'";
	    		$sql_get_application=mysqli_query($conn,$get_application);

	    		$num_row=mysqli_num_rows($sql_get_application);
	    		if($num_row==1){
	    			$get_application_fetch=mysqli_fetch_assoc($sql_get_application);
	    			
	    		
	    			$slno=mysqli_real_escape_string($conn,trim($get_application_fetch['slno']));
					$candidate_name=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_name']));
					$application_no=mysqli_real_escape_string($conn,trim($get_application_fetch['application_no']));
					$candidate_mobile=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_mobile']));
					$candidate_photo=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_photo']));
					$candidate_father_name=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_father_name']));
					$candidate_marital_status=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_marital_status']));
					$candidate_husband_name=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_husband_name']));
					$candidate_dob=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_dob']));
					$candidate_present_address=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_present_address']));
					$candidate_permanent_address=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_permanent_address']));
					$candidate_qualification=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_qualification']));
					$candidate_driving_licence_no_status=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_driving_licence_no_status']));
					$candidate_driving_licence_no=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_driving_licence_no']));
					$candidate_belongs_cat=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_belongs_cat']));
					$candidate_gender=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_gender']));
					$candidate_category=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_category']));
					$candidate_bpl_card_no=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_bpl_card_no']));
					$pwd_card_no=mysqli_real_escape_string($conn,trim($get_application_fetch['pwd_card_no']));
					$candidate_unmaried_certificate_no_status=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_unmaried_certificate_no_status']));
					$candidate_marital_status_SSC=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_marital_status_SSC']));
					$candidate_husbands_SSC=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_husbands_SSC']));
					$candidate_divorce_certificate_status=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_divorce_certificate_status']));
					$candidate_divorce_certificate=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_divorce_certificate']));
					$Employment_status=mysqli_real_escape_string($conn,trim($get_application_fetch['Employment_status']));
					$candidate_certificate_cat=mysqli_real_escape_string($conn,trim($get_application_fetch['candidate_certificate_cat']));
					$employment_card_no=mysqli_real_escape_string($conn,trim($get_application_fetch['employment_card_no']));
					$applying_post_for=mysqli_real_escape_string($conn,trim($get_application_fetch['applying_post_for']));
					$sikkim_subject_no_status=mysqli_real_escape_string($conn,trim($get_application_fetch['sikkim_subject_no_status']));
					$sikkim_subject_no=mysqli_real_escape_string($conn,trim($get_application_fetch['sikkim_subject_no']));
					$exam_price=mysqli_real_escape_string($conn,trim($get_application_fetch['exam_price']));
					$date=mysqli_real_escape_string($conn,trim($get_application_fetch['date']));
					$time=mysqli_real_escape_string($conn,trim($get_application_fetch['time']));
					$signature_FILE=mysqli_real_escape_string($conn,trim($get_application_fetch['signature_FILE']));
					$diploma_status=mysqli_real_escape_string($conn,trim($get_application_fetch['diploma_status']));
					$spae_status=mysqli_real_escape_string($conn,trim($get_application_fetch['spae_status']));
					$spae_no=mysqli_real_escape_string($conn,trim($get_application_fetch['spae_no']));
					$preference_one=mysqli_real_escape_string($conn,trim($get_application_fetch['preference_one']));
					$preference_two=mysqli_real_escape_string($conn,trim($get_application_fetch['preference_two']));
					$iti_certificate_no=mysqli_real_escape_string($conn,trim($get_application_fetch['iti_certificate_no']));
					$paid_status =mysqli_real_escape_string($conn,trim($get_application_fetch['paid_status']));

					 $insert="INSERT INTO `application_form_paid`(`slno`, `slno_id`, `candidate_name`, `application_no`, `candidate_mobile`, `candidate_photo`, `candidate_father_name`, `candidate_marital_status`, `candidate_husband_name`, `candidate_dob`, `candidate_present_address`, `candidate_permanent_address`, `candidate_qualification`, `candidate_driving_licence_no_status`, `candidate_driving_licence_no`, `candidate_belongs_cat`, `candidate_gender`, `candidate_category`, `candidate_bpl_card_no`, `pwd_card_no`, `pwd_name_id`, `candidate_unmaried_certificate_no_status`, `candidate_unmaried_certificate_no`, `candidate_marital_status_SSC`, `candidate_husbands_SSC`, `candidate_divorce_certificate_status`, `candidate_divorce_certificate`, `Employment_status`, `candidate_certificate_cat`, `employment_card_no`, `applying_post_for`, `sikkim_subject_no_status`, `sikkim_subject_no`, `exam_price`, `date`, `time`, `signature_FILE`, `c_age`, `diploma_status`, `spae_status`, `spae_no`, `preference_one`, `preference_two`, `iti_certificate_no`) VALUES (NULL,'$slno','$candidate_name','$application_no','$candidate_mobile','$candidate_photo','$candidate_father_name','$candidate_marital_status','$candidate_husband_name','$candidate_dob','$candidate_present_address','$candidate_permanent_address','$candidate_qualification','$candidate_driving_licence_no_status','$candidate_driving_licence_no','$candidate_belongs_cat','$candidate_gender','$candidate_category','$candidate_bpl_card_no','$pwd_card_no','$pwd_name_id','$candidate_unmaried_certificate_no_status','$candidate_unmaried_certificate_no','$candidate_marital_status_SSC','$candidate_husbands_SSC','$candidate_divorce_certificate_status','$candidate_divorce_certificate','$Employment_status','$candidate_certificate_cat','$employment_card_no','$applying_post_for','$sikkim_subject_no_status','$sikkim_subject_no','$exam_price','$date','$time','$signature_FILE','$c_age','$diploma_status','$spae_status','$spae_no','$preference_one','$preference_two','$iti_certificate_no')";
					
					if(mysqli_query($conn,$insert)){

						$update="UPDATE `application_form` SET `paid_status`='1' WHERE `slno`='$slno'";
						mysqli_query($conn,$update);

						$update_group_paid="UPDATE `ilab_login_paid` SET `paid_application`='1' WHERE`slno_L`='$slno_L'";
	    				mysqli_query($conn,$update_group_paid);

	    				echo '<script language="javascript">
				    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-image:url(pbar-ani.gif);\">&nbsp;</div>";
				    document.getElementById("information").innerHTML="'.$i.' to '.$total.' row(s) processed.";
				    </script>';

				// This is for the buffer achieve the minimum size in order to flush data
				    echo str_repeat(' ',1024*64);

				    
				// Send output to browser immediately
				    flush();
				}else{
					echo mysqli_error($conn);
					exit; 
				}


	    			
	    		}
	    		// echo  $mobile_no_L."=>".$num_row."<br>";
	    	}
			echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
		
		$msg->success('Successfull Filter Candidate for Aoplication Form  ');	
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

