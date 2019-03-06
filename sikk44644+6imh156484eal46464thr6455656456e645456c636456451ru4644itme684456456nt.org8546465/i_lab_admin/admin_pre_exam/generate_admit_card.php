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
			<div class="page-title"><i class="icon-display4"></i> Admit Card</div>
			<ul class="breadcrumb">
				<li><a href="#">Manage Admit Card </a></li>
				<li class="active">Admit Card</li>
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
						<div class="panel-title">Generate Admit Card</div>
					</div>
					<div class="panel-body">
						<form action="generate_admit_card_save" method="POST" class="form-horizontal">
								<div class="form-group">
									<label class="control-label col-lg-4 text-right">Exam Category</label>
									<div class="col-lg-8">
										<select id="exam" name="exam" onchange="get_center_name()" class="form-control" required>
						                    <option value="">--Select Exam--</option>
					                    <?php
			      				            $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2' and `assign_date_status`='1' and `generate_all_status`='1' and `admit_status`='0'";
			      				            $sql_exam=mysqli_query($conn, $qry_exam);
			      				            while($res_exam=mysqli_fetch_array($sql_exam)){
			      				            	
					  				          ?>
					                         <option value="<?php echo $res_exam["slno_group"]; ?>"  ><?php echo $res_exam["exam_group"]; ?></option>
				                        <?php
				                        	
				  				              }
				  				          ?>
						                </select>
									</div>
							    </div>
							


							    <div class="text-center">
						   
							<input type="submit" class="btn btn-info"  value="Generate Admit Card"  >
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
