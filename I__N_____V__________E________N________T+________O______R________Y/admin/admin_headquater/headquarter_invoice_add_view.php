<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Invoice Details Information  ";
 // Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [Token_id] => W4tB9n5Mf9PA1gLcqaqGjqpthQtrHfuTYb7Fc06ehvM= [access] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 
 $location=$_SESSION['hq_store_id'];
 
?>
<style type="text/css">
.panel-body p {
    margin-top: 10px;
}
.form-control[disabled],.form-control[readonly] {
    color: #000809;

}

</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Of Invoices Added</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Invoice</li>
				<!-- <li class="">Lead Time Analysis</li> -->				
				<li class="active">View Invoice Details </li>
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
				 <div class="panel-title">View Invoice</div>
				   </div>
				     <div class="panel-body">
					   	<div class="table-responsive">
                       	  <table id="example77" class="display nowrap" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Sl.No</th>
									<th>Unit No</th>
									<th>Data</th>
									<th>Time</th>
									<th>Action</th>
								</tr>
							</thead>
	        					<tbody>
	        						<?php
	        					
	        							$x=0;
	        							$item="SELECT * FROM `lt_master_invoices_amount` WHERE `status`='1'";
	        							$sql_item_exe=mysqli_query($conn,$item);
	        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
	        								// print_r($fetch_item);
	        								$x++;
	        								$lid=web_encryptIt($fetch_item['slno_invoice']);
											// $site_list=web_encryptIt($fetch_item['challan_number']);
											// $location_from=$fetch_item['location_from'];
	        								?>
	        						   <tr>
		                 			    <td><?=$x?></td>
									    <td><?=strtoupper($fetch_item['unit_no'])?></td>
									    <td><?=$fetch_item['date']?></td>
									    <td><?=$fetch_item['time']?></td>
						                 <td>
				        					<?php 
				        					if($fetch_item['status_invoice_status']==0){?>
				        						<a class="btn btn-info btn-xs" href="headquarter_invoice_add_invoice.php?token_name=<?=$lid?>">Enter Invoice Detail</a><br><br>
				        					<?php 
				        					}

				        					if($fetch_item['payment_receive_status']==0){ 
				        						?>
				        						<a class="btn btn-success btn-xs" href="headquarter_invoice_add_payment.php?token_name=<?=$lid?>">Enter Payment Received Amount</a> <br><br>
				        						<?php 
				        					}
				        					if($fetch_item['deduction_status']==0){
				        						?>
				        						<a class="btn btn-default btn-xs" style="background: lightblue" href="headquarter_invoice_add_Deduction.php?token_name=<?=$lid?>">Enter Deduction Details</a> <br><br>

				        						<?php
				        					}
				        					if($fetch_item['vender_details_status']==0){
				        						?>
				        						<a class="btn btn-primary btn-xs" href="headquarter_invoice_add_Vendor.php?token_name=<?=$lid?>">Enter Vendor Details</a> <br><br>
				        						<?php

				        					}
				        					
				        					?>
				        					<a class="btn btn-xs" style="background: lightgreen" href="headquarter_invoice_add_view_details.php?token_name=<?=$lid?>">View Detail</a>
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
	    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(5),:eq(6)").each( function () {
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
