q<?php
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Head Quarter List Of Challan Generated ";

?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>HeadQuarter Challan Generated List</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">S.M.R Management</li>
				<li class="active">View Generated Challan</li>
				
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
				 <div class="panel-title">History Of Challan Issued To Site</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
									    <th>Challan No</th>
			 						    <th>Material Requsition ID</th>
			 						    <th>Site Location</th>
									    <th>Date</th>
									    <th>Time</th>
									   	<th>Action </th>
									</tr>
								</thead>
				        	
				        		<tbody>
				        			<?php 
				        				$location=$_SESSION['hq_store_id'];
				        				// zmr_unqiue_mr_id	// 
				        				$x=0;
				        		        $site_query="SELECT * FROM `lt_master_hq_challan_generate` WHERE `hqcg_status`='1' ORDER BY `hqcg_slno` DESC";
				        				$sql_Requsition_exe=mysqli_query($conn,$site_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        			    $x++;
				        					$lid=web_encryptIt($result['hqcg_slno']);
											$site_list=web_encryptIt($result['hqcg_challan_no']);

											// `hqcg_slno`, `hqcg_site_mr_id`, `hqcg_item_issued`, `hqcg_challan_no`, `hqcg_status`, `hqcg_date`, `hqcg_time`, `hqcg_hq_location_id`, `hqcg_zonal_location_id`, `hqcg_issuer_id`, `hqcg_receiver_id`, `hqcg_receive_date`, `hqcg_receive_time`, `hqcg_receive_status`, `dc_no`, `date_enter`, `Indent_no`, `Vehicle_no`, `LR_no`, `LR_date`, `Project_No`, `send_status`, `Indent_dated`, `place_to`
											
				        			?>
				        			 <tr>
				        				<td><?=$x?></td>
				        		        <td><?=strtoupper($result['dc_no'])?></td>
				        				<td><?=strtoupper($result['Indent_no'])?></td>
				        				<td>
				        				  <?php 
				        					$zmr_site_from_location_id=$result['hqcg_zonal_location_id'];
				        					$site_query1="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zmr_site_from_location_id'";
				        					$sql_site_name_exe=mysqli_query($conn,$site_query1);
				        					$fetch_site=mysqli_fetch_assoc($sql_site_name_exe);
				        					echo strtoupper($fetch_site['zonal_name']);
				        			    ?></td>

			        			     	<td><?=$result['hqcg_date']?></td>
				        				<td><?=$result['hqcg_time']?></td>
				        				<td>
				        					<a class="btn btn-sm btn-success" href="hq_received_challan_prints.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?=web_encryptIt('3')?>" target="_blank" >View Challan</a>
				        					
				        			   	 </td>
				        			  </tr>
				        		   <?php }?>
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
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(2),:eq(3),:eq(5)").each( function () {
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
        if (colIdx == 0 || colIdx == 4 || colIdx == 2 || colIdx == 3 ) return;
        
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
