<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
 $title="Add New Machine Details";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Machine Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Machine Information</li>
				<li class="active">Add New Machine Details</li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
 <div class="container-fluid page-content">
	<div class="row">
	  <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
		 <div class="panel panel-default">
		   <div class="panel-heading">
			 <div class="panel-title">Add Machine Details Form</div>
			   </div>
			     <div class="panel-body">
				   	<form name="myFunction" class="form-horizontal" action="admin_add_machine_details_save.php" method="POST">
					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Machine Model No</label>
						  	<div class="col-lg-8">
								<select class="form-control" name="model_no" id="demo" type="dropdown" required="">
								    <option value="">--Select Machine Model No--</option>
								    <?php
	                				 $query_view = "SELECT  * FROM `lt_master_machine_model_no` where `status`='1'";
	                  				 $exe_vieew = mysqli_query($conn,$query_view);
	                				                
	                  				 while($rec = mysqli_fetch_assoc($exe_vieew)){?>
	                    			 <option value="<?php echo $rec['model_id'];?>"><?=strtoupper($rec['model_no']);?></option>
	             					 <?php }?>
	               					
								</select>
						   	</div>
						 </div>
						 <div class="form-group">
						    <label class="control-label col-lg-4 text-right">Machine Unique Id</label>
						    <div class="col-lg-8">
								<input type="text" class="form-control" name="Unique_id" id="demo" placeholder="Enter Machine Unique Id" required="">
						   </div>
						 </div>
						 <div class="form-group">
						    <label class="control-label col-lg-4 text-right">Machine Name</label>
						    <div class="col-lg-8">
								<input type="text" class="form-control" name="machine_name" id="demo" placeholder="Enter Machine Name" required="">
						   </div>
						 </div>
					<!--  <div class="form-group">
						    <label class="control-label col-lg-4 text-right">Client Name</label>
						    <div class="col-lg-8">
								<input type="text" class="form-control" name="client_name" id="demo" placeholder="Enter Client Name" required="">
						   </div>
						 </div> -->
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Machine Mfg Date</label>
							<div class="col-lg-8">
							 	<!-- <input type="text" class="form-control" name="machine_Mfg" id="demo" placeholder="Enter Machine Mfg Date" required=""> -->
							 	<input type="date" class="form-control" name="machine_Mfg" placeholder="Enter Machine Mfg Date"  data-language='en' required />
							</div>
						</div>
						
						<div class="form-group">
						    <label class="control-label col-lg-4 text-right">Machine Commissioning Date</label>
						    <div class="col-lg-8">
								<!-- <input type="text" class="form-control" name="machine_commission" id="demo" placeholder="Enter Machine Commissioning Date" required=""> -->
								<input type="date" class="form-control" name="machine_commission" placeholder="Enter Machine Commissioning Date"  data-language='en' required />
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
include 'templete/header.php';

?>
<script src="../asserts/lib/js/forms/datepicker.min.js"></script>
<script src="../asserts/lib/js/forms/datepicker.en.js"></script>
<script src="../asserts/lib/js/pages/forms/picker_date.js"></script>