<div class="container-fluid page-content">
	  <div class="row">
		<?php $msg->display(); ?>
		 <div class="col-md-12 col-sm-12">
		  <!-- Basic inputs -->
			 <div class="panel panel-default">
			   <div class="panel-heading">
				 <div class="panel-title">Requsition Form</div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" class="form-horizontal" action="field_mr_raised_machine.php" method="POST">
					   		<input type="hidden" name="form_type" value="<?=web_encryptIt('site_mr1')?>">
					   		<div class="row">
						   	<div class="col-lg-6">
						   		<div class="form-group">
								    <label class="control-label col-lg-4 text-right">Location Name :</label>
								    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="user_location" id="name_user" placeholder="Enter Name" autocomplete="off" value="<?=$_SESSION['field_place']?>" required="">
									<?php 
										// $field_place=$_SESSION['field_place'];
	        							$query_sql2="SELECT * FROM `lt_master_field_place` WHERE `field_code`='$field_place'";
	        							$sql_exe2=mysqli_query($conn,$query_sql2);
	        							$result2=mysqli_fetch_assoc($sql_exe2);
	        							echo "<p>".$result2['field_name']."</p>";
									?>
							   </div>
							 </div>

							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Date : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="date_info" id="email_id" placeholder="Enter Email Id" autocomplete="off" value="<?=date('Y-m-d')?>" required=""><p><?=date('Y-m-d')?></p>
							   </div>
							</div>
						</div>
						<div class="col-lg-6">




