<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin_field']){
	unset($_SESSION["Field_cart_item"]);
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Field User Raise Material Requsition form ";
 // Array ( [form_type] => KCpzvsPmYgJD/rn6kb7S9AMsa2LK5q/SPHmHybEpHdc= [user_location] => field001 [date_info] => 2017-11-27 [Time_info] => 19:01:29 [machine_no] => mud698 ) 
$zonal_place=$_SESSION['zonal_place'];
$field_place=$_SESSION['field_place'];
$machine_no=$_GET['machine_no'];
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Raise Material Requsition Form</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Requsition </li>
				<li class="active">Raise Material Requsition Form</li>
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
				 	<div class="panel-title">Requsition Form</div>
				</div>
				<div class="panel-body">
					<form name="myFunction" class="form-horizontal" action="field_mr_raised_machine_save.php" method="POST">
					   	<input type="hidden" name="form_type" value="<?=web_encryptIt('field_mr1')?>">
					   	<div class="row">
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
										<input type="hidden" class="form-control" name="user_location" id="name_user" placeholder="Enter Name" autocomplete="off" value="<?=$_SESSION['field_place']?>" required="">
										<?php 
											// $field_place=$_SESSION['field_place'];
		        							$query_sql2="SELECT * FROM `lt_master_field_place` WHERE `field_code`='$field_place'";
		        							$sql_exe2=mysqli_query($conn,$query_sql2);
		        							$result2=mysqli_fetch_assoc($sql_exe2);
		        							echo "<p>".strtoupper($result2['field_name'])."</p>";
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
							    	<label class="control-label col-lg-4 text-right">Time : </label>
							    	<div class="col-lg-8">
										<input type="hidden" class="form-control" name="Time_info" id="mobile_no" placeholder="Enter Mobile No" value="<?=date('H:i:s')?>" autocomplete="off" required=""><p><?=date('h:i:s a')?></p>
							    	</div>
								</div>

								<div class="form-group">
							    	<label class="control-label col-lg-4 text-right">Machine No : </label>
							    	<div class="col-lg-8">
							    		<p><?=$machine_no?></p>
										<input type="hidden"  name="machine_no"  value="<?=$machine_no?>">
											<?php  
											$get_information="SELECT * FROM `lt_master_machine__transfer_information` WHERE `t_field_location_id`='$field_place'and`t_status`='1' and `t_unique_id_machine`='$machine_no'";
											$sql_exe_machine=mysqli_query($conn,$get_information);
											$machine_no_fetch=mysqli_fetch_assoc($sql_exe_machine);
											$model_id=strtoupper($machine_no_fetch['model_id']);
											?>
										<input type="hidden"  name="model_id"  value="<?=$model_id?>">
									</div>
								</div>
							</div>
						</div> 
						<br>
						<div class="row">
							<br>
							<div class="row">
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
											                <th>HSN Code</th>
											                <th>Secondary Code</th>
											                <th>Component Name</th>
											                <th>Component Category </th>
											                <th>Maintenance Category</th>
											              	<th>Action</th>
										            	</tr>
										        	</thead>
					        						<!-- <tfoot>
						            					<tr>
							                 				<th>Sl.No</th>
											                <th>Secondary Code</th>
											                <th>Component Name</th>
											                <th>Component Category</th>
											                <th>Action</th>
						            					</tr>
					        				 		</tfoot> -->
					        						<tbody>
						        						<?php
						        							$x=0;
						        							$query_sql1="SELECT * FROM `lt_master_model_item_detail` WHERE `i_model_id`='$model_id'";
						        							$sql_exe1=mysqli_query($conn,$query_sql1);
						        							while ($result1=mysqli_fetch_assoc($sql_exe1)){
						        								$x++;
						        								
						        								$field_in_session = "0";
														if(!empty($_SESSION["Field_cart_item"])) {
															$session_code_array = array_keys($_SESSION["Field_cart_item"]);
															if(in_array($result1['item_second_code'],$session_code_array)) {
																	$field_in_session = "1";
															}
														}
														?>
					                                    <tr style="text-align: center;">
						        							<td><?=$x?></td>
						        							<td><?=strtoupper($result1['item_hsn_code'])?>
						        						    </td>
						        						    <td><?=strtoupper($result1['item_second_code'])?>
						        						    </td>
						        						     
						        						    
						        						    <td><input type="hidden" name="item_name[]" value="<?=$result1['item_name']?>">
					        						    	<input type="hidden" name="unit_details[]" value="<?=$result1['it_de_unit']?>">
					        						    	<?=strtoupper($result1['item_name'])?></td>
						        						    <td><?=strtoupper($result1['item_category_id'])?></td> 
						        						   <td>
						        						   
						        						   		
															<select name="maintenance_id[]" required="">
													    		<option value="">--Select Catrgory--</option>
													    		<option value="scheduled">Scheduled</option>
													    		<option value="predictive">Predictive</option>
													    		<option value="immediate">Immediate</option>
													    	</select>
														
						        						   	</td>
					        						    	<?php
					        						    	 	echo $item_category_id=$result1['item_category_id'];
					        						    		$query_view_category = "SELECT  * FROM `lt_master_item_category` where `status`='1' and `slno`='$item_category_id' ";
					                  				 			$exe_view_category = mysqli_query($conn,$query_view_category);
					                  				 			$rec_category = mysqli_fetch_assoc($exe_view_category);
					        						    	?><?=strtoupper($rec_category['category_name']);?>
						        						    </td>
						        						  <input type="hidden" name="category_name[]" value="<?=$rec_category['category_name']?>">
					        						      <input type="hidden" name="category_name_id[]" value="<?=$item_category_id?>">
					        						     <?=strtoupper($rec_category['category_name']);?>
					        						    </td>

  
						        						    <td>
								        						<input type="button" id="add_<?php echo $result1['item_second_code']; ?>" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $result1['item_second_code']; ?>')" <?php if($field_in_session != "0") { ?> style="display:none"<?php } ?> />
																<input type="button" id="added_<?php echo $result1['item_second_code']; ?>" value="Added" class="btnAdded" <?php if($field_in_session != "1") { ?> style="display:none" <?php } ?> />
								        				    </td>
						        						</tr>
						        						<?php
						        							}
						        						?>
					        				  		</tbody>
				    							</table>
				                        	</div>
				                    	</div>
				                	</div>
				                	<br>
				                	<div class="panel-heading">
										<div class="panel-title text-center">Componet Cart System <div class="pull-right"><a id="btnEmpty" class="cart-action btn btn-info btn-sm" onClick="cartAction('empty','');">Empty Cart</a></div></div>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<span id="Field-cart-item">
						                        <table id="example771" class="display nowrap table " width="100%" cellspacing="0">
												    <thead>
											            <tr>
											                <th>Sl.No</th>
											                <th>HSN Code</th>
											                <th>Secondary Code</th>
											                <th>Component Name</th>
											                <th>Component Category </th>
											               	<th>Maintenance Category</th>
											              	<th>Action</th>
											            </tr>
										        	</thead>
					        						<!-- <tfoot>
							            				<tr>
							                 				<th>Sl.No</th>
											                <th>Secondary Code</th>
											                <th>Component Name</th>
											                <th>Component Category </th>
											                <th>Maintenance Category</th>
											                <th>Action</th>
							            				</tr>
					        				 	 	</tfoot> -->
						        					<tbody >

						        				   </tbody>
						    					</table>
						    				</span>
						                </div>
						            </div>
					   			    

				            	</div>
                          		<br>
							</div>
						</div>
                    	<br>
						<div class="row">
					  		<div class="form-group text-right">
					 			<input type="submit" class="btn btn-info"  value="Save">
				   			</div>
				   		</div>
					</form>
				</div>
			</div>						
		</div>
	</div>
</div>


<script type="text/javascript">
	function myFunction() {
		var get_secondary_details=$('.secondary_details').val();
		if(get_secondary_details!=""){
			return true;
		}else{
			alert('Please any  Componets before saving');
			return false;

		}
	}
	function cartAction(action,product_code) {
	var queryString = "";
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&code='+ product_code;
			break;
			case "remove":
				queryString = 'action='+action+'&code='+ product_code;
			break;
			case "empty":
				queryString = 'action='+action;
			break;
		}	 
	}
	jQuery.ajax({
	url: "field_mr_raised_get_cart.php",
	data:queryString,
	type: "POST",
	success:function(data){
		$("#Field-cart-item").html(data);
		if(action != "") {
			switch(action) {
				case "add":
					$("#add_"+product_code).hide();
					$("#added_"+product_code).show();
				break;
				case "remove":
					$("#add_"+product_code).show();
					$("#added_"+product_code).hide();
				break;
				case "empty":
					$(".btnAddAction").show();
					$(".btnAdded").hide();
				break;
			}	 
		}
	},
	error:function (){}
	});
}
</script>



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
