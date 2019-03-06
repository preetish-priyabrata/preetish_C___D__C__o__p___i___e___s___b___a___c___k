<?php
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Entry Reservation Quantity Details";
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
                            <li class="breadcrumb-item active">Reservation Quantity Details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Entry Reservation Quantity Details</h4>
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
                        <h4 class="header-title">Entry Reservation Quantity Details Form</h4>
                    </div>
                     <!-- // `slno_surplus`, `surplus_job_code`, `job_description`, `material_code`, `material_description`, `quantity_available_surplus`, `surplus_declared_date`, `unit_rate`, `amount`, `uom`, `product_group`, `person_responsible`, `total_qnty`, `status`, `entry_id`, `update_status`, `date_entry` -->
                    <form action="admin_reserved_entry_save.php" method="POST">
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
                                    <label for="Reserve_job_Code" class="col-sm-3 col-form-label">Reserve job Code </label>
                                    <div class="col-sm-9">
                                      <input   type="text" class="form-control" name="Reserve_job_Code" id="Reserve_job_Code" placeholder="Reserve job Code" required="">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="UOM " class="col-sm-3 col-form-label">UOM </label>
                                    <div class="col-sm-9">
                                      <input value="<?=$get_fetch_material['uom']?>"   type="text" class="form-control" name="UOM" id="UOM" readonly placeholder="UOM" required="">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="Surplus_Quantity_Available" class="col-sm-3 col-form-label">Reserved Quantity</label>
                                    <div class="col-sm-9">
                                         <input value="<?=$get_fetch_material['quantity_available_surplus']?>"   type="number" class="form-control" name="Reserved_Quantity" id="Reserved_Quantity" placeholder="Surplus Quantity Available" required="" min="0" max="<?=$get_fetch_material['quantity_available_surplus']?>">
                                         <input value="<?=$get_fetch_material['quantity_available_surplus']?>"   type="hidden" class="form-control" name="Surplus_Quantity_Available" id="Surplus_Quantity_Available" placeholder="Surplus Quantity Available" required="">
                                    </div>
                                </div>
                                 
                               
                                
                            </div>
                            <div class="col-6" style="border: 1px solid lightgreen; padding: 10px">
                                 <div class="form-group row">
                                    <label for="Material_Code" class="col-sm-3 col-form-label">Material Code </label>
                                    <div class="col-sm-9">
                                      <input value="<?=$get_fetch_material['material_code']?>" readonly  type="text" class="form-control" name="Material_Code" id="Material_Code" placeholder="Material Code" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Material_Description" class="col-sm-3 col-form-label">Material Description  </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="Material_Description" id="Material_Description" rows="3" required="" readonly=""><?=$get_fetch_material['material_description']?></textarea>
                                      
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label for="Surplus_date" class="col-sm-3 col-form-label">Reserved on </label>
                                    <div class="col-sm-9">
                                         <input  type="date" class="form-control" name="Surplus_date" id="Surplus_date" placeholder="Reserved on Date" required="">
                                    </div>

                                </div>
                                 <div class="form-group row">
                                    <label for="person_responsible" class="col-sm-3 col-form-label">Reserved by</label>
                                    <div class="col-sm-9">
                                      <input   type="text" class="form-control" name="person_responsible" id="person_responsible" placeholder="Reserved by" required="">
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group m-b-0">
                            <div>
                                <button type="submit"  onclick="return confirm('Are you sure you want to Reserve this item?');" class="btn btn-primary waves-effect waves-light">
                                    Update
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
