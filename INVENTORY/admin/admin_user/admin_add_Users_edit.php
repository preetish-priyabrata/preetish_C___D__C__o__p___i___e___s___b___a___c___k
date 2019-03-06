<?php

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
$title="Creation Of System User Form Of L&T";
$u_slno=$_GET['u_slno'];
?>
	<!--Page Header-->
 <div class="header">
	 <div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Edit User Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>User Information</li>
				<li class="active">Edit User Details</li>
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
			 <div class="panel-title">Edit User Details Form</div>
			   </div>
			     <div class="panel-body">
				    <form name="myFunction" class="form-horizontal" action="admin_add_Users_edit_save.php" method="POST">

	                   <?php
		               $query ="SELECT * FROM `lt_master_user_system` where `u_slno`='$u_slno'";   
		               $query_exe = mysqli_query($conn,$query);
		               if(mysqli_num_rows($query_exe)){          
		               $rec = mysqli_fetch_array($query_exe);
		               ?>

						<input type="hidden" class="form-control" name="u_slno" value="<?php echo $rec['u_slno'];?>" >
						 
                        <div class="form-group">
						    <label class="control-label col-lg-4 text-right">Name</label>
						    <div class="col-lg-8">
								 <input type="text" class="form-control" name="user_name" value="<?php echo strtoupper($rec['user_name']);?>" >
						   </div>
						</div>
			
						<div class="form-group">
						    <label class="control-label col-lg-4 text-right">Designation</label>
						    <div class="col-lg-8">
								 <input type="text" class="form-control" name="user_designation" value="<?php echo strtoupper($rec['user_designation']);?>" >
						   </div>
						</div>
						<div class="form-group">
						    <label class="control-label col-lg-4 text-right">Date Of Birth</label>
						    <div class="col-lg-8">
								<input type="text" class='form-control datepicker-here' data-language='en' name="dob" id="dob" placeholder="Enter Date of Birth" autocomplete="off" value="<?php echo strtoupper($rec['user_dob']);?>" required="">
						   </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-lg-4 text-right">Mobile No</label>
						    <div class="col-lg-8">
								 <input type="text" class="form-control" name="user_mobile" value="<?php echo strtoupper($rec['user_mobile']);?>" >
						   </div>
						</div>

					  	<div class="form-group">
						  <label class="control-label col-lg-4 text-right"> User Role</label>
						  	<div class="col-lg-8">
								<select class="form-control" name="user_role" onchange="get_role_details()" id="user_role" type="dropdown" required="">
								    <option value="">--Select  User Role--</option>
								    <option value="1">HEADQUARTER STORE</option>
								    <option value="2">APPROVER</option>
								    <option value="3">SITE STORE</option>
								    <option value="4">FIELD STORE</option>	
								</select>
						   	</div>
						 </div>

						<div class="form-group">
						    <label class="control-label col-lg-4 text-right">HeadQuarter</label>
						    <div class="col-lg-8">
								<select name="headquarter" onchange="detail_site_store()" id="headquarter" class="form-control" type="dropdown" required="">
									<option value="">--Select HeadQuarter--</option>
									<?php 
										$query_sql="SELECT * FROM `lt_master_hq_place` WHERE `status`=1";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        						
	        						?>
	        							<option value="<?=$result['hq_code']?>"><?=strtoupper($result['hq_name'])?></option>
	        						<?php }?>
								</select>
						   </div>
						 </div>
						 <div id="show_site_store">
						<!--  <span id="show_site_store"></span> -->

						 </div>
                      	 <br>
						   <?php  
       					     
         					 }
          				  ?>
					 
					      	<a href="admin_add_Users_view.php" class="btn btn-info"  value="Back" onclick="myFunction()">Back</a>
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
$contents = ob_get_contents();
ob_clean();
include 'templete/header.php';

?>
 	<script src="../asserts/lib/js/forms/datepicker.min.js"></script>
	<script src="../asserts/lib/js/forms/datepicker.en.js"></script>
	<script src="../asserts/lib/js/pages/forms/picker_date.js"></script>
	<script type="text/javascript">
	// here role 
		function get_role_details(){
			var user_role=$('#user_role').val();			
			if(user_role=='3' || user_role=='4'){
				detail_site_store();
			}else if(user_role=='1' || user_role=='2'){
				if(document.getElementById("site_store_name") == null){

				}else{
					document.getElementById('site_store_name').value = '';
       				document.getElementById("site_store_name").removeAttribute("required");
       				$("#show_site_store").hide(1000);
				}
				if(document.getElementById("site_field_name") == null){

				}else{
					document.getElementById('site_field_name').value = '';
       				document.getElementById("site_field_name").removeAttribute("required");
				
					$("#show_field_store").hide(1000); 
				}
			}else{
				if(document.getElementById("site_store_name") == null){

				}else{
					document.getElementById('site_store_name').value = '';
       				document.getElementById("site_store_name").removeAttribute("required");
       				$("#show_site_store").hide(1000);
				}
				if(document.getElementById("site_field_name") == null){

				}else{
					document.getElementById('site_field_name').value = '';
       				document.getElementById("site_field_name").removeAttribute("required");
				
					$("#show_field_store").hide(1000); 
				}
				
       			
			}
		}
		function detail_site_store(){
			var hq_code=$('#headquarter').val();
			var user_role=$('#user_role').val();
				
			if(hq_code!="" && (user_role=='3' || user_role=='4')){
				if(document.getElementById("site_store_name") == null){
					$("#show_field_store").hide(1000); 
				}else{
					document.getElementById('site_store_name').value = '';
       				document.getElementById("site_store_name").removeAttribute("required");				
					$("#show_site_store").hide(1000);
				}
				if(document.getElementById("site_field_name") == null){
					$("#show_field_store").hide(1000); 
				}else{
					document.getElementById('site_field_name').value = '';
       				document.getElementById("site_field_name").removeAttribute("required");				
					$("#show_field_store").hide(1000); 
				}
				
				$.ajax({
		          	type:'POST',
		          	url:'admin_get_zonal_details_select.php',
		          	data:'hq_id='+hq_code,
		          	success:function(html){
		            	  // $remove_display
		             	// $("#remove_display").remove();
		             	 $("#show_site_store").show(1000);
		              	$('#show_site_store').html(html);
		             
		          	}
	      		}); 
			}else{
				if(document.getElementById("site_store_name") == null){
					$("#show_field_store").hide(1000); 
				}else{
					document.getElementById('site_store_name').value = '';
       				document.getElementById("site_store_name").removeAttribute("required");				
					$("#show_site_store").hide(1000);
				}
				if(document.getElementById("site_field_name") == null){
					$("#show_field_store").hide(1000); 
				}else{
					document.getElementById('site_field_name').value = '';
       				document.getElementById("site_field_name").removeAttribute("required");				
					$("#show_field_store").hide(1000); 
				}
			}
		}
	</script>