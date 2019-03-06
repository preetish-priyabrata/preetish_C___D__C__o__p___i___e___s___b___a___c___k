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
        Pdf
        <small>New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Share Information </a></li>
        <li class="active">PDF</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
    <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <div class="panel panel-default">
        <div class="panel-heading"><h4><b>Pdf Sharing</b></h4></div>
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
            <form class="form-horizontal" action="alumni_sent_pdf.php" method="POST" enctype='multipart/form-data'>
              <div class="form-group">
                <label class="control-label col-sm-2" for="Title">Short Description :</label>
                <div class="col-sm-10">
                 <textarea name="title" rows="3" cols="50" maxlength="150" required="" class="form-control" onKeyDown="limitText(this.form.title,this.form.countdown,150);" onKeyUp="limitText(this.form.title,this.form.countdown,150);"></textarea>
                 <font size="1">(Maximum characters: 150)<br>
                  You have <input readonly type="text" name="countdown" size="3" value="150"> characters left.</font> 
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="Photos">Pdf:</label>
                <div class="col-sm-10">
                  <input type="file"  name="img" required="" accept="application/pdf"/>
                </div>
              </div>
              <!-- <div class="form-group">
                 <b>Title</b> :  <input type="text"  name="title" placeholder="Enter Title " style="width: 300px;" required=""/>
                 </div>
                <div class="form-group"> 
                    
                 <b>Photos</b> : <input type="file"  name="img" required=""/>
                
              </div> -->
              <br>
              <br>
              <span style="color: red"><small>* only Pdf Size Of 2mb File </small></span>
              <br>
              <br>
              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>
              <div class="text-center">
              <a href="alumni_sharing_details.php" class="btn btn-info" role="button">Back</a>
                <input type="submit" class="btn btn-info" value="OK">
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