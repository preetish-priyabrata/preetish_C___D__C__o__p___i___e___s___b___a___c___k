<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Centre For Advanced Training</title>

        <!-- Styles -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,800" rel="stylesheet" type="text/css"><!-- Google web fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><!-- font-awesome -->
        <link href="js/dropdown-menu/dropdown-menu.css" rel="stylesheet" type="text/css"><!-- dropdown-menu -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Bootstrap -->
        <link href="js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"><!-- Fancybox -->
        <link href="js/audioplayer/audioplayer.css" rel="stylesheet" type="text/css"><!-- Audioplayer -->
        <link href="style.css" rel="stylesheet" type="text/css"><!-- theme styles -->

    </head>

    <body role="document">

        <!-- device test, don't remove. javascript needed! -->
        <span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span class="visible-lg"></span>
        <!-- device test end -->

        <div id="k-head" class="container"><!-- container + head wrapper -->

            <?php include './template-header.php'; ?>

        </div><!-- container + head wrapper end -->

        <div id="k-body"><!-- content wrapper -->

            <div class="container"><!-- container -->

                



                <div class="row no-gutter"><!-- row -->



                    <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->

                        <div class="col-padded"><!-- inner custom column -->

                            <div class="row gutter"><!-- row -->

                                <div class="col-lg-12 col-md-12">

                                    <h1 class="page-title">Certifications And Exams</h1><!-- category title -->

                                </div>

                            </div><!-- row end -->

                            <div class="row gutter"><!-- row -->

                                <div class="col-lg-12 col-md-12">

                                    <table class="table table-striped table-courses">
                                        <tbody>
                                            <tr>
                                                <td><a href="microsoft.php" title="Microsoft"><strong>Microsoft</strong></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="oracle.php" title="Oracle"><strong>Oracle</strong></a></td>                                                
                                            </tr>
                                            <tr>
                                                <td><a href="hp.php" title="HP"><strong>HP</strong></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="adobe.php" title="Adobe"><strong>Adobe</strong></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="autodesk.php" title="Autodesk"><strong>Autodesk</strong></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="dassult.php" title="Dassult Systems"><strong>Dassult Systems</strong></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="certiport.php" title="Certiport"><strong>Certiport</strong></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="ibm.php" title="Certiport"><strong>IBM</strong></a></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div><!-- row end --> 

                            <div class="row gutter"><!-- row -->

                                <div class="col-lg-12">

                                    <ul class="pagination pull-right"><!-- pagination -->
                                        <li class="disabled"><a href="#">Prev</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul><!-- pagination end -->

                                </div>

                            </div><!-- row end -->                 

                        </div><!-- inner custom column end -->

                    </div><!-- doc body wrapper end -->

                    <div class="col-lg-4 col-md-4" id="noticeBoard"><!-- misc wrapper -->
                        <?php
                        include './news-and-events.php';
                        ?> 
                    </div><!-- misc wrapper end -->

                </div><!-- row end -->

            </div><!-- container end -->

        </div><!-- content wrapper end -->

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