<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['admintech_exam'])
{
if($_POST['email']){
	$email=trim($_POST['email']);
	$usertype=trim($_POST['usertype']);
			$qry_chkmail="SELECT * FROM `user_master_data` WHERE `user_email`='$email' and `usertype`='$usertype'  ";
			$sql=mysqli_query($conn, $qry_chkmail);
			$num_rows=mysqli_num_rows($sql);
			if($num_rows=="0"){
				echo "1";
				return;
			}else{
				echo "2";
				return;
			}			
		}else{
			echo "0";
			return;
		}

}
ob_clean();
?>