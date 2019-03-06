<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Create New Field Location";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Field</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Location Setting</li>
				<li><a href="#"></a>Field Location</li>				
				<li class="active">Add New Field</li>
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
				  <div class="panel-title">Add Field Form</div>
				    </div>
				      <div class="panel-body">
						<form class="form-horizontal" action="admin_location_add_Field_save.php" method="POST">

						   <div class="form-group">
						     <label class="control-label col-lg-4 text-right">HeadQuarter</label>
						       <div class="col-lg-8">
							     <select name="hq_code" id="hq_code" onchange="get_zonal()" class="form-control" required="">
								    <option value="">--Select HeadQuarter--</option>
									 <?php 
										$query_sql="SELECT * FROM `lt_master_hq_place` WHERE `status`='1'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        						 ?>
									<option value="<?=$result['hq_code']?>"><?=$result['hq_name']?></option>
									<?php }?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Zonal</label>
								<div class="col-lg-8">
									<select name="zonal_code" id="zonal_code" class="form-control" required="">
										<option value="">--Select Zonal--</option>
									</select>
								</div>
							</div>

							<div class="form-group">
							  <label class="control-label col-lg-4 text-right">Field</label>
								<div class="col-lg-8">
									<input class="form-control" name="field_name" placeholder="Enter Zonal Name" type="text" required="">
								</div>
							</div>
							<div class="form-group">
							  <label class="control-label col-lg-4 text-right">Field Short code</label>
								<div class="col-lg-8">
									<input class="form-control" name="field_name_code" placeholder="Enter Zonal Short code Name" type="text" required="">
								</div>
							</div>
														<div class="form-group">
								<label class="control-label col-lg-4 text-right">Address 1</label>
								<div class="col-lg-8">
									<input class="form-control" name="address1" placeholder="Enter Zonal Address 1" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Address 2</label>
								<div class="col-lg-8">
									<input class="form-control" name="address2" placeholder="Enter Zonal Address 2" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">C/O</label>
								<div class="col-lg-8">
									<input class="form-control" name="address3" placeholder="Enter Zonal C/O" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">PO</label>
								<div class="col-lg-8">
									<input class="form-control" name="address4" placeholder="Enter Zonal PO" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">City</label>
								<div class="col-lg-8">
									<input class="form-control" name="address5" placeholder="Enter Zonal City" type="text" required="">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">District</label>
								<div class="col-lg-8">
									<input class="form-control" name="address6" placeholder="Enter Zonal District" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">State</label>
								<div class="col-lg-8">
									<input class="form-control" name="address7" placeholder="Enter Zonal State" type="text" required="">
								</div>
							</div>
								<div class="form-group">
								<label class="control-label col-lg-4 text-right">Pin</label>
								<div class="col-lg-8">
									<input class="form-control" name="address8" placeholder="Enter Zonal Pin" type="number" required="">
								</div>
							</div>

							<div class="form-group pull-right">
							   <input type="submit" class="btn btn-info"  value="Save" >
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
<script type="text/javascript">
	function get_zonal() {
		var hq_code=$('#hq_code').val();
		if(hq_code!=""){
			$.ajax({
	          	type:'POST',
	          	url:'admin_get_zonal_details.php',
	          	data:'hq_id='+hq_code,
	          	success:function(html){
	            	  // $remove_display
	             	// $("#remove_display").remove(); 
	              	$('#zonal_code').html(html);
	             
	          	}
      		}); 
		}else{
			$('#zonal_code').html('<option value="">-- Please Select HeadQuarter -- </option>'); 
		}
	}
</script>