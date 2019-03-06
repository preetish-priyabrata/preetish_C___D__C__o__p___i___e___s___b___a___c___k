<?php
// print_r($_REQUEST);
// exit;
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Zonal User Raise Material Requsition form ";
// $zonal_place=$_SESSION['zonal_place'];
$field_place=$_SESSION['field_place'];
$slno=web_decryptIt(str_replace(" ", "+", $_GET['slno']));
$list=web_decryptIt(str_replace(" ", "+", $_GET['token_list']));
// $list=web_decryptIt(str_replace(" ", "+", $_GET['list']));
$machine_no=$_GET['machine_no'];
$slno_en= $_GET['slno'];
$list_en= $_GET['list'];
// unset($_GET);
$check="SELECT * FROM `lt_master_field_material_requsition` where `fmr_slno`='$slno' and `fmr_unqiue_mr_id`='$list' and `status`='0'";
$sql_exe=mysqli_query($conn,$check);
$num=mysqli_num_rows($sql_exe);
if($num!='0'){

}
$fetch_check=mysqli_fetch_assoc($sql_exe);
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
.form-control[disabled], .form-control[readonly] {
    color: #000809;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Raise Material Requsition Form </div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboard</li>
				<li class="">Requisition Management </li>
				<li class="">Incomplete Field M.R</li>
				<li class="active">Raise Material Requisition Form </li>
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
					   	<form name="myFunction" class="form-horizontal" action="field_mr_raised_machine_save.php" method="POST">
					   		<input type="hidden" name="form_type" value="<?=web_encryptIt('field_mr2')?>">
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
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="list_id" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$list?>" required="">
									<input type="hidden" class="form-control" name="slno_id" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$slno?>" required="">
									<p><?=strtoupper($list)?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Machine : </label>
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
				                           <table class="display nowrap table" width="100%" cellspacing="0">
										         <thead>
										            <tr>
										                <th>Sl.No</th>
				 									    <!-- <th>Primary Code</th> -->
										                <th>Item Code</th>	
										                <th>HSN Code</th>	
										                <th>component Name</th>		    
										                <th>Component Category</th>
										                <th>Present Stock</th>
										                <th>Required Stock</th>
										                <th>Remark</th>
										                <th>Action</th>
										            </tr>
										         </thead>
					        					
					        					<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							
					        							$item="SELECT * FROM `lt_master_field_material_requsition_details` WHERE `fmrd_slno_id`='$slno' and `fmr_unqiue_mr_id_iteam`='$list'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        								<tr>
						                 				<td><?=$x?></td>
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=$fetch_item['fmrd_second_code']?></td>	
										                <td><?=strtoupper($fetch_item['fmrd_hsn_code'])?></td>				
										                <input type="hidden" name="slno_item[]" value="<?=$fetch_item['fmrd_slno']?>" required="">
										               <td><?=strtoupper($fetch_item['fmrd_name_item'])?></td>
										               <td><?=strtoupper($fetch_item['fmrd_category_id'])?></td>
										                <td>0
										                <input type="hidden" name="quantity_aval[]" value="0" required=""> <?=$fetch_item['fmrd_units_required']?></td>
										                <td><input type="number" name="quantity_req[]" placeholder="Please Enter Quantity" min="0" value="0" required=""> <?=strtoupper($fetch_item['fmrd_units_required'])?></td>
										                <td><input type="text" name="remarks_detail[]" placeholder="Please Enter Remark" required></td>

										                <td><a class="btn btn-success" href="field_mr_raised_remove.php?slno=<?=$slno_en?>&list=<?=$list_en?>&fmrd_slno=<?=web_encryptIt($fmrd_slno)?>&re=1">Remove</a></td>
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
					        	<div class="form-group pull-right">
					 		<input type="submit" class="btn btn-info" value="Save" onclick="myFunction()">
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
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(5),:eq(6)").each( function () {
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
