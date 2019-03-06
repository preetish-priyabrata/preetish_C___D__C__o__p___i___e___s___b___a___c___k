<?php
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Head Quarter view Site Requsition Received Detail ";
	$slno_transfer_id=$_POST['slno_transfer_id'];
	$request_id=$_POST['request_id'];
	$hqcg_site_mr_id=$mr_id=$_POST['mr_id'];
	$primary_id=$_POST['primary_id'];
	$quantity=$_POST['quantity'];
	$action=$_POST['action'];
	$hq_store_id=$_POST['hq_store_id'];
		$date=date('y-m-d');
		$time=date('H:i:s');
		$userid=$_SESSION['admin_hq']; // user id hq
	
	$challan_insert=" INSERT INTO `lt_master_hq_challan_generate`(`hqcg_slno`, `hqcg_site_mr_id`, `hqcg_item_issued`, `hqcg_date`, `hqcg_time`,`hqcg_issuer_id`) VALUES (NULL,'$hqcg_site_mr_id','1','$date','$time','$userid')";

	$update_challan=mysqli_query($conn,$challan_insert);

	$last_id=mysqli_insert_id($conn);

	$challan="HQ".date('y-m-d')."/".$last_id;

	$update_challan_list="UPDATE `lt_master_hq_challan_generate` SET `hqcg_challan_no`='$challan' where `hqcg_slno`='$last_id'";
	$update_challan_list_exe=mysqli_query($conn,$update_challan_list);


	 	$array_issue_slno_single=$hqcg_site_mr_id;
        $array_issue_primary_single=$primary_id;

    $check="SELECT * FROM `lt_master_zonal_material_requsition_details` WHERE `zmr_unqiue_mr_id_iteam`='$array_issue_slno_single'and `zmrd_issue_status`='0' and `zmrd_primary_code`='$array_issue_primary_single'";
	$check_exe=mysqli_query($conn,$check);
	$num_rows=mysqli_num_rows($check_exe);
	if($num_rows==1){
		$fetch_detail=mysqli_fetch_assoc($check_exe);
		$hqzis_zonal_mr_id=$fetch_detail['zmr_unqiue_mr_id_iteam'];
	    $hqzis_secondary_id=$fetch_detail['zmrd_second_code'];
	    $hqzis_machine_id=$fetch_detail['zmrd_machine_no'];
	    $hqzis_item_name=$fetch_detail['zmrd_name_item'];
	    $hqzis_item_category_name=$fetch_detail['zmrd_category_name'];
	    $hqzis_item_category_id=$fetch_detail['zmrd_category_id'];
	    $hqzis_request_qnt=$fetch_detail['zmrd_request_qnt'];
	    $hqzis_approve_qnt=$fetch_detail['zmrd_approved_qnt'];
             //$hqzis_item_slno_id=$fetch_detail['hqzis_item_slno_id'];
             //$hqzis_hq_present_stock=$fetch_detail['hqzis_hq_present_stock'];
             //$hqzis_issue_qnt=$fetch_detail['zmrd_issue_qnt'];
             //$hqzis_after_issued_stock=$fetch_detail['hqzis_after_issued_stock'];
        $hqzis_unit=$fetch_detail['zmrd_units_required'];    
        $hqzis_zonal_location_id=$fetch_detail['zmrd_site_location_id'];
        $hqzis_hq_location=$_SESSION['hq_store_id'];

        $insert_query="INSERT INTO `lt_master_hq_issue_zonal_info_temp`(`hqzis_slno`,`zmrd_slno`, `hqzis_challan_id`, `hqzis_zonal_mr_id`, `hqzis_primary_id`, `hqzis_secondary_id`, `hqzis_machine_id`, `hqzis_item_name`, `hqzis_item_category_name`, `hqzis_item_category_id`, `hqzis_request_qnt`, `hqzis_approve_qnt`, `hqzis_unit`, `hqzis_date`, `hqzis_time`, `hqzis_issued_status`, `hqzis_zonal_location_id`, `hqzis_hq_location`) VALUES (NULL,'$array_issue_slno_single','$challan','$hqzis_zonal_mr_id','$array_issue_primary_single','$hqzis_secondary_id','$hqzis_machine_id','$hqzis_item_name','$hqzis_item_category_name','$hqzis_item_category_id','$hqzis_request_qnt','$hqzis_approve_qnt','$hqzis_unit','$date','$time','0','$hqzis_zonal_location_id','$hqzis_hq_location')";

 		$query_exe=mysqli_query($conn,$insert_query);

 		$update3_laoction="UPDATE `lt_master_hq_challan_generate` SET `hqcg_hq_location_id`='$hqzis_hq_location',`hqcg_zonal_location_id`='$hqzis_zonal_location_id'WHERE`hqcg_slno`='$last_id'";

        $query_exe1=mysqli_query($conn,$update3_laoction);
        $msg->success('Please enter quantity to be issued');
        
        $check="SELECT * FROM `lt_master_hq_challan_generate` where `hqcg_challan_no`='$challan' and `hqcg_status`='0'";
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
					   <form name="myFunction" class="form-horizontal" action="hq_transfer_raise_t_issue_view_save_final.php" method="POST">
					   		
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
								<input type="hidden" name="slno_transfer_id" value="<?=$slno_transfer_id?>">
								<input type="hidden" name="request_id" value="<?=$request_id?>">
							    
							
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

 		}
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
