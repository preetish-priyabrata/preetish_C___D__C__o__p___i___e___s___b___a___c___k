<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="List Assign Machine to Location";
 // Array ( [slno] => 1 [unq_id] => md5 [unique_id_machine] => mud90 )
 $slno=$_GET['slno'];
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Machine Attachment Detail</div>
			<ul class="breadcrumb">
			  	<li><a href="admin_dashboard.php"></a></li>
			   	<!-- <li><a href="#"></a>Assign Machine Information</li> -->
			 	<li class="active">Machine Attachment Detail</li>
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
					 <div class="panel-title">Machine Info</div>
					    </div>
					        <div class="panel-body">
						       <div class="table-responsive">
                               <table  class="display nowrap table" width="100%" cellspacing="0">
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
	        							$query_sql="SELECT * FROM `lt_master_machine__transfer_information` WHERE `slno`='$slno'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$t_unique_id_machine=$result['t_unique_id_machine'];
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
	        							<td>


	        							<?php 
	        							$y=0;
	        								$query_sql_file="SELECT * FROM `lt_master_machine__transfer_information_attachment` WHERE `slno_machine_attach`='$slno'";
	        								$sql_exe_file=mysqli_query($conn,$query_sql_file);
	        								while ($result_file=mysqli_fetch_assoc($sql_exe_file)) {
	        									$y++;
	        									if(file_exists("../uploads/machine_file/".$result_file[file_name])){
	        									echo "<a href='../uploads/machine_file/".$result_file[file_name]."'>Click View ".$y."</a><br>";
	        									}else{
	        										echo "File Has Been Archived file name  ".$result_file[file_name]."<br>";
	        									}
	        								}
	        								?>
	        								
	        							</td>
	        							
	        							
	        						</tr>
	        						<?php }?>

	        					</tbody>
        					
    						</table>

    						
                         </div>
                         <br>
                         <a href="index.php" class="btn btn-warning"> Back</a>
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

