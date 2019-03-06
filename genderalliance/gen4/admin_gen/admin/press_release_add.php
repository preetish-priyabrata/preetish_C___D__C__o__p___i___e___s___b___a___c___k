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
$title="Add Press Release";
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
			<div class="page-title"><i class="icon-display4"></i>Press Release</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<!-- <li><a href="#"></a>Profile Settings</li> -->
				<li class="active">Add Press Release </li>
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
			 <div class="panel-title">Add Press Release</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="press_release_add_save.php" method="POST" enctype="multipart/form-data">

				   		<div class="form-group">
							<label class="control-label col-lg-4 text-right">Title</label>
						  	<div class="col-lg-8">
						  			<input type="text" name="title" class="form-control" placeholder="Enter Photo Title" id="title" required="">
						   	</div>
						</div>
               
					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Short Description</label>
						  	<div class="col-lg-8">
						  		<textarea rows="3" cols="6" name="short_desc" class="form-control" id="short_desc" required="" placeholder="Enter Short Description"></textarea>
								
						   	</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Photo</label>
						  	<div class="col-lg-8">
								<input  name="photo_name" id="photo_name"  type="file"  required="">
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
	   <?php }else{
header('Location:logout.php');
exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>