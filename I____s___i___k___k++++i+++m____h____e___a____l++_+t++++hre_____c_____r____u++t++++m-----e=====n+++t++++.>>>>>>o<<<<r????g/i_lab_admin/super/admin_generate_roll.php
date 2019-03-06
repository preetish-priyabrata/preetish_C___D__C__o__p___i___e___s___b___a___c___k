<?php

session_start();
ob_start();
if($_SESSION['admin_preexam']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Officer";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
			<ul class="breadcrumb">
				<li><a href="#">Manage Roll No</a></li>
				<li class="active">Generate Roll No</li>
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
						<div class="panel-title">Generate Roll No</div>
					</div>
					<div class="panel-body">
						<form action="admin_generate_roll_save" method="POST">
							<div class="form-group">
								<label class="control-label col-lg-3 text-right">Exam Category</label>
								<div class="col-lg-7">
									<select id="exam" name="exam" class="form-control" required>
					                    <option value="">--Select Exam--</option>
					                    <?php
					      				            $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='0' and `status`='2'";
					      				            $sql_exam=mysqli_query($conn, $qry_exam);
					      				            while($res_exam=mysqli_fetch_array($sql_exam)){
					  				          ?>
					                            <option value="<?php echo $res_exam["slno_group"]; ?>"><?php echo $res_exam["exam_group"]; ?></option>
					                    <?php
					  				                }
					  				          ?>
					                </select>
								</div>
								<input type="submit" class="btn btn-info"  value="Generate Roll No"  >
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

