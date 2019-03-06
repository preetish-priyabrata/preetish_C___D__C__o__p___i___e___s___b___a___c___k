<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
   $title="Create Component Category System           ";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Component Category</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Component Category System</li>
				<li class="active">Add New Component Category</li>
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
						<div class="panel-title">Add Component Category</div>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="admin_add_component_category_save.php" method="POST">
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Component Category Name</label>
								<div class="col-lg-8">
									<input class="form-control" name="component_category" placeholder="Enter Component Category Name" type="text" required="">
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

