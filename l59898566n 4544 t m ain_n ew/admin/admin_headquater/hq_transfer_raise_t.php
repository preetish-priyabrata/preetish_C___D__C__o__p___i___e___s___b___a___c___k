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
						<div class="panel-title"> List Of Transfer Request To Be Sent </div>
				    </div>
				    <div class="panel-body">
				    	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
									    <th>MR Id</th>
			 						    <th> Primary Code </th>
			 						    <th> Quantity </th>
			 						    <th> Place Name </th>
			 						    <th> Request Id </th>			 						   
			 						     <th>Action </th>
									</tr>
								</thead>
				        		<tfoot>
					            	<tr>
					            		<th>Sl.No</th>
					            		<th>MR Id</th>
			 						    <th> Primary Code </th>
			 						    <th> Quantity </th>
			 						    <th> Place Name </th>
			 						    <th> Request Id </th>			 						   
			 						     <th>Action </th>
									</tr>
				        		</tfoot>
				        		<tbody>
				        			<?php 
				        				$hq_store_id=$_SESSION['hq_store_id'];
				        				// `slno_transfer_id`, `primary_id`, `quantity`, `mr_id`, `location_from`, `location_to`, `request_id`
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_hq_transfer_mr_zonal` WHERE `location_to`='$hq_store_id' and `request_status`='1' and  `issue_status`='0' ";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['slno_transfer_id']);
											$site_list=web_encryptIt($result['request_id']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=$result['mr_id']?></td>
				        				<td><?=$result['primary_id']?></td>
				        				<td><?=$result['quantity']?></td>
				        				<td><?php 
										$zonal_code=$result['location_from'];
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo $result2['zonal_name'];
									?></td>
				        				<td><?=$result['request_id']?></td>
				        				<td>
				        					<div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="hq_transfer_raise_t_gen_view.php?token_name=<?=$lid?>&token_id=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" >View Sites</a></li>
			                                        <li class="divider"></li>
			                                         <li><a href="hq_transfer_raise_t_gen_view_issue.php?token_name=<?=$lid?>&token_id=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" >List Of Confirmation From Site</a></li>
			                                         <li><a href="hq_transfer_raise_t_gen_view.php?token_name=<?=$lid?>&token_id=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" >List Of Transfer Completed</a></li>

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

