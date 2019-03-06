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
				<li><a href="#">Manage Center Assignment </a></li>
				<li class="active">Center Assignment</li>
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
						<div class="panel-title">Center Assignment Form</div>
					</div>
					<div class="panel-body">
						<form action="admin_assign_roll_to_center" method="POST">
							<div class="row">
								<div class="form-group">
									<label class="control-label col-lg-3 text-right">Exam Category</label>
									<div class="col-lg-7">
										<select id="exam" name="exam" onchange="get_center_name()" class="form-control" required>
						                    <option value="">--Select Exam--</option>
						                    <?php
				      				            $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2'";
				      				            $sql_exam=mysqli_query($conn, $qry_exam);
				      				            while($res_exam=mysqli_fetch_array($sql_exam)){
					  				        ?>
					                            <option value="<?php echo $res_exam["slno_group"]; ?>"><?php echo $res_exam["exam_group"]; ?></option>
						                    <?php
						  				        }
						  				     ?>
						                </select>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<label class="control-label col-lg-3 text-right">Location</label>
									<div class="col-lg-7">
										<select id="location" name="location" onchange="get_center_name()" class="form-control" required>
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
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<label class="control-label col-lg-3 text-right">Preference </label>
									<div class="col-lg-7">
										<select id="Preference" name="Preference" class="form-control" required>
						                    <option value="1"> Preference 1</option>
						                     <option value="2"> Preference 2</option>
						                </select>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<label class="control-label col-lg-3 text-right">Session </label>
									<div class="col-lg-7">
										<select name="session" id="session" class="form-control" >
											<option value="1">1 Session</option>
											<option value="2">2 Session</option>
										</select>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<label class="control-label col-lg-3 text-right">Center Name </label>
									<div class="col-lg-7">
										<select name="Center_name" id="Center_name" required="" class="form-control" >
											<option value="">----</option>
											<!-- <option value="1">1 Session</option>
											<option value="2">2 Session</option> -->
										</select>
									</div>
								</div>
							</div>
							<div class="text-center">
							 <small id="emailHelp" class="form-text text-muted text-danger">Kindly wait, while centre assigning process is going on. Don't click on refresh or back button.*</small>
							 <br>
							<input type="submit" class="btn btn-info pull-right"  value="Get Candidate Roll No"  >
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

<script type="text/javascript">
	function get_center_name() {
		var exam=$('#exam').val();
		var location=$('#location').val();
		  if(exam!=""){
		    $.ajax({
		        type:'POST',
		        url:'get_perference',
		        data:'exam='+exam+'&location='+location,
		        success:function(html){   
		          $('#Center_name').html(html);                    
		        }
		      });

		  }else{
		    $('#Center_name').html("<option value=''>--Please Select Exam Group--</option>");
		  }
	}
</script>
