<?php
session_start();
ob_start();
if($_SESSION['admin_approver']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Approver List Of Requisition Received";
$user_id=$_SESSION['user_id'];
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>List Of S.M.R Approved </div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Requisition Management</li>
				<li class="">View Approved S.M.R List</li>
				<li class="active">Approved S.M.R List</li>
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
				 <div class="panel-title">Approved S.M.R List</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th> Material Requisition ID</th>
									    <th>Date</th>
									    <th>Time</th>
									   	<th>Action </th>
									</tr>
								</thead>
				        		<tbody>
				        			<?php 
				        			  // zmr_unqiue_mr_id	// 
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_zonal_material_requsition` WHERE `zmr_forward_id`= '$user_id' and `status`='1' and `forward_status`='1' ORDER BY DATE(`approver_date`) DESC";
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
			        					<div class="btn-group">
		                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		                                    	Action
		                                    	<i class="icon-three-bars position-right"></i>
		                                    </button>
		                                    <ul class="dropdown-menu">
		                                        <li><a href="approver_mr_raised_detail.php?slno=<?=$lid?>&list=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" target="_blank" >View Detail</a></li>
		                                       
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
	$(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>
