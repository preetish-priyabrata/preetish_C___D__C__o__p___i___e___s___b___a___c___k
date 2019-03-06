<?php
// print_r($_POST);
// exit();
session_start();
ob_start();
if($_SESSION['admin_preexam']){
	include  '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Officer";
 if($_SERVER["REQUEST_METHOD"] == "POST"){
// Array ( [exam] => 1 ) 
 	$exam=$_POST['exam'];
 }else{	
 	$exam="";
 }

?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i> View Center Assign Status</div>
			<ul class="breadcrumb">
				<li><a href="#"> View Center Assign Status</a></li>
				<li class="active">View Status</li>
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
						<div class="panel-title">View Status OF Exam Center</div>
					</div>
					<div class="panel-body">
						<form action="" method="POST">
							<div class="row">
								<div class="form-group">
									<label class="control-label col-lg-3 text-right">Exam Category</label>
									<div class="col-lg-6">
										<select id="exam" name="exam" onchange="get_center_name()" class="form-control" required>
						                    <option value="">--Select Exam--</option>
						                    <?php
						      				            $qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2'";
						      				            $sql_exam=mysqli_query($conn, $qry_exam);
						      				            while($res_exam=mysqli_fetch_array($sql_exam)){
						  				          ?>
						                            <option value="<?php echo $res_exam["slno_group"]; ?>" <?php if($exam==$res_exam['slno_group']){ echo "selected";}  ?> ><?php echo $res_exam["exam_group"]; ?></option>
						                    <?php
						  				                }
						  				          ?>
						                </select>
									</div>
									<input type="submit" class="btn btn-info pull-right"  value="Check Status"  >
								</div>

							</div>
							
							


						</form>
						<br>
						<br>
						<?php  
						if($_SERVER["REQUEST_METHOD"] == "POST"){
							$query_sql="SELECT * FROM `ilab_exam_center` where `status_exam`='1'";
	        				$sql_exe=mysqli_query($conn,$query_sql);
	        							// while ($result=mysqli_fetch_assoc($sql_exe)) {
							$query_sql1="SELECT * FROM `ilab_exam_center` where `status_exam`='2' ";
	        				$sql_exe1=mysqli_query($conn,$query_sql1);
	        							// while ($result=mysqli_fetch_assoc($sql_exe)) {
	        				$qry_assign="SELECT c.exam_name,c.slno_exam,c.total_seat,a.no_session FROM ilab_exam_center c left JOIN ilab_assign_center_table a on a.exam_center_slno=c.slno_exam and a.group_slno_id='$exam' WHERE c.status_exam='1' and a.exam_center_slno is NOT NULL ";
							$sql_assin=mysqli_query($conn, $qry_assign);

							$qry_centre="SELECT c.exam_name,c.slno_exam,c.total_seat FROM ilab_exam_center c left JOIN ilab_assign_center_table a on a.exam_center_slno=c.slno_exam and a.group_slno_id='$exam' WHERE c.status_exam='1' and a.exam_center_slno is NULL";
							$sql_centre=mysqli_query($conn, $qry_centre);

						?>
						<div class="col-md-offset-1 col-md-10">
							<div class="panel panel-default">
  								<div class="panel-body">

									<div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-highlight nav-justified">
											<li class="active"><a href="#highlighted-justified-tab1" data-toggle="tab" aria-expanded="true">Exam Center Active</a></li>
											<li class=""><a href="#highlighted-justified-tab2" data-toggle="tab" aria-expanded="false">Assigned Exam Center </a></li>
											<li class=""><a href="#highlighted-justified-tab3" data-toggle="tab" aria-expanded="false">Un-Assign Center</a></li>
											<li class=""><a href="#highlighted-justified-tab4" data-toggle="tab" aria-expanded="false">Exam Center In-Active</a></li>
											<!-- <li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Dropdown <span class="caret"></span></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#highlighted-justified-tab3" data-toggle="tab">Dropdown tab</a></li>
													<li><a href="#highlighted-justified-tab4" data-toggle="tab">Another tab</a></li>
												</ul>
											</li> -->
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="highlighted-justified-tab1">
												<div class="table-responsive">
						                            <table id="example21" class="display " width="100%" cellspacing="0">
												        <thead>
												            <tr style="text-align: center;">
												                <th>Slno</th>
												                <th>Exam Center</th>
												                <th>Total Capcity</th>
												            </tr>
												        </thead>
							        					<tfoot>
								            				<tr style="text-align: center;">
												                <th>Slno</th>
												                <th>Exam Center</th>
												                <th>Total Capcity</th>
												            </tr>						             
		        										</tfoot>
		        										<tbody>
		        											<?php 
		        												$x=0;
		        												while ($result=mysqli_fetch_assoc($sql_exe)) {
	        								
	        													$x++;
	        													?>
								        						<tr style="text-align: center;">
								        							<td><?=$x?></td>
								        							<td><?=$result['exam_name']?></td>
								        							<td><?=$result['total_seat']?></td>
								        						</tr>
								        					<?php }?>
								        				</tbody>
		        									</table>
		        								</div>
											</div>

											<div class="tab-pane" id="highlighted-justified-tab2">
												<div class="table-responsive">
						                            <table id="example22" class="display " width="100%" cellspacing="0">
												        <thead>
												            <tr style="text-align: center;">
												                <th>Slno</th>
												                <th>Exam Center</th>
												                <th>Total Capcity</th>
												                <th>Session</th>
												            </tr>
												        </thead>
							        					<tfoot>
								            				<tr style="text-align: center;">
												                <th>Slno</th>
												                <th>Exam Center</th>
												                <th>Total Capcity</th>
												                <th>Session</th>
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
								        						</tr>
								        					<?php }?>
								        				</tbody>
		        									</table>
		        								</div>
											</div>

											<div class="tab-pane" id="highlighted-justified-tab3">
												<div class="table-responsive">
						                            <table id="example23" class="display " width="100%" cellspacing="0">
												        <thead>
												            <tr style="text-align: center;">
												                <th>Slno</th>
												                <th>Exam Center</th>
												                <th>Total Capcity</th>
												                
												            </tr>
												        </thead>
							        					<tfoot>
								            				<tr style="text-align: center;">
												                <th>Slno</th>
												                <th>Exam Center</th>
												                <th>Total Capcity</th>
												                
												            </tr>						             
		        										</tfoot>
		        										<tbody>
		        											<?php 
		        												$y=0;
		        												while ($result_id_s=mysqli_fetch_assoc($sql_centre)) {
	        								
	        													$y++;
	        													?>
								        						<tr style="text-align: center;">
								        							<td><?=$y?></td>
								        							<td><?=$result_id_s['exam_name']?></td>
								        							<td><?=$result_id_s['total_seat']?></td>
								        						</tr>
								        					<?php }?>
								        				</tbody>
		        									</table>
		        								</div>
											</div>

											<div class="tab-pane" id="highlighted-justified-tab4">
												<div class="table-responsive">
						                            <table id="example24" class="display " width="100%" cellspacing="0">
												        <thead>
												            <tr style="text-align: center;">
												                <th>Slno</th>
												                <th>Exam Center</th>
												                <th>Total Capcity</th>
												            </tr>
												        </thead>
							        					<tfoot>
								            				<tr style="text-align: center;">
												                <th>Slno</th>
												                <th>Exam Center</th>
												                <th>Total Capcity</th>
												            </tr>						             
		        										</tfoot>
		        										<tbody>
		        											<?php 
		        												$z=0;
		        												while ($result1=mysqli_fetch_assoc($sql_exe1)) {
	        								
	        													$z++;
	        													?>
								        						<tr style="text-align: center;">
								        							<td><?=$z?></td>
								        							<td><?=$result1['exam_name']?></td>
								        							<td><?=$result1['total_seat']?></td>
								        						</tr>
								        					<?php }?>
								        				</tbody>
		        									</table>
		        								</div>
											</div>
										</div>
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


