<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin_zonal']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="";
  $slno_transfer_id=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $request_id=web_decryptIt(str_replace(" ", "+", $_GET['token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
 $zonal_place=$_SESSION['zonal_place'];
 // Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [token_id] => FEDq3VVapiPxKPI9icnbSCMb5MU59pZ4pDZ144815Ks= [status] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 


?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
			<ul class="breadcrumb">
				<li><a href="#"></a></li>
				<!-- <li class="active">Dashboards</li> -->
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
		<?php $msg->display(); ?>			
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-default">
			   		<div class="panel-heading">
						<div class="panel-title">Trasfer Item  </div>
				    </div>
				    <div class="panel-body">
				    	<div class="table-responsive">
				    		<form name="Myform" action="zonal_transfer_raise_t_approved_update.php" method="POST">
				    		
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
									    <th>MR Id</th>
									    <th>Request Id </th>	
			 						    <th>Secondary Code </th>
			 						    <th>Requested Quantity </th> 
			 						    <th>Avaliable Quantity</th>	
			 						    <th>Action</th> 						   
			 						   
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php 
				        				$hq_store_id=$_SESSION['zonal_place'];
				        				// `slno_transfer_id`, `primary_id`, `quantity`, `mr_id`, `location_from`, `location_to`, `request_id`
				        				$x=0;


				        				// SELECT * FROM `lt_master_hq_transfer_mr_zonal` WHERE `location_to`='zonal001' and `request_status`='1' and `request_id`='17-12-09-hq-trasfer/1'

				        				
				        				$Requsition_query="SELECT * FROM `lt_master_hq_transfer_mr_zonal` WHERE `request_status`='1' and `request_id`='$request_id'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				$result=mysqli_fetch_assoc($sql_Requsition_exe) ;
				        					$x++;
				        					$lid=web_encryptIt($result['slno_transfer_id']);
											$site_list=web_encryptIt($result['request_id']);
											$primary_ids=$result['primary_id'];
				        				$get_detail="SELECT * FROM `lt_master_zonal_stock_info` WHERE `zonal_primary_code`='$primary_ids' and `zonal_location_id`='$zonal_place'";
				        				$sql_get_info=mysqli_query($conn,$get_detail);
				        				// echo mysqli_error($conn);
				        				echo $num_sw=mysqli_num_rows($sql_get_info);
				        				if($num_sw!=0){
				        					$fetch_get_details=mysqli_fetch_assoc($sql_get_info);
				        			?>
				        			<tr>
				        				<input type="hidden" name="slno_transfer_id" value="<?=$slno_transfer_id?>">
				        				<input type="hidden" name="request_id" value="<?=$site_list?>">
				        				<td><?=$x?></td>
				        				<td><?=strtoupper($result['mr_id'])?></td>
				        				<td><?=strtoupper($result['request_id'])?></td>
				        				<td><?php echo strtoupper($fetch_get_details['zonal_secondary_code']);
				        				?>

				        			    <input type="hidden" name="primary_id" value="<?=$result['primary_id']?>"></td>
				        				<td><?=strtoupper($result['quantity'])?><input type="hidden" name="quantity" value="<?=$result['quantity']?>"></td>
				        				<td><?php echo strtoupper($fetch_get_details['zonal_qnty']);
				        				?></td>
				        				
											 <div class="btn-group">
			                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                                    	Action
			                                    	<i class="icon-three-bars position-right"></i>
			                                    </button>
			                                    <ul class="dropdown-menu">
			                                        <li><a href="zonal_transfer_raise_t_gen_view.php?token_name=<?=$lid?>&token_id=<?=$site_list?>&status=<?php echo web_encryptIt('3')?>" >Issue</a></li>
			                                    </ul> 
			                                </div>
			    		
				        			</tr>
				        			<?php }?>
				        				
				        		</tbody>
				        		
			    			</table>
			    			<br>
					    <!--  <div class="pull-right">
			    			<input type="submit" class="btn-success" name="submit" value="Submit">
			    		   </div> -->
			            </div>
			            </form>
			            </div>
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
    $('#example77 tfoot th').not(":eq(0),:eq(3),:eq(5)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        if (colIdx == 0 || colIdx == 3 || colIdx == 5) return;
        
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
	
	   function check_days_selected(){

	   		var len = $(".roomselect:checked").length;
			if(len==0){
			    alert('Select Any one Site For Request ');
			    return false;
			 }
		}

	
</script>
