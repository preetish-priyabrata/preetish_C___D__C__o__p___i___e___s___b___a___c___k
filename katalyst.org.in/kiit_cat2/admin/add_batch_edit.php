<?php

session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Batch List";
 	$course = str_replace(" ", "+", $_GET['course']);
    $course_id = decryptIt_webs($course);
    $queryActiveCourse = "SELECT * FROM `tbl_batch` WHERE `sl_no` = '$course_id' ";
    $resActiveCourse = mysqli_query($conn, $queryActiveCourse); 
    $num=mysqli_num_rows($resActiveCourse);
    if($num=='1'){
    	$rowActiveCourse = mysqli_fetch_assoc($resActiveCourse);

?>
<style type="text/css">

#module {
    border: 1px solid #77ed99;
    margin: 4px 2px;
    padding: 1.35em .625em .75em;
}
#module1 {
    border: 1px solid #e1b806;
    margin: 4px 2px;
    padding: 1.35em .625em .75em;
}
#module2 {
    border: 1px solid #77afed;
    margin: 4px 2px;
    padding: 1.35em .625em .75em;
}
.form-control[disabled], .form-control[readonly] {
    color: #0A5D6E;
}
</style>
	<!--Page Header-->





	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Edit Batch Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Batch</li>
				<li><a href="#"></a>Edit Batch List</li>
				<li class="active"><a href="#"></a>Edit Batch Details</li>
				<!-- <li class="active">User List</li> -->
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
					    <div class="panel-title">Edit Batch Details</div>
					</div>
					<div class="panel-body">
					<form name="myFunction" class="form-horizontal" onsubmit="return (check_days_selected());" action="add_batch_edit_Save.php" method="POST" autocomplete="off">
						 
						 <input type="hidden" name="sl_no" value="<?php echo $course_id; ?>">
						<fieldset id="module2"> <b>Batch Details</b>
					  
					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Batch Name</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="batch_name" id="demo"  type="text" value="<?php echo $rowActiveCourse['batch_name']; ?>" readonly="" required="">
						   	</div>
						</div>
		
						 <div class="form-group">
							<label class="control-label col-lg-4 text-right">Training / Program Name</label>
						     	<div class="col-lg-8">
				                    <select name="stud_course" id="stud_course" class="form-control requiredField" required="" >
		                                <option value="">-- Course Name --</option>
		                                <?php $select_cource="SELECT * FROM `tbl_course` WHERE `status`='1'";
		                                $res_select = mysqli_query($conn, $select_cource);
		                                while($row=mysqli_fetch_assoc($res_select)){?>
		                                <option value="<?=$row['sl_no']?>" <?php if($rowActiveCourse['course_id']==$row['sl_no']){echo "selected"; } ?> ><?=$row['course_name']?></option>
		                                <?php }?>
		                           </select>
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">No Of Seats</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="no_of_sheet" id="demo" type="number" min="2"  readonly="" required=""  value="<?php echo $rowActiveCourse['no_of_sheet']; ?>">
						   	</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Remaining Seats</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="remain_seat" id="demo"  type="number" readonly=""  required="" value="<?php echo $rowActiveCourse['remain_seat']; ?>">
						   	</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Starting Time</label>
						  	<div class="col-lg-8">
						  		<div class="input-group clockpicker p-t-20">
								
								<input class="form-control" name="start_time" value="<?php echo $rowActiveCourse['start_time']; ?>"  placeholder="" type="text">
								<span class="input-group-addon"><i class="icon-alarm"></i></span>
							</div>
								
						   	</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Ending Time</label>
						  	<div class="col-lg-8">
						  		<div class="input-group clockpicker p-t-20">
								
								<input class="form-control" name="end_time" value="<?php echo $rowActiveCourse['end_time']; ?>" placeholder="" type="text">
								<span class="input-group-addon"><i class="icon-alarm"></i></span>
							</div>
							
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Venue</label>
						  	<div class="col-lg-8">
								<input class="form-control datepicker-here" name="venue" id="venue" type="text" required="" value="<?php echo $rowActiveCourse['venue']; ?>">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Days</label>
						  	<div class="col-lg-8">
						  		<?php  
						  			 	$days_ids=unserialize($rowActiveCourse['days']);
						  			 	$days = array();
										for ($i = 0; $i < 7; $i++) {
								        	$days[$i]=$day_week = jddayofweek($i,1);
								        	if(in_array($day_week,$days_ids)){?>
								        		<label class="checkbox-inline checkbox-right">
													<input checked="checked" class="roomselect" name="days[]" value="<?=$day_week?>" type="checkbox">
												<?=$day_week?>
												</label>     	
								        	<?php
								        	}else{?>
								        	<label class="checkbox-inline checkbox-right">
											<input  class="roomselect" name="days[]" value="<?=$day_week?>" type="checkbox">
												<?=$day_week?>
										</label>

								        <?php	} 

								        }
      
						  		?>
								
						   	</div>
						</div>
						
						
                        </fieldset>
						
						
						
						</fieldset>



					   <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info"  value="Update" onclick="check_days_selected()">
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
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
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
			 	return true;
			 }
		}

	
</script>