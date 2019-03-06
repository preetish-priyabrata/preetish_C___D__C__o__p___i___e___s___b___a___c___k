<?php

session_start();
ob_start();
if($_SESSION['admin_preexam']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View Assign Exam Date And Time";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Assigned Exam Date And Time</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Assigned Exam Date And Time</li>
				<li class="active">Assigned Exam Date And Time List</li>
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
						<div class="panel-title">Exam Date And Time List</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
                            <table id="example" class="display " width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Exam Category</th>
						                <th>Exam Date</th>
						                <th>1st Session Start Time</th>
						                <th>1st Session End Time</th>
						                <th>2nd Session Start Time</th>
						                <th>2nd Session End Time</th>
						            </tr>
						        </thead>
	        					<tfoot>
		            				<tr style="text-align: center;">
						                <th>Slno</th>
						                <th>Exam Category</th>
						                <th>Exam Date</th>
						                <th>1st Session Start Time</th>
						                <th>1st Session End Time</th>
						                <th>2nd Session Start Time</th>
						                <th>2nd Session End Time</th>
						            </tr>						             
	        					</tfoot>
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `ilab_assign_date_time`";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								
	        								$x++;
	        								?>
	        						<tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=$result['exam_slno']?></td>
	        							<td><?=$result['exam_date']?></td>
	        							<td><?=$result['first_session_start']?></td>
	        							<td><?=$result['first_session_end']?></td>
	        							<td><?=$result['second_session_start']?></td>
	        							<td><?=$result['second_session_end']?></td>
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
