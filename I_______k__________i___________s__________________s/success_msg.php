<?php session_start();
error_reporting(0);
$file_name = $_FILES['file1']['name'];
$file_type = $_FILES['file1']['type'];
$tmp_file = $_FILES['file1']['tmp_name'];
move_uploaded_file($tmp_file, "upload/" . $file_name);
$stud_name = $_POST['name'];
$stud_dob = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['date'];
$stud_tribe = $_POST['tribe'];
if($stud_tribe=='scheduled'){
    $stud_tribe=$_POST['sch_tribes'];
}
 else {
    $stud_tribe=$_POST['prm_tribes'];
}
$parent_contact = $_POST['Pcontact'];
$stud_gender = $_POST['gender'];
$stud_standard = $_POST['standard'];
$stud_fname = $_POST['fatherName'];
$stud_mname = $_POST['motherName'];
$stud_village = $_POST['village'];
$stud_block = $_POST['block_name'];
$stud_district = $_POST['district_name'];
$stud_state = $_POST['state'];
$primary_earning = $_POST['erning_primary'];
$secondary_earning = $_POST['erning_secondary'];
$total_family_member = $_POST['total_member'];
$stud_ambition = $_POST['ambition'];
$gov_scheme = $_POST['scheme'];

$_SESSION['file_name'] = $file_name;
$_SESSION['name'] = $stud_name;
$_SESSION['dob'] = $stud_dob;
$_SESSION['tribe'] = $stud_tribe;
$_SESSION['Pcontact'] = $parent_contact;
$_SESSION['gender'] = $stud_gender;
$_SESSION['standard'] = $stud_file;
$_SESSION['standard'] = $stud_standard;
$_SESSION['father'] = $stud_fname;
$_SESSION['mother'] = $stud_mname;
$_SESSION['village'] = $stud_village;
$_SESSION['block'] = $stud_block;
$_SESSION['dist'] = $stud_district;
$_SESSION['state'] = $stud_state;
$_SESSION['primaryE'] = $primary_earning;
$_SESSION['secondaryE'] = $secondary_earning;
$_SESSION['fMember'] = $total_family_member;
$_SESSION['ambition'] = $stud_ambition;
$_SESSION['scheme'] = $gov_scheme[0];

if (empty($stud_name)) {
    header("location:dataentry-error.php");
}
?><html lang="en">    <head>        <meta charset="utf-8">        <meta name="viewport" content="width=device-width, initial-scale=1.0">        <title>Kalinga Institute of Social Sciences</title>        <link rel="stylesheet" type="text/css" href="bootstrap/css/pastel-stream.css" />        <link rel="stylesheet" type="text/css" href="css/style_avi.css" />        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>        <script>            function showTextarea(str) {
            var value = document.getElementById(str).value;
            if (value == 'others') {
                document.getElementById('textarea_' + str).style.display = 'block';
            } else {
                document.getElementById('textarea_' + str).style.display = 'none';
            }
        }
        function showTextBox(distance) {
            var dist = document.getElementById(distance).value;
            if (dist == 4 || dist == 5 || dist == 'others') {
                document.getElementById('distance').style.display = 'block';
            } else {
                document.getElementById('distance').style.display = 'none';
            }
        }
        function scrolTop() {                var bodyRect = document.body.getBoundingClientRect(); // Y- Offset from top                var duration = 750;                event.preventDefault();                jQuery(' html , body ').animate({scrollTop: 0}, duration);                return false;            }            jQuery(document).ready(function () {                $('.nav-tabs-top a[data-toggle="tab"]').on('click', function () {                    $('.nav-tabs-bottom li.active').removeClass('active')                    $('.nav-tabs-bottom a[href="' + $(this).attr('href') + '"]').parent().addClass('active');                });                $('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function () {                    $('.nav-tabs-top li.active').removeClass('active')                    $('.nav-tabs-top a[href="' + $(this).attr('href') + '"]').parent().addClass('active');                });            });        </script>    </head>    <body>        <div class="container">             <!-- sample templates start -->             <!-- Navbar -->            <div class="row">                <div class="col-lg-12">                    <div class="navbar navbar-default navbar-fixed-top">                        <div class="container">                            <div class="col-lg-4 text-center"> <a class="" href="studentStatus.html" target= "_blank"><img class="img-responsive img-thumbnail logo" src="Images/left.png"></a> </div>                            <div class="col-lg-4 wrapper text-center"> <span>Students / Family information sheet</span> </div>                            <div class="col-lg-4 text-center"> <a class="" target= "_blank" href="http://achyutasamanta.com/"><img class="img-responsive img-thumbnail logo" src="Images/sir2.jpg"></a> </div>                        </div>                    </div>                </div>            </div>            <hr>            <!-- Forms  -->            <div class="row">                <div class="col-lg-12">                    <div class="page-header">                        <h1 id="forms">Registration Result                             <span class="pull-right">                                <span class="pull-right">                                    <a href="report.php" class="btn btn-primary">Go to reports</a>                                    &nbsp;                                    <a href="logout.php" class="btn btn-primary">Logout</a>                                </span>                            </span>                        </h1>                    </div>                </div>            </div>            <div class="row well">                <div class="row">                    <div class="col-lg-12" id="error-container">                        <div class="alert alert-dismissable alert-danger">                            <button type="button" class="close" data-dismiss="alert">&times;</button>                            <strong id="error"></strong> </div>                    </div>                    <div class="col-lg-12" id="success-container">                        <div class="alert alert-dismissable alert-success">                            <button type="button" class="close" data-dismiss="alert">&times;</button>                            <strong id="success"></strong> </div>                    </div>                    <div class="col-lg-12" id="info-container">                        <div class="alert alert-dismissable alert-info">                            <button type="button" class="close" data-dismiss="alert">&times;</button>                            <strong id="info"></strong> </div>                    </div>                </div>                <center><h1> <b>Student Name</b> Registered Successfully !</h1></center>            </div>            <div class="clearfix" style="height:50px;"></div>            <script type="text/javascript">                jQuery(function ($) {                    $('[data-toggle="popover"]').popover(); $('[data-toggle="tooltip"]').tooltip(); });</script>             <!-- sample templates end -->         </div>    </body></html>