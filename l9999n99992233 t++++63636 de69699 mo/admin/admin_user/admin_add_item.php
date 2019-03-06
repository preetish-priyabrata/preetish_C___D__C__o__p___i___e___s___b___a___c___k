<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
  $title="Add New Component Details";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Component Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Component Information</li>
				<li class="active">Add New Component Details</li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
 <div class="container-fluid page-content">
	<div class="row">
	<?php $msg->display(); ?>
	  <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
		 <div class="panel panel-default">
		   <div class="panel-heading">
			 <div class="panel-title">Add Component Details Form</div>
			   </div>
			     <div class="panel-body">
				   	<form name="myFunction" class="form-horizontal" action="admin_add_item_save.php" method="POST">
					  	<div class="form-group">
						  <label class="control-label col-lg-4 text-right"> Model No *</label>
						  	<div class="col-lg-8">
						      <select class="form-control" name="model_no" id="demo" type="dropdown" required="">
							    <option value="preetish">Common Field</option>
							    <?php
	            				 $query_view = "SELECT  * FROM `lt_master_machine_model_no` where `status`='1'";
	              				 $exe_vieew = mysqli_query($conn,$query_view);
	            				                
	              				 while($rec = mysqli_fetch_assoc($exe_vieew)){?>
	                			<option value="<?php echo $rec['model_id'];?>"><?=$rec['model_no'];?></option>
	         					 <?php }?>
               					
							  </select>
						   </div>
						 </div>
						 <div class="form-group">
						    <label class="control-label col-lg-4 text-right">Primary Code *</label>
						    <div class="col-lg-8">
								<input type="text" class="form-control" name="primary_code" id="demo" placeholder="Enter Primary Code" autocomplete="off" required="">
						   </div>
						 </div>
						 <div class="form-group">
						    <label class="control-label col-lg-4 text-right">Secondary Code *</label>
						    <div class="col-lg-8">
								<input type="text" class="form-control" name="secondary_code" id="demo" placeholder="Enter Secondary Code" autocomplete="off" required="">
						   </div>
				  		 </div>
					      <div class="form-group">
						    <label class="control-label col-lg-4 text-right">Component Name *</label>
						    <div class="col-lg-8">
								<input type="text" class="form-control" name="item_name" id="demo" placeholder="Enter Component Name" autocomplete="off" required="">
						   </div>
						</div> 

						<div class="form-group">
						 <label class="control-label col-lg-4 text-right"> Component Category * </label>
						   <div class="col-lg-8">
					         <select class="form-control" name="category_name" autocomplete="off"  id="demo" type="dropdown" required="">
							    <option value="">--Select Component Category Type--</option>
							    <?php
                				 $query_view_category = "SELECT  * FROM `lt_master_component_category` WHERE `status`='1'";
                  				 $exe_view_category = mysqli_query($conn,$query_view_category);
                				                
                  				 while($rec_category = mysqli_fetch_assoc($exe_view_category)){?>
                    			<option value="<?php echo $rec_category['slno'];?>"><?=strtoupper($rec_category['component_category']);?></option>
             					 <?php }?>
               					
							</select>
						  </div>
						</div>
					    <div class="form-group">
						  	<label class="control-label col-lg-4 text-right"> Unit * </label>
							<div class="col-lg-8">
						       <select class="form-control" name="name_unit" autocomplete="off"  id="demo" type="dropdown" required="">
								    <option value="">--Select Unit Type--</option>
								    <?php
	                				 $query_view_unit = "SELECT  * FROM `lt_master_unit_system` WHERE `status`='1'";
	                  				 $exe_view_unit = mysqli_query($conn,$query_view_unit);
	                				                
	                  				 while($res_unit = mysqli_fetch_assoc($exe_view_unit)){?>
	                    			<option value="<?php echo $res_unit['name_unit'];?>"><?=strtoupper($res_unit['name_unit']);?></option>
	             					 <?php }?>
	               					
								</select>
						   	</div>
						</div>

						<div class="form-group">
						    <label class="control-label col-lg-4 text-right">Manufacture Name</label>
						    <div class="col-lg-8">
								<input type="text" class="form-control" name="manufacture_name" autocomplete="off" id="demo" placeholder="Enter Manufacture Name" required="">
						   </div>
						</div>
					    <div class="form-group">
						    <label class="control-label col-lg-4 text-right">Brand Name</label>
						    <div class="col-lg-8"> 
								<input type="text" class="form-control" name="brand_name" autocomplete="off" id="demo" placeholder="Enter Brand Name" required="">
						   </div>
						</div>
						 <div class="form-group">
						    <label class="control-label col-lg-4 text-right">HSN Code</label>
						    <div class="col-lg-8"> 
								<input type="text" class="form-control" name="hsn_code" autocomplete="off" id="demo" placeholder="Enter HSN Code" required="">
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