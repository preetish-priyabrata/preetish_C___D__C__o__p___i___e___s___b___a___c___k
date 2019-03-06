<?php
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Field Receive New Challan ";
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
			<div class="page-title"><i class="icon-display4"></i>New Challan Received By Field</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Challan Information</li>
				<li class="active">Challan Received</li>
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
				 <div class="panel-title">Field Challan List</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Challan No</th>
			 						    <th>Material Requsition ID </th>
									    <th>Date</th>
									    <th>Time</th>
									   	<th>Action </th>
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_zonal_challan_generate` WHERE  `zqcg_status`='1' and `zqcg_zonal_location_id`='$field_place' and `zqcg_receive_status`='0'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['zqcg_slno']);
											$site_list=web_encryptIt($result['zqcg_challan_no']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=strtoupper($result['zqcg_challan_no'])?></td>
				        				<td><?=strtoupper($result['zqcg_site_mr_id'])?></td>
				        				<td><?=$result['zqcg_date']?></td>
				        				<td><?=$result['zqcg_time']?></td>
				        				<td>
				        					<a class="btn btn-success btn-xs" href="field_Challan_new_issue_receive.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt('2')?>"  >Receive Challan</a>
				        					<!-- <div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="field_Challan_new_issue_view.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt('3')?>" target="_blank" >View Challan</a></li>
			                                        <li class="divider"></li>
			                                        <li><a href="field_Challan_new_issue_receive.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt('2')?>"  >Receive Challan</a></li>
			                                    </ul>
			                                </div> -->
				        			   	 </td>
				        				<td>
				        				
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
