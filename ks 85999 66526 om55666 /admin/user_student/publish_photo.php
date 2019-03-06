
<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add Photo
        <small>New</small>
      </h1>

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
        <div class="panel-heading">Photo Upload</div>
        <div class="panel-body">
<!-- <div id="container">
            <div id="chat_box">
                <div id="chat_data">
                    <span style="color:green;">Samarth: </span>
                    <span style="color:brown;">Hey, How are you?</span>
                    <span style="float:right;">12.30PM</span>
                </div>
            </div> -->
            <br>
            <form class="form-inline" action="publish_photo_Save.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="img">Add Photo:</label>
               <input type="file" name="img" id="img" for="img" required="" style="width: 300px;height: 31px; border-radius:8px;">
                
              </div>
              <br>
              <br>
              <div class="text-center">
                <input type="submit" name="submit" class="btn btn-info" value="submit">
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