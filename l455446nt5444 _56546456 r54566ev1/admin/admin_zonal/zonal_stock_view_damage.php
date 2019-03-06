<?php
// print_r($_GET);
// exit();
session_start();
ob_start();
if($_SESSION['admin_zonal']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
 $zonal_slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name'])); //zmr_slno
 $zonal_secondary_code=web_decryptIt(str_replace(" ", "+", $_GET['token_id'])); //zmr_unqiue_mr_id
 // $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
 $zonal_place=$_SESSION['zonal_place'];
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Zonal Internal Damage Form</div>
			<ul class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">Stock Information</a></li>
				<li><a href="#">View Stock</a></li>
				<li class="active">Internal Damage</li>
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
						<div class="panel-title">Stock Damage Internal</div>
				    </div>
				    <div class="panel-body">
						<form name="myFunction" class="form-horizontal" action="zonal_stock_view_damage_save.php" method="POST">
							<div class='row'>
						   		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						      		<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th width="15%">Item Code</th>
												<th width="15%">Component Name</th>
												<th width="15%">Category Type</th>
												<th width="15%">Avaliable Quantity</th>
												<th width="15%">Damage Quantity</th>
												<th width="15%">Rate</th>
												<th width="15%">Damage Total Price</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											
											$Requsition_query="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_location_id`='$zonal_place' and `zonal_secondary_code`='$zonal_secondary_code' and `zonal_slno`='$zonal_slno' ";
					        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
					        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) { 
				        					?>
											<tr>
												<input type="hidden" name="zonal_slno" value="<?=$result['zonal_slno']?>">
												<input type="hidden" name="zonal_primary_code" value="<?=$result['zonal_primary_code']?>">
												<input type="hidden" name="zonal_secondary_code" value="<?=$result['zonal_secondary_code']?>">
												<input type="hidden" name="zonal_component_name" value="<?=$result['zonal_component_name']?>">
												<input type="hidden" name="zonal_component_id" value="<?=$result['zonal_component_id']?>">
												<input type="hidden" name="zonal_category_name" value="<?=$result['zonal_category_id']?>">
												<input type="hidden" name="zonal_category_id" value="<?=$result['zonal_category_id']?>">
												<input type="hidden" name="zonal_unit" value="<?=$result['zonal_unit']?>">
												<input type="hidden" name="zonal_qnty" id='zonal_qnty' value="<?=$result['zonal_qnty']?>">
												<input type="hidden" name="damage_loss" value="<?=$result['damage_loss']?>">
												<input type="hidden" name="damage_loss_status" value="<?=$result['damage_loss_status']?>">
												<input type="hidden" name="zonal_location_id" value="<?=$result['zonal_location_id']?>">
												<input type="hidden" name="price_charge_unit" id='price_charge_unit' value="<?=$result['price_charge_unit']?>">
												<input type="hidden" name="total_price" value="<?=$result['total_price']?>">

												<td><?=strtoupper($result['zonal_secondary_code'])?></td>
						        				<td><?=strtoupper($result['zonal_component_name'])?></td>
						        				<td><?=strtoupper($result['zonal_category_id'])?></td>
						        				<td><?=strtoupper($result['zonal_qnty']);?> <?=strtoupper($result['zonal_unit'])?></td>
												<td><input type="number" name="damage_qnty" id="damage_qnty" onkeyup="calculate()" min="1" max="<?=$result['zonal_qnty']?>" required></td>
												<td>INR <?=round($result['price_charge_unit'],2)?></td>
												<td>
													INR <input type="number" step=".01" name="totalprice"  id="totalprice" readonly>
												</td>
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							
							<div class="row">
								<div class="pull-left">
									<a href="zonal_stock_view.php" class="btn btn-warning">Back</a>
									
								</div>
								<div class="form-group text-right">
								    <input type="submit" name="submit" class="btn btn-success" value="Submit">
						     
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
    function calculate() {
    	var zonal_qnty=$('#zonal_qnty').val();
        var quantity = document.getElementById('damage_qnty').value;
        console.log(quantity);

        var price = document.getElementById('price_charge_unit').value;
        console.log(price);
        var total = document.getElementById('totalprice');
        var my_result = zonal_qnty - quantity;
		if(my_result<0){
			$('#damage_qnty').val('0');
			$('#totalprice').val('0');
		}else{
			var result =quantity * price;
	        total.value = result.toFixed(2);
	         console.log(result.toFixed(2));
	          console.log(total);
		}
        

     

    }

</script>

