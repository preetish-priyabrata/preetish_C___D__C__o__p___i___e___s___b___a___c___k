<?php
error_reporting(0);
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['verification_exam']){
	if(isset($_POST['login'])){
		
		//Array ( [application_no] => 632978 [personal] => 1 [emailid] => abinash2@gmail.com [login] => personal_info_verified ) 
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `application_no`='$_REQUEST[application_no]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
        $res_check_status=mysqli_fetch_array($sql_check_status);
        $row_no=mysqli_num_rows($sql_check_status);
        if($row_no!=0){
        	if($res_check_status['personal_info_status']=="1"){
        		$msg->success('Personal Section Is Verified Success-Fully');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Personal");
        		exit;
        	}else{
        		
        		$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_personal_details` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
				$sql_check=mysqli_query($conn, $qry_check);
        		$res_check=mysqli_fetch_array($sql_check);
       			$row_no_check=mysqli_num_rows($sql_check);
        	
	        	if($row_no_check!=0){
	        		$qry="UPDATE `candidate_application_verification_info` SET `personal_info_status`='1',`candidate_email`= '$_POST[emailid]' WHERE `application_no`='$_REQUEST[application_no]'";
	        		$res= mysqli_query($conn, $qry);
					if($res){
						$qry_submit_status="UPDATE `candidate_personal_details` SET `personal_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
						$res_status=mysqli_query($conn, $qry_submit_status);
						if($res_status){
							$msg->success('Personal Section Is Verified Success-Fully');
							//view_application.php?appno=<?php echo $res["application_no"];
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Personal");
							exit();					
				
						}else{
							$msg->warning('Unable To Verify Personal Section This Application Some Error Occurs !!!');
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Personal");
							exit;
						
						}
					}
	        		
	        	}else{
	        		$msg->warning('Unable To Verify This Application !!!');
	        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Personal");
	        		exit;
	        	}
        	}
        }else{
        	$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_personal_details` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
		$sql_check=mysqli_query($conn, $qry_check);
        $res_check=mysqli_fetch_array($sql_check);
        $row_no_check=mysqli_num_rows($sql_check);
        	
        	if($row_no_check!=0){
        		$qry="INSERT INTO `candidate_application_verification_info`(`slno`, `application_no`,`candidate_email`,`personal_info_status`) VALUES (NULL, '$_POST[application_no]' ,'$_POST[emailid]','1')";
        		$res= mysqli_query($conn, $qry);
				if($res){
					$qry_submit_status="UPDATE `candidate_personal_details` SET `personal_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
					$res_status=mysqli_query($conn, $qry_submit_status);
					if($res_status){
						$msg->success('Personal Section Is Verified Success-Fully');
						//view_application.php?appno=<?php echo $res["application_no"];
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Personal");
						exit;
							
					}else{
						$msg->warning('Unable To Verify Personal Section This Application Some Error Occurs !!!');
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Personal");
						exit;
					
					}
				}
        		
        	}else{
        		$msg->warning('Unable To Verify This Application !!!');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Personal");
        		exit;
        	}
   //      
        }
	}
