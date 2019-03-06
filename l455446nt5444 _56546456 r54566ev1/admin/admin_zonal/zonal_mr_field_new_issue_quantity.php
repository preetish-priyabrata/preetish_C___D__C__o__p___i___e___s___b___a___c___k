<?php

session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
$title="Zonal Issue Of Material To Field Store ";
$zonal_place=$_SESSION['zonal_place'];
 // $slno=web_decryptIt(str_replace(" ", "+", $_GET['slno']));
 // //$list=web_decryptIt(str_replace(" ", "+", $_GET['list']));
 // $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
 $challan=$_GET['challan'];
// unset($_GET);
$check="SELECT * FROM `lt_master_zonal_challan_generate` where `zqcg_challan_no`='$challan' and `zqcg_status`='0' and `zqcg_hq_location_id`='$zonal_place'";
$sql_exe=mysqli_query($conn,$check);
$num=mysqli_num_rows($sql_exe);
if($num!='0'){
}
$fetch_check=mysqli_fetch_assoc($sql_exe);
// print_r($fetch_check);
$field_code=$fetch_check['zqcg_zonal_location_id'];
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
			<div class="page-title"><i class="icon-display4"></i> Received Material Requsition Detail</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Requsition Information </li>
				<li class="">Issue Site M.R List</li>
				<li class="active">Issue Material Requsition Detail</li>
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
				 <div class="panel-title">Requsition Detail</div>
				   </div>
				     <div class="panel-body">
					   <form name="myFunction" class="form-horizontal" action="zonal_mr_field_new_issue_quantity_Save.php" method="POST">
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">

								      <?php 
										$field_code=$fetch_check['zqcg_zonal_location_id'];
	        							$query_sql2="SELECT * FROM `lt_master_field_place` WHERE `field_code`='$field_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".strtoupper($result2['address_1'])."</p>";
	        							echo "<p>".strtoupper($result2['address_2'])."</p>";
	        							echo "<p>C/O-".strtoupper($result2['address_3']).", " . strtoupper($result2['address_4'])."</p>";	        							
	        							echo "<p>".strtoupper($result2['address_5']).", ".strtoupper($result2['address_6']).", ".strtoupper($result2['address_7']);
	        							echo "<p>".strtoupper($result2['address_8'])."</p>";
									?>
								 
								<input type="hidden" name="hqcg_zonal_location_id" value="<?=$field_code?>">
							    
							
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
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="zqcg_site_mr_id" id="zqcg_site_mr_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_site_mr_id']?>" required="">
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
										<input type="hidden" class="form-control" name="zqcg_time" id="zqcg_time" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_time']?>" required="">
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
										                <th>Item Code</th>
										                <th>Approved Quantity</th>
										                <th>Available In Zonal Quantity</th>
										                <th>Issued Quantity</th>
										                
										            </tr>
										         </thead>
					        					
					        						<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_zonal_issue_field_info_temp` WHERE `zqzis_challan_id`='$challan'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        						   <tr>
						                 				<td><?=$x?></td>
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=$fetch_item['zqzis_primary_id']?></td><input type="hidden" name="fmrd_slno[]" value="<?=$fetch_item['fmrd_slno']?>" required=""><input type="hidden" name="zqzis_slno[]" value="<?=$fetch_item['zqzis_slno']?>" required="">
										                <input type="hidden" name="zqzis_primary_id[]" id="Primary<?=$x?>" value="<?=$zqzis_primary_id=$fetch_item['zqzis_primary_id']?>" required="">
					                
										                <td><?=$hqzis_approve_qnt_single=$fetch_item['zqzis_request_qnt']?><?=strtoupper($fetch_item['zqzis_unit'])?><input type="hidden" name="zqzis_approve_qnt[]" value="<?=$fetch_item['zqzis_request_qnt']?>" required="">
										                </td>
										                <!-- <td><?=$fetch_item['hqzis_request_qnt']?></td> -->

                                                        <?php
										                $get_detail="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_primary_code`='$zqzis_primary_id' and `zonal_location_id`='$zonal_place'";
					        							$get_exe=mysqli_query($conn,$get_detail);
					        							$fetch_item1=mysqli_fetch_assoc($get_exe);
					        							?>
					        							<input type="hidden" name="zonal_slno[]" value="<?=$fetch_item1['zonal_slno']?>" required="">
										                <td><?=$hq_qnty_single=$fetch_item1['zonal_qnty']?> <?=strtoupper($fetch_item['zqzis_unit'])?>
										                	<input type="hidden" name="zonal_qnty[]" value="<?=$fetch_item1['zonal_qnty']?>" required="">
										                </td>
										                <?php
										                	if($hq_qnty_single == 0){
																$remain=0;
																 $hqzis_approve_qnt_single=0;
															}else{
																if($hqzis_approve_qnt_single < $hq_qnty_single){
																	 $remain1=$hq_qnty_single-$hqzis_approve_qnt_single;

																}else if($hqzis_approve_qnt_single == $hq_qnty_single){
																	$remain1=$hq_qnty_single-$hqzis_approve_qnt_single;
																}else if($hqzis_approve_qnt_single > $hq_qnty_single){
																	 $remain1=$hq_qnty_single-$hqzis_approve_qnt_single;

																}

																if($remain1<0){
																	$remain=$hqzis_approve_qnt_single-$hq_qnty_single;
																	$hqzis_approve_qnt_single=$hqzis_approve_qnt_single-$remain;
																}else{
																	$remain=$hq_qnty_single-$hqzis_approve_qnt_single;
																}
															}
										                ?>
									                    <td><input type="number" onkeyup="calculate(<?=$x?>)" min="0" max="<?=$hqzis_approve_qnt_single?>" name="zqzis_issue_qnt[]" id="issue_qnty<?=$x?>" required placeholder=" Enter Quantity"> <?=strtoupper($fetch_item['zqzis_unit'])?>
									                     </td>
									                     <!-- <td> -->
																<input type="hidden" name="price[]" onkeyup="calculate(<?=$x?>)" value="<?=round($fetch_item1['price_charge_unit'],2)?>" step=".01"  id="price<?=$x?>" readonly>
															<!-- </td> -->
															<!-- <td> -->
																<input type="hidden" step=".01" name="totalprice[]" value="0"  id="totalprice<?=$x?>" readonly>
																<input type="hidden"  name="totalprice_data[]" value="<?=$fetch_item1['total_price']?>"  >
															<!-- </td> -->
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
					   		<div class="form-group pull-left">
					   	<a href="headquarter_receive_site_mr_list.php" class="btn btn-success">Back</a>
			     
				   </div>
				      <div class="form-group pull-right">
					    <input type="submit" name="submit" class="btn btn-success" value="Submit">
			     
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
</script>
<script type="text/javascript">
    function calculate(id) {
    	
        var quantity = document.getElementById('issue_qnty'+id).value;
        console.log(quantity);

        var price = document.getElementById('price'+id).value;
        console.log(price);
        var total = document.getElementById('totalprice'+id);

        var result = quantity * price;
        total.value = result;
         console.log(result);
          console.log(total);

      

    }

</script>
