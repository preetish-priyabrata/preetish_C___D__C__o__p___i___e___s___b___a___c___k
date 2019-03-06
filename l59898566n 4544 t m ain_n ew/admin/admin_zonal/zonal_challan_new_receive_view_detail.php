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
$title="Zonal Received Detail challan ";
$zonal_place=$_SESSION['zonal_place'];
// Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [Token_id] => 6OMpYvBRGR0JySEbRUT2kiUU1fbH4lZWU6nYoG8vobY= [access] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 
 $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $challan=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['access']));
 
// unset($_GET);
$check="SELECT * FROM `lt_master_hq_challan_generate` where `hqcg_challan_no`='$challan' and `hqcg_status`='1' and  `hqcg_zonal_location_id`='$zonal_place' ";
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
			<div class="page-title"><i class="icon-display4"></i>Received Challan Detail</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Challan Information </li>
				<li class="">Challan Receive </li>				
				<li class="active">Receive Of Challan Issued From HQ</li>
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
				 <div class="panel-title">Challan Detail</div>
				   </div>
				     <div class="panel-body">
				     	<?php 
				     	if($status==3){?>
				     	<form name="myFunction" class="form-horizontal" action="#">
				     	<?php }else if($status==2){?>
					   <form name="myFunction" class="form-horizontal" action="zonal_Challan_new_issue_receive_save.php" method="POST">
					   	<?php  }else{
						?>
						<form name="myFunction" class="form-horizontal" action="#">

					   		<?php }?>	
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Head Quater Location Name :</label>
								    <div class="col-lg-8">
									<?php 
										$hqcg_hq_location_id=$fetch_check['hqcg_hq_location_id'];
	        							$query_sql2="SELECT * FROM `lt_master_HQ_place` WHERE `hq_code`='$hqcg_hq_location_id'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".$result2['hq_name']."</p>";
									?>
								<input type="hidden" name="hqcg_hq_location_id" value="<?=$hqcg_hq_location_id?>">
							    
							
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
							    <label class="control-label col-lg-4 text-right">Date of Challan Receive : </label>
							    <div class="col-lg-8">
							    	<input type="hidden" name="date_receive" value="<?=date('Y-m-d')?>">
									<p><?=date('d-m-Y')?></p>
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
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Challan Receive: </label>
							    <div class="col-lg-8">
										<input type="hidden" class="form-control" name="time_receive" id="time_receive" placeholder="Enter Email Id" autocomplete="off" value="<?=date('H:i:s')?>" required="">
									<p><?=date('H:i:s a')?></p>
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
										                <th>Machine No</th>
										                <th>Request Quantity</th>
										                <th>Issued Quantity</th>
										                <th>Recieive Quantity</th>
										                <th>Damage Quantity</th>
										                <th>Good Quantity</th>
										            </tr>
										         </thead>
					        					<tfoot>
						            				<tr>
						                 				<th>Sl.No</th>
										                <th>Item Code</th>
										                <th>Item Name</th>
										                <th>Machine No</th>
										                <th>Request Quantity</th>
										                <th>Issued Quantity</th>
										                <th>Recieive Quantity</th>
										                <th>Damage Quantity</th>
										                <th>Good Quantity</th>
						            				</tr>
					        				 	 </tfoot>
					        						<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `hqzis_challan_id`='$challan'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        						   <tr>
						                 				<td><?=$x?></td>
						                 				<!-- serial no -->
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=$fetch_item['hqzis_secondary_id']?>
										                	<input type="hidden" name="zmrd_slno[]" value="<?=$zmrd_slno=$fetch_item['zmrd_slno']?>" required=""><input type="hidden" name="hqzis_slno[]" value="<?=$fetch_item['hqzis_slno']?>" required="">
										                	<input type="hidden" name="hqzis_primary_id[]" id="Primary<?=$x?>" value="<?=$hqzis_primary_id=$fetch_item['hqzis_primary_id']?>" required="">
										                	<input type="hidden" name="hqzis_secondary_id[]" id="Primary<?=$x?>" value="<?=$hqzis_secondary_id=$fetch_item['hqzis_secondary_id']?>" required="">
										                	<?php 
										                		$get_info="SELECT * FROM `lt_master_zonal_material_requsition_details` WHERE `zmrd_slno`='$zmrd_slno'";
										                		$sql_get_info=mysqli_query($conn,$get_info);
										                		$fetch_details=mysqli_fetch_assoc($sql_get_info);
										                	?>
					                					</td>
					                					<!-- item code -->
					                					<td><?=$zmrd_name_item=$fetch_details['zmrd_name_item']?><input type="hidden" name="zmrd_name_item[]" value="<?=$fetch_details['zmrd_name_item']?>" required="">
										                </td>
										                <!-- Item Name -->
										                <td><?=$zmrd_machine_no=$fetch_details['zmrd_machine_no']?><input type="hidden" name="zmrd_machine_no[]" value="<?=$fetch_details['zmrd_machine_no']?>" required="">
										                </td>
										                <!-- Machine No -->
										                <td><?=$zmrd_request_qnt=$fetch_details['zmrd_request_qnt']?><input type="hidden" name="zmrd_request_qnt[]" value="<?=$fetch_details['zmrd_request_qnt']?>" required="">
										                </td>
										                <!-- Request Quantity -->
										                <td><?=$hqzis_issue_qnt=$fetch_item['hqzis_issue_qnt']?><input type="hidden" name="hqzis_issue_qnt[]" value="<?=$fetch_item['hqzis_issue_qnt']?>" required="">
										                </td>
										                <!-- Issued Quantity -->
										                
										                <td><?=$hqzis_received_qnty=$fetch_item['hqzis_received_qnty']?><input type="hidden" name="hqzis_received_qnty[]" value="<?=$fetch_item['hqzis_received_qnty']?>" required=""></td>

										                <!-- received Quantity -->

                                                         <td><?=$damage_loss=$fetch_item['damage_loss']?><input type="hidden" name="damage_loss[]" value="<?=$fetch_item['damage_loss']?>" required=""></td>
										               	
										                <!-- Damage Quantity -->

										                <td><?=$receive_qnty=$fetch_item['receive_qnty']?><input type="hidden" name="receive_qnty[]" value="<?=$fetch_item['receive_qnty']?>" required=""></td>
										                <!--Good Quantity-->
										                
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
                         	   <?php 
				     	if($status==2){
				     		?>
				     	<div class="form-group pull-left">
					   		<a href="zonal_Challan_new_issue.php" class="btn btn-success">Back</a>
			     
				   		</div>
				     <?php	}
				?>
				   <?php 
				     	if($status==3){

				     	}else{?>
				     		 <div class="form-group pull-right">
								    <input type="submit" name="submit" onclick="return confirm('Are you sure want to submit this?');"  class="btn btn-success" value="Submit">
						     
							   </div>
				     	<?php }?>
				     
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
   $('option:not([value])').remove();
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(2),:eq(3),:eq(5),:eq(6),:eq(7),:eq(8),:eq(9),:eq(10),:eq(11)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable({
    	scrollX:        true,
    	columnDefs: [
            { width: '20%', targets: 0 }
        ],
    });
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 4|| colIdx == 2 || colIdx == 3 || colIdx == 5 || colIdx == 6 || colIdx == 7|| colIdx == 8 || colIdx == 9 || colIdx == 10 || colIdx == 11 ) return;
        
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
