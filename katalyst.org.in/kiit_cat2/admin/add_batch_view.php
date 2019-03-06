<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Course List";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Batch List</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>View Batch List</li>
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
				    <div class="panel-title">View Batch List</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap table-striped" cellspacing="0">
							<thead>
								<tr>										
				                    <th>Sl.No</th>
			                        <th>Batch Name</th>
			                        <th>Training/Program Name</th>
			                        <th>Remaining Seats</th>
			                        <th>Venue</th>
			                        <th>Status</th>
			                        <th>Action</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									<th>Sl.No</th>
			                        <th>Batch Name</th>
			                        <th>Training/Program Name</th>
			                        <th>Remaining Seats</th>
			                        <th>Venue</th>
			                        <th>Status</th>
			                        <th>Action</th>
				                </tr>
							</tfoot>
							<tbody>
										<?php 
										 $queryActiveCourse = "SELECT * FROM `tbl_batch` WHERE `status` = '1' ORDER BY `sl_no` DESC  Limit 1500";
    									$resActiveCourse = mysqli_query($conn, $queryActiveCourse); 
										
										  $i = 0;
               							   while ($rowActiveCourse = mysqli_fetch_assoc($resActiveCourse)) {
               							  	$i++;
										?>
										<tr>
										    <td><?=$i?></td>
				                            <td><?php echo $rowActiveCourse['batch_name']; ?></td>
                                            <td>
									  		<?php $course_id=$rowActiveCourse['course_id']; 
									  		 $course_list="SELECT * FROM `tbl_course` WHERE `sl_no`='$course_id'";
									  		$sql_exe_course=mysqli_query($conn,$course_list);
									  		$res_course=mysqli_fetch_assoc($sql_exe_course);
									  		?>
									  		<?php echo $res_course['course_name']; ?>
						  				    </td>				                          
				                            <td><?php echo $rowActiveCourse['remain_seat']; ?> Seats </td>
				                            <td><?php echo $rowActiveCourse['venue']; ?></td>           
				                            <td><?php if($rowActiveCourse['status']=='1'){
				                            	echo "Active";

				                            	}else{
				                            		echo "In-Active";
				                            	} ?></td>
				                            
				                            <td>
				                            	 <div class="btn-group">
				                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				                                    	Action
				                                    	<i class="icon-three-bars position-right"></i>
				                                    </button>
				                                    <ul class="dropdown-menu">
				                                    	<li><a href="add_batch_view_details.php?course=<?php echo encryptIt_webs($rowActiveCourse['sl_no']); ?>&status=<?php echo encryptIt_webs(1); ?>">View</a></li>
				                                        <li><a href="add_batch_edit.php?course=<?php echo encryptIt_webs($rowActiveCourse['sl_no']); ?>">Edit</a></li>
				                                        <li class="divider"></li>
				                                        <li><a href="add_batch_completed.php?program_batch=<?php echo encryptIt_webs($rowActiveCourse['sl_no']); ?>&status=<?php echo encryptIt_webs(3); ?>" onclick="return confirm('Are you sure want to Commencement this program batch.');">Commencement</a></li>
				                                   </ul
				                            </td>
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
