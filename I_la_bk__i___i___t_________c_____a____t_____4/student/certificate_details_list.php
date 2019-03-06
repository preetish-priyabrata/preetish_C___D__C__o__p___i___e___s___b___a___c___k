<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['L_student_roll']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Course List";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Certificate List</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>View Certificate List</li>
				<!-- <li class="active">User List</li> -->
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
				    <div class="panel-title">View Certificate List</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap table-striped" cellspacing="0">
							<thead>
								<tr>										
				                    
			                        <th>Program Name</th>
			                        <th>Complete Certificate</th>
			                        <th>Merit Certificate</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									
			                        <th>Program Name</th>
			                        <th>Complete Certificate</th>
			                        <th>Merit Certificate</th>
				                </tr>
							</tfoot>
							<tbody>
								<?php 
								$student_roll=$_SESSION['L_student_roll'];
								$student_query1="SELECT DISTINCT `batch_id`,`course_id` FROM `tbl_certificate_list` WHERE  `student_roll`='$student_roll' ";
								$student_sql1=mysqli_query($conn,$student_query1);
								while ($res=mysqli_fetch_assoc($student_sql1)) {
								// print_r($res);
								$batch_id=$res['batch_id'];
								$course_id=$res['course_id'];
								$student_query2="SELECT * FROM `tbl_certificate_list` WHERE `batch_id`='$batch_id' and `course_id`='$course_id' and `student_roll`='$student_roll'  ";
								$student_sql2=mysqli_query($conn,$student_query2);
								$student_query3="SELECT * FROM `tbl_certificate_list` WHERE `batch_id`='$batch_id' and `course_id`='$course_id' and `student_roll`='$student_roll'  ";
								$student_sql3=mysqli_query($conn,$student_query3);
								$res3=mysqli_fetch_assoc($student_sql3);
								
						?>
				<tr>
					
					
					<td><?=$res3['student_course'];?></td>
					<?php while ($res2=mysqli_fetch_assoc($student_sql2)) {
						
						if(($res2['certificate_status']==2) && ($res2['type_cer']==8) ){
							?>
							<td><a href="#">Click For Merit</a></td>
							<?php

						}
						if(($res2['certificate_status']==4) && ($res2['type_cer']==8)){
							?>
							<td>--</td>
							<?php

						}
						if(($res2['certificate_status']==1 )&& ($res2['type_cer']==9)) {
							?>
							<td><a href="#">Click For Completation</a></td>
							<?php

						}
						if(($res2['certificate_status']==3) && ($res2['type_cer']==9)){
							?>
							<td>--</td>
							<?php

						}

					}?>
				
				</tr>
				<?php }?>
							  </tbody>
							</table>
						  </div>
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
