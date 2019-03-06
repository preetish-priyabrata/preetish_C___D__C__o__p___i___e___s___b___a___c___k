<?php
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Agriculture Crop Menu List";
?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    	<section class="content-header">
	      <h1>
	       View Agriculture Crop List
	        <small>it all starts here</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">General Setting</a></li>
        	<li><a href="#">Agriculture Crop Menu</a></li>
        	<li class="active">View Agriculture Crop </li>
	      </ol>
    	</section>

	    <!-- Main content -->
	    <section class="content">
	    	<div class="row">
				<?php $msg->display(); ?>
			</div>
			<div class="box">
		        <div class="box-header with-border">
		        	<h3 class="box-title">View Agriculture Crop Menu List</h3>
		        </div>
		        <div class="box-body">
					<div class="col-xs-12">
						<table id="" class="display" style="width:100%">
		        			<thead>
					            <tr>
					                <th>Slno</th>
					                <th>Crop Type</th>
					                <th>Crop Name</th>
					                <th width="30%">Image</th>
					                <th>Status</th>
					                <th>Actions</th>
					            </tr>
		        			</thead>
		        			<tbody>
		        				<?php
		        				$x=0;
		        				 $view_query="SELECT * FROM `ilab_water_crops` where `status`!='0' ";
		        				   $view_sql_exe=mysqli_query($conn,$view_query);
		        				      while ($view_fetch=mysqli_fetch_assoc($view_sql_exe)){
		        				      	$x++;
		        				?>
		        				<tr>
		        					<td><?=$x?></td>
		        					<td><?php 
		        						 $sub_menu_id=$view_fetch['sub_menu_id'];
		        						$get_crop_query="SELECT * FROM `ilab_water_sub_menu` WHERE `sub_menu_id`='$sub_menu_id'";
		        						$get_crop_query_sql_exe=mysqli_query($conn,$get_crop_query);
		        						$crop_type_fetch=mysqli_fetch_assoc($get_crop_query_sql_exe);
		        						echo strtoupper($crop_type_fetch['sub_menu_name'])?>
		        					</td>
		        					<td><?=strtoupper($view_fetch['crop_name'])?></td>
		        					<td width="30%">
		        						<?php 
		        						if(file_exists("../upload/crop/".$view_fetch['image_file_name'])){
		        							?>
		        						<img src="../upload/crop/<?=$view_fetch['image_file_name']?>" width="50%">
		        						<?php }else{
		        							echo "<b style='color:red'>Unable find Picture</b>";
		        						}?>

		        						</td>
		        					<td>

		        						<?php 
			        						if($view_fetch['status']==0){
			        							echo "Active";

			        						}else{
			        							echo "In-Active";
			        						}

		        						?>
		        					</td>
		        					<td>
		        						<a href="admin_new_crop_type_edit.php?slno=<?=web_encryptIt($view_fetch['crops_sl_num'])?>" class="btn btn-success"> click To Edit</a>
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
