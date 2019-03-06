<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Program Details";

?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Program Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Training</li>
				<li class="active">Program Details</li>
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
				    <div class="panel-title">Program Details</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
							<table id="example" class="display nowrap" width="100%" cellspacing="0">
							<thead>
								<tr>
 									<th>#Sl</th>
			                        <th>Program Name</th>
			                        <th>Commence date</th>
			                        <th>Eligibility</th>
			                        <th>Manage</th>
				                </tr>
							</thead>
							<tfoot>
								<tr>
									<th>#Sl</th>
				                    <th>Program Name</th>
				                    <th>Commence date</th>
				                    <th>Eligibility</th>
				                    <th>Manage</th>
				                </tr>
							</tfoot>
							<tbody>
							<?php 
								$queryActiveProgram = "SELECT * FROM `tbl_program` WHERE `program_status` = '1' order by `program_id` desc";
    							$resActiveProgram = mysqli_query($conn, $queryActiveProgram);
								$i = 0;
               					while ($rowActiveProgram = mysqli_fetch_assoc($resActiveProgram)) {
               						$i++;
				             ?>
				                <tr>
				                    <td><?php echo $i; ?></td>
				                    <td><?php echo substr($rowActiveProgram['program_name'], 0, 30) . "...";?></td>
				                    <td><?php echo substr($rowActiveProgram['commence_date'], 0, 10); ?></td>
				                    <td><?php echo substr($rowActiveProgram['eligibility'],0,40) . "...";?></td>
				                    <td>
				                        <a href="manageProgram_edit.php?program=<?php echo encryptIt_webs($rowActiveProgram['program_id']); ?>">Edit</a>
				                                &nbsp;
				                        <a href="manageProgram_delete.php?programDelete=<?php echo encryptIt_webs($rowActiveProgram['program_id']); ?>"
				                                   onclick="return confirm('Are you sure to delete the current program?');">Delete</a>
				                    </td>
				                </tr>
				            <?php
				                    }
				            ?>
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
