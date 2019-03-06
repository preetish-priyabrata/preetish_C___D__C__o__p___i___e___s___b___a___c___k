<?php
// print_r($_POST);
session_start();
if($_SESSION['admin_preexam']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();

$exam_name=trim($_POST['class_name']);
$total_seat=trim($_POST['total_seat']);
$Center_Address=trim($_POST['Center_Address']);
$Contact_name=trim($_POST['Contact_name']);
$Contact_no=trim($_POST['Contact_no']);
$slno_exam=$_POST['slno_exam'];
$date=date('Y-m-d');
$time=date('h:i:s');

// Array ( [class_name] => test 111 [total_seat] => 33111 [Center_Address] => Address: Nandankanan Rd, Near Tech Mahindra, Chandrasekharpur, Bhubaneswar, Odisha 751023 Phone: 0674 230 327611 [Contact_name] => Kumar singh [Contact_no] => 943707212811 ) UPDATE `ilab_exam_center` SET `total_seat`='33111',`exam_name`='test 111',`Center_Address`='Address: Nandankanan Rd, Near Tech Mahindra, Chandrasekharpur, Bhubaneswar, Odisha 751023 Phone: 0674 230 327611',`Contact_name`='Kumar singh',`Contact_no`='943707212811',`date`='2018-02-01',`time`='04:13:13' WHERE `slno_exam`='1'

$update="UPDATE `ilab_exam_center` SET `total_seat`='$total_seat',`exam_name`='$exam_name',`Center_Address`='$Center_Address',`Contact_name`='$Contact_name',`Contact_no`='$Contact_no',`date`='$date',`time`='$time' WHERE `slno_exam`='$slno_exam'";

$sql_insert=mysqli_query($conn,$update);
// echo mysqli_error($conn);
// exit;
$msg->success('Exam Name Edit Sucessfully');
	 	header('Location:index');
		exit;

}else{
	header('Location:logout');
	exit;
}
