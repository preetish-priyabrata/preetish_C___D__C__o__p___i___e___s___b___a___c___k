<?php

session_start();
ob_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	$title="Welcome To Dashboard Of HeadQuarter Officer";
	$slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name'])); //zmr_slno
	$item="SELECT * FROM `lt_master_invoices_amount` WHERE `status`='1' and `slno_invoice`='$slno'";
	$sql_item_exe=mysqli_query($conn,$item);
	$fetch_item=mysqli_fetch_assoc($sql_item_exe);
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Of Invoice Details</div>
			<ul class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">Invoice</a></li>
				<!-- <li><a href="#">Stock Return Challan From Field</a></li> -->
				<li class="active">Invoice Details</li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
<div class="container-fluid page-content">
		<div class="row">
		<?php $msg->display(); ?>
		</div>

	<div class="row">
		<div class="panel panel-default">
  		<div class="panel-body">
			<form class="form-horizontal" action="#">
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title"><b>Basic Details</b></div>
				    </div>
				    <div class="panel-body">
				    	<div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="unit">Unit No:</label>
						    		<div class="col-sm-10">
						      			<?=$fetch_item['unit_no']?>
						    		</div>
						  		</div>
						  	</div>
						  	
						  	<div class="col-lg-6">
								<div class="form-group">
								    <label class="control-label col-sm-2" for="month">Month:</label>
								    <div class="col-sm-10">
								     	<select class="form-control" name="month" id="month" required="">
					                        <option value="">Select Month</option>
					                        <?php
					                          $monthArray = range(1, 12);
					                          foreach ($monthArray as $month) {
					                          // padding the month with extra zero
					                            $monthPadding = str_pad($month, 2, "0", STR_PAD_LEFT);
					                          // you can use whatever year you want
					                          // you can use 'M' or 'F' as per your month formatting preference
					                            $fdate = date("F", strtotime("2017-$monthPadding-01"));
					                            ?>
					                            <option value="<?=$monthPadding?>" <?php if($monthPadding==$fetch_item['month']){echo "selected";}?>><?=$fdate?></option>
					                        <?php  }
					                        ?>
	                      				</select>
								    </div>
								</div>
						    </div>
						</div>
						<br>
					   <div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Period_from">Period From:</label>
						    		<div class="col-sm-10">
						      			<?=$fetch_item['period_from']?>
						    		</div>
						  		</div>
						  	</div>

						  	<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Period_to">Period To:</label>
						    		<div class="col-sm-10">
						      			<?=$fetch_item['period_to']?>
						    		</div>
						  		</div>
						  	</div>
					  	</div>
					</div>
				</div>
			</div>
			<br>
			<?php 
				if($fetch_item['status_invoice_status']==1){?>
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title"><b>Invoice Details</b></div>
				    </div>
				    <div class="panel-body">
					   <div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Invoice">Invoice No:</label>
						    		<div class="col-sm-10">
						      			<?=strtoupper($fetch_item['invoice_no'])?>
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
								<div class="form-group">
								    <label class="control-label col-sm-2" for="area">Location/Area :</label>
								    <div class="col-sm-10">
								     	<?=strtoupper($fetch_item['location_area'])?>
								    </div>
								</div>
						    </div>
						</div>
						<br>

					    <div class="row"> 
					   		<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Basic">Basic :</label>
						    		<div class="col-sm-10">
						      			<?=strtoupper($fetch_item['basic_no'])?>
						    		</div>
						  		</div>
						  	</div>
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="tax_per">Tax % :</label>
						    		<div class="col-sm-10">
						      			<?=strtoupper($fetch_item['tax_no'])?>
						    		</div>
						  		</div>
						  	</div>						  	
					  	</div>
					  	<br>
					  	<div class="row">
					  		<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Total">Total :</label>
						    		<div class="col-sm-10">
						      			<?=strtoupper($fetch_item['total'])?>
						    		</div>
						  		</div>
						  	</div>
						  	<?php 
								if($fetch_item['invoice_attach_status']==1){?>
						  	
						  	<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Total">Attachment :</label>
						    		<div class="col-sm-10">
						    			<?php 
						    			$z=0;
						    			$get_attach="SELECT * FROM `lt_invoice_attachment` WHERE `slno_invoice_id`='$slno' and `type_attach`='1'";
						    			$sql_exe_get_attach=mysqli_query($conn,$get_attach);
						    				while ($sql_exe_get_attach=mysqli_fetch_assoc($sql_exe_get_attach)){
						    					$z++;
						    					if(file_exists("../uploads/invoice/".$sql_exe_get_attach[file_name])){
						    			?>
						      						<a href="../uploads/invoice/<?=$sql_exe_get_attach['file_name']?>" target="_blank">Click View <?=$z?></a><br>

						      			<?php }else{
						      					echo "File Has Been Archived file name  ".$sql_exe_get_attach[file_name]."<br>";
						      			}

						      		}?>
						    		</div>
						  		</div>
						  	</div>
						  	<?php }?>
						</div>					   
					</div>
				</div>
			</div>
			<br>
			<?php }
				if($fetch_item['payment_receive_status']==1){ 
			?>
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title"><b>Payment Received Details</b></div>
				    </div>
				    <div class="panel-body">
					  	<div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Receive_amt">Payment Receive Amount:</label>
						    		<div class="col-sm-10">
						      			<?=$fetch_item['payment_receive']?>
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
								<div class="form-group">
								    <label class="control-label col-sm-2" for="Receive_dt">Receive Date :</label>
								    <div class="col-sm-10">
								    	<?=$fetch_item['payment_date']?>

								    </div>
								</div>
						    </div>
						</div> 
						<br>
					  	<div class="row">
					  		<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Balance_os">Balance OS :</label>
						    		<div class="col-sm-10">
						      			<?=$fetch_item['balance_output']?>
						    		</div>
						  		</div>
						  	</div>
						</div>	
					   
					</div>
				</div>
			</div>
			<br>
			<?php }
				if($fetch_item['deduction_status']==1){
			?>
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title"><b>Deduction Details</b></div>
				    </div>
				    <div class="panel-body">
						<div class="row"> 
						   <div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="it_ded"> It Ded :</label>
						    		<div class="col-sm-10">
						      			<?=$fetch_item['it_ded']?>
						    		</div>
						  		</div>
						  	</div>
						  	<div class="col-lg-6">
								<div class="form-group">
								    <label class="control-label col-sm-2" for="Wct_ded">Wct Ded :</label>
								    <div class="col-sm-10">
								     	<?=$fetch_item['wt_ded']?>
								    </div>
								</div>
						    </div>
						</div> 
						<br>
					  	<div class="row">
					  		<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Excess_ded">Excess Ded (Optional) :</label>
						    		<div class="col-sm-10">
						      			<?=$fetch_item['excess_ded']?>
						    		</div>
						  		</div>
						  	</div>
						  		<?php 
								if($fetch_item['deduction_file_status']==1){?>
						  	
						  	<div class="col-lg-6">
						   		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Total">Attachment :</label>
						    		<div class="col-sm-10">
						    			<?php 
						    			$a=0;
						    			$get_attach_ded="SELECT * FROM `lt_invoice_attachment` WHERE `slno_invoice_id`='$slno' and `type_attach`='2'";
						    			$sql_exe_get_attach_ded=mysqli_query($conn,$get_attach_ded);
						    				while ($sql_exe_get_attach_ded=mysqli_fetch_assoc($sql_exe_get_attach_ded)){
						    					$a++;
						    					if(file_exists("../uploads/invoice/".$sql_exe_get_attach_ded[file_name])){
						    			?>
						      			<a href="../uploads/invoice/<?=$sql_exe_get_attach_ded['file_name']?>" target="_blank">Click View <?=$a?></a><br>

						      			<?php }else{
						      					echo "File Has Been Archived file name  ".$sql_exe_get_attach_ded[file_name]."<br>";
						      			}

						      		}?>
						    		</div>
						  		</div>
						  	</div>
						  	<?php }?>
						</div>
					   
					</div>
				</div>
			</div>
			<br>
			<?php } 
				if($fetch_item['vender_details_status']==1){
			?>
			<div class="col-md-12 col-sm-12">
			  <!-- Basic inputs -->
			 	<div class="panel panel-default">
					<div class="panel-heading">
				 		<div class="panel-title"><b>Vendors</b> </div>
				    </div>
				    <div class="panel-body">					   
					    <div class="input_fields_container">
					    	<div class="panel-group" id="accordion">
					    	<?php 
					    	$x=0;
					    	$get_detail_vendeor="SELECT * FROM `lt_master_vendors_details` WHERE `challan_number`='$slno'";
					    	$sql_exe_get_vendor=mysqli_query($conn,$get_detail_vendeor);
					    	while($res=mysqli_fetch_assoc($sql_exe_get_vendor)){
					    		$x++;
					    	?>
					    	
								<div class="panel panel-default">
								    <div class="panel-heading">
								      <h4 class="panel-title text-center">
								        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$x?>"> vendor Name :
								        <?=strtoupper($res['vendor_name'])?></a>
								      </h4>
								    </div>
								    <div id="collapse<?=$x?>" class="panel-collapse collapse <?php if($x==1){ echo "in";}?>">
								      <div class="panel-body">

								 
							
					        <div id="ro" style="border: 1px solid red; padding: 37px;">
					        	<div class="form-group">
						    		<label class="control-label col-sm-2" for="Vendor1"> Vendor :</label>
						    		<div class="col-sm-10">
						      			<?=strtoupper($res['vendor_name'])?>
						    		</div>
						  		</div>
					        	<div class="form-group">
						    		<label class="control-label col-sm-2" for="Period_from_vendor1">Period from:</label>
						    		<div class="col-sm-10">
						      			<?=$res['period_from']?>

						    		</div>
						  		</div>
						  		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Period_to_vendor1">Period To:</label>
						    		<div class="col-sm-10">
						      			<?=$res['period_to']?>
						    		</div>
						  		</div>
						  		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Invoice_vendor1">Invoice No:</label>
						    		<div class="col-sm-10">
						      			<?=$res['invoice_no']?>
						    		</div>
						  		</div>
						  		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Invoice_date_vendor1">Invoice Date:</label>
						    		<div class="col-sm-10">
						      			<?=$res['invoice_date']?>
						    		</div>
						  		</div>
						  		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Basic_vendors1">Basic :</label>
						    		<div class="col-sm-10">
						      			<?=$res['basic']?>
						    		</div>
						  		</div>
						  		<div class="form-group">
						    		<label class="control-label col-sm-2" for="GST_amt_vendors1">GST :</label>
						    		<div class="col-sm-10">
						      			<?=$res['gst']?>
						    		</div>
						  		</div>
						  		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Total_vendors1">Total :</label>
						    		<div class="col-sm-10">
						      			<?=$res['total']?>
						    		</div>
						  		</div>
						  		<?php if($res['vendor_attach_status']=='1'){?>
						  		<div class="form-group">
						    		<label class="control-label col-sm-2" for="Total_vendors1">Attachment :</label>
						    		<div class="col-sm-10">
						    			<?php 
						    			$b=0;
						    			$vendor_slno=$res['slno'];
						    			$attach_vendor="SELECT * FROM `lt_vendor_attachment` WHERE `slno_vendor_id`='$vendor_slno' and `slno_invoice_id`='$slno' and `status`='1'";
						    			$sql_exe_attach_vendor=mysqli_query($conn,$attach_vendor);
					    				while($res_attach_vendor=mysqli_fetch_assoc($sql_exe_attach_vendor)){
					    					$b++;
					    					if(file_exists("../uploads/vendors_Attachment/".$res_attach_vendor[file_name])){
					    					?>
						      			<a href="../uploads/vendors_Attachment/<?=$res_attach_vendor['file_name']?>" target="_blank" >Click Here view <?=$b?></a><br>
						      			<?php }	else{
						      				echo "File Has Been Archived file name  ".$res_attach_vendor[file_name]."<br>";
						      			}

						      		}?>
						    		</div>
						  		</div>
						  		<?php }?>

					        </div>
					    </div>
					    </div>
					        <?php 
					    }

					    }?>
					        <!-- <br> -->
					    </div>
					    </div>
					</div>					
				</div>
			</div>
		</div>
	</form>
</div>
</div>
<div class="panel-footer">
	<div class="pull-left">
		<a href="index.php" class="btn btn-warning">Back</a>
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
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}
</script>

