

<?php 

ob_start();
include 'config.php';
session_start();
if($_SESSION['user_no']){
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

$get_pay_details="SELECT * FROM `ilab_payment_info_PAID` WHERE `mobile_no`='$_SESSION[user_no]' order by `slno_group_pay` desc";
$sql_get_pay_details=mysqli_query($conn,$get_pay_details);

 $get_candidate="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `candidate_moblie`='$_SESSION[user_no]' and `assign_roll_center`='1' ";
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
	<div class="container-fluid">
   <!-- <div class="col-md-12 col-sm-12 "> -->
    <div class="row-eq-height">
      <div class="row">
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
      <div class="col-xl-6">           
            <div class="card" >
              <div class="card-header bg-info text-white text-center"><h5>Download e-admit card</h5></div>

              
              <div class="card-body">
                <div class="table-responsive">
                <table id="example_applied" class="table table-striped">
                <thead class="thead-inverse">
                  
                    <tr style="text-align: center;">
                    <th>Slno</th>
                    <th>Roll No</th>                   
                    <th>Exam Center</th>
                    <th>Group</th>
                    <th>Print</th>
               
                  </tr>
                </thead>
               <tbody>
                  <?php 
                    $y=0;
                    while ($result_id=mysqli_fetch_assoc($sql_assins)) {
                     // print_r($result_id);
                      // `slno_roll_id`, `candidate_moblie`, ``, `center_id`
                     // center_id
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
                        //print_r($result_ids);
                      ?>
                        <?php echo $result_ids['exam_name']; ?>
                      </td>
                      <td><?php 
                      $exam=$result_id['group_exam_slno'];
                      $get_group="SELECT * FROM `ilab_exam_group_assign_class` WHERE `group_slno`='$exam'";
                      $sql_exe_get_group=mysqli_query($conn,$get_group);
                      $result=mysqli_fetch_assoc($sql_exe_get_group);
                      ?>
                        <?=$result['group_name']?>
                      </td>
                      <td>
                        
                        <a target="_blank" href="print_admit?exam_id=<?=web_encryptIt($result_id['slno_roll_id'])?>&exam=<?=web_encryptIt($exam)?>">Print Admit Card</a>
                        
                      </td>
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