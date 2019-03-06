<?php
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Zonal User Raise Material Requsition form ";
$zonal_place=$_SESSION['zonal_place'];
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> History Of S.M.R Sent</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">S.M.R Management </li>
				<li class="">S.M.R History</li>
				<li class="active">S.M.R Sent History</li>
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
				 <div class="panel-title">History Of S.M.R Sent List</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Material Requisition ID</th>
									    <th>Date</th>
									    <th>Time</th>
									   	<th>Action </th>
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php 
				        				$zonal_place=$_SESSION['zonal_place'];
				        				// zmr_unqiue_mr_id	// 
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_zonal_material_requsition` WHERE `zmr_site_from_location_id`='$zonal_place' and `status`='1' and `sent_status`='1'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['zmr_slno']);
											$site_list=web_encryptIt($result['zmr_unqiue_mr_id']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=strtoupper($result['zmr_unqiue_mr_id'])?></td>
				        				<td><?=$result['date']?></td>
				        				<td><?=$result['time']?></td>
				        				<td>
				        					<a href="zonal_mr_raised_detail_view.php?slno=<?=$lid?>&list=<?=$site_list?>" target="_blank" class="btn btn-info btn-xs">View</a>
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
