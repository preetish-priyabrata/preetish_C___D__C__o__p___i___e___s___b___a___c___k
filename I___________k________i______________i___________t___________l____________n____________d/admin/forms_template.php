<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Consultancy Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

        <!-- jQuery UI CSS File -->
        <link rel="stylesheet" href="datepicker/css/jquery-ui.css">

        <!-- Data Table CSS -->
        <link href="dataTables/dataTables.bootstrap.css" rel="stylesheet">
    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Admin Dashboard</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <!-- <li <?php if ($title == "addCollege") {
    echo "class='active'";
} ?>><a href="addCollege.php"><i class="fa fa-edit"></i> Add College</a></li>
                        <li <?php if ($title == "addCompany") {
    echo "class='active'";
} ?>><a href="addCompany.php"><i class="fa fa-edit"></i> Add Company</a></li>
                        <li <?php if ($title == "addTraining") {
    echo "class='active'";
} ?>><a href="addTraining.php"><i class="fa fa-edit"></i> Add Training</a></li>
                        <li <?php if ($title == "addCompanyVisit") {
    echo "class='active'";
} ?>><a href="companyVisit.php"><i class="fa fa-edit"></i> Add Company Visit</a></li>
                        <li <?php if ($title == "sendMessage") {
    echo "class='active'";
} ?>><a href="addMessage.php"><i class="fa fa-edit"></i> Send Message</a></li>
                        <li <?php if ($title == "upcomgingCompanies") {
    echo "class='active'";
} ?>><a href="upcomingCompanies.php"><i class="fa fa-th"></i> Upcoming Companies</a></li>
                        <li <?php if ($title == "viewCandidates") {
    echo "class='active'";
} ?>><a href="viewCandidates.php"><i class="fa fa-th"></i> View Candidates</a></li>
                        -->
                        <li <?php if ($title == "viewCandidateNew") {
    echo "class='active'";
} ?>><a href="adminViewCandidateNew.php"><i class="fa fa-th"></i> View Candidates (New)</a></li>
                        <li <?php if ($title == "career list") {
    echo "class='active'";
} ?>><a href="adminViewCareerList.php"><i class="fa fa-th"></i>Candidate From Career List</a></li>
                        <li <?php if ($title == "Opening List") {
    echo "class='active'";
} ?>><a href="currentOpeningCandidateList.php"><i class="fa fa-th"></i>Candidates From Current Openings</a></li>
                        <li <?php if ($title == "Current Openings") {
    echo "class='active'";
} ?>><a href="currentOpenings.php"><i class="fa fa-th"></i>Current Openings</a></li>
                        <!--<li><a href="#"><i class="fa fa-th"></i> Approve Candidates</a></li>-->
                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <!--<li class="dropdown messages-dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li class="dropdown-header">7 New Messages</li>
                            <li class="message-preview">
                              <a href="#">
                                <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                <span class="name">Admin:</span>
                                <span class="message">Hey there, I wanted to ask you something...</span>
                                <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                              </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                              <a href="#">
                                <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                <span class="name">John Smith:</span>
                                <span class="message">Hey there, I wanted to ask you something...</span>
                                <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                              </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                              <a href="#">
                                <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                <span class="name">John Smith:</span>
                                <span class="message">Hey there, I wanted to ask you something...</span>
                                <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                              </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">View Inbox <span class="badge">7</span></a></li>
                          </ul>
                        </li>
                        <li class="dropdown alerts-dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                            <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                            <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                            <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                            <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                            <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                            <li class="divider"></li>
                            <li><a href="#">View All</a></li>
                          </ul>
                        </li>-->
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="adminLogOut.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

<?php echo $pageContent; ?>


            </div><!-- /#page-wrapper -->

        </div><!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.js"></script>
        <script src="datepicker/js/jquery-ui.min.js"></script>        

        <script src="js/bootstrap.js"></script>

        <!-- Page-Level Plugin Scripts - Tables -->
        <script src="dataTables/jquery.dataTables.min.js"></script>
        <script src="dataTables/dataTables.bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/custome.js"></script>
        <script>
            $(function () {
                $(".date-picker").datepicker({
//                    showOn: "button",
                    //        buttonImage: "admin/datepicker/img/calendar.gif",
//                    buttonImage: "../images/date.png",
                    buttonImageOnly: true,
                    dateFormat: "yy-mm-dd",
                    showAnim: "slide",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1984:<?php echo date('Y', time()) ?>",
                });
            });
        </script>
    </body>
</html>