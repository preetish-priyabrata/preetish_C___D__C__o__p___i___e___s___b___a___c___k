<?php

session_start();

if($_SESSION['admin_tech']){
require 'FlashMessages.php';
require '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="View Candidate Application Form List";
ob_start();
// SELECT * FROM ilab_login as login INNER JOIN application_form as form ON login.mobile_no_L=form.candidate_mobile where login.status='1' AND login.basic_status='1' and login.complete_status='1';
//$slno=$_POST['slno'];
	$get_mobile="SELECT * FROM ilab_login as login INNER JOIN application_form as form ON login.mobile_no_L=form.candidate_mobile where login.status='1' AND login.basic_status='1' and login.complete_status='1'";
	$sql_exe_get_mobile=mysqli_query($conn,$get_mobile);
?>

<!--Page Header-->
<div class="header">
	<div class="header-content">
		<div class="page-title"><i class="icon-display4"></i>View Candidate Application Form</div>
		<ul class="breadcrumb">
			<li><a href="admin_dashboard.php"></a></li>
			<li><a href="#"></a>Candidate Application Form System</li>
			<li class="active">Application Form List</li>
		</ul>
	</div>
</div>
<div class="container-fluid page-content">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<?php $msg->display(); ?>
		</div>
	</div>
</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Candidate Application Form List</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form method="POST" enctype="multipart/form-data" action="">
                            <table id="complete_details" class="display nowrap" width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">
						                <th>Slno</th>
						                <th>[appli][login]</th>
						                <th>Candidate Name</th>
						                <th>Candidate Mobile</th>
						                <th>Candidate Application</th>
						                
						                <th>sikkim_subject_no</th>
						                <th>Date</th>
						                <th>Time</th>
						                <th>Action</th>
						                <!-- <th>Status</th>
						                <th>Action</th> -->
						                		                
						            </tr>
						        </thead>
	        					<tfoot>
		            				<tr style="text-align: center;">
		                 			   <th>Slno</th>
		                 			    <th>[appli][login]</th>
						                <th>Candidate Name</th>
						                <th>Candidate Mobile</th>
						                <th>Candidate Application</th>
						                <!-- <th>candidate_photo</th> -->
						                <th>sikkim_subject_no</th>
						                <th>Date</th>
						                <th>Time</th>
						                <!-- <th>Status</th> -->
						                <th>Action</th>
						             
	        					</tfoot>
	        					
    						</table>
    					</form>
                     </div>
				  </div>
			  </div>						
		   </div>
		</div>
	</div>

<?php
$contents = ob_get_contents();
ob_clean();
ob_end_flush();
include '../template/header.php';

}else{
	header('Location:logout');
	exit;
}

?>
<script type="text/javascript">
     	$(document).ready(function() {
     		
    		$('#complete_details').DataTable( {
    			deferRender:    true,
    			ajax:{
	                url :"server_login_complete", // json datasource
	                type: "post", 
	            },
       			dom: 'Bfrtip',
       			buttons: [
            		'copy', 'csv', 'excel', 'pdf', 'print'    
				]
        			           	
    		} );
		} );
</script>