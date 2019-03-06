<?php
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Agriculture Sub Menu List";
 	$sl_num=web_decryptIt(str_replace(" ", "+",$_GET['slno']));


 	$GET_information="SELECT * FROM `detail_php` WHERE `sl_num`='$sl_num'";
  	$GET_information_sql_exe=mysqli_query($conn,$GET_information);
  	$GET_information_fetch=mysqli_fetch_assoc($GET_information_sql_exe);

 	 ?>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->

<style type="text/css">
  input[type="file"] {
    /*display: block;*/
    padding: 0px 0px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
     

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php $msg->display(); ?>
      </div>
      <form action="#"  class="form-horizontal" >
        <div class="box">
          <div class="box-header with-border">
            <!-- <h3 class="box-title">Crop Type</h3> -->
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Crop Type</label>
              <div class="col-sm-8">
              	<?php
              		$crop_type=($GET_information_fetch['crop_type']);
					$get_crop_type_query="SELECT * FROM `ilab_water_sub_menu` WHERE `sub_menu_id`='$crop_type'";
					$get_crop_type_sql_exe=mysqli_query($conn,$get_crop_type_query);
					$get_crop_type_fetch=mysqli_fetch_assoc($get_crop_type_sql_exe);
			echo	 strtoupper($get_crop_type_fetch['sub_menu_name']);
				?>
               
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Crop Name</label>
              <div class="col-sm-8">
              	<?php
              		$crop_name=($GET_information_fetch['crop_name']);
					$get_crop_name_query="SELECT * FROM `ilab_water_crops` WHERE `crop_id`='$crop_name'";
					$get_crop_name_sql_exe=mysqli_query($conn,$get_crop_name_query);
					$get_crop_name_fetch=mysqli_fetch_assoc($get_crop_name_sql_exe);
				echo	strtoupper($get_crop_name_fetch['crop_name']);
              	?>	
                <!-- <select class="form-control" name="crop_name" id="crop_name" onchange="get_season()" required="">
                  <option value="">--Select Crop Name--</option>
                </select> -->
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Seasion</label>
              <div class="col-sm-8">
                <?php 
                        $seasion=($GET_information_fetch['season']);
                         $get_season_query="SELECT * FROM `ilab_water_session` WHERE `session_id`='$seasion'";
                        $get_seasion_sql_exe=mysqli_query($conn,$get_season_query);
                        $get_seasion_fetch=mysqli_fetch_assoc($get_seasion_sql_exe);
                    echo    strtoupper($get_seasion_fetch['seasion_name']);
                        ?>
                <!-- <select class="form-control" name="season" id="season"  required="">
                  <option value="">--Select Season Type--</option>
                </select> -->
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Land Type</label>
              <div class="col-sm-8">
              <!-- <div class="col-sm-8">
                <select class="form-control" name="land" id="land" onchange="get_water()" required="">
                  <option value="">--Select Land Type--</option>
                 
                </select>  -->
                <?php 
                        $land_type=($GET_information_fetch['land_type']);
                        $get_land_query="SELECT * FROM `ilab_water_land_type` WHERE `land_id`='$land_type'";
                        $get_land_sql_exe=mysqli_query($conn,$get_land_query);
                        $get_land_fetch=mysqli_fetch_assoc($get_land_sql_exe);
                    echo    strtoupper($get_land_fetch['land_type_name']);
                        ?>
              </div>
            </div>            
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Water</label>
              <div class="col-sm-8">
                 <?php 
                        $water=($GET_information_fetch['Water_type']);
                        $get_water_query="SELECT * FROM `ilab_water_water_details` WHERE `water_id`='$water'";
                        $get_water_sql_exe=mysqli_query($conn,$get_water_query);
                        $get_water_fetch=mysqli_fetch_assoc($get_water_sql_exe);
                    echo     strtoupper($get_water_fetch['water_name']);
                        ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Description</label>
              <div class="col-sm-8">
                <!-- <textarea  name="editor1" id="editor1" rows="10" cols="80" ></textarea>
              </div> -->
               	<?php 
                      $description=($GET_information_fetch['description']);
                      if($description==""){
                      	echo "Not Description Avaliable";
                      }else{
                      	echo $description;
                      }
                       
               	?>
            </div>
        </div>
        <div class="form-group">
              <label for="" class="col-sm-2 control-label">Image 1</label>
              <div class="col-sm-8">
              <?php
              	$image=($GET_information_fetch['image_file_name']);
		        						if(file_exists("../upload/details/".$image)){
		        							?>
		        						<img src="../upload/details/<?=$image?>" width="50%">
		        						<?php }else{
		        							echo "<b style='color:red'>Unable find Picture</b>";
		        						}
  
             ?>
              </div>
            </div>
        <?php
            $image_file_name_two=($GET_information_fetch['image_file_name_two']);
            if($image_file_name_two!=""){?>
        <div class="form-group">
              <label for="" class="col-sm-2 control-label">Image 2</label>
              <div class="col-sm-8">
              <?php
                $image=($GET_information_fetch['image_file_name']);
                        if(file_exists("../upload/details/".$image_file_name_two)){
                          ?>
                        <img src="../upload/details/<?=$image_file_name_two?>" width="50%">
                        <?php }else{
                          echo "<b style='color:red'>Unable find Picture</b>";
                        }
  
             ?>
              </div>
            </div>
            <?php
          }
            $image_file_name_three=($GET_information_fetch['image_file_name_three']);
            if($image_file_name_three!=""){?>
          <div class="form-group">
              <label for="" class="col-sm-2 control-label">Image 3</label>
              <div class="col-sm-8">
              <?php
                $image=($GET_information_fetch['image_file_name']);
                        if(file_exists("../upload/details/".$image_file_name_three)){
                          ?>
                        <img src="../upload/details/<?=$image_file_name_three?>" width="50%">
                        <?php }else{
                          echo "<b style='color:red'>Unable find Picture</b>";
                        }
  
             ?>
              </div>
            </div>
          <?php }?>
        
    </div>
           <!--  <div class="form-group">
              <label for="" class="col-sm-2 control-label">Image</label>
              <div class="col-sm-8">
                <input type="file" name="image" class="form-control" required="">
              </div>
            </div>
        </div> -->
   <div class="box-footer">
              <div class="row">
                <div class="col-xs-12">
                  <a href="detail_save_view.php" class="btn btn-info btn-xs pull-right" >Back</a>
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
