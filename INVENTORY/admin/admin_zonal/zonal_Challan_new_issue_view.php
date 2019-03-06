<?php
// echo "string";
// print_r($_REQUEST);
// exit;
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Head Quarter view Site Requsition Received Detail ";
$zonal_place=$_SESSION['zonal_place'];
// Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [Token_id] => 6OMpYvBRGR0JySEbRUT2kiUU1fbH4lZWU6nYoG8vobY= [access] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 
 $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $challan=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['access']));
 
// unset($_GET);
 
$check="SELECT * FROM `lt_master_zonal_challan_generate` where `zqcg_challan_no`='$challan' and `zqcg_status`='1' and  `zqcg_hq_location_id`='$zonal_place' ";
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
			<div class="page-title"><i class="icon-display4"></i> Challan Details</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Challan Information </li>
				<li class="">Challan Receive (NEW)</li>				
				<li class="active">View Challan Details</li>
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
				 <div class="panel-title">Challan Detail</div>
				   </div>
				     <div class="panel-body">
				     	<?php 
				     	if($status==3){?>
				     	<form name="myFunction" class="form-horizontal" action="#">
				     	<?php }else{?>
					   <form name="myFunction" class="form-horizontal" action="approver_mr_raised_detail_issued_quantity_save.php" method="POST">
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
	        							//echo mysqli_error($conn);
	        							echo "<p>". strtoupper($result2['zonal_name'])."</p>";
									?>
								 <input type="hidden" name="zqcg_hq_location_id" value="<?=$zonal_code ?>"> 
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Challan : </label>
							    <div class="col-lg-8">
							    	<input type="hidden" name="zqcg_date" value="#<?=$fetch_check['zqcg_date']?>">
									<p><?=$fetch_check['zqcg_date']?></p>
							   </div>
							</div>
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="zqcg_site_mr_id" id="zqcg_site_mr_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_site_mr_id']?>" required="">
									<input type="hidden" class="form-control" name="zqcg_slno" id="zqcg_slno" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_slno']?>" required="">
									<p><?=strtoupper($fetch_check['zqcg_site_mr_id'])?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Challan No : </label>
							    <div class="col-lg-8">
							     	<input type="hidden" class="form-control" name="zqcg_challan_no" id="zqcg_challan_no" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_challan_no']?>" required="">
							    <p><?=strtoupper($fetch_check['zqcg_challan_no'])?></p>
							   
							  </div>
							</div>
						   <div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of M.R : </label>
							    <div class="col-lg-8">
								   <input type="hidden" class="form-control" name="zqcg_time" id="zqcg_time" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_time']?>" required="">
									<p><?=$fetch_check['zqcg_time']?></p>
							   </div>
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
				                           <table id="example77" class="display nowrap" width="100%" cellspacing="0">
										         <thead>
										            <tr>
										                <th>Sl.No</th>
										                <th>HSN Code</th>
										                <th>Item Code</th>
										                <th>Item Name</th>
										                <th>Request Quantity</th>
										                <th>Issued Quantity</th>
										                <th>Rate</th>
										                <th>Total Price</th>

										            </tr>
										         </thead>
					        					
					        						<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_zonal_issue_field_info` WHERE `zqzis_challan_id`='$challan'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        						   <tr>
						                 				<td><?=$x?></td>
						                 				<!-- serial no -->
						                 				<td><?=strtoupper($fetch_item['zqzis_hsn_id'])?> </td>
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=$fetch_item['zqzis_secondary_id']?>
									                	<input type="hidden" name="fmrd_slno[]" value="<?=$fmrd_slno=$fetch_item['fmrd_slno']?>" required=""><input type="hidden" name="zqzis_slno[]" value="<?=$fetch_item['zqzis_slno']?>" required="">
									                	<input type="hidden" name="zqzis_primary_id[]" id="Primary<?=$x?>" value="<?=$zqzis_primary_id=$fetch_item['zqzis_primary_id']?>" required="">
									                	<input type="hidden" name="zqzis_secondary_id[]" id="Primary<?=$x?>" value="<?=$zqzis_secondary_id=$fetch_item['zqzis_secondary_id']?>" required="">

								                	<!-- <?php 
								                		$get_info="SELECT * FROM `lt_master_zonal_material_requsition_details` WHERE `fmrd_slno`='$fmrd_slno'";
								                		$sql_get_info=mysqli_query($conn,$get_info);
								                		$fetch_details=mysqli_fetch_assoc($sql_get_info);
								                	    ?> -->

					                					</td>
					                					<!-- item code -->
					                					<td><?=$zqzis_item_name=strtoupper($fetch_item['zqzis_item_name'])?><input type="hidden" name="zqzis_item_name[]" value="<?=$fetch_item['zqzis_item_name']?>" required="">
										                </td>
										                <!--item name-->
										                <td><?=$zqzis_request_qnt=strtoupper($fetch_item['zqzis_request_qnt'])?><input type="hidden" name="zqzis_request_qnt[]" value="<?=$fetch_item['zqzis_request_qnt']?>" required="">
											                </td>
										                <!-- request Quantity -->
										                
										                <td><?=$zqzis_issue_qnt=strtoupper($fetch_item['zqzis_issue_qnt'])?><input type="hidden" name="zqzis_issue_qnt[]" value="<?=$fetch_item['zqzis_issue_qnt']?>" required="">
										                </td>
										                 <!-- Issued Quantity -->
											   
										                <td><?=$rate_unit=strtoupper($fetch_item['rate_unit'])?><input type="hidden" name="rate_unit[]" value="<?=$fetch_item['rate_unit']?>" required="">
										                </td>
										                <!--Rate-->
										                <td><?=$total_price=strtoupper($fetch_item['total_price'])?><input type="hidden" name="total_price[]" value="<?=$fetch_item['total_price']?>" required="">
										                </td>
										                <!--Total price-->
										                
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
					   		<a href="zonal_Challan_new_issue.php" class="btn btn-success">Back</a>
			     
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
