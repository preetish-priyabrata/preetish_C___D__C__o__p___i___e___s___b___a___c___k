<?php

session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
   $title="Create Exam Center           ";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
   	$mobile=mysqli_real_escape_string($conn,trim($_POST['mobile']));
   }else{
   	$mobile="";
   }
?>
<style type="text/css">
	.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
	#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute; z-index: 1;}
	#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
	#country-list li:hover{background:#ece3d2;cursor: pointer;}
	#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>Find Mobile No</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li><a href="#"></a>Manage Candidate</li>
				<li class="active">Find Application </li>
			</ul>
		</div>
	</div>
	<!-- /Page Header-->
	<div class="container-fluid page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Find Mobile No</div>
					</div>
					<form class="form-horizontal" action="" method="POST">
						<div class="panel-body">						
							<div class="form-group">
								<label class="control-label col-lg-4 text-right">Mobile</label>
								<div class="col-lg-6">
									<input class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile No" type="text" required="" value="<?=$mobile?>" autocomplete="off">
									<div id="suggesstion-box"></div>

								</div>
								<input type="submit" class="btn btn-info"  value="Find"  >
							</div>
							
								
						</div>
					</form>
				</div>
			</div>						
		</div>
		<?php 
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$query="SELECT * FROM `ilab_login` where `status`='1' and `mobile_no_L`='$mobile' ";
			$result=mysqli_query($conn,$query);
		  	$num_rows=mysqli_num_rows($result);
		  	if($num_rows==1){
		  		$result_detail=mysqli_fetch_assoc($result);

		  	}else{
		  		$query_m="SELECT * FROM `ilab_registration` where `status`='2' and `mobile_no`='$mobile' ";
				$result_m=mysqli_query($conn,$query_m);
		  		$num_rows_m=mysqli_num_rows($result_m);
		  		if($num_rows_m==1){
		  			$result_detailm=mysqli_fetch_assoc($result_m);

		  		}else{
		  			$result_message="This number is yet to be registered with us.";
		  		}

		  	}
		?>
		<div class="row">

			<div class="col-md-3 col-sm-3">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">No Registration</div>
					</div>
					
						<div class="panel-body">						
							<?php 
							if(($num_rows!="1") && ($num_rows_m!="1")){
								echo $result_message;
							}
							?>
								
						</div>
				
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Only Registration</div>
					</div>
					
						<div class="panel-body">						
							<table id="" class="table table-striped">
							    <thead>
							      <tr>
							        <th>Mobile No</th>
							        <th>Date</th>
							        <th>Time</th>
							       <!--  <th>
							         Status</th> `mobile_no`, `date`, `time`-->
							      </tr>
							    </thead>
							    <tbody>
							    	<?php 
							    	if($num_rows_m==1){?>
							      <tr>
							        <td><?=$result_detailm['mobile_no']?></td>
							        <td><?=$result_detailm['date']?></td>
							        <td><?=$result_detailm['time']?></td>
							      </tr>
							      <?php }?>
							    </tbody>
						  </table>
							
								
						</div>
				
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<!-- Basic inputs -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Beyond Registration </div>
					</div>
					
						<div class="panel-body">						
						 <table id="" class="table table-striped">
						    <thead>
						      <tr>
						        <th>Mobile No</th>
						        <th>SSC Status</th>
						        <th>Application Submission Status</th>
						       <!--  <th>
						         Status</th> `basic_status`, `complete_status`-->
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						      <?php 
							    	if($num_rows==1){?>
							      <tr>
							        <td><?=$result_detail['mobile_no_L']?></td>
							        <td><?php 
							        if($result_detail['basic_status']==1){
							        	echo "Yes";
							        }else{
							        	echo "No";
							        }?></td>
							        <td><?php 
							        if($result_detail['complete_status']==1){
							        	echo "Yes";
							        }else{
							        	echo "No";
							        }?></td>
							       
							      </tr>
							      <?php }?>
						      
						    </tbody>
						  </table>
						</div>
					
				</div>
			</div>						
		</div>
		<?php }?>
	</div>
<!-- </div> -->




<?php
}else{
	header('Location:logout');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';

?>
<script>
$(document).ready(function(){
	$("#mobile").keyup(function(){
		$.ajax({
		type: "POST",
		url: "get_mobile",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#mobile").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#mobile").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#mobile").val(val);
$("#suggesstion-box").hide();
}
</script>