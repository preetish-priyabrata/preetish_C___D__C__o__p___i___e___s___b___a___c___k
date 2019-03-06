<?php
// print_r($_REQUEST);
// exit;
session_start();
ob_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include  '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$title="Head Quarter view Site Requsition Received Detail ";
	$slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));// reqution id
	$Token_id=web_decryptIt(str_replace(" ", "+", $_GET['Token_id']));//challan no
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
				<li class="active">View Challan Received Detail </li>
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
				 <div class="panel-title">Received Challan Details</div>
				   </div>
				     <div class="panel-body">
					    <div class="table-responsive">
					    <table id="example77" class="display nowrap" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Sl.No</th>
			 						<th>Item Code</th>
			 						<th>Requested Quantity</th>
			 						<th>Issued Quantity</th>
			 						<th>Short-Fall Issued Quantity</th>
			 						<th>Receive Quantity</th>
			 						<th>Short-Fall Received Quantity</th>
			 						<th>Date</th>
			 						<th>Time</th>
									<!-- <th>Action</th> -->
								</tr>
							</thead>
				        	<tfoot>
					            <tr>
					            	<th>Sl.No</th>
			 						<th>Item Code</th>
			 						<th>Requested Quantity</th>
			 						<th>Issued Quantity</th>
			 						<th>Short-Fall Issued Quantity</th>
			 						<th>Receive Quantity</th>
			 						<th>Short-Fall Received Quantity</th>
			 						<th>Date</th>
			 						<th>Time</th>
									    
								</tr>
				        	</tfoot>
				        	<tbody>
				        		<?php 
				        			
				        		$x=0;
		        				$GET_INFO="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `hqzis_challan_id`='$Token_id' and `hqzis_zonal_mr_id`='$slno' and `hqzis_issued_status`='1'";
		        				$sql_exe=mysqli_query($conn,$GET_INFO);
		        				while ($res=mysqli_fetch_assoc($sql_exe)) {
		        					
			        					
		        					$x++;
		        					?>
		        					<tr>
		        						<td><?=$x?></td>
									    <td><?=$res['hqzis_primary_id']?></td>
									    <td><?=$res['hqzis_request_qnt']?></td>
									    <td><?=$res['hqzis_issue_qnt']?></td>
									    <td><?php echo $res['hqzis_request_qnt']-$res['hqzis_issue_qnt'];?></td>
									    <td><?=$res['hqzis_received_qnty']?></td>
									    <td><?php echo $res['hqzis_issue_qnt']-$res['hqzis_received_qnty'];?></td>
			 						    <td><?=$res['hqzis_date_receive']?></td>
			 						    <td><?=$res['hqzis_time_receive']?></td>
			 						   
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