<?php

session_start();
ob_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
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


			<form class="form-horizontal" >
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title">Basic Details</div>
				    </div>
				    <div class="panel-body">
				    	<div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="unit">Unit No:</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="unit" placeholder="Enter unit number" required="" name="unit">
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
								<div class="form-group">
								    <label class="control-label col-sm-2" for="month">Month:</label>
								    <div class="col-sm-10">
								     	<select class="form-control" name="month" id="month" required="">
					                        <option value="">Select Month</option>
					                        <?php
					                          $monthArray = range(1, 12);
					                          foreach ($monthArray as $month) {
					                          // padding the month with extra zero
					                            $monthPadding = str_pad($month, 2, "0", STR_PAD_LEFT);
					                          // you can use whatever year you want
					                          // you can use 'M' or 'F' as per your month formatting preference
					                            $fdate = date("F", strtotime("2017-$monthPadding-01"));
					                            echo '<option value="'.$monthPadding.'">'.$fdate.'</option>';
					                          }
					                        ?>
	                      				</select>
								    </div>
								</div>
						    </div>
						</div>
						<br>
					   <div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Period_from">Period From:</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control datepicker1" id="Period_from" placeholder="Enter Period From" required="" name="Period_from">
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Period_to">Period To:</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control datepicker1" id="Period_to" placeholder="Enter Period To" required="" name="Period_to">
						    		</div>
						  		</div>
						  	</div>
					  	</div>
					</div>
				</div>
			</div>
			<br>
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title">Invoice Details</div>
				    </div>
				    <div class="panel-body">
					   <div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Invoice">Invoice No:</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="Invoice" placeholder="Enter Invoice number" required="" name="Invoice">
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
								<div class="form-group">
								    <label class="control-label col-sm-2" for="area">Location/Area :</label>
								    <div class="col-sm-10">
								     	<input type="text" class="form-control" id="area" placeholder="Enter Location/Area" required="" name="area">
								    </div>
								</div>
						    </div>
						</div>
						<br>
					    <div class="row"> 
					   		<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Basic">Basic :</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="Basic" placeholder="Enter Basic" required="" name="Basic">
						    		</div>
						  		</div>
						  	</div>
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="tax_per">Tax % :</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="tax_per" placeholder="Enter Tax %" required="" name="tax_per">
						    		</div>
						  		</div>
						  	</div>						  	
					  	</div>
					  	<br>
					  	<div class="row">
					  		<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Total">Total :</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="Total" placeholder="Enter Total" required="" name="Total">
						    		</div>
						  		</div>
						  	</div>
						</div>					   
					</div>
				</div>
			</div>
			<br>
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title">Payment Received Details</div>
				    </div>
				    <div class="panel-body">
					  	<div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Receive_amt">Payment Receive Amount:</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="Receive_amt" placeholder="Enter Payment Receive Amount" required="" name="Receive_amt">
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
								<div class="form-group">
								    <label class="control-label col-sm-2" for="Receive_dt">Receive Date :</label>
								    <div class="col-sm-10">
								     	<input type="text" class="form-control datepicker1" id="Receive_dt" placeholder="Enter Location/Area" required="" name="Receive_dt">
								    </div>
								</div>
						    </div>
						</div> 
						<br>
					  	<div class="row">
					  		<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Balance_os">Balance OS :</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="Balance_os" placeholder="Enter Balance OS" required="" name="Balance_os">
						    		</div>
						  		</div>
						  	</div>
						</div>	
					   
					</div>
				</div>
			</div>
			<br>
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title">Deduction Details</div>
				    </div>
				    <div class="panel-body">
						<div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="it_ded"> It Ded :</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="it_ded" placeholder="Enter It Ded" required="" name="it_ded">
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
								<div class="form-group">
								    <label class="control-label col-sm-2" for="Wct_ded">Wct Ded :</label>
								    <div class="col-sm-10">
								     	<input type="text" class="form-control" id="Wct_ded" placeholder="Enter Wct Ded " required="" name="Wct_ded">
								    </div>
								</div>
						    </div>
						</div> 
						<br>
					  	<div class="row">
					  		<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Excess_ded">Excess Ded (Optional) :</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="Excess_ded" placeholder="Enter Excess Ded "  name="Excess_ded">
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Attachment">Attachment :</label>
						    		<div class="col-sm-10">
						      			<input type="file" class="form-control" id="Attachment" required="" name="Attachment">
						    		</div>
						  		</div>
						  	</div>
						</div>
					   
					</div>
				</div>
			</div>
			<br>
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title">Vendors</div>
				    </div>
				    <div class="panel-body">					   
					    <div class="input_fields_container">
					        <div><input type="text" name="product_name[]">
					            <button class="btn btn-sm btn-primary add_more_button">Add More Fields</button>
					        </div>
					    </div>
					</div>
				</div>
			</div>


			


		</div>
	</div>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker1" ).datepicker();
    $( ".datepicker" ).datepicker();
  } );
  </script>
    <script>
        $(document).ready(function() {
        var max_fields_limit      = 10; //set limit for maximum input fields
        var x = 1; //initialize counter for text box
        $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
            e.preventDefault();
            if(x < max_fields_limit){ //check conditions
                x++; //counter increment
                $('.input_fields_container').append('<div><input type="text" name="product_name[]"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
            }
        });  
        $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
    </script>

<?php
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templete/header.php';

?>
