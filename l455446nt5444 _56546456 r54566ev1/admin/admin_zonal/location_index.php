<?php

session_start();
ob_start();
if($_SESSION['admin_zonal']){
	include  '../config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Zonal Officer";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
			<ul class="breadcrumb">
				<li><a href="#"></a></li>
				<!-- <li class="active">Dashboards</li> -->
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
		<?php $msg->display(); ?>
			
		</div>
	</div>
	<div class="container-fluid page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Please Location </div>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="location_index_save.php" method="POST">
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Component Category Name</label>
								<div class="col-lg-8">
									<select name="zonal_code" id="zonal_code" class="form-control" required="">
										<option value="">--Select Zonal--</option>
										<?php 

										$query="SELECT * FROM `lt_master_zonal_place` WHERE `status`='1'";
											$sql_exe=mysqli_query($conn,$query);
											while ($res=mysqli_fetch_assoc($sql_exe)) {
											?>
												<option value="<?=$res['zonal_code']?>"><?=$res['zonal_name']?></option>
												<?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group pull-right">
								
								<input type="submit" class="btn btn-info"  value="Save"  >
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

