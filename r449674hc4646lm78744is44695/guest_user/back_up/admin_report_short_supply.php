<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Short Supply Report       <!--  <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report</a></li>
        <li class="active">Annual Requirement </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
    
    <div class="row">
      <div class="table-responsive">
       <!--  <table class="table">
          ...
        </table> -->
        <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border"  style="background-color: orange">
            <h3 class="box-title text-center">Result</h3>
           </div>
            <div class="box-body">
            <table  class="table table-bordered table-striped table-hover text-center">
            <thead>
              <tr>
                <th>Item Name </th>                        
              
                <th>Shortage</th>
               

              </tr>
            </thead>
            <tbody> 
            <?php

                $query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `state_place_id`='BR'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                 $total_indent=0;
                 $total_issued=0; 

               
                $item_code=$result_list_item['item_codes'];
                $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                $sql_exe_item=mysqli_query($conn,$query_item_name);
                $res_list=mysqli_fetch_assoc($sql_exe_item);

                $item_types=$result_list_item['item_types'];
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);

                
                  //district 
                 $query_issued="SELECT SUM(quantity_issued),SUM(quantity_indent) FROM `rhc_master_district_item_details_challan_no` WHERE `item_code`='$item_code' and `item_type`='$item_types'";

                  $sql_exe_issued=mysqli_query($conn,$query_issued);
                  $fetch_issued=mysqli_fetch_array($sql_exe_issued);
                  // echo "<pre>";
                  // print_r($fetch_issued);
                  if($fetch_issued[0]==""){
                    // echo "0";
                    $total_issued=$total_issued+0;
                  }else{
                    // echo $fetch_issued[0];
                    $total_issued=$total_issued+$fetch_issued[0];
                  }
                  if($fetch_issued[1]==""){
                    // echo "0";
                    $total_indent=$total_indent+0;
                  }else{
                    // echo $fetch_issued[1];
                    $total_indent=$total_indent+$fetch_issued[1];
                  }

               
                      // dh/block/uphc
                  $query_issued_dh="SELECT SUM(quantity_issued),SUM(quantity_indent)  FROM `rhc_master_dh_block_item_details_challan_no` WHERE  `item_code`='$item_code' and `item_type`='$item_types'";

                  $sql_exe_issued_dh=mysqli_query($conn,$query_issued_dh);
                  $fetch_issued_dh=mysqli_fetch_array($sql_exe_issued_dh);
                  if($fetch_issued_dh[0]==""){
                    // echo "0";
                    $total_issued=$total_issued+0;
                  }else{
                    // echo $fetch_issued[0];
                    $total_issued=$total_issued+$fetch_issued_dh[0];
                  }
                  if($fetch_issued_dh[1]==""){
                    // echo "0";
                    $total_indent=$total_indent+0;
                  }else{
                    // echo $fetch_issued[1];
                    $total_indent=$total_indent+$fetch_issued_dh[1];
                  }
                  // // phc/aphc
                  $query_issued_phc="SELECT SUM(quantity_issued),SUM(quantity_indent) FROM `rhc_master_phc_aphc_item_details_challan_no` WHERE `item_code`='$item_code' and `item_type`='$item_types'";

                  $sql_exe_issued=mysqli_query($conn,$query_issued_phc);
                  $fetch_issued_phc=mysqli_fetch_array($sql_exe_issued_phc);
                  if($fetch_issued_phc[0]==""){
                    // echo "0";
                    $total_issued=$total_issued+0;
                  }else{
                    // echo $fetch_issued[0];
                    $total_issued=$total_issued+$fetch_issued_phc[0];
                  }
                  if($fetch_issued_phc[1]==""){
                    // echo "0";
                    $total_indent=$total_indent+0;
                  }else{
                    // echo $fetch_issued[1];
                    $total_indent=$total_indent+$fetch_issued_phc[1];
                  }
                  // //phc asha
                  $query_issued_asha_phc="SELECT SUM(quantity_issued),SUM(quantity_indent) FROM `rhc_master_phc_asha_item_details_challan_no` WHERE  `item_code`='$item_code' and `item_type`='$item_types'";

                      $sql_exe_issued_asha_phc=mysqli_query($conn,$query_issued_asha_phc);
                      $fetch_issued_asha_phc=mysqli_fetch_array($sql_exe_issued_asha_phc);
                      if($fetch_issued_asha_phc[0]==""){
                        // echo "0";
                        $total_issued=$total_issued+0;
                      }else{
                        // echo $fetch_issued[0];
                        $total_issued=$total_issued+$fetch_issued_asha_phc[0];
                      }
                      if($fetch_issued_asha_phc[1]==""){
                        // echo "0";
                        $total_indent=$total_indent+0;
                      }else{
                        // echo $fetch_issued[1];
                        $total_indent=$total_indent+$fetch_issued_asha_phc[1];
                      }
                  // // aphc asha
                  $query_issued_aphc_asha="SELECT SUM(quantity_issued) FROM `rhc_master_aphc_asha_item_details_challan_no` WHERE  `item_code`='$item_code' and `item_type`='$item_types'";

                      $sql_exe_issued_aphc_asha=mysqli_query($conn,$query_issued_aphc_asha);
                      $fetch_issued_asha_aphc=mysqli_fetch_array($sql_exe_issued_aphc_asha);
                      if($fetch_issued_asha_aphc[0]==""){
                        // echo "0";
                        $total_issued=$total_issued+0;
                      }else{
                        // echo $fetch_issued[0];
                        $total_issued=$total_issued+$fetch_issued_asha_aphc[0];
                      }
                      if($fetch_issued_asha_aphc[1]==""){
                        // echo "0";
                        $total_indent=$total_indent+0;
                      }else{
                        // echo $fetch_issued[1];
                        $total_indent=$total_indent+$fetch_issued_asha_aphc[1];
                      }
                      ?>
                      <tr>
                      <td><?php
                       echo $item_names=$res_list['item_name'].'-'.$res_lis_type['item_type_name'];?></td>
                       <td><?php 
                         echo $total_indent-$total_issued;?></td>
                         </tr>
                         <?php
                 


                }

            ?>
            </tbody>
            </table>
            
            </div>
          </div>
        </div>
      </div> 
    </div>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
