<?php
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Field Maintenance Job View List ";

$hq_id=$_SESSION['hq_store_id'];
$form_type=web_decryptIt(str_replace(" ", "+", $_GET['form_type']));
if($form_type=="report3"){
// $04/12/2017
$start_date=$_GET['start_date'];
$location=$_GET['location'];
$end_date=$_GET['end_date'];
echo $date_one=date('Y-m-d',strtotime(trim($start_date)));
$date_two=date('Y-m-d',strtotime(trim($end_date)));
}else{
	$start_date="";
	$location="";
	$end_date="";
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
			<div class="page-title"><i class="icon-display4"></i>Report On Lead Time Analysis</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Reporting</li>
				<li class="active">Lead Time Analysis</li>
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
				 <div class="panel-title">Lead Time Analysis Report </div>
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
							    <label class="control-label col-lg-4 text-right">Site Name : </label>
							    <div class="col-lg-8">
							    	<select name="location" required>
							    		<option value="">-Select Site Name-</option>
							    		<?php 
							    		$query="SELECT * FROM `lt_master_zonal_place` WHERE `hq_code`='$hq_id' and `status`='1'";
											$sql_exe=mysqli_query($conn,$query);
										while ($res=mysqli_fetch_assoc($sql_exe)) {
												?>
													<option value="<?=$res['zonal_code']?>" <?php if($res['zonal_code']==$location){echo "selected";}?>><?=$res['zonal_name']?></option>
													<?php
												}?>
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
			 						    <th>MR ID</th>
			 						    <th>Date</th>
			 						    <th>Time</th>
									    <th>Action</th>
									    
									   	
									</tr>
								</thead>
				        		<tfoot>
					            	<tr>
					            		<th>Sl.No</th>
			 						    <th>MR ID</th>
			 						    <th>Date</th>
			 						    <th>Time</th>
									    <th>Action</th>
									    
									</tr>
				        		</tfoot>
				        		<tbody>
				        			<?php 
				        			
				        			$x=0;
		        				 $GET_INFO="SELECT * FROM `lt_master_zonal_material_requsition` WHERE `zmr_site_from_location_id`='$location' AND `date`BETWEEN '$date_one' AND '$date_two'";
		        				$sql_exe=mysqli_query($conn,$GET_INFO);
		        				while ($res=mysqli_fetch_assoc($sql_exe)) {
		        					$lid=web_encryptIt($res['zmr_slno']);
											$site_list=web_encryptIt($res['zmr_unqiue_mr_id']);
		        					$x++;
		        					?>
		        					<tr>
		        						<td><?=$x?></td>
									    <td><?=$res['zmr_unqiue_mr_id']?></td>
			 						    <td><?=$res['date']?></td>
			 						    <td><?=$res['time']?></td>
			 						    <td>
				        					<div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="hq_requisition_view.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt('3')?>" target="_blank" >View Detail Requisition</a></li>
			                                        <li class="divider"></li>
			                                        <li><a href="hq_requisition_challan_list_view.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt('2')?>" target="_blank" >Issued Challan</a></li>
			                                        <li class="divider"></li>
			                                        <li><a href="hq_requisition_challan_receive_list_view.php?token_name=<?=$lid?>&Token_id=<?=$site_list?>&access=<?php echo web_encryptIt('2')?>" target="_blank" >Received Challan</a></li>
			                                    </ul>
			                                </div>
				        			   	 </td>
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
    var table = $('#example77').DataTable();
 
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


	$( "#start_date" ).datepicker(
	
			{ 
				maxDate: '0d', 
				beforeShow : function()
				{
					jQuery( this ).datepicker('option','maxDate','minDate', jQuery('#end_date').val() );
				},
				// altFormat: "dd/mm/yy", 
				// dateFormat: 'dd/mm/yy'
				
			}
			
	);

	$( "#end_date" ).datepicker( 
	
			{
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