/**
 * Array ( [application_no] => 632978 [educational] => 2 [education] => personal_info_verified ) 
 */
	if(isset($_POST['education'])){
		//Array ( [application_no] => 632978 [personal] => 1 [emailid] => abinash2@gmail.com [login] => personal_info_verified ) 
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `application_no`='$_REQUEST[application_no]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
        $res_check_status=mysqli_fetch_array($sql_check_status);
        $row_no=mysqli_num_rows($sql_check_status);
        if($row_no!=0){
        	if($res_check_status['educational_info_status']=="1"){
        		$msg->success('Educational Section Is Verified Success-Fully');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Educational");
        		exit;
        	}else{
        		
        		$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_educational_details` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
				$sql_check=mysqli_query($conn, $qry_check);
        		$res_check=mysqli_fetch_array($sql_check);
       			$row_no_check=mysqli_num_rows($sql_check);
        	
	        	if($row_no_check!=0){
	        		$qry="UPDATE `candidate_application_verification_info` SET `educational_info_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";
	        		$res= mysqli_query($conn, $qry);
					if($res){
						$qry_submit_status="UPDATE `candidate_educational_details` SET `educational_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
						$res_status=mysqli_query($conn, $qry_submit_status);
						if($res_status){
							$msg->success('Educational Section Is Verified Success-Fully');
							//view_application.php?appno=<?php echo $res["application_no"];
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Educational");
							exit;
						
						}else{
							$msg->warning('Unable To Verify In Educational Section This Application Some Error Occurs !!!');
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Educational");
							exit;
						
						}
					}
	        		
	        	}else{
	        		$msg->warning('Unable To Verify In Educational Section This Application !!!');
	        		header('Location:view_application.php?appno='.$_REQUEST["application_no"]."#Educational");
	        		exit;
	        	}
        	}
        }else{
        	$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_educational_details` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
		$sql_check=mysqli_query($conn, $qry_check);
        $res_check=mysqli_fetch_array($sql_check);
        $row_no_check=mysqli_num_rows($sql_check);
        	
        	if($row_no_check!=0){
        		$qry="INSERT INTO `candidate_application_verification_info`(`slno`, `application_no`,`educational_info_status`) VALUES (NULL, '$_POST[application_no]' ,'1')";
        		$res= mysqli_query($conn, $qry);
				if($res){
					$qry_submit_status="UPDATE `candidate_educational_details` SET `educational_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
					$res_status=mysqli_query($conn, $qry_submit_status);
					if($res_status){
						$msg->success('Educational Section Is Verified Success-Fully');
						//view_application.php?appno=<?php echo $res["application_no"];
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Educational");
						exit;
						
					}else{
						$msg->warning('Unable To Verify In Educational Section This Application Some Error Occurs !!!');
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Educational");
						exit;
					
					}
				}
        		
        	}else{
        		$msg->warning('Unable To Verify In Educational Section This Application !!!');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Educational");
        		exit;
        	}
   //      
        }
	}
/**
 * Employee
 * Array ( [application_no] => 632978 [employeement] => 3 [Employee] => personal_info_verified ) 
 */
if(isset($_POST['Employee'])){
		//Array ( [application_no] => 632978 [personal] => 1 [emailid] => abinash2@gmail.com [login] => personal_info_verified ) 
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `application_no`='$_REQUEST[application_no]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
        $res_check_status=mysqli_fetch_array($sql_check_status);
        $row_no=mysqli_num_rows($sql_check_status);
        if($row_no!=0){
        	if($res_check_status['employment_info_status']=="1"){
        		$msg->success('Employment Section Is Verified Success-Fully');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Employment");
        		exit;
        	}else{
        		
        		$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_employment_details` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
				$sql_check=mysqli_query($conn, $qry_check);
        		$res_check=mysqli_fetch_array($sql_check);
       			$row_no_check=mysqli_num_rows($sql_check);
        	
	        	if($row_no_check!=0){
	        		$qry="UPDATE `candidate_application_verification_info` SET `employment_info_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";
	        		$res= mysqli_query($conn, $qry);
					if($res){
						$qry_submit_status="UPDATE `candidate_employment_details` SET `employment_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
						$res_status=mysqli_query($conn, $qry_submit_status);
						if($res_status){
							$msg->success('Employment Section Is Verified Success-Fully');
							//view_application.php?appno=<?php echo $res["application_no"];
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Employment");
							exit;
						
				
						}else{
							$msg->warning('Employment Section Is Unable To Verified Try Again !!!!');
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Employment");
							exit;
						}
					}
	        		
	        	}else{
	        		$msg->warning('Unable Verify This Employment Section  Application');
	        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Employment");
	        		exit;
	        	}
        	}
        }else{
        	$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_employment_details` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
		$sql_check=mysqli_query($conn, $qry_check);
        $res_check=mysqli_fetch_array($sql_check);
        $row_no_check=mysqli_num_rows($sql_check);
        	
        	if($row_no_check!=0){
        		$qry="INSERT INTO `candidate_application_verification_info`(`slno`, `application_no`,`employment_info_status`) VALUES (NULL, '$_POST[application_no]' ,'1')";
        		$res= mysqli_query($conn, $qry);
				if($res){
					$qry_submit_status="UPDATE `candidate_employment_details` SET `employment_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
					$res_status=mysqli_query($conn, $qry_submit_status);
					if($res_status){
						$msg->success('Employment Section Is Verified Success-Fully');
						//view_application.php?appno=<?php echo $res["application_no"];
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Employment");
						exit;
					}else{
						$msg->warning('Employment Section Is Unable To Verified Try Again !!!!');
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Employment");
						exit;
					
					}
				}
        		
        	}else{
        		$msg->warning('Unable Verify This Employment Section  Application');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Employment");
        		exit;
        	}
   //      
        }
	}
