<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Office";

?>
<!-- BEGIN RIGHTSIDE -->
        <div class="rightside bg-grey-50">
			<!-- BEGIN PAGE HEADING -->
            <div class="page-head">
				<h1 class="page-title">DashBoard<small>All Start From Here</small></h1>
			</div>
			<!-- END PAGE HEADING -->
			<div class="container-fluid">
            </div><!-- /.container-fluid -->
        </div><!-- /.rightside -->
<?php
}else{
	// header('Location:logout.php');
	// exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';