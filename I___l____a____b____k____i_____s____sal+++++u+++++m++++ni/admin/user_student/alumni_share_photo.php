<?php
session_start();
ob_start();
if($_SESSION['email']){
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
        Sent Photo & text              
        <small>New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Query</a></li>
        <li class="active">Sent Sharing</li>
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
        <div class="panel-heading"><h4><b>Share Photo & Text</h4></div>
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
            <form class="form-inline" action="alumni_share_photo_save.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                 <b>Short Description</b> : <textarea name="title" rows="4" cols="50" maxlength="200" required="">
Enter text here...</textarea>
 <!-- <input type="text"  name="title" placeholder="Enter Title " style="width: 300px;" required=""/> -->
 <br><br>      
                 <b>Photo</b> : <input type="file"  name="img" required=""/>
                 <label for="email">Text:</label><br>
                 <textarea name="text" class="form-control" required="true" autocomplete="off" rows="6" cols="45"></textarea>
              </div>
              <br>
              <br>
              <div class="text-center">
                <input type="submit" name="submit" class="btn btn-info" value="OK">
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