
<?php
session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Machine Details</div>
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
				    <div class="panel-title">Machine Details</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
                              <table id="example" class="display nowrap" width="100%" cellspacing="0">
						         <thead>
						            <tr>
						                <th>Sl.No</th>
						                <th>Unique Id</th>
 									    <th>Machine Name</th>
 									    <!-- <th>Client Name</th> -->
						                <th>Model No</th>
						                <th>Mfg Date</th>
						                <th>Commissioning Date</th>
						                <th>Movement Count</th>
						                <th>Assign Status</th>
						                <th>Status</th>	
						                <th>Action</th>		
						            </tr>
						         </thead>
	        					<tfoot>
		            				<tr>
		                 				<th>Sl.No</th>
						                <th>Unique Id</th>
 									    <th>Machine Name</th>
 									    <!-- <th>Client Name</th> -->
						                <th>Model No</th>
						                <th>Mfg Date</th>
						                <th>Commissioning Date</th>
						                <th>Movement Count</th>
						                <th>Assign Status</th>
						                <th>Status</th>	
						                <th>Action</th>	
		            				</tr>
	        				 	 </tfoot>
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_machine_detail` LEFT JOIN `lt_master_machine_model_no` ON `lt_master_machine_model_no`.`model_id`=`lt_master_machine_detail`.`m_model_no` WHERE `lt_master_machine_model_no`.`status`!='0' and `lt_master_machine_detail`.`m_status`!='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							// echo mysqli_error($conn);
	        							// $result=mysqli_fetch_assoc($sql_exe);
	        							// print_r($result);

	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;

	        								?>
	        					     	<tr  style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=$result['machine_unique_id']?></td>
	        							<td><?=$result['machine_name']?></td>
	        							<!-- <td><?=$result['client_name']?></td> -->
	        							<td>
	        								<?php 	
	        								// $rec=mysqli_fetch_assoc($exe_view);
	        								echo $result['model_no'];
	        								?>
	        							</td>
	        						    <td><?=$result['machine_mfg_date']?></td>
	        							<td><?=$result['machine_commissioning']?></td>
	        							<td><?=$result['m_count']?></td>
	        							<td>
	        						<?php if($result['assign_status']=="0"){ ?>
	        							<a href="#">Not Assigned</a>
	        							<?php }else{  ?>

	        							<a href="#">Assigned</a>
	        						<?php }?>
	        							
										</td>
	        							<td>
	        						<?php if($result['m_status']=="2"){ ?>
	        							<a href="admin_add_machine_details_update_status.php?slno=<?=$result['m_slno']?>&unq_id=<?=$result['machine_unique_id']?>&status=<?=$result['m_status']?>">In-Active</a>
	        							<?php }else{  ?>

	        							<a href="admin_add_machine_details_update_status.php?slno=<?=$result['m_slno']?>&unq_id=<?=$result['machine_unique_id']?>&status=<?=$result['m_status']?>">Active</a>
	        						<?php }?>
	        							

	        							</td>
	        							<td> 
	        					    <?php if($result['edit_status']==0){?>
	        								<a href="admin_add_machine_details_edit.php?slno=<?php echo $result['m_slno'] ;?>" class="label label-success">Edit</a>
	        							<?php }else{ }?>
	        							</td>	
	        						</tr>
	        						<?php 
	        						}?>
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

