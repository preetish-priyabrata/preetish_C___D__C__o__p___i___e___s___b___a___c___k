<?php

require_once "mail/PHPMailerAutoload.php";

$from_name=$_POST['name'];
    $from_mail=$_POST['email'];
    $user_name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $filename = date('his').date('ymd').$_FILES['resume']['name'];
    $file_tmp =$_FILES['resume']['tmp_name'];
    if(move_uploaded_file($file_tmp,"upload/".$filename)){

		$mail = new PHPMailer;

		$mail->From = "contact@innovadorslab.com";
		$mail->FromName = "Innovadors Lab";

		$mail->addAddress($from_mail, $from_name);
		//CC and BCC
		$mail->addCC($from_mail);
		$mail->addBCC("siprah@gmail.com");
		$mail->addBCC("siprah@innovadorslab.com");
		$mail->addBCC("ppriyabrata8888@gmail.com");

		//Provide file path and name of the attachments
		//$mail->addAttachment("file.txt", "File.txt");        
		$mail->addAttachment("upload/".$filename); //Filename is optional

		$mail->isHTML(true);

		$mail->Subject = "This Mail Is For Resume Submission";
		$mail->Body = "<b>This is a Computer Generated mail. Don't Reply !!</b><br>"."<br><b>Name: </b>".$user_name."<br>"."<br><b>Contact No: </b>".$mobile."<br>"."<br><b>Email Id: </b>".$email."<br>";
		// $mail->AltBody = "This is the plain text version of the email content";

		if(!$mail->send()){
		    header('Location:success_message.php?s=2');
    		exit; 
		}else{
		    header('Location:success_message.php?s=1');
    		exit; 
		}
	}else{
		header('Location:success_message.php?s=3');
    		exit; 
	}