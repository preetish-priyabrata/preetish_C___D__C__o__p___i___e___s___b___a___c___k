<?php

session_start();
ob_start();
if($_SESSION['admin_tech']){
    include  '../config.php';
    require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Officer";
?>
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
    </div>
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- Basic inputs -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Message Notification</div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="message_not_send" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-lg-4 text-right">Message Subject</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="message_subject" placeholder="Enter Message Subject" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4 text-right">Message Detail</label>
                                <div class="col-lg-8">
                                    <textarea name="text_message" cols="100" rows="10" id="text_message" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4 text-right">Attach CSV</label>
                                <div class="col-lg-8">
                                   <input type="file" class="form-control" name="upload_certificate" id="notice_doc"  class="upload" required="" />
                                  <br>
                                  <a href="tbl_message(1).csv" download>Download Sample</a>
                                </div>
                            </div>
                            <div class="form-group pull-right">
                                
                                <input type="submit" class="btn btn-info" name="upload"  value="Send"  >
                            </div>
                        </form>
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

