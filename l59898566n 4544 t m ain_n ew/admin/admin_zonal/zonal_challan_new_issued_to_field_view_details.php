<?php
// echo "string";
// print_r($_REQUEST);
// exit;
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Head Quarter view Site Requsition Received Detail ";
$zonal_place=$_SESSION['zonal_place'];

 $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $challan=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['access']));
 
// unset($_GET);
$check="SELECT * FROM `lt_master_zonal_challan_generate` where `zqcg_challan_no`='$challan' and `zqcg_status`='1' and  `zqcg_hq_location_id`='$zonal_place' ";
$sql_exe=mysqli_query($conn,$check);
$num=mysqli_num_rows($sql_exe);
if($num!='0'){
}
$fetch_check=mysqli_fetch_assoc($sql_exe);
//$zonal_code=$fetch_check['zmr_site_from_location_id'];
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
			<div class="page-title"><i class="icon-display4"></i> Received Material Requsition Detail</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Requsition Information </li>
				<li class="">Issue Site M.R List</li>				
				<li class="active">Issue Material Requsition Detail</li>
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
				 <div class="panel-title">Requsition Detail</div>
				   </div>
				     <div class="panel-body">
				     	
					   <form name="myFunction" class="form-horizontal" action="#" >
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Zonal Location Name :</label>
								    <div class="col-lg-8">
									<?php 
										$zqcg_hq_location_id=$fetch_check['zqcg_hq_location_id'];
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zqcg_hq_location_id'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".$result2['zonal_name']."</p>";
									?>
								<input type="hidden" name="zqcg_hq_location_id" value="<?=$zqcg_hq_location_id?>">
							    
							
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Challan : </label>
							    <div class="col-lg-8">
							    	<input type="hidden" name="zqcg_date" value="<?=$fetch_check['zqcg_date']?>">
									<p><?=$fetch_check['zqcg_date']?></p>
							   </div>
							</div>
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="zqcg_site_mr_id" id="zqcg_site_mr_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_site_mr_id']?>" required="">
									<input type="hidden" class="form-control" name="zqcg_slno" id="zqcg_slno" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_slno']?>" required="">
									<p><?=$fetch_check['zqcg_site_mr_id']?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Challan No : </label>
							    <div class="col-lg-8">
							  	<input type="hidden" class="form-control" name="zqcg_challan_no" id="zqcg_challan_no" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_challan_no']?>" required="">
							    <p><?=$fetch_check['zqcg_challan_no']?></p>
							   
							  </div>
							</div>
						   <div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Challan: </label>
							    <div class="col-lg-8">
										<input type="hidden" class="form-control" name="zqcg_time" id="zqcg_time" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['zqcg_time']?>" required="">
									<p><?=$fetch_check['zqcg_time']?></p>
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
										                <th>Item Code</th>
										                <th>Item Name</th>
										                <th>Maintenance Type</th>
										                <th>Request Quantity</th>
										                <th>Issued Quantity</th>
										            </tr>
										         </thead>
					        					<tfoot>
						            				<tr>
						                 				<th>Sl.No</th>
										                <th>Item Code</th>
										                <th>Item Name</th>
										                <th>Maintenance Type</th>
										                <th>Request Quantity</th>
										                <th>Issued Quantity</th>
						            				</tr>
					        				 	 </tfoot>
					        						<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_zonal_issue_field_info` WHERE `zqzis_challan_id`='$challan'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        						   <tr>
						                 				<td><?=$x?></td>
						                 				<!-- serial no -->
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=$fetch_item['zqzis_secondary_id']?>
										                	<input type="hidden" name="fmrd_slno[]" value="<?=$fmrd_slno=$fetch_item['fmrd_slno']?>" required=""><input type="hidden" name="zqzis_slno[]" value="<?=$fetch_item['zqzis_slno']?>" required="">
										                	<input type="hidden" name="zqzis_primary_id[]" id="Primary<?=$x?>" value="<?=$zqzis_primary_id=$fetch_item['zqzis_primary_id']?>" required="">
										                	<input type="hidden" name="zqzis_secondary_id[]" id="Primary<?=$x?>" value="<?=$zqzis_secondary_id=$fetch_item['zqzis_secondary_id']?>" required="">
										                	<?php 
										                		$get_info="SELECT * FROM `lt_master_field_material_requsition_details` WHERE `fmrd_slno`='$fmrd_slno'";
										                		$sql_get_info=mysqli_query($conn,$get_info);
										                		$fetch_details=mysqli_fetch_assoc($sql_get_info);
										                	?>
					                					</td>
					                					<!-- item code -->
					                					<td><?=$fmrd_name_item=$fetch_details['fmrd_name_item']?><input type="hidden" name="fmrd_name_item[]" value="<?=$fetch_details['fmrd_name_item']?>" required="">
										                </td>
										                <!-- Item Name -->
										                <td><?=$maintenance_id=$fetch_details['maintenance_id']?><input type="hidden" name="maintenance_id[]" value="<?=$fetch_details['maintenance_id']?>" required="">
										                </td>
										                <!-- Machine No -->
										                <td><?=$fmrd_request_qnt=$fetch_details['fmrd_request_qnt']?><input type="hidden" name="fmrd_request_qnt[]" value="<?=$fetch_details['fmrd_request_qnt']?>" required="">
										                </td>
										                <!-- Request Quantity -->
										                <td><?=$zqzis_issue_qnt=$fetch_item['zqzis_issue_qnt']?><input type="hidden" name="zqzis_issue_qnt[]" value="<?=$fetch_item['zqzis_issue_qnt']?>" required="">
										                </td>
										                <!-- Issued Quantity -->
										                
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
