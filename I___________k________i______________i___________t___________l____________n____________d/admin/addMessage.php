
<?php

include_once './protected.php';
include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg= new Message();
$adm= new Admin();

ob_start();

$title="sendMessage";


if(isset($_POST['postMessage'])){
    $type = $_POST['msg'];
    $user = $_POST['user'];
    $head = $_POST['head'];
    $message = $_POST['message'];
    $res = $adm->postMessage($type,$user,$head,$message);
    if($res){
        $msg->successMessage("Messege Posted Successfully");
    }  else {
        $msg->errorMessage("Failure In Sending Message!! Try Again..");
    }
}

?>
<div class="row">
  <div class="col-lg-12">
    <h1>Message <small>Send Message</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="fa fa-edit"></i> Send Message to Users</li>
    </ol>
  </div>
</div>
<!-- /.row -->


<div class="row">
<div class="col-lg-6">
<form role="form" method="post">
    
        <div class="form-group">
            <label>Message Type &nbsp;&nbsp;&nbsp;</label>
            <label class="radio-inline"><input type="radio" name="msg" value="Message">Message</label>
            <label class="radio-inline"><input type="radio" name="msg" value="News">News/Event</label>
        </div>
        <div class="form-group">
            <label>Message For &nbsp;&nbsp;</label>
            <label class="radio-inline"><input type="radio" name="user" value="Student" >Student</label>
            <label class="radio-inline"><input type="radio" name="user" value="College" >College</label>
            <label class="radio-inline"><input type="radio" name="user" value="Open" >All</label>
            
        </div>
        <div class="form-group">
            <label>Message Head</label>
            <input type="text" name="head" class="form-control">
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
		<label>        
                <input type="submit" name="postMessage" value="Post" class="btn btn-primary">
                <input type="reset"  value="Clear" class="btn btn-primary">
        </label>
        </div>
    
</form>
</div>
</div>
</div>
<?php $pageContent= ob_get_contents();
ob_get_clean();
include 'forms_template.php'; ?>
