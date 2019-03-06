<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Banner List";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Banner</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>View Banner List</li>
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
				    <div class="panel-title">View Banner List</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap table-striped" cellspacing="0">
							<thead>
								<tr>										
				                    <th>Sl.No</th>
			                        <th>Description</th>
			                        <th>Photo</th>
			                        <th>Status</th>
			                        <th>Action</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									<th>Sl.No</th>
			                        <th>Description</th>
			                        <th>Photo</th>
			                        <th>Status</th>
			                        <th>Action</th>
				                </tr>
							</tfoot>
							<tbody>
										<?php 
										 $bannerQuery = "SELECT * FROM `gen_banner` WHERE `status` = '1' ORDER BY `sl_no` DESC  Limit 1500";
    									 $resBannerQuery = mysqli_query($conn, $bannerQuery); 
										
										 $i = 0;
               							 while ($viewBanner = mysqli_fetch_assoc($resBannerQuery)) {
               							 $i++;
										?>
										<tr>
										    <td><?=$i?></td>
				                            <td><?php echo $viewBanner['short_desc']; ?></td>
				                            <td><img src="../upload/<?php echo $viewBanner['photo_name'];?>" width="100" height="100"></td>
				                            <td><?php if($viewBanner['status']=='1'){
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
                                                        	<a href="banner_edit.php?sl_no=<?php echo $viewBanner['sl_no'] ;?>">Edit</a>
                                                        </li>



				                                        <li class="divider"></li>
				                                         <li><a href="banner_delete.php?sl_no=<?php echo encryptIt_webs($viewBanner['sl_no']); ?>&status=<?php echo encryptIt_webs(3); ?>" onclick="return confirm('Are you sure want to achive this banner .');">Achive</a></li> 
				                                        
                                                       

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
