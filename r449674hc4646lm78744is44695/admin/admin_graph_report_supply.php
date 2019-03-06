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
       Supply Analysis Report
       <!--  <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Graphical Report</a></li>
        <li class="active">Supply Analysis Report </li>
      </ol>
    </section>
 <?php 
                $query_item_code="SELECT * FROM `rhc_master_item_code_list` WHERE `status`='1'";
                $sql_exe_item_code=mysqli_query($conn,$query_item_code);
                
             
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `status`='1'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
               ?>
    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border"  style="background-color: orange">
            <h3 class="box-title">Filter</h3>
           </div>
            <div class="box-body">
            <form class="form-inline">
                           <div class="row">
                  <div class="col-md-6">
                     <div class="row">
                      <div class="col-md-3 text-right">
                        <label>State</label>
                      </div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-8">
                        <select class="form-control text-center" name="state_id" id="state_id" required="">
                
                          <?php 
                            $query_state="SELECT * FROM `rhc_master_place_state` WHERE `status`='1'";
                            $sql_exe_state=mysqli_query($conn,$query_state);
                            while ($res_state=mysqli_fetch_assoc($sql_exe_state)) {?>
                            <option value="<?=$res_state['place_state_id']?>"><?=$res_state['state_name']?></option>
                             
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <br>
                    
                     <!-- block -->
                    <span id="block_dh_uphc1"></span>
                    <div class="row" id="remove_display">
                      <div class="col-md-3 text-right">
                        <label>BLOCK</label>
                      </div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-8">
                       <select class="form-control text-center" onchange="get_block_dh()" name="block_dh_uphc" id="block_dh_uphc" >
                         <option value="">--Select --</option>
                         
                        </select> 
                      </div>
                    </div>
                    <!-- end of block district -->
                    <br>
                    <!--hsc  -->
                    <span id="hsc"></span>
                    <div class="row" id="remove_display2">
                      <div class="col-md-3 text-right">
                        <label>HSC</label>
                      </div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-8">
                         <select class="form-control text-center"  name="hsc_id" id="hsc_id" >
                         <option value="">--Select--</option>                 
                        </select> 
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-3 text-right">
                        <label>Item Code</label>
                      </div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-8">
                        <select name="item_code" id='item_code' class="form-control text-center">
                        <?php while ($res_item_code=mysqli_fetch_assoc($sql_exe_item_code)) {?>
                          <option value="<?=$res_item_code['item_code']?>"><?=$res_item_code['item_name']?>[<?=$res_item_code['item_code']?>]</option>
                        <?php }?>
                      </select>  
                      </div>
                    </div>

                  </div>
                   <div class="col-md-6">
                  
                    <!-- district  -->
                    <div class="row">
                      <div class="col-md-3 text-right">
                        <label>District</label>
                      </div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-8">
                          <select class="form-control text-center" onchange="get_indent()"  name="district_id" id="district_id" required="" >
                                              
                            <?php 
                            $query_district="SELECT * FROM `rhc_master_place_district` WHERE `place_state_id`='BR' And `status`='1'";
                            $sql_exe_district=mysqli_query($conn,$query_district);
                            $num=mysqli_num_rows($sql_exe_district);
                            if($num!=0){
                              ?>
                              <option value="">-- Select District -- </option> 
                              <?php
                              while ($res_dist=mysqli_fetch_assoc($sql_exe_district)) {?>
                                <option value="<?=$res_dist['place_district_id']?>"> <?=$res_dist['district_name']?> [<?=$res_dist['place_district_id']?>]</option> 
                              <?php }
                            }else{
                              ?>
                                <option value="">-- No Is Present District -- </option>  
                            <?php
                            }?>
                          </select> 
                      </div>
                    </div>

                    <!--district end  --><br>
                   <!--phc/aphc  -->
                     <span id="phc_aphc1"></span>
                    <div class="row" id="remove_display1">
                      <div class="col-md-3 text-right">
                        <label>Phc/Aphc</label>
                      </div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-8">
                         <select class="form-control text-center"  name="phc_aphc" id="phc_aphc" >
                         <option value="">--Select--</option>                 
                        </select> 
                      </div>
                    </div>
                    <br>
                    <br>
                     <br>
                      <br>
                    <div class="row">
                      <div class="col-md-3 text-right">
                        <label>Item Type</label>
                      </div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-8">
                         <select  id='item_type' name="item_type" class="form-control text-center" required="">
                      <?php while ($res_item_type=mysqli_fetch_assoc($sql_exe_item_type)) {?>
                        <option value="<?=$res_item_type['item_type']?>"><?=$res_item_type['item_type_name']?>[<?=$res_item_type['item_type']?>]</option>
                      <?php }?>
                    </select>    
                      </div>
                    </div>
                  </div>

                </div>
                <div class="text-center">
                 <button type="button" onclick="get_indent_detail()" class="btn btn-default">Search</button>
                </div>
              
              
            </form> 
           </div>
        </div>
      </div>
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
            <span id="get_raised_Indent"></span>
             <span id="get_indent_result"></span>
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
  function get_indent() {
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
     if(district_ids){
       $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
       $.ajax({
          type:'POST',
          url:'admin_get_block_dh_uphc_status1.php',
          data:'state_id='+state_id+'&district_id='+district_ids,
          success:function(html){
              // // $remove_display
              // $("#remove_display").remove(); 
              // $('#block_dh_uphc1').html(html);
            if(html==1){
              $("#remove_display").remove(); 
              get_indent1();
              // $('#block_dh_uphc1').html(html);
             
              }else{
                 $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>');
                 $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
              }
            }
      }); 
     }else{
       $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
       $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
     }
  }
   function get_indent1() {
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
     if(district_ids){
       $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
       $.ajax({
          type:'POST',
          url:'admin_get_block_dh_uphc1.php',
          data:'state_id='+state_id+'&district_id='+district_ids,
          success:function(html){
              // $remove_display
              $("#remove_display").remove(); 
              $('#block_dh_uphc1').html(html);
             
          }
      }); 
    }else{
       $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
       $('#hsc_id').html('<option value="">-- Please Select PHC -- </option>');
     }
  }


  function get_indent_detail() {
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    var block_dh_uphc = $('#block_dh_uphc').val();
    var phc_aphc = $('#phc_aphc').val();
    var item_code=$('#item_code').val();
    var item_type=$('#item_type').val();
    var hsc_ids=$('#hsc_id').val();
    if(hsc_ids!=""){
      var place_id = "5";
         $.ajax({
              type:'POST',
              url:'admin_get_graph_supply_details.php',
              success:function(html){
              data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_aphc='+phc_aphc+'&place_id='+place_id+'&item_code='+item_code+'&item_type='+item_type+'&hsc_ids='+hsc_ids,
              success:function(html){
                 $('#get_indent_result').html(html);
                 // $('#get_raised_Indent').html('')
              }
            });
    }else{
      hsc_ids="0";
      if(phc_aphc!=""){
        var place_id = "3";
         $.ajax({
              type:'POST',
              url:'admin_get_graph_supply_details.php',
              data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_aphc='+phc_aphc+'&place_id='+place_id+'&item_code='+item_code+'&item_type='+item_type+'&hsc_ids='+hsc_ids,
              success:function(html){
                 $('#get_indent_result').html(html);
                 // $('#get_raised_Indent').html('')
              }
            });
      }else{
        if(block_dh_uphc!=""){
          var place_id = "2";
          phc_aphc="0";
           $.ajax({
              type:'POST',
              url:'admin_get_graph_supply_details.php',
              data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_aphc='+phc_aphc+'&place_id='+place_id+'&item_code='+item_code+'&item_type='+item_type+'&hsc_ids='+hsc_ids,
              success:function(html){
                 $('#get_indent_result').html(html);
                 // $('#get_raised_Indent').html('')
              }
            });
        }else{
          if(district_ids!=""){
            var place_id = "1";
            phc_aphc="0";
            block_dh_uphc="0";
            $.ajax({
              type:'POST',
              url:'admin_get_graph_supply_details.php',
              data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_aphc='+phc_aphc+'&place_id='+place_id+'&item_code='+item_code+'&item_type='+item_type+'&hsc_ids='+hsc_ids,
              success:function(html){
                 $('#get_indent_result').html(html);
                 // $('#get_raised_Indent').html('')
              }
            });   
          }else{
            var place_id = "4";
            phc_aphc="0";
            block_dh_uphc="0";
            district_ids="0";
            $.ajax({
              type:'POST',
              url:'admin_get_graph_supply_details.php',
              data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_aphc='+phc_aphc+'&place_id='+place_id+'&item_code='+item_code+'&item_type='+item_type+'&hsc_ids='+hsc_ids,
              success:function(html){
                 $('#get_indent_result').html(html);
                 // $('#get_raised_Indent').html('')
              }
            }); 
          }
        }
      }
    }

    // alert(district_ids);
    // alert(block_dh_uphc);
    // alert(phc_aphc);
  }
</script>