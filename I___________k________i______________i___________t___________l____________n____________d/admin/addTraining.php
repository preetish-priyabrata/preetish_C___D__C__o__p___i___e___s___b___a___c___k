<?php

include_once './protected.php';
include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg= new Message();
$adm= new Admin();

ob_start();

$title="addTraining";


if(isset($_POST['addTraining'])){
    $head= $_POST['head'];
    $description= $_POST['description'];
    $startDate= $_POST['startDate'];
    $endDate= $_POST['endDate'];
    $fee= $_POST['fee'];
    $venue= $_POST['venue'];
    $trainer= $_POST['trainer'];
    $contact= $_POST['contact'];
    $res= $adm->addTrainingProgram($head,$description,$startDate,$endDate,$fee,$venue,$trainer,$contact);
}
?>

<div class="row">
  <div class="col-lg-12">
    <h1>Form <small>Add Training</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="fa fa-edit"></i> Add Training Information</li>
    </ol>
  </div>
</div>
<!-- /.row -->


<div class="row">
<div class="col-lg-6">
<form role="form" method="post">
    
        <div class="form-group">
            <label>Training Head</label>
            <input type="text" name="head" class="form-control">
        </div>
        <div class="form-group">
            <label>Description</label>       
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Start Date</label>
            <input type="text" name="startDate" class="form-control">
        </div>
        <div class="form-group">
            <label>End Date</label>
            <input type="text" name="endDate" class="form-control">
        </div>
        <div class="form-group input-group">
            <label>Fee</label>
            <span class="input-group-addon">Rs.</span>
            <input type="text" name="fee" class="form-control">
            <span class="input-group-addon">.00</span>
        </div>
        
        <div class="form-group">
            <label>Venue</label>
            <textarea name="venue" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Trainer</label>
            <input type="text" name="trainer" class="form-control">
        </div>
        <div class="form-group">
            <label>Contact</label>
            <input type="text" name="contact" class="form-control">
        </div>
        <div class="form-group">
            <label><input type="submit" name="addTraining" class="btn btn-primary"></label>
        </div>
    

</form>
</div>
</div>
</div>
<?php 
$pageContent= ob_get_contents();
ob_get_clean();
include 'forms_template.php'; ?>

