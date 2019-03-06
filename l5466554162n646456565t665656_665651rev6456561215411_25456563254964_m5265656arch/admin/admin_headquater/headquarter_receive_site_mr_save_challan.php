<?php
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
			<div class="page-title"><i class="icon-display4"></i>S.M.R Received History</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">S.M.R Management</li>
				<li class="active">S.M.R History</li>
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
				 <div class="panel-title">History Of S.M.R Received</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        	  <table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Challan No</th>
			 						    <th>S.M.R No</th>
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
				        				$Requsition_query="SELECT * FROM `lt_master_hq_challan_generate` WHERE `send_status`='0' and `hqcg_hq_location_id`='$location' ";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['hqcg_slno']);
											$site_list=web_encryptIt($result['hqcg_challan_no']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=$result['hqcg_challan_no']?></td>
				        				<td><?=strtoupper($result['hqcg_site_mr_id'])?></td>
				        				
				        				<td><?=$result['hqcg_date']?></td>
				        				<td><?=$result['hqcg_time']?></td>
				        				<td>
				        					<div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="headquarter_receive_site_mr_edit_challan.php?slno=<?=$lid?>&list=<?=$site_list?>">Edit</a></li>
			                                        <li class="divider"></li>
			                                        <li><a href="headquarter_receive_site_mr_send_challan.php?slno=<?=$lid?>&list=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" target="_blank" >Submit</a></li>
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
