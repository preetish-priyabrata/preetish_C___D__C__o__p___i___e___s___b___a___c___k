<?php
session_start();
ob_start();
if($_SESSION['admin_field']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Field User Raise Material Requsition form ";
$zonal_place=$_SESSION['zonal_place'];
$field_place=$_SESSION['field_place'];
?>
<style type="text/css">

.panel-body p {
    margin-top: 10px;
}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Raise Material Requsition Form</div>
			<ul class="breadcrumb">
				<li><a href="zonal_dashboard.php"></a></li>
				<li class="">Dashboards</li>
				<li class="">Requsition </li>
				<li class="active">Raise Material Requsition Form</li>
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
				 <div class="panel-title">Requsition Form</div>
				   </div>
				     <div class="panel-body">
					   	<form name="myFunction" class="form-horizontal" action="field_mr_raised_machine.php" method="GET">
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
							
							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Time : </label>
							    <div class="col-lg-8">
									<input type="hidden" class="form-control" name="Time_info" id="mobile_no" placeholder="Enter Mobile No" value="<?=date('H:i:s')?>" autocomplete="off" required=""><p><?=date('h:i:s a')?></p>
							   </div>
							</div>

							<div class="form-group">
							    <label class="control-label col-lg-4 text-right">Machine No : </label>
							    <div class="col-lg-8">
									<select name="machine_no"  class="form-control" required="">
										<option value="">--Select Machine No--</option>
										<?php  
										$get_information="SELECT * FROM `lt_master_machine__transfer_information` WHERE `t_field_location_id`='$field_place'and`t_status`='1'";
										$sql_exe_machine=mysqli_query($conn,$get_information);
										while ($machine_no_fetch=mysqli_fetch_assoc($sql_exe_machine)) {?>
										<option value="<?=$machine_no_fetch['t_unique_id_machine']?>"><?=$machine_no_fetch['t_unique_id_machine']?></option>
										<?php
											}
											?>
									</select>
							   </div>
							</div>

						</div>
						</div> 

						 
						 <div class="row">
					   	<div class="form-group text-center">
					 		<input type="submit" class="btn btn-info"  value="Next">
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
<script type="text/javascript">
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example77 tfoot th').not(":eq(0),:eq(4)").each( function () {
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
	$(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>
