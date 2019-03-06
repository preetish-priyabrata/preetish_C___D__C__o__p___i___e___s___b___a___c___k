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
	       View All Details List
	        <small>it all starts here</small>
	      </h1>
    	</section>

	    <!-- Main content -->
	    <section class="content">
	    	<div class="row">
				<?php $msg->display(); ?>
			</div>
			<div class="box">
		        <div class="box-header with-border">
		        	<h3 class="box-title">View Detail List</h3>
		        </div>
		    </div>
		        <div class="box-body">
					<div class="col-xs-12">
					</div>
				</div>
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
		        				 $view_query="SELECT * FROM `ilab_water_sub_menu` where `status`!='3' ";
		        				   $view_sql_exe=mysqli_query($conn,$view_query);
		        				      while ($view_fetch=mysqli_fetch_assoc($view_sql_exe)){
		        				      	$x++;
		        				?>
		        				<tr>
		        					<td><?=$x?></td>
		        					<td><?=strtoupper($view_fetch['sub_menu_name'])?></td>
		        					<td width="30%">
		        						<?php 
		        						if(file_exists("../upload/sub_menu_image/".$view_fetch['image_file_name'])){
		        							?>
		        						<img src="../upload/sub_menu_image/<?=$view_fetch['image_file_name']?>" width="50%">
		        						<?php }else{
		        							echo "<b style='color:red'>Unable find Picture</b>";
		        						}?>

		        						</td>
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
		        						<a href="admin_new_sub_menu_edit.php?slno=<?=web_encryptIt($view_fetch['sl_num'])?>" class="btn btn-success"> click To Edit</a>
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

