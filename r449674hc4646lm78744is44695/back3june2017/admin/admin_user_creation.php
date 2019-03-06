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
        User Creation 
       <!--  <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User Creation</a></li>
        <li class="active">Add New User</li>
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
              <h3 class="box-title">Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" class="form-horizontal" action="admin_user_creation_save.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Desigination_user">Level:</label>
                  <div class="col-sm-6">
                  <select class="form-control text-center" onchange="get_selection_designa()" name="Desigination_user" id="Desigination_user" required="">
                    <option value="">-- Select Desigination -- </option>
                    <?php 
                          $query_desigination="SELECT * FROM `rhc_master_designation` WHERE `status`='1'";
                          $sql_exe_designation=mysqli_query($conn,$query_desigination);
                          while ($res_designation=mysqli_fetch_assoc($sql_exe_designation)) {?>
                          <option value="<?=$res_designation['slno']?>"><?=$res_designation['designation_name']?></option>
                           
                         <?php }?>

                  </select>
                    
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Desigination_name">Desigination :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  autocomplete="off"  id="Desigination_name" name="Desigination_name" placeholder="Enter Desigination" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Village">Village :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  autocomplete="off"  id="Village" name="Village" placeholder="Enter Village" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Sim">Sim No :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  autocomplete="off"  id="Sim" name="Sim" placeholder="Enter Sim No" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="user_name">Name:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  autocomplete="off"  id="user_name" name="user_name" placeholder="Enter Name" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="user_email">Email:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  autocomplete="off"  onkeyup="user_auto()" id="user_email" name="user_email" placeholder="Enter Email Id" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="user_mobile">Mobile No:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  autocomplete="off"  id="user_mobile" name="user_mobile" placeholder="Enter Mobile No" required="">
                  </div>
                </div>
                <div class="hidden">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="user_alt_mobile">Alternate Mobile No:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control"  autocomplete="off"  id="user_alt_mobile" name="user_alt_mobile" placeholder="Enter Mobile">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="user_id">User Id:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter User Id" readonly="" >
                  </div>
                </div>
                <span id="user_pass_hiden">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="user_Password">Password:</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control"  autocomplete="off"  id="user_Password" name="user_Password" placeholder="Enter Password"  required="">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label class="control-label col-sm-2" for="user_conf_Password">Confirm Password:</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="user_conf_Password" name="user_conf_Password" placeholder="Enter Confirm Password"  required="">
                  </div>
                </div> -->
                </span>
              </div>
              <!-- /.box-body -->
              <div class="box-header with-border" style="background-color: gold;">
              <h3 class="box-title">Place Information</h3>
            </div>
            <div class="box-body">
            <div class="form-group">
                  <label class="control-label col-sm-2" for="state_id">State:</label>
                  <div class="col-sm-6">
                  <!-- <select class="form-control text-center" onchange="get_district()" name="state_id" id="state_id" required=""> -->
                  <select class="form-control text-center" name="state_id" id="state_id" required="">
                   <!--  <option value=""></option> -->
                    <?php 
                          $query_state="SELECT * FROM `rhc_master_place_state` WHERE `status`='1'";
                          $sql_exe_state=mysqli_query($conn,$query_state);
                          while ($res_state=mysqli_fetch_assoc($sql_exe_state)) {?>
                          <option value="<?=$res_state['place_state_id']?>"><?=$res_state['state_name']?></option>
                           
                         <?php }?>

                  </select>
                    
                  </div>
                </div>

                <div class="form-group" id="dist_hidden">
                  <label class="control-label col-sm-2" for="district_id">District:</label>
                    <div class="col-sm-6">
                      <select class="form-control text-center" onchange="get_block_dh()" name="district_id" id="district_id" required="" >
                                            
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
                    <div class="form-group" id="dist_hidden_cho">
                      <label class="control-label col-sm-2" for="district_id">Health Facilities  :</label>
                        <div class="col-sm-6">
                          <label class="radio-inline" id="dist_hospital"><input type="radio" name="optradio"   onclick="handleClick(this);" value="1" >District Hospital</label>
                        <label class="radio-inline" id="dist_block"><input type="radio" name="optradio" onclick="handleClick(this);" value="2">Block</label>
                        </div>
                    </div>
                    <span id="block_hostpitals_details"></span>
               
                <!-- <span id="district_details"></span> -->
                 
            </div>
             <!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="admin_dashboard.php" class="btn btn-default">Back</a>
                <input type="submit" class="btn btn-primary " value="Submit">
              </div>
            </form>
          </div>
          <!-- /.box -->
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
  // function get_district(){
  //   var state_id = $('#state_id').val();
  //       if(state_id){
  //           $.ajax({
  //               type:'POST',
  //               url:'admin_get_district.php',
  //               data:'state_id='+state_id,
  //               success:function(html){
  //                   $('#district_details').html(html);
                   
  //               }
  //           }); 
  //       }else{
  //          $('#district_details').html('<div class="form-group"><label class="control-label col-sm-2" for="district_id">District:</label><div class="col-sm-6"><select class="form-control text-center" name="district_id" id="district_id" required=""><option value="">-- Please Select State -- </option></select></div>'); 
  //       }
  // }
  $( document ).ready(function() {
    // console.log( "ready!" );
     $("#dist_hidden").hide();
     $("#dist_hidden_cho").hide();
      $("#dist_hospital").hide();
       $("#dist_block").hide();
         $("#hidde_block").hide();
            // document.getElementById("block_hostpitals_id").removeAttribute("required");
});
  function get_selection_designa() {
    var Desigination_users = $('#Desigination_user').val();
    if(Desigination_users=='2'){ // district
        $("#dist_hidden").show();
         $("#user_pass_hiden").show();
    }else if(Desigination_users=='4'){ // district hosptipal level
       $("#dist_hidden").show();
        $("#dist_hidden_cho").show();
         $("#dist_hospital").show();
          $("#user_pass_hiden").show();
        $('input:radio[name="optradio"][value="1"]').attr('checked', true);
          $("#dist_hidden_cho2").hide();
        get_block_dh();
    }else if(Desigination_users=='3'){ // block level
       $("#dist_hidden").show();
        $("#dist_hidden_cho").show();
        $("#dist_block").show();
         $("#user_pass_hiden").show();
        $('input:radio[name="optradio"][value="2"]').attr('checked', true);
         $("#dist_hospital").hide();
         get_block_dh();
    }else if(Desigination_users=='11'){ // uphc
       $("#dist_hidden").show();
        // $("#dist_hidden_cho").show();
        // $("#dist_block").show();
         $("#user_pass_hiden").show();
        // $('input:radio[name="optradio"][value="2"]').attr('checked', true);
         $("#dist_hospital").hide();
         get_block_dh();
    }else if(Desigination_users=='7' || Desigination_users=='8' || Desigination_users=='9'  || Desigination_users=='10' ){
      // user_pass_hiden
      $("#dist_hidden").show();
       
          $("#dist_hidden_cho").show();
        $("#dist_block").show();
         $("#user_pass_hiden").show();
        $('input:radio[name="optradio"][value="2"]').attr('checked', true);
         $("#dist_hospital").hide();
         get_block_dh();
      $("#user_pass_hiden").hide();
        // document.getElementById("user_conf_Password").removeAttribute("required");
         document.getElementById("user_Password").removeAttribute("required");
    }else if(Desigination_users=='5' || Desigination_users=='6'){
      $("#dist_hidden").show();
        $("#dist_hidden_cho").show();
        $("#dist_block").show();
         $("#user_pass_hiden").show();
        $('input:radio[name="optradio"][value="2"]').attr('checked', true);
         $("#dist_hospital").hide();
         get_block_dh();

    }else{
       $("#dist_hidden").hide();
     $("#dist_hidden_cho").hide();
      $("#dist_hospital").hide();
       $("#dist_block").hide();
        $("#user_pass_hiden").show();
        $("#block_hostpitals_details").hide();
       document.getElementById('district_id').value = '';
       document.getElementById("district_id").removeAttribute("required");
        // document.getElementById("block_hostpitals_id").removeAttribute("required");
       // id="block_hostpitals_id"
       // $("#district_id").val("");
       get_block_dh();
    }

  }
