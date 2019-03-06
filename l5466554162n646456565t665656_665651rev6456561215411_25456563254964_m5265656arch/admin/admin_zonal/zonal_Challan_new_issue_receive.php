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
 
$check="SELECT * FROM `lt_master_hq_challan_generate` where `hqcg_challan_no`='$challan' and `hqcg_status`='1' and  `hqcg_zonal_location_id`='$zonal_place' ";
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
		<form name="myFunction" class="form-horizontal" action="zonal_Challan_new_issue_receive_save.php" method="POST">
					   	<?php  }?>	
						  <div class="col-lg-6">
						   	<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Head Quater Location Name :</label>
								    <div class="col-lg-8">
									<?php 
										 $hqcg_hq_location_id=$fetch_check['hqcg_hq_location_id'];
	        							 $query_sql2="SELECT * FROM `lt_master_hq_place` WHERE `hq_code`='$hqcg_hq_location_id'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							//echo mysqli_error($conn);
	        							echo "<p>". strtoupper($result2['hq_name'])."</p>";
									?>
								 <input type="hidden" name="hqcg_hq_location_id" value="<?=$hqcg_hq_location_id ?>"> 
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Challan : </label>
							    <div class="col-lg-8">
							    	<input type="hidden" name="hqcg_date" value="<?=$fetch_check['hqcg_date']?>">
									<p><?=$fetch_check['hqcg_date']?></p>
							   </div>
							</div>
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="hqcg_site_mr_id" id="hqcg_site_mr_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_site_mr_id']?>" required="">
									<input type="hidden" class="form-control" name="hqcg_slno" id="hqcg_slno" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_slno']?>" required="">
									<p><?=$fetch_check['hqcg_site_mr_id']?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Challan No : </label>
							    <div class="col-lg-8">
							     	<input type="hidden" class="form-control" name="hqcg_challan_no" id="hqcg_challan_no" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_challan_no']?>" required="">
							    <p><?=$fetch_check['hqcg_challan_no']?></p>
							   
							  </div>
							</div>
						   <div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of M.R : </label>
							    <div class="col-lg-8">
								   <input type="hidden" class="form-control" name="hqcg_time" id="hqcg_time" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_time']?>" required="">
									<p><?=$fetch_check['hqcg_time']?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">DC No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="dc_no" class="form-control" placeholder="Enter DC No" value="<?=$fetch_check['dc_no']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="date_enter" class="form-control" data-toggle="datepicker" placeholder="Enter Date" value="<?=$fetch_check['date_enter']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Indent No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="Indent_no" class="form-control" placeholder="Enter Indent No " value="<?=$fetch_check['Indent_no']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Vehicle No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="Vehicle_no" class="form-control" placeholder="Enter Vehicle No" value="<?=$fetch_check['Vehicle_no']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">LR No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="LR_no" class="form-control" placeholder="Enter LR No" value="<?=$fetch_check['LR_no']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">LR Date : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="LR_date" class="form-control" data-toggle="datepicker" value="<?=$fetch_check['LR_date']?>" placeholder="Enter LR Date" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right"> Project No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="Project_No" class="form-control" placeholder="Enter Project No" value="<?=$fetch_check['Project_No']?>" required="">
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
				                           <table class="display nowrap table" width="100%" cellspacing="0">
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
										                <th>Recieive Quantity</th>
										                <th>Damage Quantity</th>
										                <th>Transit Loss Quantity</th>
										                <th>Remark</th>
										            </tr>
										         </thead>
					        					
					        						<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `hqzis_challan_id`='$challan'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        						   <tr>
						                 				<td><?=$x?></td>
						                 				<!-- serial no -->
						                 				<td><?=strtoupper($fetch_item['hqzis_hsn_id'])?> </td>
						                 				<input type="hidden" name="zmrd_slno[]" value="<?=$hqzis_hsn_id=$fetch_item['hqzis_hsn_id']?>" required="">
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=$fetch_item['hqzis_secondary_id']?>
									                	<input type="hidden" name="zmrd_slno[]" value="<?=$zmrd_slno=$fetch_item['zmrd_slno']?>" required=""><input type="hidden" name="hqzis_slno[]" value="<?=$fetch_item['hqzis_slno']?>" required="">
									                	<input type="hidden" name="hqzis_primary_id[]" id="Primary<?=$x?>" value="<?=$hqzis_primary_id=$fetch_item['hqzis_primary_id']?>" required="">
									                	<input type="hidden" name="hqzis_secondary_id[]" id="Primary<?=$x?>" value="<?=$hqzis_secondary_id=$fetch_item['hqzis_secondary_id']?>" required="">

					                					</td>
					                					<!-- item code -->
					                					<td><?=$hqzis_item_name=strtoupper($fetch_item['hqzis_item_name'])?><input type="hidden" name="hqzis_item_name[]" value="<?=$fetch_item['hqzis_item_name']?>" required="">
										                </td>
										                <!--item name-->
										                <td><?=$hqzis_request_qnt=$fetch_item['hqzis_request_qnt']?><input type="hidden" name="hqzis_request_qnt[]" value="<?=$fetch_item['hqzis_request_qnt']?>" required="">
											                </td>
										                <!-- request Quantity -->
										                
										                <td><?=$hqzis_issue_qnt=$fetch_item['hqzis_issue_qnt']?><input type="hidden" name="hqzis_issue_qnt[]" value="<?=$fetch_item['hqzis_issue_qnt']?>" required="">
										                </td>
										                 <!-- Issued Quantity -->
											   
										                <td><?=$price_rate=$fetch_item['price_rate']?><input type="hidden" name="price_rate[]" value="<?=$fetch_item['price_rate']?>" required="">
										                </td>
										                <!--Rate-->
										                <td><?=$price_total=$fetch_item['price_total']?><input type="hidden" name="price_total[]" value="<?=$fetch_item['price_total']?>" required="">
										                </td>
										                <!--Total price-->
										                <td><input type="number" name="receive[]" value="<?=$fetch_item['hqzis_issue_qnt']?>" min="0" max="<?=$fetch_item['hqzis_issue_qnt']?>" required="">
										                </td>
										                <td><input type="number" min="0" name="damage[]" value="0" required="">
										                </td>
										                <td><input type="number" min="0" name="transit[]" value="0" required="">
										                </td>
										                <td><input type="text" min="0" name="text_remark[]" required="">
										                </td>

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
