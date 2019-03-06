<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Enrollment Details";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Enrollment Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Enrollment Details</li>
				<li class="active">Enrollment List</li>
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
				    <div class="panel-title">Enrollment Details</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap" cellspacing="0">
							<thead>
								<tr>
									<th>Enrollment Date</th>
 									<th>Student Name</th>
				                    <th>Roll Number</th>
				                    <th>Email Id</th>
				                    <th>Phone No.</th>
				                    <th>Course</th>
				                    
				                    <th>&nbsp;</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									<th>Enrollment Date</th>
									 <th>Student Name</th>
				                    <th>Roll Number</th>
				                    <th>Email Id</th>
				                    <th>Phone No.</th>
				                    <th>Course</th>
				                    
				                    <th>&nbsp;</th>
				                </tr>
							</tfoot>
							<tbody>
										<?php 
										
										$query = "SELECT * FROM `tbl_enrollment` WHERE `enrollment_status` = '1' order by `enrollment_id` desc limit 1500";
										$res = mysqli_query($conn, $query);
										  $i = 0;
               							  while ($rowEnroll = mysqli_fetch_assoc($res)) {
               							  	$i++;
										?>
										<tr>
											<td><?php echo substr($rowEnroll['date_time'], 0, 10); ?></td>
					                        <td><?php echo $rowEnroll['student_name']; ?></td>
					                        <td><?php echo $rowEnroll['student_roll']; ?></td>
					                        <td><?php echo $rowEnroll['student_email']; ?></td>
					                        <td><?php echo $rowEnroll['student_phone']; ?></td>
					                        <td><?php 
					                        $student_course=$rowEnroll['student_course'];
					                        	$cource="SELECT * FROM `tbl_course` WHERE `sl_no`='$student_course'";
					                        	$sql_exe=mysqli_query($conn,$cource);
					                        	$res_cource=mysqli_fetch_assoc($sql_exe);
					                        	echo $res_cource['course_name'];
					                         ?></td>
					                        
					                        <td>
					                            <div class="btn-group">
				                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				                                    	Action
				                                    	<i class="icon-three-bars position-right"></i>
				                                    </button>
				                                    <ul class="dropdown-menu">
				                                        <li><a href="enrollList_edit.php?enroll=<?php echo encryptIt_webs($rowEnroll['enrollment_id']); ?>">Edit</a></li>
				                                        <li class="divider"></li>
				                                        <li><a href="enrollList_delete.php?enroll=<?php echo encryptIt_webs($rowEnroll['enrollment_id']); ?>" onclick="return confirm('Are you sure to delete.');">Delete</a></li>
				                                        
				                                    </ul>
				                                </div>
					                        <!-- <a href="enrollList_delete.php?enroll=<?php echo encryptIt_webs($rowEnroll['enrollment_id']) ?>" onclick="return confirm('Are you sure to delete');">Delete</a></td> -->
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
