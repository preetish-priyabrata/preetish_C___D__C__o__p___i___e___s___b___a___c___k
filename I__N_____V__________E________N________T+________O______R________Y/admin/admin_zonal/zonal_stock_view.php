<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Zonal Stock Management  ";
 // Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [Token_id] => W4tB9n5Mf9PA1gLcqaqGjqpthQtrHfuTYb7Fc06ehvM= [access] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 
 $zonal_place=$_SESSION['zonal_place'];
 
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
			<div class="page-title"><i class="icon-display4"></i>View Stock Of Zonal</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Stock Management </li>
				<li class="active">View Stock </li>
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
				 <div class="panel-title">Stock Details</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
                       		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
								 <thead>
								    <tr>
									    <th>Sl.No</th>
									    <th>HSN Code</th>
			 						    <th>Item Code</th>
			 						    
			 					        <th>Item Name</th>
			 					        <th>Category Name</th>
			 					        <!-- <th>Unit</th> -->
									    <th>Present Quantity</th>
									   
									    <th>Damage Quantity</th>
									   
									    <th>Action</th>
									</tr>
								</thead>
				        	
	        					<tbody>
	        						<?php 
	        					
	        							$x=0;

	        							$item="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_location_id`='$zonal_place'";
	        							$sql_item_exe=mysqli_query($conn,$item);
	        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
	        								// print_r($fetch_item);`price_charge_unit`, `total_price`
	        								$x++;
	        								$lid=web_encryptIt($fetch_item['zonal_slno']);
											$site_list=web_encryptIt($fetch_item['zonal_secondary_code']);
	        								?>
	        						   <tr>
		                 				<td><?=$x?></td>
 									    <!-- <td>Primary Code</td> -->
 									    <td><?=strtoupper($fetch_item['zonal_hsn_code'])?></td>
						                <td><?=strtoupper($fetch_item['zonal_secondary_code'])?></td>
						              
						                <td><?=strtoupper($fetch_item['zonal_component_name'])?></td>
						              	<td><?=strtoupper($fetch_item['zonal_category_id'])?></td>
						                
						                <!-- <td><?=strtoupper($fetch_item['zonal_unit'])?>
						                </td> -->
						                <td><?=strtoupper($fetch_item['zonal_qnty'])?> <?=strtoupper($fetch_item['zonal_unit'])?>
						                </td>
						                
						                 <td><?=strtoupper($fetch_item['damage_loss'])?> <?=strtoupper($fetch_item['zonal_unit'])?>
						                </td>
						                <td>
				        					<div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="zonal_stock_view_damage.php?token_name=<?=$lid?>&token_id=<?=$site_list?>">Damage</a></li>
			                                    </ul>
			                                </div>
				        				</td>
		            					</tr>
	        						<?php
	        						}
	        					   ?>
	        				   </tbody>
    						</table>
                       </div>
                    </div>
                    <div class="panel-footer">
				    	<div class="pull-left">
			    		   <a href="index.php" class="btn btn-warning">Back</a>
			    		</div>
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
    var table = $('#example77').DataTable({
    	scrollX:        true,
    	columnDefs: [
            { width: '20%', targets: 0 }
        ],
    });
 
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
