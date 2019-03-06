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
	
<!-- BEGIN RIGHTSIDE -->
        <div class="rightside bg-grey-50">
			<!-- BEGIN PAGE HEADING -->
            <div class="page-head">
				<h1 class="page-title">Enquiry List<small>All Start From Here</small></h1>
			</div>
			
				<div class="row">
				<?php $msg->display(); ?>
					
				</div>
			

			<!-- END PAGE HEADING -->
			<div class="container-fluid">
				<div class="row">
				<div class="col-lg-12">
					<div class="panel ">
					  <div class="panel-heading">Panel Heading</div>
					  <div class="panel-body">
					  	<div class="">
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
							</table>
						</div>
					  </div>
					</div>
					
				</div>
				</div>
            </div><!-- /.container-fluid -->
        </div><!-- /.rightside -->
<?php
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
