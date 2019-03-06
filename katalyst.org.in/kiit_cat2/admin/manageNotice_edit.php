<?php

session_start();
ob_start();

if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Edit Notice";
 	$notice = str_replace(" ", "+", $_GET['notice']);
    $notice = decryptIt_webs($notice);
    $queryNotice = "SELECT * FROM `tbl_notice` WHERE `notice_id` = '$notice'";
    $resQueryNotice = mysqli_query($conn, $queryNotice);
     $rowsProgram = mysqli_num_rows($resQueryNotice);
    
 	if ($rowsProgram) {
    $rowNotice = mysqli_fetch_array($resQueryNotice);
?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Edit Notice</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Notice</li>
				<li class="">View Notice/Event List</li>
				<li class="active">View Edit Notice</li>
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
				    <div class="panel-title">View Edit Notice</div>
				 	  </div>
					 	 <div class="panel-body">
							
						  <form name="myFunction" class="form-horizontal" action="manageNotice_edit_save.php" enctype="multipart/form-data" autocomplete="off" method="POST">
						  <input type="hidden" name="notice" value="<?=$notice?>">
					  <div class="form-group">
						<label class="control-label col-lg-4 text-right"><strong>Date</strong></label>
						<div class="col-lg-8">
							<input type="hidden" class="form-control" name="noticeDate" value="<?php echo $rowNotice['notice_date']; ?>" readonly="readonly"><?php echo $rowNotice['notice_date']; ?>
						</div>
						 </div>
						 <div class="form-group">
							<label class="control-label col-lg-4 text-right"><strong>Notice/Event Subject</strong></label>
						  	<div class="col-lg-8">
								<!-- <input class="form-control" name="programName" id="demo" placeholder="Enter Training/Program Name" type="text" required=""> -->
								<textarea class="form-control" name="noticeSubject" rows="4" cols="40" required=""><?php echo $rowNotice['notice_subject']; ?></textarea>
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right"> <strong>Please select a file </strong></label>
						  	<div class="col-lg-8">
								 <input type="file" class="form-control upload" name="noticeDoc" id="noticeDoc"   />
								  <a href="<?php echo "../" . $rowNotice['notice_doc']; ?>" target="_blank" download>Download</a>&nbsp;Older uploaded file.
						   	</div>
						</div>
					   <div class="form-group pull-right">
					     <input type="button" class="btn btn-primary" onclick="window.location = 'manageNotice.php'" value="Go Back" style="border-top: none;">
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
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
