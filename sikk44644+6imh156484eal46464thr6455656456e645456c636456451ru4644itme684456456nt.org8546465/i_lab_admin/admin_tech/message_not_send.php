<?php
session_start();
if($_SESSION['admin_tech']){
	include  '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	if(isset($_POST['upload'])){
		$upload_certificate = $_FILES['upload_certificate']['name']	;
		$upload_certificate_tmp = $_FILES['upload_certificate']['tmp_name']	;
		$date=date('Y-m-d');
		$time=date("H:i:s");
		
		$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/csv','text/comma-separated-values');
	if(in_array($_FILES['upload_certificate']['type'],$mimes))
	{

			$filename=$upload_certificate_tmp;
			$subject_message=$_POST['message_subject'];

			 if($_FILES["upload_certificate"]["size"] > 0)
			 {
				$row=1;
			  	$file = fopen($filename, "r");
				fgetcsv($file, 10000, ",");
		         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
		         {
					 
					 	$Category_names=$emapData[0];
					 	$new_message1=$_POST['text_message'];

					 	$user="Innolab";
					      $key="a1da054ec1XX";
								$api_params = 'user='.$user.'&key='.$key.'&mobile=91'.$Category_names.'&message='.$new_message1.'&senderid=SKHAFW&accusage=1';
								    	// $smsGatewayUrl = "http://sms.gpileportal.co.in/submitsms.jsp?";  
								    	 $smsGatewayUrl = "http://sms.sikkimhealthrecruitment.org/submitsms.jsp?";   
					            $smsgatewaydata = $smsGatewayUrl.$api_params;
								    	$url = $smsgatewaydata;
								    	$ch = curl_init();
									    curl_setopt($ch, CURLOPT_URL,$smsGatewayUrl);
								  		curl_setopt($ch, CURLOPT_POST, 1);
								  		curl_setopt($ch, CURLOPT_POSTFIELDS,$api_params);  
											  // receive server response ...
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

								    	$server_output = curl_exec ($ch);
					              // print_r($server_output);
								  		
								  		if($server_output){
								  			curl_close ($ch);
					            $sms_query="INSERT INTO `ilab_mobile_message_info`(`slno`, `mobile_no`, `message_info`, `respond_info`, `date`, `time`, `type_sending`,`server_message`,`message_id`) VALUES (Null,'$Category_names','$new_message1','$server_output','$date','$time','Message Notification','$smsgatewaydata','6' )";
					            $result1=mysqli_query($conn,$sms_query);
			    		//print_r($emapData);
			          //It wiil insert a row to our subject table from our csv file`
			           $sql = "INSERT INTO `ilab_message_notifiction_send`(`mobile_no`, `message_info`, `subject_message`, `date`, `time`) values('$emapData[0]','$new_message1','$subject_message','$date','$time')";
			         //we are using mysql_query function. it returns a resource on true else False on error
			          $result = mysqli_query($conn,$sql);
						// if(! $result )
						// {
						// 	echo "<script type=\"text/javascript\">
						// 			alert(\"Invalid File:Please Upload CSV File.\");
						// 			window.location = \"uploadCERT.php\"
						// 		</script>";
						
						// }
						$msg->success('Message send to mobile no .'.$emapData[0].' Successfully Is stored');
					}
					

		         }
		         fclose($file);
		         //throws a message if data successfully imported to mysql database from excel file
		    //      echo "<script type=\"text/javascript\">
						// 	alert(\"CSV File has been successfully Imported.\");
						// 	window.location = \"message_not\"
						// </script>";
		        
				 

				 //close of connection
				// mysqli_close($conn); 
				header('Location:index');
		exit;
					
			 	
				
			 }
		}
		else
		{
			
			$csvErr="*Please Upload CSV File Only";	
			$msg->error($csvErr);
			header('Location:index');
			exit;
		}
	}else{echo "string";
		exit;
		header('Location:logout');
		exit;
	}
}else{
	exit;
	header('Location:logout');
	exit;
}
?>