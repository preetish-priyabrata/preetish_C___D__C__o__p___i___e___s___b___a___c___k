<?php


session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 
 // print_r(expression)
 // Array ( [Enquiry] => 1 [EnquiryName] => preetish [Email_id] => ppriyabrata8888@gmail.com [student_roll] => 78945610 [student_phone] => 9776069881 [student_query] => Hello, I am currently pursuing my masters degree from Indian Institute of Technology (BHU), Varanasi in biochemical engineering. I am currently planning to give IELTS exam next year and i want to pursue my higher studies from the best European Colleges. If someone can guide me and help me in deciding how will the IELTS exam help in my admission and what is the general admission procedures. Thank You [editor] =>

// Hi preetish

// You are planning to go abroad for higher study. Well its great, you can get a life changing experienced from their. IELTS just test the language ability of candidates. There is not a very hard and tough rules to get admission in best European Colleges. All it needs a good planning and decision.
// Thanks
// ) 

	$editor=$_POST['editor'];
	$Enquiry=$_POST['Enquiry'];
	$Email_id=$_POST['Email_id'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$student_query=$_POST['student_query'];

	$query = "UPDATE `tbl_enquiry` SET `enquiry_status` = '2',`message`='$editor',`reply_date`='$date',`reply_time`='$time'  WHERE `enquiry_id` = '$Enquiry' ";
    $res = mysqli_query($conn, $query);
   

	$subject = "This mail is Computer Generated Mail For Enquiry";
	$to = $Email_id;
    //data
    $message1 = "Enquiry Details: "  .$student_query    ."<br>\n";
    $message1 .= "Replyed Message : ".$editor."<br>\n";
    //Headers
    $headers = "From:Kiit_cat2@innovadorslab.com \r\n";
    $headers .= "Bcc:ppriyabrata8888@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html\r\n";
    if(mail($to, $subject, $message1, $headers)){
    	 $msg->success('Successfull Enquiry Is Been Replyed');
		header('Location:enquiryList.php');
		exit;
    }else{
    	 $msg->success('Successfull Enquiry Is Been Replyed');
		header('Location:enquiryList.php');
		exit;
    }

}else{
	header('Location:logout.php');
	exit;
}

?>
