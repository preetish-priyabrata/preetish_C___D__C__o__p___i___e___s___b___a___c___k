<?php
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="View Challan History Details";
$field_place=$_SESSION['field_place'];
 $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $challan=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['access']));
 
// unset($_GET);
 $check="SELECT * FROM `lt_master_zonal_challan_generate` where `zqcg_challan_no`='$challan' and `zqcg_status`='1' and  `zqcg_zonal_location_id`='$field_place' ";
$sql_exe=mysqli_query($conn,$check);
$num=mysqli_num_rows($sql_exe);
if($num!='0'){
}
$fetch_check=mysqli_fetch_assoc($sql_exe);
//$zonal_code=$fetch_check['zmr_site_from_location_id'];
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
			<div class="page-title"><i class="icon-display4"></i>List Of Challan Recieved From Site</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Challan Information </li>
				
				<li class="active">Challan History Details</li>
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
				 <div class="panel-title">Challan History</div>
				   </div>
				     <div class="panel-body">
				     	<?php 
				     	if($status==3){?>
				     	<form name="myFunction" class="form-horizontal" action="#">
				     	<?php }else{?>
					   <form name="myFunction" class="form-horizontal" action="#" method="POST">
					   	<?php  }?>	
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Head Quater Location Name :</label>
								    <div class="col-lg-8">
									<?php 
										$zqcg_hq_location_id=$fetch_check['zqcg_hq_location_id'];
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zqcg_hq_location_id'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".strtoupper($result2['zonal_name'])."</p>";
									?>
								
							    
							
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Challan : </label>
							    <div class="col-lg-8">
							    	
									<p><?=$fetch_check['zqcg_date']?></p>
							   </div>
							</div>
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									
									<p><?=strtoupper($fetch_check['zqcg_site_mr_id'])?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Challan No : </label>
							    <div class="col-lg-8">
							  	
							    <p><?=strtoupper($fetch_check['zqcg_challan_no'])?></p>
							   
							  </div>
							</div>
						   <div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Challan: </label>
							    <div class="col-lg-8">
										
									<p><?=$fetch_check['zqcg_time']?></p>
							   </div>
							</div>
							
					   </div>
						 <br>
						  <div class="col-md-12 col-sm-12">
						 	<div class="panel panel-default">
							   <div class="panel-heading">
								 <div class="panel-title text-center">Component List</div>
								   </div>
								     <div class="panel-body">
									    <div class="table-responsive">
				                           <table  class="display nowrap table" width="100%" cellspacing="0">
										         <thead>
										            <tr>
										                <th>Sl.No</th>
										                <th>HSN Code</th>
										                <th>Item Code</th>
										                <th>Item Name</th>
										                <th>Maintenance Type</th>
										                <th>Request Quantity</th>
										                <th>Issued Quantity</th>
										                <th>Rate/Unit</th>
										                <th>Issued Total Price</th>
										                <th>Received Quantity</th>
										                <th>Received Total Price</th>
										                <th>Damaged Quantity</th>
										                <th>Damaged Total Price</th>
										            </tr>
										         </thead>
					        					
					        						<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_zonal_issue_field_info` WHERE `zqzis_challan_id`='$challan'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$fmrd_slno=$fetch_item['fmrd_slno'];
					        								$x++;
					        								?>
					        						   <tr>
						                 				<td><?=$x?></td>
						                 				<td><?=strtoupper($fetch_item['zqzis_hsn_id'])?></td>
										                <td><?=strtoupper($fetch_item['zqzis_secondary_id'])?>
										                	
										                	<?php 
										                		$get_info="SELECT * FROM `lt_master_field_material_requsition_details` WHERE `fmrd_slno`='$fmrd_slno'";
										                		$sql_get_info=mysqli_query($conn,$get_info);
										                		$fetch_details=mysqli_fetch_assoc($sql_get_info);
										                	?>
					                					</td>
					                					<!-- item code -->
					                					<td><?=$fmrd_name_item=strtoupper($fetch_details['fmrd_name_item'])?>
										                </td>
										                <!-- Item Name -->
										                <td><?=$maintenance_id=strtoupper($fetch_details['maintenance_id'])?>
										                </td>
										                <!-- Machine No -->
										                <td><?=$fmrd_request_qnt=strtoupper($fetch_details['fmrd_request_qnt'])?> <?=strtoupper($fetch_item['zqzis_unit'])?>
										                </td>
										                <!-- Request Quantity -->
										                <td><?=$zqzis_issue_qnt=strtoupper($fetch_item['zqzis_issue_qnt'])?> <?=strtoupper($fetch_item['zqzis_unit'])?>
										                </td>
										                <td>INR <?=strtoupper($fetch_item['rate_unit'])?>
										                </td>
										                <td>INR <?=($fetch_item['rate_unit']*$zqzis_issue_qnt)?>
										                </td>
										                <!-- Issued Quantity -->
										                 <td><?=$zqzis_received_qnty=strtoupper($fetch_item['zqzis_received_qnty'])?>  <?=strtoupper($fetch_item['zqzis_unit'])?>
										                </td>
										                <td>INR <?=($fetch_item['rate_unit']*$zqzis_received_qnty)?>
										                </td>
										                <!--Received Quantity-->
										                  <td><?=$damage_loss=strtoupper($fetch_item['damage_loss'])?>  <?=strtoupper($fetch_item['zqzis_unit'])?>
										                </td>
										                <td>INR <?=($fetch_item['rate_unit']*$damage_loss)?>
										                </td>
										                <!--Damaged Quantity-->
										                 
										                <!--Acceptable Quantity -->
										                
						            					</tr>
					        						<?php
					        						}
					        					   ?>
					        				   </tbody>
				    						 </table>
				                           </div>
				                        </div>
				                     </div>
                         		  </div>
                         	   <br>
                         	   <input type="hidden" name="total" id="total" value="<?=$x?>">
                         	   <?php 
				     	if($status==3){
				     		?>
				     	<div class="form-group pull-left">
					   		<a href="field_challan_new_issue.php" class="btn btn-success">Back</a>
			     
				   		</div>
				     <?php	}else{
				     	?>
					   		<div class="form-group pull-left">
					   	<a href="#.php" class="btn btn-success">Back</a>
			     
				   </div>
				<?php   }?>
				   <?php 
				     	if($status==3){

				     	}else{?>
				     		 <div class="form-group pull-right">
								    <input type="submit" name="submit" class="btn btn-success" value="Submit">
						     
							   </div>
				     	<?php }?>
				     
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
