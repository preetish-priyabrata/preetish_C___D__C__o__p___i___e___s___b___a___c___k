<?php
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Field Maintenance Job View List ";
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
			<div class="page-title"><i class="icon-display4"></i>Maintenance Job List issue</div>
		  	 	 <ul class="breadcrumb">
					<li><a href="zonal_dashboard.php"></a></li>
					<li class="">Dashboards</li>
					<li class="">Maintenance Information</li>
					<li class="active">View Job Card Issue</li>
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
				 <div class="panel-title">Maintenance job material request list</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Secondary Code</th>
			 						    <th>Component Name</th>
			 						    <th>Category Name</th>
									    <th>Unit</th>
									    <th>Quantity</th>
									   	<th>Damage </th>
									</tr>
								</thead>
				        		<tfoot>
					            	<tr>
					            		<th>Sl.No</th>
			 						    <th>Secondary Code</th>
			 						    <th>Component Name</th>
			 						    <th>Category Name</th>
									    <th>Unit</th>
									    <th>Quantity</th>
									   	<th>Damage </th>
									</tr>
				        		</tfoot>
				        		<tbody>
				        			<?php 
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_field_stock_info` WHERE `field_location_id`='$field_place'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				                             //$lid=web_encryptIt($result['fmg_slno']);
											// $site_list=web_encryptIt($result['fmg_job_id']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=$result['field_secondary_code']?></td>
				        				<td><?=$result['field_component_name']?></td>
				        				<td><?=$result['field_category_name']?></td>
				        				<td><?=$result['field_unit']?></td>
				        				<td><?=$result['field_qnty']?></td>
				        				<td><?=$result['damage_loss']?></td>
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
<!-- <script language="javascript">';
alert("Are You Sure, You Want To Complete")';
</script>'; -->
