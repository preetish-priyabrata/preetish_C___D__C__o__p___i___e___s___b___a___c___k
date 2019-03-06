<!DOCTYPE html>
	<html lang="en">
	<head>
		<title><?=$title?></title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="asserts_new/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="asserts_new/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
              $(window).keydown(function(event){
                if(event.keyCode == 13) {
                  event.preventDefault();
                  return false;
                }
              });
            });
        </script>

	</head>
	<body>
		<div class="cotainer-fluid">
			<div class="header_bg">
	            <div class="wrap">
	                <div class="header">
	                    <div class="logo">
	                        <h1><a href="index.php"><img style="margin-top:-17px;" height="80" src="img/lndlogo1-1.png" alt=""/></a></h1>
	                    </div>
	                    <div class="h_right">

                        <ul class="menu">
                            <li class="<?php echo $menuClass1; ?>"><a href="index.php">home</a></li>
                            <li class="<?php echo $menuClass2; ?>"><a href="about.php">about</a></li>
                            <li class="<?php echo $menuClass3; ?>"><a href="contact.php">contact</a></li>
                            <li class="<?php echo $menuClass4; ?>"><a href="openings.php">career</a></li>
                            <li class="<?php echo $menuClass5; ?>"><a href="login_new.php">login</a></li>
                            <li class="<?php echo $menuClass6; ?>"><a href="candidate_registration.php">Register</a></li>
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
                                <li><a href="candidate_registration.php">Register</a></li>
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
	    </div>
	   <!--  <div class="clear"></div> -->
        <?php echo $content_display;?>
<div class="cotainer-fluid]">
	<div class="row">
         <div class="footer_bg">
            <div class="wrap">
                <div class="footer">
                    <div class="col-lg-12">
                        <div class="col-lg-4">
                        	<div class="footer-single">
								<div class="footer-title"><h2>Contact Information</h2></div>
	                        	<address>
	                            <!-- <h4>Address</h4> -->
	                            <strong>KALINGA INSTITUTE OF INDUSTRIAL TECHNOLOGY</strong><br>
								  KIIT UNIVERSITY<br>
								  BHUBANESWAR - 751024, ODISHA, INDIA<br>
	                            <!-- <p class="top">KALINGA INSTITUTE OF INDUSTRIAL TECHNOLOGY                              
	                               </p>
	                            <p class="text-center"> KIIT UNIVERSITY</p>
	                            <p> BHUBANESWAR - 751024, ODISHA, INDIA</p> -->
	                             <abbr title="Phone">Ph:</abbr><i class="fa fa-phone"></i>  (0674) 2725113/2725347<br>
	                            <!-- <p>Phone : + 91 674-2725113                                
	                                <span style="margin-top:0%;margin-left:53px;"> 91 674-2725347</span>
	                                
	                            </p> -->
	                            <abbr title="Fax">Ph:</abbr><i class="fa fa-fax"></i> (0674) 2725113
	                            <!-- <p>TELEFAX : +  91 674-2725113                               
	                               
	                            </p> -->
	                           </address>
	                         </div>
	                         
                        </div>

                        <div class="col-lg-4">
                            <h4>latest posts</h4>
                            <marquee direction="up" behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();" scrolldelay="300" style="height: 160px;">
                                <?php
                                include './currentOpenings.php';
                                ?>                                
                            </marquee>
                            <div><a href="all-openings.php" style="float: right;">View All</a></div>
                        </div>

                        <div class="col-lg-4">
                            <h4>Our Clients</h4>
                            <?php
                            include './clients.php';
                            ?>                                
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            
        </div>  
    </div>
    <div class="row">
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
	</body>

</html>