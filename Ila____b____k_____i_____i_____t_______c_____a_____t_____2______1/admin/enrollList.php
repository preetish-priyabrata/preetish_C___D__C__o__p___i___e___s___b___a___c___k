<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Enquiry List";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View User Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>User Information</li>
				<li class="active">User List</li>
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
				    <div class="panel-title">User Details</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap" cellspacing="0">
							<thead>
								<tr>
 									<th>Student Name</th>
				                    <th>Roll Number</th>
				                    <th>Email Id</th>
				                    <th>Phone No.</th>
				                    <th>Course</th>
				                    <th>Enrollment Date</th>
				                    <th>&nbsp;</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									 <th>Student Name</th>
				                    <th>Roll Number</th>
				                    <th>Email Id</th>
				                    <th>Phone No.</th>
				                    <th>Course</th>
				                    <th>Enrollment Date</th>
				                    <th>&nbsp;</th>
				                </tr>
							</tfoot>
							<tbody>
										<?php 
										
										$query = "SELECT * FROM `tbl_enrollment` WHERE `enrollment_status` = 'Applied' order by `enrollment_id` desc";
										$res = mysqli_query($conn, $query);
										  $i = 0;
               							  while ($rowEnroll = mysqli_fetch_assoc($res)) {
               							  	$i++;
										?>
										<tr>
					                        <td><?php echo $rowEnroll['student_name']; ?></td>
					                        <td><?php echo $rowEnroll['student_roll']; ?></td>
					                        <td><?php echo $rowEnroll['student_email']; ?></td>
					                        <td><?php echo $rowEnroll['student_phone']; ?></td>
					                        <td><?php echo $rowEnroll['student_course']; ?></td>
					                        <td><?php echo substr($rowEnroll['date_time'], 0, 10); ?></td>
					                        <td><a href="enrollList_delete.php?enroll=<?php echo encryptIt_webs($rowEnroll[0]) ?>" onclick="return confirm('Are you sure to delete');">Delete</a></td>
					                    </tr>
										<?php }?>
									</tbody>
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
