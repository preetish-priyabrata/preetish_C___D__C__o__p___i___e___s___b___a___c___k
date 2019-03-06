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


			<form class="form-horizontal" action="headquarter_invoice_add_new_save.php" method="POST" enctype='multipart/form-data'>
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
						    			<input type="hidden" name="form_type" value="<?=web_encryptIt('basic_details')?>">
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
						    		<label class="control-label col-sm-2" for="from">Period From:</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control" id="from" placeholder="Enter Period From" required="" name="from" >
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="to">Period To:</label>
						    		<div class="col-sm-10">
						      			<input type="text" class="form-control " id="to" placeholder="Enter Period To" required="" name="to">
						    		</div>
						  		</div>
						  	</div>
					  	</div>
					</div>
					<div class="panel-footer">
						<div class="pull-right">
							<input type="submit" class="btn btn-success" name="get" Value="Submit">
				   		</div>
					</div>
				</div>
			</div>
		</form>



		</div>
	</div>
	
	<link href="../asserts/date_info/jquery-ui.css" rel="stylesheet">
<script src="../asserts/date_info/external/jquery/jquery.js"></script>
<script src="../asserts/date_info/jquery-ui.js"></script>
<!-- <script src="../asserts/lib/js/core/jquery/jquery.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <!--  <script type="text/javascript">
        $(document).ready(function() {
        var max_fields_limit      = 10; //set limit for maximum input fields
        var x = 1; //initialize counter for text box
        $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
            e.preventDefault();
            if(x < max_fields_limit){ //check conditions
                x++; //counter increment
                $('.input_fields_container').append('<div id="ro" style="border: 1px solid red; padding: 37px;"><div class="form-group"><label class="control-label col-sm-2" for="Vendor'+x+'"> Vendor :</label><div class="col-sm-10"><input type="text" class="form-control" id="Vendor'+x+'" placeholder="Enter Vendor" required="" name="Vendor[1]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Period_from_vendor'+x+'">Period from:</label><div class="col-sm-10"><input type="text" class="form-control datepicker13" id="Period_from_vendor'+x+'" placeholder="Enter Period From" required="" name="Period_from_vendor[]"></div></div><div class="form-group">	<label class="control-label col-sm-2" for="Period_to_vendor'+x+'">Period To:</label><div class="col-sm-10"><input type="text" class="form-control datepicker13" id="Period_to_vendor'+x+'" placeholder="Enter Period to" required="" name="Period_to_vendor[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Invoice_vendor'+x+'">Invoice No:</label><div class="col-sm-10"><input type="text" class="form-control" id="Invoice_vendor'+x+'" placeholder="Enter Invoice No" required="" name="Invoice_vendor[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Invoice_date_vendor'+x+'">Invoice Date:</label><div class="col-sm-10"><input type="text" class="form-control datepicker13" id="Invoice_date_vendor'+x+'" placeholder="Enter Invoice Date" required="" name="Invoice_date_vendor[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Basic_vendors'+x+'">Basic :</label><div class="col-sm-10"><input type="text" class="form-control" id="Basic_vendors'+x+'" placeholder="Enter Basic" required="" name="Basic_vendors[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="GST_amt_vendors'+x+'">GST :</label><div class="col-sm-10"><input type="text" class="form-control" id="GST_amt_vendors'+x+'" placeholder="Enter GST " required="" name="GST_amt_vendors[]"></div></div><div class="form-group"><label class="control-label col-sm-2" for="Total_vendors'+x+'">Total :</label><div class="col-sm-10"><input type="text" class="form-control" id="Total_vendors'+x+'" placeholder="Enter Total " required="" name="Total_vendors[]"></div></div><a href="#" class="remove_field btn btn-primary pull-right" style="margin-left:10px;">Remove</a></div><br>'); //add input field
            }
        });  
        $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
            e.preventDefault(); $(this).parent('#ro').remove(); x--;
        })
    });
    </script> -->
  <script>
  	 $(document).ready(function() {
  	 	 $( "#from" ).datepicker( "option", "showAnim", "bounce" );
  	 	 $( "#to" ).datepicker( "option", "showAnim", "bounce" );
	    var dateFormat = "mm/dd/yy",
	      from = $( "#from" )
	        .datepicker({
	          defaultDate: "+1w",
	          changeMonth: true,
	          numberOfMonths: 3
	        })
	        .on( "change", function() {
	          to.datepicker( "option", "minDate", getDate( this ), );
	        }),
	      to = $( "#to" ).datepicker({
	        defaultDate: "+1w",
	        changeMonth: true,
	        numberOfMonths: 3
	      })
	      .on( "change", function() {
	        from.datepicker( "option", "maxDate", getDate( this ) );
	      });
	 
	    function getDate( element ) {
	      var date;
	      try {
	        date = $.datepicker.parseDate( dateFormat, element.value );
	      } catch( error ) {
	        date = null;
	      }
	 
	      return date;
	    }
  	} );
  // $( function() {
  //   $( ".datepicker1" ).datepicker();
  //   $( ".datepicker" ).datepicker();
  // } );
//   $('body').on('focus',".datepicker13", function(){
//     $(this).datepicker();
// });
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
