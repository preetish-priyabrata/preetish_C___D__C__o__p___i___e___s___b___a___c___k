
<?php
session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
	<!--Page Header-->

	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Component Details</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Component Information</li>
				<li class="active">Component List</li>
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
				    <div class="panel-title">Component Details</div>
				 	  </div>
					 	 <div class="panel-body">
							<div class="table-responsive">
                              <table id="example" class="display nowrap" width="100%" cellspacing="0">
						         <thead>
						            <tr>
						                <th>Sl.No</th>
 									    <th>Primary Code</th>
						                <th>Secondary Code</th>
						                <th>Component Name</th>
						                <th>Component Category </th>
						                <th>Brand Name</th>
						                <th>Manufacture Name </th>
						                <th>Status</th>
						                <!-- <th>Action</th>		 -->
						            </tr>
						         </thead>
	        					<tfoot>
		            				<tr>
		                 				<th>Sl.No</th>
 									    <th>Primary Code</th>
						                <th>Secondary Code</th>
						                <th>Component Name</th>
						                <th>Component Category </th>
						                <th>Brand Name</th>
						                <th>Manufacture Name </th>
						                <th>Status</th>
						                <!-- <th>Action</th>	 -->
		            				</tr>
	        				 	 </tfoot>
	        					<tbody>
	        						<?php 
	        					
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_item_detail` WHERE `status`!='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;
	        								?>

                                        <tr style="text-align: center;">
	        							<td><?=$x?></td>
	        							<td><?=$result['item_primary_code']?></td>
	        						    <td><?=$result['item_second_code']?></td>
	        						    <td><?=$result['item_name']?></td>
	        						    <td>
	        						    <?php 
	        						    	$item_category_id=$result['item_category_id'];
	        						    	$query_view_category = "SELECT  * FROM `lt_master_item_category` where `status`='1' and `slno`='$item_category_id' ";
	                  				 		$exe_view_category = mysqli_query($conn,$query_view_category);
	                  				 		$rec_category = mysqli_fetch_assoc($exe_view_category);
	        						    ?>	
	        						    <?=$rec_category['category_name'];?>
	        						    </td>
	        						    <td><?=$result['brand_name']?></td>
	        						    <td><?=$result['manufacture_name']?></td>
	        						    <td>
	        						    <?php if($result['status']=="1"){ ?>
	        							<a href="#">Active</a>
	        							<?php }else{  ?>

	        							<a href="#">In-Active</a>
	        						    <?php }?>
	        							
										</td>
	        							
	        							<!-- <td> 
	        					    
	        								<a href="admin_add_item_edit.php" class="label label-success">Edit</a>
	        							
	        							</td> -->	
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

