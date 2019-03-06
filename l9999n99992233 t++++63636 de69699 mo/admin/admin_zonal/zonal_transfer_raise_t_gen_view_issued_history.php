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
						<div class="panel-title">History Of Transfer Challan Issued  </div>
				    </div>
				    <div class="panel-body">
				    	<div class="table-responsive">
				    		
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
									    <!-- <th>MR Id</th> -->
									    <th>Request Id </th>	
			 						    <th>Secondary Code </th>
			 						    <th>Requested Quantity </th>
			 						     <th>No Days</th>
			 						    <th>Issued Quantity</th>	 						   
			 						   
									</tr>
								</thead>
				        	
				        		<tbody>
				        			<?php 
				        				$hq_store_id=$_SESSION['zonal_place'];
				        				// `slno`, `requested_id`, `requested_slno`, `primary`, `quantity`, `site_id`, `approve_status`, `allow_days`, `allow_quantity`, `allowed_status`, `status`, `date`, `time`
				        				$x=0;
				        				 $Requsition_query="SELECT * FROM `lt_master_hq_request_site` WHERE`allowed_status`='1'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				$result=mysqli_fetch_assoc($sql_Requsition_exe) ;
				        					$x++;
				        					$lid=web_encryptIt($result['slno']);
											$site_list=web_encryptIt($result['requested_id']);
				        			?>
				        			<tr>
				        				<input type="hidden" name="slno" value="<?=$slno?>">
				        				<input type="hidden" name="requested_id" value="<?=$site_list?>">
				        				<td><?=$x?></td>
				        				
				        				
				        				<td><?=$result['requested_id']?></td>
				        				<td><?=$result['primary']?></td>
				        				
				        				<!-- <td><?=$result['quantity']?></td> -->

				        				<td><?=$result['quantity']?><input type="hidden" name="quantity" value="<?=$result['quantity']?>"></td>
				        				<td><?=$result['allow_days']?></td>
										<td><?=$result['allow_quantity']?></td>

				        				
				        			</tr>
				        				
				        		</tbody>
			    			</table>
			    			<br>
			    			<!-- <div class="form-group pull-right">
					 <input type="submit" class="btn btn-info" id="submit" onclick="check_days_selected()"  value="Save" >
				   </div> -->
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
