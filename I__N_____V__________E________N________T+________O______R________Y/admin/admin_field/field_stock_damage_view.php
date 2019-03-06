<?php

// Array ( [token_name] => Nzq6mzbwAYNGhKPhBYtu39f5vH7nnvpp/IV9 8nsc4I= [token_id] => 5jr635gJaohpkMh7Knn4KMwzgxmwsgFS4snDsGNtZik= ) 
session_start();
ob_start();
if($_SESSION['admin_field']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
 $field_slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name'])); //zmr_slno
 $field_secondary_code=web_decryptIt(str_replace(" ", "+", $_GET['token_id'])); //zmr_unqiue_mr_id
 $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
 $field_place=$_SESSION['field_place'];
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Field Internal Damage Form</div>
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
						<form name="myFunction" class="form-horizontal" action="field_stock_damage_view_save.php" method="POST">
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
												<th width="15%">Rate Price</th>
												<th width="15%">Total Price</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											
									    $Requsition_query="SELECT * FROM `lt_master_field_stock_info` WHERE `field_location_id`='$field_place' and `field_secondary_code`='$field_secondary_code' and `field_slno`='$field_slno' ";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) { 
				        					?>
											<tr>
												<input type="hidden" name="field_slno" value="<?=$result['field_slno']?>">
												<input type="hidden" name="field_primary_code" value="<?=$result['field_primary_code']?>">
												<input type="hidden" name="field_secondary_code" value="<?=$result['field_secondary_code']?>">
												<input type="hidden" name="field_component_name" value="<?=$result['field_component_name']?>">
												<input type="hidden" name="field_component_id" value="<?=$result['field_component_id']?>">
												<input type="hidden" name="field_category_name" value="<?=$result['field_category_name']?>">
												<input type="hidden" name="field_category_id" value="<?=$result['field_category_id']?>">
												<input type="hidden" name="field_unit" value="<?=$result['field_unit']?>">
												<input type="hidden" name="field_qnty" value="<?=$result['field_qnty']?>">
												<input type="hidden" name="damage_loss" value="<?=$result['damage_loss']?>">
												<input type="hidden" name="damage_loss_status" value="<?=$result['damage_loss_status']?>">
												<input type="hidden" name="field_location_id" value="<?=$result['field_location_id']?>">
												<input type="hidden" name="price_charge_unit"  id="price_charge_unit" value="<?=$result['price_charge_unit']?>">
												<input type="hidden" name="total_price" value="<?=$result['total_price']?>">

												<td><?=strtoupper($result['field_secondary_code'])?></td>
						        				<td><?=strtoupper($result['field_component_name'])?></td>
						        				<td><?=strtoupper($result['field_category_name'])?></td>
						        				<td><?=strtoupper($result['field_qnty'])?> <?=strtoupper($result['field_unit'])?></td>
												<td><input onkeyup="calculate()" type="number" name="damage_qnty" id="damage_qnty" min="0" max="<?=$result['field_qnty']?>" value="0" required> <?=strtoupper($result['field_unit'])?></td>
												<td>INR <?=round(strtoupper($result['price_charge_unit']), 2)?></td>
												<td>INR <input type="number" readonly="" name="damage_qnty_price" min="0" id="damage_qnty_price" value="0" required></td>
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							
							<div class="row">
								<div class="form-group text-center">
									<div class="pull-left">
		    		   					<a href="index.php" class="btn btn-warning">Back</a>
		    		  				</div>
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
    	// console.log(id);
    	
    	// var change_is = document.getElementById('change_is'+id).value;
    	// if(change_is==""){
    	// 	$('#issue_qnty'+id).val("0");
    	// 	$('#price'+id).val("0");

    	// 	$('#totalprice'+id).val("");
    	// }else{
        var quantity = document.getElementById('damage_qnty').value;
        console.log(quantity);

        var price = document.getElementById('price_charge_unit').value;
        console.log(price);
        var total = document.getElementById('damage_qnty_price');

        var result = quantity * price;
        total.value = result;
         console.log(result);
          console.log(total);

      // }

    }

</script>





