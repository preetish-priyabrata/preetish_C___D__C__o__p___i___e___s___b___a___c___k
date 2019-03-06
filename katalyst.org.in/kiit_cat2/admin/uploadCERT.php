<?php

session_start();
ob_start();
if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
$title="Upload Certificate";
?>

<!--Page Header-->
    <div class="header">
        <div class="header-content">
            <div class="page-title"><i class="icon-display4"></i>Upload Certificate</div>
            <ul class="breadcrumb">
                <li><a href="admin_dashboard.php"></a></li>
                <li class="active"><a href="#"></a>Upload Certificate</li>
                
            </ul>
        </div>
    </div>
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <?php $msg->display(); ?>
            </div>
        </div>
    </div>
    <!-- /Page Header-->
 <div class="container-fluid page-content">
    <div class="row">
      <div class="col-md-12 col-sm-12">
          <!-- Basic inputs -->
         <div class="panel panel-default">
           <div class="panel-heading">
             <div class="panel-title">Upload Certificate</div>
               </div>
                 <div class="panel-body">
                   <form name="myFunction" class="form-horizontal" action="save_certificate_csv.php" enctype="multipart/form-data" autocomplete="off" method="POST">                      
                        <div class="form-group">
                            <label class="control-label col-lg-4 text-right"> <strong>Please select a file </strong></label>
                            <div class="col-lg-8">
                                 <input type="file" class="form-control" name="upload_certificate" id="notice_doc"  class="upload" required="" />
                                  <br>
                                  <a href="tbl_certificate(1).csv" download>Download Sample</a>
                            </div>
                        </div>
                       <div class="form-group pull-right">
                     <input type="submit" class="btn btn-info"  name="upload" value="Save" onclick="myFunction()">
                   </div>
                 </form>
               </div>
             </div>                     
           </div>
         </div>
       </div>



<?php
}else{
    header('Location:logout.php');
    exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';
?>
 