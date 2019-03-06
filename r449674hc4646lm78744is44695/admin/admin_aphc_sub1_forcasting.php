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
        APHC Sub-center Forecasting
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">APHC Sub-center Forecasting</li>
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
              <h3 class="box-title">APHC Sub-center Forecast </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" class="form-horizontal" action="admin_forcasting_save.php" method="POST">
            <input type="hidden" name="place_status" value="8">
              <div class="box-body">
                

                <div class="form-group">
                  <label class="control-label col-sm-2" for="sub2">APHC sub- center  :</label>
                  <div class="col-sm-6">
                  <select class="form-control text-center" onchange="check_quantity()" name="sub2" id="sub2" required="">
                            
                   <?php 
                      $query_aphc="SELECT * FROM `rhc_master_place_aphc_sub_center` ";
                      $sql_exe_aphc=mysqli_query($conn,$query_aphc);
                      $num_aphc=mysqli_num_rows($sql_exe_aphc);
                      if($num_aphc!=0){
                        ?>
                        <option value="">-- Select APHC -- </option> 
                        <?php
                        while ($res_aphc=mysqli_fetch_assoc($sql_exe_aphc)) {?>
                          <option value="<?=$res_aphc['place_aphc_sub_id']?>"> <?=$res_aphc['aphc_sub_center_name']?> [<?=$res_aphc['place_aphc_sub_id']?>]</option> 
                        <?php }
                      }else{
                        ?>
                          <option value="">-- No APHC Is Present In This Block-- </option>  
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
    var sub2=$('#sub2').val();
    var item_code=$('#item_code').val();
    var item_type=$('#item_type').val();
    var Quantity=$('#Quantity').val();
    var status_place="8";
    if(Quantity!=""){
      $.ajax({
        type:'POST',
        url:'admin_forcasting_check.php',
        data:{place_id:sub2,item_code:item_code,item_type:item_type,Quantity:Quantity,status_places:status_place},
        success:function(html){  
         
          if(html==1){
              document.getElementById("myerror").innerHTML = "";
              $("#save").show();
              // $("#reli").submit(); 
          }else{
              if(html==2){
                document.getElementById("myerror").innerHTML = "Item Code And Type Already Existed For This APHC";
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