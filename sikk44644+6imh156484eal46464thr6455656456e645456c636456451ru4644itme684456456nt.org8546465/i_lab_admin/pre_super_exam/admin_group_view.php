<?php

session_start();
ob_start();
if($_SESSION['admin_Pre_tech_s']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View Exam Center List";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Group</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Online Group</li>
				<li class="active">View Group</li>
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
                            <table id="example" class="display " width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Group </th>						                
						                <th>Status</th>
						            </tr>
						        </thead>
	        					<tfoot>
		            				<tr style="text-align: center;">
						               <th>Slno</th>
						                <th>Group </th>						                
						                <th>Status</th>
						            </tr>						             
	        					</tfoot>
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							 $qry_exam="SELECT * FROM `ilab_exam_group` ";
					      				    $sql_exam=mysqli_query($conn, $qry_exam);
					      				    while($res_exam=mysqli_fetch_array($sql_exam)){
	        								$x++;
	        								?>
	        						<tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=$res_exam['exam_group']?></td>
	        							<td>
	        								<?php 
	        								if($res_exam['status']=='1'){

	        									echo "<a href='admin_group_view_status?id=".$res_exam['status']."&token=".$res_exam["slno_group"]."&type=group' >Resgistration Is Going On</a>";
	        								}else{
	        									echo "Registration has been stopped";
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
	header('Location:logout');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
