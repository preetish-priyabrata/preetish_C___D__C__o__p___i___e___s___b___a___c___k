<?php
// print_r($_POST);

session_start();
ob_start();
if($_SESSION['admin']){
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// zonal_code
// model_no
// check
if(isset($_POST['check'])){
$zonal_code=$_POST['zonal_code'];
$model_no=$_POST['model_no'];
}else{
$zonal_code="";	
$model_no="";
}
?>
	<!--Page Header-->
<div class="header">
	<div class="header-content">
		<div class="page-title"><i class="icon-display4"></i>Assign Machine to Location</div>
			<ul class="breadcrumb">
			  <li><a href="admin_dashboard.php"></a></li>
			   <li><a href="#"></a>Assign Machine Information</li>
			 <li class="active">Assign Machine to Location</li>
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
			 <div class="panel-title">Assign Machine to Location Form</div>
			   </div>
			     <div class="panel-body">
			       <form name="myFunction" class="form-horizontal" action="admin_assign_machine_details.php" method="POST">
				   		<div class="form-group">
						  <label class="control-label col-lg-4 text-right">Site Store Location</label>

						    <div class="col-lg-8">
							   <select class="form-control" name="zonal_code" id="zonal_code" type="dropdown" required="">
								    <option value="">--Select Site Store --</option>
								    <?php
	                				 $query_view_loc = "SELECT * FROM `lt_master_zonal_place` WHERE `status`='1'";
	                  				 $exe_view_loc = mysqli_query($conn,$query_view_loc);
	                				                
	                  				 while($rec_loc = mysqli_fetch_assoc($exe_view_loc)){?>
	                    			<option value="<?php echo $rec_loc['zonal_code'];?>" <?php if($zonal_code==$rec_loc['zonal_code']){ echo "selected";}?>><?=strtoupper($rec_loc['zonal_name']);?></option>
	             					 <?php }?>
	               			    </select>
						     </div>
						 </div>

					  	<div class="form-group">
						  <label class="control-label col-lg-4 text-right">Machine Model No</label>
						  	<div class="col-lg-8">
								<select class="form-control" name="model_no" id="demo" type="dropdown" required="">
								    <option value="">--Select Machine Model No--</option>
								    <?php
	                				 $query_view = "SELECT  * FROM `lt_master_machine_model_no` where `status`='1'";
	                  				 $exe_vieew = mysqli_query($conn,$query_view);
	                				                
	                  				 while($rec = mysqli_fetch_assoc($exe_vieew)){?>
	                    			<option value="<?php echo $rec['model_id'];?>"  <?php if($model_no==$rec['model_id']){ echo "selected";}?> ><?=strtoupper($rec['model_no']);?></option>
	             					 <?php }?>
	               			   </select>
						   	</div>
						 </div>
						 
				     	<div class="form-group pull-right">
					 		<input type="submit" class="btn btn-info" name="check"  value="Search">
				   		</div>
				 	</form>
			   	</div>
			</div>						
		</div>
	</div>
	<?php 
	// Array ( [zonal_code] => zonal002 [model_no] => md5 [check] => Save ) 
  if(isset($_POST['check'])){
	?>
	<div class="row">
	  <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
		 <div class="panel panel-default">
		   <div class="panel-heading">
			 <div class="panel-title">Machine List Un-Assigned</div>
			   </div>
			     <div class="panel-body">			   
				   	<form name="myFunction" class="form-horizontal" action="admin_assign_machine_details_save.php" method="POST" enctype="multipart/form-data">

				  <!--   <div class="form-group">
						<label class="control-label col-lg-4 text-right">File Attachment</label>
						  <div class="col-lg-8">
							<input class="form-control" name="attach" id="demo"  type="File" required="">
						  </div>
					 </div> -->

						 <br>
				   	<input type="hidden" name="M_model_no" value="<?=$model_no?>">
				      <input type="hidden" name="site_location_id" value="<?=$zonal_code?>">
				   		<div class="table-responsive">
				   			  <table id="example21" class="display nowrap" width="100%" cellspacing="0">
						        <thead>
						            <tr>
						                <th>Sl.No</th>
						                <th>Unique Id</th>
 									    <th>Machine Name</th>
						                <th>Field Location</th>
						                <th>Remark</th>	
						                <th>Attach File</th>	
						            </tr>
						         </thead>
	        					
	        					<tbody>
	        						<?php 
	        							$x=0;
	        							$query_sql="SELECT * FROM `lt_master_machine_detail` LEFT JOIN `lt_master_machine_model_no` ON `lt_master_machine_model_no`.`model_id`=`lt_master_machine_detail`.`m_model_no` WHERE `lt_master_machine_model_no`.`status`!='0' and `lt_master_machine_detail`.`m_status`!='0' and `lt_master_machine_detail`.`m_model_no`='$model_no' and `lt_master_machine_detail`.`assign_status`='0'";
	        							$sql_exe=mysqli_query($conn,$query_sql);

	        							while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								$x++;

	        								?>
	        					     	<tr>
	        							<td><?=$x?></td>
	        							<td><input type="hidden" name="machine_unique_id[]" value="<?=$result['machine_unique_id']?>"><?=strtoupper($result['machine_unique_id'])?></td>
	        							<td><?=strtoupper($result['machine_name'])?></td>
	        							<td><select name="field_loaction_ids[]">
	        									<option value="0">--Select Field Location--</option>
	        									<?php 
	        									$query_sql_location="SELECT * FROM `lt_master_field_place` WHERE `status`='1' and `zonal_code`='$zonal_code'";
	        										$sql_exe_location=mysqli_query($conn,$query_sql_location);
	        										while ($result_location=mysqli_fetch_assoc($sql_exe_location)) {
	        											?>
	        									<option value="<?=$result_location['field_code']?>"><?=strtoupper($result_location['field_name'])?></option>
	        									<?php	}?>
	        								</select> 
	        							</td>
	        							<td><input type="text" name="remark[]" placeholder="Please Enter Remark"></td>
	        							<td><input class="form-control" name="attach_files[]" id="demo"  type="File" ></td>
	        						</tr>
	        						<?php 
	        						}?>
	        				  </tbody>
    						 </table>
				   		    </div>
				   		   <div class="form-group pull-right">
					 	   <input type="submit" class="btn btn-info" name="Insert"  value="Save" >
				   		</div>
				   	</form>
				</div>
			</div>
		</div>
	</div>
	<?php }?>
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
<script type="text/javascript">
	
</script>