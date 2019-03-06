<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Edit Tranning";
// Array ( [program] => LmNd6rp4dC/GTDv7ecE1ykwGm39zjc/PGMqixgmSxe4= ) 
	$program = str_replace(" ", "+", $_GET['program']);
    $program = decryptIt_webs($program);
    $queryProgram = "SELECT * FROM `tbl_program` WHERE `program_id` = '$program'";
    $resQueryProgram = mysqli_query($conn, $queryProgram);
    $rowsProgram = mysqli_num_rows($resQueryProgram);
    if ($rowsProgram) {
    $rowProgram = mysqli_fetch_array($resQueryProgram);	
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
</style>
<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Edit Tranning</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Tranning</li>
				<li class="active">Edit Tranning </li>
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
	 <form name="myFunction" class="form-horizontal" action="manageProgram_edit_save.php" method="POST">
 <div class="container-fluid page-content">
	<div class="row">
	  <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
		 <div class="panel panel-default">
		   <div class="panel-heading">
			 <div class="panel-title">Edit Training</div>
			   </div>
			     <div class="panel-body">
				    <input type="hidden" name="program" value="<?php echo $program; ?>">
					   	<fieldset id="module2"> <b>Program Details</b>
						  	<div class="form-group">
								<label class="control-label col-lg-4 text-right">Training/Program Name</label>
							  	<div class="col-lg-8">
									<input class="form-control" name="programName" id="demo" placeholder="Enter Training/Program Name"  value="<?php echo $rowProgram['program_name']; ?>" type="text" required="">
							   	</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Commencement date</label>
							  	<div class="col-lg-8">
									<input class="form-control datepicker-here" data-language='en' name="programDate" id="demo" value="<?php echo $rowProgram['commence_date']; ?>" placeholder="Commencement date" type="text" required="">
							   	</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Eligibility </label>
							  	<div class="col-lg-8">
									 <textarea name="eligibility" class="form-control" required=""><?php echo $rowProgram['eligibility']; ?></textarea>
							   	</div>
							</div>
							<!-- <div class="form-group">
								<label class="control-label col-lg-4 text-right">No of Module </label>
							  	<div class="col-lg-8">
									 <input class="form-control" name="moduleNumber" id="demo" placeholder="Enter No of Module" type="text" required="">
							   	</div>
							</div> -->
						</fieldset>
						<fieldset id="module1"><b>Modules Details</b>
						<?php
                    		$queryProgramModule = "SELECT * FROM `tbl_program_module` WHERE `program_id` = '$program' ORDER BY module_id";
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
								<label class="control-label col-lg-4 text-right">Description of <b>[Module <?php echo $count ; ?>]</b></label>
							  	<div class="col-lg-8">
									<textarea name="moduleDescription[]" class="form-control"><?php echo $rowResModule['module_description']; ?></textarea>
							   	</div>
							</div>
							<!-- <div class="form-group">
								<label class="control-label col-lg-4 text-right">Eligibility </label>
							  	<div class="col-lg-8">
									 <textarea name="eligibility" class="form-control" required=""></textarea>
							   	</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">No of Module </label>
							  	<div class="col-lg-8">
									 <input class="form-control" name="moduleNumber" id="demo" placeholder="Enter No of Module" type="text" required="">
							   	</div>
							</div> -->
						</fieldset>
						<?php }?>
						
						</fieldset>
					   <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info"  value="Save" onclick="myFunction()">
				   </div>				 
			   </div>
			 </div>						
		   </div>
		 </div>
	   </div>
</form>

<?php
}else{
	$msg->error('Something Went Wrong');
	header('Location:admin_dashboard.php');
	exit;
}
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';