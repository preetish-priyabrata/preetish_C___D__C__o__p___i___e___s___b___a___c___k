<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
 // Array ( [token_name] => 93Z/d1ygfbtPCPZ0WGuQwDDYiDCFkSlW29n6UYHfRrg= [token_id] => LfvIa2W1yZwhwgbwXT4j1K 1b6wGVpbncQcRXNk7pyk= [status] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 
 $slno_transfer_id=web_decryptIt(str_replace(" ", "+", $_GET['token_name']));
 $request_id=web_decryptIt(str_replace(" ", "+", $_GET['token_id'])); // 
 $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
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
						<div class="panel-title">List Of Transfer M.R Completed </div>
				    </div>
				    <div class="panel-body">
				   <form action="hq_transfer_raise_t_issue_view_save.php" method="POST">
				    	<div class="table-responsive">
			        		<table id="example77" class="display nowrap" width="100%" cellspacing="0">
							    <thead>
								    <tr>
									    <th>Sl.No</th>
									    <th>MR Id</th>
			 						    <th>Primary Code</th>
			 						    <th>Quantity</th>
			 						    <th>Place Name</th>
			 						    <th>Request Id</th>
			 						    <th>Check</th>
			 						    <th>Action</th>
									</tr>
								</thead>
				        		
				        		<tbody>
				        			<?php 
				        				$hq_store_id=$_SESSION['hq_store_id'];
				        				// `slno_transfer_id`, `primary_id`, `quantity`, `mr_id`, `location_from`, `location_to`, `request_id`
				        				$x=0;
				        				$Requsition_query="SELECT * FROM `lt_master_hq_transfer_mr_zonal` WHERE `location_to`='$hq_store_id' and `request_status`='1' and  `issue_status`='1' and `request_id`='$request_id' ";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) {
				        					$x++;
				        					$lid=web_encryptIt($result['slno_transfer_id']);
											$site_list=web_encryptIt($result['request_id']);
				        			?>
				        			<tr>
				        				<td><?=$x?></td>
				        				<input type="hidden" name="slno_transfer_id" value="<?=$lid?>">
				        				<input type="hidden" name="request_id" value="<?=$site_list?>">
				        				<input type="hidden" name="mr_id" value="<?=$result['mr_id']?>">
				        				<input type="hidden" name="primary_id" id="Primary<?=$x?>" value="<?=$result['primary_id']?>">
				        				<input type="hidden" name="quantity" value="<?=$result['quantity']?>">
				        				<td><?=strtoupper($result['mr_id'])?></td>
				        				<td><?=strtoupper($result['primary_id'])?></td>
				        				<td><?=strtoupper($result['quantity'])?></td>
				        				<td><?php 
										$zonal_code=strtoupper($result['location_from']);
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo strtoupper($result2['zonal_name']);
									?></td>
				        				<td><?=strtoupper($result['request_id'])?></td>
				        				<td>
				        					<i onclick="get_Check(<?=$x?>)">check</i>
				        				</td>
				        				<td>
				        					<select name="action[]" id="change_is<?=$x?>" required>	
										        <option value="">-Action-</option>
										    </select> 
				        				</td>
				        			</tr>
				        				<?php }?>
				        		</tbody>
			    			</table>
			    			 <input type="hidden" name="hq_store_id" id="hq_store_id" value="<?=$_SESSION['hq_store_id']?>">
			            </div>
			              <div class="pull-left">
			    		   <a href="hq_transfer_raise_t_issue_T.php" class="btn btn-warning">Back</a>
			    		  </div>
			            	<div class="form-group pull-right">
							 <input type="submit" class="btn btn-info" id="submit"  value="Issue" >
						   </div>
				    </div>
				</form>
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
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
</script>
<script type="text/javascript">
    function get_Check(id) {
    	// alert();
      var Primarys=$('#Primary'+id).val();
    var hq_store_id=$('#hq_store_id').val();
    // alert(id);
    // alert(Primarys);
    if(Primarys!=""){
      $.ajax({
        type:'POST',
        url:'approver_mr_raised_detail_check_update.php',
        data:'location_id='+hq_store_id+'&field_code='+Primarys,
        success:function(html){
        	// alert(html);
          if(html==1){
          	alert('Avaliable');
          	$('#code'+id).html(" Avaliable ");
          	$('#change_is'+id).html('<option value="1">Issue</option>');
          }else{
          	alert('Not Avaliable');
          	$('#change_is'+id).html('<option value="">--Not Avaliable--</option>');
          	$('#code'+id).html(" Not Avaliable ");
          }
        }
      });
    }else{
      $('#code').html('Error');
    }
    }
</script>

