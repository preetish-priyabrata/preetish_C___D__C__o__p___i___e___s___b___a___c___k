<?php
session_start();
if($_SESSION['user_no']){
include'config.php';
 require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();


//print_r($_FILES);
$file_name=date('y-m-d').date('H:i:s').$_FILES['candidate_photo']['name'];
if(isset($_POST['submit'])){
$candidate_name=$_POST['candidate_name'];
$candidate_father_name=$_POST['candidate_father_name'];
$candidate_husband_name=$_POST['candidate_husband_name'];
$candidate_dob=$_POST['candidate_dob'];
$candidate_present_address=$_POST['candidate_present_address'];
$candidate_permanent_address=$_POST['candidate_permanent_address'];
$candidate_qualification=$_POST['candidate_qualification'];
$candidate_driving_licence_no=$_POST['candidate_driving_licence_no'];
$candidate_belongs_cat=implode(',', $_POST['candidate_belongs_cat']);
$candidate_gender=$_POST['candidate_gender'];
$candidate_category=implode(',', $_POST['candidate_category']);
$candidate_bpl_card_no=$_POST['candidate_bpl_card_no'];
$cadidate_bpl_category_list=implode(',', $_POST['cadidate_bpl_category_list']);
$candidate_unmaried_certificate_no=$_POST['candidate_unmaried_certificate_no'];
$candidate_husbands_SSC=$_POST['candidate_husbands_SSC'];
$candidate_devorce_certificate=$_POST['candidate_devorce_certificate'];
$candidate_category_certificate_no=$_POST['candidate_category_certificate_no'];
$employment_card_no=$_POST['employment_card_no'];
$sikkim_subject_no=$_POST['sikkim_subject_no'];
$date=date('y-m-d');
$time=date('H:i:s');

//$photo=$_POST['img'];
$dest="image/";
if(!empty($_FILES['candidate_photo']['name']))
{
	 $file_name=date('y-m-d').date('H:i:s').$_FILES['candidate_photo']['name'];

	if(move_uploaded_file($_FILES['candidate_photo']['tmp_name'],"$dest".$file_name))
	{
		$insert_query="INSERT INTO `application_form`(`slno`, `candidate_name`, `candidate_photo`, `candidate_father_name`, `candidate_husband_name`, `candidate_dob`, `candidate_present_address`, `candidate_permanent_address`, `candidate_qualification`, `candidate_driving_licence_no`, `candidate_belongs_cat`, `candidate_gender`, `candidate_category`, `candidate_bpl_card_no`, `cadidate_bpl_category_list`, `candidate_unmaried_certificate_no`, `candidate_husbands_SSC`, `candidate_devorce_certificate`, `candidate_category_certificate_no`, `employment_card_no`, `sikkim_subject_no`, `date`, `time`) VALUES (NULL,'$candidate_name','$file_name','$candidate_father_name','$candidate_husband_name','$candidate_dob','$candidate_present_address','$candidate_permanent_address','$candidate_qualification','$candidate_driving_licence_no','$candidate_belongs_cat','$candidate_gender','$candidate_category','$candidate_bpl_card_no','$cadidate_bpl_category_list','$candidate_unmaried_certificate_no','$candidate_husbands_SSC','$candidate_devorce_certificate','$candidate_category_certificate_no','$employment_card_no','$sikkim_subject_no','$date','$time')";
		//echo $insert_query;

		$sql_exe=mysqli_query($conn,$insert_query);
		//echo mysqli_error($conn);
				if($sql_exe)
				{
					$msg->success('Candidate Information Successsfully Save In our Registered');
					header('Location:user_dashboard.php');
					exit;
				}
				else
				{
					$msg->error('Please Fill Details ');
					header('Location:basic_registration.php');
					exit;

		        }
	}
	else
    {
       $msg->error('Upload Failed');
		header('Location:basic_registration.php');
		exit;
	}
	
	
}else{
	$msg->error('Please Attach Photo');
		header('Location:basic_registration.php');
		exit;
   }

}else{
	$msg->error('Ivalid Submition');
		header('Location:logout.php');
		exit;
   }

 

}else{
	$msg->error('Ivalid Submition');
		header('Location:logout.php');
		exit;
}