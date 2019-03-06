<?php
error_reporting(E_ALL);
session_start();
include "config.php";
if($_SESSION['admin_emails']){


	if(!empty($_POST['place_id'])){
		$state_id=trim($_POST['state_id']);
    $district_id=trim($_POST['district_id']);
    $block_dh_uphc=trim($_POST['block_dh_uphc']);
    $phc_aphc=trim($_POST['phc_aphc']);
    $place_id=trim($_POST['place_id']);
    $years_selected=trim($_POST['years']);
    $year_array=explode('-', $years_selected);
    $year_one=$year_array[0];
    $year_two=$year_array[0];
    $quarterly_selected=trim($_POST['quarterly']);
    $quarterly_array=explode('-', $quarterly_selected);
    $quarterly_one=$quarterly_array[0];
    $quarterly_two=$quarterly_array[1];
    $date_one=$year_one."-".$quarterly_one."-"."1";
    $date_two=$year_two."-".$quarterly_two."-"."31";
    $hsc_ids=trim($_POST['hsc_ids']);
		// exit;
		switch ($place_id) {
			case '1':
				# code...
      $place_district_id=$district_id;
      $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
      $sql_exec_block=mysqli_query($conn,$get_block);
      $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
      $place_name=strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';
?>
			<h3 class="text-center">Received At <?=$place_name?></h3>
			<table id="example1" class="table table-bordered table-striped table-hover text-center">
        <thead>
          <tr>
            <th>Serial Nos </th>
            <th>Challan No</th>
            <th>Issued From</th>
            <th>Date</th>
            <th>Time</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <?php 
          
          $x=0;
          $query_list="SELECT * FROM `rhc_master_district_challan_no` WHERE `receiver_place_id`='$district_id' and  `status`='1' and `date_update_status` BETWEEN '$date_one' AND '$date_two' order by `slno` desc" ;
          $sql_exe_list=mysqli_query($conn,$query_list);
          while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
          $x++;
          ?>    
          <tr>
            <td><?=$x?></td>
            <td><?=$res_list['challen_no']?></td>
            <td>
              Bihar[BR]
            </td>
            <td><?=date('d-m-Y',strtotime(trim($res_list['date_update_status'])));?></td>
            <td><?=date('h:i:s a',strtotime(trim($res_list['time_update_status'])));?></td>
            <td><a target="_blank" href="admin_received_challan_district.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
	 <?php
	    	break;
		case '2':                 
      $block_id=$block_dh_uphc;
      $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
      $sql_exec_block=mysqli_query($conn,$get_block);
                         
      $dh_id=$block_dh_uphc;
      $get_dh="SELECT * FROM `rhc_master_place_dh` WHERE `place_hostpital_id`='$dh_id'";
      $sql_exec_dh=mysqli_query($conn,$get_dh);

      $dh_id1=$block_dh_uphc;
      $get_dh="SELECT * FROM `rhc_master_place_uphc` WHERE `place_uphc_id`='$dh_id1'";
      $sql_exec_dh1=mysqli_query($conn,$get_dh);

      $num_hos1=mysqli_num_rows($sql_exec_dh1);
      $num_block=mysqli_num_rows($sql_exec_block);
      $num_hos=mysqli_num_rows($sql_exec_dh);

      if($num_hos1!="0"){
       	$dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh1);
       	$place_name=strtoupper($dh_fetch_detail['uphc_name']).'['.$dh_fetch_detail['place_uphc_id'].']';
?>
        <h3 class="text-center">Received At <?=$place_name?></h3>
        <table id="example1" class="table table-bordered table-striped table-hover text-center">
          <thead>
            <tr>
              <th>Serial Nos </th>
              <th>Challan No</th>
              <th>Issued From</th>
              <th>Date</th>
              <th>Time</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
          <?php 
          
          $x=0;
             $query_list="SELECT * FROM `rhc_master_dh_block_challan_no` WHERE `receiver_place_id`='$block_dh_uphc' and  `status`='1'   and `date_update_status` BETWEEN '$date_one' AND '$date_two' order by `slno` desc" ;
            $sql_exe_list=mysqli_query($conn,$query_list);
            while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
              $x++;
              ?>              

          <tr>
            <td><?=$x?></td>
            <td><?=$res_list['challen_no']?></td>
            <td><?php
               $place_district_id=$district_id;
                $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
                $sql_exec_block=mysqli_query($conn,$get_block);
                $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                echo strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';
                ?>
            </td>
            <td><?=date('d-m-Y',strtotime(trim($res_list['date_update_status'])));?></td>
            <td><?=date('h:i:s a',strtotime(trim($res_list['time_update_status'])));?></td>
            <td><a target="_blank" href="admin_received_challan_block_dh_uphc.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td>
          </tr>
          <?php }?>
          </tbody>
        </table>
<?php
      }
      if($num_hos!="0"){
       	$dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
        $place_name=strtoupper($dh_fetch_detail['hosptial_name']).'['.$dh_fetch_detail['place_hostpital_id'].']';
?>
        <h3 class="text-center">Received At <?=$place_name?></h3>
        <table id="example1" class="table table-bordered table-striped table-hover text-center">
          <thead>
            <tr>
              <th>Serial Nos </th>
              <th>Challan No</th>
              <th>Issued From</th>
              <th>Date</th>
              <th>Time</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
          <?php 
          
          $x=0;
             $query_list="SELECT * FROM `rhc_master_dh_block_challan_no` WHERE `receiver_place_id`='$block_dh_uphc' and  `status`='1'   and `date_update_status` BETWEEN '$date_one' AND '$date_two' order by `slno` desc" ;
            $sql_exe_list=mysqli_query($conn,$query_list);
            while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
              $x++;
              ?>              

          <tr>
            <td><?=$x?></td>
            <td><?=$res_list['challen_no']?></td>
            <td><?php
               $place_district_id=$district_id;
                $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
                $sql_exec_block=mysqli_query($conn,$get_block);
                $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                echo strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';
                ?>
            </td>
            <td><?=date('d-m-Y',strtotime(trim($res_list['date_update_status'])));?></td>
            <td><?=date('h:i:s a',strtotime(trim($res_list['time_update_status'])));?></td>
            <td><a target="_blank" href="admin_received_challan_block_dh_uphc.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td>
          </tr>
          <?php }?>
          </tbody>
        </table>
<?php
      }
      if($num_block!="0"){
       	$block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
     		$place_name=strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
?>
        <h3 class="text-center">Received At <?=$place_name?></h3>
        <table id="example1" class="table table-bordered table-striped table-hover text-center">
          <thead>
            <tr>
              <th>Serial Nos </th>
              <th>Challan No</th>
              <th>Issued From</th>
              <th>Date</th>
              <th>Time</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
          <?php 
          
          $x=0;
             $query_list="SELECT * FROM `rhc_master_dh_block_challan_no` WHERE `receiver_place_id`='$block_dh_uphc' and  `status`='1'   and `date_update_status` BETWEEN '$date_one' AND '$date_two' order by `slno` desc" ;
            $sql_exe_list=mysqli_query($conn,$query_list);
            while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
              $x++;
              ?>              

          <tr>
            <td><?=$x?></td>
            <td><?=$res_list['challen_no']?></td>
            <td><?php
               $place_district_id=$district_id;
                $get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'";
                $sql_exec_block=mysqli_query($conn,$get_block);
                $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                echo strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';
                ?>
            </td>
            <td><?=date('d-m-Y',strtotime(trim($res_list['date_update_status'])));?></td>
            <td><?=date('h:i:s a',strtotime(trim($res_list['time_update_status'])));?></td>
            <td><a target="_blank" href="admin_received_challan_block_dh_uphc.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td>
          </tr>
          <?php }?>
          </tbody>
        </table>
