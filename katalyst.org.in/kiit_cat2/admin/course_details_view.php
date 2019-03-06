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
			<div class="page-title"><i class="icon-display4"></i>View Course List</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>View Course List</li>
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
				    <div class="panel-title">View Course List</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap table-striped" cellspacing="0">
							<thead>
								<tr>										
				                    <th>Sl.No</th>
			                        <th>Course Name</th>
			                        <th>Price</th>
			                        <th>No Of Session</th>
			                        <th>Type Of Training</th>
			                        <th>Starting Date</th>
			                        <th>Ending Date</th>
			                        <th>Status</th>
			                      
			                        <th>Action</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									<th>Sl.No</th>   
			                        <th>Course Name</th>
			                        <th>Price</th>
			                        <th>No Of Session</th>
			                        <th>Type Of Training</th>
			                        <th>Starting Date</th>
			                        <th>Ending Date</th>
			                        <th>Status</th>
			                 
			                        <th>Action</th>
				                </tr>
							</tfoot>
							<tbody>
										<?php 
										 $queryActiveCourse = "SELECT * FROM `tbl_course` WHERE `status` = '1' ORDER BY `sl_no` DESC  Limit 1500";
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
				                            <td><?php echo $rowActiveCourse['starting_date']; ?></td>
				                            <td><?php echo $rowActiveCourse['ending_date']; ?></td>
				                        
				                            <td><?php if($rowActiveCourse['status']=='1'){
				                            	echo "Active";

				                            	}else{
				                            		echo "In-Active";
				                            		} ?></td>
				                            <!-- <td>
				                                <a href="manageNotice_edit.php?notice=<?php echo encryptIt_webs($rowActiveCourse['notice_id']); ?>">Edit</a>
				                                &nbsp;
				                                <a href="manageNotice_delete.php?noticeDelete=<?php echo encryptIt_webs($rowActiveCourse['notice_id']); ?>"
				                                   onclick="return confirm('Are you sure to delete the current notice?');">Delete</a>
				                            </td> -->
				                            <td>
				                            	 <div class="btn-group">
				                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				                                    	Action
				                                    	<i class="icon-three-bars position-right"></i>
				                                    </button>
				                                    <ul class="dropdown-menu">
				                                    	<li><a href="course_details_view_details.php?course=<?php echo encryptIt_webs($rowActiveCourse['sl_no']); ?>&status=<?php echo encryptIt_webs(1); ?>">View</a></li>
				                                        <li><a href="course_details_edit.php?course=<?php echo encryptIt_webs($rowActiveCourse['sl_no']); ?>">Edit</a></li>
				                                        <li class="divider"></li>
				                                        <li><a href="course_details_delete.php?course=<?php echo encryptIt_webs($rowActiveCourse['sl_no']); ?>&status=<?php echo encryptIt_webs(3); ?>" onclick="return confirm('Are you sure want to Commencement this program .');">Commencement</a></li>
				                                        
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
