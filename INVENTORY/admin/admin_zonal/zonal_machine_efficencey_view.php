<?php
session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Machine Performance Detail ";
$zonal_place=$_SESSION['zonal_place'];

$form_type=web_decryptIt(str_replace(" ", "+", $_GET['form_type']));
if($form_type=="report3"){
// $04/12/2017
$start_date=$_GET['start_date'];
$location=$_GET['location'];
$end_date=$_GET['end_date'];
$date_one=date('Y-m-d',strtotime(trim($start_date)));
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
			<div class="page-title"><i class="icon-display4"></i>View Machine Performance</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Machine Management</li>
				<li class="active">View Machine Performance</li>
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
				 <div class="panel-title">Machine Performance</div>
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
							    <label class="control-label col-lg-4 text-right">Machine : </label>
							    <div class="col-lg-8">
							    	<select class="form-control" name="location" id="location" required="">
											<?php
											$query="SELECT * FROM `lt_master_machine__transfer_information` WHERE `t_status`='1' and `t_store_site_location`='$zonal_place'";
											$sql_exe=mysqli_query($conn,$query);
											while ($res=mysqli_fetch_assoc($sql_exe)) {
										?>
											<option value="<?=$res['t_unique_id_machine']?>" <?php if($res['t_unique_id_machine']==$location){echo "selected";}?>><?=strtoupper($res['t_unique_id_machine'])?></option>
											<?php
										}  
										// `w_h`, `i_h`, `b_d_mcl`, `b_d_lnt`, `avl_hrs`, `shift_hrs`, `picks`, `diesel`, `production`, `site_mine_loc`,
										?>

										</select>
							    	<!-- <select name="location" required>
							    		<option value="">-Select Site Name-</option>
							    		<?php 
							    		$query="SELECT * FROM `lt_master_zonal_place` WHERE `hq_code`='$hq_id' and `status`='1'";
											$sql_exe=mysqli_query($conn,$query);
										while ($res=mysqli_fetch_assoc($sql_exe)) {
												?>
													<option value="<?=$res['zonal_code']?>" <?php if($res['zonal_code']==$location){echo "selected";}?>><?=$res['zonal_name']?></option>
													<?php
												}?>
							    	</select> -->
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
					<br><br>
						<div class="row">

							 <div class="form-group">
						<div class="text-center ">
								    <input type="submit" name="get" Value="Get View">
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
				 <div class="panel-title">Machine Efficency</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
			 						    <th>Month</th>
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
			 						    <th>Date</th>
			 						    <th>Remark</th>
			 						    <th>Reason For Break Down</th>
			 						    <th>Attachment</th>
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php 
				        			
				        			$x=0;
		        				
		        				  $GET_INFO="SELECT * FROM `lt_master_machine_uses` WHERE  `Machine`='$location' AND `date_enter`BETWEEN '$date_one' AND '$date_two'";
		        				$sql_exe=mysqli_query($conn,$GET_INFO);
		        				while ($res=mysqli_fetch_assoc($sql_exe)) {
		        					$x++;
		        					?>
		        					<tr>
		        						<td><?=$x?></td>
									    <td><?=strtoupper($res['month'])?></td>
			 						    <td><?=strtoupper($res['w_h'])?></td>
			 						    <td><?=strtoupper($res['i_h'])?></td>
			 						    <td><?=strtoupper($res['m_t'])?></td>
			 						    <td><?=strtoupper($res['b_d_mcl'])?></td>
			 						    <td><?=strtoupper($res['b_d_lnt'])?></td>
			 						    <td><?=strtoupper($res['avl_hrs'])?></td>
			 						    <td><?=strtoupper($res['shift_hrs'])?></td>
			 						    <td><?=strtoupper($res['picks'])?></td>
			 						    <td><?=strtoupper($res['diesel'])?></td>
			 						    <td><?=strtoupper($res['production'])?></td>
			 						    <td><?=strtoupper($res['site_mine_loc'])?></td>
			 						    <td><?=strtoupper($res['date_enter'])?></td>
			 						    <td width="15%"><p class="text-justify"><?=nl2br(wordwrap(strtoupper($res['Remark']),30,"\r\n"));?></p></td>
			 						    <td width="15%"><p><?=nl2br(wordwrap(strtoupper($res['reason_bd']),30,"\r\n"));?></p></td>
			 						   
			 						  
			 						    <td>
			 						    	<?php 
			 						    	 if($res['nos_attach_files']!=0){
				 						    	$slno=($res['slno']);
				 						    	$get_attach=" SELECT * FROM `lt_master_machine_efficentent_attach` WHERE `slno_id`='$slno' and `status`='1'";
				 						    	$sql_get_attach_exe=mysqli_query($conn,$get_attach);
				 						    	if(mysqli_num_rows($sql_get_attach_exe)!=0){
					 						    	while($fetch_attach_get=mysqli_fetch_assoc($sql_get_attach_exe)){
					 						    	
						 						    	echo "<a href='../uploads/machine_performance/".$fetch_attach_get[attach_name]."'>Click View</a><br>";
						 						    }
						 						}else{
						 							echo "File Has Been Deleted";
						 						}
				 						    }else{
				 						    	echo "No File Is attached";
				 						    }


			 						    ?></td>

		        					</tr>
		        					<?php }?>
		        				</tbody>
				        	</table>
				        </div>
			   		</div>
			   		<div class="panel-footer">
			   			<div class="pull-left">
		    		   		<a href="index.php" class="btn btn-warning">Back</a>
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


