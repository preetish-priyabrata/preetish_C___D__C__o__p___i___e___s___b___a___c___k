<?php

session_start();
ob_start();
if($_SESSION['admin_preexam']){
	include  '../config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Welcome To Dashboard Of Admin Officer";
 	if($_SERVER["REQUEST_METHOD"] == "POST"){
 		$exam=$_POST['exam'];
 	}else{
 		$exam="";
 	}



?>
 <link rel="stylesheet" type="text/css" href="../asserts/dist/bootstrap-clockpicker.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="asserts_new/dist/assets/css/github.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> Attendance Sheet</div>
			<ul class="breadcrumb">
				<li><a href="#">Manage Attendance Sheet </a></li>
				<li class="active">View Attendance Sheet</li>
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
						<div class="panel-title">View Attendance Sheet</div>
					</div>
					<div class="panel-body">
						<form action="" method="POST" class="form-horizontal">
								<div class="form-group">
									<label class="control-label col-lg-4 text-right">Exam Category</label>
									<div class="col-lg-8">
										<select id="exam" name="exam" onchange="get_center_name()" class="form-control" required>
						                    <option value="">--Select Exam--</option>
					                    <?php
			      				            $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2' and `assign_date_status`='1' and `generate_all_status`='1'";
			      				            $sql_exam=mysqli_query($conn, $qry_exam);
			      				            while($res_exam=mysqli_fetch_array($sql_exam)){
			      				            	
					  				          ?>
					                         <option value="<?php echo $res_exam["slno_group"]; ?>" <?php if($exam==$res_exam["slno_group"]){echo "selected";} ?>  ><?php echo $res_exam["exam_group"]; ?></option>
				                        <?php
				                        	
				  				              }
				  				          ?>
						                </select>
									</div>
							    </div>
							

							    <?php  
						if($_SERVER["REQUEST_METHOD"] == "POST"){

						}else{
							?>
							    <div class="text-center">
						   
							<input type="submit" class="btn btn-info"  value="View Attendance Sheet"  >
							</div>
							<?php }?>
						</form>
						<br>
						<br>
							    <?php  
						if($_SERVER["REQUEST_METHOD"] == "POST"){
							$qry_assign="SELECT c.exam_name,c.slno_exam,c.total_seat,a.no_session FROM ilab_exam_center c left JOIN ilab_assign_center_table a on a.exam_center_slno=c.slno_exam and a.group_slno_id='$exam' WHERE c.status_exam='1' and a.exam_center_slno is NOT NULL ";
							$sql_assin=mysqli_query($conn, $qry_assign);

							?>
							<div class="col-md-offset-1 col-md-10">
								<div class="panel panel-default">
  									<div class="panel-body">
										<div class="table-responsive">
						                    <table id="example22" class="display " width="100%" cellspacing="0">
											    <thead>
										            <tr style="text-align: center;">
										                <th>Slno</th>
										                <th>Exam Center</th>
										                <th>Total Capcity</th>
										                <th>Session</th>
										                <th>Print</th>
										            </tr>
												</thead>
							        			<tfoot>
						            				<tr style="text-align: center;">
										                <th>Slno</th>
										                <th>Exam Center</th>
										                <th>Total Capcity</th>
										                <th>Session</th>
										                <th>Print</th>
										            </tr>						             
		        								</tfoot>
		        								<tbody>
        											<?php 
        												$y=0;
        												while ($result_id=mysqli_fetch_assoc($sql_assin)) {
    														
    													$y++;
    													?>
						        						<tr style="text-align: center;">
						        							<td><?=$y?></td>
						        							<td><?=$result_id['exam_name']?></td>
						        							<td><?=$result_id['total_seat']?></td>
						        							<td><?=$result_id['no_session']?></td>
						        							<td>
						        								<?php 
						        								if($result_id['no_session']=='2'){?>
						        								<a target="_blank" href="print_attendance?exam=<?=$result_id['slno_exam']?>&list=<?=$exam?>&session=1">Session 1</a> || <a target="_blank" href="print_attendance?exam=<?=$result_id['slno_exam']?>&list=<?=$exam?>&session=2">Session 2</a>
						        								<?php }else if($result_id['no_session']=='1'){?>
						        								<a target="_blank" href="print_attendance?exam=<?=$result_id['slno_exam']?>&list=<?=$exam?>&session=1">Session 1</a>
						        								<?php }?>
						        							</td>
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
include '../template/header.php';

?>
