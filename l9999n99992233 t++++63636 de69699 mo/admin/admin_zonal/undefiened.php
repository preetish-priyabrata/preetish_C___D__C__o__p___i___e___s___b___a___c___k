<?php

session_start();
ob_start();
if($_SESSION['admin_zonal']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";

 $zonal_place=$_SESSION['zonal_place'];
 $slno=$_GET['slno'];
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
						<div class="panel-title">Trasfer Item List </div>
				    </div>
				    <div class="panel-body">
				    	<div class="table-responsive">
				    		<form name="Myform" action="zonal_transfer_raise_t_approved_update.php" method="POST">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
									    <th>MR Id</th>			 						    
			 						    <th>Place Name </th>
			 						    <th>Request Id </th>			 						   
			 						    <th>Action </th>
									</tr>
								</thead>
				        		<tfoot>
					            	<tr>
					            		<th>Sl.No</th>
					            		<th>MR Id</th>			 						    
			 						    <th>Place Name </th>
			 						    <th>Request Id </th>			 						   
			 						    <th>Action </th>
									</tr>
				        		</tfoot>
				        		<tbody>
				        			<?php 
				        				$hq_store_id=$_SESSION['hq_store_id'];
				        				// `slno_transfer_id`, `primary_id`, `quantity`, `mr_id`, `location_from`, `location_to`, `request_id`
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_hq_request_site` JOIN `lt_master_hq_transfer_mr_zonal` ON `lt_master_hq_transfer_mr_zonal`.`request_id`=`lt_master_hq_request_site`.`requested_id` WHERE `lt_master_hq_request_site`.`site_id`='$zonal_place' AND `lt_master_hq_transfer_mr_zonal`.`issue_status`='0' and `lt_master_hq_transfer_mr_zonal`.`request_status`='1' and `lt_master_hq_transfer_mr_zonal`.`issue_status`='0' ";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					// print_r($result);
				        					$lid=web_encryptIt($result['slno_transfer_id']);
											$site_list=web_encryptIt($result['request_id']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=$result['mr_id']?></td>		        				
				        				<td><?php 
										$zonal_codes=$result['location_from'];
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_codes'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo $result2['zonal_name'];
									?></td>
				        				<td><?=$result['request_id']?></td>
				        				

				        				<td>
				        					<!-- <div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="zonal_transfer_raise_t_gen_view.php?token_name=<?=$lid?>&token_id=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" >View Sites</a></li>
			                                        <!-- <li class="divider"></li>
			                                         <li><a href="hq_transfer_raise_t_gen_view_issue.php?token_name=<?=$lid?>&token_id=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" >Get Site Transfer</a></li>
			                                         <li><a href="hq_transfer_raise_t_gen_view.php?token_name=<?=$lid?>&token_id=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" >Complete Transfer</a></li>
 -->
			                                    <!-- </ul> -->

			                                <!-- </div> -->
                                             
											<input type="hidden" name="slno" value="<?=$result['slno']?>">
			                                <input type="radio" name="click" value="Approved"><b>Approved</b>
			                                <input type="radio" name="click" value="Rejected"><b>Rejected</b>
				        					</td>
				        				</tr>
				        				<?php }?>
				        			</tbody>
			    				</table>
			    			
			    		  <div class="pull-right">
			    			<input type="submit" class="btn-success" name="submit" value="Submit">
			    		   </div>
			            </div>
			            </form>
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

