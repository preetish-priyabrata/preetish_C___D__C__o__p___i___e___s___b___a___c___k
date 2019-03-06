<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Zonal Damage Stock Information  ";
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
			<div class="page-title"><i class="icon-display4"></i>Stock Returned Challan Received From  Field History</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Return Management</li>
				<li class="active">Stock Return Challan From Field History</li>
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
				 <div class="panel-title">Return Challan Received From Field History List</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
                       		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
								 <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Damage Challan</th>
			 					        <th>field Name</th>
			 					        <th>Status</th>
			 					        <th>Date </th>
			 					        <th>Time </th>
									    <th>Action</th>
									</tr>
								</thead>
				        		
	        					<tbody>
	        						<?php
	        						
	        							$x=0;
	        							$item="SELECT * FROM `lt_master_field_challan_damage` WHERE `location_to`='$zonal_place' and `receive_status`='1' order by `slno` desc ";
	        							$sql_item_exe=mysqli_query($conn,$item);
	        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
	        								// print_r($fetch_item);
	        								$x++;
	        								$lid=web_encryptIt($fetch_item['slno']);
											$site_list=web_encryptIt($fetch_item['field_damage_challan']);
											$location_from=$fetch_item['location_from'];
	        								?>
	        						   <tr>
		                 				<td><?=$x?></td> 									    
						                <td><?=$fetch_item['field_damage_challan']?></td>
						                <td><?php 
										// $field_code=$fetch_check['zqcg_zonal_location_id'];
	        							$query_sql2="SELECT * FROM `lt_master_field_place` WHERE `field_code`='$location_from'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo strtoupper($result2['field_name']);
									?></td>
						                <td><?php 
						                $receive_status=$fetch_item['receive_status'];
						                if($receive_status==0){
						                	echo "Not Received";
						                }else{
						                	echo "Received";
						                }
						                ?></td>
						              	<td><?=$fetch_item['date_entry']?></td>
						                
						                <td><?=$fetch_item['time_entry']?></td>
						                 <td>
						                 	<a class="btn btn-success btn-xs" href="zonal_stock_challan_return_field_view_history.php?token_name=<?=$lid?>&token_id=<?=$site_list?>" >View Detail </a>
				        					<!-- <div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li></li>
			                                         <li class="divider"></li>
			                                          <li><a href="zonal_stock_challan_return_field_view_save.php?token_name=<?=$lid?>&token_id=<?=$site_list?>">Confirm Receive Of Damage</a></li>
			                                    </ul>
			                                </div> -->
				        				</td>
		            					</tr>
	        						<?php
	        						}
	        					   ?>
	        				   </tbody>
    						</table>
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
