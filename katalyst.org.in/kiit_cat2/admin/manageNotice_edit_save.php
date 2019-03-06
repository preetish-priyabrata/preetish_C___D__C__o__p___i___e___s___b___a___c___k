<?php
// print_r($_POST);
// print_r($_FILES);
// exit;
session_start();
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// Array ( [noticeDate] => 2014-02-13 [noticeSubject] => Summer Training Notice@CSITMCA_2014 ) Array ( [noticeDoc] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) ) 

 	$noticeId = $_POST['notice'];
    $noticeDate = $_POST['noticeDate'];
    $noticeSubject = $_POST['noticeSubject'];
    // $oldNotice = $_POST['oldNotice'];

    $noticeDoc = $_FILES['noticeDoc']['name'];
    $tmpDoc = $_FILES['noticeDoc']['tmp_name'];

    if (!empty($noticeDoc) && !empty($_FILES['noticeDoc']['tmp_name'])) {
        $target_path = "../upload_files/";
        $target_paths = $target_path . basename($noticeDoc);
        move_uploaded_file($tmpDoc, $target_paths);
        $noticeDoc = "upload_files/" . $noticeDoc;

        $queryUpdateNotice = "UPDATE `tbl_notice` SET `notice_subject` = '$noticeSubject', `notice_doc` = '$noticeDoc' WHERE `notice_id` = '$noticeId'";
    } else {
        $queryUpdateNotice = "UPDATE `tbl_notice` SET `notice_subject` = '$noticeSubject' WHERE `notice_id` = '$noticeId'";
    }

//    Update Notice Details
    // $queryUpdateNotice = "UPDATE `tbl_notice` SET `notice_subject` = '$noticeSubject', `notice_doc` = '$noticeDoc' WHERE `notice_id` = '$noticeId'";
    $resUpdateNotice = mysqli_query($conn, $queryUpdateNotice);
    if ($resUpdateNotice) {
         $msg->success('SucessFully Edit Notice/Event ');
    	header('Location:manageNotice.php');
		exit;
    }else{
    	header('Location:logout.php');
		exit;
    }
}else{
	header('Location:logout.php');
	exit;
}

?>
