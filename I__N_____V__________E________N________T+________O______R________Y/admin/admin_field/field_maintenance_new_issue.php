<?php

session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Field User Raise Material Requsition form ";
 // Array ( [form_type] => KCpzvsPmYgJD/rn6kb7S9AMsa2LK5q/SPHmHybEpHdc= [user_location] => field001 [date_info] => 2017-11-27 [Time_info] => 19:01:29 [machine_no] => mud698 )
  $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $challan=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['access'])); 

$zonal_place=$_SESSION['zonal_place'];
$field_place=$_SESSION['field_place'];
$get_infomation="SELECT * FROM `lt_master_field_maintenance_job` WHERE `fmg_slno`='$slno' and `fmg_job_id`='$challan'";
$sql_exe=mysqli_query($conn,$get_infomation);
$res_get_information=mysqli_fetch_assoc($sql_exe);
$machine_no=$res_get_information['fmg_machine_id'];
?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
.form-control[disabled], .form-control[readonly] {
    color: #000809;
}

</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Maintenance Form</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Maintenance job </li>
				<li class="active">Create Job Card </li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
	  <div class="row">
		<?php $msg->display(); ?>
		 <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
			 <div class="panel panel-default">
			   <div class="panel-heading">
				 <div class="panel-title">Create Job Card Form</div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" class="form-horizontal" action="field_maintenance_new_issue_save.php" method="POST">
					   		<input type="hidden" name="form_type" value="<?=web_encryptIt('field_job1')?>">
					   		<div class="row">
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
										<input type="hidden" class="form-control" name="user_location" id="user_location" placeholder="Enter Name" autocomplete="off" value="<?=$_SESSION['field_place']?>" required="">
										<?php 
											// $field_place=$_SESSION['field_place'];
		        							$query_sql2="SELECT * FROM `lt_master_field_place` WHERE `field_code`='$field_place'";
		        							$sql_exe2=mysqli_query($conn,$query_sql2);
		        							$result2=mysqli_fetch_assoc($sql_exe2);
		        							echo "<p>".strtoupper($result2['field_name'])."</p>";
										?>
								   </div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Date : </label>
								    <div class="col-lg-8">
										<input type="hidden" class="form-control" name="date_info" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=date('Y-m-d')?>" required=""><p><?=$res_get_information['fmg_date_entry']?></p>
								   </div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4 text-right">Maintenance</label>
									<div class="col-lg-8">
										<select name="maintenance_id" class="form-control">
        						    		<option value="">--Select Catrgory--</option>
        						    		<option value="scheduled" <?php if($res_get_information['maintenace_type']=='scheduled'){echo "selected";}?>>SCHEDULED</option>
        						    		<option value="predictive"  <?php if($res_get_information['maintenace_type']=='predictive'){echo "selected";}?> >PREDICTIVE</option>
        						    		<option value="immediate" <?php if($res_get_information['maintenace_type']=='immediate'){echo "selected";}?> >IMMEDIATE</option>
        						    	</select>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Time : </label>
								    <div class="col-lg-8">
										<input type="hidden" class="form-control" name="Time_info" id="mobile_no" placeholder="Enter Mobile No" value="<?=date('H:i:s')?>" autocomplete="off" required=""><p><?=date('h:i:s a')?></p>
								    </div>
								</div>
								
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Machine No : </label>
								    <div class="col-lg-8">
								    	<p><?=strtoupper($machine_no)?> / </p>
										<input type="hidden"  name="machine_no"  value="<?=$machine_no?>">
											<?php
											$get_information="SELECT * FROM `lt_master_machine__transfer_information` WHERE `t_field_location_id`='$field_place'and`t_status`='1' and `t_unique_id_machine`='$machine_no'";
											$sql_exe_machine=mysqli_query($conn,$get_information);
											$machine_no_fetch=mysqli_fetch_assoc($sql_exe_machine);
											$model_id=$machine_no_fetch['model_id'];
											?>
											<input type="hidden"  name="model_id"  value="<?=$model_id?>">
											<p><?=strtoupper($model_id)?></p>
									</div>
								</div>
								<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Job id : </label>
								    <div class="col-lg-8">
								    	<p><?=strtoupper($challan)?></p>
										<input type="hidden"  name="challan"  value="<?=$challan?>">
											
											
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<br>
						 <div class="row">
						 	<div class="col-md-12 col-sm-12">
						 	 <div class="panel panel-default">
							   <div class="panel-heading">
								 <div class="panel-title text-center">Component List</div>
								   </div>
								     <div class="panel-body">
										 <div class="table-responsive">
				                            <table  class="table table-bordered table-hover">
												<thead>
													<tr>
														<!-- <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th> -->
														<th >Item Code</th>
														<th >Component Name</th>
														<th >Category Type</th>
														<!-- <th >Unit</th> -->
														<th >Stock Quantity</th>
														<th >Requested Quantity</th>
														<!-- <th >Rate/Unit</th> -->
														<th>Issue Quantity</th>
													</tr>
												</thead>
												<tbody><?php 
												$materil="SELECT * FROM `lt_master_field_maintenance_job_detail` WHERE  `fmgd_job_id`='$challan'";
												$sql_material=mysqli_query($conn,$materil);
												while ($res=mysqli_fetch_assoc($sql_material)) {
													$get_price="SELECT * FROM `lt_master_field_stock_info` WHERE `field_secondary_code`='$res[fmgd_secondary_id]' and `field_location_id`='$field_place'";
													$sql_get_price=mysqli_query($conn,$get_price);
													$res_get_price=mysqli_fetch_assoc($sql_get_price);
													?>
												
													<tr>
														<input type="hidden" name="main_slno[]" value="<?=$res['fmgd_slno']?>">
														<input type="hidden" name="fmgd_secondary_id[]" value="<?=$res['fmgd_secondary_id']?>">
														
														<td><?=strtoupper($res['fmgd_secondary_id'])?></td>
														<td><?=strtoupper($res['fmgd_item_name'])?></td>
														<td ><?=strtoupper($res['fmgd_category_name'])?></td>
														
														<td><?=strtoupper($hq_qnty_single=$res['fmgd_available_id'])?> <?=strtoupper($res['fmgd_unit_id'])?></td>
														<td ><?=strtoupper($hqzis_approve_qnt_single=$res['fmgd_quantity_id'])?> <?=strtoupper($res['fmgd_unit_id'])?></td>
														<?php
										                	if($hq_qnty_single == 0){
																$remain=0;
																 $hqzis_approve_qnt_single=0;
															}else{
																if($hqzis_approve_qnt_single < $hq_qnty_single){
																	 $remain1=$hq_qnty_single-$hqzis_approve_qnt_single;

																}else if($hqzis_approve_qnt_single == $hq_qnty_single){
																	$remain1=$hq_qnty_single-$hqzis_approve_qnt_single;
																}else if($hqzis_approve_qnt_single > $hq_qnty_single){
																	 $remain1=$hq_qnty_single-$hqzis_approve_qnt_single;

																}

																if($remain1<0){
																	$remain=$hqzis_approve_qnt_single-$hq_qnty_single;
																	$hqzis_approve_qnt_single=$hqzis_approve_qnt_single-$remain;
																}else{
																	$remain=$hq_qnty_single-$hqzis_approve_qnt_single;
																}
															}
										                ?>
										                 <?php $price_charge_unit=round($res_get_price['price_charge_unit'],2)?>
										                	<input type="hidden"  value="<?=$price_charge_unit?>" name="price_charge_unit[]" required>
										                
														<td ><input type="number" min="0" max="<?=$hqzis_approve_qnt_single?>" value="<?=$hqzis_approve_qnt_single?>" name="zqzis_issue_qnt[]" required placeholder=" Enter Quantity"> <?=strtoupper($res['fmgd_unit_id'])?></td>
														
													</tr>
													<?php }?>
												</tbody>
											</table>

										    	
										   
				                        </div>
				                    </div>
				                </div>
				            </div>
                            <br>
						</div>
					</div>
					<br>
					<div class="row">
					   	<div class="form-group text-center">
					 		
					 		<input type="submit" class="btn btn-info" value="Issue">
				   		</div>
				   	</div>
				 </form>
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
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 4 ) return;
        
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );
	$(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>



