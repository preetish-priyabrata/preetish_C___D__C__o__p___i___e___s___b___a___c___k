<?php
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Zonal User Raise Material Requsition form ";
$zonal_place=$_SESSION['zonal_place'];
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>New Challan List Received By Site</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Challan Management</li>
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
				 <div class="panel-title">List Of Challan Received</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        	  <table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Challan No</th>
			 						    <th> Material Requsition ID </th>
									    <th>Date</th>
									    <th>Time</th>
									   	<th>Action </th>
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php 
				        				$zonal_place=$_SESSION['zonal_place'];
				        				// zmr_unqiue_mr_id `hqcg_challan_no` and	// 
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_hq_challan_generate` WHERE  `hqcg_status`='1' and `hqcg_zonal_location_id`='$zonal_place' and `hqcg_receive_status`='0'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['hqcg_slno']);
											$site_list=web_encryptIt($result['hqcg_challan_no']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<td><?=$result['hqcg_challan_no']?></td>
				        				<td><?=$result['hqcg_site_mr_id']?></td>
				        				<td><?=$result['hqcg_date']?></td>
				        				<td><?=$result['hqcg_time']?></td>
				        				<td>
				        				<div class="btn-group">
			                              <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                              <i class="icon-three-bars position-right"></i>
			                              </button>
			                            <ul class="dropdown-menu">
			                              <li><a href="zonal_Challan_new_issue_view.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt('3')?>" target="_blank" >View Challan</a></li>
			                            <li class="divider"></li>
			                              <li><a href="zonal_Challan_new_issue_receive.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt('2')?>" >Receive Challan</a></li>
			                            </ul>
			                           </div>
				        			  </td>
				        		     <td>
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
