<?php
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
require '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Tech";
 // Array ( [u_slno] => 1 [unq_id] => user_001 [u_status] => 0 )
$u_slno=$_SESSION['u_slno'];

?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
			<ul class="breadcrumb">
				<li><a href="#"></a></li>
				
				<li class="active">Change Password </li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
		<?php $msg->display(); ?>
			
			<div class="col-md-12 col-sm-12">
		  	<!-- Basic inputs -->
			 <div class="panel panel-default">
			   <div class="panel-heading">
				 <div class="panel-title">Change Password </div>
				   </div>
				   <form name="myFunction" class="form-horizontal" action="Change_password_save.php" method="POST" >
				     <div class="panel-body">
					   	
					   		<input type="hidden" name="form_type" value="<?=web_encryptIt('report3')?>">

					   		<input type="hidden" name="u_slno" value="<?=$u_slno?>">

					   		
					   		<div class="row">
					   		<div class="col-lg-6">
						   	 <div class="form-group">
								    <label class="control-label col-lg-4 text-right">Old Password :</label>
								    <div class="col-lg-8">
								

									<input type="Password" name="old_password" id="old_password" class="form-control" placeholder="Please Enter Password" required  />
							   </div>
							</div>
							
							</div>
					   		<div class="col-lg-6">
						   	 <div class="form-group">
								    <label class="control-label col-lg-4 text-right">Password :</label>
								    <div class="col-lg-8">
								

									<input type="Password" name="new_password" id="new_password" class="form-control" placeholder="Please Enter Password" required  />
							   </div>
							</div>
							
							</div>
							
							
						</div>
						
						
					   	
			   		</div>
			   		<div class="panel-footer">
			   			<div class="pull-left">
        					<a href="index.php" class="btn btn-success">Back</a>
        				</div>
        				<div class="pull-right">
        					 <input type="submit" onclick="return confirm('Are you sure . Want To Change Password?')" name="get" Value="Update Password">
        				</div>
			   		</div>
			   		</form>
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
include 'templete/header.php';

?>

