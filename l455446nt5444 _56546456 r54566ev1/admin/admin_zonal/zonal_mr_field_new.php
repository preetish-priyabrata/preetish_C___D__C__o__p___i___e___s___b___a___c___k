<?php
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Zonal User Received Material Requsition form ";
///$zonal_place=$_SESSION['zonal_place'];
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>New Field M.R List Received By Site</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Received Management</li>
				<li class="active">Field M.R Received</li>
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
				   <div class="panel-title"> Field M.R Received List</div>
				     </div>
				       <div class="panel-body">
					   	 <div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							   <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Machine No</th>
			 						    <th>Model No</th>
			 					        <th>Requisition Id</th>
			 					        <th>Field Location</th>
									    <th>Date</th>
									    <th>Time</th>
									   	<th>Action </th>
									</tr>
								</thead>
				        		<tbody>
				        			<?php 
				        				$zonal_place=$_SESSION['zonal_place'];
				        				// zmr_unqiue_mr_id `hqcg_challan_no` and	// 
				        				$x=0;
                                        $issue_query="SELECT * FROM `lt_master_field_material_requsition` WHERE `status`='1' and `send_mr_zonal`='1' and `fmr_site_to_location_id`='$zonal_place'";
                                        $issue_query_exe=mysqli_query($conn,$issue_query);
                                        while ($result=mysqli_fetch_assoc($issue_query_exe)) {
                                        	$x++;
                                  			$lid=web_encryptIt($result['fmr_slno']);
											$site_list=web_encryptIt($result['fmr_unqiue_mr_id']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=strtoupper($result['machine_no'])?></td>
				        				<td><?=strtoupper($result['model_id'])?></td>
				        				<td><?=strtoupper($result['fmr_unqiue_mr_id'])?></td>
				        				<td><?=strtoupper($result['fmr_site_from_location_id'])?></td>
				        				<td><?=strtoupper($result['date'])?></td>
				        				<td><?=strtoupper($result['time'])?></td>
				        				<td>
				        					<a class="btn btn-success btn-xs" href="zonal_mr_field_new_issue.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt(3)?>&fmr_slno=<?=$result['fmr_slno']?>" >Issue</a>
				        					
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
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(2),:eq(3)").each( function () {
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
