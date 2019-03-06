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
				<input type="hidden" name="form_type" value="<?=web_encryptIt('Deduction_details')?>">
				<div class="col-md-12 col-sm-12">
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
							      			<input type="file" class="form-control" id="Attachment" required="" name="Attachment[]" multiple="true">
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
        	 $("#Receive_dt").datepicker({
        	 	numberOfMonths: 1,
                changeMonth: true,
      			changeYear: true,
        	 });
         //    $("#txtFrom").datepicker({
         //        numberOfMonths: 1,
         //        changeMonth: true,
      			// changeYear: true,
         //        onSelect: function (selected) {
         //            var dt = new Date(selected);
         //            dt.setDate(dt.getDate() + 1);
         //            $("#txtTo").datepicker("option", "minDate", dt);
         //        }
         //    });
         //    $("#txtTo").datepicker({
         //        numberOfMonths: 1,
         //        changeMonth: true,
      			// changeYear: true,
         //        onSelect: function (selected) {
         //            var dt = new Date(selected);
         //            dt.setDate(dt.getDate() - 1);
         //            $("#txtFrom").datepicker("option", "maxDate", dt);
         //        }
         //    });
        });
    </script>