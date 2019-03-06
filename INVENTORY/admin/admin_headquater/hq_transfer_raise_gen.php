<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="";
  $slno_transfer_id=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $request_id=web_decryptIt(str_replace(" ", "+", $_GET['token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
 $hq_id=$_SESSION['hq_store_id'];
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
						<div class="panel-title">Trasfer Item List </div>
				    </div>
				    <div class="panel-body">
				    	<div class="table-responsive">
				    		<form action="hq_transfer_raise_gen_save.php" method="POST" onsubmit="return check_days_selected()">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
									    <th>MR Id</th>
			 						    <th> Primary Code </th>
			 						    <th> Quantity </th>
			 						    <th> Place Name </th>
			 						    <th> Request Id </th>			 						  <th>Site </th>
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php 
				        				$hq_store_id=$_SESSION['hq_store_id'];
				        				// `slno_transfer_id`, `primary_id`, `quantity`, `mr_id`, `location_from`, `location_to`, `request_id`
				        				$x=0;
				        				 $Requsition_query="SELECT * FROM `lt_master_hq_transfer_mr_zonal` WHERE `location_to`='$hq_store_id' and `request_status`='0' and `request_id`='$request_id'";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['slno_transfer_id']);
											$site_list=web_encryptIt($result['request_id']);
				        			?>
				        			<tr>
				        				<input type="hidden" name="slno_transfer_id" value="<?=$slno_transfer_id?>">
				        				<input type="hidden" name="request_id" value="<?=$site_list?>">
				        				<td><?=$x?></td>
				        				<td><?=strtoupper($result['mr_id'])?></td>
				        				<td><?=strtoupper($result['primary_id'])?>
				        				<input type="hidden" name="primary_id" value="<?=$result['primary_id']?>"></td>
				        				<td><?=strtoupper($result['quantity'])?>
				        				<input type="hidden" name="quantity" value="<?=$result['quantity']?>"></td>
				        				<td>	
				        					<?php 
												$zonal_code=$result['location_from'];
			        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
			        							$sql_exe2=mysqli_query($conn,$query_sql2);
			        							$result2=mysqli_fetch_assoc($sql_exe2);
			        							echo strtoupper($result2['zonal_name']);
											?>
										</td>
				        				<td><?=$result['request_id']?></td>
				        				<td>
				        					<?php
											    $zonal_code1=$result['location_from'];
			        							$query_sql2q="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`!='$zonal_code1' and `hq_code`='$hq_id'";
			        							$sql_exe2q=mysqli_query($conn,$query_sql2q);
			        							while ($result2q=mysqli_fetch_assoc($sql_exe2q)) {
			        							
											        ?>
											        <label class="checkbox-inline checkbox-right">
														<input checked="checked" class="roomselect" name="sites[]" value="<?=$result2q['zonal_code']?>" type="checkbox">
															<?=strtoupper($result2q['zonal_name'])?>
													</label><br>
											        <?php
											    }
											?>
				        				</td>
				        			</tr>
				        				<?php }?>
				        		</tbody>
			    			</table>
			    			<br>
			    
			    			<!-- <div class="row"> -->
			    			<div class="pull-left">
			    				<a href="hq_transfer_raise.php" class="btn btn-warning">Back</a>
			    				
			    			</div>
			    			<div class="form-group pull-right">
							<input type="submit" class="btn btn-info" id="submit" onclick="check_days_selected()"  value="Save" >
						   </div>
						  <!--  </div> -->
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
