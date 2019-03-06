<?php

session_start();
ob_start();
if($_SESSION['admin_zonal']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Zonal User Received Material Requsition form ";
 // Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [Token_id] => W4tB9n5Mf9PA1gLcqaqGjqpthQtrHfuTYb7Fc06ehvM= [access] => w4LEXdqXcNdWDkqJ/nitm0SoLa5ummDOSd5H56Kb0Ok= ) 
 $zonal_place=$_SESSION['zonal_place'];
  $slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name'])); //fmr_slno
 $list=web_decryptIt(str_replace(" ", "+", $_GET['Token_id'])); //fmr_unqiue_mr_id
 $status=web_decryptIt(str_replace(" ", "+", $_GET['access']));
// unset($_GET);
 $check="SELECT * FROM `lt_master_field_material_requsition` where `fmr_slno`='$slno' and `fmr_unqiue_mr_id`='$list' and `status`='1'";
 $sql_exe=mysqli_query($conn,$check);
 $num=mysqli_num_rows($sql_exe);
if($num!='0'){

}

$fetch_check=mysqli_fetch_assoc($sql_exe);
$field_code=$fetch_check['fmr_site_from_location_id'];
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
			<div class="page-title"><i class="icon-display4"></i> Received Material Requisition Detail</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Requisition Management </li>
				<li class="">Field M.R Received</li>				
				<li class="active">Received Material Requisition Detail</li>
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
				 <div class="panel-title">Field Material Requisition Detail</div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" class="form-horizontal" action="zonal_mr_field_new_issue_save.php" method="POST" >
					   		
						   	<div class="col-lg-6">
						   	 <div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
								    <p><?=strtoupper($fetch_check['fmr_site_from_location_id'])?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of M.R : </label>
							    <div class="col-lg-8">
									<p><?=$fetch_check['date']?></p>
							   </div>
							</div>
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="list_id" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$list?>" required="">
									<input type="hidden" class="form-control" name="slno_id" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=$slno?>" required="">
									<p><?=strtoupper($list)?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of M.R: </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['time']?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Machine No: </label>
							    <div class="col-lg-8">
									
									<p><?=strtoupper($fetch_check['machine_no'])?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Model No: </label>
							    <div class="col-lg-8">
									
									<p><?=strtoupper($fetch_check['model_id'])?></p>
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
				                           <table  class="display nowrap table" width="100%" cellspacing="0">
											 <thead>
											    <tr>
												    <th>Sl.No</th>
						 						    <th>Secondary Code</th>
						 					        <th>Item Name</th>
						 					        <th>Category Name</th>
						 					        <th>Maintenance Id</th>
						 					        <!-- <th>Unit</th> -->
												    <th>Requested Quantity</th>
												    <th>Check</th>
												   	<th>Action </th>
												</tr>
											</thead>
							        		
					        					<tbody>
					        						<?php 
					        					
					        							$x=0;
					        							
					        							$item="SELECT * FROM `lt_master_field_material_requsition_details` WHERE `fmrd_slno_id`='$slno' and `fmr_unqiue_mr_id_iteam`='$list' and `transfer_status`='0' and `fmrd_issue_status`='0'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							$num_item=mysqli_num_rows($sql_item_exe);
					        							if($num_item=='0'){
					        								$msg->success('All Item Selected FMR Has Been Generated Challan');
					        								header('Location:index.php');
															exit;
					        							}
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
					        						   <tr>
						                 				<td><?=$x?></td>
				 									    <!-- <td>Primary Code</td> -->
										                <td><?=strtoupper($fetch_item['fmrd_second_code'])?></td><input type="hidden" name="slno_item[]" value="<?=$fetch_item['fmrd_slno']?>" required="">
										                <input type="hidden" name="fmrd_primary_code[]" id="Primary<?=$x?>" value="<?=$fetch_item['fmrd_primary_code']?>" required=""> 	

										                <td><?=strtoupper($fetch_item['fmrd_name_item'])?></td>
										              	<td><?=strtoupper($fetch_item['fmrd_category_name'])?></td>
										                <td><?=strtoupper($fetch_item['maintenance_id'])?>
										                </td>
										                
										                <td><?=strtoupper($fetch_item['fmrd_request_qnt'])?> <?=strtoupper($fetch_item['fmrd_units_required'])?>
										                </td>
														<td>
															<?php 
										                	if(($fetch_item['transfer_status']==0) && ($fetch_item['fmrd_issue_status']==0)){
										                			?><i onclick="get_Check(<?=$x?>)">check</i>
										                			<span id="code<?=$x?>" style="color: blue;"></span>
										                			<?php 
										                	}
										                	else{
										                		echo "<del><i>Check</i></del>";
										                	}
										                	?></td>  
         									            
    
														 <td>
														 <?php 	if(($fetch_item['transfer_status']==0) && ($fetch_item['fmrd_issue_status']==0)){?>
										                 <select name="action[]" id="change_is<?=$x?>">	
										                   <option value="">-Action-</option>
										               	 </select> 
										               	 <!-- <input type="submit" class="btn-success" name="action[]" value="Issue"> -->
										               	 <?php }else{?>
										               	 <input type="hidden" name="action[]" value="3">
										               	 <?php }?>
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
                         	    <br>
                         	  <input type="hidden" name="zonal_place" id="zonal_place" value="<?=$zonal_place?>">
					   		<div class="form-group pull-left"> 
					   	 <button type="button" onclick="close_window()" class="btn btn-success btn-md" class="btn btn-default">Back</button>
		 	 		  </div> 
		 	 		<div class="form-group pull-right"> 
		 	   	  <input type="submit" class="btn btn-success btn-md" name="Next" value="Next">
		 	   </div>
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
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(5),:eq(6)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
 
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
<script type="text/javascript">
    function get_Check(id) {
    	// alert();
      var Primarys=$('#Primary'+id).val();
    var hq_store_id=$('#zonal_place').val();
    // alert(id);
    // alert(Primarys);
    if(Primarys!=""){
      $.ajax({
        type:'POST',
        url:'zonal_mr_field_check_update.php',
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