<?php
// print_r($_REQUEST);
// Array ( [id] => 6 ) 
?>
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
        User Information Edit Mobile
       <!--  <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User Creation</a></li>
        <li class="active">User Mobile Edit</li>
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
            <form role="form" class="form-horizontal" action="admin_user_edit_mobile_save.php" method="POST">
           
              <div class="box-body">
                <div class="form-group">
                <?php 
                $id=$_REQUEST['id'];
                $query="SELECT * FROM `rhc_master_login_user` where `slno`='$id'";
              $sql_exe=mysqli_query($conn,$query);
              $num=mysqli_num_rows($sql_exe);
              if($num==0){
              	$msg->error('Invalid User Selection Please Click Valid User');
 					header("location:admin_user_creation.php");
				exit;
              }
              $res=mysqli_fetch_assoc($sql_exe);

              ?>
               <input type="hidden" name="id" value="<?=$id?>">
                  <label class="control-label col-sm-2" for="Desigination_user">Level:</label>
                  <div class="col-sm-6">
                  <!-- <select class="form-control text-center" onchange="get_selection_designa()" name="Desigination_user" id="Desigination_user" required="">
                    <option value="">-- Select Desigination -- </option>
                    <?php 
                          $query_desigination="SELECT * FROM `rhc_master_designation` WHERE `status`='1'";
                          $sql_exe_designation=mysqli_query($conn,$query_desigination);
                          while ($res_designation=mysqli_fetch_assoc($sql_exe_designation)) {?>
                          <option value="<?=$res_designation['slno']?>"><?=$res_designation['designation_name']?></option>
                           
                         <?php }?>

                  </select>
                -->   
                  <label class="control-label col-sm-2" for="Desigination_user">
                  	<?php
                  $desigination_level=$res['user_designation'];
                  $query_designation="SELECT * FROM `rhc_master_designation` WHERE `slno`='$desigination_level'";
                  $sql_exe_degination=mysqli_query($conn,$query_designation);
                  $res_degination=mysqli_fetch_assoc($sql_exe_degination);
                  echo $res_degination['designation_name'];
                ?>
                  </label>

                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Desigination_name">Desigination :</label>
                  <div class="col-sm-6">
                  <?php 
                	if(!empty($res['user_designation_name'])){

                	?>

                    <input type="text" class="form-control"  autocomplete="off"  id="Desigination_name" name="Desigination_name" placeholder="Enter Desigination" value="<?=$res['user_designation_name']?>" readonly required="">
                    <?php }else{ ?>
                    	<input type="text" class="form-control"  autocomplete="off"  id="Desigination_name" name="Desigination_name" placeholder="Enter Desigination" value="DEMO" readonly required="">
                   <?php }?>
                  </div>
                </div>
                <!-- <div class="form-group">
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
                </div> -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="user_name">Name:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  autocomplete="off"  id="user_name" name="user_name" placeholder="Enter Name" readonly="" value="<?=$res['user_name']?>" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="user_email">Email:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  autocomplete="off"  onkeyup="user_auto()" id="user_email" name="user_email" value="<?=$res['user_email']?>" placeholder="Enter Email Id" readonly="" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="user_mobile">Mobile No:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" onkeyup="check_mobile()" autocomplete="off"  id="user_mobile" name="user_mobile" placeholder="Enter Mobile No" value="<?=$res['user_mobile']?>" required="">
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
                    <input type="text" class="form-control" id="user_id" value="<?=$res['user_email']?>" name="user_id" placeholder="Enter User Id" readonly="" >
                  </div>
                </div>
                <span id="myerror" class="text-center" style="color: red">
                <!-- <div class="form-group">
                  <label class="control-label col-sm-2" for="user_Password">Password:</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control"  autocomplete="off"  id="user_Password" name="user_Password" placeholder="Enter Password"  required="">
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <label class="control-label col-sm-2" for="user_conf_Password">Confirm Password:</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="user_conf_Password" name="user_conf_Password" placeholder="Enter Confirm Password"  required="">
                  </div>
                </div> -->
                </span>
              </div>
             
              <div class="box-footer text-center">
                <a href="admin_user_list.php" class="btn btn-default">Back</a>
                <input type="submit" id="save" class="btn btn-primary " value="Submit">
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
   $(document).ready(function(){
    $("#save").hide();
  });
</script>
<script type="text/javascript">
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 
<script type="text/javascript">

  function check_mobile() {
    // var state_id=$('#state_id').val();
    var user_mobiles=$('#user_mobile').val();    
    if(user_mobiles!=""){
    	//alert(user_mobiles);
      $.ajax({
        type:'POST',
        url:'admin_mobile_check.php',
        data:{user_mobiles:user_mobiles},
        success:function(html){  
        	//alert(html);
          if(html==1){
              document.getElementById("myerror").innerHTML = "";
              $("#save").show();
              // $("#reli").submit(); 
          }else{
              if(html==2){
                document.getElementById("myerror").innerHTML = "Mobile No Already Exist";
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