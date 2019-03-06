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
  	// print_r($_POST);
  	// Array ( [exam] => 1 [session] => 2 [Center_name] => 1 ) 
 // Array ( [exam] => 2 [location] => Namchi [Preference] => 1 [session] => 1 [Center_name] => 1 )
echo $exam=trim($_POST['exam']);
// $location=trim($_POST['location']);
// $Preference=trim($_POST['Preference']);
$session=trim($_POST['session']);
$Center_name =trim($_POST['Center_name']);
$date=date('Y-m-d');
$time=date('H:i:s');

$get_detail_exam_center="SELECT * FROM `ilab_exam_center` WHERE  `slno_exam`='$Center_name'";
$sql_exam_center=mysqli_query($conn,$get_detail_exam_center);
$res_exam_center=mysqli_fetch_assoc($sql_exam_center);
$total_seat=$res_exam_center['total_seat'];
if($Center_name!=1 && $exam==2 && $session==1){
	 $get_details="SELECT * FROM `ilab_login_paid` WHERE `group_id_d`='1' and `generate_roll_d`='0' ORDER BY`group_both_id` Limit $total_seat";
	 $center_assigned="INSERT INTO `ilab_assign_center_table`(`slno_assign_center`, `group_slno_id`, `exam_center_slno`, `assign_status`, `no_session`, `date`, `time`) VALUES (Null,'$exam','$Center_name','1','1','$date','$time')";
}else if($Center_name==1){

	// SELECT * FROM `ilab_login_paid` WHERE `group_id_driver`='1' ORDER BY`group_both_id` DESC Limit
	if($exam==1 && $session==2){
		$get_details="SELECT * FROM `ilab_login_paid` WHERE `group_id_driver`='1' and `generate_roll_driver`='0' ORDER BY`group_both_id` Limit $total_seat";
		$center_assigned="INSERT INTO `ilab_assign_center_table`(`slno_assign_center`, `group_slno_id`, `exam_center_slno`, `assign_status`, `no_session`, `date`, `time`) VALUES (Null,'$exam','$Center_name','1','1','$date','$time')";
	}else if($exam==2 && $session==1){
		// echo "string";
		echo $get_details="SELECT * FROM `ilab_login_paid` WHERE `group_id_d`='1' and `generate_roll_d`='0' ORDER BY`group_both_id` Limit $total_seat";
		$center_assigned="INSERT INTO `ilab_assign_center_table`(`slno_assign_center`, `group_slno_id`, `exam_center_slno`, `assign_status`, `no_session`, `date`, `time`) VALUES (Null,'$exam','$Center_name','1','1','$date','$time')";
	}

}else{
	$msg->error('Exam Name And Session Mismatched');
	header('Location:admin_assign_roll_to_center_new');
	exit;
}

// $sql_get_details=mysqli_query($conn,$get_details);
// }else{
// 	$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `assign_roll_center`='0' and `group_exam_slno`='$exam' LIMIT $total_seat";
// }
// }

