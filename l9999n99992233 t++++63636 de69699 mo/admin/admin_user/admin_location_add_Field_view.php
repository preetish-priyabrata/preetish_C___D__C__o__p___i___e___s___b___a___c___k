<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
  $title="View Field Location List";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Field</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Location Setting</li>
				<li><a href="#"></a>Field Location</li>
				<li><a href="#"></a>View Field`</li>
				<li class="active">Field List</li>
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
					<div class="panel-title">Field List</div>
				    </div>
				   	  <div class="panel-body">
						  <div class="table-responsive">
                             <table id="example" class="display nowrap" width="100%" cellspacing="0">
						        <thead> 
						            <tr style="text-align: center;">
						                <th>Slno</th>
		                 				<th>Field Name</th>
						                <th>Field short Code</th>
						                <th>Zonal Name</th>						        
						                <th>HQ Name</th>
						                <th>status</th>
						                <th>Action</th>					                
						            </tr>
						        </thead>
	        					
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_field_place` WHERE `status`!='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;
	        								?>
	        						<tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=strtoupper($result['field_name'])?></td>

	        							 <td><?= strtoupper($result ['manual_field_code'])?></td>
	        							<td><?php

	        							$zonal_code=$result['zonal_code'];
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo strtoupper($result2['zonal_name']);
	        							?></td>
	        							<td><?php 
	        							$hq_code=$result['hq_code'];
	        								$query_sql1="SELECT * FROM `lt_master_HQ_place` WHERE `hq_code`='$hq_code'";
	        								$sql_exe1=mysqli_query($conn,$query_sql1);
	        								$result1=mysqli_fetch_assoc($sql_exe1);
	        								echo strtoupper( $result1['hq_name']);
	        							?>
	        							<td>
	        							<?php if($result['status']=="2"){ ?>
	        								<a href="admin_location_add_Field_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['field_code']?>&status=<?=$result['status']?>">In-Active</a>
	        							<?php }else{  ?>
	        								<a href="admin_location_add_Field_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['field_code']?>&status=<?=$result['status']?>">Active</a>
	        							<?php }?>
	        							

	        							</td>
	        						 <td>
	        						<a href="admin_location_add_Field_edit.php?slno=<?php echo $result['slno']?>" class="label label-success">Click Edit</a>
	        							</td> 
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

