<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_POST['category_name']!="" && $_POST['category_name']){
mysqli_query($conn,'TRUNCATE TABLE post_exam_temp_rank');	
$qry_no_app="SELECT * FROM `postexam_publish_result` WHERE `exam_name`='$_POST[exam]' AND `category_name`='$_POST[category_name]' ";
	
	$sql_no_app=mysqli_query($conn, $qry_no_app);
	while ($res=mysqli_fetch_assoc($sql_no_app)) {
		$qry_insert="INSERT INTO `post_exam_temp_rank`(`slno`, `roll_no`, `application_no`, `exam_name`, `marks`,`category_name`) VALUES (NULL,'$res[roll_no]','$res[application_no]','$_POST[exam]', '$res[mark]','$res[category_name]')";
			$sql=mysqli_query($conn, $qry_insert);
	}
	$sql_qry_rank="SELECT roll_no, application_no, marks, FIND_IN_SET( marks, (SELECT GROUP_CONCAT( marks ORDER BY marks DESC ) FROM post_exam_temp_rank)) AS rank FROM post_exam_temp_rank";
	$sql_rank=mysqli_query($conn, $sql_qry_rank);
	
	while ($res_rank=mysqli_fetch_assoc($sql_rank)) {
		$qry_update_rank="UPDATE `post_exam_temp_rank` SET `ranks`='$res_rank[rank]'WHERE `application_no`='$res_rank[application_no]' and `roll_no`='$res_rank[roll_no]'";	
	$res= mysqli_query($conn, $qry_update_rank);
	}
	$qry_no_apps="SELECT * FROM `post_exam_temp_rank`  WHERE `ranks`<='$_POST[rank]' ";
	
	$sql_no_apps=mysqli_query($conn, $qry_no_apps);
	$num_no_apps=mysqli_num_rows($sql_no_apps);
	echo $num_no_apps;
	
	return;
}else{
	echo "0";
	return;
}