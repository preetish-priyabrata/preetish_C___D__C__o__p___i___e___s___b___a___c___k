<?php

session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
$title="Add New Notice";
?>

<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Notice</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Notice</li>
				<li class="active">Add New Notice </li>
			</ul>
		</div>
	</div>
	<div class="container-fluid page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<?php $msg->display(); ?>
			</div>
		</div>
	</div>
	<!-- /Page Header-->
 <div class="container-fluid page-content">
	<div class="row">
	  <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
		 <div class="panel panel-default">
		   <div class="panel-heading">
			 <div class="panel-title">Notice/Event Upload</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="noticeForm_save.php" enctype="multipart/form-data" autocomplete="off" method="POST">
					  <div class="form-group">
						<label class="control-label col-lg-4 text-right"><strong>I am uploading a</strong></label>
						<div class="col-lg-8">
							<label class="radio-inline radio-right">
								<input class="radio-unstyled-inline-right" name="upload_type" value="Notice" checked="checked" type="radio">
								Notice
							</label>
							<label class="radio-inline radio-right">
								<input class="radio-unstyled-inline-right" name="upload_type" value="Event" type="radio">
								Event
							</label>
						</div>
						 </div>
						 <div class="form-group">
							<label class="control-label col-lg-4 text-right"><strong>Notice/Event Subject</strong></label>
						  	<div class="col-lg-8">
								<!-- <input class="form-control" name="programName" id="demo" placeholder="Enter Training/Program Name" type="text" required=""> -->
								<textarea class="form-control" name="notice_subject" rows="4" cols="40" required=""></textarea>
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right"> <strong>Please select a file </strong></label>
						  	<div class="col-lg-8">
								 <input type="file" class="form-control" name="notice_doc" id="notice_doc"  class="upload" required="" />
						   	</div>
						</div>
					   <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info"  value="Save" onclick="myFunction()">
				   </div>
				 </form>
			   </div>
			 </div>						
		   </div>
		 </div>
	   </div>



<?php
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
 