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
  
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Query</a></li>
        <li class="active">Sent Query</li>
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
        <div class="panel-heading">Setting</div>
        <div class="panel-body" style="margin-left: 45px;">

            <br>
            <form class="form-inline" action="alumni_name_photo_update_Save.php" method="POST">
              <div class="form-group">
              <label for="email">Name:</label><br>
                <input type="text" name="name" id="name" class="form-control" style="width: 330px;height: 34px;" required="true"/><br>

                 <label for="email">Email:</label><br>
                 <input type="text" name="email" id="email" class="form-control" style="width: 330px;height: 34px;" required="true"/><br>

                 <label for="email">Phone No:</label><br>
                 <input type="text" name="phone" id="phone" class="form-control" style="width: 330px;height: 34px;" required="true"/><br>

                 <label for="email">Photo:</label>
                <input type="file" name="Photo" id="Photo" required="true"/><br>
             </div>
              <br>
              <br>
              <div class="text-center">
                <input type="submit" class="btn btn-info" value="Update">
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