</script>
<script type="text/javascript">
  // var currentValue = 0;
function handleClick(myRadio) {
    // alert('Old value: ' + currentValue);
    // alert('New value: ' + myRadio.value);
    

    var currentValue = myRadio.value;
 // alert('Old value: ' + currentValue);
    var state_id = $('#state_id').val();
    var district_ids = $('#district_id').val();
    // alert(district_ids);
    if(state_id){
        if(district_ids){

            $.ajax({
                type:'POST',
                url:'admin_get_district_block_hospital.php',
                data:'state_id='+state_id+'&district_id='+district_ids+'&search_table='+currentValue,
                success:function(html){
                    $('#block_hostpitals_details').html(html);
                   
                }
            }); 
        }else{
          if(currentValue==1){
           $('#block_hostpitals_details').html('<div class="form-group"><label class="control-label col-sm-2" for="block_hostpitals_id">District Hospital:</label><div class="col-sm-6"><select class="form-control text-center" name="block_hostpitals_id" id="block_hostpitals_id" required=""><option value="">-- Please Select District -- </option></select></div>'); 
          }else{
            $('#block_hostpitals_details').html('<div class="form-group"><label class="control-label col-sm-2" for="block_hostpitals_id">Block:</label><div class="col-sm-6"><select class="form-control text-center" name="block_hostpitals_id" id="block_hostpitals_id" required=""><option value="">-- Please Select District -- </option></select></div>'); 
          }
        }
    }else{
      $('#district_details').html('<div class="form-group"><label class="control-label col-sm-2" for="district_id">District:</label><div class="col-sm-6"><select class="form-control text-center" name="district_id" id="district_id" required=""><option value="">-- Please Select State -- </option></select></div>'); 
    }
 

}

