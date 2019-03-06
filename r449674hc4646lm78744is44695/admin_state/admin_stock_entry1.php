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
        Indent Raising Form
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Indent</a></li>
        <li class="active"><a href="#">Raise Indent</a></li>
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
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Indent  Form</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" id="indent"  method="POST">
              <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Date :</label>
                <?=date('Y-m-d')?>
                <!-- <input type="email" class="form-control" id="email"> -->
              </div>
              </div>
               <div class="col-sm-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                <!-- <input type="password" class="form-control" id="pwd"> -->
                <?=date('H:i:s')?>
              </div>
              </div>  
               <div class="col-sm-6 pull-right">       
              <div class="form-group pull-right">
                <label for="email">Location :</label>
                <input type="hidden" name="place_id" id="place_id" value="<?=$_SESSION['place_id']?>">
                <input type="hidden" name="place_status" id="place_status" value="<?=$_SESSION['designation']?>">
                <?php  $place_id_district=$_SESSION['place_id']?>
                <?php 
                $get_district="SELECT * FROM `rhc_master_place_district` WHERE `place_district_id`='$place_id_district'";
                $sql_exec_district=mysqli_query($conn,$get_district);
                $district_fetch_detail=mysqli_fetch_assoc($sql_exec_district);
                echo strtoupper($district_fetch_detail['district_name']).'['.$district_fetch_detail['place_district_id'].']'?>
                <input type="hidden" name="raise_place_id" value="<?=$district_fetch_detail['place_district_id']?>">
                <input type="hidden" name="top_place_id" value="<?=$district_fetch_detail['place_state_id']?>">
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
              
    
              <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                <th>Quantity</th>
                 <th>Batch Details</th>
                <!-- <th id="btnAdd" class="button-add">Add New Item</th> -->
              </tr>
              </thead>
              <tbody id="list_items_check">
              <?php 
              $x=0;
                $get_stock="SELECT * FROM `rhc_master_stock_state_items` ";
                $sql_exe_stock=mysqli_query($conn,$get_stock);
                while ($result_fetch=mysqli_fetch_assoc($sql_exe_stock)) {
                  $x++;

                  ?>
                <tr>
                <td><?=$x?></td>
                <td><?=$result_fetch['item_codes']?></td>
                <td><?=$result_fetch['item_types']?></td>
                <td><input type="text" name="quantity[]" required=""></td>
                <!-- <td><?=$result_fetch['item_quantity']?></td> -->
                <td>
                <a  id="btnAdd<?=$x?>" onclick="add_row(<?=$x?>)" class="button-add">Add Batch</a>
                <table id="myTable<?=$x?>" class="table table-striped text-center" border="1">
                  <thead align="center">
                  <tr>
                    <!-- <th>Batch No</th> -->
                    <th>Batch No</th>
                    <th>Quantity</th>
                    <th>Date Of Expire</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody id="list_items_check<?=$x?>">

                  </tbody>
                 </table>
              </td>



                </tr>


                <?php
                 
                }

              ?>
               
              </tbody>
            </table>
            <input type="text" name="counts_no" id="counts_no" value="<?=$x?>">
            <div class="row text-center">
              <span  id="error" style="color: red;"></span>
            </div>
            <div class="row">
            <div class="col-sm-12">

             <span class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </spam>
            <span class="text-center" id="error" style="color: red;"></span>
          <span class="pull-right">
           <a href="admin_raise_indent.php"  class="btn btn-default">Reset</a>  
           <button type="button" onclick="check_values();" class="btn btn-default">Submit</button>
           </span>
           </div>
        </div>
          </form>
        </div>
      </div>
      </div>
      </div>
      </div>
      <!-- <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading text-center" style="background-color: palevioletred;"><strong>Item Details</strong></div>
          <div class="panel-body">

            <table class="table table-striped" id="hide">
              <tr id="">
                <td>Item Code :</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Item Type :</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Total Indent Quantity :</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Received Quantity</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Available Indent Quantity</td>
                <td>0</td>                
              </tr>
              <tr>
                <td>Indent Upper Limit Quantity</td>
                <td class="user_click">0
                <input type="hidden" id="vard" value="0">
                </td>                
              </tr>
              
            </table>
          </div>
        </div>

      </div> -->
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
<?php 
  // item code 
  $query_item_code="SELECT * FROM `rhc_master_item_code_list` WHERE `status`='1'";
  $sql_exe_item_code=mysqli_query($conn,$query_item_code);
  //item type             
  $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `status`='1'";
  $sql_exe_item_type=mysqli_query($conn,$query_item_type);
?>
<script type="text/javascript">
// block of enter key submit form
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script>             
<script type="text/javascript">
var ids=0;
var counts_no=$('#counts_no').val();
var ctr =1;
var idssd=0;
// for (var i =1 ; i <counts_no; i++) {
// //alert()
function add_row(i) {
   alert(i);
// $('#myTable'+i).on('click', '.button-add', function () {
   ids=ctr;
    var itemcodes = "itemcode" + ctr;
    var itemtypes = "itemtype" + ctr;
    var text_quantitys = "text_quantity" + ctr;
    var txtOccupation = "txtOccupation" + ctr;
    var txtOccupationss = "txtOccupations" + ctr;
    var newTr = '<tr><td><input type="text" id=' + itemcodes + ' name="txtOccupation[]" required/></td><td><input type="text" id=' + itemtypes + ' name="txtOccupation[]" required/></td><td><input type="text" id=' + txtOccupation + ' name="txtOccupation[]" required/></td></tr>';
   
    $('#myTable'+i).append(newTr);
     ctr++;
// });
}

</script>