/**
 * 
 * upload
 * Array ( [application_no] => 632978 [uploads] => 4 [upload] => personal_info_verified ) 
 */
if(isset($_POST['upload'])){
		//Array ( [application_no] => 632978 [personal] => 1 [emailid] => abinash2@gmail.com [login] => personal_info_verified ) 
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `application_no`='$_REQUEST[application_no]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
        $res_check_status=mysqli_fetch_array($sql_check_status);
        $row_no=mysqli_num_rows($sql_check_status);
        if($row_no!=0){
        	if($res_check_status['certificate_info_status']=="1"){
        		$msg->success('Certificate Section Is Verified Success-Fully');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Upload");
        		exit;
        	}else{
        		
        		$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_certificate_uploads` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
				$sql_check=mysqli_query($conn, $qry_check);
        		$res_check=mysqli_fetch_array($sql_check);
       			$row_no_check=mysqli_num_rows($sql_check);
        	
	        	if($row_no_check!=0){
	        		$qry="UPDATE `candidate_application_verification_info` SET `certificate_info_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";
	        		$res= mysqli_query($conn, $qry);
					if($res){
						$qry_submit_status="UPDATE `candidate_certificate_uploads` SET `certificate_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
						$res_status=mysqli_query($conn, $qry_submit_status);
						if($res_status){
							$msg->success('Certificate Section Is Verified Success-Fully');
							//view_application.php?appno=<?php echo $res["application_no"];
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Upload");
							exit;						
				
						}else{
							$msg->warning('Unable To Verify Certificate This Application Some Error Occurs !!!');
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Upload");
							exit;
						}
					}
	        		
	        	}else{
	        		$msg->warning('Unable To Verify This Application !!!');
	        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Upload");
	        		exit;
	        	}
        	}
        }else{
        	$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_certificate_uploads` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
		$sql_check=mysqli_query($conn, $qry_check);
        $res_check=mysqli_fetch_array($sql_check);
        $row_no_check=mysqli_num_rows($sql_check);
        	
        	if($row_no_check!=0){
        		$qry="INSERT INTO `candidate_application_verification_info`(`slno`, `application_no`,`certificate_info_status`) VALUES (NULL, '$_POST[application_no]' ,'1')";
        		$res= mysqli_query($conn, $qry);
				if($res){
					$qry_submit_status="UPDATE `candidate_certificate_uploads` SET `certificate_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
					$res_status=mysqli_query($conn, $qry_submit_status);
					if($res_status){
						$msg->success('Certificate Section Is Verified Success-Fully');
						//view_application.php?appno=<?php echo $res["application_no"];
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Upload");
						exit;
			
					}else{
						$msg->warning('Unable To Verify Certificate This Application Some Error Occurs !!!');
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Upload");
						exit;
					}	
				}
        		
        	}else{
        		$msg->warning('Unable To Verify Certificate This Application !!!');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Upload");
        		exit;
        	}
   //      
        }
	}
