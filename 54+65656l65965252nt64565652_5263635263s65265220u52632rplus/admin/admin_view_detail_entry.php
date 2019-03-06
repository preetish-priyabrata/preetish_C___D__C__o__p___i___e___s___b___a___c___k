<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Transfered Material Detail ";
    // Array ( [ids] => 93Z/d1ygfbtPCPZ0WGuQwDDYiDCFkSlW29n6UYHfRrg= ) 
    $slno=preetishweb_decryptIt(str_replace(" ", "+", $_GET['tri'])); //zmr_slno

    $get_material="SELECT * FROM `ilab_master_field_surplus_material` WHERE `slno_surplus`='$slno'";
    $sql_exe=mysqli_query($conn,$get_material);
    $get_fetch_material=mysqli_fetch_assoc($sql_exe);
?>
<!-- DataTables -->
        <link href="../assert/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assert/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../assert/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="#">View Transfer Details</a></li>
                            <li class="breadcrumb-item active">View Transfered Material Detail </li>
                        </ol>
                    </div>
                    <h4 class="page-title">View Transfered Material Detail  </h4>
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
                        <h4 class="header-title">View Transfered Material Detail </h4>
                    </div>
                     <!-- // `slno_surplus`, `surplus_job_code`, `job_description`, `material_code`, `material_description`, `quantity_available_surplus`, `surplus_declared_date`, `unit_rate`, `amount`, `uom`, `product_group`, `person_responsible`, `total_qnty`, `status`, `entry_id`, `update_status`, `date_entry` -->
                    <form action="#" method="get">
                        <input value="<?=$slno?>" type="hidden" name="slno_surplus">
                    <div class="card-body">

                                <!-- <h4 class="mt-0 header-title">Justify Tabs</h4>
                                <p class="text-muted m-b-30 font-14">Use the tab JavaScript plugin—include
                                    it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                                    file—to extend our navigational tabs and pills to create tabbable panes
                                    of local content, even via dropdown menus.</p> -->

                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">Surplus View</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">Reserved View</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab">Transfer View</a>
                                    </li>
                                    <!-- <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#settings-1" role="tab">Settings</a>
                                    </li> -->
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                        <div class="table-responsive">
                                            <table id="" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Surplus Job Code</th>
                                                        <th>Job Description </th>
                                                        <th>Material Code</th>
                                                        <th>Material Description</th>
                                                        <th>UOM</th>
                                                        <th>Surplus Quantity Available</th>
                                                        <th>Balance Quantity Available</th>
                                                        <th>Surplus Declared</th>
                                                        <th>Unit Rate</th>
                                                        <th>Amount</th>
                                                        <th>Product Group</th>
                                                        <th>Person Responsible</th>
                                                        <th>Internal Remarks</th>
                                                        
                                                    </tr>
                                                </thead>
                                            <tbody>
                                                
                                                <tr>
                                                    <td><?=$get_fetch_material['surplus_job_code']?></td>
                                                    <td><?=$get_fetch_material['job_description']?></td>
                                                    <td><?=$get_fetch_material['material_code']?></td>
                                                    <td><?=$get_fetch_material['material_description']?></td>
                                                    <td><?=$get_fetch_material['uom']?></td>
                                                     <td><?=$get_fetch_material['total_qnty']?></td>
                                                    <td><?=$get_fetch_material['quantity_available_surplus']?></td>
                                                    <td><?=$get_fetch_material['surplus_declared_date']?></td>
                                                    <td><?=$get_fetch_material['unit_rate']?></td>
                                                    <td><?php echo $get_fetch_material['unit_rate']* $get_fetch_material['quantity_available_surplus']?></td>
                                                    <td><?=$get_fetch_material['product_group']?></td>
                                                    <td><?=$get_fetch_material['person_responsible']?></td>
                                                    <td><?=$get_fetch_material['Internal_Remarks']?></td>
                                                    
                                                </tr>
                                                   
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                        <div class="table-responsive">
                                            <table id="" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr id="filters">
                                                        <th>Material Code</th>
                                                        <th>Material Description</th>
                                                        <th>UOM</th>
                                                        <th>Reserved Job code</th>
                                                        <th>Reserved Quantity</th>
                                                        <th>Reserved on</th>
                                                        <th>Reserved By</th>
                                                       
                                                        <!-- <th></th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    // `slno`, `status`, `date`, `Material_code`, `Material_Description`, `UOM`, `Reserved_Job_Code`, `Reserved_Quantity`, `Reserved_On_Date`, `Reserved_By`, `slno_surplus_id`
                                                        $get_details="SELECT * FROM `ilab_reservation_master` where `slno_surplus_id`='$slno'";
                                                        $sql_get_details=mysqli_query($conn,$get_details);
                                                        while ($result_details=mysqli_fetch_assoc($sql_get_details)){
                                                        

                                                    ?>
                                                    <tr>
                                                        <td><?=$result_details['Material_code']?></td>
                                                        <td><?=$result_details['Material_Description']?></td>
                                                        <td><?=$result_details['UOM']?></td>
                                                        <td><?=$result_details['Reserved_Job_Code']?></td>
                                                        <td><?=$result_details['Reserved_Quantity']?></td>
                                                        <td><?=$result_details['Reserved_On_Date']?></td>
                                                        <td><?=$result_details['Reserved_By']?></td>
                                                    </tr>
                                                       <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-3" id="messages-1" role="tabpanel">
                                        <div class="table-responsive">
                                            <table id="" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr id="filters">
                                                        <th>Material Code</th>
                                                        <th>Material Description</th>
                                                        <th>UOM</th>
                                                        <th>Transfer Job code</th>
                                                        <th>Tranfer Quantity</th>
                                                        <th>Stock Transfer EMR No</th>
                                                        <th>Transfer Doc No</th>
                                                       
                                                        <!-- <th></th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    // `slno`, `status`, `date`, `Material_code`, `Material_Description`, `UOM`, `Reserved_Job_Code`, `Reserved_Quantity`, `Reserved_On_Date`, `Reserved_By`, `slno_surplus_id` `qnty_transfer`, `stock_transfer_emr_no`, `transfer_doc_no`
                                                        $get_details="SELECT * FROM `ilab_reservation_master` where `transfer_status`='1' and `slno_surplus_id`='$slno'";
                                                        $sql_get_details=mysqli_query($conn,$get_details);
                                                        while ($result_details=mysqli_fetch_assoc($sql_get_details)){
                                                        

                                                    ?>
                                                    <tr>
                                                        <td><?=$result_details['Material_code']?></td>
                                                        <td><?=$result_details['Material_Description']?></td>
                                                        <td><?=$result_details['UOM']?></td>
                                                        <td><?=$result_details['Reserved_Job_Code']?></td>
                                                        <td><?=$result_details['qnty_transfer']?></td>
                                                        <td><?=$result_details['stock_transfer_emr_no']?></td>
                                                        <td><?=$result_details['transfer_doc_no']?></td>
                                                    </tr>
                                                       <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                            art party before they sold out master cleanse gluten-free squid
                                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                            art party locavore wolf cliche high life echo park Austin. Cred
                                            vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                            farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                            mustache readymade thundercats keffiyeh craft beer marfa
                                            ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                            vegan.
                                        </p>
                                    </div>
                                </div>

                            </div>
                    <div class="card-footer">
                        <div class="form-group m-b-0">
                            <div>
                                
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
<!-- Required datatable js -->
        <script src="../assert/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assert/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../assert/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../assert/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../assert/assets/plugins/datatables/jszip.min.js"></script>
        <script src="../assert/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="../assert/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="../assert/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="../assert/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="../assert/assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="../assert/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../assert/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('table.display').DataTable();
} );
</script>