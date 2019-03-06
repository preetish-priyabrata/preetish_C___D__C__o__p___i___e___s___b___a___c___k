<?php

session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View Exam Center List";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Exam Center</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Exam Center Manage</li>
				<li class="active">Exam Center List</li>
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
						<div class="panel-title">Exam Center List</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
                            <table id="example" class="display nowrap" width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Exam Center</th>
						                <th>Contact Name</th>
						                <th>Contact No</th>
						                <th>Address</th>
						                <th>Total Sheet</th>
						                <th>Status</th>
						            </tr>
						        </thead>
	        					<tfoot>
		            				<tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Exam Center</th>
						                <th>Contact Name</th>
						                <th>Contact No</th>
						                <th>Address</th>
						                <th>Total Sheet</th>
						                <th>Status</th>
						            </tr>						             
	        					</tfoot>
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `ilab_exam_center`";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								
	        								$x++;
	        								?>
	        						<tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=$result['exam_name']?></td>
	        							<td><?=$result['Contact_name']?></td>
	        							<td><?=$result['Contact_no']?></td>
	        							<td><?=$result['Center_Address']?></td>
	        							<td><?=$result['total_seat']?></td>
	        							<td>
	        								<?php 
	        								if($result['total_seat']=='1'){
	        									echo "Active";
	        								}else{
	        									echo "In-Active";
	        								}?>
	        							</td>
	        							
	        							
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
include '../template/header.php';
?>