/**
 * Array ( [application_no] => 632978 [payment] => 5 [pay] => personal_info_verified ) 
 * pay
 */
if(isset($_POST['pay'])){
		
		//Array ( [application_no] => 632978 [personal] => 1 [emailid] => abinash2@gmail.com [login] => personal_info_verified ) 
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `application_no`='$_REQUEST[application_no]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
        $res_check_status=mysqli_fetch_array($sql_check_status);
        $row_no=mysqli_num_rows($sql_check_status);
        if($row_no!=0){
        	if($res_check_status['payment_info_status']=="1"){
        		$msg->success('Payment Section Is Verified Success-Fully');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Payment");
        		exit;
        	}else{
        		
        		$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_payment_details` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
				$sql_check=mysqli_query($conn, $qry_check);
        		$res_check=mysqli_fetch_array($sql_check);
       			$row_no_check=mysqli_num_rows($sql_check);
        	
	        	if($row_no_check!=0){
	        		$qry="UPDATE `candidate_application_verification_info` SET `payment_info_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";
	        		$res= mysqli_query($conn, $qry);
					if($res){
						$qry_submit_status="UPDATE `candidate_payment_details` SET `payment_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
						$res_status=mysqli_query($conn, $qry_submit_status);
						if($res_status){
							$msg->success('Payment Section Is Verified Success-Fully');
							//view_application.php?appno=<?php echo $res["application_no"];
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Payment");
							exit;
						
						}else{
							$msg->warning('Unable To Verify Payment This Application Some Error Occurs !!!');
							header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Payment");
							exit;

						}
					}
	        		
	        	}else{
	        		$msg->warning('Unable To Verify Payment This Application !!!');
	        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Payment");
	        		exit;
	        	}
        	}
        }else{
        	$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_payment_details` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
		$sql_check=mysqli_query($conn, $qry_check);
        $res_check=mysqli_fetch_array($sql_check);
        $row_no_check=mysqli_num_rows($sql_check);
        	
        	if($row_no_check!=0){
        		$qry="INSERT INTO `candidate_application_verification_info`(`slno`, `application_no`,`payment_info_status`) VALUES (NULL, '$_POST[application_no]' ,'1')";
        		$res= mysqli_query($conn, $qry);
				if($res){
					$qry_submit_status="UPDATE `candidate_payment_details` SET `payment_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
					$res_status=mysqli_query($conn, $qry_submit_status);
					if($res_status){
						$msg->success('Payment Section Is Verified Success-Fully');
						//view_application.php?appno=<?php echo $res["application_no"];
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Payment");

						exit;
					}else{						
						$msg->warning('Unable To Verify Payment This Application Some Error Occurs !!!');
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Payment");
						exit;
					}
				}
        		
        	}else{
        		$msg->warning('Unable To Verify Payment This Application !!!');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Payment");
        		exit;
        	}
   //      
        }
	}

/**
 * Array ( [application_no] => 632978 [Decls] => 6 [Decl] => personal_info_verified ) 
 * Decl
 */
