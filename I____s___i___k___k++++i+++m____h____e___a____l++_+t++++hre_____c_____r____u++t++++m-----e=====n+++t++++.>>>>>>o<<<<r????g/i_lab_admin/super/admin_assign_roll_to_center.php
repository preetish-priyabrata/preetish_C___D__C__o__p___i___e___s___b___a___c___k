<?php
// error_reporting(E_ALL);
error_reporting(E_ALL | E_STRICT);  
ini_set('display_startup_errors',1);  
ini_set('display_errors',1);
session_start();
ob_start();
if($_SESSION['admin_preexam']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Officer";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
 // Array ( [exam] => 2 [location] => Namchi [Preference] => 1 [session] => 1 [Center_name] => 1 )
$exam=trim($_POST['exam']);
$location=trim($_POST['location']);
$Preference=trim($_POST['Preference']);
$session=trim($_POST['session']);
$Center_name =trim($_POST['Center_name']);

$get_detail_exam_center="SELECT * FROM `ilab_exam_center` WHERE `Preference`='$location' and `slno_exam`='$Center_name'";
$sql_exam_center=mysqli_query($conn,$get_detail_exam_center);
$res_exam_center=mysqli_fetch_assoc($sql_exam_center);
$total_seat=$session*$res_exam_center['total_seat'];

if($Preference=='1'){
	$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `assign_roll_center`='0' and `group_exam_slno`='$exam' and `location_one`='$location' LIMIT $total_seat";
}else{
	$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `assign_roll_center`='0' and `group_exam_slno`='$exam' and `location_two`='$location' LIMIT $total_seat";
}
$sql_get_candidate=mysqli_query($conn,$get_candidate);
$num_rows_candidates=mysqli_num_rows($sql_get_candidate);


}else{
header('Location:admin_assign_roll_to_center_new');
exit;
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
						<form action="admin_assign_roll_to_center_save" method="POST">
							<div class="row">
								<div class="form-group">
									<label class="control-label col-lg-3 text-right">Exam Category</label>
									<div class="col-lg-7">
										<select id="exam" name="exam" onchange="" class="form-control" required>
						                   
						                    <?php
						      				            $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2' and `slno_group`='$exam'";
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
					                    $edu="SELECT * FROM `ilab_location_exam_praference` WHERE `status`='1' AND `location`='$location'";
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
											<?php if($Preference=='1'){?>
						                    <option value="1" <?php if($Preference=='1'){ echo "selected";}?>> Preference 1</option>
						                    <?php }else if($Preference=='2'){ ?>
						                     <option value="2" <?php if($Preference=='2'){ echo "selected";}?> > Preference 2</option>
						                     <?php }?>
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
											<?php if($session=='1'){?>
											<option value="1" <?php if($session=='1'){ echo "selected";}?>>1 Session</option>
											<?php }else if($session=='2'){?>
											<option value="2" <?php if($session=='2'){ echo "selected";}?>>2 Session</option>
											<?php }?>
										</select>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group">
									<label class="control-label col-lg-3 text-right">Center Name </label>
									<div class="col-lg-7">
										<select name="Center_name" id="Center_name" class="form-control" >
											<?php 
												$get_detail="SELECT * FROM `ilab_exam_center` WHERE `Preference`='$location' and `slno_exam`='$Center_name'";
												$sql=mysqli_query($conn,$get_detail);
												while ($res=mysqli_fetch_assoc($sql)) {

											?>
											<option value="<?=$res['slno_exam']?>"><?=$res['exam_name']?>[<?=$res['total_seat']?>]</option>

											<?php 
												}
											?>
											
										</select>
									</div>
								</div>
							</div>
							<br>
							<div class="text-center">
							 <small id="emailHelp" class="form-text text-muted text-danger">Kindly wait, while centre assigning process is going on. Don't click on refresh or back button.*</small>
							 <h3>XYZ</h3>
							</div>

							<?php if($num_rows_candidates!="0"){?>
							 <table class="table">
							 	<tr>
							 		<th>Candidate Roll No</th>							 		
							 		<th>Mobile</th>
							 		<th>Session</th>
							 	</tr>
							<?php 
							
								$x=0;
								 if($_SERVER["REQUEST_METHOD"] == "POST"){
								 	
									while($roll_candidate=mysqli_fetch_assoc($sql_get_candidate)){

										$x++;
										
										// `roll_no```, ``, `roll_no`
										if ($x > $res_exam_center['total_seat']) {?>

										<tr class="info" >
										   <td><?=$roll_candidate['roll_no']?></td>
										   <td><?=$roll_candidate['candidate_moblie']?></td>
										  <input type="hidden" name="slno_roll[1][]" value="<?=$roll_candidate['slno_roll_id']?>">
										  <input type="hidden" name="roll_no[1][]" value="<?=$roll_candidate['roll_no']?>">
										   <td>2nd Session</td>
										</tr>
										<?php
										}else{
											?>

										<tr class="success" >
										  <td><?=$roll_candidate['roll_no']?></td>
										   <td><?=$roll_candidate['candidate_moblie']?></td>
										  <input type="hidden" name="slno_roll[0][]" value="<?=$roll_candidate['slno_roll_id']?>">
										   <input type="hidden" name="roll_no[0][]" value="<?=$roll_candidate['roll_no']?>">
										  <td>1st Session</td>
										   
										</tr>
										
										<?php }

							?>
							

							<?php }?>
							</table>
							<p><b>Note</b> :-<br>
								1. <span class="text-success"> This stands for 1st session</span><br>
								2. <span class="text-info"> This stands for 2nd session</span><br>
							<?php if($num_rows_candidates!="0"){?>
							<div class="text-center">
							<input type="submit" class="btn btn-info "  value="Assign Roll No To Center"  >
							</div>
							<?php 
						}

						}
						?>
						<?php }else{?>

							<div class="row">
								<div class="form-group">
									<label class="control-label col-lg-12 text-center"><b> No Candidate Roll No Is found</b></label>
									
								</div>
							</div>

							<?php


							}?>

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

