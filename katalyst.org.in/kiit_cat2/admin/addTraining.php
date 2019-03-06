<?php

session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
$title="Add New Tranning";
?>

<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Tranning</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Tranning</li>
				<li class="active">Add New Tranning </li>
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
			 <div class="panel-title">Add a new Training</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="addTraining_save.php" method="POST">
					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Training/Program Name</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="programName" id="demo" placeholder="Enter Training/Program Name" type="text" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Commencement date</label>
						  	<div class="col-lg-8">
								<input class="form-control datepicker-here" data-language='en' name="programDate" id="demo" placeholder="Commencement date" type="text" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Eligibility </label>
						  	<div class="col-lg-8">
								 <textarea name="eligibility" class="form-control" required=""></textarea>
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">No of Module </label>
						  	<div class="col-lg-8">
								 <input class="form-control" name="moduleNumber" id="demo" placeholder="Enter No of Module" type="text" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">No of Session </label>
						  	<div class="col-lg-8">
								 <input class="form-control" name="no_of_session" id="demo" placeholder="Enter No of Session" type="text" required="">
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
  <script src="../asserts/lib/js/forms/datepicker.min.js"></script>
	<script src="../asserts/lib/js/forms/datepicker.en.js"></script>
	<script src="../asserts/lib/js/pages/forms/picker_date.js"></script>