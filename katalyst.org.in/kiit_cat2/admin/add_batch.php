<?php

session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
$title="Add New Tranning";
?>

<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add Batch</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Batch</li>
				<li class="active">Add Batch </li>
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
			 <div class="panel-title">Add Batch</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="add_batch_save.php" onsubmit="return(check_days_selected())" method="POST">
				   		<div class="form-group">
							<label class="control-label col-lg-4 text-right">Batch Name</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="batch" id="batch" placeholder="Enter Batch Name" type="text" required="">
						   	</div>
						</div>
					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Training/Program Name</label>
						  	<div class="col-lg-8">
								<select name="stud_course" id="stud_course" class="form-control requiredField" required="" >
	                                <option value="">-- Course Name --</option>
	                                <?php $select_cource="SELECT * FROM `tbl_course` WHERE `status`='1'";
	                                $res_select = mysqli_query($conn, $select_cource);
	                                while($row=mysqli_fetch_assoc($res_select)){?>                                                    <option value="<?=$row['sl_no']?>"><?=$row['course_name']?></option>
	                                <?php }?>
	                            </select>
						   	</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4 text-right">No Of Seat</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="no_seat" id="no_seat" placeholder="Enter No of Seat" type="number" min="1" required="">
						   	</div>
						</div>
		
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Start Time</label>
						  	<div class="col-lg-8">
						  		<div class="input-group clockpicker p-t-20">
								
								<input class="form-control" name="start_time"  placeholder="" type="text">
								<span class="input-group-addon"><i class="icon-alarm"></i></span>
							</div>
		            	</div>
					  </div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">End Time</label>
						  	<div class="col-lg-8">
						  		<div class="input-group clockpicker p-t-20">
								
								<input class="form-control" name="end_time" placeholder="" type="text">
								<span class="input-group-addon"><i class="icon-alarm"></i></span>
							</div>
								
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Venue </label>
						  	<div class="col-lg-8">
								 <textarea name="Venue" class="form-control" required=""></textarea>
						   	</div>
						</div>

						<div class="form-group">
						  <label class="control-label col-lg-4 text-right">Days</label>
						  	<div class="col-lg-8">
						  		<?php
								    $days = array();
								    for ($i = 0; $i < 7; $i++) {
								        $days[$i]=$day_week = jddayofweek($i,1);
								        ?>
								        <label class="checkbox-inline checkbox-right">
											<input checked="checked" class="roomselect" name="days[]" value="<?=$day_week?>" type="checkbox">
												<?=$day_week?>
										</label>
								        <?php

								    }

								?>
								<!--  <input class="form-control" name="moduleNumber" id="demo" placeholder="Enter No of Module" type="text" required=""> -->
						   	</div>
						</div>
						
					   <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info" id="submit" onclick="check_days_selected()"  value="Save" >
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
  <!-- <script src="../asserts/lib/js/forms/datepicker.min.js"></script>
	<script src="../asserts/lib/js/forms/datepicker.en.js"></script>
	<script src="../asserts/lib/js/pages/forms/picker_date.js"></script> -->
	<!-- Page scripts -->

<script src="../asserts/lib/js/forms/clockpicker.js"></script>
<script src="../asserts/lib/js/pages/forms/picker_time.js"></script>
<!-- /Page scripts -->
<script type="text/javascript">
	
	   function check_days_selected(){

	   		var len = $(".roomselect:checked").length;
			if(len==0){
			    alert('Select Any one Days ');
			    return false;
			 }else{
			 	var batchs=$('#batch').val();
		        if(batchs!=""){		        	
			        $.ajax({
			            type:'POST',
						url:'./add_batch_get_batch.php',
			            data:'batchs='+batchs,
			            success:function(html){		            	
			                if(html==1){
			                    // document.getElementById("errornews").innerHTML = "";                   
			                    // $("#reli").submit(); 
			                    return true;
			                }else{
			                    // document.getElementById("errornews").innerHTML = "Category/Caste Is Present In Our Records ,"+Category_name;
			                     alert('Batch Name Is Already Exist Please Try New');
			                    return false;
			                }
			            }
			        });
			    }
			 	// return true;
			 }
		}

	
</script>