if(isset($_POST['Decl'])){
		
		//Array ( [application_no] => 632978 [personal] => 1 [emailid] => abinash2@gmail.com [login] => personal_info_verified ) 
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `application_no`='$_REQUEST[application_no]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
        $res_check_status=mysqli_fetch_array($sql_check_status);
        $row_no=mysqli_num_rows($sql_check_status);
        if($row_no!=0){
        	if($res_check_status['declaration_status']=="1"){
        		$msg->success('Declaration Section Is Verified Success-Fully');
        		header('Location:view_application.php?appno='.$_REQUEST["application_no"]."#Declaration");
        		exit;
        	}else{
        		
        		$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_declaration` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
				$sql_check=mysqli_query($conn, $qry_check);
        		$res_check=mysqli_fetch_array($sql_check);
       			$row_no_check=mysqli_num_rows($sql_check);
        	
	        	if($row_no_check!=0){
	        		$qry="UPDATE `candidate_application_verification_info` SET `declaration_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";
	        		$res= mysqli_query($conn, $qry);
					if($res){
						$qry_submit_status="UPDATE `candidate_declaration` SET `declaration_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
						$res_status=mysqli_query($conn, $qry_submit_status);
						if($res_status){
							$msg->success('Declaration Section Is Verified Success-Fully');
							//view_application.php?appno=<?php echo $res["application_no"];
							header('Location:view_application.php?appno='.$_REQUEST["application_no"]."#Declaration");
							exit;
						
						}else{
							$msg->warning('Unable To Verify Declaration This Application Some Error Occurs !!!');
							header('Location:view_application.php?appno='.$_REQUEST["application_no"]."#Declaration");
						exit;
	            		
						}
					}
	        		
	        	}else{
	        		$msg->warning('Unable To Verify Declaration This Application !!!');
	        		header('Location:view_application.php?appno='.$_REQUEST["application_no"]."#Declaration");
	        		exit;
	        	}
        	}
        }else{
        	$qry_check="SELECT * FROM `candidate_application_info` t1,`candidate_declaration` t2 WHERE t1.application_no='$_REQUEST[application_no]' AND t2.application_no='$_REQUEST[application_no]'";
		$sql_check=mysqli_query($conn, $qry_check);
        $res_check=mysqli_fetch_array($sql_check);
        $row_no_check=mysqli_num_rows($sql_check);
        	
        	if($row_no_check!=0){
        		$qry="INSERT INTO `candidate_application_verification_info`(`slno`, `application_no`,`declaration_status`) VALUES (NULL, '$_POST[application_no]' ,'1')";
        		$res= mysqli_query($conn, $qry);
				if($res){
					$qry_submit_status="UPDATE `candidate_declaration` SET `declaration_verif_status`='1' WHERE `application_no`='$_REQUEST[application_no]'";	
					$res_status=mysqli_query($conn, $qry_submit_status);
					if($res_status){
						$msg->success('Declaration Section Is Verified Success-Fully');
						//view_application.php?appno=<?php echo $res["application_no"];
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Declaration");
						exit;
					}else{
						$msg->warning('Unable To Verify Declaration This Application Some Error Occurs !!!');
						header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Declaration");
					exit;
					}
				}
        		
        	}else{
        		$msg->warning('Unable To Verify Declaration This Application !!!');
        		header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#Declaration");
        		exit;
        	}
   //      
        }
	}
/**
 * Array ( [application_no] => 632978 [conform] => 7 [conforms] => personal_info_verified ) 
 * conforms
 */
	if(isset($_POST['conforms'])){
		$qry_check_status="SELECT * FROM `candidate_application_verification_info` WHERE `application_no`='$_REQUEST[application_no]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
        $res_check_status=mysqli_fetch_array($sql_check_status);
        if($res_check_status['application_status']=="1"){
        	$msg->success('Application No :- '.$_REQUEST['application_no']." Is Verified Success-Fully");
        	header('Location:vrf_verify_application.php');
        	exit;
        }else{
        	$qry_check="SELECT * FROM `candidate_application_info`  WHERE `application_no`='$_REQUEST[application_no]' AND `application_submitted`='yes'";
				$sql_check=mysqli_query($conn, $qry_check);
        		$res_check=mysqli_fetch_array($sql_check);
       			$row_no_check=mysqli_num_rows($sql_check);        	
	        	if($row_no_check!=0){
	        		
						 	 $admin_name=$_SESSION['verification_exam'];
						
	        		
	        		$date=date('Y-m-d');
	        		
	        		$qry="UPDATE `candidate_application_verification_info` SET `application_status`='1',`approved_by_verification_info`='$admin_name' WHERE `application_no`='$_REQUEST[application_no]'";
	        		$res= mysqli_query($conn, $qry);
					if($res){
										

						$qry_submit_status="UPDATE `candidate_application_info` SET `application_verification_officer`='4',`date_of_verification`='$date',`application_verified_officer`='$admin_name' WHERE `application_no`='$_REQUEST[application_no]'";	
						$res_status=mysqli_query($conn, $qry_submit_status);
						if($res_status){
							$msg->success('Application No :-  '.$_REQUEST['application_no'].'  Is Verified Success-Fully');
							//view_application.php?appno=<?php echo $res["application_no"];
							header('Location:vrf_verify_application.php');
						exit;
				
						}else{
							$msg->warning('Unable To Verify This Application !!!');
							header('Location:view_application.php?appno='.$_REQUEST["application_no"]);
						exit;
						}
					}
	        	}
        }
	}
