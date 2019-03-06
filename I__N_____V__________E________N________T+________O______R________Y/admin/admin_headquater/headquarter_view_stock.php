<?php

session_start();
ob_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
			<ul class="breadcrumb">
				<li><a href="#"></a></li>
				<!-- <li class="active">Dashboards</li> -->
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
		<?php $msg->display(); ?>			
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-default">
			   		<div class="panel-heading">
						<div class="panel-title">View New Stock</div>
				    </div>
				    <div class="panel-body">
				    	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Primary Code </th>
			 						    <th>Secondary Code </th>
			 						    <th>Item Name </th>
			 						    <th>Category Type </th>
			 						    <th>Quntity  </th>
			 						    <th>Action </th>
									 
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php 
				        				$hq_store_id=$_SESSION['hq_store_id'];
				        				// zmr_unqiue_mr_id	// 
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_hq_stock_info` WHERE `hq_location_id`='$hq_store_id' ";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['hq_slno']);
											$site_list=web_encryptIt($result['hq_primary_code']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=strtoupper($result['hq_primary_code'])?></td>
				        				<td><?=strtoupper($result['hq_secondary_code'])?></td>
				        				<td><?=strtoupper($result['hq_component_name'])?></td>
				        				<td><?=strtoupper($result['hq_category_name'])?></td>
				        				<td><?=strtoupper($result['hq_qnty'])?> <?=strtoupper($result['hq_unit'])?></td>
				        				<td>
				        					<div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="hq_internal_issue.php?token_name=<?=$lid?>&token_id=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" target="_blank" >Internal Issue</a></li>
			                                        <li class="divider"></li>
			                                        <li><a href="hq_internal_damage.php?token_name=<?=$lid?>&token_id=<?=$site_list?>">Damage</a></li>
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
    $('#example77 tfoot th').not(":eq(0),:eq(3),:eq(5)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 3 || colIdx == 5) return;
        
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>

