<?php
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Agriculture Sub Menu List";
?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    	<section class="content-header">
	      <h1>
	       View Land Details
	        <small>it all starts here</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">General Setting</a></li>
        	<li><a href="#">Agriculture Land Details</a></li>
        	<li class="active">Add New Agriculture Land Details</li>
	      </ol>
    	</section>

	    <!-- Main content -->
	    <section class="content">
	    	<div class="row">
				<?php $msg->display(); ?>
			</div>
			<div class="box">
		        <div class="box-header with-border">
		        	<h3 class="box-title">View Method of Land Details</h3>
		        </div>
		        <div class="box-body">
					<div class="col-xs-12">
						<table id="" class="display" style="width:100%">
		        			<thead>
					            <tr>
					                <th>Slno</th>
					                <th>Land</th>
					                <th>Status</th>
					                <th>Action</th>
					            </tr>
		        			</thead>
		        			<tbody>
		        				<?php
		        				$x=0;
		        				 $view_query="SELECT * FROM `ilab_water_land_type` where `status`!='0' ";
		        				   $view_sql_exe=mysqli_query($conn,$view_query);
		        				      while ($view_fetch=mysqli_fetch_assoc($view_sql_exe)){
		        				      	$x++;
		        				?>
		        				<tr>
		        					<td><?=$x?></td>
		        					<td><?=strtoupper($view_fetch['land_type_name'])?></td>
		        					<td>
		        						<?php 
			        						if($view_fetch['status']==1){
			        							echo "Active";

			        						}else{
			        							echo "In-Active";
			        						}

		        						?>
		        					</td>
		        					<td>
		        						<a href="admin_new_land_detail_edit.php?slno=<?=web_encryptIt($view_fetch['land_sl_num'])?>" class="btn btn-success"> click To Edit</a>
		        					</td>
		        				</tr>
		        				<?php }?>
		        			</tbody>
		    			</table>
					</div>
				</div>
				<div class="box-footer">
					<a href="admin_dashboard.php" class="btn btn-success btn-xs"> Back</a>
				</div>
			</div>
	      

	    </section>
	    <!-- /.content -->
  	</div>
  <!-- /.content-wrapper -->


<?php
}else{
	header('Location:logout_time_out.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'template/header.php';

?>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('table.display').DataTable();
	} );
</script>
