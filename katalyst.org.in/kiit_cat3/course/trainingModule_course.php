<?php
$queryModule = "SELECT * FROM `tbl_course_module`,`tbl_course` WHERE tbl_course_module.`course_id` = '$program' "
        . "AND tbl_course_module.`course_id` = tbl_course.`sl_no`";
$resModule = mysqli_query($con, $queryModule);
$rowsModule = mysqli_num_rows($resModule);
if ($rowsModule) {
    ?>
    <div id="content" class="clearfix">
        <!-- title -->
        <!-- page-content -->
        <div id="page-content">
            <?php
            $row = 1;
            while ($rowModule = mysqli_fetch_array($resModule)) {
                if ($row == 1) {
                    ?>
                    <div class="row gutter"><!-- row -->

                        <div class="col-lg-12 col-md-12">

                            <h1 class="page-title"><?php echo $rowModule['course_name']; ?></h1><!-- category title -->

                        </div>

                    </div>
                    <div class="panel-group" id="accordion">
                   
                    <?php
                }
                ?>
                     <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row; ?>"><?php echo $rowModule['module_name']; ?><span class="pull-right"><?php echo $rowModule['no_session_module']; ?> Session</span></a>
                          </h4>
                        </div>
                        <div id="collapse<?php echo $row; ?>" class="panel-collapse collapse ">
                            <div class="panel-body">
                               <?php echo nl2br($rowModule['module_description']); ?>
                             </div>
                        </div>
                    </div> 


                

                <?php
                $row ++;
            }
            ?>

                </div>
        </div>
    </div>
    <?php
}


