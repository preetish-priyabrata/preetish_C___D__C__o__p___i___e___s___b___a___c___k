<?php

// print_r($_POST);
// Array ( [userName] => usharani roy [userEmail] => royusharani@gmail.com [userPhone] => 9438147975 [userMsg] => nothing is good.. ) 
$userName=$_POST['userName'];
$userEmail=$_POST['userEmail'];
$userPhone=$_POST['userPhone'];
$userMsg=$_POST['userMsg'];
			$to = 'Conatact@innovadorslab.com';
// 
            $subject = "Contact Us";
            $message = "Name :" . $userName . "<br/>";
            $message .= "Email id:" . $userEmail . "<br/>";
            $message .= "Contact No:" . $userPhone . "<br/>";
            $message .= "Message:" . $userMsg . "<br/>";
            $message .= "Message:" . $userMsg . "<br/>";
            $from = "From: kumardevadutta@gmail.com \r\n";
            $from .= "Bcc:ppriyabrata8888@gmail.com \r\n";
            $from .= "MIME-Version: 1.0\r\n";
            $from .= "Content-type: text/html\r\n";
            $res = mail($to, $subject, $message, $from);
            if($res){
	//             $to = 'Conatact@innovadorslab.com';
	// // 
	//             $subject = "Contact Us";
	//             $message = "Name :" . $userName . "<br/>";
	//             $message .= "Email No:" . $userEmail . "<br/>";
	//             $message .= "Contact No:" . $userPhone . "<br/>";
	//             $message .= "Message:" . $userMsg . "<br/>";
	//             $message .= "Message:" . $userMsg . "<br/>";
	//             $from = "From: kumardevadutta@gmail.com \r\n";
	//             $from .= "Bcc:ppriyabrata8888@gmail.com \r\n";
	//             $from .= "MIME-Version: 1.0\r\n";
	//             $from .= "Content-type: text/html\r\n";
	//             $res = mail($to, $subject, $message, $from);
				header('Location:success_message.php?s=1');
                exit;
                echo "<span style ='margin-left:30%'><stronge>You have successfully enrolled.</stronge></span>";
            }else{
            	header('Location:success_message.php?s=1');
                exit;
                echo "<span style ='margin-left:30%'><stronge>You have successfully enrolled.</stronge></span>";
            }

            ?>