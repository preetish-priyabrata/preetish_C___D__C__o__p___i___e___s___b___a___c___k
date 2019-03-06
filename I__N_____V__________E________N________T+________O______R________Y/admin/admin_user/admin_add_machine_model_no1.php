<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
 $title="Add New Machine Category";
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Add New Machine Category</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Location</li>
				<li class="active">Add New Model No</li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
 <div class="container-fluid page-content">
	<div class="row">
	  <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
		 <div class="panel panel-default">
		   <div class="panel-heading">
			 <div class="panel-title">Add Machine Category Form</div>
			   </div>
			     <div class="panel-body">
				   <form name="myFunction" class="form-horizontal" action="admin_add_machine_model_no_save.php" method="POST">
					  <div class="form-group">
						<label class="control-label col-lg-4 text-right">Machine Category</label>
						  <div class="col-lg-8">
							<select class="form-control" name="machine_cat_id" id="demo" type="dropdown" required="">
							   <option value="">--Select Machine Category--</option>
							    <?php
                				 $query_view = "SELECT  * FROM `lt_master_machine_category`";
                  				 $exe_vieew = mysqli_query($conn,$query_view);
                				 if($exe_vieew){                
                  				 while($rec = mysqli_fetch_array($exe_vieew)){?>
                    			 <option value="<?php echo $rec['machine_cat_id'];?>"><?=$rec['machine_cat_id'];?></option>
             					 <?php }
               						   }else{?>
                    			 <option value="">No Data is Present</option>
                 				 <?php }
             					 ?> 
							 </select>
						   </div>
						 </div>
						 <div class="form-group">
						  <label class="control-label col-lg-4 text-right">Model No</label>
						    <div class="col-lg-8">
							 <textarea class="form-control" name="model_no" id="demo" placeholder="Enter Model No" required=""></textarea>
						   </div>
						 </div>
					   <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info"  value="Ok" onclick="myFunction()">
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
include 'templete/header.php';

?>
