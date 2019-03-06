<?php
session_start();
ob_start();
if($_SESSION['admin_field']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
  // print_r($_GET);
  // exit;
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
			<div class="page-title"><i class="icon-display4"></i> Field Return Transfer To Zonal</div>
			<ul class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">Return Management</a></li>
				<li><a href="#">Stock Return Challan to Zonal History</a></li>
				<li class="active">Return challan Details</li>
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
						<div class="panel-title">Stock Return Transfer</div>
				    </div>
				    <div class="panel-body">
						<!-- <form name="myFunction" class="form-horizontal" action="zonal_stock_view_damage_save.php" method="POST"> -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label class="control-label col-sm-2" for="email">
									    Return Challan Id:</label>
									    <div class="col-sm-10">
									    	<p><?=strtoupper($field_secondary_code)?></p>
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
												<th width="15%">Return Quantity</th>
												<!-- <th width="15%">Rate/Unit</th> -->
												<th width="15%">Remark </th>
												
											</tr>
										</thead>
										<tbody>
											<?php 
											
										$Requsition_query="SELECT * FROM `lt_master_field_internal_damage_info` WHERE `fsindi_challan_no`='$fsindi_challan_no'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) { 
				        					?>
											<tr>
												<td><?=strtoupper($result['fsindi_secondary_code'])?></td>
						        				<td><?=strtoupper($result['fsindi_component_name'])?></td>
						        				<td><?=strtoupper($result['fsindi_component_type_name'])?></td>
						        				<td><?=strtoupper($result['fsindi_qnt'])?> <?=strtoupper($result['fsindi_unit'])?></td>
						        				
						        				<td><?=strtoupper($result['remark_return'])?></td>
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="form-group text-left">
								  <a href="field_stock_challan_return_save_view.php" class="btn btn-warning">Back</a>
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
<!-- <script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
</script> -->

