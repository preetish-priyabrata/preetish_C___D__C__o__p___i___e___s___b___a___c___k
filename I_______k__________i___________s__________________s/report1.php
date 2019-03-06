<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {
    header("location:dataentry-error.php");
}if (!empty($_SESSION['file_name'])) {
    $profile_pic = 'upload/' . $_SESSION['file_name'];
} else {
    $profile_pic = 'Images/default-profile-pic.png';
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
        function scrolTop() {                var bodyRect = document.body.getBoundingClientRect(); // Y- Offset from top                var duration = 750;                event.preventDefault();                jQuery(' html , body ').animate({scrollTop: 0}, duration);                return false;            }            jQuery(document).ready(function () {                $('.nav-tabs-top a[data-toggle="tab"]').on('click', function () {                    $('.nav-tabs-bottom li.active').removeClass('active')                    $('.nav-tabs-bottom a[href="' + $(this).attr('href') + '"]').parent().addClass('active');                });                $('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function () {                    $('.nav-tabs-top li.active').removeClass('active')                    $('.nav-tabs-top a[href="' + $(this).attr('href') + '"]').parent().addClass('active');                });            });        </script>    </head>    <body>        <div class="container">             <!-- sample templates start -->             <!-- Navbar -->            <div class="row">                <div class="col-lg-12">                    <div class="navbar navbar-default navbar-fixed-top">                        <div class="container">                            <div class="col-lg-4 text-center"> <a class="" href="studentStatus.html" target= "_blank"><img class="img-responsive img-thumbnail logo" src="Images/left.png"></a> </div>                            <div class="col-lg-4 wrapper text-center"> <span>Students / Family information sheet</span> </div>                            <div class="col-lg-4 text-center"> <a class="" target= "_blank" href="http://achyutasamanta.com/"><img class="img-responsive img-thumbnail logo" src="Images/sir2.jpg"></a> </div>                        </div>                    </div>                </div>            </div>            <hr>            <!-- Forms  -->            <div class="row">                <div class="col-lg-12">                    <div class="page-header">                        <h1 id="forms">Report                             <span class="pull-right">                                <span class="pull-right">                                    <a href="registration.php" class="btn btn-primary">Back To Data Entry</a>                                    &nbsp;                                    <a href="logout.php" class="btn btn-primary">Logout</a>                                </span>                            </span>                        </h1>                    </div>                </div>            </div>            <div class=" panel panel-default" style="padding:15px">                <div class="row">                    <div class="col-lg-12">                        <div class="col-lg-4">                            <div class="panel">                                <div class="panel-body form-horizontal">                                    <div class="form-group">                                        <label for="Name" class="col-sm-3">Student Name</label>                                        <div class="col-sm-9">                                            <span><?php echo $_SESSION['name']; ?></span>                                        </div>                                    </div>                                    <div class="form-group">                                        <label for="description" class="col-sm-3">Date of Birth</label>                                        <div class="col-sm-9">                                            <?php echo $_SESSION['dob']; ?>                                        </div>                                    </div>                                     <div class="form-group">                                        <label for="description" class="col-sm-3">Sex</label>                                        <div class="col-sm-9">                                            <?php echo $_SESSION['gender']; ?>                                        </div>                                    </div>                                     <div class="form-group">                                        <label for="contact" class="col-sm-3">Contact No</label>                                        <div class="col-sm-9">                                            <?php echo $_SESSION['Pcontact']; ?>                                        </div>                                    </div>                                     <div class="form-group">                                        <label for="amount" class="col-sm-3">Name of tribe</label>                                        <div class="col-sm-9">                                            <?php echo $_SESSION['tribe']; ?>                                        </div>                                    </div>                                    <div class="form-group">                                        <label for="amount" class="col-sm-3">Class</label>                                        <div class="col-sm-9">                                            <?php echo $_SESSION['standard']; ?>                                        </div>                                    </div>                                </div>                            </div>                                            </div>                        <div class="col-lg-4">                            <div class="panel">                                <div class="panel-body form-horizontal">                                    <div class="form-group">                                        <label for="Name" class="col-sm-3">Father's Name</label>                                        <div class="col-sm-9">                                            <span><?php echo $_SESSION['father']; ?></span>                                        </div>                                    </div>                                    <div class="form-group">                                        <label for="description" class="col-sm-3">Mother's Name</label>                                        <div class="col-sm-9">                                            <?php echo $_SESSION['mother']; ?>                                        </div>                                    </div>                                     <div class="form-group">                                        <label for="contact" class="col-sm-3">Village</label>                                        <div class="col-sm-9">                                            <?php echo $_SESSION['village']; ?>                                        </div>                                    </div>                                     <div class="form-group">                                        <label for="amount" class="col-sm-3">Block</label>                                        <div class="col-sm-9">                                            <?php echo $_SESSION['block']; ?>                                        </div>                                    </div>                                    <div class="form-group">                                        <label for="amount" class="col-sm-3">District</label>                                        <div class="col-sm-9">                                            <?php echo $_SESSION['dist']; ?>                                        </div>                                    </div>                                </div>                            </div>                                            </div>                        <div class="col-lg-4 text-center"><img src="<?php echo $profile_pic; ?>" class="img-thumbnail"></div>                    </div>                </div>                <div class="clearfix spacer5"></div>                <div class="row">	                    <div class="col-sm-12 col-md-12 col-lg-12">                        <div class="panel panel-default">                            <div class="panel-heading"><h3>Report <small> <?php echo $_SESSION['name']; ?> </small></h3></div>                            <div class="panel-body" style="line-height: 2em;text-align: justify;">                                <p>                                    <?php echo $_SESSION['dist']; ?> district in <?php echo $_SESSION['state']; ?> conspicuous in India map for it's primitive inhabitants of the rare <?php echo $_SESSION['tribe']; ?> tribe on and around the <?php echo $_SESSION['tribe']; ?> hills. <?php echo $_SESSION['name']; ?> is a <?php
            if ($_SESSION['gender'] == 'Male') {
                echo 'boy';
            } else {
                echo 'girl';
            }
            ?> of <?php echo date("Y") - substr($_SESSION['dob'], 0, 4); ?> years belongs to the rare <?php //echo $_SESSION['tribe']; ?> tribe and is a permanent resident of <?php echo $_SESSION['block']; ?> block of <?php echo $_SESSION['dist']; ?> district.                                    His parents <?php echo $_SESSION['father']; ?> and <?php echo $_SESSION['mother']; ?> work as <?php
                                                                                        switch ($_SESSION['primaryE']) {
                                                                                            case 1:
                                                                                                echo "Farmer/cultivator";
                                                                                                break;
                                                                                            case 2:
                                                                                                echo "Homemaker(housewife)";
                                                                                                break;
                                                                                            case 3:
                                                                                                echo "Agri-laborer";
                                                                                                break;
                                                                                            case 4:
                                                                                                echo "Non-agri-laborer";
                                                                                                break;
                                                                                            case 5:
                                                                                                echo "salaried job";
                                                                                                break;
                                                                                            case 6:
                                                                                                echo "Artisan";
                                                                                                break;
                                                                                            case 7:
                                                                                                echo "Business";
                                                                                                break;
                                                                                            case 8:
                                                                                                echo "student";
                                                                                                break;
                                                                                            case 9:
                                                                                                echo "unemployed";
                                                                                                break;
                                                                                            default:
                                                                                                echo "";
                                                                                        }
                                                                                        ?> which is quite insufficient to provide a square meal a day to a family of <?php echo $_SESSION['fMember']; ?> members.                                    They have been provided with <?php echo $_SESSION['scheme']; ?> card by the government of Odisha but still it is too meagre to meet their demands. They have to work hard to save the children from starving.                                    However they manage to give education to <?php echo $_SESSION['name']; ?> till class ten in a government run school near their village but never dared to dream of sending him to college.                                 </p>                                <p>                                    At such a juncture, when <?php echo $_SESSION['name']; ?> was planning to quit further student to help his father earn, he got a call from KISS to get admission in <?php echo $_SESSION['standard']; ?> classes.He could not believe that he was going to be a part of the world's largest tribal residential institution where he could easily transform his dream in to reality.                                    Now he is a student of KISS pursuing his studies in <?php echo $_SESSION['class']; ?>. During in few months at KISS besides getting quality education , he got a chance to resume his interest in sports. He is verymuch happy with the vocational activities of KISS where he is learning to make candles.                                    He wishes to train his friend in village how to make candles as they have to spend dark nights in their village. He feels proud of being a KISSIAN now as the school in which he was reading in his village was a government run school and lacked adequate infrastructure.                                    The teacher student ratio was also very high. More over the teachers were involved in so many activities, both personal and professional that they rarely get chance to impart quality education.                                    Kiss has made him very active , far-sighted and disciplined during this short tenure.                                </p>                                <p>                                    <?php echo $_SESSION['name']; ?> the <?php echo $_SESSION['tribe']; ?> boy wants to be a <?php echo $_SESSION['ambition']; ?> in his life. He hopes that KISS will definitely help him in his endeavour.He has planned that he would definitely try to educate the other primitive <?php echo $_SESSION['tribe']; ?> children, especially the girls in his village.                                    His parents are very happy that their son is now getting education at the premier institution of <?php echo $_SESSION['state']; ?>. They also hope that their son would definitely be their saviour and he would be instrumental in rescuing them from the tough times.                                    They owe all the credits of their son getting a chance to make his dream a reality to Dr Samanta, The founder of such a wonderful institution.                                </p>                            </div>                        </div>                    </div>                </div>            </div>        </div>        <div class="clearfix" style="height:50px;"></div>        <script type="text/javascript">            jQuery(function ($) {                $('[data-toggle="popover"]').popover(); $('[data-toggle="tooltip"]').tooltip(); });</script>         <!-- sample templates end -->     </body></html>