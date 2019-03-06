
<?php
// print_r($_REQUEST);
// exit;
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Head Quarter view Site Requsition Received Detail ";
 $slno=web_decryptIt(str_replace(" ", "+", $_GET['slno']));
 //$list=web_decryptIt(str_replace(" ", "+", $_GET['list']));
 $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
 $challan=$_GET['challan'];
// unset($_GET);
$check="SELECT * FROM `lt_master_hq_challan_generate` where `hqcg_challan_no`='$challan' and `hqcg_status`='0'";
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
					   <form name="myFunction" class="form-horizontal" action="approver_mr_raised_detail_issued_quantity_save.php" method="POST">
					   		
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
									<?php 
										$zonal_code=$fetch_check['hqcg_zonal_location_id'];
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".$result2['zonal_name']."</p>";
									?>
								<input type="hidden" name="hqcg_zonal_location_id" value="<?=$zonal_code?>">
							    
							
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Challan : </label>
							    <div class="col-lg-8">
							    	<input type="hidden" name="hqcg_date" value="<?=$fetch_check['hqcg_date']?>">
									<p><?=$fetch_check['hqcg_date']?></p>
							   </div>
							</div>
							
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="hqcg_site_mr_id" id="hqcg_site_mr_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_site_mr_id']?>" required="">
									<input type="hidden" class="form-control" name="hqcg_slno" id="hqcg_slno" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_slno']?>" required="">
									<p><?=$fetch_check['hqcg_site_mr_id']?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Challan No : </label>
							    <div class="col-lg-8">
							  	<input type="hidden" class="form-control" name="hqcg_challan_no" id="hqcg_challan_no" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_challan_no']?>" required="">
							    <p><?=$fetch_check['hqcg_challan_no']?></p>
							   
							  </div>
							</div>
						   <div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Challan: </label>
							    <div class="col-lg-8">
										<input type="hidden" class="form-control" name="hqcg_time" id="hqcg_time" placeholder="Enter Email Id" autocomplete="off" value="<?=$fetch_check['hqcg_time']?>" required="">
									<p><?=$fetch_check['hqcg_time']?></p>
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
										                <th>Approved Quantity</th>
										                <th>Available In HQ Quantity</th>
										                <th>Issued Quantity</th>
										            </tr>
										         </thead>
					        					<tfoot>
						            				<tr>
						                 				<th>Sl.No</th>
										                <th>Item Code</th>
										                <th>Approved Quantity</th>
										                <th>Available In HQ Quantity</th>
										                <th>Issued Quantity</th>
						            				</tr>
					        				 	 </tfoot>
					        						<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_hq_issue_zonal_info_temp` WHERE `hqzis_challan_id`='$challan'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        						   <tr>
						                 				<td><?=$x?></td>
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=$fetch_item['hqzis_primary_id']?></td><input type="hidden" name="zmrd_slno[]" value="<?=$fetch_item['zmrd_slno']?>" required=""><input type="hidden" name="hqzis_slno[]" value="<?=$fetch_item['hqzis_slno']?>" required="">
										                <input type="hidden" name="hqzis_primary_id[]" id="Primary<?=$x?>" value="<?=$hqzis_primary_id=$fetch_item['hqzis_primary_id']?>" required="">
					                
										                <td><?=$hqzis_approve_qnt_single=$fetch_item['hqzis_approve_qnt']?><input type="hidden" name="hqzis_approve_qnt[]" value="<?=$fetch_item['hqzis_approve_qnt']?>" required="">
										                </td>
										                <!-- <td><?=$fetch_item['hqzis_request_qnt']?></td> -->

                                                        <?php
										                $get_detail="SELECT * FROM `lt_master_hq_stock_info` WHERE `hq_primary_code`='$hqzis_primary_id'";
					        							$get_exe=mysqli_query($conn,$get_detail);
					        							$fetch_item1=mysqli_fetch_assoc($get_exe);
					        							?>
					        							<input type="hidden" name="hq_slno[]" value="<?=$fetch_item1['hq_slno']?>" required="">
										                <td><?=$hq_qnty_single=$fetch_item1['hq_qnty']?>
										                	<input type="hidden" name="hq_qnty[]" value="<?=$fetch_item1['hq_qnty']?>" required="">
										                </td>
										                <?php
										                	if($hq_qnty_single == 0){
																$remain=0;
																 $hqzis_approve_qnt_single=0;
															}else{
																if($hqzis_approve_qnt_single < $hq_qnty_single){
																	 $remain1=$hq_qnty_single-$hqzis_approve_qnt_single;

																}else if($hqzis_approve_qnt_single == $hq_qnty_single){
																	$remain1=$hq_qnty_single-$hqzis_approve_qnt_single;
																}else if($hqzis_approve_qnt_single > $hq_qnty_single){
																	 $remain1=$hq_qnty_single-$hqzis_approve_qnt_single;

																}

																if($remain1<0){
																	$remain=$hqzis_approve_qnt_single-$hq_qnty_single;
																	$hqzis_approve_qnt_single=$hqzis_approve_qnt_single-$remain;
																}else{
																	$remain=$hq_qnty_single-$hqzis_approve_qnt_single;
																}
															}
										                ?>
									                    <td><input type="number" min="0" max="<?=$hqzis_approve_qnt_single?>" value="<?=$hqzis_approve_qnt_single?>" name="hqzis_issue_qnt[]" placeholder=" Enter Quantity">
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
                         	   <input type="hidden" name="total" id="total" value="<?=$x?>">
					   		<div class="form-group pull-left">
					   	<a href="headquarter_receive_site_mr_list.php" class="btn btn-success">Back</a>
			     
				   </div>
				      <div class="form-group pull-right">
					    <input type="submit" name="submit" class="btn btn-success" value="Submit">
			     
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
