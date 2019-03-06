<?php
// print_r($_REQUEST);
// exit;
// Array ( [slno] => Nzq6mzbwAYNGhKPhBYtu39f5vH7nnvpp/IV9 8nsc4I= [list] => Nzq6mzbwAYNGhKPhBYtu39f5vH7nnvpp/IV9 8nsc4I= ) 
session_start();
ob_start();
if($_SESSION['admin_hq']){
require 'FlashMessages.php';
include  '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Head Quarter view Site Requsition Issue Detail ";
// $zonal_place=$_SESSION['zonal_place'];
 $slno=web_decryptIt(str_replace(" ", "+", $_GET['slno'])); //zmr_slno
 $list=web_decryptIt(str_replace(" ", "+", $_GET['list'])); //zmr_unqiue_mr_id
 
// unset($_GET);
$check="SELECT * FROM `lt_master_hq_challan_generate` where `hqcg_slno`='$slno' and `hqcg_challan_no`='$list' and `send_status`='0'";
$sql_exe=mysqli_query($conn,$check);
$num=mysqli_num_rows($sql_exe);
if($num=='0'){

}
$fetch_checks=mysqli_fetch_assoc($sql_exe);
// $zonal_code=$fetch_checks['hqcg_challan_no'];
$zmr_unqiue_mr_id=$fetch_checks['hqcg_site_mr_id'];
$checks="SELECT * FROM `lt_master_zonal_material_requsition` where `zmr_unqiue_mr_id`='$zmr_unqiue_mr_id'";
$sql_exes=mysqli_query($conn,$checks);
$fetch_check=mysqli_fetch_assoc($sql_exes);
$zonal_code=$fetch_check['zmr_site_from_location_id'];
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
		    <div class="page-title"><i class="icon-display4"></i> Material Requsitions To Be Issued</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">S.M.R Management  </li>
				<li class="">S.M.R Received</li>				
				<li class="active">Material Requsition To Be Issued</li>
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
				 <div class="panel-title">Requsition Detail</div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" class="form-horizontal" action="approver_mr_raised_detail_issue_section_save.php" method="POST" >
					   		<input type="hidden" name="form_types" value="send" required="">
						   	<div class="col-lg-6">
						   	 <div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
									
									<?php 
										
	        							$query_sql2="SELECT * FROM `lt_master_zonal_place` WHERE `zonal_code`='$zonal_code'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".$result2['address_1']."</p>";
	        							echo "<p>".$result2['address_2']."</p>";
	        							echo "<p>C/O".$result2['address_3'].", " . $result2['address_4']."</p>";	        							
	        							echo "<p>".$result2['address_5'].", ".$result2['address_6'].", ".$result2['address_7'];
	        							echo "<p>".$result2['address_8']."</p>";
									?>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of M.R : </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['date']?></p>
							   </div>
							</div>
							<?php if($fetch_check['forward_status']=="1"){	?>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date of Approved M.R : </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['approver_date']?></p>
							   </div>
							</div>
							<?php }?>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Requisition Id : </label>
							    <div class="col-lg-8">
									<input type="hidden" name="challan_slno" value="<?=$slno?>" required="">
									<input type="hidden" name="challan_id" value="<?=$list?>" required="">
									<input type="hidden" name="zmr_unqiue_mr_id" value="<?=$zmr_unqiue_mr_id?>" required="">
									<p><?=$zmr_unqiue_mr_id?></p>
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Approver : </label>
							    <div class="col-lg-8">
							    <select class="form-control" name="approver_id" required="" readonly>
							    	<?php 
							    		$Approver_IDS=$fetch_check['zmr_forward_id'];
							    		$query_sql="SELECT * FROM `lt_master_user_system` WHERE `u_status`='1'and `user_level`='2' and `user_id`='$Approver_IDS'";
	        							$sql_exe=mysqli_query($conn,$query_sql);
	        							while ($result=mysqli_fetch_assoc($sql_exe)) {?>
	        								<option value="<?=$result['user_id']?>" <?php if($result['user_id']==$fetch_check['zmr_forward_id']){ echo "selected"; } ?> ><?=$result['user_name']?></option>
	        							<?php 

	        							}
	        							?>
							    </select>
									
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of M.R: </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['time']?></p>
							   </div>
							</div>
							<?php if($fetch_check['forward_status']=="3"){	?>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time Of Approved M.R : </label>
							    <div class="col-lg-8">
									
									<p><?=$fetch_check['approver_time']?></p>
							   </div>
							</div>
							<?php }?>
							
						</div>
						<div class="col-lg-6">
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">DC No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="dc_no" class="form-control" placeholder="Enter DC No" value="<?=$fetch_checks['dc_no']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="date_enter" class="form-control" data-toggle="datepicker" placeholder="Enter Date" value="<?=$fetch_checks['date_enter']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Indent No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="Indent_no" class="form-control" placeholder="Enter Indent No " value="<?=$fetch_checks['Indent_no']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Vehicle No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="Vehicle_no" class="form-control" placeholder="Enter Vehicle No" value="<?=$fetch_checks['Vehicle_no']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">LR No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="LR_no" class="form-control" placeholder="Enter LR No" value="<?=$fetch_checks['LR_no']?>" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">LR Date : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="LR_date" class="form-control" data-toggle="datepicker" value="<?=$fetch_checks['LR_date']?>" placeholder="Enter LR Date" required="">
							   </div>
							</div>
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right"> Project No : </label>
							    <div class="col-lg-8">
									
									<input type="text" name="Project_No" class="form-control" placeholder="Enter Project No" value="<?=$fetch_checks['Project_No']?>" required="">
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
										                <th>HSN Code</th>
										                <th>Primary Code</th>
										                <th>Secondary Code</th>
										                <th>Description</th>
										              	<th>Approved Quantity</th>
										              	<th>Issue Quantity</th>
										              	<th>Rate</th>
										              	<th>Total Price</th>
										            </tr>
										         </thead>
					        					
					        					<tbody>
					        						<?php 
					        							$x=0;
					        							$item="SELECT * FROM `lt_master_hq_issue_zonal_info` WHERE `hqzis_challan_id`='$list' AND`hqzis_issued_status`='2'";
					        							$sql_item_exe=mysqli_query($conn,$item);
					        							while ($fetch_item=mysqli_fetch_assoc($sql_item_exe)) {
					        								$x++;
					        								?>
                                                        <tr>
					        								<td><?=$x?></td>
					        								<td><?=$fetch_item['hqzis_hsn_id']?></td>
					        								<td><?=$fetch_item['hqzis_primary_id']?></td>
					        								<td><?=$fetch_item['hqzis_secondary_id']?></td>
					        								<td><?=$fetch_item['hqzis_item_name']?></td>
					        								<td><?=$fetch_item['hqzis_approve_qnt']?></td>
					        								<input type="hidden" name="hqzis_slno[]" value="<?=$fetch_item['hqzis_slno']?>">
					        								<input type="hidden" name="zmrd_slno[]" value="<?=$fetch_item['zmrd_slno']?>">
					        								<td>
					        									<input type="number" onkeyup="calculate(<?=$x?>)" name="issue_qnty[]" value="<?=$fetch_item['hqzis_issue_qnt']?>" id="issue_qnty<?=$x?>">
					        								</td>
					        								<td>
																<input type="number" name="price[]" onkeyup="calculate(<?=$x?>)" value="<?=$fetch_item['price_rate']?>" step=".01"  id="price<?=$x?>">
															</td>
															<td>
																<input type="number" step=".01" name="totalprice[]" value="<?=$fetch_item['price_total']?>"  id="totalprice<?=$x?>" readonly>
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
                         	    <input type="hidden" name="total_item" id="total_item" value="<?=$x?>">
                         	  <input type="hidden" name="hq_store_id" id="hq_store_id" value="<?=$_SESSION['hq_store_id']?>">
			   				 <div class="pull-left">
		                	<a href="headquarter_receive_site_mr_list.php" class="btn btn-warning">Back</a>
		               </div>
		 	 		<div class="form-group pull-right"> 
		 	   	  <input type="submit" class="btn btn-success btn-md" name="Next" value="Save">
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
		$('[data-toggle="datepicker"]').datepicker({
        autoHide: true,
        zIndex: 2048,
      });
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4),:eq(5),:eq(6)").each( function () {
        var title = $('#example77 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example77').DataTable();
    var table = $('#example772').DataTable();
 
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
    function calculate(id) {
    	
        var quantity = document.getElementById('issue_qnty'+id).value;
        console.log(quantity);

        var price = document.getElementById('price'+id).value;
        console.log(price);
        var total = document.getElementById('totalprice'+id);

        var result = quantity * price;
        total.value = result;
         console.log(result);
          console.log(total);

      

    }

</script>
