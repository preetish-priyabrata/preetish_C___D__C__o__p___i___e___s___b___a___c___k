<?php
// print_r($_GET);
// exit;
session_start();
ob_start();
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$title="View Transfered Quantity Details";
    // Array ( [file] => 2018-05-19_023644_tbltransfer(1).csv )
    $file=$_GET['file'];
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
                            <li class="breadcrumb-item"><a href="admin_View_Reservation_Quantity_transfer_form.php"> Bulk Entry Reservation Quantity To Transfer</a></li>
                           
                            <li class="breadcrumb-item active">View Transfered Quantity Details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">View Transfered Quantity Details</h4>
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
                        <h4 class="header-title">View Transfered Quantity Details</h4>
                    </div>                   
                    <div class="card-body">
                        <!-- Nav tabs -->
                                <!-- <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#home-1" role="tab" aria-selected="false">Home</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab" aria-selected="false">Profile</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab" aria-selected="false">Messages</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active show" data-toggle="tab" href="#settings-1" role="tab" aria-selected="true">Settings</a>
                                    </li>
                                </ul> -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Material Code</th>
                                        <th>Tranferred to Job Code</th>
                                        <th>Stock Transfer EMR No</th>
                                        <th>Transfer Document Number</th>
                                        <th>Qty Transferred</th>
                                        <th>Reserved Id</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>


                          <?php   
                          $row=0;
                            $targetDir="upload_transfer";
                            if (($handle = fopen("$targetDir/".$file, "r")) !== FALSE) {
                                while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {     
                                    if($row == 0){ 
                                        $row++; 
                                    } else {
                                        $Material_Code=$data[0]; //Material Code
                                        $Tranferred_to_Job_Code=$data[1]; //Tranferred to Job Code
                                        $Stock_Transfer_EMR_No=$data[2]; //Stock Transfer EMR No
                                        $Transfer_Document_Number=$data[3]; //Transfer Document Number
                                        $Qty_Transferred=$data[4]; //Qty Transferred
                                        $id=$data[5];
                                        $Reserved_Id=(str_split($data[5],12));
                                        // $data[5];//Reserved Id
                                        $slno=$Reserved_Id[1];
                                        $get_checked="SELECT * FROM `ilab_reservation_master` WHERE `slno`='$slno' and`Material_code`='$Material_Code' and`Reserved_Job_Code`='$Tranferred_to_Job_Code'";
                                        $sql_exe=mysqli_query($conn,$get_checked);
                                        $num_rows=mysqli_num_rows($sql_exe);
                                        if($num_rows==1){
                                            echo "<tr> <td>".$Material_Code ."</td><td>".$Tranferred_to_Job_Code ."</td><td>".$Stock_Transfer_EMR_No."</td><td>".$Transfer_Document_Number."</td><td>".$Qty_Transferred."</td><td>".$id ."</td><td> SuccessFull Inserted</td></tr>";
                                        }else{
                                             echo $Material_Code ."</td><td>".$Tranferred_to_Job_Code ."</td><td>".$Stock_Transfer_EMR_No."</td><td>".$Transfer_Document_Number."</td><td>".$Qty_Transferred."</td><td>".$id ."</td><td>  Unable To Insert Not Finding Reserved Id ".$id ."</td></tr>";
                                        }

                                    }
                                }
                            }
                            ?>
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
   $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ]
    } );
} );
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