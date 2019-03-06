<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View Component Category List";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Component Category</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Component Category System</li>
				<li class="active">Component Category List</li>
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
						<div class="panel-title">Component Category List</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
                            <table id="example" class="display nowrap" width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Component Category</th>
						                <th>Date</th>
						                <th>Time</th>
						                <th>Status</th>	                
						            </tr>
						        </thead>
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_item_category` WHERE `Status`!='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;
	        								?>
	        						 <tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?="<b>".strtoupper($result['category_name'])."</b>"?></td>
	        							<td><?php echo $result['date']?></td>
	        							<td><?php echo $result['time']?></td>
	        							<td>
	        							<?php if($result['Status']=="2"){ ?>
	        							<a href="admin_add_component_category_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['category_item_short']?>&status=<?=$result['Status']?>">In-Active</a>
	        							<?php }else{  ?>
	        							<a href="admin_add_component_category_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['category_item_short']?>&status=<?=$result['Status']?>">Active</a>
	        							<?php }?>

	        							</td>
	        						</tr>
	        						<?php }?>
	        					</tbody>
    						</table>
    						<div class="pull-left">
        					<a href="index.php" class="btn btn-success">Back</a>
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
include 'templete/header.php';

?>

