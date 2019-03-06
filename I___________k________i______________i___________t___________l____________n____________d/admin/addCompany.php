<?php
include_once './protected.php';

include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg = new Message();
$adm = new Admin();

ob_start();

$title = "addCompany";

if (isset($_POST['addCompany'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $poc = $_POST['poc'];
    $logo = $_FILES['logo']['name'];
    $logo_tmp = $_FILES['logo']['tmp_name'];
    $destination = "../content/company_logo/" . basename($logo);
    move_uploaded_file($logo_tmp, $destination);
    $res = $adm->addCompanyDetails($name, $phone, $email, $address, $phone, $poc, $logo);
    if ($res) {
        $msg->successMessage("Company Details Added Successfully");
    } else {
        $msg->errorMessage("Failure");
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1>Form <small>Add Company</small></h1>
        <ol class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i> Add Company Information</li>
        </ol>
    </div>
</div>
<!-- /.row -->


<div class="row">
    <div class="col-lg-6">
        <form role="form" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="form-group">
                <label>Email </label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Address </label>
                <textarea name="address" class="form-control" row="3"></textarea>
            </div>

            <div class="form-group">
                <label>Logo </label>
                <input type="file" name="logo">
            </div>

            <div class="form-group">
                <label>Point Of Contact </label>
                <input type="text" name="poc" class="form-control">
            </div>

            <div class="form-group">
                <label><input type="submit" name="addCompany" class="btn btn-primary" value="Add Company"></label>
            </div>

        </form>
    </div>
</div>
</div>
<?php
$pageContent = ob_get_contents();
ob_get_clean();
include 'forms_template.php';
?>