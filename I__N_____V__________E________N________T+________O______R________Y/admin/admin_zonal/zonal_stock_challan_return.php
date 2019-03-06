<?php

session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Zonal Stock Information  ";

 	$zonal_place=$_SESSION['zonal_place'];
 	$item="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_location_id`='$zonal_place' and `damage_loss_status`='1'";
	$sql_item_exe=mysqli_query($conn,$item);
	$num_row=mysqli_num_rows($sql_item_exe);
	if($num_row==0){
		$msg->warning('No Damage Item Is found To Be Return HeadQuater Level');
		header('Location:index.php');
		exit;
	}
 
?>
<style type="text/css">
.panel-body p {
    margin-top: 10px;
}
.form-control[disabled],.form-control[readonly] {
    color: #000809;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Generation Of Stock Return Challan</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Return Management</li>
				<li class="active">Stock Return Challan</li>
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
				 <div class="panel-title">Stock Return Challan Form</div>
				   </div>
				   <form name="myFunction" class="form-horizontal" action="zonal_stock_challan_return_save.php" method="POST">
				     <div class="panel-body">
				     	
					   	<div class="table-responsive">
                       		<table class="display nowrap table" width="100%" cellspacing="0">
								 <thead>
								    <tr>
                                        <th>Slno</th>
                                        <th>HSN Code</th>
			 						    <th>Item Code</th>
			 					        <th>Item Name</th>
			 					        <th>Category Name</th>
			 					        <th>Quantity</th>									    
									    <th>Rate</th>
									    
									</tr>
								</thead>
				        		
	        					<tbody>
	        						<?php 
	        					
	        							$x=0;


	        							while ($result=mysqli_fetch_assoc($sql_item_exe)) {
	        								// print_r($fetch_item);
	        								$x++;
	        								$lid=web_encryptIt($result['zonal_slno']);
											$site_list=web_encryptIt($result['zonal_secondary_code']);
	        								?>
	        						   <tr>
		                 				<tr>
												<input type="hidden" name="zonal_slno[]" value="<?=$result['zonal_slno']?>">
												<input type="hidden" name="zonal_primary_code[]" value="<?=$result['zonal_primary_code']?>">
												<input type="hidden" name="zonal_secondary_code[]" value="<?=$result['zonal_secondary_code']?>">
												<input type="hidden" name="zonal_hsn_code[]" value="<?=$result['zonal_hsn_code']?>">
												<input type="hidden" name="zonal_component_name[]" value="<?=$result['zonal_component_name']?>">
												<input type="hidden" name="zonal_component_id[]" value="<?=$result['zonal_component_id']?>">
												<input type="hidden" name="zonal_category_name[]" value="<?=$result['zonal_category_name']?>">
												<input type="hidden" name="zonal_category_id[]" value="<?=$result['zonal_category_id']?>">
												<input type="hidden" name="zonal_unit[]" value="<?=$result['zonal_unit']?>">
												<input type="hidden" name="zonal_qnty[]" value="<?=$result['zonal_qnty']?>">
												<input type="hidden" name="damage_loss[]" value="<?=$result['damage_loss']?>">
												<input type="hidden" name="damage_loss_status[]" value="<?=$result['damage_loss_status']?>">
												<input type="hidden" name="zonal_location_id[]" value="<?=$result['zonal_location_id']?>">
												<td><?=$x?></td>
												<td><?=strtoupper($result['zonal_hsn_code'])?></td>
												<td><?=strtoupper($result['zonal_secondary_code'])?></td>
						        				<td><?=strtoupper($result['zonal_component_name'])?></td>
						        				<td><?=strtoupper($result['zonal_category_id'])?></td>
						        				<td><?=strtoupper($result['damage_loss'])?> <?=strtoupper($result['zonal_unit'])?></td>
												<td>
													INR <?=round($result['price_charge_unit'],2)?>
													<input type="hidden" name="price_charge_unit[]" min="1" max="<?=$result['price_charge_unit']?>" value="<?=$result['price_charge_unit']?>" readonly required></td>
												
											</tr>
		            					</tr>
	        						<?php
	        						}
	        					   ?>
	        				   </tbody>
    						</table>
    					</div>
    					<br>
    			</div>
    			<div class="panel-footer">
			    	<div class="pull-left">
		    		   <a href="index.php" class="btn btn-warning btn-xs">Back</a>
		    		</div>
		    		<?php if($num_row!=0){?>
		    		<div class="pull-right">
		    			<input type="submit" name="submit" class="btn btn-success btn-xs" value="Submit">
		    		</div>
		    		<?php }?>

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
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(5),:eq(6)").each( function () {
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
</script>
<script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
</script>
