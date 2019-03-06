<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Press Release List";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Press Release</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>View Press Release List</li>
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
				    <div class="panel-title">View Press Release List</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap table-striped" cellspacing="0">
							<thead>
								<tr>										
				                    <th>Sl.No</th>
				                    <th>Title</th>
			                        <th>Short Description</th>
			                        <th>Photo</th>
			                        <th>Date</th>
			                        <th>Status</th>
			                        <th>Action</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									<th>Sl.No</th>
				                    <th>Title</th>
			                        <th>Short Description</th>
			                        <th>Photo</th>
			                        <th>Date</th>
			                        <th>Status</th>
			                        <th>Action</th>
				                </tr>
							</tfoot>
							<tbody>
										<?php 
										 $ReleaseQuery = "SELECT * FROM `gen_press_release` WHERE `status` = '1' ORDER BY `sl_no` DESC  Limit 1500";
    									 $resReleaseQuery = mysqli_query($conn, $ReleaseQuery); 
										 $i = 0;
               							 while ($viewRelease = mysqli_fetch_assoc($resReleaseQuery)) {
               							 $i++;
										?>
										<tr>
										    <td><?=$i?></td>
				                            <td><?php echo $viewRelease['title']; ?></td>
				                            <td><?php echo $viewRelease['description']; ?></td>
				                            <td><img src="../upload/<?php echo $viewRelease['photo_name'];?>" width="100" height="100"></td>
				                            <td><?php echo $viewRelease['date']; ?></td>
				                           
				                            <td><?php if($viewRelease['status']=='1'){
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
				                                    	<!-- <li><a href="view_banner_details.php?course=<?php //echo encryptIt_webs($viewBanner['sl_no']); ?>&status=<?php //echo encryptIt_webs(1); ?>">View</a></li> -->

				                                       <!--  <li><a href="banner_edit.php?sl_no=<?php echo encryptIt_webs($viewBanner['sl_no']); ?>">Edit</a></li>
 -->

                                                        <li>
                                                        	<a href="press_release_edit.php?sl_no=<?php echo $viewRelease['sl_no'] ;?>">Edit</a>
                                                        </li>



				                                        <li class="divider"></li>
				                                         <li><a href="press_release_delete.php?sl_no=<?php echo encryptIt_webs($viewRelease['sl_no']); ?>&status=<?php echo encryptIt_webs(3); ?>" onclick="return confirm('Are you sure want to achive this Press Release .');">Achive</a></li> 
				                                        
                                                       

				                                    </ul>
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
