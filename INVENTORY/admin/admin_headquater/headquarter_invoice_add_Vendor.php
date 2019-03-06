<?php

session_start();
ob_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
 // Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= ) 
 $token_name=$_GET['token_name'];
?>

<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
			<ul class="breadcrumb">
				<li><a href="#"></a></li>
				<!-- <li class="active">Dashboards</li> -->
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">		
			<?php $msg->display(); ?>
			<form class="form-horizontal" action="headquarter_invoice_add_new_save.php" method="POST" enctype='multipart/form-data'>
				<input type="hidden" name="token_name" value="<?=$token_name?>">
				<input type="hidden" name="form_type" value="<?=web_encryptIt('vendors_details_info')?>">
				<div class="col-md-12 col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
					 		<div class="panel-title">Vendors <button class="pull-right btn btn-sm btn-primary add_more_button">Add More Vendors</button></div>
					    </div>
					    <div class="panel-body">					   
						    <div class="input_fields_container">
						        <div id="ro" style="border: 1px solid red; padding: 37px;">
						        	<div class="form-group">
							    		<label class="control-label col-sm-2" for="Vendor1"> Vendor :</label>
							    		<div class="col-sm-10">
							      			<input type="text" class="form-control" id="Vendor1" placeholder="Enter Vendor" required="" name="Vendor[]">
							    		</div>
							  		</div>
						        	<div class="form-group">
							    		<label class="control-label col-sm-2" for="Period_from_vendor1">Period from:</label>
							    		<div class="col-sm-10">
							      			<input type="text" onfocus="check_date(1)" class="form-control" id="Period_from_vendor1" placeholder="Enter Period From" required="" name="Period_from_vendor[]">
							    		</div>
							  		</div>
							  		<div class="form-group">
							    		<label class="control-label col-sm-2" for="Period_to_vendor1">Period To:</label>
							    		<div class="col-sm-10">
							      			<input type="text" onfocus="check_date(1)" class="form-control" id="Period_to_vendor1" placeholder="Enter Period to" required="" name="Period_to_vendor[]">
							    		</div>
							  		</div>
							  		<div class="form-group">
							    		<label class="control-label col-sm-2" for="Invoice_vendor1">Invoice No:</label>
							    		<div class="col-sm-10">
							      			<input type="text" class="form-control" id="Invoice_vendor1" placeholder="Enter Invoice No" required="" name="Invoice_vendor[]">
							    		</div>
							  		</div>
							  		<div class="form-group">
							    		<label class="control-label col-sm-2" for="Invoice_date_vendor1">Invoice Date:</label>
							    		<div class="col-sm-10">
							      			<input type="text" class="form-control datepicker13" id="Invoice_date_vendor1" placeholder="Enter Invoice Date" required="" name="Invoice_date_vendor[]">
							    		</div>
							  		</div>
							  		<div class="form-group">
							    		<label class="control-label col-sm-2" for="Basic_vendors1">Basic :</label>
							    		<div class="col-sm-10">
							      			<input type="text" class="form-control" id="Basic_vendors1" placeholder="Enter Basic" required="" name="Basic_vendors[]">
							    		</div>
							  		</div>
							  		<div class="form-group">
							    		<label class="control-label col-sm-2" for="GST_amt_vendors1">GST :</label>
							    		<div class="col-sm-10">
							      			<input type="text" class="form-control" id="GST_amt_vendors1" placeholder="Enter GST " required="" name="GST_amt_vendors[]">
							    		</div>
							  		</div>
							  		<div class="form-group">
							    		<label class="control-label col-sm-2" for="Total_vendors1">Total :</label>
							    		<div class="col-sm-10">
							      			<input type="text" class="form-control" id="Total_vendors1" placeholder="Enter Total " required="" name="Total_vendors[]">
							    		</div>
							  		</div>

							   		<div class="form-group">
							    		<label class="control-label col-sm-2" for="vendors_Attachment1">Attachment :</label>
							    		<div class="col-sm-10">
							      			<input type="file" class="form-control"  required="" name="vendors_Attachment[1][]" multiple="true">
							    		</div>
							  		</div>
						        </div>
						        <br>
						    </div>
						</div>
					    <div class="panel-footer">
					    	<a href="index.php" class="btn btn-warning">Back</a>
							<div class="pull-right">
								<input type="submit" class="btn btn-success" name="get" Value="Submit">
					   		</div>
						</div>
					</div>



			</form>


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
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js">
</script> -->
	<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="jquery-ui.css">
 <script type="text/javascript">
        $(document).ready(function() {
        	 $(".datepicker13").datepicker({
        	 	numberOfMonths: 1,
                changeMonth: true,
      			changeYear: true,
        	 });
        	 check_date(1);
        	 // event.originalEvent.defaultPrevented;

        });
        function check_date(id){ 
        	console.log(id);
        		// alert(id);
	            $("#Period_from_vendor"+id).datepicker({
	                numberOfMonths: 1,
	                changeMonth: true,
	      			changeYear: true,
	                onSelect: function (selected) {
	                    var dt = new Date(selected);
	                    dt.setDate(dt.getDate() + 1);
	                    $("#Period_to_vendor"+id).datepicker("option", "minDate", dt);
	                }
	            });
	            $("#Period_to_vendor"+id).datepicker({
	                numberOfMonths: 1,
	                changeMonth: true,
	      			changeYear: true,
	                onSelect: function (selected) {
	                    var dt = new Date(selected);
	                    dt.setDate(dt.getDate() - 1);
	                    $("#Period_from_vendor"+id).datepicker("option", "maxDate", dt);
	                }
	            });
	        }
    </script>

     <script type="text/javascript">
        $(document).ready(function() {
        	check_date(1);
        var max_fields_limit      = 10; //set limit for maximum input fields
        var x = 1; //initialize counter for text box
        $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        	$("input").keyup(function(){
        $('input[type=text]').val(function () {
            // alert(this.value.toUpperCase());
            return this.value.toUpperCase();
          });
      });
            e.preventDefault();
            if(x < max_fields_limit){ //check conditions

                x++; //counter increment
                check_date(x);
                $('.input_fields_container').append('<div id="ro" style="border: 1px solid red; padding: 37px;"><div class="form-group"><label class="control-label col-sm-2" for="Vendor'+x+'"> Vendor :</label><div class="col-sm-10"><input type="text" class="form-control" id="Vendor'+x+'" placeholder="Enter Vendor" required="" name="Vendor[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Period_from_vendor'+x+'">Period from:</label><div class="col-sm-10"><input type="text" class="form-control" onfocus="check_date('+x+')" id="Period_from_vendor'+x+'" placeholder="Enter Period From" required="" name="Period_from_vendor[]"></div></div><div class="form-group">	<label class="control-label col-sm-2" for="Period_to_vendor'+x+'">Period To:</label><div class="col-sm-10"><input type="text" class="form-control" onfocus="check_date('+x+')" id="Period_to_vendor'+x+'" placeholder="Enter Period to" required="" name="Period_to_vendor[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Invoice_vendor'+x+'">Invoice No:</label><div class="col-sm-10"><input type="text" class="form-control" id="Invoice_vendor'+x+'" placeholder="Enter Invoice No" required="" name="Invoice_vendor[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Invoice_date_vendor'+x+'">Invoice Date:</label><div class="col-sm-10"><input type="text" class="form-control datepicker13" id="Invoice_date_vendor'+x+'" placeholder="Enter Invoice Date" required="" name="Invoice_date_vendor[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Basic_vendors'+x+'">Basic :</label><div class="col-sm-10"><input type="text" class="form-control" id="Basic_vendors'+x+'" placeholder="Enter Basic" required="" name="Basic_vendors[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="GST_amt_vendors'+x+'">GST :</label><div class="col-sm-10"><input type="text" class="form-control" id="GST_amt_vendors'+x+'" placeholder="Enter GST " required="" name="GST_amt_vendors[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Total_vendors'+x+'">Total :</label><div class="col-sm-10"><input type="text" class="form-control" id="Total_vendors'+x+'" placeholder="Enter Total " required="" name="Total_vendors[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="vendors_Attachment'+x+'">Attachment :</label><div class="col-sm-10"><input type="file" class="form-control" required="" name="vendors_Attachment['+x+'][]" multiple="true"></div></div><a href="#" class="remove_field btn btn-primary pull-right" style="margin-left:10px;">Remove</a></div><br>'); //add input field
            }
        });  
        $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
            e.preventDefault(); $(this).parent('#ro').remove(); x--;
        })
    });
    </script> 
	