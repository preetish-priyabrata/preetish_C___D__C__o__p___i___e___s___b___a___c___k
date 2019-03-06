<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Not Issued item Report
       <!--  <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report</a></li>
        <li class="active"> Not Issued item Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
        <?php $msg->display(); ?>
      </div>
      <!-- filter -->
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
                      <label>From Date</label>
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">
                      <input class="form-control text-center" type="text" id="from" name="from" placeholder="Start" >
                    </div>
                  </div>
                  <br>
                  <!-- year end -->
                  <!-- quarterly  -->
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <label>To Date</label>
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">
                     <!--   <label for="from">From</label> -->
                       <input class="form-control text-center" type="text" id="to" name="to" placeholder="End" >
                    </div>
                  </div>

                  <!--quarterly end  -->
                  <br>

                    <!--quarterly end  -->
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
                    

                  </div>
                   <div class="col-md-6">
                   <!-- state -->
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
                    <!--state end  -->
                    <br>
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
      <!-- /filter -->
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
              }
            }
      }); 
     }else{
       $('#block_dh_uphc').html('<option value="">-- Please Select District -- </option>'); 
       $('#phc_aphc').html('<option value="">-- Please Select Block -- </option>');
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
     }
  }

  function get_indent_detail(argument) {
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    var block_dh_uphc = $('#block_dh_uphc').val();
    var phc_aphc = $('#phc_aphc').val();
  
    var startDate = document.getElementById("from").value;
    var endDate = document.getElementById("to").value;
 
     if(startDate!="" && endDate){
      if ((Date.parse(startDate) >= Date.parse(endDate))) {
        alert("End date should be greater than Start date");
        document.getElementById("to").value = "";
    }else{
      if(phc_aphc!=""){
        var place_id = "3";
         $.ajax({
              type:'POST',
              url:'admin_get_graph_issued_details_not_issued.php',
              data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_aphc='+phc_aphc+'&place_id='+place_id+'&startDate='+startDate+'&endDate='+endDate,
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
              url:'admin_get_graph_issued_details_not_issued.php',
              data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_aphc='+phc_aphc+'&place_id='+place_id+'&startDate='+startDate+'&endDate='+endDate,
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
              url:'admin_get_graph_issued_details_not_issued.php',
              data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_aphc='+phc_aphc+'&place_id='+place_id+'&startDate='+startDate+'&endDate='+endDate,
              success:function(html){
                 $('#get_indent_result').html(html);
                 // $('#get_raised_Indent').html('')
              }
            });   
          }else{
            $('#get_indent_result').html();
            alert('No layer has been selected');
          //   var place_id = "4";
          //   phc_aphc="0";
          //   block_dh_uphc="0";
          //   district_ids="0";
          //   $.ajax({
          //     type:'POST',
          //     url:'admin_get_issued_details_indent_issued.php',
          //     data:'state_id='+state_id+'&district_id='+district_ids+'&block_dh_uphc='+block_dh_uphc+'&phc_aphc='+phc_aphc+'&place_id='+place_id+'&years='+years+'&quarterly='+quarterly,
          //     success:function(html){
          //        $('#get_indent_result').html(html);
          //        // $('#get_raised_Indent').html('')
          //     }
          //   }); 
          }
        }
      }
    }
  }else{
    $('#get_indent_result').html();
    alert('Please select Month');
  }

    // alert(district_ids);
    // alert(block_dh_uphc);
    // alert(phc_aphc);
  }
</script>