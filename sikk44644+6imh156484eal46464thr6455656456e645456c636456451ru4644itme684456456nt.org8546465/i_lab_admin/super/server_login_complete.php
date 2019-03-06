<?php
session_start();
if($_SESSION['admin_tech']){
require '../config.php';
	$get_mobile="SELECT * FROM ilab_login as login INNER JOIN application_form as form ON login.mobile_no_L=form.candidate_mobile where login.status='1' AND login.basic_status='1' and login.complete_status='1'";
	$sql_exe_get_mobile=mysqli_query($conn,$get_mobile);
	$x=0;
	while ($get_mobile_fetch=mysqli_fetch_assoc($sql_exe_get_mobile)) {
		$x++;
		$data[]= array($x,"[".$get_mobile_fetch['slno']."][".$get_mobile_fetch['slno_L']."]",$get_mobile_fetch['candidate_name'],$get_mobile_fetch['candidate_mobile'],$get_mobile_fetch['application_no'],$get_mobile_fetch['sikkim_subject_no'],$get_mobile_fetch['date'],$get_mobile_fetch['time'],"<a href='admin_candidate_appl_form_view_details?slno=".$get_mobile_fetch['slno']."' class='btn btn-success'>View</a> || <a href='admin_candidate_appl_form_edit_details?slno=".$get_mobile_fetch['slno']."' class='btn btn-success'>Edit</a>");



	}
	$results = array(
		"sEcho" => 1,
		"iTotalRecords" => count($data),
		"iTotalDisplayRecords" => count($data),
		"aaData"=>$data);
	echo json_encode($results);
}else{
	header('Location:logout');
	exit;
}