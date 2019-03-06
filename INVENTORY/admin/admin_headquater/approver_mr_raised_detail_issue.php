<?php
// print_r($_REQUEST);
// exit;
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Head Quarter view Site Requsition Issue Detail ";
// $zonal_place=$_SESSION['zonal_place'];
 $slno=web_decryptIt(str_replace(" ", "+", $_GET['slno'])); //zmr_slno
 $list=web_decryptIt(str_replace(" ", "+", $_GET['list'])); //zmr_unqiue_mr_id
 
// unset($_GET);
$check="SELECT * FROM `lt_master_zonal_material_requsition` where `zmr_slno`='$slno' and `zmr_unqiue_mr_id`='$list' and `status`='1'";
$sql_exe=mysqli_query($conn,$check);
$num=mysqli_num_rows($sql_exe);
if($num!='0'){

}
$fetch_check=mysqli_fetch_assoc($sql_exe);
echo $zonal_code=$fetch_check['zmr_site_from_location_id'];
?>
<style type="text/css">
.panel-body p {
    margin-top: 10px;
}
.form-control[disabled],.form-control[readonly] {
    color: #000809;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
		    <div class="page-title"><i class="icon-display4"></i> Material Requsitions To Be Issued</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">S.M.R Management  </li>
				<li class="">S.M.R Received</li>				
				<li class="active">Material Requsition To Be Issued</li>
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
					   	<form name="myFunction" class="form-horizontal" action="approver_mr_raised_detail_issue_section_save.php" method="POST" >
					   		<input type="hidden" name="form_types" value="insert" required="">
						   	<div class="col-lg-6">
						   	 <div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
									
									<?php 

										
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".strtoupper($result2['address_1'])."</p>";
	        							echo "<p>".strtoupper($result2['address_2'])."</p>";
	        							echo "C/O :- ".strtoupper($result2['address_3']).",<br>";
	        							echo "PO :- ".strtoupper($result2['address_4']).",<br>";
	        							echo "City :- ".strtoupper($result2['address_5']).",<br>";
	        							echo "District :- ".strtoupper($result2['address_6']).",<br>";
	        							echo "State :- ".strtoupper($result2['address_7']).",<br>";
	        							echo "Pin :- ".strtoupper($result2['address_8']).".<br>";
									?>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of M.R : </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['date']?></p>
							   </div>
							</div>
							<?php if($fetch_check['forward_status']=="1"){	?>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Approved M.R : </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['approver_date']?></p>
							   </div>
							</div>
							<?php }?>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="list_id" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$list?>" required="">
									<input type="hidden" class="form-control" name="zonal_code" id="zonal_code" placeholder="Enter Email Id" autocomplete="off" value="<?=$zonal_code?>" required="">
									<input type="hidden" class="form-control" name="slno_id" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$slno?>" required="">
									<p><?=strtoupper($list)?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Approver : </label>
							    <div class="col-lg-8">
							    <select class="form-control" name="approver_id" required="" readonly>
							    	<?php 
							    		$Approver_IDS=$fetch_check['zmr_forward_id'];
							    		$query_sql="SELECT * FROM `lt_master_user_system` WHERE `u_status`='1'and `user_level`='2' and `user_id`='$Approver_IDS'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {?>
	        								<option value="<?=$result['user_id']?>" <?php if($result['user_id']==$fetch_check['zmr_forward_id']){ echo "selected"; } ?> ><?=strtoupper($result['user_name'])?></option>
	        							<?php 

	        							}
	        							?>
							    </select>
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of M.R: </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['time']?></p>
							   </div>
							</div>
							<?php if($fetch_check['forward_status']=="3"){	?>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Approved M.R : </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['approver_time']?></p>
							   </div>
							</div>
							<?php }?>
							
						</div>
						<div class="col-lg-6">
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">DC No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="dc_no" class="form-control" placeholder="Enter DC No" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="date_enter" class="form-control" data-toggle="datepicker" placeholder="Enter Date" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Indent No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="Indent_no" class="form-control" placeholder="Enter Indent No " required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Vehicle No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="Vehicle_no" class="form-control" placeholder="Enter Vehicle No" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">LR No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="LR_no" class="form-control" placeholder="Enter LR No" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">LR Date : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="LR_date" class="form-control" data-toggle="datepicker" placeholder="Enter LR Date" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right"> Project No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="Project_No" class="form-control" placeholder="Enter Project No" required="">
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
										                <th>Primary Code</th>
										                <th>Secondary Code</th>
										                <th>Description</th>
										                
										              	<th>Approved Quantity</th>

										              	<th>Action</th>
										              	<th>Issued Quantity</th>
										              	<th>Rate</th>
										              	<th>Total Price</th>
										            </tr>
										         </thead>
					        					
					        					<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_zonal_material_requsition_details` WHERE `zmrd_slno_id`='$slno' and `zmr_unqiue_mr_id_item`='$list' and `zmrd_issue_status`='0' and `transfer_status`='0' ";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							$num_item=mysqli_num_rows($sql_item_exe);
					        							if($num_item==0){
					        								 $item1="SELECT * FROM `lt_master_zonal_material_requsition_details` WHERE `zmrd_slno_id`='$slno' and `zmr_unqiue_mr_id_item`='$list'   ";
					        							$sql_item_exe1=mysqli_query($conn,$item1);
					        							$num_item1=mysqli_num_rows($sql_item_exe1);
					        								$time=date('H:i:s');
					        								$date=date('Y-m-d');
					        								
																
					        								 $get_update="UPDATE `lt_master_zonal_material_requsition` SET `status`='2',`no_item_issued_z`='$num_item1',`total_no_item_issued`='$num_item1',`issuer_date`='$date',`issuer_time`='$time',`no_items_z`='$num_item1' where `zmr_unqiue_mr_id`='$list'";
																$get_update_sql=mysqli_query($conn,$get_update);
																
					        								$msg->success('Challan for the selected S.M.R Has Been Generated');
												 			header('Location:index.php');
															exit;
					        							}
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        						   <tr>
					    				 				<input type="hidden" name="zmrd_hsn_code[]" value="<?=$fetch_item['zmrd_hsn_code']?>" required="">
					    				 				<input type="hidden" name="slno_item[]" value="<?=$fetch_item['zmrd_slno']?>" required="">
										                <input type="hidden" name="zmrd_primary_code[]" id="Primary<?=$x?>" value="<?=$fetch_item['zmrd_primary_code']?>" required="">
										                <input type="hidden" name="zmrd_second_code[]" id="Primary<?=$x?>" value="<?=$fetch_item['zmrd_second_code']?>" required=""> 
										                <input type="hidden" name="zmrd_units_required[]" id="Primary<?=$x?>" value="<?=$fetch_item['zmrd_units_required']?>" required="">  

						                 				<td><?=$x?></td>
				 									    <td><?=strtoupper($fetch_item['zmrd_hsn_code'])?></td>

										                <td><?=strtoupper($fetch_item['zmrd_primary_code'])?></td>
										                
										                <td><?=strtoupper($fetch_item['zmrd_second_code'])?></td>
										                	
										                <td><?=strtoupper($fetch_item['zmrd_name_item'])?></td>
										              	
										                <td><?=strtoupper($fetch_item['zmrd_approved_qnt'])?><?=strtoupper($fetch_item['zmrd_units_required'])?>
										                </td>
														<td>
														<?php 	if(($fetch_item['transfer_status']==0) && ($fetch_item['zmrd_issue_status']==0)){?>
										                 <select name="action[]" onchange="calculate(<?=$x?>)" id="change_is<?=$x?>">	
										                   <option value="">-Action-</option>
										                    <option value="1">-Issue-</option>
										               	 </select> 
										               	 
										               	 <?php }else{?>
										               	 <input type="hidden" name="action[]" value="3">
										               	 <?php }?>
										                </td>  
    													<td>
															<?php 	if(($fetch_item['transfer_status']==0) && ($fetch_item['zmrd_issue_status']==0)){?>
															<input type="number" onkeyup="calculate(<?=$x?>)" name="issue_qnty[]" value="0"   max="<?=strtoupper($fetch_item['zmrd_approved_qnt'])?>" min="0" id="issue_qnty<?=$x?>">
															
															<?php }else{?>
										               	 <input type="hidden"  name="issue_qnty[]" value="issued">
										               	 <?php }?>
														 
										                </td>
														<td>
															<?php 	if(($fetch_item['transfer_status']==0) && ($fetch_item['zmrd_issue_status']==0)){?>
															<input type="number" name="price[]" onkeyup="calculate(<?=$x?>)" value="0" step=".01"  id="price<?=$x?>">
															
															<?php }else{?>
										               	 <input type="hidden" name="price[]" value="issued">
										               	 <?php }?>
														 
										                </td> 
										                <td>
														 <?php 	if(($fetch_item['transfer_status']==0) && ($fetch_item['zmrd_issue_status']==0)){?>
															<input type="number" step=".01" name="totalprice[]"  id="totalprice<?=$x?>" readonly>
															
															<?php }else{?>
										               	 <input type="hidden" name="totalprice[]" value="issued">
										               	 <?php }?>
														 
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
                         	    <input type="hidden" name="total_item" id="total_item" value="<?=$x?>">
                         	  <input type="hidden" name="hq_store_id" id="hq_store_id" value="<?=$_SESSION['hq_store_id']?>">
			   				 <div class="pull-left">
		                	<a href="headquarter_receive_site_mr_list.php" class="btn btn-warning">Back</a>
		               </div>
		 	 		<div class="form-group pull-right"> 
		 	   	  <input type="submit" class="btn btn-success btn-md" name="Next" value="Save">
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
		$('[data-toggle="datepicker"]').datepicker({
        autoHide: true,
        zIndex: 2048,
      });
    
} );
</script>
<script type="text/javascript">
    function calculate(id) {
    	console.log(id);
    	
    	var change_is = document.getElementById('change_is'+id).value;
    	if(change_is==""){
    		$('#issue_qnty'+id).val("0");
    		$('#price'+id).val("0");

    		$('#totalprice'+id).val("");
    	}else{
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

    }

</script>
