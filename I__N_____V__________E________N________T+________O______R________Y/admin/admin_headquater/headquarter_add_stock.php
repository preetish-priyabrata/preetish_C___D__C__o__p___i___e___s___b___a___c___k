<?php
session_start();
ob_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
			<div class="page-title"><i class="icon-display4"></i> Add New Stock</div>
			<ul class="breadcrumb">
				<li><a href="#"></a></li>
				<li class="">Dashboards</li>
				<li class="">Stock Info</li>
				<li class="active">Add New Stock</li>
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
						<div class="panel-title">Add New Stock</div>
				    </div>
				    <div class="panel-body">
				    <form name="myFunction" class="form-horizontal" action="headquarter_add_stock_save.php" method="POST">    	
				    	<input type="hidden" name="form_type" value="<?=web_encryptIt('hq stock entry details')?>">
      			      	<div class='row'>
					   		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
					      		<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
											<th width="15%">Primary Code</th>
											<th width="15%">Secondary Code</th>
											<th width="15%">Component Name</th>
											<th width="15%">Category Type</th>
											<th width="15%">Unit</th>
											<th width="15%">Quantity</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input class="case" type="checkbox"/></td>
											<td>
												<input type="hidden" name="slno[]" id="slno_1" class="form-control autocomplete_txt" autocomplete="off" required >
												<input type="text" data-type="productCode" name="primary[]" id="primary_1" class="form-control autocomplete_txt" autocomplete="off" required="">												
											</td>
											<td>
												<input type="text" data-type="productsecondary" name="secondary[]" id="secondary_1" class="form-control autocomplete_txt" autocomplete="off" readonly="" required>
											</td>
											<td>
												<input type="text" data-type="productName" name="itemname[]" id="itemname_1" class="form-control changesNo" autocomplete="off"  ondrop="return false;" onpaste="return false;" readonly required>
											</td>
											<td>
												<input type="hidden" name="catergoryNO[]" id="catergoryNO_1" class="form-control changesNo" autocomplete="off"  ondrop="return false;" onpaste="return false;" required readonly="">
												<input type="text" name="catergory[]" id="catergory_1" class="form-control changesNo" autocomplete="off"  ondrop="return false;" onpaste="return false;" readonly="" required>
											</td>
											<td>
												<input type="text" name="unit[]" id="unit_1" class="form-control totalLinePrice" autocomplete="off"  ondrop="return false;" onpaste="return false;" readonly required>
										    </td>
											<td>
												<input type="number" name="qnty[]" id="qnt_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" required="">
											</td>
										</tr>
									</tbody>
								</table>
					      	</div>
					    </div>
					    <div class='row'>
					    	<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
					      		<button class="btn btn-danger delete" type="button">- Delete</button>
					      		<button class="btn btn-success addmore" type="button">+ Add More</button>
					      	</div>
					    </div>
					    	
					    <h2>Notes: </h2>
					    <div class='row'>
					    	<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
					    		<div class="form-group">
									<textarea class="form-control" rows='5' name="notes" id="notes" placeholder="Your Notes"></textarea>
								</div>
					      	</div>
					    </div>	
					    <br>
					    <div class="form-group pull-right">
					 	 
					 	 <button type="submit" onclick='return window.confirm("Do you want to update stock of the selected item ?");' class="btn btn-success">Save</button> 
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$('.add').click(function() {
    $('.block:last').before('<div class="col-md-12"><input type="text" class="col-md-3" placeholder="item" /> <input type="text" placeholder="quantity" class="col-md-2" /> <input type="text" placeholder="Price_single" class="col-md-2" /> <input type="text" placeholder="tottal" class="col-md-3" /> <span class="remove col-md-2">Remove Option</span></div>');
});
$('.optionBox').on('click','.remove',function() {
		$(this).parent().remove();
});
</script>
<style type="text/css">
	.block {
    display: block;
}
input {
    width: 50%;
    display: inline-block;
}
span {
    display: inline-block;
    cursor: pointer;
    text-decoration: underline;
}
input[type=number]{ -moz-appearance: textfield; }
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
-webkit-appearance: none;
margin: 0;
}
</style>

<script type="text/javascript">
	/**
 * Site : http:www.smarttutorials.net
 * @author muni
 */
	      
