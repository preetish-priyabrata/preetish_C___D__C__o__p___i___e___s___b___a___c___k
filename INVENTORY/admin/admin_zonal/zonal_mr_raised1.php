<?php
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Zonal User Raise Material Requisition form ";
$zonal_place=$_SESSION['zonal_place'];
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Raise Material Requisition Form</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Requisition </li>
				<li class="active">Raise Material Requisition Form</li>
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
				 <div class="panel-title">Requisition Form</div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" class="form-horizontal" action="zonal_mr_raised_save.php" method="POST">
					   		<input type="hidden" name="form_type" value="<?=web_encryptIt('site_mr1')?>">
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="user_location" id="name_user" placeholder="Enter Name" autocomplete="off" value="<?=$_SESSION['zonal_place']?>" required="">
									<?php 
										$zonal_code=$_SESSION['zonal_place'];
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".$result2['zonal_name']."</p>";
									?>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="date_info" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=date('Y-m-d')?>" required=""><p><?=date('Y-m-d')?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Approver : </label>
							    <div class="col-lg-8">
							    <select class="form-control" name="approver_id" required="" >
							    	<option value="">--Please Select Approver--</option>
							    	<?php 
							    		$query_sql="SELECT * FROM `lt_master_user_system` WHERE `u_status`='1'and `user_level`='2'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {?>
	        								<option value="<?=$result['user_id']?>"><?=$result['user_name']?></option>
	        							<?php 

	        							}
	        							?>
							    </select>
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="Time_info" id="mobile_no" placeholder="Enter Mobile No" value="<?=date('H:i:s')?>" autocomplete="off" required=""><p><?=date('h:i:s a')?></p>
							   </div>
							</div>

						</div>
						 

						 <br>
						 <div class="col-md-12 col-sm-12">
						 	 <div class="panel panel-default">
							   <div class="panel-heading">
								 <div class="panel-title text-center">Component List</div>
								   </div>
								     <div class="panel-body">
										 <div class="table-responsive">
				                              <table id="example77" class="display nowrap" width="100%" cellspacing="0">
										         <thead>
										            <tr>
										                <th>Sl.No</th>
				 									    <!-- <th>Primary Code</th> -->
										                <th>Secondary Code</th>
										                <th>Component Name</th>
										                <th>Component Category </th>
										              	<th>Machine No</th>
										                
										                <!-- <th>Action</th>		 -->
										            </tr>
										         </thead>
					        					<tfoot>
						            				<tr>
						                 				<th>Sl.No</th>
				 									    <!-- <th>Primary Code</th> -->
										                <th>Secondary Code</th>
										                <th>Component Name</th>
										                <th>Component Category </th>
										                <th>Machine No</th>
										                
										                <!-- <th>Action</th>	 -->
						            				</tr>
					        				 	 </tfoot>
					        					<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							$query_sql1="SELECT * FROM `lt_master_item_detail` WHERE `status`='1'";
					        							$sql_exe1=mysqli_query($conn,$query_sql1);
					        							while ($result1=mysqli_fetch_assoc($sql_exe1)){
					        								$ids=$result1['slno'];
					        								$custom_query="SELECT * FROM `lt_master_model_item_detail` JOIN `lt_master_machine__transfer_information` ON `lt_master_model_item_detail`.`i_model_id`=`lt_master_machine__transfer_information`.`model_id` WHERE`lt_master_machine__transfer_information`.`t_status`='1' AND `lt_master_model_item_detail`.`i_item_slno`='$ids' and `lt_master_machine__transfer_information`.`t_store_site_location`='$zonal_place' ";
					        								$sql_exe_detail=mysqli_query($conn,$custom_query);
					        								$num_rows=mysqli_num_rows($sql_exe_detail);
					        								if($num_rows!="0"){
					        								$x++;
					        								?>

				                                        <tr style="text-align: center;">
					        							<td><?=$x?></td>
					        							<!-- <td><?=$result1['item_primary_code']?></td> -->
					        						    <td><input type="hidden" name="secondary_details[]" value="<?=$result1['item_second_code']?>"><?=$result1['item_second_code']?>
					        						    <input type="hidden" name="primary_details[]" value="<?=$result1['item_primary_code']?>">
					        						    </td>
					        						    <td><input type="hidden" name="item_name[]" value="<?=$result1['item_name']?>">
					        						    	<input type="hidden" name="unit_details[]" value="<?=$result1['it_de_unit_m']?>">
					        						    	<?=$result1['item_name']?></td>
					        						    <td>
					        						    <?php 
					        						    	 $item_category_id=$result1['item_category_id'];
					        						    	$query_view_category = "SELECT  * FROM `lt_master_item_category` where `status`='1' and `slno`='$item_category_id' ";
					                  				 		$exe_view_category = mysqli_query($conn,$query_view_category);
					                  				 		$rec_category = mysqli_fetch_assoc($exe_view_category);
					        						    ?>	
					        						    <input type="hidden" name="category_name[]" value="<?=$rec_category['category_name']?>">
					        						    <input type="hidden" name="category_name_id[]" value="<?=$item_category_id?>">
					        						    <?=$rec_category['category_name'];?>
					        						    </td>
					        						    <td>
					        						    	<select class="form-control"  name="machine_no[]">
					        						    		<option value="">--Select Machine--</option>
					        						    		<?php 
					        						    		while ($customize=mysqli_fetch_assoc($sql_exe_detail)) { ?>

					        						    			<option value="<?=$customize['t_unique_id_machine']?>"><?=$customize['t_unique_id_machine']?></option>
					        						    		<?php }?>
					        						    	</select>
					        						    </td>
					        							
					        							<!-- <td> 
					        					    
					        								<a href="admin_add_item_edit.php" class="label label-success">Edit</a>
					        							
					        							</td> -->	
					        						</tr>
					        						
					        						<?php 
					        					}
					        						}?>
					        				  </tbody>
				    						</table>
				                          </div>
				                        </div>
				                     </div>

                          </div>
                          <br>
					   	<div class="form-group pull-right">
					 		<input type="submit" class="btn btn-info"  value="Save" onclick="myFunction()">
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
<script type="text/javascript">
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 4 ) return;
        
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );
	$(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>
