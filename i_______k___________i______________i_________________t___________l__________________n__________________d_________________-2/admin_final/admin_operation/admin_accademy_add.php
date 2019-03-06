<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
   <style type="text/css">
    textarea {
    overflow-y: scroll;
    height: 100px;
    resize: none; /* Remove this if you want the user to resize the textarea */
   }
   </style>
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
          Add Academy
          <small>New</small>
        </h1>
        <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li><a href="#">Academy</a></li>
           <li class="active"> Add Academy</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="text-center">
      <?php $msg->display(); ?>
      </div>
      <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading"> <h4><b>Academy</b></h4></div>
          <div class="panel-body">
          <br>
          <form class="form-inline" action="admin_academy_add_save.php" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-5" for="Title">Add Academy :</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control" required="true" autocomplete="off"  name="accademy_name">
                </div>
              </div>
            <!--   <div class="form-group">
                <label class="control-label col-sm-2" for="Photos">Text Information :</label>
                <div class="col-sm-10">
                  <textarea name="text" class="form-control" required="true" autocomplete="off" rows="6" cols="45"></textarea>
                </div>
              </div>
              -->
               <br>
              <br>
             <div class="text-center">
            <input type="submit" name="submit" class="btn btn-info" value="Save">
           </div>
          </form>
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
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value = limitNum - limitField.value.length;
  }
}
</script>