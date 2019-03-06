<html lang="en">
<head>
  <title>Sharing details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>

</style>
</head>

<body>

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
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sharing Platform</a></li>
        <li class="active">New Info</li>
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
        <div class="panel-heading"><h4><b><center>Select The Right Sharing Format</center></b></h4></div>
        <div class="panel-body" style="margin-left: 60px;">

            <br>
           <!-- <form class="form-inline" action="alumni_photo_file.php" method="POST">-->
              <div class="form-group">

                <div class="container">

                     <a href="alumni_photo_file.php"> <input type="submit" name="Share Photo/Pdf" value="Share Photo For Gallery" class="btn btn-primary" style="height:120px ; width: 200px; font-size: 18px;background-color:#ff8f8f; color:#663d3d; margin-left: -47px;"/></a>

                     <a href="alumni_share_text.php"><input type="submit" name="Share Text" value="Share Text" class="btn btn-success" style="height:120px ; width: 200px; font-size: 18px; background-color: #8fc9ff;color:#663d3d;"/></a><br><br>

                     <a href="alumni_share_url.php"><input type="submit" name="Share Url" value="Share Url" class="btn btn-info" style="height:120px ; width: 200px; font-size: 18px; background-color: #8ecdae;color:#663d3d; margin-left: -47px;"/></a>

                     <a href="alumni_share_pdf.php"><input type="submit" name="Share pdf" value="Share Pdf"  class="btn btn-warning" style="height:120px ; width: 200px; font-size: 18px; background-color: #c1ab9a; color:#663d3d;"></a><br><br>
                     <a href="alumni_share_video.php"><input type="submit" name="Share pdf" value="Share Video"  class="btn btn-warning" style="height:120px ; width: 200px; margin-left: -47px; font-size: 18px; background-color: #b65810; color: #fff;"></a>
                     <!--  <a href="alumni_share_mp3.php"><input type="submit" name="Share pdf" value="Share Audio"  class="btn btn-warning" style="height:120px ; width: 200px; font-size: 18px; background-color: #0b9525; color: #f9f9f9;"></a> -->

                </div>
              </div>
            <br>
          <br>
         <div class="text-center">
              <a href="alumni_dashboard.php" class="btn btn-info" role="button">Back</a>
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