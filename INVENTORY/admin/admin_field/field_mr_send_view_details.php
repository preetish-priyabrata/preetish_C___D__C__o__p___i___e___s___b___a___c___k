<?php
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Field Receive New Challan ";
$field_place=$_SESSION['field_place'];
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Details Of M.R Raised By Field</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboard</li>
				<li class="">Requisition Management</li>
				<li class="">M.R History</li>
				<li class="">Field M.R Sent</li>
				<li class="active">M.R Details</li>
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
				 <div class="panel-title">Field M.R Details</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table  class="display nowrap table" width="100%" cellspacing="0">
							    <thead>
						            <tr>
						                <th>Sl.No</th>
						                <th>HSN Code</th>
						                <th>Item Code</th>
						                <th>Component Name</th>
						                <th>Component Category</th>
						                <th>Maintenance Category</th>
						                <th>Requested Quantity</th>
						                <th>Date</th>
						            </tr>
						         </thead>
	        					
				        		
				        	   <tbody>
				        			<?php 
				        				// $zonal_place=$_SESSION['zonal_place'];
				        				// zmr_unqiue_mr_id `zqcg_challan_no` and	// 
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_field_material_requsition_details` WHERE `fmrd_site_location_id`='$field_place'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['fmrd_slno']);
											$site_list=web_encryptIt($result['fmr_unqiue_mr_id_iteam']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=strtoupper($result['fmrd_hsn_code'])?></td>
				        				<td><?=strtoupper($result['fmrd_second_code'])?></td>
				        				<td><?=strtoupper($result['fmrd_name_item'])?></td>
				        				<td><?=strtoupper($result['fmrd_category_name'])?></td>
				        				<td><?=strtoupper($result['maintenance_id'])?></td>
				        				<td><?=strtoupper($result['fmrd_request_qnt'])?> <?=strtoupper($result['fmrd_units_required'])?></td>
				        				<td><?=strtoupper($result['fmrd_date_entry'])?></td>
				        			</tr>
				        				<?php }?>
				        		</tbody>
			    			</table>
			    		</div>
			    	</div>
			    	<div class="panel-footer">
			    	  <div class="pull-left">
		    		   <a href="field_mr_send_view.php" class="btn btn-warning">Back</a>
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
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(2),:eq(3),:eq(5),:eq(6)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 4|| colIdx == 2 || colIdx == 3 || colIdx == 5 || colIdx == 6  ) return;
        
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>