<?php
      }
                       

	
			
				break;
			case '3':	
				$phc_id=$phc_aphc;
        $get_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$phc_id'";
        $sql_exec_phc=mysqli_query($conn,$get_phc);
        $num_phc=mysqli_num_rows($sql_exec_phc);
        if($num_phc!=0){
					$phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);
          $place_name= strtoupper($phc_fetch_detail['phc_name']).'['.$phc_fetch_detail['place_phc_id'].']';
?>
          <h3 class="text-center">Received At <?=$place_name?></h3>
          <table id="example1" class="table table-bordered table-striped table-hover text-center">
            <thead>
              <tr>
                <th>Serial Nos </th>
                <th>Challan No</th>
                <th>Issued From</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <?php 
              
              $x=0;
              $query_list="SELECT * FROM `rhc_master_phc_aphc_challan_no` WHERE `receiver_place_id`='$phc_aphc' and  `status`='1'   and `date_update_status` BETWEEN '$date_one' AND '$date_two' order by `slno` desc" ;
              $sql_exe_list=mysqli_query($conn,$query_list);
              while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
              $x++;
              ?>              

              <tr>
                <td><?=$x?></td>
                <td><a href="admin_received_issue_sent_challan_details.php?challen_no=<?=$res_list['challen_no']?>"><?=$res_list['challen_no']?></a></td>
                <td>
                  <?php
                    $block_id=$block_dh_uphc;
                    $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
                    $sql_exec_block=mysqli_query($conn,$get_block);
                    $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                    echo strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
                  ?>

                </td>
                <td><?=date('d-m-Y',strtotime(trim($res_list['date_creation'])));?></td>
                <td><?=date('h:i:s a',strtotime(trim($res_list['time_creation'])));?></td>
                <td><a target="_blank" href="admin_received_challan_phc_aphc.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td>
              </tr>
              <?php }?>
            </tbody>
          </table>

 <?php 

        }    
                
        $place_id_aphc=$phc_aphc;
        $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
        $sql_exec_aphc=mysqli_query($conn,$get_aphc);
        $num_aphc=mysqli_num_rows($sql_exec_aphc);
        if($num_aphc!=0){
					$aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
          $place_name= strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
?>
              <h3 class="text-center">Received At <?=$place_name?></h3>
              <table id="example1" class="table table-bordered table-striped table-hover text-center">
            <thead>
              <tr>
                <th>Serial Nos </th>
                <th>Challan No</th>
                <th>Issued From</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <?php 
              
              $x=0;
              $query_list="SELECT * FROM `rhc_master_phc_aphc_challan_no` WHERE `receiver_place_id`='$phc_aphc' and  `status`='1'   and `date_update_status` BETWEEN '$date_one' AND '$date_two' order by `slno` desc" ;
              $sql_exe_list=mysqli_query($conn,$query_list);
              while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
              $x++;
              ?>              

              <tr>
                <td><?=$x?></td>
                <td><a href="admin_received_issue_sent_challan_details.php?challen_no=<?=$res_list['challen_no']?>"><?=$res_list['challen_no']?></a></td>
                <td>
                  <?php
                    $block_id=$block_dh_uphc;
                    $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
                    $sql_exec_block=mysqli_query($conn,$get_block);
                    $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                    echo strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
                  ?>

                </td>
                <td><?=date('d-m-Y',strtotime(trim($res_list['date_creation'])));?></td>
                <td><?=date('h:i:s a',strtotime(trim($res_list['time_creation'])));?></td>
                <td><a target="_blank" href="admin_received_challan_phc_aphc.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td>
              </tr>
              <?php }?>
            </tbody>
          </table>