/**
 * rejected form
 */
 // [application_no] => 576423 [reason]
	if(isset($_POST['rejected'])){

		
			$admin_name=$_SESSION['verification_exam'];
		
		$date=date('Y-m-d');

		$qry_submit_status="UPDATE `candidate_application_info` t1, `candidate_certificate_uploads` t2, `candidate_declaration` t3, `candidate_educational_details` t4, `candidate_employment_details` t5, `candidate_payment_details` t6, `candidate_personal_details` t7 SET t1.application_verification_officer='3',t1.date_of_verification='$date', t1.application_verified_officer='$admin_name', t1.rejected_reason='$_POST[reason]' , t2.certificate_verif_status='3', t3.declaration_verif_status='3',t4.educational_verif_status='3',t5.employment_verif_status='3',t6.payment_verif_status='3',t7.personal_verif_status='3'  WHERE t1.application_no='$_POST[application_no]' AND t1.application_no=t2.application_no AND t1.application_no=t3.application_no AND t1.application_no=t4.application_no AND t1.application_no=t5.application_no AND t1.application_no=t6.application_no AND t1.application_no=t7.application_no";
		
		$res_status=mysqli_query($conn, $qry_submit_status);
		if($res_status){
			$msg->success('Application No :-  '.$_REQUEST['application_no'].' Is Rejected Success-Fully');
			header("Location:vrf_verify_application.php");
			exit;
			
		}else{			
			header("Location:vrf_verify_application.php");
			exit;
		}
	}
/**
 * Array ( [day] => 1 [reason] => This Hello Text demo application shows how an iOS sender application can send and receive text messages. For simplicity this app is not fully compliant with the [dateline] => 30/06/2016 [application_no] => 519870 [section] => 0 [inadequte] => inadequte ) 
 */
