<?php
// print_r($_REQUEST);
// exit;
session_start();
ob_start();
if($_SESSION['admin_approver']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Approver Requsition Received Detail View";
$zonal_place=$_SESSION['zonal_place'];
$slno=web_decryptIt(str_replace(" ", "+", $_GET['slno']));
$list=web_decryptIt(str_replace(" ", "+", $_GET['list']));
$status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
// unset($_GET);
$check="SELECT * FROM `lt_master_zonal_material_requsition` where `zmr_slno`='$slno' and `zmr_unqiue_mr_id`='$list' and `status`='1'";
$sql_exe=mysqli_query($conn,$check);
$num=mysqli_num_rows($sql_exe);
if($num!='0'){

}
$fetch_check=mysqli_fetch_assoc($sql_exe);
$zonal_code=$fetch_check['zmr_site_from_location_id'];
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
			<div class="page-title"><i class="icon-display4"></i>Material Requisition Approved </div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Requisition Management </li>
				<li class="">View Approved S.M.R List</li>
				<li class="active">Approved Material Requisition Details</li>
				
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
				 <div class="panel-title">Approved Material Requisition Details</div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" action="#" class="form-horizontal" >
					   		
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
									
									<?php 
										
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".strtoupper($result2['zonal_name'])."</p>";
									?>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of M.R : </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['date']?></p>
							   </div>
							</div>
							<?php if($status=="3"){	?>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Approved M.R : </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['approver_date']?></p>
							   </div>
							</div>
							<?php }?>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									
									<p><?=strtoupper($list)?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Approver : </label>
							    <div class="col-lg-8">
							    <select class="form-control" name="approver_id" required="" readonly>
							    	<?php 
							    		$Approver_IDS=$fetch_check['zmr_forward_id'];
							    		$query_sql="SELECT * FROM `lt_master_user_system` WHERE `u_status`='1'and `user_level`='2' and `user_id`='$Approver_IDS'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {?>
	        								<option value="<?=$result['user_id']?>" <?php if($result['user_id']==$fetch_check['zmr_forward_id']){ echo "selected"; } ?> ><?=strtoupper($result['user_name'])?></option>
	        							<?php 

	        							}
	        							?>
							    </select>
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of M.R: </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['time']?></p>
							   </div>
							</div>
							<?php if($status=="3"){	?>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Approved M.R : </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['approver_time']?></p>
							   </div>
							</div>
							<?php }?>
						</div>
						 

						 <br>
						 <div class="col-md-12 col-sm-12">
						 	 <div class="panel panel-default">
							   <div class="panel-heading">
								 <div class="panel-title text-center">Component List</div>
								   </div>
								     <div class="panel-body">
										 <div class="table-responsive">
				                              <table id="" class="display nowrap table" width="100%" cellspacing="0">
										         <thead>
										            <tr>
										                <th>Sl.No</th>
										                <th>Hsn Code</th>
				 									    <th>Primary Code</th>
										                <th>Secondary Code</th>
										                <th>Item Name</th>
										                <th>Component Category</th>
										                <th>Required Stock</th>
										                <th>Remark</th>
										                <?php if($status=="3"){
										                	?>
										                <th>Approved Stock</th>
										              <?php }?>
										            </tr>
										         </thead>
					        					 

					        					<tbody>
					        						<?php 
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_zonal_material_requsition_details` WHERE `zmrd_slno_id`='$slno' and `zmr_unqiue_mr_id_item`='$list'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        								<tr>
						                 				<td><?=$x?></td>
				 									    <td><?=strtoupper($fetch_item['zmrd_hsn_code'])?></td>
										                <td><?=strtoupper($fetch_item['zmrd_primary_code'])?></td>
										                <td><?=strtoupper($fetch_item['zmrd_second_code'])?></td>					    
										               <td><?=strtoupper($fetch_item['zmrd_name_item'])?></td>
										              	<td><?=strtoupper($fetch_item['zmrd_category_name'])?></td>
										                
										                <td><?=strtoupper($fetch_item['zmrd_request_qnt'])?> 
										                	<?=strtoupper($fetch_item['zmrd_units_required'])?></td>
										                <td><?=strtoupper($fetch_item['remark_id'])?></td>
										                <?php if($status=="3"){
										                	?>
										                <td><?=strtoupper($fetch_item['zmrd_approved_qnt'])?> <?=strtoupper($fetch_item['zmrd_units_required'])?></td>
										              <?php }?>
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
					   		   <div class="form-group pull-left">
					 	    <button type="button" onclick="close_window()" class="btn btn-warning">Back</button> 
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
</script>
<script type="text/javascript">
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
</script>