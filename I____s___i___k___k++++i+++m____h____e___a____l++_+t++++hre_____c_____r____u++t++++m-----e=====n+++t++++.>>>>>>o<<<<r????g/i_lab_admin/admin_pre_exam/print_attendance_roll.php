<?php
// print_r($_GET);
session_start();
ob_start();
if($_SESSION['admin_preexam']){
require 'FlashMessages.php';
require '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

 $exam=$_GET['exam'];//slno_exam
$list=$_GET['list'];//exam
$session=$_GET['session'];//session

$qry_assign="SELECT c.exam_name,c.slno_exam,c.total_seat,a.no_session FROM ilab_exam_center c left JOIN ilab_assign_center_table a on a.exam_center_slno=c.slno_exam and a.group_slno_id='$list' WHERE c.status_exam='1' and a.exam_center_slno='$exam' ";
$sql_assin=mysqli_query($conn, $qry_assign);

$qry_exam="SELECT * FROM `ilab_exam_group` where `roll_prefix_status`='1' and `status`='2' and `assign_date_status`='1' and `generate_all_status`='1' and `slno_group`='$list'";
$sql_exam=mysqli_query($conn, $qry_exam);
$res_exam=mysqli_fetch_array($sql_exam);
$result_id=mysqli_fetch_assoc($sql_assin);

$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `group_exam_slno`='$list' and `assign_roll_center`='1'  and `center_id`='$exam' order by `roll_no` asc";
	$sql_get_candidate=mysqli_query($conn,$get_candidate);
$title='Exam: '.$res_exam['exam_group'].'  Exam Center:  '.$result_id['exam_name'];
?>
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<div class="page-title"><i class="icon-display4"></i>View Roll  Center wise</div>
			<ul class="breadcrumb">
				<li><a href="admin_dashboard.php"></a></li>
				<li class="active"><a href="#"></a>View Roll List</li>
				<!-- <li class="active">Exam Center List</li> -->
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
						<div class="panel-title">View Roll  Center wise</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
                            <table id="example" class="display " width="100%" cellspacing="0">
						        <thead>
						            <tr style="text-align: center;">               
						                
						                <th>Roll No</th>
						                
						            </tr>
						        </thead>
	        					<tfoot>
		            				 <tr style="text-align: center;">               
						               
						                <th>Roll No</th>
						                
						            </tr>					             
	        					</tfoot>
	        					<tbody>
	        						<?php 
	        						$i=0;
	        						while($res=mysqli_fetch_array($sql_get_candidate)){
	        							$i++;
	        						?>
	        						<tr style="text-align: center;">
						            	<!-- <td><?php echo $i; ?></td> -->
						            	<td><?php echo $res['roll_no']; ?></td> 
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

<?php
}else{
	header('Location:logout');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
