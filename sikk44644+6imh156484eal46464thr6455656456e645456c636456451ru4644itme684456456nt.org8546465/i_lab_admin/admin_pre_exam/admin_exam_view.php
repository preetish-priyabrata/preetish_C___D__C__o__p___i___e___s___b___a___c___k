<?php

session_start();
ob_start();
if($_SESSION['admin_preexam']){
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
                            <table id="example" class="display " width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Exam Center</th>
						                
						                <th>Total Capcity</th>
						                <th>Status</th>
						                
						            </tr>
						        </thead>
	        					<tfoot>
		            				<tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Exam Center</th>						                
						                <th>Total Capcity</th>
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
	        							
	        							<td><?=$result['total_seat']?></td>
	        							<td>
        								<?php 
        								if($result['status_exam']=='1'){

        									echo "<a href='admin_group_view_status?id=".$result['status_exam']."&token=".$result["slno_exam"]."&type=centre' >Active</a>";
        									// echo "Active";
        								}else{
        									echo "<a href='admin_group_view_status?id=".$result['status_exam']."&token=".$result["slno_exam"]."&type=centre'>In-Active</a>";
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
