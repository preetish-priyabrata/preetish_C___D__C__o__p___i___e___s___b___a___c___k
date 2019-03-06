<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Stock Return Damage Challan  ";

 $field_place=$_SESSION['field_place'];
$item="SELECT * FROM `lt_master_field_stock_info` WHERE `field_location_id`='$field_place' and `damage_loss_status`='1'";
$sql_item_exe=mysqli_query($conn,$item);
if(mysqli_num_rows($sql_item_exe)==0){
	$msg->warning('No Damage Item Is found To Be Return Zonal Level');
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
			<div class="page-title"><i class="icon-display4"></i>Generation Of Stock Return Challan </div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboard</li>
				<li class="">Stock Return Management </li>
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
				     <div class="panel-body">
				     	<form name="myFunction" class="form-horizontal" action="field_stock_challan_return_save.php" method="POST">
					   	<div class="table-responsive">
                       		<table  class="display nowrap table" width="100%" cellspacing="0">
								 <thead>
								    <tr>
									    <th>Slno</th>
									    <th>HSN Code</th>
			 						    <th>Item Code</th>
			 					        <th>Item Name</th>
			 					        <th>Category Name</th>
			 					        <th>Quantity</th>									    
									    <th>Return Quantity</th>
									   <!--  <th>Price/Unti</th> -->
									    <th>Remarks</th>
									</tr>
								</thead>
	        					<tbody>


	        						<?php 
	        					
	        							$x=0;

	        							while ($result=mysqli_fetch_assoc($sql_item_exe)) {
	        								// print_r($fetch_item);
	        								$x++;
	        								$lid=web_encryptIt($result['field_slno']);
											$site_list=web_encryptIt($result['field_secondary_code']);
	        								?>
	        						   <tr>

	        						   	<tr>
	        						   		<input type="hidden" name="field_slno[]" value="<?=$result['field_slno']?>">
											<input type="hidden" name="field_hsn_code[]" value="<?=$result['field_hsn_code']?>">
											<input type="hidden" name="field_primary_code[]" value="<?=$result['field_primary_code']?>">
											<input type="hidden" name="field_secondary_code[]" value="<?=$result['field_secondary_code']?>">
											<input type="hidden" name="field_component_name[]" value="<?=$result['field_component_name']?>">
											<input type="hidden" name="field_component_id[]" value="<?=$result['field_component_id']?>">
											<input type="hidden" name="field_category_name[]" value="<?=$result['field_category_name']?>">
											<input type="hidden" name="field_category_id[]" value="<?=$result['field_category_id']?>">
											<input type="hidden" name="field_unit[]" value="<?=$result['field_unit']?>">
											<input type="hidden" name="field_qnty[]" value="<?=$result['field_qnty']?>">
											<input type="hidden" name="damage_loss[]" value="<?=$result['damage_loss']?>">
											<input type="hidden" name="damage_loss_status[]" value="<?=$result['damage_loss_status']?>">
											<input type="hidden" name="field_location_id[]" value="<?=$result['field_location_id']?>">
											<input type="hidden" name="price_charge_unit[]" value="<?=$result['price_charge_unit']?>">
												<td><?=$x?></td>
												<td><?=strtoupper($result['field_hsn_code'])?></td>
												<td><?=strtoupper($result['field_secondary_code'])?></td>
						        				<td><?=strtoupper($result['field_component_name'])?></td>
						        				<td><?=strtoupper($result['field_category_name'])?></td>
						        				<td><?=$result['damage_loss']?> <?=strtoupper($result['field_unit'])?></td>
												<td><input type="number" name="damage_qnty[]" min="1" max="<?=$result['damage_loss']?>" value="<?=$result['damage_loss']?>" readonly  required>
													 <?=strtoupper($result['field_unit'])?>
												</td>
												<!-- <td> INR 
													 <?=round(strtoupper($result['price_charge_unit']),2)?>
												</td> -->
												<td><textarea name="Remarks_return[]" required=""></textarea>
												</td>
											</tr>
		            					</tr>
	        		
		                 				
		            					</tr>
	        						<?php
	        						}
	        					   ?>
	        				   </tbody>
    						</table>
    					</div>
    					<br>
							
							<div class="row">
								<div class="form-group text-center">
									<div class="pull-left">
		    		   					<a href="index.php" class="btn btn-warning">Back</a>
		    		  				</div>
		    		  				<?php if(mysqli_num_rows($sql_item_exe)!=0){
		    		  					?>
		    		  				 <input type="submit" name="submit" class="btn btn-success" value="Submit">
		    		  				 <?php }?>
						     
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




