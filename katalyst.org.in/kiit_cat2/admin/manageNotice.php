<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Notice List";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Notice List</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>View Notice List</li>
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
				    <div class="panel-title">View Notice List</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap table-striped" cellspacing="0">
							<thead>
								<tr>										
				                    <th>Date</th>
			                        <th>Category</th>
			                        <th>Subject</th>
			                        <th>Document</th>
			                        <th>Status</th>
			                        <th>Manage</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									<th>Date</th>
			                        <th>Category</th>
			                        <th>Subject</th>
			                        <th>Document</th>
			                        <th>Status</th>
			                        <th>Manage</th>
				                </tr>
							</tfoot>
							<tbody>
										<?php 
										 $queryActiveNotice = "SELECT * FROM `tbl_notice` WHERE `notice_status` = '1' ORDER BY `notice_id` DESC  Limit 1500";
    									$resActiveNotice = mysqli_query($conn, $queryActiveNotice); 
										
										  $i = 0;
               							   while ($rowActiveNotice = mysqli_fetch_assoc($resActiveNotice)) {
               							  	$i++;
										?>
										<tr>
											<td><?php echo $rowActiveNotice['notice_date']; ?></td>
				                            <td><?php echo $rowActiveNotice['upload_type']; ?></td>
				                            <td><?php echo substr($rowActiveNotice['notice_subject'], 0, 25).'...'; ?></td>
				                            <td><?php echo substr($rowActiveNotice['notice_doc'], 0, 40).'...'; ?></td>
				                            <td><?php if($rowActiveNotice['notice_status']=='1'){
				                            	echo "Active";

				                            	}else{
				                            		echo "Archived";
				                            		} ?></td>
				                            <td>
				                                <a href="manageNotice_edit.php?notice=<?php echo encryptIt_webs($rowActiveNotice['notice_id']); ?>">Edit</a>
				                                &nbsp;
				                                <a href="manageNotice_delete.php?noticeDelete=<?php echo encryptIt_webs($rowActiveNotice['notice_id']); ?>"
				                                   onclick="return confirm('Are you sure to delete the current notice?');">Delete</a>
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
