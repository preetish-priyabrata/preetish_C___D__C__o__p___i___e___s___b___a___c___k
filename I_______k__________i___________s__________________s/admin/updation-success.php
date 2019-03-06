<?php 
session_start();
error_reporting(0);
if($_SESSION['updation_user_id'])
  {
?>
<style>
.alert-box {
    color:#555;
    border-radius:10px;
    font-family:Tahoma,Geneva,Arial,sans-serif;font-size:16px;
    padding:10px 10px 10px 36px;
    margin:10px;
}
.alert-box span {
    font-weight:bold;
    text-transform:uppercase;
}
.success {
    background:#e9ffd9 url('../Images/success-icon.png') no-repeat 10px 50%;
    border:1px solid #a6ca8a;
}
</style>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Kalinga Institute of Social Sciences</title>

        <link rel="stylesheet" type="text/css" href="../bootstrap/css/pastel-stream.css" />

        <link rel="stylesheet" type="text/css" href="../css/style_avi.css" />

        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>

        <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    </head>

    <body>

        <div class="container"> 



            <!-- sample templates start --> 



            <!-- Navbar -->

            <div class="row">

                <div class="col-lg-12">

                    <div class="navbar navbar-default navbar-fixed-top">

                        <div class="container">

                            <div class="col-lg-4 text-center"> <a class="" href="../studentStatus.html" target= "_blank"><img class="img-responsive img-thumbnail logo" src="../Images/left.png"></a> </div>

                            <div class="col-lg-4 wrapper text-center"> <span>Students / Family information sheet</span> </div>

                            <div class="col-lg-4 text-center"> <a class="" target= "_blank" href="http://achyutasamanta.com/"><img class="img-responsive img-thumbnail logo" src="../Images/sir2.jpg"></a> </div>

                        </div>

                    </div>

                </div>

            </div>

            <hr>

            <!-- Forms  -->

            <div class="row">

                <div class="col-lg-12">

                    <div class="page-header">

                        <h1 id="forms">
                        <div class="alert-box success"><span>success: </span>Successfully Updated...</div>
                            <span class="pull-right">
                                
                            </span>
                        </h1>

                    </div>

                </div>

            </div>

            <div class="row well">

                <div class="row">

                    <center><h2> <b><a href="update_registration_info.php">Click Here</a></b> to update student information.</h2></center>
                </div>

                <div class="clearfix" style="height:50px;"></div>

                <script type="text/javascript">

                    jQuery(function ($) {

                        $('[data-toggle="popover"]').popover();

                        $('[data-toggle="tooltip"]').tooltip();

                    });

                </script> 



                <!-- sample templates end --> 



            </div>

    </body>

</html>
<?php
}
?>