<?php
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Single Entry Of Surplus Material";
?>
<!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    input,textarea {text-transform: uppercase;}
</style>
<div class="wrapper" >
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Main Menu</a></li>
                            <li class="breadcrumb-item"><a href="#">Entry Of Surplus Material</a></li>
                            <li class="breadcrumb-item active">Single Entry Surplus Material</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Single Entry Surplus Material </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php $msg->display(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="header-title">Single Entry Surplus Material Form</h4>
                    </div>
                    <form action="admin_single_entry_save.php" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6" style="border: 1px solid lightgreen;padding: 10px">
                                <div class="form-group row">
                                    <label for="Surplus_job_code" class="col-sm-3 col-form-label">Surplus Job Code</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="Surplus_job_code" id="Surplus_job_code" placeholder="Surplus Job Code" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Material_Code" class="col-sm-3 col-form-label">Material Code </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="Material_Code" id="Material_Code" placeholder="Material Code" required="">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="UOM " class="col-sm-3 col-form-label">UOM </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="UOM" id="UOM " placeholder="UOM" required="">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="Surplus_Quantity_Available" class="col-sm-3 col-form-label">Surplus Quantity Available  </label>
                                    <div class="col-sm-9">
                                         <input type="text" class="form-control" name="Surplus_Quantity_Available" id="Surplus_Quantity_Available" placeholder="Surplus Quantity Available" required="">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="unit_rate" class="col-sm-3 col-form-label">Unit Rate</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="unit_rate" id="unit_rate" placeholder="Unit Rate" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="person_responsible" class="col-sm-3 col-form-label">Person Responsible</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="person_responsible" id="person_responsible" placeholder="Person Responsible" required="">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-6" style="border: 1px solid lightgreen; padding: 10px">
                                <div class="form-group row">
                                    <label for="Job_Description" class="col-sm-3 col-form-label">Job Description </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="Job_Description" id="Job_Description" rows="3" required=""></textarea>
                                     
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Material_Description" class="col-sm-3 col-form-label">Material Description  </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="Material_Description" id="Material_Description" rows="3" required=""></textarea>
                                      
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label for="Surplus_date" class="col-sm-3 col-form-label">Surplus Date </label>
                                    <div class="col-sm-9">
                                         <input type="date" class="form-control" name="Surplus_date" id="Surplus_date" placeholder="Surplus Date" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="Amount" class="col-sm-3 col-form-label">Amount </label>
                                    <div class="col-sm-9">
                                         <input type="text" class="form-control" name="Amount" id="Amount" placeholder="Amount" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="Product_Group" class="col-sm-3 col-form-label">Product Group </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="Product_Group" id="Product_Group" placeholder="Product Group" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Internal_Remarks" class="col-sm-3 col-form-label">Internal Remarks </label>
                                    <div class="col-sm-9">
                                       <textarea class="form-control" name="Internal_Remarks" id="Internal_Remarks" rows="3" required=""></textarea>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group m-b-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Reset
                                </button>
                                <a  href="admin_dashboard.php" class="btn btn-info waves-effect waves-light">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                                
        
        <!-- end page title end breadcrumb -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


<?php
}else{
	header('Location:logout_time_out.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'template/header.php';

?>
