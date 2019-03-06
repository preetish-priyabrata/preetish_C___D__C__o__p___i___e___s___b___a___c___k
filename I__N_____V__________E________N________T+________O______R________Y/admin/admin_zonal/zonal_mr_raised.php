<?php
session_start();
ob_start();
if($_SESSION['admin_zonal']){
	unset($_SESSION["cart_item"]);
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
					   	<form name="myFunction" class="form-horizontal" onsubmit="return myFunction()" action="zonal_mr_raised_save.php" method="POST">
					   		<input type="hidden" name="form_type" value="<?=web_encryptIt('site_mr1')?>">
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
									
									<?php 
										$zonal_code=$_SESSION['zonal_place'];
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".strtoupper($result2['zonal_name'])."</p>";
									?>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date : </label>
							    <div class="col-lg-8">
									<p><?=date('Y-m-d')?></p>
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
	        								<option value="<?=$result['user_id']?>"><?=strtoupper($result['user_name'])?></option>
	        							<?php 

	        							}
	        							?>
							    </select>
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time : </label>
							    <div class="col-lg-8">
									<p><?=date('h:i:s a')?></p>
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
									                <th>HSN Code</th>
									                <th>Secondary Code</th>
									                <th>Component Name</th>
									                <th>Component Category </th>
									              	<th>Action</th>
									            </tr>
									        </thead>
			        						
					        				<tbody>
					        					<?php					        						$x=0;
					        						// $query_sql1="SELECT * FROM `lt_master_item_detail` WHERE `status`='1'";
					        						$query_sql1="SELECT * FROM lt_master_item_detail c left JOIN lt_master_item_category a on a.category_name=c.item_category_id where a.status='1'";
					        						$sql_exe1=mysqli_query($conn,$query_sql1);
					        						while ($result1=mysqli_fetch_assoc($sql_exe1)){
					        							$ids=$result1['slno'];
					        							// $custom_query="SELECT * FROM `lt_master_model_item_detail` JOIN `lt_master_machine__transfer_information` ON `lt_master_model_item_detail`.`i_model_id`=`lt_master_machine__transfer_information`.`model_id` WHERE`lt_master_machine__transfer_information`.`t_status`='1' AND `lt_master_model_item_detail`.`i_item_slno`='$ids' and `lt_master_machine__transfer_information`.`t_store_site_location`='$zonal_place' ";
					        							// $sql_exe_detail=mysqli_query($conn,$custom_query);
					        							// $num_rows=mysqli_num_rows($sql_exe_detail);
					        							// if($num_rows!="0"){
					        								$x++;
					        								// $in_session = "0";
					        					?>
					        					<?php
													$in_session = "0";
													if(!empty($_SESSION["cart_item"])) {
														$session_code_array = array_keys($_SESSION["cart_item"]);
														if(in_array($result1['item_second_code'],$session_code_array)) {
																$in_session = "1";
														}
													}
												?>
				                                <tr style="text-align: center;">
						        					<td><?=$x?></td>
						        					<td><?=strtoupper($result1['hsn_code'])?></td>
						        					<td><?=strtoupper($result1['item_second_code'])?></td>
						        				    <td><?=strtoupper($result1['item_name'])?></td>
						        					<td><?php
						        							echo strtoupper($result1['item_category_id']);
						        							?>
						        						    
						        					</td>
						        					<td>
						        						<input type="button" id="add_<?php echo $result1['item_second_code']; ?>" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $result1['item_second_code']; ?>')" <?php if($in_session != "0") { ?> style="display:none"<?php } ?> />
														<input type="button" id="added_<?php echo $result1['item_second_code']; ?>" value="Added" class="btnAdded" <?php if($in_session != "1") { ?> style="display:none" <?php } ?> />
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
				        </div>
                        <br>
	                    <input type="hidden" class="form-control" name="user_location" id="name_user" placeholder="Enter Name" autocomplete="off" value="<?=$_SESSION['zonal_place']?>" required="">
						<input type="hidden" class="form-control" name="date_info" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=date('Y-m-d')?>" required="">
						<input type="hidden" class="form-control" name="Time_info" id="mobile_no" placeholder="Enter Mobile No" value="<?=date('H:i:s')?>" autocomplete="off" required="">
					 	<div class="panel-heading">
							<div class="panel-title text-center">Componet Cart System <div class="pull-right"><a id="btnEmpty" class="cart-action btn btn-info btn-sm" onClick="cartAction('empty','');">Empty Cart</a></div></div>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<span id="cart-item">
			                        <table class="display nowrap table " width="100%" cellspacing="0">
									    <thead>
								            <tr>
								                <th>Sl.No</th>
								                <th>HSN Code</th>
								                <th>Secondary Code</th>
								                <th>Component Name</th>
								                <th>Component Category </th>
								                
								              	<th>Action</th>
								            </tr>
							        	</thead>
		        						
			        					<tbody >

			        				   </tbody>
			    					</table>
			    				</span>.
			                </div>
			            </div>
		   			    <div class="form-group pull-right">
		 					<input type="submit" class="btn btn-info"  value="Save" onclick="myFunction()">
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
	url: "zonal_mr_raised_get_cart.php",
	data:queryString,
	type: "POST",
	success:function(data){
		$("#cart-item").html(data);
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
    var table = $('#example771').DataTable();
 
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
