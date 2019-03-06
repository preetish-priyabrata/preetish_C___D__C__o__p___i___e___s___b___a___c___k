q<?php
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Head Quarter List Of Receive Requsition Received";

?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> List Of S.M.R Received From Site</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">S.M.R Management </li>
				<li class="active"> S.M.R Received</li>
				
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
				 <div class="panel-title">List Of S.M.R Received </div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Material Requisition ID</th>
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
				        				$Requsition_query="SELECT * FROM `lt_master_zonal_material_requsition` WHERE `zmr_site_to_location_id`= '$location' and `status`='1' and `forward_status`='1' ORDER BY DATE(`approver_date`) DESC";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['zmr_slno']);
											$site_list=web_encryptIt($result['zmr_unqiue_mr_id']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=strtoupper($result['zmr_unqiue_mr_id'])?></td>
				        				<td>
				        					<?php 
				        						$zmr_site_from_location_id=$result['zmr_site_from_location_id'];
				        						$site_query="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zmr_site_from_location_id'";
				        						$sql_site_name_exe=mysqli_query($conn,$site_query);
				        						$fetch_site=mysqli_fetch_assoc($sql_site_name_exe);
				        						echo strtoupper($fetch_site['zonal_name']);
				        					

				        				?></td>
				        				<td><?=$result['date']?></td>
				        				<td><?=$result['time']?></td>
				        				<td>
				        					<div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="headquarter_mr_raised_detail.php?slno=<?=$lid?>&list=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" target="_blank" >View Detail</a></li>
			                                        <li class="divider"></li>
			                                        <li><a href="approver_mr_raised_detail_issue.php?slno=<?=$lid?>&list=<?=$site_list?>">Issue</a></li>
			                                      <!--   <li><a href="approver_mr_raised_detail_transfer.php?slno=<?=$lid?>&list=<?=$site_list?>">Transfer</a></li> -->
			                                      	                                       
			                                    </ul>
			                                </div>
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
    var table = $('#example77').DataTable();
 
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
