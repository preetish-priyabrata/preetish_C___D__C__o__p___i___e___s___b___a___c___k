<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_POST['app_nos'] && $_POST['app_nos']!="" && $_POST['app_dobs'] && $_POST['app_dobs']!="" ){

	$app_nos=trim($_POST['app_nos']);
	$app_dobs=trim($_POST['app_dobs']);
			$qry_chkmail="SELECT * FROM `candidate_personal_details` WHERE `application_no`='$app_nos' AND `dob`='$app_dobs'";
			$sql=mysqli_query($conn, $qry_chkmail);
			$num_rows=mysqli_num_rows($sql);
			if($num_rows!="0"){
				$qry_appliction_info="SELECT * FROM `candidate_application_info` WHERE `application_submitted`='yes' AND `application_no`='$app_nos'";	
				$sql_info=mysqli_query($conn, $qry_appliction_info);
				$num_rows_info=mysqli_num_rows($sql_info);
				if($num_rows_info=="0"){
					echo "3";
					return;
				}else{
					$sql_query_fetch=mysqli_fetch_array($sql_info);
					if($sql_query_fetch['application_verification_officer']=="0"){
						echo "4";
						return;
					}
					if($sql_query_fetch['application_verification_officer']=="1"){
						echo "1";
						return;
					}
					if($sql_query_fetch['application_verification_officer']=="2"){
						echo "5";
						return;
					}
					if($sql_query_fetch['application_verification_officer']=="3"){
						echo "6";
						return;
					}
				}
				
			}else{
				echo "2";
				return;
			}			
		}else{
			echo "0";
			return;
		}


ob_clean();
?>
