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
    $status_id=decryptIt_webs(str_replace(" ", "+",$_GET['status']));
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
			<div class="page-title"><i class="icon-display4"></i>View Batch Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Batch</li>
				<li><a href="#"></a>View Batch List</li>
				<li class="active"><a href="#"></a>View Batch Details</li>
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
					    <div class="panel-title">View Batch Details</div>
					</div>
					<div class="panel-body">
					<form name="myFunction" class="form-horizontal" action="#" autocomplete="off">
						 
						 <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
						<fieldset id="module2"> <b>Batch Details</b>
					  
					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Batch Name</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="batch_name" id="demo" readonly=""  type="text" value="<?php echo $rowActiveCourse['batch_name']; ?>" required="">
						   	</div>
						</div>
		
						 <div class="form-group">
							<label class="control-label col-lg-4 text-right">Training / Program Name</label>
						  	<div class="col-lg-8">
						  		<?php $course_id=$rowActiveCourse['course_id']; 
						  		 $course_list="SELECT * FROM `tbl_course` WHERE `sl_no`='$course_id'";
						  		$sql_exe_course=mysqli_query($conn,$course_list);
						  		$res_course=mysqli_fetch_assoc($sql_exe_course);
						  		?>
								<input class="form-control" name="price" id="demo" type="text" min="50" required="" readonly="" value="<?=$res_course['course_name']?>">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">No Of Seats</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="no_of_sheet" id="demo" type="number" min="2" required="" readonly="" value="<?php echo $rowActiveCourse['no_of_sheet']; ?>">
						   	</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Remaining Seats</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="remain_seat" id="demo"  type="text" required="" readonly="" value="<?php echo $rowActiveCourse['remain_seat']; ?>">
						   	</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Starting Time</label>
						  	<div class="col-lg-8">
								<input class="form-control datepicker-here" name="start_time" id="Starting_date" type="text"" required="" readonly="" value="<?php echo $rowActiveCourse['start_time']; ?>">
						   	</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Ending Time</label>
						  	<div class="col-lg-8">
								<input class="form-control datepicker-here" name="end_time" id="end_time"  type="text" required="" readonly="" value="<?php echo $rowActiveCourse['end_time']; ?>">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Venue</label>
						  	<div class="col-lg-8">
								<input class="form-control datepicker-here" name="venue" id="venue" type="text" required="" readonly="" value="<?php echo $rowActiveCourse['venue']; ?>">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Days</label>
						  	<div class="col-lg-8">
						  		<?php $days=unserialize($rowActiveCourse['days']); 
						  			for ($i=0; $i < count($days); $i++) { ?>
						  				<label class="control-label col-lg-4"><?=$days[$i]?></label>
						  			<?php	
						  			}
						  		?>
								
						   	</div>
						</div>
						
						
                        </fieldset>
						
						
						
						</fieldset>



					   <div class="form-group pull-left">
					 <?php
					 if($status_id==3){?>
					 <a href="add_batch_view_ongoing.php" class="btn btn-info" onclick="myFunction()">Back</a>
					 
					 <?php }else if ($status_id==2) {?>
					 	<a href="add_batch_view_complete.php" class="btn btn-info" onclick="myFunction()">Back</a>
					<?php  }else if($status_id==1){ ?>
						<a href="add_batch_view.php" class="btn btn-info" onclick="myFunction()">Back</a>
					<?php }else if ($status_id==4) {?>
					 	<a href="report_ongoing_program_inhouse.php" class="btn btn-info" onclick="myFunction()">Back</a>
					<?php  }else if($status_id==5){ ?>
						<a href="report_ongoing_program_vendor.php" class="btn btn-info" onclick="myFunction()">Back</a>
					<?php }else if ($status_id==6) {?>
					 	<a href="report_completed_program_inhouse.php" class="btn btn-info" onclick="myFunction()">Back</a>
					<?php  }else if($status_id==7){ ?>
						<a href="report_completed_program_vendor.php" class="btn btn-info" onclick="myFunction()">Back</a>
						<?php }?>

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
