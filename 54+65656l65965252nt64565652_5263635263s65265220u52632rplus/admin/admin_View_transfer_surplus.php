<?php
session_start();
ob_start();
if($_SESSION['email_id']){
    include 'webconfig/config.php';
    require 'FlashMessages.php';
    $msg = new \Preetish\FlashMessages\FlashMessages();
    $title="View Transfer Details ";
?>
<!-- DataTables -->
        <link href="../assert/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assert/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../assert/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<div class="wrapper" >
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Main Menu </a></li>
                            <li class="breadcrumb-item active">View Transfer Details </li>
                        </ol>
                    </div>
                    <h4 class="page-title">View Transfer Details </h4>
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
                        <h4 class="header-title">View Transfer Details  Table</h4>
                    </div>                   
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Surplus Job Code</th>
                                        <th>Material Code</th>
                                        <th>UOM</th>
                                        <th>Surplus Quantity Available</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // `slno_surplus`, `surplus_job_code`, `job_description`, `material_code`, `material_description`, `quantity_available_surplus`, `surplus_declared_date`, `unit_rate`, `amount`, `uom`, `product_group`, `person_responsible`, `total_qnty`, `status`, `entry_id`, `update_status`, `date_entry`
                                        $get_details="SELECT * FROM `ilab_master_field_surplus_material` WHERE `status`!='2' and `update_status`='1'";
                                        $sql_get_details=mysqli_query($conn,$get_details);
                                        while ($result_details=mysqli_fetch_assoc($sql_get_details)){
                                        

                                    ?>
                                    <tr>
                                        <td><?=$result_details['surplus_job_code']?></td>
                                        <td><?=$result_details['material_code']?></td>
                                        <td><?=$result_details['uom']?></td>
                                        <td><?=$result_details['quantity_available_surplus']?></td>
                                        <td><a class="btn btn-info" href="admin_view_detail_entry.php?tri=<?=preetishweb_encryptIt($result_details['slno_surplus'])?>"> Click View Details</a></td>
                                    </tr>
                                       <?php }?>
                                </tbody>
                            </table>
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

        <!-- Datatable init js -->
        <!-- <script src="../assert/assets/pages/datatables.init.js"></script> -->
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