<?php
				}
                          
			
				break;
      case '5':
        $hsc_ids=$hsc_ids;
        $get_hsc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE`place_phc_sub_id`='$hsc_ids'";
        $sql_exec_hsc=mysqli_query($conn,$get_hsc);
        $hsc_fetch_detail=mysqli_fetch_assoc($sql_exec_hsc);
        $place_name=strtoupper($hsc_fetch_detail['phc_sub_center_name']).'['.$hsc_fetch_detail['place_phc_sub_id'].']';
?>
      <h3 class="text-center">Received At <?=$place_name?></h3>
      <table id="example1" class="table table-bordered table-striped table-hover text-center">
        <thead>
          <tr>
            <th>Serial Nos </th>
            <th>Challan No</th>
            <th>Issued From</th>
            <th>Date</th>
            <th>Time</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <?php 
          
          $x=0;
          $query_list="SELECT * FROM `rhc_master_phc_asha_challan_no` WHERE `receiver_place_id`='$hsc_ids' and  `status`='1' and `date_update_status` BETWEEN '$date_one' AND '$date_two' order by `slno` desc" ;
          $sql_exe_list=mysqli_query($conn,$query_list);
          while ($res_list=mysqli_fetch_assoc($sql_exe_list)) {
          $x++;
          ?>    
          <tr>
            <td><?=$x?></td>
            <td><?=$res_list['challen_no']?></td>
            <td>
              <?php 
              
                  $phc_id=$phc_aphc;
                  $get_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$phc_id'";
                  $sql_exec_phc=mysqli_query($conn,$get_phc);
                  $phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);
                  echo $place_name= strtoupper($phc_fetch_detail['phc_name']).'['.$phc_fetch_detail['place_phc_id'].']';

                  ?>
            </td>
            <td><?=date('d-m-Y',strtotime(trim($res_list['date_update_status'])));?></td>
            <td><?=date('h:i:s a',strtotime(trim($res_list['time_update_status'])));?></td>
            <td><a target="_blank" href="admin_received_challan_hsc.php?challen_no=<?=$res_list['challen_no'];?>" class="btn btn-info" role="button">More</a></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
   <?php
        break;
			default:
				header('Location:logout.php');
				exit;
				break;
		}
	}

}else{
	header('Location:logout.php');
	exit;
}
?>
<script src="../assert/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assert/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>