<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Create HeadQuarter Location ";
 include 'config.php';
 $slno=$_GET['slno'];
 // print_r($_POST);
 // exit;
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Edit Zonal</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Location</li>
				<li class="active">Edit Zonal</li>
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
						<div class="panel-title">Edit Zonal Form</div>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="admin_location_add_Zonal_edit_save.php" method="POST">
                         <?php
                            $query ="SELECT * FROM `lt_master_zonal_place` where `slno`='$slno'";  
                     	  	$query_exe = mysqli_query($conn,$query);
             			  	if(mysqli_num_rows($query_exe)==1){          
               				$rec = mysqli_fetch_array($query_exe);
               				
              			 ?>
              		
               			<input type="hidden" value="<?php echo $rec['slno']; ?>" name="slno">
              
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Zonal Name</label>
								   <div class="col-lg-8">
									<input value="<?php echo strtoupper($rec['zonal_name']);?>" class="form-control" name="zonal_name" type="text" required="">
								</div>
							 </div>
							 <div class="form-group">
								<label class="control-label col-lg-4 text-right">Address 1</label>
								<div class="col-lg-8">
									<input value="<?php echo strtoupper($rec['address_1']);?>" class="form-control" name="address1" placeholder="Enter Zonal Address 1" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Address 2</label>
								<div class="col-lg-8">
									<input value="<?php echo strtoupper($rec['address_2']);?>" class="form-control" name="address2" placeholder="Enter Zonal Address 2" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">C/O</label>
								<div class="col-lg-8">
									<input value="<?php echo strtoupper($rec['address_3']);?>" class="form-control" name="address3" placeholder="Enter Zonal C/O" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">PO</label>
								<div class="col-lg-8">
									<input value="<?php echo strtoupper($rec['address_4']);?>" class="form-control" name="address4" placeholder="Enter Zonal PO" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">City</label>
								<div class="col-lg-8">
									<input value="<?php echo strtoupper($rec['address_5']);?>" class="form-control" name="address5" placeholder="Enter Zonal City" type="text" required="">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">District</label>
								<div class="col-lg-8">
									<input value="<?php echo strtoupper($rec['address_6']);?>" class="form-control" name="address6" placeholder="Enter Zonal District" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">State</label>
								<div class="col-lg-8">
									<input value="<?php echo strtoupper($rec['address_7']);?>" class="form-control" name="address7" placeholder="Enter Zonal State" type="text" required="">
								</div>
							</div>
								<div class="form-group">
								<label class="control-label col-lg-4 text-right">Pin</label>
								<div class="col-lg-8">
									<input value="<?php echo strtoupper($rec['address_8']);?>" class="form-control" name="address8" placeholder="Enter Zonal Pin" type="number" required="">
								</div>
							</div>
							
							<br>
							<?php 

							
							}else{

							}
							 ?>

							 <a href="admin_location_add_Zonal_view.php" class="btn btn-info"  value="Back" onclick="myFunction()">Back</a>
					   	  	<div class="form-group pull-right">

					    	<input  type="submit" class="btn btn-info"  value="Update" onclick="myFunction()">

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

