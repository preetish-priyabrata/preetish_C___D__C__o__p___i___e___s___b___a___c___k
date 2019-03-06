<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Vendor Completed Program List";

?>
	<!--Page Header-->
<style type="text/css">
	fieldset {
   		border: 1px solid #0d8620;
	}
</style>
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Vendor Completed Program</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Report</li>
				<li><a href="#"></a>Completed Program</li>
				<li class="active">View Vendor Completed Program</li>
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
				    <div class="panel-title">View Vendor Completed Program List</div>
				 	  </div>
					 	 <div class="panel-body">
					 	 	<div class="col-md-12 col-sm-12 col-lg-12">
					 	 		
					 	 			<div class="table-responsive">
									<table id="example" class="display nowrap table-striped text-center" cellspacing="0">
									<thead>
										<tr>										
						                    <th>Sl.No</th>   
					                        <th>Program Name</th>					                        
					                        <th>Batch Details</th> 
					                        <th>Student Registed</th>                       
					                       
						                </tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sl.No</th>   
					                        <th>Program Name</th>					                        
					                        <th>Batch Details</th> 
					                        <th>Student Registed</th>                       
					                        
						                </tr>
									</tfoot>
									<tbody>
												<?php 
												 $queryActiveCourse = "SELECT * FROM `tbl_course` WHERE `status` = '2' and `course_type`='2' ORDER BY `sl_no` DESC  Limit 1500";
		    									 $resActiveCourse = mysqli_query($conn, $queryActiveCourse); 
												
												 $i = 0;
		               							 while ($rowActiveCourse = mysqli_fetch_assoc($resActiveCourse)) {
		               							 $i++;
												?>
												<tr>
												    <td><?=$i?></td>
						                            <td><a href="course_details_view_details.php?course=<?php echo encryptIt_webs($rowActiveCourse['sl_no']); ?>&status=<?php echo encryptIt_webs(9); ?>"><?php echo $rowActiveCourse['course_name']; 
						                            $course_id=$rowActiveCourse['sl_no'];
						                            ?></a>
						                        </td>

						                            <td>
						                            	<fieldset>
						                            		<div class="col-md-6"><label>Batch Name</label></div>
						                            		<div class="col-md-6"><label>Seat Filled</label></div>
						                            	</fieldset>
						                            	<fieldset>
						                            	<?php 
						                            		$check="SELECT * FROM `tbl_batch` WHERE `course_id`='$course_id' ";
															$sql_check=mysqli_query($conn,$check);
															while ($res=mysqli_fetch_assoc($sql_check)) {?>
															<div class="col-md-6">
																<label>
																		<a href="add_batch_view_details.php?course=<?php echo encryptIt_webs($res['sl_no']); ?>&status=<?php echo encryptIt_webs(7); ?>"><?php echo $res['batch_name'];?></a>
																</label>
															</div>
															<div class="col-md-6">
																<label>
																	
																		<?php echo $res['no_of_sheet']-$res['remain_seat'];?>
																</label>
															</div>
																
															<?php 
															

															}
						                            	?>
						                           		 </fieldset>
						                           	</td>
						                            <td>
						                            	<?php
						                            	  
						                            	 $student="SELECT* from `tbl_enrollment` WHERE `student_course`='$course_id' and `certificate_status`='0'";
						                            	$student_exe = mysqli_query($conn, $student);
						                            		echo mysqli_num_rows($student_exe);
						                            	?>
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
