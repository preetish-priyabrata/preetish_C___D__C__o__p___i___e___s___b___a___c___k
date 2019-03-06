<?php
ob_start();
include 'config.php';
session_start();
if($_SESSION['user_no']){
	// if((time() - $_SESSION['last_login_timestamp']) > 300){  // 900 = 15 * 60 
 //   		session_destroy();
	// }else{
	//     $_SESSION['last_login_timestamp'] = time();
	// }
    require 'FlashMessages.php';
    unset($_SESSION["diploma_status"]);
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$get_details_apply="SELECT * FROM `application_form` WHERE `candidate_mobile`='$_SESSION[user_no]'";
	$sql_exe_get_edu=mysqli_query($conn,$get_details_apply);
	$edu_result=mysqli_fetch_assoc($sql_exe_get_edu);
	$edu_detail=$edu_result['candidate_qualification'];
	$_SESSION['candidate_name']=$edu_result['candidate_name'];
	$diploma_status=$edu_result['diploma_status'];
	$_SESSION['diploma_status']=$diploma_status;
	$preference_one=$edu_result['preference_one'];
	$_SESSION['preference_one']=$preference_one;
	$preference_two=$edu_result['preference_two'];
	$_SESSION['preference_two']=$preference_two;

	 $get_group="SELECT * FROM `ilab_exam_group_assign_class` WHERE `class_slno`='$edu_detail' and `status`='1' and `roll_generate_status`='0'";

	$sql_exe_get_group=mysqli_query($conn,$get_group);

?>
<!-- 
    https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css
    https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css
 -->
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" type="text/css" href=""> -->
<div class="container-fluid">
	 <!-- <div class="col-md-12 col-sm-12 "> -->
		<div class="row-eq-height">
				<div class="row">		
			<div class="col-xl-6">
				
				<form action="apply_job_save" method="POST">
					<div class="card">
				    	<div class="card-header bg-info text-white"><h5>Apply For Job</h5></div>
				    	<div class="card-body">
				    		
					    	<br>
				    		<div class="form-group row">
				                <label for="category" class="col-sm-4 col-form-label">Apply For Job *</label>
				                <div class="col-sm-6">
				                	<select class="form-control" id="category" onchange="get_post()" name="category">
				                		<option value="">----</option>
				                		<?php
				                		while ($result=mysqli_fetch_assoc($sql_exe_get_group)) {
				                			$group_slno=$result['group_slno'];
				                			echo$check_group="SELECT * FROM `ilab_group_candidate_info` WHERE `candidate_mobile`='$_SESSION[user_no]' and  `paid_status`='1' and `group_id_slno`='$group_slno'";
				                			$sql_exe_check_group=mysqli_query($conn,$check_group);
				                			$num_check=mysqli_num_rows($sql_exe_check_group);
				                			if($num_check=='0'){
				                			?>
				                		<option value="<?=$result['group_slno']?>"><?=$result['group_name']?></option>
				                		<?php
				                			}
				                		}


				                		?>
								    	
								    </select>
				                   <span id="file_error"></span>
				                </div>   
				            </div>
				            <div id="get_post_info"></div>

				            <br>
				            <br>
				            <div class="row">
					    		<div class="text-center ">
					    		<h5 class="text-warning">Instructions</h5>
					    		<p class="lead  text-justify  small text-uppercase">
					    			1. Before selecting any group to apply, kindly go through the position details and minimum qualification thoroughly.<br>

									DRIVER defines positions with minimum qualification  of class VIII.<br>

									GROUP D defines positions with minimum qualification of class IV.<br>

									2. While applying  for multiple posts under GROUP D category, add it to the job cart as per preference sequence. For  example if you are interested for 3 posts such as peon, supervisor and gen operator and  If your first preference is peon, second preference is supervisor and third preference is gen operator then apply peon first, then click on  apply supervisor and lastly gen operator.<br>

									3. You are requested to apply multiple posts in GROUP D category in one go. You cannot apply multiple posts in multiple times. You need to add all posts you want to apply under GROUP D in the job cart before proceeding for payment.<br>
					    		</p>	
					    		</div>
					    	</div>
				    	</div> 
				    	<!-- <div class="card-footer bg-info text-white">Footer</div> -->
				  	</div>
				</form>
			</div>
			<div class="col-xl-6">
				
				  	
				  	<div class="card" >
				    	<div class="card-header bg-success text-white text-center"><h5>View Applied Job Detail</h5></div>
				    	<div class="card-body">
				    		<div class="table-responsive">
				    		<table id="example_applied" class="table table-striped">
							  <thead class="thead-inverse">
							    <tr>
							      <th>#</th>
							      <th>Reference No </th>
							      <th>Amount</th>
							      <th>Date</th>
							      <th>Job Detail</th>
							      <th>Payment Status</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php 
							  	$x=0;
							  	$get_pay_details="SELECT * FROM `ilab_payment_info` WHERE `mobile_no`='$_SESSION[user_no]' order by `slno_group_pay` desc";
							  	$sql_get_pay_details=mysqli_query($conn,$get_pay_details);
							  	while ($result_sql_get_pay_details=mysqli_fetch_assoc($sql_get_pay_details)) {
							  		$x++;
							  	
							  		// `payment_reference_no``amount_to``post_name``date``payment_status`
							  	?>
							    <tr>
							      <th scope="row">1</th>
							      <td><?=$result_sql_get_pay_details['payment_reference_no']?></td>
							      <td>Rs <?=$result_sql_get_pay_details['amount_to']?></td>
							      <td><?=$result_sql_get_pay_details['date']?></td>
							      <td><?php
							      $post_name=json_decode($result_sql_get_pay_details['post_name']);
							      	for ($i=0; $i <count($post_name) ; $i++) { 
							      		echo $post_name[$i]."<br>";
							      	}
							      ?></td>
							      <td><?php 
							      $payment_status=$result_sql_get_pay_details['payment_status'];
							      	switch ($payment_status) {
							      		case '1':
							      			echo $result_sql_get_pay_details['ErrorDescription'];
							      			break;
							      		case '2':
							      			echo $result_sql_get_pay_details['ErrorDescription'];
							      			break;
							      		
							      		default:
							      			echo "Payment Not Received";
							      			break;
							      	}
							      ?></td>
							    </tr>
							    <?php }?>
							  </tbody>
							</table>
						</div>

						</div> 
				    	<!-- <div class="card-footer bg-success text-white">Footer</div> -->
				  	</div>
				
			</div>

		</div>
	</div>
	<br>
	<div class="row align-items-center justify-content-center">
		<div class="text-center">
		<a href="user_dashboard" class="btn btn-dark"> Back</a>
		</div>
	</div>
	<br>
	<!-- </div> -->
</div>


 <?php 
}else{
  header('Location:logout');
  exit;
}
$content_details = ob_get_contents();
ob_clean();
include 'template1.php';

?><!-- 
 
  -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example_applied').DataTable();
} );
</script>
<script type="text/javascript">
	function get_post() {
		var category = document.getElementById('category').value;
		if(category!=""){
			 $.ajax({
		            type:'POST',
					url:'apply_get_post_value',
		            data:'Category_names='+category,
		            success:function(html){		         
		            	document.getElementById("get_post_info").innerHTML = html;   	
		                
		            }
		        });


		}else{
			document.getElementById("get_post_info").innerHTML ="";
		}
	}
</script>