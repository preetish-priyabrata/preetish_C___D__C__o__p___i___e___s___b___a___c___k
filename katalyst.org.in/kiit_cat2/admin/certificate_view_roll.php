<?php

session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
require 'config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
//include 'config.php';
$title="View Certificate By Roll";

?>

<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Certificate</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Certificate</li>
				<li class="active">View Certificate By Roll</li>
			</ul>
		</div>
	</div>
	<div class="container-fluid page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<?php $msg->display(); ?>
			</div>
		</div>
	</div>
	<!-- /Page Header-->
 <div class="container-fluid page-content">
	<div class="row">
	  <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
		 <div class="panel panel-default">
		   <div class="panel-heading">
			 <div class="panel-title">View Certificate By Roll</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal"   autocomplete="off">

			           <div class="form-group">
						  <label class="control-label col-lg-4 text-right">Program</label>
						   	 <div class="col-lg-8">
									<input class="form-control" name="student_roll" id="student_roll" placeholder="Enter Student Roll No" type="text" required="">
						   	</div>
						</div>
						 <div class="form-group pull-right">
						 <input type="button" class="btn btn-info"  value="Search" onclick="get_student()">
						 
						 </div>

						<div id="id_student"></div>


					   <div class="form-group pull-right">
					 
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
<script type="text/javascript">
	function get_student() {
		var student_roll=$('#student_roll').val();
		
		        if(student_roll!="" ){	
		        	    	
				        $.ajax({
				            type:'POST',
							url:'./certificate_get_student_compete_reverse.php',
				            data:'student_roll='+student_roll,
				            success:function(html){		            	
				                
				                   
				                   $('#id_student').html(html);
				                
				            }
				        });
				   
			    }else{
			    	document.getElementById("id_student").innerHTML ='';
			    	alert('Please Studen  Roll No');
			    	return false;
			    	exit();
			    }
	}

	
</script>
	<script src="../asserts/lib/js/forms/datepicker.min.js"></script>
	<script src="../asserts/lib/js/forms/datepicker.en.js"></script>
	<script src="../asserts/lib/js/pages/forms/picker_date.js"></script>