<?php
session_start();
ob_start();
if($_SESSION['email_id']){
  include 'webconfig/config.php';
  require 'FlashMessages.php';
  $msg = new \Preetish\FlashMessages\FlashMessages();
  $title="Welcome To Dashboard Of Admin";
?>
<style type="text/css">
  input[type="file"] {
    /*display: block;*/
    padding: 0px 0px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php $msg->display(); ?>
      </div>
      <form action="detail_save.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <div class="box">
          <div class="box-header with-border">
            <!-- <h3 class="box-title">Crop Type</h3> -->
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Crop</label>
              <div class="col-sm-8">
               <select class="form-control" name="crop_type" id="crop_type" onchange="get_crop()" required="">
                <option value="">--Select Crop Type--</option>
                  <?php 
                    $GET_TYPE="SELECT * FROM `ilab_water_sub_menu` WHERE `status`='1'";
                    $SQL_GET=mysqli_query($conn,$GET_TYPE);
                    while ($get_fetch_type=mysqli_fetch_assoc($SQL_GET)) {?>
                      <option value="<?=$get_fetch_type['sub_menu_id']?>"><?=strtoupper($get_fetch_type['sub_menu_name'])?></option>
                  <?php  }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Crop Name</label>
              <div class="col-sm-8">
                <select class="form-control" name="crop_name" id="crop_name" onchange="get_season()" required="">
                  <option value="">--Select Crop Name--</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Season</label>
              <div class="col-sm-8">
                <select class="form-control" name="season" id="season"  required="">
                  <option value="">--Select Season Type--</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Land Type</label>
              <div class="col-sm-8">
                <select class="form-control" name="land" id="land" onchange="get_water()" required="">
                  <option value="">--Select Land Type--</option>
                  <?php 
                    $GET_TYPE="SELECT * FROM `ilab_water_land_type` WHERE `status`='1'";
                    $SQL_GET=mysqli_query($conn,$GET_TYPE);
                    while ($get_fetch_type=mysqli_fetch_assoc($SQL_GET)) {?>
                      <option value="<?=$get_fetch_type['land_id']?>"><?=strtoupper($get_fetch_type['land_type_name'])?></option>

                  <?php  }?>
                </select>
              </div>
            </div>            
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Water</label>
              <div class="col-sm-8">
                <select class="form-control" name="water" id="water" required="">
                  <option value="">--Select Water Type--</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Method of Cultivation</label>
              <div class="col-sm-8">
                <select class="form-control" name="cultivation" id="cultivation" required="">
                  <option value="">--Select Method of Cultivation--</option>                
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Description</label>
              <div class="col-sm-8">
                <textarea  name="editor1" id="editor1" rows="10" cols="80" ></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Image 1</label>
              <div class="col-sm-8">
              <input type="file" name="image" class="form-control" required="" >
                <!--<input type="file" name="image[]" class="form-control" required="" multiple="multiple">-->
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Image 2</label>
              <div class="col-sm-8">
              <input type="file" name="image_1" class="form-control" >
                <!--<input type="file" name="image[]" class="form-control" required="" multiple="multiple">-->
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Image 3</label>
              <div class="col-sm-8">
              <input type="file" name="image_2" class="form-control" >
                <!--<input type="file" name="image[]" class="form-control" required="" multiple="multiple">-->
              </div>
            </div>
        </div>
   <div class="box-footer">
              <div class="row">
                <div class="col-xs-12">
                  <input type="submit" class="btn btn-info btn-xs pull-right" name="Save" value="Save">
                </div>
              </div>
            </div>
          </div>
        </form>
      </section>
    </section>
  </div>


<?php
}else{
  header('Location:logout_time_out.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'template/header.php';

?>
<script type="text/javascript" src="../assert/ckeditor/ckeditor.js"></script>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1', {
                  filebrowserBrowseUrl: '/browser/browse.php',
                  filebrowserUploadUrl: '/uploader/upload.php'
                });
                // CKEDITOR.replace( 'editor1' );
                // CKEDITOR.replace( 'editor1', {
                //   extraPlugins: 'imageuploader'
                // });
            </script>
<script type="text/javascript">
  function get_crop() {
    var option="2";
    // crop_type
// crop_name
    var Crop_type=$('#crop_type').val();
    if(Crop_type!=""){
      $('#season').html('<option value="">--Please Select Crop Name--</option>');
       $('#crop_name').html('<option value="">--Select Crop Name--</option>');
      $.ajax({
                type:'POST',
                url:'admin_get_crop.php',
                data:'Crop_type='+Crop_type+'&crop_option='+option,
                success:function(html){
                    // $remove_display
                  // $("#remove_display").remove();
                  $("#crop_name").show(1000);
                  $('#crop_name').html(html);
                 
                }
            }); 
    }else{
      $('#cultivation').html('<option value="">--Please Select Crop Name--</option>');
      $('#season').html('<option value="">--Please Select Crop Name--</option>');
      $('#crop_name').html('<option value="">--Select Crop Name--</option>');
    }
    // body...
  }
  function get_season(){
    var crop_name=$('#crop_name').val();
     var option="3";
    if(crop_name!=""){
      $('#season').html('<option value="">--Please Select Crop Name--</option>');
       $('#cultivation').html('<option value="">--Please Select Crop Name--</option>');
        $.ajax({
                type:'POST',
                url:'admin_get_crop.php',
                data:'crop_name='+crop_name+'&crop_option='+option,
                success:function(html){
                    // $remove_display
                  // $("#remove_display").remove();
                  $("#season").show(1000);
                  $('#season').html(html);
                 
                }
            }); 
       var option_1="4";
         $.ajax({
                type:'POST',
                url:'admin_get_crop.php',
                data:'crop_name='+crop_name+'&crop_option='+option_1,
                success:function(html){
                    // $remove_display
                  // $("#remove_display").remove();
                  $("#cultivation").show(1000);
                  $('#cultivation').html(html);
                 
                }
            }); 
    }else{
      $('#cultivation').html('<option value="">--Please Select Crop Name--</option>');
      $('#season').html('<option value="">--Please Select Crop Name--</option>');
    }
  }
  function get_water(){
    // land
    // water
    var land_id=$('#land').val();
    if(land!=""){
      var option_1="5";
         $.ajax({
                type:'POST',
                url:'admin_get_crop.php',
                data:'land_id='+land_id+'&crop_option='+option_1,
                success:function(html){
                    // $remove_display
                  // $("#remove_display").remove();
                  $("#water").show(1000);
                  $('#water').html(html);
                 
                }
            }); 
    }else{
        $('#water').html('<option value="">--Please Select Land Name--</option>');
    }
  }
</script>