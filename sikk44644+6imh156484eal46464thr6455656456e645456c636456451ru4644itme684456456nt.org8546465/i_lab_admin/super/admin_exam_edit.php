<?php

session_start();
ob_start();
if($_SESSION['admin_preexam']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
   $title="Edit Exam Center  ";
   $slno_exam=$_GET['slno_exam'];
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Edit Exam Center</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Exam Center</li>
				<li class="active">Edit Exam Center</li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<?php
		$check="SELECT * FROM `ilab_exam_center` WHERE `slno_exam`='$slno_exam'" ;
		$check_exe=mysqli_query($conn,$check);
		  if(mysqli_num_rows($check_exe)){                    
			 while($rec = mysqli_fetch_array($check_exe)){
		
  ?>
	<div class="container-fluid page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Edit Exam Center</div>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="admin_exam_edit_save" method="POST">
					     <input type="hidden" name="slno_exam" value="<?php echo $rec['slno_exam'];?>">
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Exam Center Name</label>
								<div class="col-lg-8">
									<input class="form-control" name="class_name" value="<?php echo $rec['exam_name'];?>" placeholder="Enter Exam Center Name" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Total Capacity</label>
								<div class="col-lg-8">
									<input class="form-control" name="total_seat" value="<?php echo $rec['total_seat'];?>" placeholder="Enter Total Seat" type="number" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Center Address</label>
								<div class="col-lg-8">
									<textarea class="form-control" rows="5" name="Center_Address"  id="Center_Address" required=""><?php echo ($rec['Center_Address']);?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Contact Person Name</label>
								<div class="col-lg-8">
									<input class="form-control" name="Contact_name" placeholder="Enter Exam Center Name" value="<?php echo ($rec['Contact_name']);?>" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Contact Person No</label>
								<div class="col-lg-8">
									<input class="form-control" name="Contact_no" placeholder="Enter Exam Center Name" type="text"  value="<?php echo ($rec['Contact_no']);?>" required="">
								</div>
							</div>
							<div class="form-group pull-right">
								
								<input type="submit" class="btn btn-info"  value="Save"  >
							</div>
						</form>
						<?php
					}
				}
						?>
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
