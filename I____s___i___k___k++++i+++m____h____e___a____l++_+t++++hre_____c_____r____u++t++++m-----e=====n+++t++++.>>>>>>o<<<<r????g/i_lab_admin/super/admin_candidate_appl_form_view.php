<?php

session_start();

if($_SESSION['admin_tech']){
require 'FlashMessages.php';
require '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="View Candidate Application Form List";
ob_start();
// SELECT * FROM ilab_login as login INNER JOIN application_form as form ON login.mobile_no_L=form.candidate_mobile where login.status='1' AND login.basic_status='1' and login.complete_status='1';
//$slno=$_POST['slno'];
	$get_mobile="SELECT * FROM ilab_login as login INNER JOIN application_form as form ON login.mobile_no_L=form.candidate_mobile where login.status='1' AND login.basic_status='1' and login.complete_status='1'";
	$sql_exe_get_mobile=mysqli_query($conn,$get_mobile);
?>

<!--Page Header-->
<div class="header">
	<div class="header-content">
		<div class="page-title"><i class="icon-display4"></i>View Candidate Application Form</div>
		<ul class="breadcrumb">
			<li><a href="admin_dashboard.php"></a></li>
			<li><a href="#"></a>Candidate Application Form System</li>
			<li class="active">Application Form List</li>
		</ul>
	</div>
</div>
<div class="container-fluid page-content">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<?php $msg->display(); ?>
		</div>
	</div>
</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Candidate Application Form List</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form method="POST" enctype="multipart/form-data" action="">
                            <table id="example" class="display nowrap" width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						                <th>[appli][login]</th>
						                <th>Candidate Name</th>
						                <th>Candidate Mobile</th>
						                <th>Candidate Application</th>
						                
						                <th>sikkim_subject_no</th>
						                <th>Date</th>
						                <th>Time</th>
						                <th>Action</th>
						                <!-- <th>Status</th>
						                <th>Action</th> -->
						                		                
						            </tr>
						        </thead>
	        					<tfoot>
		            				<tr style="text-align: center;">
		                 			   <th>Slno</th>
		                 			    <th>[appli][login]</th>
						                <th>Candidate Name</th>
						                <th>Candidate Mobile</th>
						                <th>Candidate Application</th>
						                <!-- <th>candidate_photo</th> -->
						                <th>sikkim_subject_no</th>
						                <th>Date</th>
						                <th>Time</th>
						                <!-- <th>Status</th> -->
						                <th>Action</th>
						             
	        					</tfoot>
	        					<tbody>
	        						<?php 
	        							$x=0;
	        						
	        							
	        							while ($get_mobile_fetch=mysqli_fetch_assoc($sql_exe_get_mobile)) {
	        							// 	$candidate_mobile=$get_mobile_fetch['mobile_no_L'];
	        							// $query_sql="SELECT * FROM `application_form` WHERE `candidate_mobile`='$candidate_mobile'and`status`='1'";
	        							// $sql_exe=mysqli_query($conn,$query_sql);
	        							// $get_mobile_fetch=mysqli_fetch_assoc($sql_exe);
	        								$x++;
	        								
	        								// `application_no`, `candidate_mobile`
	        								?>
	        						  <tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td>[<?=$get_mobile_fetch['slno']?>][<?=$get_mobile_fetch['slno_L']?>]</td>
	        							<td><?=$get_mobile_fetch['candidate_name']?></td>
	        							<td><?=$get_mobile_fetch['candidate_mobile']?></td>
	        							<td><?=$get_mobile_fetch['application_no']?></td>
	        							
	        							<td><?=$get_mobile_fetch['sikkim_subject_no']?></td>
	        							<td><?=$get_mobile_fetch['date']?></td>
	        							<td><?=$get_mobile_fetch['time']?></td>
	        							<!-- <td><?=$get_mobile_fetch['status']?></td> -->
	        							<td><a href="admin_candidate_appl_form_view_details?slno=<?=$get_mobile_fetch['slno']?>" class="btn btn-success">View</a>
	        							
	        							<a href="admin_candidate_appl_form_edit_details?slno=<?=$get_mobile_fetch['slno']?>" class="btn btn-success">Edit</a>
	        							</td>
	        						</tr>
	        						<?php }?>
	        					</tbody>
    						</table>
    					</form>
                     </div>
				  </div>
			  </div>						
		   </div>
		</div>
	</div>

<?php
$contents = ob_get_contents();
ob_clean();
ob_end_flush();
include '../template/header.php';

}else{
	header('Location:logout');
	exit;
}

?>
