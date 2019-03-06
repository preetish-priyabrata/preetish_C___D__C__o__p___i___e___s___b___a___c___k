<?php

session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
require 'config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
//include 'config.php';
$title="View Certificate";

?>

<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Certificate</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Certificate</li>
				<li class="active">View Certificate </li>
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
			 <div class="panel-title">View Certificate </div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="certificate_add_save.php" method="POST" autocomplete="off">

			           <div class="form-group">
						  <label class="control-label col-lg-4 text-right">Program</label>
						   	 <div class="col-lg-8">
								 <select class="form-control" onchange="get_batch_completed()" name="course_name" autocomplete="off"  id="course_name" type="dropdown" required="">
								    <option value="">--Select Program Name--</option>
								    <?php
	                				 $course_name = "SELECT  * FROM `tbl_course` where `status`='1'";
	                  				 $exe_course_name = mysqli_query($conn,$course_name);
	                				                
	                  				 while($rec_category = mysqli_fetch_assoc($exe_course_name)){?>
	                    			<option value="<?php echo $rec_category['sl_no'];?>"><?=$rec_category['course_name'];?></option>
	             					 <?php }?>
	               					
								</select>
						   	</div>
						</div>
						 <div class="form-group">
						   <label class="control-label col-lg-4 text-right">Batch</label>
						  	<div class="col-lg-8">
								 <select class="form-control" onchange="get_student();" name="batch_name" id="batch_name" autocomplete="off"   type="dropdown" required="">
								   <option>--Please Program --</option>
	               					
								</select>
						   	</div>
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
		var course_names=$('#course_name').val();
		var batch_names=$('#batch_name').val();
		        if(course_names!="" ){	
		        	if(batch_names!="")	 {       	
				        $.ajax({
				            type:'POST',
							url:'./certificate_get_student_compete.php',
				            data:'course_names='+course_names+'&batch_names='+batch_names,
				            success:function(html){		            	
				                
				                   
				                   $('#id_student').html(html);
				                
				            }
				        });
				    }else{
				    	document.getElementById("id_student").innerHTML ='';
				    	alert('Please Select Batch Information');
				    	return false;
				    	exit();
				    }
			    }else{
			    	document.getElementById("batch_name").innerHTML ='';
			    	alert('Please Select Program');
			    	return false;
			    	exit();
			    }
	}

	function get_batch_completed(argument) {
		var course_names=$('#course_name').val();
		        if(course_names!=""){		        	
			        $.ajax({
			            type:'POST',
						url:'./add_batch_get_batch_detail_reverse.php',
			            data:'course_names='+course_names,
			            success:function(html){		            	
			                
			                   
			                   $('#batch_name').html(html);
			                
			            }
			        });
			    }else{
			    	document.getElementById("batch_name").innerHTML ='';
			    	alert('Please Select Program');
			    	return false;
			    	exit();
			    }
		// body...
	}
</script>
	<script src="../asserts/lib/js/forms/datepicker.min.js"></script>
	<script src="../asserts/lib/js/forms/datepicker.en.js"></script>
	<script src="../asserts/lib/js/pages/forms/picker_date.js"></script>