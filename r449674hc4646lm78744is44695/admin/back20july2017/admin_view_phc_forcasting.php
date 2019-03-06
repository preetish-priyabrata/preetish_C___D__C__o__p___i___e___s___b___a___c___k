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
        View Forcasting List
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Forcasting </a></li>
        <li class="active"><a href="#"> View Forcasting List </a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
     <div class="row">
    <div class="col-sm-12">
    <div class="box box-info">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>List Of Forcasting PHC</strong></div>
        <div class="demo">
          <div class="panel-body">
         
    
              <table id="example1" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>District Place Name</th>
                <th>Block Place Name</th>
                <th>PHC Place Name</th>
                <th>Item Name</th>
                <th>Item Type</th>    
                <th>Forcasting Quantity</th>                
              </tr>
              </thead>
              <tbody>
              <?php 
              $x=0;
              $query="SELECT * FROM `rhc_master_forcasting_indent` WHERE `place_status`='5'";
              $sql_exe=mysqli_query($conn,$query);
              while($res=mysqli_fetch_assoc($sql_exe)){

                  $place_id=$res['place_id'];
                  $place_id=$res['place_id'];
                  $query_place="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$place_id'";
                  $sql_exe_place=mysqli_query($conn,$query_place);
                  $res_place=mysqli_fetch_assoc($sql_exe_place);

                  $block=$res_place['place_block_id'];
                  $query_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block'";
                  $sql_exe_block=mysqli_query($conn,$query_block);
                  $res_block=mysqli_fetch_assoc($sql_exe_block);

                  $district=$res_block['place_district_id'];

                  $query_place_district="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$district'";
                  $sql_exe_place_district=mysqli_query($conn,$query_place_district);
                  $res_place_district=mysqli_fetch_assoc($sql_exe_place_district);

                  $item_code=$res['item_code'];
                  $query_item_name="SELECT * FROM `rhc_master_item_code_list` WHERE `item_code`='$item_code'";
                  $sql_exe_item=mysqli_query($conn,$query_item_name);
                  $res_list=mysqli_fetch_assoc($sql_exe_item);

                  $item_types=$res['item_type'];
                  $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `item_type`='$item_types'";
                  $sql_exe_item_type=mysqli_query($conn,$query_item_type);
                  $res_lis_type=mysqli_fetch_assoc($sql_exe_item_type);
                  
                $x++;
                ?>
               <tr>
                <td><?=$x?></td>
               
                <td><?php
                  
                  
                  echo $res_place_district['district_name']."[".$res_place_district['place_district_id']."]";
                ?>
                </td>
                 <td><?php
                  echo $res_block['block_name']."[".$res_block['place_block_id']."]";
                  
                ?>

                </td>
                 <td><?php
                  echo $res_place['phc_name']."[".$res_place['place_phc_id']."]";
                  
                ?>
                </td>
               <td><?=strtoupper($res_list['item_name']."[".$res_list['item_code']."]");?></td>
                <td><?=strtoupper($res_lis_type['item_type_name']."[".$res_lis_type['item_type']."]");?></td>
                <td><?=strtoupper($res['quantity']);?></td>
                
              </tr>
              <?php }?>
              </tbody>
            </table>
            <div class="row">
            <div class="col-sm-12">
             <span class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </spam>
          
           </div>
        </div>
          </form>
        </div>
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
