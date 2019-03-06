<?php

session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
require '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="View Candidate Application Form List";
//$slno=$_POST['slno'];
?>

<!--Page Header-->
<div class="header">
	<div class="header-content">
		<div class="page-title"><i class="icon-display4"></i>Candidate registered but not completed sikkim subject details.</div>
		<ul class="breadcrumb">
			<li><a href="admin_dashboard.php"></a></li>
			<li><a href="#"></a>Candidate Application Form System</li>
			<li class="active">List Of Not Completed SSC</li>
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
						<div class="panel-title">Candidate registered but not completed sikkim subject details.</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form method="POST" enctype="multipart/form-data" action="">
                            <table id="example" class="display nowrap" width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						              
						                <th>Candidate Mobile</th>
						               
						                		                
						            </tr>
						        </thead>
	        					<tfoot>
		            				<tr style="text-align: center;">
		                 			   <th>Slno</th>
						                
						                <th>Candidate Mobile</th>
						                
						             
	        					</tfoot>
	        					<tbody>
	        						<?php 
	        							$x=0;

	        							$get_mobile="SELECT * FROM `ilab_login` WHERE `basic_status`='0' and `complete_status`='0'";
	        							$sql_exe_get_mobile=mysqli_query($conn,$get_mobile);
	        							while ($get_mobile_fetch=mysqli_fetch_assoc($sql_exe_get_mobile)) {
	        							
	        								$x++;
	        								
	        								// `application_no`, `candidate_mobile`
	        								?>
	        						  <tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							
	        							<td><?=$get_mobile_fetch['mobile_no_L']?></td>
	        							
	        						</tr>
	        						<?php }?>
	        					</tbody>
    						</table>
    					</form>
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
