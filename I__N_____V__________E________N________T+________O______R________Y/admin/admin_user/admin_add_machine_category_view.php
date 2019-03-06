<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View Machine Category";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Machine Category</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Location</li>
				<li class="active">Machine Category List</li>
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
						<div class="panel-title">Machine Category List</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
                            <table id="example" class="display nowrap" width="100%" cellspacing="0">
						        <thead>
						            <tr>
						                <th>Slno</th>
						                <th>Machine Category Name</th>
						                <th>Machine Category ID</th>
						                <th>status</th>
						                <!-- <th>Action</th>					                 -->
						            </tr>
						         </thead>
	        					
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_machine_category` WHERE `status`!='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;
	        								?>
	        						<tr>
	        							<td><?=$x?></td>
	        							<td><?=strtoupper($result['machine_cat_name'])?></td>
	        							<td><?=strtoupper($result['machine_cat_id'])?></td>
	        							<td>
	        							<?php if($result['status']=="2"){ ?>
	        								<a href="admin_add_machine_cat_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['machine_cat_id']?>&status=<?=$result['status']?>">In-Active</a>
	        							<?php }else{  ?>
	        								<a href="admin_add_machine_cat_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['machine_cat_id']?>&status=<?=$result['status']?>">Active</a>
	        							<?php }?>
	        							

	        							</td>
	        							<!-- <td>
	        								<a href="Student_details.php?slno=<?=$result['sl_no']?>&unq_id=<?=$result['unique_id']?>">Click Edit</a>
	        							</td> -->
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

