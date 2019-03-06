<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Stock Entry Form
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Stock Entry</a></li>
        <li class="active"><a href="#"> Stock Entry Form</a></li>
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
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Stock Entry Form</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" id="stock_add" action="admin_stock_entry_new1_save.php"  method="POST">
              <div class="row">
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
              </div>
              <br>
              <div class="row">
                <div class="col-sm-6">       
                <div class="form-group">
                  <label for="email">Location :</label>
                  <input type="hidden" name="place_id" id="place_id" value="<?=$_SESSION['place_id']?>">
                  BIHAR[BR]
                  <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
                </div>
                </div> 
                <div class="col-sm-6">
                <div class="form-group ">
                  <label for="pwd">Challan No</label>
                  <input type="text" autocomplete="off" class="form-control" name="bill" id="bill" required>
                  
                </div>
                </div>
              </div>
              <br>
               
              <?php 
                // item code 
                $query_item_code="SELECT * FROM `rhc_master_item_code_list` WHERE `status`='1'";
                $sql_exe_item_code=mysqli_query($conn,$query_item_code);
                //item type             
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `status`='1'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
              ?>
              <div class="row">
                <div class="col-sm-6">       
                <div class="form-group">
                  <label for="email">Item Code :</label>
                  <select class="form-control" name="item_code" id='item_code' >
                  <option value="">--select Item code--</option>
                  <?php while ($res_item_code=mysqli_fetch_assoc($sql_exe_item_code)) {?>
                    <option value="<?=$res_item_code['item_code']?>"><?=$res_item_code['item_name']?>[<?=$res_item_code['item_code']?>]</option>

                  <?php }?>
                </select>
                </div>
                </div>
                <div class="col-sm-6">       
                <div class="form-group">
                  <label for="email">Item Type :</label>
                   <select class="form-control" id='item_type' name="item_type" required="">
                      <option value="">....</option>
                      <?php while ($res_item_type=mysqli_fetch_assoc($sql_exe_item_type)) {?>
                      <option value="<?=$res_item_type['item_type']?>"><?=$res_item_type['item_type_name']?>[<?=$res_item_type['item_type']?>]</option>
                      <?php }?>
                    </select>
                </div>
                </div>
              </div>
              <br>
               <div class="row">
              <div class="col-sm-6">       
                <div class="form-group">
                  <label for="email">Total Quantity :</label>
                   <input type="text" autocomplete="off"  class="form-control" id='total_qnt' name="total_qnt" required="">
                      
                </div>
                </div>
              </div>
              <br>
              <table class="table ">
                <tr>                 
                  <th>Batch No</th>
                  <th>Batch Quantity</th>
                  <th>Expire</th>
                </tr>
              <tr>             
                <td>
                 <input type="text" autocomplete="off" class="form-control"  name="batch_no[]" id="batch_no" >
                </td>
                <td>
                  <input type="text" autocomplete="off" class="form-control" name="quanity[]" >
                </td>
                <td>
                  <input type="text" autocomplete="off" class="form-control" name="expire[]" id="expire" >
                </td>
              </tr>
              <tr>             
                <td>
                 <input type="text" autocomplete="off" class="form-control"  name="batch_no[]" id="batch_no" >
                </td>
                <td>
                  <input type="text" autocomplete="off" class="form-control" name="quanity[]"  >
                </td>
                <td>
                  <input type="text" autocomplete="off" class="form-control" name="expire[]" id="expire1" >
                </td>
              </tr>
              <tr>             
                <td>
                 <input type="text" autocomplete="off" class="form-control"  name="batch_no[]" id="batch_no" >
                </td>
                <td>
                  <input type="text" autocomplete="off" class="form-control" name="quanity[]"  >
                </td>
                <td>
                  <input type="text" autocomplete="off" class="form-control" name="expire[]" id="expire2" >
                </td>
              </tr>
              <tr>             
                <td>
                 <input type="text" autocomplete="off" class="form-control" name="batch_no[]" id="batch_no" >
                </td>
                <td>
                  <input type="text" autocomplete="off" class="form-control" name="quanity[]"  >
                </td>
                <td>
                  <input type="text" autocomplete="off" class="form-control" name="expire[]" id="expire3" >
                </td>
              </tr>
              </table>
    
             
             

              
            <div class="row text-center">
              <span  id="error" style="color: red;"></span>
            </div>
            <div class="row">
            <div class="col-sm-12">

             <span class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </spam>
            <span class="text-center" id="errornews" style="color: red;"></span>
          <span class="pull-right" id="save">
           <!-- <a href="admin_raise_indent.php"  class="btn btn-default">Reset</a>   -->
           <button type="submit" class="btn btn-default">Submit</button>
           </span>
           </div>
        </div>
          </form>
          <br>
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
<?php 
  // item code 
  $query_item_code="SELECT * FROM `rhc_master_item_code_list` WHERE `status`='1'";
  $sql_exe_item_code=mysqli_query($conn,$query_item_code);
  //item type             
  $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `status`='1'";
  $sql_exe_item_type=mysqli_query($conn,$query_item_type);
?>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<script type="text/javascript">
  function check_batch() {
    var bill=$('#bill').val();
    var item_code=$('#item_code').val();
    var item_type=$('#item_type').val();
    var batch_no=$('#batch_no').val();
    if(batch_no!=""){
      $.ajax({
                  type:'POST',
                  url:'check_stock_entry.php',
                  data:'item_code='+item_code+'&item_type='+item_type+'&bill='+bill+'&batch_no='+batch_no,
                  success:function(html){
                    
                    if(html==1){
                      document.getElementById("errornews").innerHTML = "";                     
                      $("#save").show();
                    }else{
                      if(html==2){
                      document.getElementById("errornews").innerHTML = "Please Change Batch No ,"+batch_no;
                      $("#save").hide();
                      return false;
                    }else{
                       document.getElementById("errornews").innerHTML = "Please Check If It Is Blank";
                        $("#save").hide();
                      return false;
                    }
                  }
                }
              });

    }else{
      $("#save").hide();
      return false;
    }
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    // $("#save").hide();
  });
</script>
<script type="text/javascript">
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
       <!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> -->
      <script type="text/javascript">
       
        $("#stock_add").validate({
            // onfocusout: function(element) {
            //        this.element(element);
            //     },
                rules: {
                  item_code:"required",
                  item_type:"required",
                  expire:"required",
                  quanity:{
                    required:true,
                    number:true
                  },
                  bill:{
                    required:true,
                    
                  },
                  batch_no:{
                    required:true,
                   
                  },
                },
                messages: {
                  item_code:"Please Select Item Name", 
                  item_type:"Please Select Item Code ",
                  expire:"Please Enter Expired Date",                
                  quanity:{
                    required:"Please Enter Quanity  ",
                    number:"Please Enter Numbers"               
                  },
                   bill:{
                    required:"Please Enter Bill  ",
                    // number:"Please Enter Numbers"               
                  },
                  batch_no:{
                    required:"Please Enter Batch No Number  ",
                    // number:"Please Enter Numbers"               
                  },
             
                },
          //         submitHandler: function(form) {
          //   form.submit();
          // }
               
            })
        jQuery.validator.setDefaults({
          debug: true,
          // success: "valid"
        });
       </script>
         <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  
  <script>
  $( function() {
    $( "#expire" ).datepicker();
    $( "#expire1" ).datepicker();
    $( "#expire2" ).datepicker();
    $( "#expire3" ).datepicker();
  } );
  </script>