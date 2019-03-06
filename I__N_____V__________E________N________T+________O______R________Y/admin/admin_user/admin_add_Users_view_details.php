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
<style type="text/css">

.panel-body p {
    /*margin-top: 10px;
    font-size: 2pc;*/
    margin-top: 0.5pc;
    font-size: 1pc;
}
</style>
	     <!--Page Header-->
		 <div class="header">
			 <div class="header-content">
					<div class="page-title"><i class="icon-display4"></i>View User Details</div>
					<ul class="breadcrumb">
						<li><a href="admin_dashboard.php"></a></li>
						<li><a href="#"></a>User Information</li>
						<li><a href="#"></a>View User List</li>
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
					        	<div class="col-lg-6">
			        		    	<div class="form-group">
									    <label class="control-label col-lg-4 text-right"><h4><b>Name : </b> </h4></label>
									    <div class="col-lg-8">
											<p > <?php echo strtoupper($result['user_name']) ;?></p>
									   </div>
									</div>
							    </div>

			        		    <div class="col-lg-6">
			        		    	<div class="form-group">
									    <label class="control-label col-lg-4 text-right"><h4><b>Email : </b></h4></label>
									    <div class="col-lg-8">
											<p><?php echo strtoupper($result['user_email']) ;?> </p>
									   </div>
									</div>
							     </div>

			        		    <div class="col-lg-6">
			        		    	<div class="form-group">
									    <label class="control-label col-lg-4 text-right"><h4><b>Date Of Birth : </b></h4> </label>
									    <div class="col-lg-8">
											<p> <?php echo strtoupper($result['user_dob']) ;?> </p>
									   </div>
									</div>
							    </div>

			        		    <div class="col-lg-6">
			        		    	<div class="form-group">
									    <label class="control-label col-lg-4 text-right"><h4><b>Designation : </b></h4></label>
									    <div class="col-lg-8">
											<p><?php echo strtoupper( $result['user_designation']) ;?> </p>
									   </div>
									</div>
			        		    </div>
	        	
			        		    <div class="col-lg-6">
			        		    	<div class="form-group">
									    <label class="control-label col-lg-4 text-right"><h4><b>User Role : </b></h4> </label>
									    <div class="col-lg-8">
										<p> 
										<?php 
					        			    if(strtoupper($result['user_level'])=='1'){
					        					echo "HeadQuater User";
					        				}
					        				if(strtoupper($result['user_level'])=='2'){
					        				    echo "Approver User";
					        			    }
					        			    if(strtoupper($result['user_level'])=='3'){
					        				    echo "Site Store User";
					        			    }
					        			    if(strtoupper($result['user_level'])=='4'){
					        					echo "Field Store User";
					        			    }
				        			 ?>   
				        			    </p>
									   </div>
									</div>
								</div>

			        		     <div class="col-lg-6">
			        		    	<div class="form-group">
									    <label class="control-label col-lg-4 text-right"><h4><b>Mobile No : </b></h4></label>
									    <div class="col-lg-8">
											<p> <?php echo strtoupper($result['user_mobile']) ;?> </p>
									   </div>
									</div>
							    </div>

					  	     <?php
					        //   //hq
					  	     // $query_sql="SELECT * FROM `lt_master_HQ_place` WHERE `hq_code`=1";
	        				//  $sql_exe=mysqli_query($conn,$query_sql);
			
					        //   //site
	        				//  $query_sql="SELECT * FROM `lt_master_state` WHERE `status`=1";
	        				//  $sql_exe=mysqli_query($conn,$query_sql);

             //                 //field
	        				//  $query_sql="SELECT * FROM `lt_master_field_place` WHERE `status`=1";
	        				//  $sql_exe=mysqli_query($conn,$query_sql);
		

                             $user_level=$result['user_level'];
						 	 switch ($user_level) {
						 		case '1':
						 			?>
                                    <div class="col-lg-6">
	        		    	           <div class="form-group">
							             <label class="control-label col-lg-4 text-right"><h4><b>Head Quater : </b></h4> </label>
							             <div class="col-lg-8">
								     	 <p><?php echo strtoupper($result['hq_store_id']) ;?></p>
                                         </div>
						     	      </div>
                                    </div>
										
						 			<?php
						 			break;
						 		case '2':
						 			?>
						 				
						 			 <div class="col-lg-6">
	        		    	           <div class="form-group">
							             <label class="control-label col-lg-4 text-right"><h4><b>Head Quater : </b></h4> </label>
							             <div class="col-lg-8">
								     	 <p> <?php echo strtoupper($result['hq_store_id']) ;?> </p>
							           </div>
						     	      </div>
                                    </div>
										 
						 			<?php
						 			break;
						 		case '3':
						 			?>
						 				
						 			 <div class="col-lg-6">
	        		    	           <div class="form-group">
							             <label class="control-label col-lg-4 text-right"><h4><b>Head Quater : </b></h4></label>
							             <div class="col-lg-8">
								     	 <p> <?php echo strtoupper($result['hq_store_id']) ;?> </p>
							           </div>
						     	      </div>
                                    </div>

						 			 <div class="col-lg-6">
	        		    	           <div class="form-group">
							             <label class="control-label col-lg-4 text-right"><h4><b>Site Location : </b></h4></label>
							             <div class="col-lg-8">
								     	 <p> <?php echo strtoupper($result['sub_site_store_id'] );?> </p>
							           </div>
						     	      </div>
                                    </div>
										
						 			<?php
						 			break;
						 		case '4':
						 			?>
						 			 <div class="col-lg-6">
	        		    	           <div class="form-group">
							             <label class="control-label col-lg-4 text-right"><h4><b>Head Quater : </b></h4> </label>
							             <div class="col-lg-8">
								     	 <p> <?php echo strtoupper($result['hq_store_id']) ;?> </p>
							           </div>
						     	      </div>
                                    </div>

						 			 <div class="col-lg-6">
	        		    	           <div class="form-group">
							             <label class="control-label col-lg-4 text-right"><h4><b>Site Location : </b></h4></label>
							             <div class="col-lg-8">
								     	 <p> <?php echo strtoupper($result['sub_site_store_id']);?> </p>
							           </div>
						     	      </div>
                                    </div>

                                     <div class="col-lg-6">
	        		    	           <div class="form-group">
							             <label class="control-label col-lg-4 text-right"><h4><b>Field Location : </b></h4></label>
							             <div class="col-lg-8">
								     	 <p> <?php echo strtoupper($result['sub_field_store_id']);?> </p>
							           </div>
						     	      </div>
                                    </div>

						 			<?php
						 			break;
						 		
						 		    default:
						 			# code...
						 			break;
						    	}

                              ?>
						         <div class="col-lg-6">
	        		    	       <div class="form-group">
							           <label class="control-label col-lg-4 text-right"><h4><b>Date : </b></h4></label>
							             <div class="col-lg-8">
								     	 <p> <?php echo $result['date'] ;?> </p>
							           </div>
						     	     </div>
                                   </div>

                                  <div class="col-lg-6">
	        		    	       <div class="form-group">
							           <label class="control-label col-lg-4 text-right"><h4><b>Time : </b></h4></label>
							             <div class="col-lg-8">
								     	 <p> <?php echo $result['time'] ;?> </p>
							           </div>
						     	     </div>
                                   </div>
						
						         <div class="col-lg-6">
	        		    	       <div class="form-group">
							           <label class="control-label col-lg-4 text-right"><h4><b>Status : </b></h4></label>
							             <div class="col-lg-8">
								     	 <p> <?php 
                                        
                                         if($result['u_status']=='2'){
					        					echo "In-Active";
					        				}
					        				else
					        				{
					        					echo "Active";
					        				}

                                          ?>

                                           </p>

							           </div>
						     	     </div>
                                   </div>
						         <br>
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