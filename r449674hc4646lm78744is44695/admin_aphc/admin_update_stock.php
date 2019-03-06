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
       Update Stock
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Indent</a></li>
        <li class="active"><a href="#">Update Stock</a></li>
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
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Update Stock  Form</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" id="issue_forms" action="admin_update_stock_save.php" method="POST">
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
                <?php $place_id_aphc=$_SESSION['place_id']?>
                <?php 
                $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$place_id_aphc'";
                $sql_exec_aphc=mysqli_query($conn,$get_aphc);
                $aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);
                echo strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']'?>
                <input type="hidden" name="top_place_id" value="<?=$aphc_fetch_detail['place_block_id']?>">
                <input type="hidden" name="raise_place_id" value="<?=$aphc_fetch_detail['place_aphc_id']?>">
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
                <!-- <th id="btnAdd" class="button-add">Add New Item</th> -->
              </tr>
              </thead>
              <tbody id="list_items_check">
              <?php
              $x=0;
                $query_item="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `aphc_place_id`='$place_id_aphc'";
                $sql_exe=mysqli_query($conn,$query_item);
                while ($result_list_item=mysqli_fetch_assoc($sql_exe)) {
                  $x++;

                  ?>
                 <tr>
                  <td><?=$x?></td>
                  <td><input type="hidden" name="item_codes[]" value="<?=$result_list_item['item_codes']?>"><?=$result_list_item['item_codes']?></td>
                  <td><input type="hidden" name="item_types[]" value="<?=$result_list_item['item_types']?>"><?=$result_list_item['item_types']?></td>
                  <td><input type="text" readonly="" id="temp_quantity<?=$x?>" name="item_quantity[]" value="<?=$result_list_item['item_quantity']?>">
                  <input type="hidden"  id="temp1_quantity<?=$x?>" name="item_quantity1[]" value="<?=$result_list_item['item_quantity']?>"><br>
                  <span id="txtOccupations<?=$x?>" style="color: red"></span>
                  
                   <input type="hidden" name="slno[]" value="<?=$result_list_item['slno']?>">
                  </td>
                 </tr>

                 <?php
                }


              ?>
                <input type="hidden"  id="total" name="total" value="<?=$x?>">
              </tbody>
            </table>
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
           <a href="admin_dashboard.php"  class="btn btn-default">Reset</a>  
           <button type="button" onclick="check_before_submit();" class="btn btn-default">Submit</button>
           </span>
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
<script type="text/javascript">
  function check_before_submit() {
    var ides=$('#total').val();
    // alert(ides);
    var count=0;
    var count1=0;
    for (var i = 1; i <= ides; i++) {
    var quantity=$('#temp_quantity'+i).val();
       var quantity1=$('#temp1_quantity'+i).val();
       console.log(quantity);
      if(parseInt(quantity1)>=parseInt(quantity)){     
        document.getElementById("txtOccupations"+i).innerHTML = "";
      }else{
        count++;
       console.log(i);
        document.getElementById("txtOccupations"+i).innerHTML = "Please Insert a value less  Than or equal ("+quantity1+")";
        $('#temp_quantity'+i).val(quantity1);
         erroe++;
      }
    }

    for (var i = 1; i <= (ides); i++) {
        var qnt_issues=$('#temp_quantity'+i).val();
        if(qnt_issues!=""){
          
        }else{
          count1++
        }

      }
       if((count1==0) &&(count==0))
      {
        $("#issue_forms").submit(); 
      }else{
      alert("Form Can't Submited Due To Some Field Left Blank");
      return false;
    }
}
</script>