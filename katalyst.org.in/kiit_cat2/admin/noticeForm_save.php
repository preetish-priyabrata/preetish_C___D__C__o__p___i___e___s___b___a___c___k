<?php
session_start();

if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// Array ( [upload_type] => Notice [notice_subject] => Attributes provide additional information about HTML elements. HTML Attributes All HTML elements can have attributes Attributes provide additional information about an element Attributes are always specified in the start tag Attributes usually come in name/value pairs like: name="value" ) Array ( [notice_doc] => Array ( [name] => Christmas-Dark-Blue-Background-Wallpaper.jpg [type] => image/jpeg [tmp_name] => /tmp/phpBYUCuB [error] => 0 [size] => 67823 ) ) 
    $upload_type = $_POST['upload_type'];
    $target_path = "../upload_files/";
    if (!empty($_FILES['notice_doc']['name']) && !empty($_FILES['notice_doc']['tmp_name'])) {
        $target_paths = $target_path .date("Y-m-d"). basename($_FILES['notice_doc']['name']);
        move_uploaded_file($_FILES['notice_doc']['tmp_name'], $target_paths);
        //$tmp=$_FILES['notice_doc']['tmp_name'];
        $notice_date = date("Y-m-d");
        $notice_doc = "upload_files/" .date("Y-m-d").$_FILES['notice_doc']['name'];
        $notice_subject = $_POST['notice_subject'];

        $query = "INSERT INTO `tbl_notice`(`notice_id`, `notice_date`, `upload_type`, `notice_subject`, `notice_doc`) VALUES (NULL,'$notice_date','$upload_type','$notice_subject', '$notice_doc')";
        $res = mysqli_query($conn, $query);

        $msg->success('SucessFully Post Of '.$upload_type);
    	header('Location:noticeForm.php');
		exit;
    }else{
    	$msg->error('File Is Unable To attach Try Again');
    	header('Location:noticeForm.php');
		exit;
    }

}else{
	header('Location:logout.php');
	exit;
}

?>
 