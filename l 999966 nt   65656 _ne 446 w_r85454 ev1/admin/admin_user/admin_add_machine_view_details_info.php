<?php
session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="List Assign Machine to Location";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>List Assign Machine to Location</div>
			<ul class="breadcrumb">
			  	<li><a href="admin_dashboard.php"></a></li>
			   	<li><a href="#"></a>Assign Machine Information</li>
			 	<li class="active">Machine to Location List</li>
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
					 <div class="panel-title">Machine Working List </div>
					    </div>
					        <div class="panel-body">
						       <div class="table-responsive">
                               <table id="example" class="display nowrap" width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Sl.No</th>
 									    <th>Machine Unique Id</th>
						                <th>Store Location Id</th>
						               	<th>Field Location Id</th>
						               	<th>Remark</th>
						               	<th>Attach File</th> 
						            </tr>
						         </thead>
	        					
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_machine__transfer_information` WHERE `t_status`='1'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;
	        								?>
	        						<tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=strtoupper($result['t_unique_id_machine'])?></td>
	        							<td><?php 
	        									$site=$result['t_store_site_location'];
	        									$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$site'";
	        									$sql_exe2=mysqli_query($conn,$query_sql2);
	        									$result2=mysqli_fetch_assoc($sql_exe2);
	        									echo strtoupper($result2['zonal_name']);
	        								?>	        								
	        							</td>
	        							<td><?php 
	        									$field=$result['t_field_location_id'];
	        									$query_sql_location="SELECT * FROM `lt_master_field_place` WHERE `field_code`='$field'";
	        									$sql_exe_location=mysqli_query($conn,$query_sql_location);
	        									$result_location=mysqli_fetch_assoc($sql_exe_location);
	        									echo strtoupper($result_location['field_name']);

	        								?>	        								
	        							</td>
	        							<td><?=strtoupper($result['remark'])?></td>
	        							<td><?=strtoupper($result['attach_file'])?></td>
	        							<!-- <td>	        						
	        							
	        								 <div class="btn-group">
			                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="admin_add_machine_view_details_info.php">View Detail</a></li>
			                                        <li><a href="admin_add_machine_details_view_info.php">View Machine Detail</a></li>
			                                        <li><a href="admin_assign_task.php?slno=<?=$result['m_slno']?>&unq_id=<?=$result['model_id']?>&m_status=<?=$result['m_status']?>">Task Complete</a></li>
			                                        <li class="divider"></li>
			                                        <li><a href="#">Machine Transfer</a></li>
			                                    </ul>
			                                </div> 
	        							</td> -->
	        							
	        						</tr>
	        						<?php }?>

	        					</tbody>
        					
    						</table>

    						
                         </div>
                         <br>
                         <a href="admin_assign_machine_details_view.php" class="btn btn-warning"> Back</a>
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

