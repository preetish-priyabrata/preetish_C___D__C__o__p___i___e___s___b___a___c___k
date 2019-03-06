
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
						                <th>Machine Unique Id</th>
 									    <th>Machine Name</th>
						                <th>Machine Model No</th>
						                <th>Machine Mfg Date</th>
						                <th>Machine Commissioning Date</th>
						                <th>Status</th>	
						                <th>Action</th>		
						            </tr>
						         </thead>
	        					
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_machine_detail` WHERE `status`!='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$model_id=$result['model_no'];
	        								$query_view = "SELECT  * FROM `lt_master_machine_model_no` where `status`='1' and `model_id`='$model_id'";
	                  						 $exe_view = mysqli_query($conn,$query_view);
	                  						  $num_nows=mysqli_num_rows($exe_view);
	                  						 if($num_nows!=0){
	                  						 	$x++;

	        								?>
	        					     	<tr>
	        							<td><?=$x?></td>
	        							<td><?=$result['machine_unique_id']?></td>
	        							<td><?=$result['machine_name']?></td>
	        							<td>
	        								<?php 	
	        								$rec=mysqli_fetch_assoc($exe_view);
	        								echo $rec['model_no'];
	        								?>
	        							</td>
	        						    <td><?=$result['machine_mfg_date']?></td>
	        							<td><?=$result['machine_commissioning']?></td>
	        							<td>
	        						<?php if($result['status']=="2"){ ?>
	        							<a href="admin_add_machine_model_no_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['model_id']?>&status=<?=$result['status']?>">In-Active</a>
	        							<?php }else{  ?>

	        							<a href="admin_add_machine_model_no_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['model_id']?>&status=<?=$result['status']?>">Active</a>
	        						<?php }?>
	        							

	        							</td>
	        							<td> <a href="admin_add_machine_details_edit.php?slno=<?php echo $result['slno'] ;?>" class="label label-success">Edit</a><td>	
	        						</tr>
	        						<?php }
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

