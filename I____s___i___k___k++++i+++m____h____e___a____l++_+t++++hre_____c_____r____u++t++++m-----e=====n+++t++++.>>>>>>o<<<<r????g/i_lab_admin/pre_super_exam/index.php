<?php
session_start();
ob_start();
if($_SESSION['admin_Pre_tech_s']){
    include  '../config.php';
    require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of HeadQuarter Officer";
    $qry_exam_driver="SELECT * FROM `ilab_group_candidate_info` WHERE `paid_status`='1' and `group_id_slno`='1' ";
    $qry_exam_driver=mysqli_query($conn, $qry_exam_driver);
    $num_rows_driver=mysqli_num_rows($qry_exam_driver);
     $qry_exam_group="SELECT * FROM `ilab_group_candidate_info` WHERE `paid_status`='1' and `group_id_slno`='2' ";
    $qry_exam_group=mysqli_query($conn, $qry_exam_group);
    $num_rows_group=mysqli_num_rows($qry_exam_group);


?>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!--Page Header-->
    <div class="header">
        <div class="header-content">
            <div class="page-title"><i class="icon-display4"></i> Dashboard</div>
            <ul class="breadcrumb">
                <li><a href="#"></a></li>
                <!-- <li class="active">Dashboards</li> -->
            </ul>
        </div>
    </div>
    <!-- /Page Header-->
    <div class="container-fluid page-content">
        <div class="row">
        <?php $msg->display(); ?>
            
        </div>
         <div class="row">
            <div class="col-md-4 col-sm-6 pull-right ">
                <div class="panel panel-flat">
                    <div class="wrapper clearfix show">
<!--                         <div class="clock" id="clock"></div>
                        <div class="clock" id="clock1"></div> -->
                        <div class="clock" id="clock2"></div>
                    </div>
                  <!-- <div id="my-calendar"></div>              -->
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-flat border-none">
                    <div class="panel-body p-b-10">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <label style="font-size: 24px;"><i class="fa fa-ambulance" style="color: lightblue"></i> <!-- <span id="driver"></span> --> <b><?=$num_rows_driver?></b></label>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                Candidate For Driver Post
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4 col-sm-6">
                <div class="panel panel-flat border-none">
                    <div class="panel-body p-b-10">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <label style="font-size: 24px;"><i class="fa fa-ambulance" style="color: lightblue"></i> <!-- <span id="driver"></span> --><b><?=$num_rows_group?></b>
                                 </label>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                Candidate For Group D Post
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




<?php
}else{
    header('Location:logout');
    exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
<script src="../asserts/lib/js/extensions/moment.min.js"></script>
<script src="../asserts/lib/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="../asserts/lib/js/pages/extensions/extension_fullcalendar.js"></script>
<script src="calender.js"></script>
<script>

    var clock = $("#clock").clock(),
        data = clock.data('clock');

    // data.pause();
    // data.start();
    // data.setTime(new Date());

    var d = new Date();
    d.setHours(<?=date('H')?>);
    d.setMinutes(<?=date('i')?>);
    d.setSeconds(<?=date('s')?>);

    var clock1 = $("#clock1").clock({
        theme: 't2',
        date: d
    });

    var clock2 = $("#clock2").clock({
        theme: 't3',
        // clock width
        width: 340,
        // clock height

        height: 450,
        date: d
    });

</script>