</script>
<script type="text/javascript">

  function get_block_dh() {
    var Desigination_users = $('#Desigination_user').val();
   
    if(Desigination_users!='11'){
      var lastSelected = $('[name="optradio"]:checked').val();
      var state_id = $('#state_id').val();
        var district_ids = $('#district_id').val();
        if(district_ids){
        if(lastSelected){
           $.ajax({
                    type:'POST',
                    url:'admin_get_district_block_hospital.php',
                    data:'state_id='+state_id+'&district_id='+district_ids+'&search_table='+lastSelected,
                    success:function(html){
                        $('#block_hostpitals_details').html(html);
                       
                    }
                }); 
        }
      }else{
        if(lastSelected==1){
          
             $('#block_hostpitals_details').html('<div class="form-group"><label class="control-label col-sm-2" for="block_hostpitals_id">District Hospital:</label><div class="col-sm-6"><select class="form-control text-center" name="block_hostpitals_id" id="block_hostpitals_id" required=""><option value="">-- Please Select District -- </option></select></div>'); 
            }else if(lastSelected==2){
                // document.getElementById("block_hostpitals_id").removeAttribute("required");
              $('#block_hostpitals_details').html('<div class="form-group"><label class="control-label col-sm-2" for="block_hostpitals_id">Block:</label><div class="col-sm-6"><select class="form-control text-center" name="block_hostpitals_id" id="block_hostpitals_id" required=""><option value="">-- Please Select District -- </option></select></div>'); 
            }else{
              $('#block_hostpitals_details').html('');
            }
      }
    }else{
      // alert('hi');
      var state_id = $('#state_id').val();
        var district_ids = $('#district_id').val();
        if(district_ids){
        
           $.ajax({
                    type:'POST',
                    url:'admin_get_uphc.php',
                    data:'state_id='+state_id+'&district_id='+district_ids,
                    success:function(html){
                        $('#block_hostpitals_details').html(html);
                       
                    }
                }); 
       
      }else{
        $('#block_hostpitals_details').html('<div class="form-group"><label class="control-label col-sm-2" for="uphc">UPHC :</label><div class="col-sm-6"><select class="form-control text-center" name="uphc" id="uphc" required=""><option value="">-- Please Select District -- </option></select></div>'); 
      }

    }
  }

  $('#user_email').keyup(function() {
    $('#user_id').val($('#user_email').val());      
    });
//   function user_auto() {

//     var email=$('#user_email').val();
//     alert();
//   if(email == true) {
//      document.getElementById('user_id').value  =email;
//     // f.billingcity.value = f.shippingcity.value;
//   }
// }
</script>