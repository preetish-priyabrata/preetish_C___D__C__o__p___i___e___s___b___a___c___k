<!DOCTYPE HTML>
<?php
include './class/DbConnection.php';
include './class/Message.php';
$msg = new Message();
ob_start();
?>
<html>
    <head>
        <title>Kiit L&D</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!--  jquery plguin -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!-- start gallery -->
        <script type="text/javascript" src="js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
         <!-- Latest compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

        <!-- jQuery library -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

        <!-- Latest compiled JavaScript -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
        <script type="text/javascript">
            $(function () {

                var filterList = {
                    init: function () {

                        // MixItUp plugin
                        // http://mixitup.io
                        $('#portfoliolist').mixitup({
                            targetSelector: '.portfolio',
                            filterSelector: '.filter',
                            effects: ['fade'],
                            easing: 'snap',
                            // call the hover effect
                            onMixEnd: filterList.hoverEffect()
                        });

                    },
                    hoverEffect: function () {

                        // Simple parallax effect
                        $('#portfoliolist .portfolio').hover(
                                function () {
                                    $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                                    $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
                                },
                                function () {
                                    $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                                    $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                                }
                        );

                    }

                };

                // Run the show!
                filterList.init();

            });
        </script>
        <!-- Add fancyBox main JS and CSS files -->

        <script type="text/javascript">

            $(function () {
                if ($.browser.msie && $.browser.version.substr(0, 1) < 7)
                {
                    $('li').has('ul').mouseover(function () {
                        $(this).children('ul').show();
                    }).mouseout(function () {
                        $(this).children('ul').hide();
                    })
                }
            });

        </script>   

        <link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- start header -->
        <div class="header_bg">
            <div class="wrap">
                <div class="header">
                    <div class="logo">
                       <a href="index.php"><img style="margin-top:-17px;" height="80" src="images/lndlogo1-1.png" alt=""/></a>
                    </div>
                    <div class="h_right">
                        <ul class="menu">
                            <li class="active"><a href="index.php">home</a></li>
                            <li><a href="about.php">about</a></li>
                            <li><a href="contact.php">contact</a></li>
                            <li><a href="openings.php">career</a></li>
                            <li><a href="login_new.php">login</a></li>
                            <li><a href="candidateregistration.php">Register</a></li>
                        </ul>
                        <script src=" js/classie.js"></script> 

                        <!-- start smart_nav * -->
                        <nav class="nav">
                            <ul class="nav-list">
                                <li class="active"><a href="index.html">home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">media</a></li>
                                <li><a href="contact.php">contact</a></li>
                                <!--<li><a href="login.php">login</a></li> -->
                                <li><a href="login_new.php">login</a></li>
                            </ul>
                        </nav>
                        <script type="text/javascript" src="js/responsive.menu.js"></script> 
                        <!-- end smart_nav * --> 
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <!-- start main -->
        <div class="main_bg" style="margin-top:6.5%">
            <div class="wrap">
                <div class="main" style="padding:0"> 
                    <!-- start gallery  -->
                    <div class="container">
                        <div id="portfoliolist"> <a class="popup-with-zoom-anim" >
                                <div class="portfolio logo1" data-cat="logo">
                                    <div class="portfolio-wrapper"> <img class="banner-image" src="images/hr-solution.png"  alt="Image 2" />
                                        <div class="label">
                                            <div class="label-text">
                                                <p class="text-title">HR Solution</p>
                                                <span class="text-category">Description on HR Solution</span> </div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            </a> <a class="popup-with-zoom-anim" >
                                <div class="portfolio app" data-cat="app">
                                    <div class="portfolio-wrapper"> <img class="banner-image" src="images/staffing.jpg"  alt="Image 2" />
                                        <div class="label">
                                            <div class="label-text">
                                                <p class="text-title">Manpower Solution</p>
                                                <span class="text-category">Description on Manpower Solution</span> </div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            </a> <a class="popup-with-zoom-anim" >
                                <div class="portfolio web" data-cat="web">
                                    <div class="portfolio-wrapper"> <img class="banner-image" src="images/training-solution.jpg"  alt="Image 2" />
                                        <div class="label">
                                            <div class="label-text">
                                                <p class="text-title">Training</p>
                                                <span class="text-category">Brief Description</span> </div>
                                            <div class="label-bg"></div>
                                        </div>
                                    </div>
                                </div>
                            </a> </div>
                    </div>
                    <!-- end container --> 
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

                        <div class="span1_of_4" >
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




    </body>
</html>