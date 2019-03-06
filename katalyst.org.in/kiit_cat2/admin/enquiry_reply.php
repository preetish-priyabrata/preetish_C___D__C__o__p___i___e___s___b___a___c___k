<?php
session_start();
ob_start();
// print_r($_SESSION);
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Respose To Enquiry";
// Array ( [Enquiry] => LmNd6rp4dC/GTDv7ecE1ykwGm39zjc/PGMqixgmSxe4= ) 
	$enquiry = str_replace(" ", "+", $_GET['enquiry']);
    $enquiry_id = decryptIt_webs($enquiry);
    $queryEnquiry = "SELECT * FROM `tbl_enquiry` WHERE `enquiry_status` = '1' and `enquiry_id`='$enquiry_id'";
    $resQueryEnquiry = mysqli_query($conn, $queryEnquiry);
    $rowsEnquiry = mysqli_num_rows($resQueryEnquiry);
    if ($rowsEnquiry=='1') {
    $rowEnquiry = mysqli_fetch_array($resQueryEnquiry);	
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
<!--  -->
<!-- <script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script> -->
<!-- <script type="text/javascript">
	CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others', groups: [ 'others' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Underline,Subscript,Superscript,Source,Image';
};
</script> -->
<!-- <script src="../asserts/js/ckeditor.js/ckeditor.js"></script> -->
<!-- <script src="../asserts/ckeditor/ckeditor.js"></script> -->
<!--Page Header-->
<script src="../asserts/ckeditor1/samples/js/sample.js"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'messsge_ids');
	</script>
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Reply For Enquiry </div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>View Enquiry List</li>
				<li class="active">Reply For Enquiry  </li>
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
	 <form name="myFunction" class="form-horizontal" action="enquiry_reply_save.php" method="POST">
 <div class="container-fluid page-content">
	<div class="row">
	  <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
		 <div class="panel panel-default">
		   <div class="panel-heading">
			 <div class="panel-title">Enquiry Details</div>
			   </div>
			     <div class="panel-body">
				   <input type="hidden" name="Enquiry" value="<?php echo $enquiry_id; ?>">
					   	<fieldset id="module2"> <b>Enquiry Details</b>
						  	<div class="form-group">
								<label class="control-label col-lg-4 text-right">Student Name</label>
							  	<div class="col-lg-8">
									<input class="form-control" readonly="" name="EnquiryName" id="demo" placeholder="Enter Enquiry Name"  value="<?php echo $rowEnquiry['student_name']; ?>" type="text" required="">
							   	</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Email Id</label>
							  	<div class="col-lg-8">
									<input class="form-control"  name="Email_id" id="demo" value="<?php echo $rowEnquiry['student_email']; ?>"  type="text" readonly>
							   	</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Roll Number</label>
							  	<div class="col-lg-8">
							  		<input class="form-control"  name="student_roll" id="demo" value="<?php echo $rowEnquiry['student_roll']; ?>"  type="text" readonly>
									 <!-- <textarea name="roll_no" class="form-control" required=""><?php echo $rowEnquiry['student_roll']; ?></textarea> -->
							   	</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Mobile Number</label>
							  	<div class="col-lg-8">
							  		<input class="form-control"  name="student_phone" id="demo" value="<?php echo $rowEnquiry['student_phone']; ?>"  type="text" readonly>
									 <!-- <textarea name="roll_no" class="form-control" required=""><?php echo $rowEnquiry['student_roll']; ?></textarea> -->
							   	</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Enquiry Details</label>
							  	<div class="col-lg-8">
							  		<textarea name="student_query" class="form-control" readonly="" required=""><?php echo $rowEnquiry['student_query']; ?></textarea>
							   	</div>
							</div>
						</fieldset>
						<fieldset id="module1"><b>Reply Message </b>
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Message</label>
							  	<div class="col-lg-8">
							  		<!-- <textarea name="messsge_ids" id="messsge_ids" class="form-control " required=""><?php echo $rowEnquiry['student_query']; ?></textarea> -->
							  		<textarea class="ckeditor"  name="editor" id="editor" rows="4" cols="4" style="visibility: hidden; display: none;">
							  		</textarea>
							   	</div>

							</div>
						</fieldset>
						
						
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
?>
<!-- <script type="text/javascript">
	CKEDITOR.replace( 'messsge_ids',{
	config.toolbar = [
		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'editing', items: [ 'Scayt' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
		{ name: 'insert', items: [ 'Table', 'HorizontalRule', 'SpecialChar' ] },
		{ name: 'tools', items: [ 'Maximize' ] },	
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
		{ name: 'styles', items: [ 'Styles', 'Format' ] },
		{ name: 'about', items: [ 'About' ] }
	];
}		
		
	);
// 	CKEDITOR.editorConfig = function( config ) {
// 	config.removeButtons = 'Underline,Subscript,Superscript,Image,Source';
// };
// 	CKEDITOR.editorConfig = function( config ) {
// 	config.toolbarGroups = [
// 		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
// 		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
// 		{ name: 'links', groups: [ 'links' ] },
// 		{ name: 'insert', groups: [ 'insert' ] },
// 		{ name: 'forms', groups: [ 'forms' ] },
// 		{ name: 'tools', groups: [ 'tools' ] },
// 		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
// 		{ name: 'others', groups: [ 'others' ] },
// 		'/',
// 		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
// 		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
// 		{ name: 'styles', groups: [ 'styles' ] },
// 		{ name: 'colors', groups: [ 'colors' ] },
// 		{ name: 'about', groups: [ 'about' ] }
// 	];

// 	config.removeButtons = 'Underline,Subscript,Superscript,Image,Source';
// };
</script> -->