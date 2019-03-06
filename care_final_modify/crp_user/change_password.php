<?php
session_start();
ob_start();
if($_SESSION['employee_id']){
  include  '../config_file/config.php';
  require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 
?>
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password 
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <section class="content">
      <div class="text-center">
        <?php $msg->display(); ?>
      </div>
      <div class="row">
        <div class="col-lg-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header with-border">

            <div class="box-header ui-sortable-handle" style="cursor: move;">
              

             
              <!-- tools box -->
              <div class="pull-right box-tools">
                
              </div>
              <!-- /. tools -->
            </div>
          </div>
             <div class="box-body">
            <div class="col-sm-6 col-sm-offset-3">
            <p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
            <form method="post" action="change_password_save.php" id="passwordForm">
            <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
            <div class="row">
            <div class="col-sm-6">
            <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
            <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
            </div>
            <div class="col-sm-6">
            <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
            <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
            </div>
            </div>
            <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
            <div class="row">
            <div class="col-sm-12">
            <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
            </div>
            </div>
            <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
            </form>
            </div><!--/col-sm-6-->
            </div><!--/row-->
          </div>
        </div>
      </div>

      
    </section>  
  
  </div>

  <!-- /.content-wrapper -->
  <?php
}else{
  header('Location:logout.php');
  exit;
}
  $contents = ob_get_contents();
  ob_clean();
  include 'template/template.php';
?>
<script type="text/javascript">
  $("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
  var lcase = new RegExp("[a-z]+");
  var num = new RegExp("[0-9]+");
  
  if($("#password1").val().length >= 8){
    $("#8char").removeClass("glyphicon-remove");
    $("#8char").addClass("glyphicon-ok");
    $("#8char").css("color","#00A41E");
  }else{
    $("#8char").removeClass("glyphicon-ok");
    $("#8char").addClass("glyphicon-remove");
    $("#8char").css("color","#FF0004");
  }
  
  if(ucase.test($("#password1").val())){
    $("#ucase").removeClass("glyphicon-remove");
    $("#ucase").addClass("glyphicon-ok");
    $("#ucase").css("color","#00A41E");
  }else{
    $("#ucase").removeClass("glyphicon-ok");
    $("#ucase").addClass("glyphicon-remove");
    $("#ucase").css("color","#FF0004");
  }
  
  if(lcase.test($("#password1").val())){
    $("#lcase").removeClass("glyphicon-remove");
    $("#lcase").addClass("glyphicon-ok");
    $("#lcase").css("color","#00A41E");
  }else{
    $("#lcase").removeClass("glyphicon-ok");
    $("#lcase").addClass("glyphicon-remove");
    $("#lcase").css("color","#FF0004");
  }
  
  if(num.test($("#password1").val())){
    $("#num").removeClass("glyphicon-remove");
    $("#num").addClass("glyphicon-ok");
    $("#num").css("color","#00A41E");
  }else{
    $("#num").removeClass("glyphicon-ok");
    $("#num").addClass("glyphicon-remove");
    $("#num").css("color","#FF0004");
  }
  
  if($("#password1").val() == $("#password2").val()){
    $("#pwmatch").removeClass("glyphicon-remove");
    $("#pwmatch").addClass("glyphicon-ok");
    $("#pwmatch").css("color","#00A41E");
  }else{
    $("#pwmatch").removeClass("glyphicon-ok");
    $("#pwmatch").addClass("glyphicon-remove");
    $("#pwmatch").css("color","#FF0004");
  }
});
</script>