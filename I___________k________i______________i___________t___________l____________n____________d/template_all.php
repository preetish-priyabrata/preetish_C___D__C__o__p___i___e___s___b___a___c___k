<!DOCTYPE HTML>
<html>
    <head>
        <title>Kiit L&D</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style_avi.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="admin/datepicker/css/jquery-ui.css">
    </head>
    <body>
        <!-- start header -->
        <div class="header_bg">
            <div class="wrap">
                <div class="header">
                    <div class="logo">
                        <h1><a href="index.html"><img style="margin-top:-17px;" height="80" src="images/lndlogo1-1.png" alt=""/></a></h1>
                    </div>
                    <div class="h_right">

                        <ul class="menu">
                            <li class="<?php echo $menuClass1; ?>"><a href="index.php">home</a></li>
                            <li class="<?php echo $menuClass2; ?>"><a href="about.php">about</a></li>
                            <li class="<?php echo $menuClass3; ?>"><a href="contact.php">contact</a></li>
                            <li class="<?php echo $menuClass4; ?>"><a href="openings.php">career</a></li>
                            <li class="<?php echo $menuClass5; ?>"><a href="login_new.php">login</a></li>
                            <li class="<?php echo $menuClass6; ?>"><a href="candidateregistration.php">Register</a></li>
                        </ul>

                        <script src=" js/classie.js"></script> 
                        <!-- start smart_nav * -->
                        <nav class="nav">
                            <ul class="nav-list">
                                <li class="active"><a href="index.php">home</a></li>
                                <li><a href="about.php">about</a></li>
                                <li><a href="contact.php">contact</a></li>
                                <li><a href="openings.php">career</a></li>
                                <li><a href="login_new.php">login</a></li>
                                <li><a href="candidateregistration.php">Register</a></li>
                                <div class="clear"></div>
                            </ul>
                        </nav>
                        <script type="text/javascript" src="js/responsive.menu.js"></script> 
                        <!-- end smart_nav * --> 
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <!-- start slider -->
        <div class="slider_bg">
            <div class="wrap">
                <div class="slider">
                    <h2><?php echo $header; ?></h2>
                    <h3><?php echo $headerTag; ?></h3>
                </div>
            </div>
        </div>
        <!-- start main -->
        <div class="main_bg">
            <div class="wrap">
                <div class="main">
                    <div class="content" style="margin-top:-64px;"> <!-- All the template contents are placed here -->
                        <?php echo $pageContent; ?>        
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bg">
            <div class="wrap">
                <div class="footer">
                    <div class="span_of_12">
                        <div class="span1_of_4">
                            <h4>Address</h4>
                            <p class="top">KALINGA INSTITUTE OF INDUSTRIAL TECHNOLOGY                              
                               </p>
                            <p class="text-center"> KIIT UNIVERSITY</p>
                            <p> BHUBANESWAR - 751024, ODISHA, INDIA</p>
                            <p>Phone : + 91 674-2725113                                
                                <span style="margin-top:0%;margin-left:53px;"> 91 674-2725347</span>
                                
                            </p>
                            <p>TELEFAX : +  91 674-2725113                               
                               
                            </p>
                        </div>

                        <div class="span1_of_4">
                            <h4>latest posts</h4>
                            <marquee direction="up" behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();" scrolldelay="300" style="height: 160px;">
                                <?php
                                include './currentOpenings.php';
                                ?>                                
                            </marquee>
                            <div><a href="all-openings.php" style="float: right;">View All</a></div>
                        </div>

                        <div class="span1_of_4">
                            <h4>Our Clients</h4>
                            <?php
                            include './clients.php';
                            ?>                                
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="footer_top">
                <div class="bg_color_in">
                    <div style="float:left">
                        <p style="margin-top:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#c6c6c6;">© All rights reserved | Design by&nbsp;<a href="http://innovadorslab.com/inlab/" style="text-decoration:none;color:#c6c6c6"> Innovadors Lab</a></p>
                    </div>
                    <div class="soc_icons" style="float:right; margin-top:7px;">
                        <ul>
                            <li><a class="icon1" href="#"></a></li>
                            <li><a class="icon2" href="#"></a></li>
                            <li><a class="icon3" href="#"></a></li>
                            <li><a class="icon4" href="#"></a></li>
                            <li><a class="icon5" href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>     
    </div>
    <script src="js/formValidation.js"></script>
    <script src="admin/js/jquery.js"></script>
    <script src="admin/datepicker/js/jquery-ui.min.js"></script> 
    <script>
                                $(function () {
                                    $("#dob").datepicker({
                                        showOn: "button",
                                        //        buttonImage: "admin/datepicker/img/calendar.gif",
                                        buttonImage: "images/date.png",
                                        buttonImageOnly: true,
                                        dateFormat: "dd-mm-yy",
                                        showAnim: "slide",
                                        changeMonth: true,
                                        changeYear: true,
                                        yearRange: "1984:<?php echo date('Y', time()) ?>",
                                    });
                                });
    </script>


</body>
</html>