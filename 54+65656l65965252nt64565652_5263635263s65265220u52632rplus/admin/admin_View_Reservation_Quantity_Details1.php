<?php
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Reservation Quantity Details";
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
                            <li class="breadcrumb-item active">View Reservation Quantity Details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">View Reservation Quantity Details</h4>
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
                        <h4 class="header-title">View Reservation Quantity Details</h4>
                    </div>                   
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr id="filters">
                                        <th>Material Code</th>
                                        <th>Material Description</th>
                                        <th>UOM</th>
                                        <th>Reserved Job code</th>
                                        <th>Reserved Quantity</th>
                                        <th>Reserved on</th>
                                        <th>Reserved By</th>
                                        <th>Reserved Id</th>
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // `slno`, `status`, `date`, `Material_code`, `Material_Description`, `UOM`, `Reserved_Job_Code`, `Reserved_Quantity`, `Reserved_On_Date`, `Reserved_By`, `slno_surplus_id`
                                        $get_details="SELECT * FROM `ilab_reservation_master` where `transfer_status`!=1";
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
                                         <td>Reserved001-<?=$result_details['slno']?></td>
                                        <!-- <td> 
                                            <a class="btn btn-primary" href="admin_update_reserve_entry.php?ids=<?=preetishweb_encryptIt($result_details['slno_surplus'])?>">Edit</a>
                                            <br> 
                                            <a class="btn btn-warning" href="admin_delete_reserve_entry.php?tri=<?=preetishweb_encryptIt($result_details['slno_surplus'])?>"> Delete Material</a>
                                        </td> -->

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
    // $(document).ready(function(){
        // $("#datatable").DataTable();
        // var a=$("#datatable-buttons").DataTable({lengthChange:!1,buttons:["copy","excel","pdf","colvis"]});
        // a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
    // });
</script>

<script type="text/javascript">
    $(document).ready(function(){ 
     var a=$('#datatable-buttons').DataTable({
                            responsive: true,
                            ordering: false,
                            
                            initComplete: function () {
                                this.api().columns().every(function () {
                                    var column = this;

                                    var select = $('<select><option value=""></option></select>')
                                        .appendTo($("#filters").find("th").eq(column.index()))
                                        .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val());                                     

                                        column.search(val ? '^' + val + '$' : '', true, false)
                                            .draw();
                                    });

                                    console.log(select);

                                    column.data().unique().sort().each(function (d, j) {
                                        $(select).append('<option value="' + d + '">' + d + '</option>')
                                    });
                                });
                            },
                            lengthChange:!1,buttons:["copy","excel","pdf","colvis"]
                        });
     a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
});
</script>