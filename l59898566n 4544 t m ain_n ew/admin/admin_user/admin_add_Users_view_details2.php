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
			<div class="page-title"><i class="icon-display4"></i>View User Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>User Information</li>
				<li class="active">View User Details</li>
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
			 <div class="panel-title">View User Details Form</div>
			   </div>
			     <div class="panel-body">
				    <form name="myFunction" class="form-horizontal" action="admin_add_Users_edit_save.php" method="POST">

	                <?php 
	        					
	        			$x=0;
	        			$query_sql="SELECT * FROM `lt_master_user_system` WHERE `u_status`!='0' and `u_slno`='$u_slno'";
	        			$sql_exe=mysqli_query($conn,$query_sql);
	        			$result=mysqli_fetch_assoc($sql_exe);
	        			$x++;
	        		    ?>
                        <div class="form-group">
						    <tr class="control-label col-lg-4 text-right">
						      <td><b>Name</b></td>
						      <td>:</td>
                              <td><?php echo $result['user_name'];?></td>			
						    </tr>					
						</div>

						<div class="form-group">
						    <tr class="control-label col-lg-4 text-right">
						   	  <td><b>Email</b></td>
						      <td>:</td>
						      <td><?php echo $result['user_email'];?></td>
						    </tr>  
						</div>

						<div class="form-group">
						    <tr class="control-label col-lg-4 text-right">
						      <td><b>Date Of Birth</b></td>
						      <td>:</td>
							  <td><?php echo $result['user_dob'];?></td>
							</tr>
						</div>
			
						<div class="form-group">
						    <tr class="control-label col-lg-4 text-right">
						      <td><b>Designation</b></td>
						      <td>:</td>
							  <td><?php echo $result['user_designation'];?></td>
						    </tr>
						</div>

				    	<div class="form-group">
						  <tr class="control-label col-lg-4 text-right">
						    <td><b> User Role</b> </td>
						    <td>:</td>
						  	<td>
						  	<?php 
			        			    if($result['user_level']=='1'){
			        					echo "HeadQuater User";
			        				}
			        				if($result['user_level']=='2'){
			        				    echo "Approver User";
			        			    }
			        			    if($result['user_level']=='3'){
			        				    echo "Site Store User";
			        			    }
			        			    if($result['user_level']=='4'){
			        					echo "Field Store User";
			        			    }
		        			 ?>
						    </td>
						  </tr>
				        </div>

					    <div class="form-group">
						    <tr class="control-label col-lg-4 text-right">
						       <td><b>Mobile No</b></td>
						       <td>:</td>
						       <td><?php echo $result['user_mobile'];?></td>
						   </tr>
						</div>

						 <?php
						 	$user_level=$result['user_level'];
						 	switch ($user_level) {
						 		case '1':
						 			?>
						 				<div class="form-group">
										   <tr class="control-label col-lg-4 text-right">
										     <td><b>Head Quater</b></td>
										     <td>:</td>
										     <td><?php echo $result['hq_store_id'];?></td>
										   </tr>
										</div>
										
						 			<?php
						 			break;
						 		case '2':
						 			?>
						 				<div class="form-group">
										   <tr class="control-label col-lg-4 text-right">
										     <td><b>Head Quater</b></td>
										     <td>:</td>
										     <td><?php echo $result['hq_store_id'];?></td>
										   </tr> 
										</div>
										 
						 			<?php
						 			break;
						 		case '3':
						 			?>
						 				<div class="form-group">
										   <tr class="control-label col-lg-4 text-right">
										     <td><b>Head Quater</b></td>
										     <td>:</td>
										     <td><?php echo $result['hq_store_id'];?></td>
										    </tr>
									    </div>

									    <div class="form-group">
										   <tr class="control-label col-lg-4 text-right">
										     <td><b>Site Location</b></td>
										     <td>:</td>
										     <td><?php echo $result['sub_site_store_id'];?></td>
										   </tr> 
										</div>
										
										 
						 			<?php
						 			break;
						 		case '4':
						 			?>
						 				<div class="form-group">
										   <tr class="control-label col-lg-4 text-right">
										     <td><b>Head Quater</b></td>
										     <td>:</td>
										     <td><?php echo $result['hq_store_id'];?></td>
										    </tr>
									    </div>

									    <div class="form-group">
										   <tr class="control-label col-lg-4 text-right">
										     <td><b>Site Location</b></td>
										     <td>:</td>
										     <td><?php echo $result['sub_site_store_id'];?></td>
										   </tr> 
										</div>
										<div class="form-group">
										   <tr class="control-label col-lg-4 text-right">
										     <td><b>Field Location</b></td>
										     <td>:</td>
										     <td><?php echo $result['sub_field_store_id'];?></td>
										   </tr> 
										</div>
										 
						 			<?php
						 			break;
						 		
						 		default:
						 			# code...
						 			break;
						 	}


						 ?>
						 <div class="form-group">
						    <tr class="control-label col-lg-4 text-right">
						      <td><b>Date</b></td>
						      <td>:</td>
							  <td> <?php echo $result['date'];?></td>
							</tr>
						   </div>
				    	 <div class="form-group">
						    <tr class="control-label col-lg-4 text-right">
						      <td><b>Time</b></td>
						      <td>:</td>
							  <td> <?php echo $result['time'];?></td>
							</tr>
						   </div>
						
						 <div class="form-group">
						    <tr class="control-label col-lg-4 text-right">
						      <td><b>Status</b></td>
						      <td>:</td>
							  <td><?php echo $result['u_status'];?></td>
						   </tr>
						</div>
						
						 <br>
					 
					      	
					   	  	<div class="form-group pull-left">
					    	<!-- <input type="submit" class="btn btn-info"  value="Update" onclick="myFunction()"> -->
					    		<a href="admin_add_Users_view.php" class="btn btn-info"  value="Back" onclick="myFunction()">Back</a>
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