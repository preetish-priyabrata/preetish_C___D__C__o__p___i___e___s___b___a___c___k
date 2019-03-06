<?php 
ob_start();
include 'config.php';
session_start();
if($_SESSION['user_no']){
    require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
	$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no_exam_center` WHERE `candidate_moblie`='$_SESSION[user_no]' and `generate_attendance`='1' AND `generate_admit`='1'";
							$sql_assins=mysqli_query($conn, $get_candidate);	
?>
	<style type="text/css">
	.dash_id{
		
 /* padding-top: 50px;
  max-width: 1280px;*/
  height: auto;
	}
</style>


	<div class="text-center">
			<?php $msg->display(); ?>
		</div>
		
			 <!-- Page Content -->
    <div class="container dash_id" >
      <div class="container">
      	<div class="table-responsive">
            <table id="example_applied" class="table table-striped" class="display " width="100%" cellspacing="0">
			    <thead>
		            <tr style="text-align: center;">
		                <th>Slno</th>
		                <th>Roll No</th>		               
		                <th>Exam Center</th>
		                <th>Group</th>
		                <th>Print</th>
		            </tr>
				</thead>
    			<!-- <tfoot>
    				<tr style="text-align: center;">
		                <th>Slno</th>
		                <th>Roll No</th>		               
		                <th>Exam Center</th>
		                <th>Group</th>
		                <th>Print</th>
		            </tr>						             
				</tfoot> -->
				<tbody>
					<?php 
						$y=0;
						while ($result_id=mysqli_fetch_assoc($sql_assins)) {
							// `slno_roll_id`, `candidate_moblie`, ``, `center_id`
						$y++;
						?>
						<tr style="text-align: center;">
							<td><?=$y?></td>
							<td><?=$result_id['roll_no']?></td>
							
							<td><?php 
								$center_id=$result_id['center_id'];
								$qry_assign="SELECT c.exam_name,c.slno_exam,c.total_seat,a.group_slno_id FROM ilab_exam_center c left JOIN ilab_assign_center_table a on a.exam_center_slno=c.slno_exam  WHERE c.status_exam='1' and a.exam_center_slno='$center_id' ";
								$sql_assin=mysqli_query($conn, $qry_assign);
								$result_ids=mysqli_fetch_assoc($sql_assin);
							?>
								<?php echo $result_ids['exam_name']; ?>
							</td>
							<td><?php 
							$exam=$result_ids['group_slno_id'];
							$get_group="SELECT * FROM `ilab_exam_group_assign_class` WHERE `group_slno`='$exam'";
							$sql_exe_get_group=mysqli_query($conn,$get_group);
							$result=mysqli_fetch_assoc($sql_exe_get_group);
							?>
								<?=$result['group_name']?>
							</td>
							<td>
								
								<a target="_blank" href="print_admit?exam_id=<?=$result_id['slno_roll_id']?>&exam=<?=$exam?>">Print Admit Card</a>
								
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		<br>
		<br>
      </div>
    </div>






<?php 
}else{
  header('Location:logout');
  exit;
}
$content_details = ob_get_contents();
ob_clean();
include 'template1.php';

?>