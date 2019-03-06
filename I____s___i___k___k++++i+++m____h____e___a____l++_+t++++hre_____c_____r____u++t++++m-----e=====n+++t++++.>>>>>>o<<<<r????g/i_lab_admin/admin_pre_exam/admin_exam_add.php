<?php
session_start();
ob_start();
if($_SESSION['admin_preexam']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
   $title="Create Exam Center           ";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Exam Center</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Exam Center</li>
				<li class="active">Add New Exam Center</li>
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
						<div class="panel-title">Add Exam Center</div>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="admin_exam_add_save" method="POST">
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Exam Center Name</label>
								<div class="col-lg-8">
									<input class="form-control" name="class_name" placeholder="Enter Exam Center Name" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Total Capacity</label>
								<div class="col-lg-8">
									<input class="form-control" min="1" name="total_seat" placeholder="Enter Total Seat" type="number" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Location</label>
								<div class="col-lg-8">
									<select class="form-control" id="Preference" name="Preference" required="">
					                    <option value="">----</option>
					                    <?php 
					                    $edu="SELECT * FROM `ilab_location_exam_praference` WHERE `status`='1'";
					                    $sql_edu=mysqli_query($conn,$edu);
					                    while($res_edu=mysqli_fetch_assoc($sql_edu)){
					                    ?>
					                    <option value="<?=$res_edu['location']?>"><?=$res_edu['location']?></option>
					                    <?php }?>
					                </select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Center Address</label>
								<div class="col-lg-8">
									<textarea class="form-control" rows="5" name="Center_Address"  id="Center_Address" required="" placeholder="Enter Center Address"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Contact Person Name</label>
								<div class="col-lg-8">
									<input class="form-control" name="Contact_name" placeholder="Enter Contact Person Name" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Contact Person No</label>
								<div class="col-lg-8">
									<input class="form-control" name="Contact_no" placeholder="Enter Contact Person No" type="text" required="">
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
	header('Location:logout');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';

?>
