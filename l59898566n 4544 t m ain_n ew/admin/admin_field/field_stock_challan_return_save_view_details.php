<?php

// Array ( [token_name] => Nzq6mzbwAYNGhKPhBYtu39f5vH7nnvpp/IV9 8nsc4I= [token_id] => 5jr635gJaohpkMh7Knn4KMwzgxmwsgFS4snDsGNtZik= ) 
session_start();
ob_start();
if($_SESSION['admin_field']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
 $field_slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name'])); //zmr_slno
 $fsindi_challan_no=$field_secondary_code=web_decryptIt(str_replace(" ", "+", $_GET['token_id'])); //zmr_unqiue_mr_id
 $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
 $field_place=$_SESSION['field_place'];
 $damage="SELECT * FROM `lt_master_field_challan_damage` WHERE `field_damage_challan`='$fsindi_challan_no'";
 $sql_exe_damage=mysqli_query($conn,$damage);
 $fetch_sql_exe_damage=mysqli_fetch_assoc($sql_exe_damage);
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Field Damage Transfer To Zonal</div>
			<ul class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">Return Management</a></li>
				<li><a href="#">Stock Return Challan to Zonal History</a></li>
				<li class="active">Damage challan Details</li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
		<?php $msg->display(); ?>
			
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-default">
			   		<div class="panel-heading">
						<div class="panel-title">Stock Damage Transfer</div>
				    </div>
				    <div class="panel-body">
						<!-- <form name="myFunction" class="form-horizontal" action="zonal_stock_view_damage_save.php" method="POST"> -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label class="control-label col-sm-2" for="email">
									    Damage Challan Id:</label>
									    <div class="col-sm-10">
									    	<p><?=$field_secondary_code?></p>
									      <!-- <input type="email" class="form-control" id="email" placeholder="Enter email"> -->
									    </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label class="control-label col-sm-2" for="email">
									    Date Of Generate :</label>
									    <div class="col-sm-10">
									    	<p><?=$fetch_sql_exe_damage['date_entry']?></p>
									      
									    </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label class="control-label col-sm-2" for="email">
									    Time Of Generate :</label>
									    <div class="col-sm-10">
									     <p><?=$fetch_sql_exe_damage['time_entry']?></p>
									    </div>
									</div>
								</div>
							</div>
							<div class='row'>
						   		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						      		<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th width="15%">Item Code</th>
												<th width="15%">Component Name</th>
												<th width="15%">Category Type</th>
												<th width="15%">Damage Quantity</th>
												
											</tr>
										</thead>
										<tbody>
											<?php 
											// `zsindi_sno`, `zsindi_challan_no`, `zsindi_primary_code`, `zsindi_secondary_code`, `zsindi_component_name`, `zsindi_component_type_id`, `zsindi_component_type_name`, `zsindi_unit`, `zsindi_qnt`, `zsindi_status`, `zsindi_date`, `zsindi_time`, `zsindi_hqlocation_id`, `zsindi_return_challan_id`, `zsindi_return_slno`, `zsindi_return_location_id`
											$Requsition_query="SELECT * FROM `lt_master_field_internal_damage_info` WHERE `fsindi_challan_no`='$fsindi_challan_no'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) { 
				        					?>
											<tr>
												<td><?=$result['fsindi_secondary_code']?></td>
						        				<td><?=$result['fsindi_component_name']?></td>
						        				<td><?=$result['fsindi_component_type_name']?></td>
						        				<td><?=$result['fsindi_qnt']?> <?=$result['fsindi_unit']?></td>
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
							<br>

							<div class="row">
								<div class="form-group text-center">
								    <button type="button" onclick="close_window()" class="btn btn-success">Back</button> 
						     
							   </div>
							</div>
				    	<!-- </form> -->
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
include 'templete/header.php';

?>
<script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
</script>