if(isset($_POST['inadequte'])){

	$qry_check_status="SELECT * FROM `candidate_application_info` WHERE `application_no`='$_REQUEST[application_no]'";
		$sql_check_status=mysqli_query($conn, $qry_check_status);
        $res_check_status=mysqli_fetch_array($sql_check_status);
        $dead_line_retrive=unserialize($res_check_status['dead_line_date']);
        $reason_inadeque_retrive=unserialize($res_check_status['reason_inadequte']);
        $day_retrival=unserialize($res_check_status['days']);
        $section_retrival=unserialize($res_check_status['section']);
		$admin_name=$_SESSION['verification_exam'];
		$candidate_email=$res_check_status['candidate_email'];
		$res_status=mysqli_query($conn, $qry_submit_status);
		$to = $email;
		$subject = 'SPSC Application In-adequte ';
		$message = "Your Appliaction Nos ".$_POST[application_no]." . Has Been In-adequte Please Check Veiw Application Inside Spsc Login Page.";
		mail($to, $subject, $message);
		if(!empty($dead_line_retrive) && !empty($reason_inadeque_retrive) && !empty($day_retrival) && !empty($section_retrival)){
			$dead_line_date=serialize(array_merge($dead_line_retrive,array($_POST['dateline'])));
			$reason_inadequte=serialize(array_merge($reason_inadeque_retrive,array($_POST['reason'])));
			$days=serialize(array_merge($day_retrival,array($_POST['day'])));
			$section=serialize(array_merge($section_retrival,array($_POST['section'])));
		}else{
			$dead_line_date=serialize(array($_POST['dateline']));
			$reason_inadequte=serialize(array($_POST['reason']));
			$days=serialize(array($_POST['day']));
			$section=serialize(array($_POST['section']));
		}
			$i=$_POST['section'];
			switch ($i) {
			    case '0':
			      $exam_info_str="Personal";
			      $qry_submit_status="UPDATE `candidate_application_info` t1, `candidate_personal_details` t7 SET t1.application_verification_officer='2',t1.dead_line_date='$dead_line_date', t1.application_verified_officer='$admin_name', t1.reason_inadequte='$reason_inadequte' , t1.section='$section' , t1.days='$days' , t7.personal_verif_status='2' WHERE t1.application_no='$_POST[application_no]' AND t7.application_no='$_POST[application_no]'";
			      break;
			     case '1':
			       $exam_info_str="Educational";
			       $qry_submit_status="UPDATE `candidate_application_info` t1,`candidate_educational_details` t4 SET t1.application_verification_officer='2',t1.dead_line_date='$dead_line_date', t1.application_verified_officer='$admin_name', t1.reason_inadequte='$reason_inadequte' , t1.section='$section' , t1.days='$days' , t4.educational_verif_status='2' WHERE t1.application_no='$_POST[application_no]' AND t4.application_no='$_POST[application_no]'";
			      break;
			     case '2':
			      $exam_info_str="Employment";
			      $qry_submit_status="UPDATE `candidate_application_info` t1, `candidate_employment_details` t5 SET t1.application_verification_officer='2',t1.dead_line_date='$dead_line_date', t1.application_verified_officer='$admin_name', t1.reason_inadequte='$reason_inadequte' , t1.section='$section' , t1.days='$days' ,t5.employment_verif_status='2' WHERE t1.application_no='$_POST[application_no]' AND t5.application_no='$_POST[application_no]'";
			      break;
			     case '3':
			       $exam_info_str="Upload";
			       $qry_submit_status="UPDATE `candidate_application_info` t1, `candidate_certificate_uploads` t2 SET t1.application_verification_officer='2',t1.dead_line_date='$dead_line_date', t1.application_verified_officer='$admin_name', t1.reason_inadequte='$reason_inadequte' , t1.section='$section' , t1.days='$days' , t2.certificate_verif_status='2' WHERE t1.application_no='$_POST[application_no]' AND t2.application_no='$_POST[application_no]' ";
			      break;
			     case '4':
			       $exam_info_str="Payment";
			       $qry_submit_status="UPDATE `candidate_application_info` t1,  `candidate_payment_details` t6 SET t1.application_verification_officer='2',t1.dead_line_date='$dead_line_date', t1.application_verified_officer='$admin_name', t1.reason_inadequte='$reason_inadequte' , t1.section='$section' , t1.days='$days' , t6.payment_verif_status='2' WHERE t1.application_no='$_POST[application_no]' AND t6.application_no='$_POST[application_no]'";
			      break;    
			    default:
			       $exam_info_str="Declaration";
			       $qry_submit_status="UPDATE `candidate_application_info` t1, `candidate_declaration` t3 SET t1.application_verification_officer='2',t1.dead_line_date='$dead_line_date', t1.application_verified_officer='$admin_name', t1.reason_inadequte='$reason_inadequte' , t1.section='$section' , t1.days='$days' , t3.declaration_verif_status='2'  WHERE t1.application_no='$_POST[application_no]' AND t3.application_no='$_POST[application_no]'";
			      break;
			  }	
			 
		
		
		
		$res_status=mysqli_query($conn, $qry_submit_status);
		
		if($res_status){
			$msg->success($exam_info_str.' Section Is Add In-Adequate Success-Fully');
			header("Location:view_application.php?appno=".$_REQUEST["application_no"]."#".$exam_info_str);
			exit;
		}else{
			$msg->warning('Unable To Verify This Application !!!');			
			header("Location:vrf_verify_application.php");
			exit;
		}

}

	}?>
