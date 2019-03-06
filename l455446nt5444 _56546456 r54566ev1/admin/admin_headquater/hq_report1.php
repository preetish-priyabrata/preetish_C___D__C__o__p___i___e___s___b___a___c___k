<?php
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Machine Spare Consumption";

$hq_id=$_SESSION['hq_store_id'];
$form_type=web_decryptIt(str_replace(" ", "+", $_GET['form_type']));
if($form_type=="report3"){
// $04/12/2017
$start_date=$_GET['start_date'];
$location=$_GET['location'];
$end_date=$_GET['end_date'];
$category_name=$_GET['category_name'];
echo $date_one=date('Y-m-d',strtotime(trim($start_date)));
$date_two=date('Y-m-d',strtotime(trim($end_date)));
}else{
	$start_date="";
	$location="";
	$end_date="";
	$category_name="0";
}
?>
<!--   
  <link rel="stylesheet" href="/resources/demos/style.css">
  
   -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
 
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Report On Machine Spare Consumption</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Reporting</li>
				<li class="active">Report On Machine Spare Consumption</li>
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
				 <div class="panel-title">Machine Spare Consumption Report </div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" class="form-horizontal" action="" method="get" >
					   		<input type="hidden" name="form_type" value="<?=web_encryptIt('report3')?>">
					   		<div class="row">
					   		<div class="col-lg-6">
						   	 <div class="form-group">
								    <label class="control-label col-lg-4 text-right">From Date :</label>
								    <div class="col-lg-8">
									<input type="text" name="start_date" id="start_date" class="filter-textfields" placeholder="Start Date" required value="<?=$start_date?>" />
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Machine No : </label>
							    <div class="col-lg-8">
							    	<select name="location" >
							    		<option value="">-Select Machine No-</option>
							    		<?php 
							    		$query="SELECT DISTINCT `t_unique_id_machine` FROM `lt_master_machine__transfer_information`  ";
											$sql_exe=mysqli_query($conn,$query);
											while ($res=mysqli_fetch_assoc($sql_exe)) {
											?>
												<option value="<?=$res['t_unique_id_machine']?>"  <?php if($res['t_unique_id_machine']==$location){echo "selected";}?>><?=strtoupper($res['t_unique_id_machine'])?></option>
												<?php
											}
										
												?>
							    	</select>
							    </div>
							</div>
							
							
						</div>
						<div class="col-lg-6">
						   	 <div class="form-group">
								    <label class="control-label col-lg-4 text-right">To Date :</label>
								    <div class="col-lg-8">
									
									 <input type="text" required name="end_date" id="end_date" class="filter-textfields" placeholder="End Date"  value="<?=$end_date?>"/>
							   </div>
							</div>
							<div class="form-group">
						  <label class="control-label col-lg-4 text-right"> Component Category * </label>
							 <div class="col-lg-8">
						       <select class="form-control" name="category_name" autocomplete="off"  id="demo" type="dropdown" required="">
								    <option value="0"  <?php if(0==$category_name){echo "selected";}?>> All</option>
								    <?php
	                				 $query_view_category = "SELECT  * FROM `lt_master_item_category` where `status`='1'";
	                  				 $exe_view_category = mysqli_query($conn,$query_view_category);
	                				                
	                  				 while($rec_category = mysqli_fetch_assoc($exe_view_category)){?>
	                    			<option value="<?php echo $rec_category['slno'];?>" <?php if($rec_category['slno']==$category_name){echo "selected";}?>><?=strtoupper($rec_category['category_name']);?></option>
	             					 <?php }?>
	               					
								</select>
						   	</div>
						   </div>
							
							
						</div>
					</div>
						<div class="row">
							 <div class="form-group">
						<div class="text-center ">
								    <input type="submit" name="get" Value="Get Report">
							   </div>
							</div>
						</div>
					   	</form>
			   		</div>
				</div>						
			</div>
		<?php	if($form_type=="report3"){ ?>
			<div class="col-md-12 col-sm-12">
		  	<!-- Basic inputs -->
			 <div class="panel panel-default">
			   <div class="panel-heading">
				 <div class="panel-title">Site Material Requisition</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Machine No</th>
			 						    <th>Date</th>
			 						    <th>Item Code</th>
			 						    <th>Category Type</th>
			 						    <th>Field Location</th>
			 						    <!-- <th>Avaliable Stock Quantity</th>
			 						    <th></th> -->
			 						    <th>Used Quantity</th>
			 						    <th>Price Rate</th>
			 						    <th>Total Price</th>
									    
									   	
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php 
				        			// fmgd_category_id
				        			$x=0;
				        			if($location!=""){
					        			if($category_name==0){
					        				$GET_INFO="SELECT * FROM `lt_master_field_maintenance_job_detail` WHERE `fmgd_machine_no`='$location' AND `date`BETWEEN '$date_one' AND '$date_two'";
					        			}else{
					        				$GET_INFO="SELECT * FROM `lt_master_field_maintenance_job_detail` WHERE `fmgd_machine_no`='$location' and `fmgd_category_id`='$category_name' AND `date`BETWEEN '$date_one' AND '$date_two'";
					        			}
					        		}else{
					        			if($category_name==0){
					        				$GET_INFO="SELECT * FROM `lt_master_field_maintenance_job_detail` WHERE `date`BETWEEN '$date_one' AND '$date_two'";
					        			}else{
					        				$GET_INFO="SELECT * FROM `lt_master_field_maintenance_job_detail` WHERE `fmgd_category_id`='$category_name' AND `date`BETWEEN '$date_one' AND '$date_two'";
					        			}
					        			
					        		}
		        				
		        				$sql_exe=mysqli_query($conn,$GET_INFO);
		        				while ($res=mysqli_fetch_assoc($sql_exe)) {
		        					$lid=web_encryptIt($res['zmr_slno']);
									$site_list=web_encryptIt($res['zmr_unqiue_mr_id']);
		        					$x++;
		        					?>
		        					<tr>
		        						<td><?=$x?></td>
									    <td><?=strtoupper($res['fmgd_machine_no'])?></td>
			 						    <td><?=$res['date']?></td>
			 						    <td><?=strtoupper($res['fmgd_primary_id'])?></td>
			 						    <td><?=strtoupper($res['fmgd_category_name'])?></td>
			 						    <?php
			 						    $field_code=$res['fmgd_field_id'];
	        							$query_sql2="SELECT * FROM `lt_master_field_place` WHERE `field_code`='$field_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							?>
	        							<td><?php echo "<p>".strtoupper($result2['field_name'])."</p>"?></td>
	        							<!-- <td><?=$res['fmgd_available_id']?></td> -->
			 						    <td><?=$res['total_issued']?> <?=strtoupper($res['fmgd_unit_id'])?></td>
			 						    <td>INR <?=round($res['rate_unit_charged'],2)?></td>
			 						     <td>INR <?=round((round($res['rate_unit_charged'],2)*$res['total_issued']),2)?></td>
		        					</tr>
		        					<?php }?>
		        				</tbody>
				        	</table>
				        </div>
			   		</div>
				</div>						
			</div>

			<?php }?>
			
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(2),:eq(3),:eq(5),:eq(6)").each( function () {
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
        if (colIdx == 0 || colIdx == 4|| colIdx == 2 || colIdx == 3 || colIdx == 5 || colIdx == 6  ) return;
        
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );


	$( "#start_date" ).datepicker({
				changeMonth: true,
      			changeYear: true,
				maxDate: '0d', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate','minDate', jQuery('#end_date').val() );
				},
				// altFormat: "dd/mm/yy", 
				// dateFormat: 'dd/mm/yy'
				
			}
			
	);

	$( "#end_date" ).datepicker({
				changeMonth: true,
      			changeYear: true,
				maxDate: '0d', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','minDate', jQuery('#start_date').val() );
				} , 
				// altFormat: "dd/mm/yy", 
				// dateFormat: 'dd/mm/yy'
				
			}
			
	);

</script>

