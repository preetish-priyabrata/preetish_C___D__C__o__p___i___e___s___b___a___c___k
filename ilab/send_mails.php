<?php

 // print_r($_POST);
 // print_r($_FILES);
 // exit;
// Array ( [proposal] => mail1 [P_name] => preetish [Organisation] => tgs [p_Email] => ppri@y.com [p_Contact] => 9439777073 [p_Brief] => jpdsjijs ) 
// Array ( [proposal] => mail [user_name] => admin [phone] => 7894561230 [organizational] => innovadors Lab [email] => ambritdas2012@gmail.com [purpose] => Enquiry [message] => student Application demo Purpose ) 
if($_POST['proposal']=='mail1'){
	$P_name=$_POST['P_name'];

	$Organisation=$_POST['Organisation'];

	$p_Email=$_POST['p_Email'];

	$p_Contact=$_POST['p_Contact'];

	$p_Brief=$_POST['p_Brief'];


         $to1 = "siprah@gmail.com";
         $subject1 = "You Have Received A Requested For Proposal";
         
         $message1 = "<b>This is an Auto Generated mail. Don't Reply !!</b><br>";
         $message1 .= "<br><b>Name: </b>".$P_name."<br>";
         $message1 .= "<br><b>Organisation: </b>".$Organisation."<br>";        
         $message1 .= "<br><b>Contact No: </b>".$p_Contact."<br>";
         $message1 .= "<br><b>Email Id: </b>".$p_Email."<br>";
         $message1 .= "<br><b>Requested Proposal For : </b>".$p_Brief;

         $header1 = "From:contact@innovadorslab.com \r\n";
         $header1 .= "Bcc:siprah@innovadorslab.com \r\n";
          $header1 .= "Bcc:ppriyabrata8888@gmail.com \r\n";
         $header1 .= "MIME-Version: 1.0\r\n";
         $header1 .= "Content-type: text/html\r\n";
         
         $retval = mail ($to1,$subject1,$message1,$header1);
         
         if( $retval == true ) {
            $to = $p_Email;
            $subject = "Success-fully RFP Submition";
         
            $message = "<b>This is an Auto Generated mail. Don't Reply !!</b><br>";
            $message .= "Thank For Submiting Your Request Our Represtative Will contact You Within 24hours";
         
         // $header = "From:contact@innovadorslab.com \r\n";
         // $header .= "Bcc:siprah@innovadorslab.com \r\n";
         $header = "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval1 = mail ($to,$subject,$message,$header);
            if($retval1 == true){
                // echo "Message sent successfully...";
                header('Location:index.php#team');
    		    exit; 
            }else{
               // echo "Message could not be sent...";
                header('Location:index.php#team');
                exit;  
            }
         }else {
            // echo "Message could not be sent...";
            header('Location:index.php#team');
    		exit; 
         }
    
  }else if($_POST['proposal']=='mail'){
  	$user_name=$_POST['user_name'];
	$phone=$_POST['phone'];
	$organizational=$_POST['organizational'];
	if(!empty($organizational)){
		$organizational=$_POST['organizational'];
	}else{
		$organizational="N/A";
	}
	$email=$_POST['email'];
	$purpose=$_POST['purpose'];
	$message=$_POST['message'];
		$to1 = "siprah@gmail.com";
         $subject1 = "You Have Received A Request To Contact ";
         
         $message1 = "<b>This is An Auto Generated mail. Don't Reply !!</b><br>";
         $message1 .= "<br><b>Name: </b>".$user_name."<br>";
         $message1 .= "<br><b>Organisation: </b>".$organizational."<br>";        
         $message1 .= "<br><b>Contact No: </b>".$phone."<br>";
         $message1 .= "<br><b>Email Id: </b>".$email."<br>";
         $message1 .= "<br><b>Purpose : </b>".$purpose."<br>";
         $message1 .= "<br><b>Message Details : </b>".$message;

         $header1 = "From:contact@innovadorslab.com \r\n";
         $header1 .= "Bcc:ppriyabrata8888@gmail.com \r\n";
         $header1 .= "Bcc:siprah@innovadorslab.com \r\n";
         $header1 .= "MIME-Version: 1.0\r\n";
         $header1 .= "Content-type: text/html\r\n";
         
         $retval = mail ($to1,$subject1,$message1,$header1);
         
         if( $retval == true ) {

            $to = $email;
            $subject = "Your Contact Us Request For " .$purpose." Has Been Received";
         
            $message = "<b>This is an Auto Generated mail. Don't Reply !!</b><br>";
            $message .= "Thank For Sending Us Your " .$purpose ." We Will Get Back To You At The Earliest";
         
            // $header = "From:contact@innovadorslab.com \r\n";
            // $header .= "Bcc:siprah@innovadorslab.com \r\n";
            $header = "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
         
            $retval1 = mail ($to,$subject,$message,$header);
            if($retval1 == true){
                // echo "Message sent successfully...";
                header('Location:index.php#contact');
                exit; 
            }else{
               // echo "Message could not be sent...";
                header('Location:index.php#contact');
                exit;  
            }
         }else {
            // echo "Message could not be sent...";
            header('Location:index.php#contact');
    		exit; 
         }
}else{
	header('Location:index.php');
    exit; 
}