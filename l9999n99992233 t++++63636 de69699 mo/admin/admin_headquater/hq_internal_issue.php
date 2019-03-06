<?php

session_start();
ob_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
 $hq_slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name'])); //zmr_slno
 $hq_primary_code=web_decryptIt(str_replace(" ", "+", $_GET['token_id'])); //zmr_unqiue_mr_id
 $status=web_decryptIt(str_replace(" ", "+", $_GET['status']));
 $hq_store_id=$_SESSION['hq_store_id'];
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Head Quarter Internal Issue Form</div>
			<ul class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">Stock Information</a></li>
				<li><a href="#">View Stock</a></li>
				<li class="active">Internal Issue</li>
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
						<div class="panel-title">Stock Issue Internal</div>
				    </div>
				    <div class="panel-body">
						<form name="myFunction" class="form-horizontal" action="hq_internal_issue_save.php" method="POST">
							<div class='row'>
						   		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						      		<table class="table table-bordered table-hover">
										<thead>
											<tr>												
												<th width="15%">Primary Code</th>
												<th width="15%">Secondary Code</th>
												<th width="15%">Component Name</th>
												<th width="15%">Category Type</th>
												<th width="15%">Avaliable Quantity</th>
												<th width="15%">Issue Quantity</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											 $Requsition_query="SELECT * FROM `lt_master_hq_stock_info` WHERE `hq_location_id`='$hq_store_id' and `hq_primary_code`='$hq_primary_code' ";
				        				$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
				        				while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) { 
				        					?>
											<tr>
												<input type="hidden" name="hq_primary_code" value="<?=$hq_primary_code?>">
												<input type="hidden" name="hq_secondary_code" value="<?=$result['hq_secondary_code']?>">
												<input type="hidden" name="hq_component_name" value="<?=$result['hq_component_name']?>">
												<input type="hidden" name="hq_category_name" value="<?=$result['hq_category_name']?>">
												<input type="hidden" name="hq_qnty" value="<?=$result['hq_qnty']?>">
												<input type="hidden" name="hq_category_id" value="<?=$result['hq_category_id']?>">
												<input type="hidden" name="hq_unit" value="<?=$result['hq_unit']?>">

												<td><?=$result['hq_primary_code']?></td>
						        				<td><?=$result['hq_secondary_code']?></td>
						        				<td><?=$result['hq_component_name']?></td>
						        				<td><?=$result['hq_category_name']?></td>
						        				<td><?=$result['hq_qnty']?> <?=$result['hq_unit']?></td>
												<td><input type="number" name="issue_qnty" min="1" max="<?=$result['hq_qnty']?>" required></td>
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							<div class="row">
								 <div class="pull-left">
				                	<a href="headquarter_view_stock.php" class="btn btn-warning">Back</a>
				               </div>
								<div class="form-group text-right">
								    <input type="submit" name="submit" class="btn btn-success" value="Submit">
							     </div>
							    
							
							
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