//adds extra table rows
var i=$('table tr').length;
$(".addmore").on('click',function(){
	html = '<tr>';
	html += '<td><input class="case" type="checkbox"/></td>';
	html += '<td><input type="hidden"  name="slno[]" id="slno_'+i+'" class="form-control autocomplete_txt" autocomplete="off" readonly required><input type="text" data-type="productCode" name="primary[]" id="primary_'+i+'" class="form-control autocomplete_txt" autocomplete="off" required ></td>';
	html += '<td><input type="text" data-type="productsecondary" name="secondary[]" id="secondary_'+i+'" class="form-control autocomplete_txt" autocomplete="off" readonly required></td>';
	html += '<td><input type="text" data-type="productName" name="itemname[]" id="itemname_'+i+'" class="form-control autocomplete_txt" autocomplete="off" readonly required></td>';
	html += '<td><input type="text" name="catergory[]" id="catergory_'+i+'" class="form-control changesNo" autocomplete="off"  ondrop="return false;" onpaste="return false;" readonly required><input type="hidden" name="catergoryNO[]" id="catergoryNO_'+i+'" class="form-control changesNo" autocomplete="off"  ondrop="return false;" onpaste="return false;" readonly required></td>';

	html += '<td><input type="text" name="unit[]" id="unit_'+i+'" class="form-control changesNo" autocomplete="off" ondrop="return false;" onpaste="return false;" readonly required></td>';

	html += '<td><input type="text" name="qnty[]" id="qnty_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" required ></td>';
	html += '</tr>';
	$('table').append(html);
	i++;
});

//to check all checkboxes
$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});

//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
	type = $(this).data('type');
	
	if(type =='productCode' )autoTypeNo=1;
	// if(type =='productName' )autoTypeNo=1; 	
	
	$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'headquater_get_detail_list_auto.php',
				dataType: "json",
				method: 'post',
				data: {
				   name_startsWith: request.term,
				   type: type
				},
				 success: function( data ) {
					 response( $.map( data, function( item ) {
					 	var code = item.split("|");
						return {
							label: code[autoTypeNo],
							value: code[autoTypeNo],
							data : item
						}
					}));
				}
			});
		},
		
		autoFocus: true,	      	
		minLength: 0,
		select: function( event, ui ) {
			var names = ui.item.data.split("|");						
			id_arr = $(this).attr('id');
	  		id = id_arr.split("_");
	  		$('#slno_'+id[1]).val(names[0]);
			$('#primary_'+id[1]).val(names[1]);
			$('#secondary_'+id[1]).val(names[2]);
			$('#itemname_'+id[1]).val(names[3]);
			
			$('#catergory_'+id[1]).val(names[4]);
			$('#catergoryNO_'+id[1]).val(names[5]);
			$('#unit_'+id[1]).val(names[6]);
			// $('#qnty_'+id[1]).val( 1*names[2] );
			// calculateTotal();
		}		      	
	});
});

// //price change
// $(document).on('change keyup blur','.changesNo',function(){
// 	id_arr = $(this).attr('id');
// 	id = id_arr.split("_");
// 	quantity = $('#quantity_'+id[1]).val();
// 	price = $('#price_'+id[1]).val();
// 	if( quantity!='' && price !='' ) $('#total_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );	
// 	calculateTotal();
// });

// $(document).on('change keyup blur','#tax',function(){
// 	calculateTotal();
// });

// //total price calculation 
// function calculateTotal(){
// 	subTotal = 0 ; total = 0; 
// 	$('.totalLinePrice').each(function(){
// 		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
// 	});
// 	$('#subTotal').val( subTotal.toFixed(2) );
// 	tax = $('#tax').val();
// 	if(tax != '' && typeof(tax) != "undefined" ){
// 		taxAmount = subTotal * ( parseFloat(tax) /100 );
// 		$('#taxAmount').val(taxAmount.toFixed(2));
// 		total = subTotal + taxAmount;
// 	}else{
// 		$('#taxAmount').val(0);
// 		total = subTotal;
// 	}
// 	$('#totalAftertax').val( total.toFixed(2) );
// 	calculateAmountDue();
// }

// $(document).on('change keyup blur','#amountPaid',function(){
// 	calculateAmountDue();
// });

// //due amount calculation
// function calculateAmountDue(){
// 	amountPaid = $('#amountPaid').val();
// 	total = $('#totalAftertax').val();
// 	if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
// 		amountDue = parseFloat(total) - parseFloat( amountPaid );
// 		$('.amountDue').val( amountDue.toFixed(2) );
// 	}else{
// 		total = parseFloat(total).toFixed(2);
// 		$('.amountDue').val( total );
// 	}
// }


//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8,46); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    console.log( keyCode );
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}

//datepicker
// $(function () {
//     $('#invoiceDate').datepicker({});
// });
</script>

