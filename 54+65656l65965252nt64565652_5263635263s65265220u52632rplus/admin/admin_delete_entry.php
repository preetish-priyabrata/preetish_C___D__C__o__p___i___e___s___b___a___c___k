<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Delete Entry Of Surplus Material";
    // Array ( [ids] => 93Z/d1ygfbtPCPZ0WGuQwDDYiDCFkSlW29n6UYHfRrg= ) 
    $slno=preetishweb_decryptIt(str_replace(" ", "+", $_GET['tri'])); //zmr_slno

    $get_material="SELECT * FROM `ilab_master_field_surplus_material` WHERE `slno_surplus`='$slno'";
    $sql_exe=mysqli_query($conn,$get_material);
    $get_fetch_material=mysqli_fetch_assoc($sql_exe);
?>

<style type="text/css">
    input ,textarea {text-transform: uppercase;}
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
                            <li class="breadcrumb-item"><a href="#">View Surplus Material Master</a></li>
                            <li class="breadcrumb-item active">Delete Entry Surplus Material</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Delete Entry Surplus Material </h4>
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
                        <h4 class="header-title">Delete Entry Surplus Material Form</h4>
                    </div>
                     <!-- // `slno_surplus`, `surplus_job_code`, `job_description`, `material_code`, `material_description`, `quantity_available_surplus`, `surplus_declared_date`, `unit_rate`, `amount`, `uom`, `product_group`, `person_responsible`, `total_qnty`, `status`, `entry_id`, `update_status`, `date_entry` -->
                    <form action="admin_delete_entry_save.php" method="POST">
                        <input value="<?=$_GET['tri']?>" type="hidden" name="slno_surplus">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6" style="border: 1px solid lightgreen;padding: 10px">
                                <div class="form-group row">
                                    <label for="Surplus_job_code" class="col-sm-3 col-form-label">Surplus Job Code</label>
                                    <div class="col-sm-9">
                                      <input value="<?=$get_fetch_material['surplus_job_code']?>"   type="text" class="form-control" name="Surplus_job_code" id="Surplus_job_code" readonly  placeholder="Surplus Job Code" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Material_Code" class="col-sm-3 col-form-label">Material Code </label>
                                    <div class="col-sm-9">
                                      <input value="<?=$get_fetch_material['material_code']?>"   type="text" class="form-control" name="Material_Code" id="Material_Code" placeholder="Material Code" required="">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="UOM " class="col-sm-3 col-form-label">UOM </label>
                                    <div class="col-sm-9">
                                      <input value="<?=$get_fetch_material['uom']?>"   type="text" class="form-control" name="UOM" id="UOM " placeholder="UOM" required="">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="Surplus_Quantity_Available" class="col-sm-3 col-form-label">Surplus Quantity Available  </label>
                                    <div class="col-sm-9">
                                         <input value="<?=$get_fetch_material['quantity_available_surplus']?>"   type="text" class="form-control" name="Surplus_Quantity_Available" id="Surplus_Quantity_Available" placeholder="Surplus Quantity Available" required="">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="unit_rate" class="col-sm-3 col-form-label">Unit Rate</label>
                                    <div class="col-sm-9">
                                      <input value="<?=$get_fetch_material['unit_rate']?>"   type="text" class="form-control" name="unit_rate" id="unit_rate" placeholder="Unit Rate" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="person_responsible" class="col-sm-3 col-form-label">Person Responsible</label>
                                    <div class="col-sm-9">
                                      <input value="<?=$get_fetch_material['person_responsible']?>"   type="text" class="form-control" name="person_responsible" id="person_responsible" placeholder="Person Responsible" required="">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-6" style="border: 1px solid lightgreen; padding: 10px">
                                <div class="form-group row">
                                    <label for="Job_Description" class="col-sm-3 col-form-label">Job Description </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="Job_Description" id="Job_Description" rows="3" required=""><?=$get_fetch_material['job_description']?></textarea>
                                     
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Material_Description" class="col-sm-3 col-form-label">Material Description  </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="Material_Description" id="Material_Description" rows="3" required=""><?=$get_fetch_material['material_description']?></textarea>
                                      
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label for="Surplus_date" class="col-sm-3 col-form-label">Surplus Date </label>
                                    <div class="col-sm-9">
                                         <input value="<?=$get_fetch_material['surplus_declared_date']?>" type="date" class="form-control" name="Surplus_date" id="Surplus_date" placeholder="Surplus Date" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="Amount" class="col-sm-3 col-form-label">Amount </label>
                                    <div class="col-sm-9">
                                         <input value="<?=$get_fetch_material['amount']?>"   type="text" class="form-control" name="Amount" id="Amount" placeholder="Amount" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="Product_Group" class="col-sm-3 col-form-label">Product Group </label>
                                    <div class="col-sm-9">
                                      <input value="<?=$get_fetch_material['product_group']?>"   type="text" class="form-control" name="Product_Group" id="Product_Group" placeholder="Product Group" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Internal_Remarks" class="col-sm-3 col-form-label">Internal Remarks </label>
                                    <div class="col-sm-9">
                                       <textarea class="form-control" name="Internal_Remarks" id="Internal_Remarks" rows="3" required=""><?=$get_fetch_material['Internal_Remarks']?></textarea>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group m-b-0">
                            <div>
                                <button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-primary waves-effect waves-light">
                                    Delete
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
