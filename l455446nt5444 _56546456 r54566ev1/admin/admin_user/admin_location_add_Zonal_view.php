<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
   $title="View Site Location List";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Zonal</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Location</li>
				<li class="active">Zonal List</li>
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
			    <div class="panel-title">Zonal List</div>
			      </div>
                    <div class="panel-body">
				      <div class="table-responsive">
                           <table id="example" class="display nowrap" width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Zonal Name</th>
						                <th>Zonal Address</th>
						                <th>Zonal Code</th>
						                <th>HQ Name</th>
						                <th>status</th>
						                 <th>Action</th>
						            </tr>
						        </thead>
	        				
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_zonal_place` WHERE `status`!='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;
	        								?>
	        						<tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=strtoupper($result['zonal_name'])?></td>
	        							<td style="text-align: left;"><?php 
	        								echo "Address 1 :- ".strtoupper($result['address_1']).",<br>";
	        								echo "Address 2 :- ".strtoupper($result['address_2']).",<br>";
	        								echo "C/O :- ".strtoupper($result['address_3']).",<br>";
	        								echo "PO :- ".strtoupper($result['address_4']).",<br>";
	        								echo "City :- ".strtoupper($result['address_5']).",<br>";
	        								echo "District :- ".strtoupper($result['address_6']).",<br>";
	        								echo "State :- ".strtoupper($result['address_7']).",<br>";
	        								echo "Pin :- ".strtoupper($result['address_8']).".<br>";
	        							?></td>
	        							<td><?=strtoupper($result['zonal_code'])?></td>
	        							<td><?php 
	        							$hq_code=$result['hq_code'];
	        								$query_sql1="SELECT * FROM `lt_master_HQ_place` WHERE `hq_code`='$hq_code'";
	        								$sql_exe1=mysqli_query($conn,$query_sql1);
	        								$result1=mysqli_fetch_assoc($sql_exe1);
	        								echo strtoupper( $result1['hq_name']);
	        							?>
	        							<td>
	        							<?php if($result['status']=="2"){ ?>
	        								<a href="admin_location_add_Zonal_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['zonal_code']?>&status=<?=$result['status']?>">In-Active</a>
	        							<?php }else{  ?>
	        								<a href="admin_location_add_Zonal_update_status.php?slno=<?=$result['slno']?>&unq_id=<?=$result['zonal_code']?>&status=<?=$result['status']?>">Active</a>
	        							<?php }?>
	        							

	        							</td>
	        							<td>
	        							<a href="admin_location_add_Zonal_edit.php?slno=<?php echo $result['slno']?>" class="label label-success">Click Edit</a>
	        								<!-- &unq_id=<?=$result['hq_code']?> -->
	        							</td> 

	        						</tr>
	        						<?php }?>
	        					</tbody>
        					</table>
                         </div>
                         <div class="row">
                         	
							 <a href="index.php" class="btn btn-info"  value="Back" onclick="myFunction()">Back</a>
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

