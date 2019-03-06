<?php
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Field Stock View List ";
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
			<div class="page-title"><i class="icon-display4"></i>View Stock In Field</div>
		  	 	 <ul class="breadcrumb">
					<li><a href="zonal_dashboard.php"></a></li>
					<li class="">Dashboards</li>
					<li class="">Stock Information</li>
					<li class="active">View Stock</li>
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
				 <div class="panel-title">Stock list </div>
				   </div>
				     <div class="panel-body">
					    <div class="table-responsive">
			        	 	<table id="example77" class="display nowrap" width="100%" cellspacing="0">  	<thead>
								    <tr>
									    <th>Sl.No</th>
									    <th>HSN Code</th>
			 						    <th>Item Code</th>
			 						    <th>Component Name</th>
			 						    <th>Category Name</th>
									  	<th>Quantity</th>
									    
									  	<!-- <th>Damage Quantity </th> -->
									   	<th>Action</th>
									</tr>
								</thead>
			
				        		<tbody>
				        			<?php 
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_field_stock_info` WHERE `field_location_id`='$field_place'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				                            $lid=web_encryptIt($result['field_slno']);
										 $site_list=web_encryptIt($result['field_secondary_code']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=strtoupper($result['field_hsn_code'])?></td>
				        				<td><?=strtoupper($result['field_secondary_code'])?></td>
             	        				<td><?=strtoupper($result['field_component_name'])?></td>
				        				<td><?=strtoupper($result['field_category_name'])?></td>
				        				
				        				<td><?=strtoupper($result['field_qnty'])?> <?=strtoupper($result['field_unit'])?></td>				        				
				        				<td>
				        					<div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="field_stock_damage_view.php?token_name=<?=$lid?>&token_id=<?=$site_list?>">Return</a></li>
			                                    </ul>
			                                </div>
				        				</td>
				        		    </tr>
				        			<?php }?>
				        		</tbody>
			    			</table>
			            </div>
			   		</div>
			   		<div class="panel-footer">
			    		<div class="pull-left">
		    		   		<a href="index.php" class="btn btn-warning">Back</a>
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
