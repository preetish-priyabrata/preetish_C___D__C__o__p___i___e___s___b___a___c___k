<?php
// print_r($_REQUEST);
// exit;
session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// Array ( [sl] => QsElIgBFgovouky/5NjKGLud1V2ZSAxZp1TjbFA8Ags= [moduleNumber] => elNJI1/kp2L4B6YtZwFSorrTgv3OmgM97Ixoa2PbgVc= ) 
$sl=decryptIt_webs(str_replace(" ", "+", $_GET['sl']));
$moduleNumber=decryptIt_webs(str_replace(" ", "+", $_GET['moduleNumber']));
$title="Add Modules Associated With The Course";
?>
<style type="text/css">
	fieldset {
    border: 1px solid #77ed99;
    margin: 4px 2px;
    padding: 1.35em .625em .75em;
}
</style>
<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add Modules Associated With The Programs</div>
		    <ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Programs</li>
				<li class="active">Add Modules Associated With The Programs</li>
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
			 <div class="panel-title">Add Modules Associated With The Programs</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="course_details_module_save.php" method="POST">
				   <input type="hidden" name="Course" value="<?php echo $sl; ?>">
				   	<?php
                    for ($count = 0; $count < $moduleNumber; $count++) {
                        ?>
                        <fieldset><b>[Module <?php echo $count + 1; ?>]</b>
						  	<div class="form-group">
								<label class="control-label col-lg-4 text-right">Module Name <b>[Module <?php echo $count + 1; ?>]</label>
							  	<div class="col-lg-8">
									<input class="form-control" name="moduleName[]" id="demo" placeholder="Enter Module Name" type="text" >
							   	</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">No Of Session <b>[Module <?php echo $count + 1; ?>]</label>
							  	<div class="col-lg-8">
									<input class="form-control" name="session_event[]" id="demo" placeholder="Enter No Of Session" type="text" >
							   	</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Description of <b>[Module <?php echo $count + 1; ?>]</b></label>
							  	<div class="col-lg-8">
									<!-- <textarea name="moduleDescription[]" class="form-control" ></textarea> -->
									<textarea class="ckeditor"  name="editor[]" id="editor[]" rows="4" cols="4" style="visibility: hidden; display: none;">
							  		</textarea>
							   	</div>
							</div>
						
						</fieldset>
						<?php }?>
					   <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info"  value="Save" onclick="myFunction()">
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