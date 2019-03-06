<?php
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Head Quarter view Site Requsition Received Detail ";
$location=$_SESSION['hq_store_id'];

 $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $challan=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['access']));
 
// unset($_GET);
$check="SELECT * FROM `lt_master_hq_challan_generate` where `hqcg_challan_no`='$challan' and `hqcg_hq_location_id`='$location' ";
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
			<div class="page-title"><i class="icon-display4"></i>List Of Challan Issued</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Challan Management </li>
				<li class="">History Of Challan Issued</li>				
				<li class="active">List Of Challan Issued</li>
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
				 <div class="panel-title">Requisition Detail</div>
				   </div>
				     <div class="panel-body">
				     	
					   <form name="myFunction" class="form-horizontal" action="approver_mr_raised_detail_issued_quantity_save.php" method="POST">
					   	
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Zonal Location Name :</label>
								    <div class="col-lg-8">
									<?php 
										$zqcg_hq_location_id=$fetch_check['hqcg_zonal_location_id'];
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
							    	<input type="hidden" name="hqcg_date" value="<?=$fetch_check['hqcg_date']?>">
									<p><?=$fetch_check['hqcg_date']?></p>
							   </div>
							</div>
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="hqcg_site_mr_id" id="hqcg_site_mr_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_site_mr_id']?>" required="">
									<input type="hidden" class="form-control" name="hqcg_slno" id="hqcg_slno" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_slno']?>" required="">
									<p><?=strtoupper($fetch_check['hqcg_site_mr_id'])?></p>
							   </div>
							</div>
								<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Challan No : </label>
							   	   <div class="col-lg-8">
							  			<input type="hidden" class="form-control" name="hqcg_challan_no" id="hqcg_challan_no" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_challan_no']?>" required="">
							    <p><?=strtoupper($fetch_check['hqcg_challan_no'])?></p>
							   
							  </div>
							</div>
						   <div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Challan : </label>
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
				                           <table id="example77" class="display nowrap" width="100%" cellspacing="0">
										         <thead>
										            <tr>
										                <th>Sl.No</th>
										                <th>Secondary Code</th>
										                <th>HSN Code</th>
										                <th>Item Code</th>
										                <th>Item Name</th>
										                <th>Item Category Name</th>

										                <th>Request Quantity</th>
										                <th>Approved Quantity</th>
										                <th>Issued Quantity</th>

										                <th>Rate</th>
										                <th>Total Price</th>
										                
										                <th>Received Quantity</th>
										                <th>Recieved New Price Total</th>
										                <th>Damage Quantity</th>
										                <th>Damage Price</th>
										                <th>Transit Loss Quantity</th>
										                <th>Transit Loss Price</th>
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
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=$fetch_item['hqzis_secondary_id']?>              	
										                
					                					</td>
					                					<!--hsn code-->
					                				    <td><?=$hqzis_hsn_id=strtoupper($fetch_item['hqzis_hsn_id'])?>
										                </td>
										                <!-- item code -->
					                					<td><?=$hqzis_primary_id=strtoupper($fetch_item['hqzis_primary_id'])?>
										                </td>
										                <!-- Item Name -->
										                <td><?=$hqzis_item_name=strtoupper($fetch_item['hqzis_item_name'])?>
										                </td>
										                <!-- Machine No -->
										                <td><?=$hqzis_item_category_name=strtoupper($fetch_item['hqzis_item_category_name'])?>
										                </td>
										                
										                <!-- Request Quantity -->
										                <td><?=$hqzis_request_qnt=$fetch_item['hqzis_request_qnt']?>
										                	<?=strtoupper($hqzis_issue_qnt=$fetch_item['hqzis_unit'])?>


										                </td>
										              
										                <td><?=$hqzis_approve_qnt=$fetch_item['hqzis_approve_qnt']?>
										                	<?=strtoupper($hqzis_issue_qnt=$fetch_item['hqzis_unit'])?>
										                </td>
										                <!-- issue Quantity -->
										                  <td><?=$hqzis_issue_qnt=$fetch_item['hqzis_issue_qnt']?>
										                  	<?=strtoupper($hqzis_issue_qnt=$fetch_item['hqzis_unit'])?></td>
										                <td>INR <?=$price_rate=$fetch_item['price_rate']?>
										                </td>
										                 <td>INR <?=$price_total=$fetch_item['price_total']?>
										                </td>
										               

										            <?php 
										            if ($fetch_check['hqcg_receive_status']==1) {?>
										                 
										                <td><?=$hqzis_received_qnty=$fetch_item['hqzis_received_qnty']?> <?=strtoupper($hqzis_issue_qnt=$fetch_item['hqzis_unit'])?>
										                </td>
										                <td>INR <?php echo $price_rate*$hqzis_received_qnty?>
										                </td>
										                <td><?=$damage_loss=$fetch_item['damage_loss']?><?=strtoupper($hqzis_issue_qnt=$fetch_item['hqzis_unit'])?>
										                </td>
										                 <td>INR <?php echo $price_rate*$damage_loss?>
										                </td>
										                <td>
										                	<?php 
										                	$tr_primary=$fetch_item['hqzis_primary_id'];
										                	$transit_query="SELECT * FROM `lt_master_zonal_hq_issued_transit_received_info` WHERE `challan_id`='$challan' and `item_primary`='$tr_primary' ";
										                	$sql_transit_exe=mysqli_query($conn,$transit_query);
										                	$fetch_transit=mysqli_fetch_assoc($sql_transit_exe);
										                	echo  $item_quantity=$fetch_transit['item_quantity'];
										                	?>
										                	<?=strtoupper($hqzis_issue_qnt=$fetch_item['hqzis_unit'])?>
										                </td>
										                <td>INR <?php echo $price_rate*$item_quantity?>
										                </td>
										                
										                <?php }else{?>
										                <td>Mot Received</td>
										                <td>Mot Received</td>
										               	<td>Mot Received</td>
										               	<td>Mot Received</td>
										               	<td>Mot Received</td>
										                <td>Mot Received</td>
										               
										               
										                <?php 

										                } ?>
										                

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
                         		 <div class="form-group pull-left">
							   <button type="button" onclick="close_window()" class="btn btn-warning">Back</button> 
						   	 </div>
                          <br>  
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
     var table = $('#example77').DataTable({
    	scrollX:        true,
    	columnDefs: [
            { width: '20%', targets: 0 }
        ],
    });
 
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