if(mysqli_query($conn,$center_assigned)){
$sql_get_candidate=mysqli_query($conn,$get_details);
$num_rows_candidates=mysqli_num_rows($sql_get_candidate);
}
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
						                            <option value="<?php echo $res_exam["slno_group"]; ?>"><?php echo $exam_group=$res_exam["exam_group"]; ?></option>
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
												$get_detail="SELECT * FROM `ilab_exam_center` WHERE `slno_exam`='$Center_name'";
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
							 <h3><?=$exam_group?></h3>
							</div>

							<?php if($num_rows_candidates!="0"){?>
							 <table class="table">
							 	<tr>
							 		<th>Slno</th>
							 		<th>Candidate Roll No</th>							 		
							 		<th>Mobile</th>
							 		<th>Session</th>
							 		<th>Mobile/slno_roll</th>
							 	</tr>
							<?php 
							
								$x=0;
								 if($_SERVER["REQUEST_METHOD"] == "POST"){
								 	
									while($roll_candidate=mysqli_fetch_assoc($sql_get_candidate)){

										$mobile_no_L=$roll_candidate['mobile_no_L'];
										$slno_L=$roll_candidate['slno_L'];
										$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `assign_roll_center`='0' and `group_exam_slno`='$exam' and `candidate_moblie`='$mobile_no_L'";
										$sql_get_candidate_roll=mysqli_query($conn,$get_candidate);
										$fetch=mysqli_fetch_assoc($sql_get_candidate_roll);
										$x++;
										$slno_roll_id=$fetch['slno_roll_id'];
										if($Center_name!=1 && $exam==2 && $session==1){
											$UPDATE_LOGIN="UPDATE `ilab_login_paid` SET `generate_roll_d`='1' WHERE `slno_L`='$slno_L'";
											if(mysqli_query($conn,$UPDATE_LOGIN)){
											$UPDATE_DETAIL="UPDATE `ilab_pre_exam_roll_no` SET `center_id`='$Center_name' ,`session_id`='$session',`assign_roll_center`='1' WHERE `slno_roll_id`='$slno_roll_id'";
											mysqli_query($conn,$UPDATE_DETAIL);
										}
											

										}else if($Center_name==1){
											if($exam==1 && $session==2){
												$UPDATE_LOGIN="UPDATE `ilab_login_paid` SET `generate_roll_driver`='1' WHERE`slno_L`='$slno_L'";
												if(mysqli_query($conn,$UPDATE_LOGIN)){
												$UPDATE_DETAIL="UPDATE `ilab_pre_exam_roll_no` SET `center_id`='$Center_name' ,`session_id`='$session',`assign_roll_center`='1' WHERE `slno_roll_id`='$slno_roll_id'";
												mysqli_query($conn,$UPDATE_DETAIL);
											}

												
												
											}else if($exam==2 && $session==1){
												$UPDATE_LOGIN="UPDATE `ilab_login_paid` SET `generate_roll_d`='1' WHERE`slno_L`='$slno_L'";
												if(mysqli_query($conn,$UPDATE_LOGIN)){
												$UPDATE_DETAIL="UPDATE `ilab_pre_exam_roll_no` SET `center_id`='$Center_name' ,`session_id`='$session',`assign_roll_center`='1' WHERE `slno_roll_id`='$slno_roll_id'";
												mysqli_query($conn,$UPDATE_DETAIL);
											}
												
											}

										}	
										// `roll_no```, ``, `roll_no`
										// if ($session==2) {
											?>

										<tr class="info" >
											<td><?=$x?></td>
											<input type="hidden" name="slno_L[<?=$x?>]" value="<?=$roll_candidate['slno_L']?>">
										   <td><?=$fetch['roll_no']?></td>
										   <td><?=$fetch['candidate_moblie']?></td>
										  <input type="hidden" name="slno_roll[<?=$x?>]" value="<?=$fetch['slno_roll_id']?>">
										  <input type="hidden" name="roll_no[<?=$x?>]" value="<?=$fetch['roll_no']?>">
										  <td><?=$mobile_no_L?>/ <?=$fetch['slno_roll_id']?></td>
										   <td><?=$session?> Session</td>
										</tr>
										<?php
										// }else{
											?>

										<!-- <tr class="success" >
											<td><?=$x?></td>
											<input type="hidden" name="slno_L[]" value="<?=$roll_candidate['slno_L']?>">
										  <td><?=$fetch['roll_no']?></td>
										   <td><?=$fetch['candidate_moblie']?></td>
										  <input type="hidden" name="slno_roll[]" value="<?=$fetch['slno_roll_id']?>">
										  <input type="hidden" name="roll_no[]" value="<?=$fetch['roll_no']?>">
										  <td>1st Session</td>
										   
										</tr> -->
										
										<?php 
									// }

							?>
							

							<?php }?>
							</table>
							<p><b>Note</b> :-<br>
								1. <span class="text-success"> This stands for 1st session</span><br>
								2. <span class="text-info"> This stands for 2nd session</span><br>
							<?php if($num_rows_candidates!="0"){?>
							<div class="text-center">
							<!-- <input type="submit" class="btn btn-info "  value="Assign Roll No To Center"  > -->
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

