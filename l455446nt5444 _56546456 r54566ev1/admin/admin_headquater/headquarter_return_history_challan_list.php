<?php

session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Headquater Return Stock Information  ";
 // Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [Token_id] => W4tB9n5Mf9PA1gLcqaqGjqpthQtrHfuTYb7Fc06ehvM= [access] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 
 $location=$_SESSION['hq_store_id'];
 
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
			<div class="page-title"><i class="icon-display4"></i>History Of Return Challan </div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Return Challan Management</li>
				<li class="active">History Of Return Challan</li>
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
				 <div class="panel-title">History Of Return Challan</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
                       		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
								 <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Damage Challan</th>
			 					        <th>Zonal Name</th>
			 					        <th>Status</th>
			 					        <th>Date </th>
			 					        <th>Time </th>
									    <th>Action</th>
									</tr>
								</thead>
				        		
	        					<tbody>
	        						<?php
	        						// `slno`, `zonal_damage_challan`, `location_to`, `status`, `approve_status`, `issue_status`, `receive_status`, `no_items`, `date_entry`, `date_approve`, `date_receive`, `date_issue`, `time_entry`, `time_approve`, `time_receive`, `time_issue`, `user_entry_id`, `user_issue_id`, `user_approve_id`, `user_receiver_id`, `location_from`
	        							$x=0;
	        							$item="SELECT * FROM `lt_master_zonal_challan_damage` WHERE `location_to`='$location' and `receive_status`='1'";
	        							$sql_item_exe=mysqli_query($conn,$item);
	        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
	        								// print_r($fetch_item);
	        								$x++;
	        								$lid=web_encryptIt($fetch_item['slno']);
											$site_list=web_encryptIt($fetch_item['zonal_damage_challan']);
											$location_from=strtoupper($fetch_item['location_from']);
	        								?>
	        						   <tr>
		                 				<td><?=$x?></td> 									    
						                <td><?=$fetch_item['zonal_damage_challan']?></td>
						                <td><?php 
										// $field_code=$fetch_check['zqcg_zonal_location_id'];
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$location_from'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo strtoupper($result2['zonal_name']);
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
						                 <td><a href="headquarter_return_challan_list_view_history.php?token_name=<?=$lid?>&token_id=<?=$site_list?>" class="btn btn-success btn-xs">View Detail</a></td>
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
