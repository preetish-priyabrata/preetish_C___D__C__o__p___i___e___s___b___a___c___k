<?php
$queryModule = "SELECT * FROM `tbl_program_module`,`tbl_program` WHERE tbl_program_module.`program_id` = '$program' "
        . "AND tbl_program_module.`program_id` = tbl_program.`program_id`";
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

                            <h1 class="page-title"><?php echo $rowModule['program_name']; ?></h1><!-- category title -->

                        </div>

                    </div>
                    <?php
                }
                ?>
                <div class = "panel panel-default">
                    <div class = "panel-heading">
                        <h4 class = "panel-title">
                            <a href = "#collapse<?php echo $row; ?>" data-parent = "#accordion" data-toggle = "collapse" class = "accordion-toggle">
                                <?php echo $rowModule['module_name']; ?>
                            </a>
                        </h4>
                    </div>
                    <div class = "panel-collapse collapse" id = "collapse<?php echo $row; ?>">
                        <div class = "panel-body">
                            <p>
                                <?php echo nl2br($rowModule['module_description']); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <?php
                $row ++;
            }
            ?>
        </div>
    </div>
    <?php
}


