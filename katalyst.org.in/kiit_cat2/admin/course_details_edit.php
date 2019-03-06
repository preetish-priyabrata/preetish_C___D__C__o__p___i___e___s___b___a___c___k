<?php

session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
	require 'config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Edit Course List";
 	$course = str_replace(" ", "+", $_GET['course']);
    $course_id = decryptIt_webs($course);
    $queryActiveCourse = "SELECT * FROM `tbl_course` WHERE `sl_no` = '$course_id' ";
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
			<div class="page-title"><i class="icon-display4"></i>Edit Programs Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Programs</li>
				<li><a href="#"></a>Edit Programs List</li>
				<li class="active"><a href="#"></a>Edit Programs Details</li>
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
					    <div class="panel-title">Edit Programs Details</div>
					</div>
					<div class="panel-body">
					    <form name="myFunction" class="form-horizontal" action="course_details_edit_Save.php" method="POST" autocomplete="off">
						<input type="hidden" name="course_id" value="<?php echo $course_id; ?>">

						<fieldset id="module2"> <b>Programs Details</b>

					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Programs Name</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="course_name" id="demo" placeholder="Enter Programs Name" type="text" value="<?php echo $rowActiveCourse['course_name']; ?>" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Description Of Programs</label>
						  	<div class="col-lg-8">
								
								<textarea  class="ckeditor"  name="editors" id="editors" rows="4" cols="4" style="visibility: hidden; display: none;"><?php echo $rowActiveCourse['course_descriptn']; ?></textarea>
						   	</div>
						 </div>

						 <div class="form-group">
							<label class="control-label col-lg-4 text-right">Price</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="price" id="demo" placeholder="Enter Price Name" type="number" min="50" required="" value="<?php echo $rowActiveCourse['price']; ?>">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">No Of Session</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="no_of_session" id="demo" placeholder="Enter Session No" type="number" min="2" required=""  value="<?php echo $rowActiveCourse['no_of_session']; ?>">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Venue</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="venue" id="demo" placeholder="Enter Price Name" type="text" required="" value="<?php echo $rowActiveCourse['venue']; ?>">
						   	</div>
					    </div>
					    <div class="form-group">
							<label class="control-label col-lg-4 text-right">Eligibility</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="Eligibility" id="demo" placeholder="Enter Eligibility " type="text" required="" value="<?php echo $rowActiveCourse['Eligibility']; ?>">
						   	</div>
					    </div>
					    	<div class="form-group">
								<label class="control-label col-lg-4 text-right">Starting Date</label>
						  		<div class="col-lg-8">
								<input class="form-control datepicker-here" name="starting_date" id="Starting_date" placeholder="Enter Starting Date" type="text" required="" value="<?php echo $rowActiveCourse['starting_date']; ?>">
						   	</div>
					    </div>

						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Ending Date</label>
						  	<div class="col-lg-8">
								<input class="form-control datepicker-here" name="ending_date" id="ending_date" placeholder="Enter Ending Date" type="text" required="" value="<?php echo $rowActiveCourse['ending_date']; ?>">
						   	</div>
					    </div>
					 </fieldset>

					<fieldset id="module1"><b>Modules Details</b>
						<?php
                        $queryProgramModule = "SELECT * FROM `tbl_course_module` WHERE `course_id` = '$course_id' ORDER BY module_id";
                        $resQueryProgramModule = mysqli_query($conn, $queryProgramModule);
                        $count = 0;
                        while ($rowResModule = mysqli_fetch_array($resQueryProgramModule)) {
                        ?>
                        <fieldset id="module"><b>Module [<?php echo ++$count; ?>]</b>
						  	<div class="form-group">
								<label class="control-label col-lg-4 text-right">Module Name <b>[Module <?php echo $count ; ?>]</b></label>
							  	<div class="col-lg-8">
							  		<input type="hidden" name="moduleId[]" class="form-control" value="<?php echo $rowResModule['module_id']; ?>">
									<input class="form-control" name="moduleName[]" id="demo" placeholder="Enter Module Name" type="text" value="<?php echo $rowResModule['module_name']; ?>" >
							   	</div>
							</div>
							<div class="form-group">
							<label class="control-label col-lg-4 text-right">No Of Session [ Module <?php echo $count ; ?>]</label>
						  	<div class="col-lg-8">
								<input class="form-control datepicker-here" name="no_session_module[]" id="no_session_module" placeholder="Enter No Of Session Module" type="text" required="" value="<?php echo $rowResModule['no_session_module']; ?>">
						   	</div>
					    </div>

						  <div class="form-group">
							   <label class="control-label col-lg-4 text-right">Description of <b>[Module <?php echo $count; ?>]</b></label>
							     <div class="col-lg-8">
								 <textarea  class="ckeditor"  name="editor[]" id="editor[]" rows="4" cols="4" style="visibility: hidden; display: none;"><?php echo $rowResModule['module_description']; ?></textarea>
							  </div>
						  </div>
						 
						</fieldset>
						<?php }?>
						
						</fieldset>

						 <div class="form-group pull-right">
					 		 <input type="submit" class="btn btn-info"  value="Update" onclick="myFunction()">
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
