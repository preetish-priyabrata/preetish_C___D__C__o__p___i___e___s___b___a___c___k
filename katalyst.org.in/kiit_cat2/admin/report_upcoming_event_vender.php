<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Vendor Upcomming Event List";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Vendor Upcomming Event</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Report</li>
				<li><a href="#"></a>Upcoming Events</li>
				<li class="active">View Vendor Upcomming Event</li>
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
				    <div class="panel-title">View Vendor Upcomming Event List</div>
				 	  </div>
					 	 <div class="panel-body">
					 	 	<div class="col-md-12 col-sm-12 col-lg-12">
					 	 		
					 	 			<div class="table-responsive">
									<table id="example" class="display nowrap table-striped text-center" cellspacing="0">
									<thead>
										<tr>										
						                    <th>Sl.No</th>   
					                        <th>Program Name</th>
					                        <th>Price</th>
					                        <th>No Of Session</th>
					                        <th>Type Of Training</th>
					                        <th>Proposed Date</th>
					                        <th>Student Registed</th>                         
					                        <th>Action</th>
						                </tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sl.No</th>   
					                        <th>Program Name</th>
					                        <th>Price</th>
					                        <th>No Of Session</th>
					                        <th>Type Of Training</th>
					                        <th>Proposed Date</th> 
					                        <th>Student Registed</th>                       
					                        <th>Action</th>
						                </tr>
									</tfoot>
									<tbody>
												<?php 
												 $queryActiveCourse = "SELECT * FROM `tbl_course` WHERE `status` = '1' and `course_type`='2' ORDER BY `sl_no` DESC  Limit 1500";
		    									 $resActiveCourse = mysqli_query($conn, $queryActiveCourse); 
												
												 $i = 0;
		               							 while ($rowActiveCourse = mysqli_fetch_assoc($resActiveCourse)) {
		               							 $i++;
												?>
												<tr>
												    <td><?=$i?></td>
						                            <td><?php echo $rowActiveCourse['course_name']; ?></td>
						                            <td><?php echo $rowActiveCourse['price']; ?></td>
						                            <td><?php echo $rowActiveCourse['no_of_session']; ?> Session </td>
						                            <td><?php 
								                            if($rowActiveCourse['course_type']==1){
								                            	echo "In-House";
								                            }else{
								                            	echo "Vendor";
								                            	} 
								                         ?></td>
						                            <td><?php echo $rowActiveCourse['starting_date']; ?> -
						                            <?php echo $rowActiveCourse['ending_date']; ?></td>	
						                            <td>
						                            	<?php
						                            	  $course_id=$rowActiveCourse['sl_no'];
						                            	 $student="SELECT* from `tbl_enrollment` WHERE `student_course`='$course_id' and `certificate_status`='0'";
						                            	$student_exe = mysqli_query($conn, $student);
						                            		echo mysqli_num_rows($student_exe);
						                            	?>
						                            </td>                      
						                            
						                            
						                            <td>
						                            	 <div class="btn-group">
						                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						                                    	Action
						                                    	<i class="icon-three-bars position-right"></i>
						                                    </button>
						                                    <ul class="dropdown-menu">
						                                    	<li><a href="course_details_view_details.php?course=<?php echo encryptIt_webs($rowActiveCourse['sl_no']); ?>&status=<?php echo encryptIt_webs(5); ?>">View</a></li>
						                                        
						                                        
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
