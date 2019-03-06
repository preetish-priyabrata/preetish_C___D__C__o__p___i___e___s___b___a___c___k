<?php
include_once './protected.php';

include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg= new Message();
$adm= new Admin();

ob_start();

$title="addCollege";


if(isset($_POST['addCollege'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $tnpOfficer = $_POST['tnpOfficer'];
    $tnpContact = $_POST['tnpContact'];
    $res = $adm->addCollegeInformation($name, $address, $email, $tnpOfficer, $tnpContact);
    if ($res) {
        $msg->successMessage("College Registered Successfully");
    } else {
        $msg->errorMessage("Error!! Please Registered Again");
    }
}

?>

<div class="row">
  <div class="col-lg-12">
    <h1>Form <small>Add College</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="fa fa-edit"></i> Add College Information</li>
    </ol>
  </div>
</div>
<!-- /.row -->

<div class="row">
<div class="col-lg-6">
<form role="form" method="post">
  
  	  <div class="form-group">
      <label>College Name</label>
      <input type="text" name="name" class="form-control">
      </div>
      
      <div class="form-group">
      <label>Address</label>
      <textarea name="address" class="form-control" rows="3"></textarea>
	  </div>
      
      <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control">
      </div>
    
      <div class="form-group">
      <label>T & P Officer</label>
      <input type="text" name="tnpOfficer" class="form-control">
      </div>
    
      <div class="form-group">
      <label>T & P Contact</label>
      <input type="text" name="tnpContact" class="form-control">
      </div>
    
      <div class="form-group">
      <label><input type="submit" name="addCollege" value="Register" class="btn btn-primary"></label>
      <label><input type="reset" name="" value="Clear" class="btn btn-primary"></label>
      </div>
    
</form>
</div>
</div>
</div>
<?php $pageContent= ob_get_contents();
ob_get_clean();
include 'forms_template.php'; ?>
