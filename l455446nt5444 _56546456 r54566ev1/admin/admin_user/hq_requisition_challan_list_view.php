<?php
// print_r($_REQUEST);
// exit;
session_start();
ob_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	include  '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$title="View Challan Issued To MR ";
	$slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
	$hqcg_site_mr_id=web_decryptIt(str_replace(" ", "+", $_GET['Token_id']));
	$status=web_decryptIt(str_replace(" ", "+", $_GET['access']));

?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
.form-control[disabled], .form-control[readonly] {
    color: #000809;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Report On Lead Time Analysis</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Reporting</li>
				<li class="">Lead Time Analysis</li>				
				<li class="active">View Challan Issued To MR </li>
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
				 <div class="panel-title">Challan Details</div>
				   </div>
				     <div class="panel-body">
					    <div class="table-responsive">
					    <table id="example77" class="display nowrap" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Sl.No</th>
			 						<th>MR ID</th>
			 						<th>Challan No</th>
			 						<th>Date</th>
			 						<th>Time</th>
									<th>Action</th>
								</tr>
							</thead>
				        	
				        	<tbody>
				        		<?php 
				        			
				        		$x=0;
		        				$GET_INFO="SELECT * FROM `lt_master_hq_challan_generate` WHERE `hqcg_site_mr_id`='$hqcg_site_mr_id' and `hqcg_status`='1'";
		        				$sql_exe=mysqli_query($conn,$GET_INFO);
		        				while ($res=mysqli_fetch_assoc($sql_exe)) {
			        					$lid=web_encryptIt($res['hqcg_site_mr_id']);
										$site_list=web_encryptIt($res['hqcg_challan_no']);
		        					$x++;
		        					?>
		        					<tr>
		        						<td><?=$x?></td>
									    <td><?=strtoupper($res['hqcg_site_mr_id'])?></td>
									    <td><?=strtoupper($res['hqcg_challan_no'])?></td>
			 						    <td><?=$res['hqcg_date']?></td>
			 						    <td><?=$res['hqcg_time']?></td>
			 						    <td><a class="btn-success btn btn-md" href="hq_requisition_challan_view.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt('3')?>" target="_blank" >View Challan Detail </a>
				        					
				        			   	 </td>
		        					</tr>
		        					<?php }?>
		        				</tbody>
				        	</table>	
					    </div>
					    <div class="form-group pull-right">
					 	 <button type="button" onclick="close_window()" class="btn btn-default">Back</button> 
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