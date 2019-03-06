<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
//include 'config.php';
$title="Add Interview";
$L_slno = $_GET['L_slno'];
//$L_slno = decryptIt_webs($L_slno);
?>
<style type="text/css">
	.form-control[disabled], .form-control[readonly] {
    color: #223135;
}
</style>
<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Interview</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<!-- <li><a href="#"></a>Profile Settings</li> -->
				<li class="active">Add Interview </li>
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
			 <div class="panel-title">Add Interview</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="interview_add_save.php" method="POST" >
               
					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Title</label>
						  	<div class="col-lg-8">
						  		
						  		<input  name="title" id="title" class="form-control" placeholder="Enter Title"  type="text"  required="">
								
						   	</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4 text-right">URL</label>
						  	<div class="col-lg-8">
								<input  name="url" id="url"  type="text" placeholder="Enter Url"  class="form-control" required="">
						   	</div>
						</div>
		
					   <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info" name="submit"  value="Add" onclick="myFunction()">
				   </div>
				 </form>
			   </div>
			 </div>						
		   </div>
		 </div>
	   </div>
	   <?php }else{
header('Location:logout.php');
exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>