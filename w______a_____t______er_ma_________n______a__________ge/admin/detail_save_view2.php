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
	       View Agriculture Water List
	        <small>it all starts here</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">General Setting</a></li>
        	<li><a href="#">Agriculture Water Details</a></li>
        	<li class="active">Add New Agriculture Water Details</li>
	      </ol>
    	</section>

	    <!-- Main content -->
	    <section class="content">
	    	<div class="row">
				<?php $msg->display(); ?>
			</div>
			<div class="box">
		        <div class="box-header with-border">
		        	<h3 class="box-title">View Agriculture Water List</h3>
		        </div>
		        <div class="box-body">
					<div class="col-xs-12">
						<table id="" class="display" style="width:100%">
		        			<thead>
					            <tr>
					                <th>Slno</th>
					                 <th>Crop Type</th>
					                <th>Crop Name</th>
					                <th>Land Type</th>
					                 <th>Action</th>
					            </tr>
		        			</thead>
		        			<tbody>
		        				<?php
		        				$x=0;
		        				 $view_query="SELECT * FROM `detail_php` WHERE `status`='1' ";
		        				   $view_sql_exe=mysqli_query($conn,$view_query);
		        				      while ($view_fetch=mysqli_fetch_assoc($view_sql_exe)){
		        				      	$x++;
		        				?>
		        				<tr>
		        					<td><?=$x?></td>
		        					<td><?php 
		        						$crop_type=($view_fetch['crop_type']);
		        						$get_crop_type_query="SELECT * FROM `ilab_water_sub_menu` WHERE `sub_menu_id`='$crop_type'";
		        						$get_crop_type_sql_exe=mysqli_query($conn,$get_crop_type_query);
		        						$get_crop_type_fetch=mysqli_fetch_assoc($get_crop_type_sql_exe);
		        						echo strtoupper($get_crop_type_fetch['sub_menu_name']);

		        					?></td>
		        					<td><?php 
		        						$crop_name=($view_fetch['crop_name']);
		        						$get_crop_name_query="SELECT * FROM `ilab_water_crops` WHERE `crop_id`='$crop_name'";
		        						$get_crop_name_sql_exe=mysqli_query($conn,$get_crop_name_query);
		        						$get_crop_name_fetch=mysqli_fetch_assoc($get_crop_name_sql_exe);
		        						echo strtoupper($get_crop_name_fetch['crop_name']);

		        					?></td>
		        					
		        					<td><?php 
		        						$land_type=($view_fetch['land_type']);
		        						$get_land_query="SELECT * FROM `ilab_water_land_type` WHERE `land_id`='$land_type'";
		        						$get_land_sql_exe=mysqli_query($conn,$get_land_query);
		        						$get_land_fetch=mysqli_fetch_assoc($get_land_sql_exe);
		        						echo strtoupper($get_land_fetch['land_type_name']);

		        					?></td>
		        					
		        					
		        					<td>
		        						<a href="view_detail_edit.php?slno=<?=($view_fetch['sl_num'])?>" class="btn btn-success"> click To Edit</a>
		        						<!-- <a href="admin_new_crop_type_edit.php?slno=<?=web_encryptIt($view_fetch['sl_num'])?>" class="btn btn-success"> click To Edit</a> -->
		        						<br>
		        					
		        						<a href="view_detail_information.php?slno=<?=($view_fetch['sl_num'])?>" class="btn btn-primary"> click To View</a><br>
		        					
		        						<a href="admin_new_water_detail_edit.php?slno=<?=web_encryptIt($view_fetch['sl_num'])?>" class="btn btn-danger"> click To Delete</a>
		        					</td>
		        				</tr>
		        				<?php }?>
		        			
		        			</tbody>
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
