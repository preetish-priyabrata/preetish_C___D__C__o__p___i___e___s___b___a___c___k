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
$title="Edit Press Release";
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
			<div class="page-title"><i class="icon-display4"></i>Press Release</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<!-- <li><a href="#"></a>Profile Settings</li> -->
				<li class="active">Edit Press Release </li>
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
			 <div class="panel-title">Edit Press Release</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="press_release_edit_Save.php" method="POST" enctype="multipart/form-data">

				    <?php
           	   		    $query ="SELECT * FROM `gen_press_release` where `sl_no`='$sl_no'";   
             		   $query_exe = mysqli_query($conn,$query);
               			          
              		   $viewBanner = mysqli_fetch_assoc($query_exe);
              		   
             	     ?>
                      <?php $msg->display(); ?>
               
                   <input type="hidden" value="<?php echo $viewBanner['sl_no']; ?>" name="sl_no">

                   		<div class="form-group">
							<label class="control-label col-lg-4 text-right">Title</label>
						  	<div class="col-lg-8">
								<input  name="title" id="title" type="text" value="<?php echo $viewBanner['title']; ?>" class="form-control" >
					    	</div>
						</div>

					  	<div class="form-group">
							<label class="control-label col-lg-4 text-right">Short Description</label>
						  	<div class="col-lg-8">
						  		<textarea rows="3" cols="6" name="description" class="form-control" id="description" required="" ><?php echo $viewBanner['description']; ?></textarea>
							 </div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4 text-right">Photo</label>
						  	<div class="col-lg-8">
						  		<img src="../upload/<?php echo $viewBanner['photo_name']; ?>" name="photo_name" width="300px" height="200px" value="">
								<input  name="photo_name" id="photo_name" type="file" >
					    	</div>
						</div>

		   				<a href="press_release_view.php" class="btn btn-info">Back</a>
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