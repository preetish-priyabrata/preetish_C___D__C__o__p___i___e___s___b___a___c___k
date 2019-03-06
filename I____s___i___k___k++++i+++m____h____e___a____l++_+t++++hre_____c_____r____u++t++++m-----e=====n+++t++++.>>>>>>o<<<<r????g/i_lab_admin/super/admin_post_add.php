<?php

session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
   $title="Create Post System           ";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Post</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Post System</li>
				<li class="active">Add New Post</li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Add Post</div>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="admin_post_add_save.php"  method="POST">
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Post Name *</label>
								<div class="col-lg-8">
									<input class="form-control" name="post_name" placeholder="Enter Post Name" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Fee *</label>
								<div class="col-lg-8">
									<input class="form-control" name="price_detail" placeholder="Enter Price" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Post Code *</label>
								<div class="col-lg-8">
									<input class="form-control" name="post_code" placeholder="Enter Price" type="text" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Detail Information *</label>
								<div class="col-lg-8">
									<textarea class="ckeditor"  name="editor" id="editor[]" rows="3" cols="4" style="visibility: hidden; display: none;" required="">
							  		</textarea>
								</div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Starting Date *</label>
							    <div class="col-lg-8">
							        <input class="form-control datepicker-here" data-language='en' type="text" name="Starting_date" id="Starting_date" placeholder="Enter Starting Date" required="" >
							    </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Ending Date *</label>
							    <div class="col-lg-8">
							        <input class="form-control datepicker-here" data-language='en' type="text" name="ending_date" id="ending_date" placeholder="Enter Ending Date" required="" >
							    </div>
							</div>
							<div class="form-group pull-right">
								
								<input type="submit" class="btn btn-info"  value="Save"  >
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
include '../template/header.php';

?>
<script src="../asserts/lib/js/forms/datepicker.min.js"></script>
	<script src="../asserts/lib/js/forms/datepicker.en.js"></script>
	<script src="../asserts/lib/js/pages/forms/picker_date.js"></script>
	<script type="text/javascript">
		function check_date() {
			
			var startDate = document.getElementById("Starting_date").value;
		    var endDate = document.getElementById("ending_date").value;
		 
		     if(startDate!="" && endDate!=""){
		      if ((Date.parse(startDate) >= Date.parse(endDate))) {
		        alert("End date should be greater than Start date");
		        document.getElementById("ending_date").value = "";
		        return false;
		    }else{
				return true;
			}
		}
	}
	</script>