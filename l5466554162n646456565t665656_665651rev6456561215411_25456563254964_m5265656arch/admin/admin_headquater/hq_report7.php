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
if($form_type=="report5"){
// $04/12/2017
$start_date=$_GET['start_date'];
$location=$_GET['location'];
$end_date=$_GET['end_date'];
$machine=$_GET['machine'];
 $date_one=date('Y-m-d',strtotime(trim($start_date)));
$date_two=date('Y-m-d',strtotime(trim($end_date)));
}else{
	$machine="";
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
			<div class="page-title"><i class="icon-display4"></i>Report On Machine Efficiency</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Reporting</li>
				<li class="active">Machine Efficiency</li>
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
				 <div class="panel-title">Machine Efficiency Report</div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" class="form-horizontal" action="" method="get" >
					   		<input type="hidden" name="form_type" value="<?=web_encryptIt('report5')?>">
					   		<div class="row">
					   		<div class="col-lg-6">
						   	 <div class="form-group">
								    <label class="control-label col-lg-4 text-right">From Date :</label>
								    <div class="col-lg-8">
								    	
									<input type="text" name="start_date" id="start_date" class="filter-textfields" required placeholder="Start Date" value="<?=$start_date?>" />
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Site Name : </label>
							    <div class="col-lg-8">
							    	<select name="location" onchange="detail_location()" id="location" required="">
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
									
									 <input type="text" name="end_date" id="end_date" class="filter-textfields" placeholder="End Date"  value="<?=$end_date?>" required />
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Machine No : </label>
							    <div class="col-lg-8">
							    	<select name="machine" id="machine" required>
							    		<option value="">-Select Machine No--</option>
							    		<?php 
							    			$query="SELECT * FROM `lt_master_machine__transfer_information` WHERE `t_status`='1' and `t_store_site_location`='$location'";
												$sql_exe=mysqli_query($conn,$query);				
													while ($res=mysqli_fetch_assoc($sql_exe)) {
													?>
														<option value="<?=$res['t_unique_id_machine']?>" <?php if($res['t_unique_id_machine']==$machine){echo "Selected";}?>><?=$res['t_unique_id_machine']?></option>
														<?php
													}
												?>
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
		<?php	if($form_type=="report5"){ ?>
			<div class="col-md-12 col-sm-12">
		  	<!-- Basic inputs -->
			 <div class="panel panel-default">
			   <div class="panel-heading">
				 <div class="panel-title">Machine Efficency</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table id="" class="display nowrap table" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>			 						    
			 						    <th>W/H</th>
			 						    <th>I/H</th>
									    <th>M/T</th>
									    <th>B/D MCL</th>
			 						    <th>B/D L&T</th>
									    <th>AVL.HRS</th>
									    <th>Shift Hrs </th>
			 						    <th>Picks</th>
									    <th>Diesel</th>
									    <th>Production</th>
			 						    <th>Site / Mines Location</th>
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php 
				        			// `Machine`, `w_h`, `i_h`, `m_t`, `b_d_mcl`, `b_d_lnt`, `avl_hrs`, `shift_hrs`, `picks`, `diesel`, `production`, `site_mine_loc`, `entry_user_id`, `year`, `month`, `date`, `time`, `status`, `location_id`
				        			$i_h=$m_t=$b_d_mcl=$b_d_lnt=$avl_hrs=$shift_hrs=$picks=$diesel=$production=$w_h=$x=0;
		        					
		        				  $GET_INFO="SELECT * FROM `lt_master_machine_uses` WHERE  `Machine`='$machine' AND `date`BETWEEN '$date_one' AND '$date_two'";
		        				$sql_exe=mysqli_query($conn,$GET_INFO);
		        				while ($res=mysqli_fetch_assoc($sql_exe)) {
		        					$w_h=$w_h+$res['w_h'];
		        					$i_h=$i_h+$res['i_h'];
		        					$m_t=$m_t+$res['m_t'];
		        					$b_d_mcl=$b_d_mcl+$res['b_d_mcl'];
		        					$b_d_lnt=$b_d_lnt+$res['b_d_lnt'];
		        					$avl_hrs=$avl_hrs+$res['avl_hrs'];
		        					$shift_hrs=$shift_hrs+$res['shift_hrs'];
		        					$picks=$picks+$res['picks'];
		        					$diesel=$diesel+$res['diesel'];
		        					$production=$production+$res['production'];

		        					$x++;
		        					?>
		        					<tr>
		        						<td><?=$x?></td>									    
			 						    <td><?=$res['w_h']?></td>
			 						    <td><?=$res['i_h']?></td>
			 						    <td><?=$res['m_t']?></td>
			 						    <td><?=$res['b_d_mcl']?></td>
			 						    <td><?=$res['b_d_lnt']?></td>
			 						    <td><?=$res['avl_hrs']?></td>
			 						    <td><?=$res['shift_hrs']?></td>
			 						    <td><?=$res['picks']?></td>
			 						    <td><?=$res['diesel']?></td>
			 						    <td><?=$res['production']?></td>
			 						    <td><?=$res['site_mine_loc']?></td>
									    
		        					</tr>
		        					<?php }?>
		        				</tbody>
		        				<tfoot>
					            	<tr>
					            		<th>Total</th>			 						   
			 						    <th><?=$w_h?></th>
			 						    <th><?=$i_h?></th>
									    <th><?=$m_t?></th>
									    <th><?=$b_d_mcl?></th>
			 						    <th><?=$b_d_lnt?></th>
									    <th><?=$avl_hrs?></th>
									    <th><?=$shift_hrs?> </th>
			 						    <th><?=$picks?></th>
									    <th><?=$diesel?></th>
									    <th><?=$production?></th>
			 						    <th></th>
									</tr>
				        		</tfoot>
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
