<?php

session_start();
ob_start();
if($_SESSION['admin_Pre_tech_s']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View Paid Info List";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Group Paid List</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Group Candidate List</li>
				<li class="active">View Group Paid List</li>
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
						<div class="panel-title">View Group Paid List</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
                            <table id="example" class="display " width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Group </th>
						                <th>Mobile No</th>					                
						                <th>Paid Id </th>
						                <th>Select Post Id</th>
						            </tr>
						        </thead>
	        					<tfoot>
		            				<tr style="text-align: center;">
						               	<th>Slno</th>
						                <th>Group </th>
						                <th>Mobile No</th>					                
						                <th>Paid Id </th>
						                <th>Select Post Id</th>

						            </tr>						             
	        					</tfoot>
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							 $qry_exam="SELECT * FROM `ilab_group_candidate_info` WHERE `paid_status`='1' ";
					      				    $sql_exam=mysqli_query($conn, $qry_exam);
					      				    while($res_exam=mysqli_fetch_array($sql_exam)){
	        								$x++;
	        								?>
	        						<tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?php if($res_exam['group_id_slno']=='1'){
	        								echo "Driver";

	        							}else if($res_exam['group_id_slno']=='2') {
	        								echo "Group D";
	        							}?></td>
	        							<td><?=$res_exam['candidate_mobile']?></td>
	        							<td><?=$res_exam['candidate_applied']?></td>
	        							<td><?=$res_exam['paid_id_slno']?></td>
	        							
	        							
	        							
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
	header('Location:logout');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
