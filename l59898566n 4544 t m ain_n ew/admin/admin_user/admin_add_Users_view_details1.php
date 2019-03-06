
<?php
session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="View User Details";
 $u_slno=$_GET['u_slno'];
?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View User Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>User Information</li>
				<li class="active">User List</li>
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
				    <div class="panel-title">User Details</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
                              <table id="example" class="display nowrap" width="100%" cellspacing="0">
						         <thead>
						            <tr>
						                <th>Sl.No</th>
 									    <th>User Name</th>
 									    <th>User Email</th>
 									    <th>Date Of Birth</th>
 									    <th>User Degination</th>
 									    <th>User Role</th>
 									    <th>User Mobile</th>
 									    <th>Head Quater</th>
 									    <th>Site Location</th>
 									    <th>Field Location</th>
 									    <th>Date</th>
						                <th>Time</th>
						                <th>Status</th>
						                	
						            </tr>
						         </thead>
	        					<tfoot>
		            				<tr>
		                 				<th>Sl.No</th>
 									    <th>User Name</th>
 									    <th>User Email</th>
 									    <th>Date Of Birth</th>
 									    <th>User Degination</th>
 									    <th>User Role</th>
 									    <th>User Mobile</th>
 									    <th>Head Quater</th>
 									    <th>Site Location</th>
 									    <th>Field Location</th>
 									    <th>Date</th>
						                <th>Time</th>
						                <th>Status</th>
		            				</tr>
	        				 	 </tfoot>
	        					<tbody>
	        						<?php 
	        					
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_user_system` WHERE `u_status`!='0' and `u_slno`='$u_slno'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;
	        								?>

                                        <tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=$result['user_name']?></td>
	        							<td><?=$result['user_email']?></td>
	        							<td><?=$result['user_dob']?></td>

	        							<td><?=$result['user_designation']?></td>
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
	        						    <td><?=$result['user_mobile']?></td> 
	        						    <td><?=$result['hq_store_id']?></td> 
	        						    <td><?=$result['sub_site_store_id']?></td>
	        						    <td><?=$result['sub_field_store_id']?></td>
	        						    <td><?=$result['date']?></td>
	        						    <td><?=$result['time']?></td>

	        						    <td><?php if($result['u_status']=="2"){ ?>
	        								<a href="admin_add_Users_update_status.php?u_slno=<?=$result['u_slno']?>&unq_id=<?=$result['user_id']?>&u_status=<?=$result['u_status']?>">In-Active</a>
	        							<?php }else{  ?>
	        								<a href="admin_add_Users_update_status.php?u_slno=<?=$result['u_slno']?>&unq_id=<?=$result['user_id']?>&u_status=<?=$result['u_status']?>">Active</a>
	        							<?php }?></td> 						    
	        				
	        							
	        							<!--  <td> 
	        							 <div class="btn-group">
			                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="admin_add_Users_view_details.php">View Detail</a></li>
			                                        <li><a href="admin_add_Users_edit.php?u_slno=<?php echo $result['u_slno'] ;?>">Edit Details</a></li>
			                                        
			                                        <li><a href="admin_add_Users_update_status.php?u_slno=<?=$result['u_slno']?>&unq_id=<?=$result['user_id']?>&u_status=0"  onclick="return confirm('Are you sure?')">Delete</a></li>
			                                        <!-- <li class="divider"></li>
			                                        <li><a href="#">Machine Transfer</a></li> -->
			                                    <!-- </ul> -->
			                                <!-- </div> -->
                                            <!-- <a href="admin_add_Users_edit.php" class="label label-success">View</a>
	        					    
	        								<a href="admin_add_Users_edit.php" class="label label-success">Edit</a>
	        								<a href="admin_add_Users_update_status.php?u_slno=<?=$result['u_slno']?>&unq_id=<?=$result['user_id']?>&u_status=0" class="label label-success" onclick="return confirm('Are you sure?')">Delete</a> -->
	        							
	        							<!-- </td>  -->
	        						</tr>
	        						<?php 
	        						}?>
	        				  </tbody>
    						</table>
                          </div>
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

