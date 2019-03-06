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
     $from_date=trim($_POST['from_date']);
    
    $to_date=trim($_POST['to_date']);
    
    $date_one=date('Y-m-d',strtotime($from_date));
    $date_two=date('Y-m-d',strtotime($to_date));
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
			<h3 class="text-center">Indent Raised From <?=$place_name?></h3>
	 <table id="example1" class="table table-bordered table-striped table-hover text-center">
            <thead>
              <tr>
                <!-- <th>Serial Nos </th>  -->                      
              
                <th>Item Name</th>
                <th>Indent Quantity</th>
                <th>Issue Quantity</th>
                <th>Receive Quantity</th>
                <th>Transit Quantity</th>
              </tr>
            </thead>
            <tbody> 
            <?php
              $x=1;
             
               $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  

               
                $item_code=$result_list_item['item_codes'];
                $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                $sql_exe_item=mysqli_query($conn,$query_item_name);
                $res_list=mysqli_fetch_assoc($sql_exe_item);

                $item_types=$result_list_item['item_types'];
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

                 $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];

                 $query_list1="SELECT SUM(rhc_master_district_indent_id_details.item_quantity) FROM rhc_master_district_indent_id_details INNER JOIN rhc_master_district_indent ON rhc_master_district_indent_id_details.indent_id=rhc_master_district_indent.indent_id WHERE rhc_master_district_indent_id_details.status!='0' and rhc_master_district_indent.indent_place_raised_by='$district_id' and rhc_master_district_indent_id_details.item_code='$item_code' and rhc_master_district_indent_id_details.Item_type='$item_types' and  rhc_master_district_indent.date_creation BETWEEN '$date_one' AND '$date_two'";
                $sql_exe_list=mysqli_query($conn,$query_list1);
                $fetch=mysqli_fetch_array($sql_exe_list);

                $query_issued="SELECT SUM(quantity_issued),SUM(quantity_received) FROM `rhc_master_district_item_details_challan_no` WHERE `receiver_place_id`='$district_id' and `item_code`='$item_code' and `item_type`='$item_types' and `date_creation` BETWEEN '$date_one' AND '$date_two'";

                $query_issued_transit="SELECT SUM(quantity_issued) FROM `rhc_master_district_item_details_challan_no` WHERE `receiver_place_id`='$district_id' and `status`!='1' and `item_code`='$item_code' and `item_type`='$item_types' and `date_creation` BETWEEN '$date_one' AND '$date_two'";
            
              
              $sql_exe_issued=mysqli_query($conn,$query_issued);
              $fetch_issued=mysqli_fetch_array($sql_exe_issued);

               $sql_exe_issued_transit=mysqli_query($conn,$query_issued_transit);
              $fetch_issued_transit=mysqli_fetch_array($sql_exe_issued_transit);

              if(!empty($fetch_issued[0])){
                $num_rows_issued=$fetch_issued[0]; 
              }else{
                $num_rows_issued="0";
              }

              if(!empty($fetch_issued[1])){
                $num_rows_receive=$fetch_issued[1]; 
              }else{
                $num_rows_receive="0";
              }
              if(!empty($fetch_issued_transit[0])){
                $num_rows_transit=$fetch_issued_transit[0]; 
              }else{
                $num_rows_transit="0";
              }
                     
                      if(!empty($fetch[0])){
                        $num_rows_indent=$fetch[0]; 
                      }else{
                        $num_rows_indent="0";
                      }
            ?>
            <tr>
             <!--  <td><?=$x?></td> -->
             
              <!-- <td>Bihar</td> -->
              <td><?=$item_names;?></td>
              <td><?=$num_rows_indent?></td>
              <td><?=$num_rows_issued?></td>
              <td><?=$num_rows_receive?></td>
              <td><?=$num_rows_transit?></td>
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
                        <th>Item Name</th>
                        <th>Indent Quantity</th>
                        <th>Issue Quantity</th>
                        <th>Receive Quantity</th>
                        <th>Transit Quantity</th>                                            
                      </tr>
                    </thead>
                    <tbody> 
                    <?php
                    $x=0;
                    // indent_place_raised_to
                      $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  
                  $x++;
               
                $item_code=$result_list_item['item_codes'];
                $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                $sql_exe_item=mysqli_query($conn,$query_item_name);
                $res_list=mysqli_fetch_assoc($sql_exe_item);

                $item_types=$result_list_item['item_types'];
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

                 $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];
                  $query_list="SELECT  * FROM rhc_master_dh_block_indent_id_details INNER JOIN rhc_master_dh_block_indent ON rhc_master_dh_block_indent_id_details.indent_id=rhc_master_dh_block_indent.indent_id WHERE rhc_master_dh_block_indent.status!='0' and  rhc_master_dh_block_indent.indent_place_raised_by='$block_dh_uphc' and rhc_master_dh_block_indent_id_details.item_code='$item_code' and rhc_master_dh_block_indent_id_details.Item_tdate_twoype='$item_types' and rhc_master_dh_block_indent.date_creation BETWEEN '$date_one' AND '$date_two'";
                     $sql_exe_list=mysqli_query($conn,$query_list);
                      $fetch=mysqli_fetch_array($sql_exe_list);

                    $query_issued="SELECT SUM(quantity_issued),SUM(quantity_received) FROM `rhc_master_dh_block_item_details_challan_no` WHERE `receiver_place_id`='$block_dh_uphc' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$date_one' AND '$date_two' ";

                    $query_issued_transit="SELECT SUM(quantity_issued) FROM `rhc_master_dh_block_item_details_challan_no` WHERE `receiver_place_id`='$block_dh_uphc' and `status`!='1' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$date_one' AND '$date_two' ";
                
                  
                  $sql_exe_issued=mysqli_query($conn,$query_issued);
                  $fetch_issued=mysqli_fetch_array($sql_exe_issued);

                   $sql_exe_issued_transit=mysqli_query($conn,$query_issued_transit);
                  $fetch_issued_transit=mysqli_fetch_array($sql_exe_issued_transit);

                  if(!empty($fetch_issued[0])){
                    $num_rows_issued=$fetch_issued[0]; 
                  }else{
                    $num_rows_issued="0";
                  }

                  if(!empty($fetch_issued[1])){
                    $num_rows_receive=$fetch_issued[1]; 
                  }else{
                    $num_rows_receive="0";
                  }
                  if(!empty($fetch_issued_transit[0])){
                    $num_rows_transit=$fetch_issued_transit[0]; 
                  }else{
                    $num_rows_transit="0";
                  }
                         
                          if(!empty($fetch[0])){
                            $num_rows_indent=$fetch[0]; 
                          }else{
                            $num_rows_indent="0";
                          }
                    ?>
                     <tr>
                        <td><?=$item_names;?></td>
                        <td><?=$num_rows_indent?></td>
                        <td><?=$num_rows_issued?></td>
                        <td><?=$num_rows_receive?></td>
                        <td><?=$num_rows_transit?></td>                       
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
                        <th>Item Name</th>
                        <th>No Time </th>
                      </tr>
                    </thead>
                    <tbody> 
                    <?php
                    $x=0;
                    // indent_place_raised_to
                      $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  
                  $x++;
               
                $item_code=$result_list_item['item_codes'];
                $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                $sql_exe_item=mysqli_query($conn,$query_item_name);
                $res_list=mysqli_fetch_assoc($sql_exe_item);

                $item_types=$result_list_item['item_types'];
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

                 $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];

                  $query_list="SELECT * FROM rhc_master_phc_aphc_indent_id_details INNER JOIN rhc_master_phc_aphc_indent ON rhc_master_phc_aphc_indent_id_details.indent_id=rhc_master_phc_aphc_indent.indent_id WHERE  rhc_master_phc_aphc_indent.status!='0' and rhc_master_phc_aphc_indent.indent_place_raised_by='$phc_aphc' and rhc_master_phc_aphc_indent_id_details.item_code='$item_code' and rhc_master_phc_aphc_indent_id_details.Item_type='$item_type'and  rhc_master_phc_aphc_indent.date_creation BETWEEN '$date_one' AND '$date_two' ";
                     $sql_exe_list=mysqli_query($conn,$query_list);
                     $fetch=mysqli_fetch_array($sql_exe_list);

                    $query_issued="SELECT SUM(quantity_issued),SUM(quantity_received) FROM `rhc_master_phc_aphc_item_details_challan_no` WHERE `receiver_place_id`='$phc_aphc' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$year_one' AND '$date_two'";

                    $query_issued_transit="SELECT SUM(quantity_issued) FROM `rhc_master_phc_aphc_item_details_challan_no` WHERE `receiver_place_id`='$phc_aphc' and `status`!='1' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$date_one' AND '$date_two'";
                
                  
                      $sql_exe_issued=mysqli_query($conn,$query_issued);
                      $fetch_issued=mysqli_fetch_array($sql_exe_issued);

                       $sql_exe_issued_transit=mysqli_query($conn,$query_issued_transit);
                      $fetch_issued_transit=mysqli_fetch_array($sql_exe_issued_transit);

                      if(!empty($fetch_issued[0])){
                        $num_rows_issued=$fetch_issued[0]; 
                      }else{
                        $num_rows_issued="0";
                      }

                      if(!empty($fetch_issued[1])){
                        $num_rows_receive=$fetch_issued[1]; 
                      }else{
                        $num_rows_receive="0";
                      }
                      if(!empty($fetch_issued_transit[0])){
                        $num_rows_transit=$fetch_issued_transit[0]; 
                      }else{
                        $num_rows_transit="0";
                      }
                             
                        if(!empty($fetch[0])){
                          $num_rows_indent=$fetch[0]; 
                        }else{
                          $num_rows_indent="0";
                        }
                    ?>
                      <tr>
                        <td><?=$item_names;?></td>
                        <td><?=$num_rows_indent?></td>
                        <td><?=$num_rows_issued?></td>
                        <td><?=$num_rows_receive?></td>
                        <td><?=$num_rows_transit?></td>
                        
                      </tr><?php
                    }?>
                    </tbody>
              </table>
              <?php
        break;
       case '5':

          $hsc_ids=$hsc_ids;
          $get_hsc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE`place_phc_sub_id`='$hsc_ids'";
          $sql_exec_hsc=mysqli_query($conn,$get_hsc);
          $hsc_fetch_detail=mysqli_fetch_assoc($sql_exec_hsc);
          $place_name=strtoupper($hsc_fetch_detail['phc_sub_center_name']).'['.$hsc_fetch_detail['place_phc_sub_id'].']';
                          
      ?>
          <h3 class="text-center">Indent Raised From <?=$place_name?></h3>
           <table id="example1" class="table table-bordered table-striped table-hover text-center">
                    <thead>
                      <tr>                             
                        <th>Serial Nos </th>                      
                        <th>Item Name</th>
                        <th>No Time </th>
                      </tr>
                    </thead>
                    <tbody> 
                    <?php
                    $x=0;
                    // indent_place_raised_to
                      $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='$state_id'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  
                  $x++;
               
                $item_code=$result_list_item['item_codes'];
                $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                $sql_exe_item=mysqli_query($conn,$query_item_name);
                $res_list=mysqli_fetch_assoc($sql_exe_item);

                $item_types=$result_list_item['item_types'];
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

                 $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];

                  $query_list="SELECT * FROM rhc_master_phc_asha_indent_id_details INNER JOIN rhc_master_phc_asha_indent ON rhc_master_phc_asha_indent_id_details.indent_id=rhc_master_phc_asha_indent.indent_id WHERE rhc_master_phc_asha_indent.status!='0' and rhc_master_phc_asha_indent.indent_place_raised_by='$hsc_ids' and rhc_master_phc_asha_indent_id_details.item_code='$item_code' and rhc_master_phc_asha_indent_id_details.Item_type='$item_type'and  rhc_master_phc_asha_indent.date_creation BETWEEN '$date_one' AND '$date_two' ";
                     $sql_exe_list=mysqli_query($conn,$query_list);
                     $fetch=mysqli_fetch_array($sql_exe_list);

                    $query_issued="SELECT SUM(quantity_issued),SUM(quantity_received) FROM `rhc_master_phc_asha_item_details_challan_no` WHERE `receiver_place_id`='$hsc_ids' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$year_one' AND '$date_two'";

                    $query_issued_transit="SELECT SUM(quantity_issued) FROM `rhc_master_phc_asha_item_details_challan_no` WHERE `receiver_place_id`='$hsc_ids' and `status`!='1' and `item_code`='$item_code' and `item_type`='$item_type' and `date_creation` BETWEEN '$date_one' AND '$date_two'";
                
                  
                      $sql_exe_issued=mysqli_query($conn,$query_issued);
                      $fetch_issued=mysqli_fetch_array($sql_exe_issued);

                       $sql_exe_issued_transit=mysqli_query($conn,$query_issued_transit);
                      $fetch_issued_transit=mysqli_fetch_array($sql_exe_issued_transit);

                      if(!empty($fetch_issued[0])){
                        $num_rows_issued=$fetch_issued[0]; 
                      }else{
                        $num_rows_issued="0";
                      }

                      if(!empty($fetch_issued[1])){
                        $num_rows_receive=$fetch_issued[1]; 
                      }else{
                        $num_rows_receive="0";
                      }
                      if(!empty($fetch_issued_transit[0])){
                        $num_rows_transit=$fetch_issued_transit[0]; 
                      }else{
                        $num_rows_transit="0";
                      }
                             
                        if(!empty($fetch[0])){
                          $num_rows_indent=$fetch[0]; 
                        }else{
                          $num_rows_indent="0";
                        }
                    ?>
                      <tr>
                        <td><?=$item_names;?></td>
                        <td><?=$num_rows_indent?></td>
                        <td><?=$num_rows_issued?></td>
                        <td><?=$num_rows_receive?></td>
                        <td><?=$num_rows_transit?></td>
                        
                      </tr><?php
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
    $("#example1").DataTable({
      "order": [[ 2, "asc" ]]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false

    });
  });
//   $(document).ready(function() {
//     $('#example').DataTable( {
//         "order": [[ 3, "desc" ]]
//     } );
// } );
</script>