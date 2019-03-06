<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Centre For Advanced Training</title>

        <!-- Styles -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,800" rel="stylesheet" type="text/css">
        <!-- Google web fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- font-awesome -->
        <link href="js/dropdown-menu/dropdown-menu.css" rel="stylesheet" type="text/css">
        <!-- dropdown-menu -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap -->
        <link href="js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css">
        <!-- Fancybox -->
        <link href="js/audioplayer/audioplayer.css" rel="stylesheet" type="text/css">
        <!-- Audioplayer -->
        <link href="style.css" rel="stylesheet" type="text/css">
        <!-- theme styles -->

    </head>

    <body role="document">

        <!-- device test, don't remove. javascript needed! --> 
        <span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span class="visible-lg"></span> 
        <!-- device test end -->

        <div id="k-head" class="container"><!-- container + head wrapper -->

            <?php include './template-header.php'; ?>
        </div>
        <!-- container + head wrapper end -->

        <div id="k-body"><!-- content wrapper -->

            <div class="container"><!-- container -->

                <div class="row no-gutter"><!-- row -->

                    <div class="col-lg-8 col-md-8" ><!-- doc body wrapper -->

                        <div class="col-padded" style="min-height: 660px"><!-- inner custom column -->

                            <div class="row gutter"><!-- row -->

                                <div class="col-lg-12 col-md-12">
                                    <h1 class="page-title">Notice</h1>
                                    <!-- category title --> 

                                </div>
                            </div>
                            <!-- row end -->

                            <div class="row gutter"><!-- row -->

                                <div class="col-lg-12 col-md-12">
                                    <div class="col-padded col-naked">
                                        <ul class="list-unstyled clear-margins">
                                            <!-- widgets -->

                                            <li class="widget-container widget_recent_news"><!-- widgets list -->

                                                <ul class="list-unstyled list-downloads"><!-- downloads list -->
                                                    <?php
                                                    include_once"conf.php";
                                                    $query = "SELECT * FROM `tbl_notice` WHERE `upload_type` = 'Notice' AND `notice_status` = '1'  ORDER BY notice_id DESC ";
                                                    $res = mysqli_query($con, $query);
                                                    ?>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        ?>
                                                        <li>
                                                            <i class="fa fa-cloud-download"></i>
                                                            <a href="<?php echo "../kiit_cat2/" . $row['notice_doc']; ?>" download title="Notice" class="download-link">
                                                                <span class="dwnld-title"><?php echo $row['notice_subject']; ?></span>
                                                                <span class="help-block"><?php echo $row['notice_date']; ?></span>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->
                        </div>
                        <!-- inner custom column end --> 

                    </div>
                    <!-- doc body wrapper end -->

                    <div class="col-lg-4 col-md-4" id="noticeBoard"><!-- misc wrapper -->
                        <?php
                        include './news-and-events.php';
                        ?>
                    </div>
                    <!-- misc wrapper end --> 

                </div>
                <!-- row end --> 

            </div>
            <!-- container end --> 

        </div>
        <!-- content wrapper end -->

        <div id="template-footer">
            <?php include './template-footer.php'; ?>
        </div>

        <!-- jQuery --> 
        <script src="jQuery/jquery-2.1.1.min.js"></script> 
        <script src="jQuery/jquery-migrate-1.2.1.min.js"></script> 

        <!-- Bootstrap --> 
        <script src="bootstrap/js/bootstrap.min.js"></script> 

        <!-- Drop-down --> 
        <script src="js/dropdown-menu/dropdown-menu.js"></script> 

        <!-- Fancybox --> 
        <script src="js/fancybox/jquery.fancybox.pack.js"></script> 
        <script src="js/fancybox/jquery.fancybox-media.js"></script><!-- Fancybox media --> 

        <!-- Responsive videos --> 
        <script src="js/jquery.fitvids.js"></script> 

        <!-- Audio player --> 
        <script src="js/audioplayer/audioplayer.min.js"></script> 

        <!-- Pie charts --> 
        <script src="js/jquery.easy-pie-chart.js"></script> 

        <!-- Google Maps --> 
        <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script> 

        <!-- Theme --> 
        <script src="js/theme.js"></script>
    </body>
</html>