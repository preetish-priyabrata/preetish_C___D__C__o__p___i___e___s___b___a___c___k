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
							    		<label class="control-label col-sm-2" for="txtFrom">Period From:</label>
							    		<div class="col-sm-10">
							      			<input type="text" class="form-control" id="txtFrom" placeholder="Enter Period From" required="" name="txtFrom" >
							    		</div>
							  		</div>
							  	</div>
							  	<div class="col-lg-6">
							   		<div class="form-group">
							    		<label class="control-label col-sm-2" for="txtTo">Period To:</label>
							    		<div class="col-sm-10">
							      			<input type="text" class="form-control" id="txtTo" placeholder="Enter Period To" required="" name="txtTo">
							    		</div>
							  		</div>
							  	</div>
							</div>
						<br>


					    </div>
					    <div class="panel-footer">
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
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="jquery-ui.css">
 <script type="text/javascript">
        $(function () {
            $("#txtFrom").datepicker({
                numberOfMonths: 1,
                changeMonth: true,
      			changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#txtTo").datepicker("option", "minDate", dt);
                }
            });
            $("#txtTo").datepicker({
                numberOfMonths: 1,
                changeMonth: true,
      			changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#txtFrom").datepicker("option", "maxDate", dt);
                }
            });
        });
    </script>