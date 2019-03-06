<?php
session_start();

if (($_SESSION['userId']!="")) {
	include 'config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	if(isset($_POST['upload'])){
		$upload_certificate = $_FILES['upload_certificate']['name']	;
		$upload_certificate_tmp = $_FILES['upload_certificate']['tmp_name']	;
		
		
		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/csv','text/comma-separated-values');
	if(in_array($_FILES['upload_certificate']['type'],$mimes))
	{

			$filename=$upload_certificate_tmp;
			

			 if($_FILES["upload_certificate"]["size"] > 0)
			 {
				$row=1;
			  	$file = fopen($filename, "r");
				fgetcsv($file, 10000, ",");
		         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
		         {
					 $check="SELECT * FROM `tbl_certificate` WHERE `ref_no`=$emapData[6]'";
					 $result_check=mysqli_query($conn,$check);
					 $num=mysqli_num_rows($result_check);
					 if($num==0){
			    		//print_r($emapData);
			          //It wiil insert a row to our subject table from our csv file`
			           $sql = "INSERT INTO `tbl_certificate`(`name`, `roll_no`, `branch`, `course`, `dt_from`, `dt_to`, `ref_no`) 
			            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]')";
			         //we are using mysql_query function. it returns a resource on true else False on error
			          $result = mysqli_query($conn,$sql);
						if(! $result )
						{
							echo "<script type=\"text/javascript\">
									alert(\"Invalid File:Please Upload CSV File.\");
									window.location = \"uploadCERT.php\"
								</script>";
						
						}
						$msg->success('Reference No.'.$emapData[6].' Successfully Is stored');
					}else{
						$msg->error('Reference No.'.$emapData[6].' Is already been used');
					}

		         }
		         fclose($file);
		         //throws a message if data successfully imported to mysql database from excel file
		         echo "<script type=\"text/javascript\">
							alert(\"CSV File has been successfully Imported.\");
							window.location = \"uploadCERT.php\"
						</script>";
		        
				 

				 //close of connection
				mysqli_close($con); 
					
			 	
				
			 }
		}
		else
		{
			
			$csvErr="*Please Upload CSV File Only";	
		}
	}else{
		header('Location:logout.php');
		exit;
	}
}else{
	header('Location:logout.php');
	exit;
}
?>