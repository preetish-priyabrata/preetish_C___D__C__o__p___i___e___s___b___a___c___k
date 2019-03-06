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
			<h3 class="text-center">Indent Raised From <?=$place_name?></h3>
			<table id="example1" class="table table-bordered table-striped table-hover text-center">
		        <thead>
		          <tr>
		            <th>Serial Nos </th>                        
		          
		            <th>Raised To Place Name</th>
		            <th>Indent Id</th>
		            <th>Date</th>
		            <th>Time</th>
		            <th>Status</th>
		            <th>Action</th>

		          </tr>
		        </thead>
		        <tbody> 
		        <?php
		          $x=1;
		          $place_id1=$district_id;
		            $query_list="SELECT * FROM `rhc_master_district_indent` WHERE `indent_place_raised_by`='$place_id1' AND `status`!='0' and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
		          $sql_exe_list=mysqli_query($conn,$query_list);
		          while($result_list=mysqli_fetch_assoc($sql_exe_list)){
		        ?>
		        <tr>
		          <td><?=$x?></td>
		         
		          <td>Bihar</td>
		          <td><?=$result_list['indent_id'];?></td>
		          <td><?=date('d-m-Y',strtotime(trim($result_list['date_creation'])));?></td>
		          <td><?=date('h:i:s a',strtotime(trim($result_list['time_creation'])));?></td>
		          <td><?php
		                if($result_list['status']==2){
		                  echo "<small style='color:green'>Issued</small>";
		                }else{
		                  echo "<small style='color:red'>Not Issued</small>";
		                }
		          ?></td>
		          <td>
		          <a target="_blank" href="admin_raise_indent_district.php?indent_id=<?=$result_list['indent_id'];?>" class="btn btn-info" role="button">More</a></td>
		          
		        </tr>
		        <?php 
		          $x++;
		        }?>
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
                            }
                            if($num_hos!="0"){
                            	$dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
                           		 $place_name=strtoupper($dh_fetch_detail['hosptial_name']).'['.$dh_fetch_detail['place_hostpital_id'].']';
                            }
                            if($num_block!="0"){
                            	$block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                          		$place_name=strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
                            }
                       

		?>
			<h3 class="text-center">Indent Raised From <?=$place_name?></h3>
				<table id="example1" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                      <tr>
                        <th>Serial Nos </th>
                        
                        <th>Raised To Place Name</th>
                        <th>Indent Id</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody> 
                    <?php
                    // indent_place_raised_to
                      $x=0;
                      $place_ids=$block_dh_uphc;
                      $query_list="SELECT * FROM `rhc_master_dh_block_indent` WHERE `indent_place_raised_by`='$place_ids' AND `status`!='0' and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                      while($result_list=mysqli_fetch_assoc($sql_exe_list)){
                      	$x++;
                    ?>
                    <tr>
                      <td><?=$x?></td>
                      <td>
                        <?php
                        $place_district_id=$result_list['indent_place_raised_to'];
		            	$get_block="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_district_id'	";
		            	$sql_exec_block=mysqli_query($conn,$get_block);
		            	$block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
		            	echo $place_name=strtoupper($block_fetch_detail['district_name']).'['.$block_fetch_detail['place_district_id'].']';
                        ?>
                      </td>
                      <td><?=$result_list['indent_id'];?></td>
                      <td><?=date('d-m-Y',strtotime(trim($result_list['date_creation'])));?></td>
                      <td><?=date('h:i:s a',strtotime(trim($result_list['time_creation'])));?></td>
                      <td><?php
                            if($result_list['status']==2){
                              echo "<small style='color:green'>Issued</small>";
                            }else{
                              echo "<small style='color:red'>Not Issued</small>";
                            }
                      ?></td>
                      <td>
                            
                       <a target="_blank" href="admin_raise_indent_block_dh_uphc.php?indent_id=<?=$result_list['indent_id'];?>" class="btn btn-info" role="button">More</a></td>
                     
                    </tr>
                    <?php 
                     
                    }?>
                    </tbody>
              </table>
              <?php
				break;
			case '3':




	
				$phc_id=$phc_aphc;
                $get_phc="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$phc_id'";
                $sql_exec_phc=mysqli_query($conn,$get_phc);
                $num_phc=mysqli_num_rows($sql_exec_phc);
                if($num_phc!=0){
					$phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);
                	$place_name= strtoupper($phc_fetch_detail['phc_name']).'['.$phc_fetch_detail['place_phc_id'].']';

				}    
                
                $place_id_aphc=$phc_aphc;
                $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
                $sql_exec_aphc=mysqli_query($conn,$get_aphc);
                $num_aphc=mysqli_num_rows($sql_exec_aphc);
                if($num_aphc!=0){
					$aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
                    $place_name= strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
				}
                          
			?>
					<h3 class="text-center">Indent Raised From <?=$place_name?></h3>
					 <table id="example1" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                      <tr>
                        <th>Serial Nos </th>
                        <th>Raised To Place Name</th>
                        <th>Indent Id</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody> 
                    <?php
                    // indent_place_raised_to
                      $x=1;
                      // $place_id=$_SESSION['place_id'];
                      $query_list="SELECT * FROM `rhc_master_phc_aphc_indent` WHERE `indent_place_raised_by`='$phc_aphc' AND `status`!='0' and  `date_creation` BETWEEN '$date_one' AND '$date_two' order by `slno` desc";
                      $sql_exe_list=mysqli_query($conn,$query_list);
                      while($result_list=mysqli_fetch_assoc($sql_exe_list)){
                    ?>
                    <tr>
                      <td><?=$x?></td>
                      <td>
                        <?php 
                       	  	$block_id=$result_list['indent_place_raised_to'];
                          	$get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
                          	$sql_exec_block=mysqli_query($conn,$get_block);
							$block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
                          	echo strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
                        ?>
                      </td>
                      <td><?=$result_list['indent_id'];?></td>
                      <td><?=date('d-m-Y',strtotime(trim($result_list['date_creation'])));?></td>
                      <td><?=date('h:i:s a',strtotime(trim($result_list['time_creation'])));?></td>
                      <td><?php
                            if($result_list['status']==2){
                              echo "<small style='color:green'>Issued</small>";
                            }else{
                              if($result_list['status']==1){
                              echo "<small style='color:red'>Not Issued</small>";
                              }
                            }
                      ?></td>
                      <td>
                            
                       <a target="_blank" href="admin_raise_indent_phc_aphc.php?indent_id=<?=$result_list['indent_id'];?>" class="btn btn-info" role="button">More</a></td>
                      
                   
                    </tr>
                    <?php 
                      $x++;
                    }?>
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
      "autoWidth": false
    });
  });
</script>