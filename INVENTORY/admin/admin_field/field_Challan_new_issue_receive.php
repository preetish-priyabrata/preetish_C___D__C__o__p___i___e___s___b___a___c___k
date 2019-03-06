<?php

session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Zonal Received Detail challan ";
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
			<div class="page-title"><i class="icon-display4"></i> Received Challan Detail</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Challan Information </li>
				<li class="">Challan Receive </li>				
				<li class="active">Receive Of Challan Issued From Zonal/Site</li>
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
				   <?php 
				     	if($status==3){?>
				     	<form name="myFunction" class="form-horizontal" action="#">
				     	<?php }else if($status==2){?>
					   <form name="myFunction" class="form-horizontal" action="field_Challan_new_issue_receive_save.php" method="POST">
					   	<?php  }else{
						?>
						<form name="myFunction" class="form-horizontal" action="#">

					   		<?php }?>	
				     <div class="panel-body">
				     	
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
								<input type="hidden" name="zqcg_hq_location_id" value="<?=$zqcg_hq_location_id?>">
							    
							
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Challan : </label>
							    <div class="col-lg-8">
							    	<input type="hidden" name="zqcg_date" value="<?=$fetch_check['zqcg_date']?>">
									<p><?=$fetch_check['zqcg_date']?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Challan Receive : </label>
							    <div class="col-lg-8">
							    	<input type="hidden" name="date_receive" value="<?=date('Y-m-d')?>">
									<p><?=date('d-m-Y')?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="zqcg_site_mr_id" id="zqcg_site_mr_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$zqcg_site_mr_id=$fetch_check['zqcg_site_mr_id']?>" required="">
									<input type="hidden" class="form-control" name="zqcg_slno" id="zqcg_slno" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_slno']?>" required="">
									<p><?=strtoupper($fetch_check['zqcg_site_mr_id'])?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Challan No : </label>
							    <div class="col-lg-8">
							  	<input type="hidden" class="form-control" name="zqcg_challan_no" id="zqcg_challan_no" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_challan_no']?>" required="">
							    <p><?=strtoupper($fetch_check['zqcg_challan_no'])?></p>
							   
							  </div>
							</div>
						   <div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Challan: </label>
							    <div class="col-lg-8">
										<input type="hidden" class="form-control" name="zqcg_time" id="zqcg_time" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_time']?>" required="">
									<p><?=$fetch_check['zqcg_time']?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Challan Receive: </label>
							    <div class="col-lg-8">
										<input type="hidden" class="form-control" name="time_receive" id="time_receive" placeholder="Enter Email Id" autocomplete="off" value="<?=date('H:i:s')?>" required="">
									<p><?=strtoupper(date('H:i:s a'))?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Machine No/Model No: </label>
							    <div class="col-lg-8">
							    	<?php 
							    	$get_machine="SELECT * FROM `lt_master_field_material_requsition` WHERE `fmr_unqiue_mr_id`='$zqcg_site_mr_id'";
							    	$sql_get_machine=mysqli_query($conn,$get_machine);
							    	$fetch_get_machine=mysqli_fetch_assoc($sql_get_machine);
							    	?>
										<input type="hidden" class="form-control" name="machine_no" id="machine_no" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_get_machine['machine_no']?>" required="">
									<p><?=strtoupper($fetch_get_machine['machine_no']). " / ".strtoupper($fetch_get_machine['model_id'])?></p>
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
										                <th>Item Code</th>
										                <th>Item Name</th>
										                <th>Maintenance Type</th>
										                <th>Request Quantity</th>
										                <th>Issued Quantity</th>
										                <!-- <th>Rate</th>
										                <th>Total Price</th>
										                
										                <th>Damage Quantity</th>
										                <th>Transit Loss Quantity</th> -->
										                <!-- <th>Recieive Quantity</th> -->
										                <!-- <th>Update Price</th> -->
										                <!-- <th>Remark</th> -->
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
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=$fetch_item['zqzis_secondary_id']?>
										                	<input type="hidden" name="fmrd_slno[]" value="<?=$fmrd_slno=$fetch_item['fmrd_slno']?>" required=""><input type="hidden" name="zqzis_slno[]" value="<?=$fetch_item['zqzis_slno']?>" required="">
										                	<input type="hidden" name="zqzis_primary_id[]" id="Primary<?=$x?>" value="<?=$zqzis_primary_id=$fetch_item['zqzis_primary_id']?>" required="">
										                	<input type="hidden" name="zqzis_secondary_id[]" id="Primary<?=$x?>" value="<?=$zqzis_secondary_id=$fetch_item['zqzis_secondary_id']?>" required="">
										                	<?php 
										                		$get_info="SELECT * FROM `lt_master_field_material_requsition_details` WHERE `fmrd_slno`='$fmrd_slno'";
										                		$sql_get_info=mysqli_query($conn,$get_info);
										                		$fetch_details=mysqli_fetch_assoc($sql_get_info);
										                	?>
					                					</td>
					                					<!-- item code -->
					                					<td><?=$fmrd_name_item=strtoupper($fetch_details['fmrd_name_item'])?><input type="hidden" name="fmrd_name_item[]" value="<?=$fetch_details['fmrd_name_item']?>" required="">
										                </td>
										                <!-- Item Name -->
										                <td>
										                	
										                <?=$maintenance_id=strtoupper($fetch_details['maintenance_id'])?><input type="hidden" name="maintenance_id[]" value="<?=$fetch_details['maintenance_id']?>" required="">
										                
										                </td>
										                <!-- Machine No -->
										                <td><?=$fmrd_request_qnt=$fetch_details['fmrd_request_qnt']?> <?=strtoupper($fetch_item['zqzis_unit'])?><input type="hidden" name="fmrd_request_qnt[]" value="<?=$fetch_details['fmrd_request_qnt']?>" required="">
										                </td>
										                <!-- Request Quantity -->
										                <td><?=$zqzis_issue_qnt=$fetch_item['zqzis_issue_qnt']?> <?=strtoupper($fetch_item['zqzis_unit'])?><input type="hidden" name="zqzis_issue_qnt[]" id="hqzis_issue_qnt<?=$x?>" value="<?=$fetch_item['zqzis_issue_qnt']?>" required="">
										                </td>
										                <!-- Issued Quantity -->
										               
										                <input type="hidden" name="price_rate[]" id="price_rate<?=$x?>" value="<?=$fetch_item['rate_unit']?>" required="">
										                <!--Rate-->
										                <!-- <td>INR <?=$price_total=$fetch_item['total_price']?>
										                </td> -->
										                <input type="hidden" name="price_total[]" value="<?=$fetch_item['total_price']?>" required="">

										               	<input type="hidden" onkeyup="check_quntity(<?=$x?>)" name="Damage[]" min="0" max="<?=$fetch_item['zqzis_issue_qnt']?>"  id="damage<?=$x?>" value="0" required="">

										               	<input type="hidden" onkeyup="check_quntity(<?=$x?>)" name="transit[]" min="0" max="<?=$fetch_item['zqzis_issue_qnt']?>" value="0" id="transit<?=$x?>" required="">

										               	<input type="hidden" name="received[]" min="0" max="<?=$fetch_item['zqzis_issue_qnt']?>" id="receive<?=$x?>" value="<?=$fetch_item['zqzis_issue_qnt']?>" required="" readonly>

										               	<input type="hidden" name="cal_price[]" min="0" max="<?=$fetch_item['total_price']?>" id="cal_price<?=$x?>" value="<?=$fetch_item['total_price']?>" required="" readonly>
										               	
										               	<input type="text" name="remark[]"  value="0" required="">
										                <!-- received Quantity -->
										                
										                <!-- Damage Quantity -->
										               
										                <!-- remark -->
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


                      
			 </div>
			 <div class="panel-footer">
			 <?php 
				     	if($status==2){
				     		?>
				     	<div class="form-group pull-left">
					   		<a href="zonal_Challan_new_issue.php" class="btn btn-success">Back</a>
			     
				   		</div>
				     <?php	}
				?>
				   <?php 
				     	if($status==3){

				     	}else{?>
				     		 <div class="form-group pull-right">
								    <input type="submit" name="submit" onclick="return confirm('Are you sure want to submit this?');"  class="btn btn-success" value="Submit">
						     
							   </div>
				     	<?php }?>
				</div>
				     
				</form>

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
   $('option:not([value])').remove();
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(2),:eq(3),:eq(5),:eq(6),:eq(7),:eq(8),:eq(9),:eq(10),:eq(11)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable({
    	scrollX:        true,
    	columnDefs: [
            { width: '20%', targets: 0 }
        ],
    });
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 4|| colIdx == 2 || colIdx == 3 || colIdx == 5 || colIdx == 6 || colIdx == 7|| colIdx == 8 || colIdx == 9 || colIdx == 10 || colIdx == 11 ) return;
        
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
function check_quntity(id){
	var hqzis_issue_qnt=$('#hqzis_issue_qnt'+id).val();
	var damage=$('#damage'+id).val();
	var transit=$('#transit'+id).val();
	var receive=$('#receive'+id).val();
	var price_rate=$('#price_rate'+id).val();
	var cal_price=$('#cal_price'+id).val();

	var my_result = hqzis_issue_qnt - damage - transit;
	if(my_result<0){
		$('#damage'+id).val('0');
		$('#transit'+id).val('0');
		$('#receive'+id).val(hqzis_issue_qnt);
		var result = hqzis_issue_qnt * price_rate;
		 $('#cal_price'+id).val(result);
		
	}else{
		 var result = my_result * price_rate;
		 $('#cal_price'+id).val(result);
        
		$('#receive'+id).val(my_result);

	}
}
</script>
