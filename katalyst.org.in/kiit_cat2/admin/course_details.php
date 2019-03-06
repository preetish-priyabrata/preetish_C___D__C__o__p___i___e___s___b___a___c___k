<?php

session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
//include 'config.php';
$title="Add New Course";

?>

<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Programs</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Programs Details</li>
				<li class="active">Add New Programs </li>
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
			 <div class="panel-title">Add a new Programs</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" onsubmit="return (check_date());" action="course_details_save.php" method="POST" autocomplete="off">
					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Add Programs</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="course_name" id="demo" placeholder="Enter Programs Name" type="text" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Type Of Training</label>
						  	<div class="col-lg-8">
							  	 <select name="course_type" class="form-control" required="">
							  		  <option value="">-- Select Type Of Training -- </option>
								  	  <option value="1">In-House</option>
									  <option value="2">Vendor</option>
							  	  </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Eligibility</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="Eligibility" id="Eligibility" placeholder="Enter Eligibility" type="text" required="">
						   	</div>
						</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Description of Program</label>
							  	<div class="col-lg-8">
									<!-- <textarea name="moduleDescription[]" class="form-control" ></textarea> -->
									<textarea class="ckeditor"  name="editor" id="editor[]" rows="3" cols="4" style="visibility: hidden; display: none;" required="">
							  		</textarea>
							   	</div>
							</div>
				
						 <div class="form-group">
							<label class="control-label col-lg-4 text-right">Add Price</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="price" id="demo" placeholder="Enter Price Name" type="number" min="0" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">No Of Session</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="no_of_session" id="demo" placeholder="Enter Session No" type="number" min="2" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">No Of Module</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="no_of_module" id="demo" placeholder="Enter Module No" type="number" min="1" required="">
						   	</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Venue</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="Venue" id="demo" placeholder="Enter Venue " type="text"  required="">
						   	</div>
						</div>
					
						<div class="form-group">
						    <label class="control-label col-lg-4 text-right">Starting Date</label>
						    <div class="col-lg-8">
						        <input class="form-control datepicker-here" data-language='en' type="text" name="Starting_date" id="Starting_date" placeholder="Enter Starting Date" required="" >
						    </div>
						</div>
						<div class="form-group">
						    <label class="control-label col-lg-4 text-right">Ending Date</label>
						    <div class="col-lg-8">
						        <input class="form-control datepicker-here" data-language='en' type="text" name="ending_date" id="ending_date" placeholder="Enter Ending Date" required="" >
						    </div>
						</div>

						   <div class="form-group pull-right">
						  <input type="submit" class="btn btn-info"  value="Submit" onclick="check_date()">
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
	<script type="text/javascript">
		function check_date() {
			
			var startDate = document.getElementById("Starting_date").value;
		    var endDate = document.getElementById("ending_date").value;
		 
		     if(startDate!="" && endDate!=""){
		      if ((Date.parse(startDate) >= Date.parse(endDate))) {
		        alert("End date should be greater than Start date");
		        document.getElementById("ending_date").value = "";
		        return false;
		    }else{
				return true;
			}
		}
	}
	</script>