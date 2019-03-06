<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
	<div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Block Forecasting
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Block Forecasting</li>
        <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			<?php $msg->display(); ?>
		</div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-1"></div>
        <div class="col-sm-10">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border"  style="background-color: orange">
              <h3 class="box-title">Block Forecast </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" class="form-horizontal" action="admin_forcasting_save.php" method="POST">
            <input type="hidden" name="place_status" value="3">
              <div class="box-body">
                

                <div class="form-group">
                  <label class="control-label col-sm-2" for="block_id">Block :</label>
                  <div class="col-sm-6">
                  <select class="form-control text-center" onchange="check_quantity()" name="block_id" id="block_id" required="">
                            
                      <?php 
                       $query_block="SELECT * FROM `rhc_master_place_block` ORDER BY `rhc_master_place_block`.`block_name` ASC ";
                      $sql_exe_block=mysqli_query($conn,$query_block);
                      $num_block=mysqli_num_rows($sql_exe_block);
                      if($num_block!=0){
                        ?>
                        <option value="">-- Select Block -- </option> 
                        <?php
                        while ($res_block=mysqli_fetch_assoc($sql_exe_block)) {?>
                          <option value="<?=$res_block['place_block_id']?>"> <?=$res_block['block_name']?> [<?=$res_block['place_block_id']?>]</option> 
                        <?php }
                      }else{
                        ?>
                          <option value="">-- No Block Is Present In This District -- </option>  
                      <?php
                      }?>
                  </select>
                   
                    
                  </div>
                </div>
                <?php 
                $query_item_code="SELECT * FROM `rhc_master_item_code_list` WHERE `status`='1'";
                $sql_exe_item_code=mysqli_query($conn,$query_item_code);
                
             
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `status`='1'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
               ?>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="item_code">Item Code :</label>
                  <div class="col-sm-6">
                    <select name="item_code" onchange="check_quantity()" id='item_code' class="form-control text-center">
                      <option value="">--select Item code--</option>
                      <?php while ($res_item_code=mysqli_fetch_assoc($sql_exe_item_code)) {?>
                        <option value="<?=$res_item_code['item_code']?>"><?=$res_item_code['item_name']?>[<?=$res_item_code['item_code']?>]</option>
                      <?php }?>
                    </select>
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="item_type">Item Type :</label>
                  <div class="col-sm-6">
                   <select  id='item_type' onchange="check_quantity()" name="item_type" class="form-control text-center" required="">
                      <option value="">--select Item Type--</option>
                     <?php while ($res_item_type=mysqli_fetch_assoc($sql_exe_item_type)) {?>
                      <option value="<?=$res_item_type['item_type']?>"><?=$res_item_type['item_type_name']?>[<?=$res_item_type['item_type']?>]</option>
                     <?php }?>
                   </select>
                    
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Quantity">Quantity :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" onkeyup="check_quantity()" autocomplete="off"  id="Quantity" name="Quantity" placeholder="Enter Quantity " required="">
                  </div>
                </div>
                <span id="myerror" class="text-center" style="color: red"></span>
                <div class="form-group text-center" >
                  <input type="submit"  value="Submit" id="save" name="add_palce" value="add_location" class="btn btn-primary" ></input>
                </div>    
              </div>
            </form>
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
  function check_quantity() {
    // var state_id=$('#state_id').val();
    var block_id=$('#block_id').val();
    var item_code=$('#item_code').val();
    var item_type=$('#item_type').val();
    var Quantity=$('#Quantity').val();
    var status_place="3";
    if(Quantity!=""){
      $.ajax({
        type:'POST',
        url:'admin_forcasting_check.php',
        data:{place_id:block_id,item_code:item_code,item_type:item_type,Quantity:Quantity,status_places:status_place},
        success:function(html){  
         
          if(html==1){
              document.getElementById("myerror").innerHTML = "";
              $("#save").show();
              // $("#reli").submit(); 
          }else{
              if(html==2){
                document.getElementById("myerror").innerHTML = "Item Code And Type Already Existed For This Block";
               $("#save").hide();
             }
             if(html==0){
                 document.getElementById("myerror").innerHTML = "Please Contact Support Team";
                $("#save").hide();
             }  
          }
        }
      });
    }
  }
</script>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#save").hide();
  });
</script>
<script type="text/javascript">
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 