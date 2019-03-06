<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if (($_SESSION['userId']!="")) {
//require 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
require 'config.php';
$title="Edit Banner";
$sl_no = $_GET['sl_no'];
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
			<div class="page-title"><i class="icon-display4"></i>Manage Banner</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<!-- <li><a href="#"></a>Profile Settings</li> -->
				<li class="active">Edit Banner </li>
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
			 <div class="panel-title">Edit Banner</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="interview_edit_save.php" method="POST">


				    <?php
           	   		    $query ="SELECT * FROM `gen_interview` where `sl_no`='$sl_no'";   
             		   $query_exe = mysqli_query($conn,$query);
               			          
              		   $viewBanner = mysqli_fetch_assoc($query_exe);
              		   
             	     ?>
                     <?php $msg->display(); ?>
               
                	   <input type="hidden" value="<?php echo $viewBanner['sl_no']; ?>" name="sl_no">

                   	   <div class="form-group">
							<label class="control-label col-lg-4 text-right">Title</label>
						  	<div class="col-lg-8">
						  		
						  		<input  name="title" id="title" class="form-control" placeholder="Enter Title"  type="text" value="<?php echo $viewBanner['title']; ?>"  required="" >
								
						   	</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4 text-right">URL</label>
						  	<div class="col-lg-8">
								<input  name="url" id="url"  type="text" placeholder="Enter Url"  class="form-control" required="" value="<?php echo $viewBanner['url']; ?>">
						   	</div>
						</div>

					  	
		   				<a href="interview_view.php" class="btn btn-info">Back</a>
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
 }
else{
header('Location:logout.php');
exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>