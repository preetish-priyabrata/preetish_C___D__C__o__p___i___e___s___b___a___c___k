<?php
session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View Machine Model No List";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Machine Model</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Location</li>
				<li class="active">Model List</li>
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
				 	 <div class="panel-title">Machine Model List</div>
					    </div>
					       <div class="panel-body">
						      <div class="table-responsive">
                                 <table id="example" class="display nowrap" width="100%" cellspacing="0">
                                 <thead>
						            <tr style="text-align: center;">
						                <th>Sl.No</th>
 									    <th>Model No</th>
						                <th>Model Id</th>
						                <th>Status</th>
						                <!-- <th>Action</th>-->
						            </tr>
						         </thead>
	        					<tfoot>
		            				<tr style="text-align: center;">
		                 				<th>Sl.No</th>
						                <th>Model No</th>
						                <th>Model Id</th>
						                <th>Status</th>
							            <!--<th>Action</th>-->
		            				</tr>
	        				 	 </tfoot>
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_machine_model_no` WHERE `status`!='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;
	        								?>
	        						<tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=$result['model_no']?></td>
	        							<td><?=$result['model_id']?></td>
	        							<td>
	        						<?php if($result['status']=="2"){ ?>
	        							<a href="admin_add_machine_model_no_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['model_id']?>&status=<?=$result['status']?>">In-Active</a>
	        							<?php }else{  ?>

	        							<a href="admin_add_machine_model_no_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['model_id']?>&status=<?=$result['status']?>">Active</a>
	        						<?php }?>
	        							

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
include 'templete/header.php';

?>

