<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if (($_SESSION['L_student_roll']!="")) {
require 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
//include 'config.php';
$title="Update Profile";
$L_slno = $_GET['L_slno'];
//$L_slno = decryptIt_webs($L_slno);
?>
<style type="text/css">
	.form-control[disabled], .form-control[readonly] {
    color: #223135;
}
</style>
<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Change Student Password</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<!-- <li><a href="#"></a>Profile Settings</li> -->
				<li class="active">Change Password </li>
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
			 <div class="panel-title">Change Password</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="stud_change_password_save.php" method="POST">

				    <?php
           	   		  	 $query ="SELECT * FROM `tbl_login_student` where `L_student_roll`='$_SESSION[L_student_roll]'";   
             		 	 $query_exe = mysqli_query($conn,$query);
               			 $rec = mysqli_fetch_array($query_exe);
             	   	?>
                   		 <?php $msg->display(); ?>
               
                      <input type="hidden" value="<?php echo $rec['L_slno']; ?>" name="L_slno">

					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Old Password</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="old_pwd" id="demo"  type="text" placeholder="Enter Old Password" required="">
						   	</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4 text-right">New Password</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="new_pwd" id="demo"  type="text" placeholder="Enter New Password" required="">
						   	</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Confirm Password</label>
						  	<div class="col-lg-8">
								<input class="form-control" name="con_pwd" id="demo" placeholder="Enter Confirm Password" type="text" required="">
						   	</div>
						</div>	

					   <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info"  value="Update" onclick="myFunction()">
				   </div>
				 </form>
			   </div>
			 </div>						
		   </div>
		 </div>
	   </div>
	   <?php }else{
header('Location:logout.php');
exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>