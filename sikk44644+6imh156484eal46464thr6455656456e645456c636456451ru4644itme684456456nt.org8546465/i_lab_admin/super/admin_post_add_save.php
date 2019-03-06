<?php
print_r($_POST);
exit;
session_start();
if($_SESSION['admin_tech']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// Array ( [hq_name] => Kansbahal ) 
 	// here information is received 
//  	Array ( [post_name] => Peon [price_detail] => 100 [post_code] => PB-1 [] =>
// •No. of Vacancies: 133
// •Pay Scale: Rs. 41,155-63,600
 
// Job Location: Gangtok
// Eligibility Criteria :
// Educational Qualification: Candidates should have passed Class 4.
// Age Limit (as on 01-01-2018): Minimum 18 years and Maximum 44 years
// Age Relaxation:
// Sr. No. 	Category of Candidates 	Relaxation of Age Permissible
// 1. 	SC/ST Candidates 	05 Years
// 2. 	BC Candidates 	03 Years
// 3. 	PH Candidates 	10 Years
// Selection Process: Selection of candidates will be made on the basis of Written Examination and Viva.
// Application Fee: General/UR/OBC candidates have to pay Rs. 100 (Online Application Processing Fee) and Rs. 120 (Examination Fee) through online mode using Net-banking/Credit or Debit Card.
// Important Dates:
// • Starting Date of Online Application: 02-02-2018
// • Last Date of Online Application: 28-02-2018
// • Date of Examination: 03-03-2018
// // [Starting_date] => 02/01/2018 [] => 02/28/2018 ) 
//  	price_detail
//  	editor
//  	Starting_date
//  	ending_date

 	$post_name=mysqli_real_escape_string($conn,strtolower($_POST['post_name']));
 	$price_detail=$_POST['price_detail'];
 	$date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s');// default time in online server


    $query_check="SELECT * FROM `ilab_post` WHERE `post_name`='$post_name'";
    $query_exe=mysqli_query($conn,$query_check);
    $num=mysqli_num_rows($query_exe);

    if($num==0) {
	 	// insert query 
	 	 $query_insert="INSERT INTO `ilab_post`(`slno_post`, `post_name`,`price_detail`, `status`, `date`, `time`) VALUES (Null,'$post_name','$price_detail','1','$date','$time')";
	 	
	 	$sql_insert=mysqli_query($conn,$query_insert);
	 	// execute query
	 	
	 	 $last_id=mysqli_insert_id($conn);
	 	// findind last inserted query
	 	 $post_id="Post00".$last_id;
	 	
	 	//here combination of our short code designed 

	 	// updated query insert in headquarter 
	 	$query_update="UPDATE `ilab_post` SET `post_id`='$post_id' WHERE `slno_post`='$last_id'";
	 	$sql_update=mysqli_query($conn,$query_update);

	 	// here success message is send 
	 	$msg->success('Successfull Post Is stored In our record');
	 	header('Location:admin_dashboard.php');
		exit;
	}else{
	    $msg->error('Post name is already present in our record');
	 	header('Location:admin_dashboard.php');
		exit;

	}

}else{
	header('Location:logout.php');
	exit;
}


?>