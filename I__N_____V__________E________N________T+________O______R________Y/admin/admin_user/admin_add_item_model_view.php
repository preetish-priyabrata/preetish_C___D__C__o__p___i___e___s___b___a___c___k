
<?php
session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
   $title="View Component Model Wise Details";
?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Component Model Wise Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Component Information</li>
				<li class="active">Component Model Wise List</li>
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
				    <div class="panel-title">Component Model Details</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
                              <table id="example" class="display nowrap" width="100%" cellspacing="0">
						         <thead>
		                              <!-- <th>Manufacture Name </th> -->
		                              <tr>
						                <th>Sl.No</th>
 									    <th>Primary Code</th>
						                <th>Secondary Code</th>
						                <th>Component Name</th>
						                <th>Component Category </th>
						                <!-- <th>Model No</th> -->
						                <!-- <th>Manufacture Name </th> -->
						                <th>Status</th>
						                <!-- <th>Action</th> -->
						            </tr>
						         </thead>
	        					
	        					<tbody>
	        						<?php 
	        					
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_model_item_detail` WHERE `status`!='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;
	        								?>

	        					     	<tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=strtoupper($result['item_primary_code'])?></td>
	        						    <td><?=strtoupper($result['item_second_code'])?></td>
	        						    <td><?=strtoupper($result['item_name'])?></td>
	        						    <td>
	        						    	<?php 
	        						    		 echo strtoupper($item_category_id=$result['item_category_id']);
	        						    		?>   						    	
	        						    </td>
	        					     <!-- <td>
		        						    <?php 
		        						    	$i_model_id=$result['i_model_id'];
		        						    	$query_sql_model="SELECT * FROM `lt_master_machine_model_no` WHERE `model_id`='$i_model_id'";
			        							$sql_exe_model=mysqli_query($conn,$query_sql_model);
			        							$result_model=mysqli_fetch_assoc($sql_exe_model);
		        						    ?>
	        						    	<?=$result_model['model_no']?>
	        						    </td> -->
	        						    <!-- <td><?=$result['manufacture_name']?></td> -->
	        							
	        						 <td>
	        						<?php if($result['status']=="1"){ ?>
	        							<a href="#">Active</a>
	        							<?php }else{  ?>

	        							<a href="#">In-Active</a>
	        						<?php }?>	        							
									</td> 

								    <!-- <td>

										<?php if($result['status']=="2"){ ?>
	        							<a href="admin_add_item_model_update_status.php?i_slno=<?=$result['i_slno']?>&status=<?=$result['status']?>">In-Active</a>
	        							<?php }else{  ?>

	        							<a href="admin_add_item_model_update_status.php?i_slno=<?=$result['i_slno']?>&status=<?=$result['status']?>">Active</a>
	        						    <?php }?>
	        							

	        							</td> -->

	        							
	        							<!-- td> 
	        					    
	        								<a href="admin_add_item_edit.php" class="label label-success">Edit</a>
	        							
	        							</td> -->	
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

