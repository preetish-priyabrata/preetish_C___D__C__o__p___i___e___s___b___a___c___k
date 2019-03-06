<?php
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="Bulk Entry Reservation Quantity To Transfer";
?>
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
                            <!-- <li class="breadcrumb-item"><a href="#">Entry Of Surplus Material</a></li> -->
                            <li class="breadcrumb-item active">Bulk Entry Reservation Quantity To Transfer</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Bulk Entry Reservation Quantity To Transfer </h4>
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
                        <h4 class="header-title">Bulk Entry Reservation Quantity To Transfer Form</h4>
                    </div>
                    <form action="admin_View_Reservation_Quantity_transfer_form_save.php" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="csv_id" class="col-sm-2 col-form-label">Upload File</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="Artisanal kale" id="csv_id" name="csv_id" type="file" required=""><br>
                                <a href="tbltransfer.csv" download>Download Sample</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Upload_name" class="col-sm-2 col-form-label">Upload By</label>
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="Upload By" id="Upload_name" type="text" name="Upload_name" required="">
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
