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
			<div class="page-title"><i class="icon-display4"></i>Edit Field</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Location</li>
				<li class="active">Edit Field Form</li>
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
						<div class="panel-title">Edit Field Form</div>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="admin_location_add_Field_edit_save.php" method="POST">
                         <?php
                            $query ="SELECT * FROM `lt_master_field_place` where `slno`='$slno'";  
                     	  	$query_exe = mysqli_query($conn,$query);
             			  	if(mysqli_num_rows($query_exe)){          
               				while($rec = mysqli_fetch_array($query_exe))
               				{
              			 ?>
              		
               			<input type="hidden" value="<?php echo $rec['slno']; ?>" name="slno">
              
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Field Name</label>
								   <div class="col-lg-8">
									<input class="form-control" name="field_name" type="text" value="<?php echo $rec['field_name'];?>"  required="">
								</div>
							 </div>
							 <div class="form-group">
								<label class="control-label col-lg-4 text-right">Field short code</label>
								   <div class="col-lg-8">
									<input class="form-control" readonly="" type="text" value="<?php echo $rec['manual_field_code'];?>"  >
								</div>
							 </div>
							
							<br>
							<?php 

							}
						}
							 ?>

							 <a href="admin_location_add_Field_view.php" class="btn btn-info"  value="Back" onclick="myFunction()">Back</a>
					   	  	<div class="form-group pull-right">

					    	<input type="submit" class="btn btn-info"  value="Update" onclick="myFunction()">

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

