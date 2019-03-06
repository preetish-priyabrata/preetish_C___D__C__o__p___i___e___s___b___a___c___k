<?php
session_start();
ob_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
 $hq_slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name'])); //zmr_slno
 $zonal_damage_challan=$hq_secondary_code=web_decryptIt(str_replace(" ", "+", $_GET['token_id'])); //zmr_unqiue_mr_id
 $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
 $zonal_place=$_SESSION['zonal_place'];
 // SELECT * FROM `lt_master_field_challan_damage` WHERE `field_damage_challan` and `slno`
 $damage="SELECT * FROM `lt_master_zonal_challan_damage` WHERE `zonal_damage_challan`='$zonal_damage_challan'";
 $sql_exe_damage=mysqli_query($conn,$damage);
$fetch_sql_exe_damage=mysqli_fetch_assoc($sql_exe_damage);

$lid=web_encryptIt($fetch_sql_exe_damage['slno']);
$site_list=web_encryptIt($fetch_sql_exe_damage['zonal_damage_challan']);

?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Zonal Damage Transfer From  Field</div>
			<ul class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">Return Management</a></li>
				<li><a href="#">Stock Return Challan From Field</a></li>
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
				    	<form class="form-horizontal" action="#" >
				    <div class="panel-body">
					
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label class="control-label col-sm-2" for="email">
									    Damage Challan Id:</label>
									    <div class="col-sm-10">
									    	<p><?=strtoupper($hq_secondary_code)?></p>
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
												<th width="15%">HSN Code</th>
												<th width="15%">Primary Code</th>
												<th width="15%">Secondary Code</th>
												<th width="15%">Component Name</th>
												<th width="15%">Category Type</th>
												<th width="15%">Damage Quantity</th>
												<th width="15%">Rate</th>
												
											</tr>
										</thead>
										<tbody>
											<?php 
											
											$Requsition_query="SELECT * FROM `lt_master_zonal_internal_damage_info` WHERE `zsindi_challan_no`='$zonal_damage_challan'";
				        					$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        					while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) { 
				        					?>
											<tr>
												<td><?=strtoupper($result['zsindi_hsn_code'])?></td>
												<td><?=strtoupper($result['zsindi_primary_code'])?></td>
												<td><?=strtoupper($result['zsindi_secondary_code'])?></td>
						        				<td><?=strtoupper($result['zsindi_component_name'])?></td>
						        				<td><?=strtoupper($result['zsindi_component_type_id'])?></td>
						        				<td><?=strtoupper($result['zsindi_qnt'])?> <?=strtoupper($result['zsindi_unit'])?></td>
						        				<td>INR <?=round(strtoupper($result['rate_price_unit']),2)?></td>
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							
							
				    	
					</div>
					<div class="panel-footer">
							<div class="pull-left">
								<a href="index.php" class="btn btn-warning">Back</a>
							</div>
							<div class="pull-right">
								<a class="btn btn-success" href="headquarter_return_challan_list_view_save.php?token_name=<?=$lid?>&token_id=<?=$site_list?>" onclick="return confirm('Are you sure you want to Confirm Receive Of Damage items ?');">Confirm Receive Of Damage</a>
							</div>
						</div>
					</form>
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

