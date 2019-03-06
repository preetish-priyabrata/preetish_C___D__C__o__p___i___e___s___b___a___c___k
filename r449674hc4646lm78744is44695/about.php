<?php 
session_start();
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>RHCLMIS Bihar</title>

    <!-- Bootstrap -->
    <link href="assert_FRONT/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="home/css/styles.css">
     <link rel="stylesheet" type="text/css" href="home/css/bootsnav.css">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="home/css/animate.css" rel="stylesheet">
    <link href="home/css/flexslider.css" rel="stylesheet">
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
     <link href="home/css/jquery.li-scroller.1.1.1.css" rel="stylesheet">
<script src="home/js/jquery.li-scroller.1.1.js"></script>
  <script type="text/javascript">
   $(function(){
    $("ul#ticker01").liScroll({travelocity: .05});
});
</script>
    <!-- <link href="smartmenus-master/src/addons/bootstrap/jquery.smartmenus.bootstrap.css" rel="stylesheet"> -->
    <script type="text/javascript">          
    $(window).on('load',function(){
    	
      $('.demo').delay(2000).fadeOut("slow");
      
    });
    

  </script>
  
  </head>
  <body> 
  <div  class="demo">
    <div id="mydiv">
	    <div class="container">

	        <div class="row">
	            <div class="col-md-12">
	         
	                <div class="loader">
	                    <span class="loading">
	                        <span>L</span>
	                        <span>o</span>
	                        <span>a</span>
	                        <span>d</span>
	                        <span>i</span>
	                        <span>n</span>
	                        <span>g</span>
	                    </span>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
</div>
<!-- header -->
<div class="hide_details">
	<div class="container-fluid" id="menu_tops" >
		<header id="header">
			<div class="top-bar">
				<!-- <div class="container"> -->
					<div class="row ">
						
		  				<div class="col-sm-12 col-xs-12 col-lg-10 col-md-10  col-md-offset-2 col-lg-offset-1 col-md-offset-1">
		  					<div class="row">
		  						<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 ">
									<h2 class="text-effect">Reproductive Health Commodities Logistic Management Information System (RHCLMIS)</h2>
								</div>
							
		  						<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">
									<h2 class="text-effect">State Health Society, Department of Health and Family Welfare,</h2>
									<h2 class="text-effect">Government of Bihar</h2
								</div>
							</div>
						</div>
						
					</div>
				<!-- </div> -->
			</div>
		</header>
	  <!-- <div class="search_css"> -->
	 
	<!-- </div> -->
	</div>
</div>
<!-- Start Navigation -->
    <nav id="ids_me1"  class="navbar navbar-default bootsnav" style="background-color:#98bf21; ">

        <!-- Start Top Search -->
       <!--  <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div> -->
        <!-- End Top Search -->
        <div class="container-fluid" >            
            <!-- Start Atribute Navigation -->
            <!-- <div class="attr-nav">
                <ul>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
                        </a>
                        <ul class="dropdown-menu cart-list">
                            <li>
                                <a href="#" class="photo"><img src="images/thumb/thumb01.jpg" class="cart-thumb" alt="" /></a>
                                <h6><a href="#">Delica omtantur </a></h6>
                                <p>2x - <span class="price">$99.99</span></p>
                            </li>
                            <li>
                                <a href="#" class="photo"><img src="images/thumb/thumb02.jpg" class="cart-thumb" alt="" /></a>
                                <h6><a href="#">Omnes ocurreret</a></h6>
                                <p>1x - <span class="price">$33.33</span></p>
                            </li>
                            <li>
                                <a href="#" class="photo"><img src="images/thumb/thumb03.jpg" class="cart-thumb" alt="" /></a>
                                <h6><a href="#">Agam facilisis</a></h6>
                                <p>2x - <span class="price">$99.99</span></p>
                            </li>
                            <li class="total">
                                <span class="pull-right"><strong>Total</strong>: $0.00</span>
                                <a href="#" class="btn btn-default btn-cart">Cart</a>
                            </li>
                        </ul>
                    </li>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                </ul>
            </div> -->
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
           <!--  <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#brand"><img src="images/brand/logo-black.png" class="logo" alt=""></a>
            </div> -->
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu" >
                <ul class="nav navbar-nav navbar-center text-center" data-in="fadeInDown" data-out="fadeOutUp" >
                    <li><a href="index.php" title="Home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li class="active"><a href="about.php" title="About RHCLMIS"><small>About</small></a></li>
                    <li ><a href="RHC.php" class="text-nowrap" title="Reproductive Health Commodities"><small>RHC</small></a></li>
                     <li><a href="#" title="Newsroom and Stories"><small>Newsroom & Stories</small></a></li>
                     <li class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Guidelines"><small>Guidelines</small></a>
                        <ul class="dropdown-menu megamenu-content" role="menu" >
                            <li>
                                <div class="row">
                                <!-- <div class="col-menu col-md-2"></div> -->
                                    <div class="col-menu col-md-4">
                                        <h6 class="title" style="font-size: 19px; color: #821E03"><b>Guidelines</b></h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="web/viewer.php?File=FPIS_Manual.pdf" target="_blank"><b>FPIS Manual</b></a></li>
                                                <li><a href="web/viewer.php?File=OralPillsManual.pdf" target="_blank"><b>Oral PIlls Manual</b></a></li>
                                                <li><a href="web/viewer.php?File=ModifiedHDC.pdf" target="_blank"><b>Modified HDC</b></a></li>
                                                <li><a href="web/viewer.php?File=1.pdf" target="_blank"><b>Do-Letter-New Contraceptives</b></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                     <div class="col-menu col-md-4">
                                        <h6 class="title" style="font-size: 19px; color: #821E03"><b>Guidelines</b></h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                            <li>
                                                <a href="web/viewer.php?File=Reference_Manual_Injectable_Contraceptives.pdf" target="_blank"><b>Reference Manual Injectable Contraceptives</b></a>
                                            </li>
                                            <li>
                                                <a href="web/viewer.php?File=Standard_for_sterilization_services.pdf" target="_blank"><b>Standard for sterilization services</b></a>
                                            </li>
                                            <li><a href="web/viewer.php?File=Subcutaneous_Injectable_Contraceptive.pdf" target="_blank"><b>Subcutaneous Injectable Contraceptive</b></a></li>
                                            <!-- <li><a href="web/viewer.php?File=web_Manual.pdf"><b>WEB Guidelines</b></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-menu col-md-4">
                                        <h6 class="title" style="font-size: 19px; color: #821E03"><b>Guidelines</b></h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                            <li><a href="web/viewer.php?File=Post_Abortion_Family_Planning.pdf" target="_blank"><b>Post Abortion Family Planning</b></a></li>
                                            <li><a href="web/viewer.php?File=PTK_Guidelines.pdf" target="_blank"><b>PTK Guidelines</b></a></li>
                                            <li><a href="web/viewer.php?File=SMS_UNFPA_BIH_RHCLMIS.pdf" target="_blank"><b>SMS Guidelines English </b></a>
                                            </li>
                                            <li><a href="web/viewer.php?File=Hindi_SMS_UNFPA_BIH_RHCLMIS_Ver1.0_15.05.17_draft.docx.pdf" target="_blank"><b>SMS Guidelines Hindi </b></a></li>
                                            <li><a href="web/viewer.php?File=web_Manual.pdf"><b>WEB Guidelines</b></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>   
                            
                        </li>
                      <li  ><a href="contact_us.php" title="Contact Us"><small>Contact Us</small></a></li>
                    <!-- <li class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Megamenu</a>
                        <ul class="dropdown-menu megamenu-content" role="menu" >
                            <li>
                                <div class="row">
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Title Menu One</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <!-- end col-3 -->
                                   <!--  <div class="col-menu col-md-3">
                                        <h6 class="title">Title Menu Two</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                            </ul>
                                        </div>
                                    </div> --><!-- end col-3 -->
                                   <!--  <div class="col-menu col-md-3">
                                        <h6 class="title">Title Menu Three</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                            </ul>
                                        </div>
                                    </div>   -->  
                                    <!-- <div class="col-menu col-md-3">
                                        <h6 class="title">Title Menu Four</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                            </ul>
                                        </div>
                                    </div> --><!-- end col-3 -->
                               <!--  </div> -->
                                <!-- end row -->
                        <!--     </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Dropdowns</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Sub Menu</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Sub Menu</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Custom Menu</a></li>
                                            <li><a href="#">Custom Menu</a></li>
                                            <li><a href="#">Custom Menu</a></li>
                                            <li><a href="#">Custom Menu</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Custom Menu</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Contact Us</a></li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>   

        <!-- Start Side Menu -->
       <!--  <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <div class="widget">
                <h6 class="title">Custom Pages</h6>
                <ul class="link">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="widget">
                <h6 class="title">Additional Links</h6>
                <ul class="link">
                    <li><a href="#">Retina Homepage</a></li>
                    <li><a href="#">New Page Examples</a></li>
                    <li><a href="#">Parallax Sections</a></li>
                    <li><a href="#">Shortcode Central</a></li>
                    <li><a href="#">Ultimate Font Collection</a></li>
                </ul>
            </div>
        </div> -->
        <!-- End Side Menu -->
    </nav>

<!-- <div class="container">
    <div class="jumbotron jumbotron-sm" style="background-color:#339966;margin-top:2%;color:white;">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h2" style="margin-top:-2%">
                    İletişim
                </h1>
            </div>
        </div>
    </div>
</div -->
<style type="text/css">
    .content-column.two-three {
    width: 65.591482%;
}


.content-column {
    float: left;
    margin-right: 3.22555%;
    margin-bottom: 40px;
}
.special-title {
    position: relative;
    padding-bottom: 1rem;
    border-bottom-width: 1px;
    border-bottom-style: solid;
}
h1::after, h2::after, h3::after, h4:not(.widget-title)::after, .special-title::after {
    background-color: rgba(39,174,96,1);
}

.special-title::after {
    content: '';
    width: 4rem;
    height: 0.4rem;
    display: block;
    position: absolute;
    top: 100%;
    margin-top: -0.2rem;
}
p, h3, h4, h5, h6, blockquote, ul, table {
    margin: 1.4em 0;
    font-family: 'Domine';
    font-weight: 300;
    text-transform: none;
    font-size: 1.5rem;
        line-height: 1.5;
}
.content-column.last {
    margin-right: 0 !important;
}

.content-column.one-three {
    width: 31.182966%;
}

.clearfix {
    clear: none !important;
}

.content-column {
    float: left;
    margin-right: 3.22555%;
    margin-bottom: 40px;
}
h2, .h2 {
    color: rgba(30,30,30,1);
}

h2, .h2 {
    font-family: 'Roboto';
    font-weight: 300;
    text-transform: none;
    font-size: 3.6rem;
}

h1, h2 {
    margin: 0.75em 0;
}

h2 {
    line-height: 1.2;
}
.dividerHeading h4::after, .dividerHeading h4::before, .widget_title h4::after, .widget_title h4::before {
    background-color: #727CB6;
}

.dividerHeading h4::before, .widget_title h4::before {
    bottom: -3px;
    content: "";
    display: inline-block;
    height: 5px;
    left: 20px;
    position: absolute;
    width: 35px;
}
.dividerHeading h4::after, .dividerHeading h4::before, .widget_title h4::after, .widget_title h4::before {
    background-color: #727CB6;
}

.dividerHeading h4::after, .widget_title h4::after {
    bottom: -1px;
    content: "";
    display: inline-block;
    height: 1px;
    left: 0;
    position: absolute;
    width: 80px;
}
.sub_content {
    padding: 30px 0;
}
.dividerHeading h4, .widget_title h4 {
    border-bottom: 1px solid #e2e2e2;
    font-size: 21px;
    font-weight: normal;
    margin-bottom: 25px;
    padding: 0 0 10px;
    position: relative;
}
/*ul {
    list-style: none;
    margin: 0;
    padding: 0;
}*/
.list_style.circle li {
    padding: 3px 2px 3px 23px;
}

.list_style.circle li {
    padding: 3px 2px 3px 23px;
}

.list_style li {
    padding: 3px 2px 3px 12px;
}

.list_style li {
    font-family: PT sans,Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 21px;
    padding: 3px 2px 3px 10px;
    position: relative;
}


.list_style.circle li:before {
    font-family: FontAwesome;
    content: "\f105";
    color: #FFFFFF;
    background: #727CB6;
    border-radius: 50%;
    display: inline-block;
    height: 16px;
    line-height: 16px;
    width: 16px;
    text-align: center;
    font-size: 11px;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    position: absolute;
    left: 0;
    top: 5px;
}


.list_style.circle li:before {
    font-family: FontAwesome;
    content: "\f105";
    color: #FFFFFF;
    background: #727CB6;
    border-radius: 50%;
    display: inline-block;
    height: 16px;
    line-height: 16px;
    width: 16px;
    text-align: center;
    font-size: 11px;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    position: absolute;
    left: 0;
    top: 5px;
}

.list_style li:before {
    font-family: FontAwesome;
    content: "\f105";
    font-size: 14px;
    position: absolute;
    left: 0;
    top: 3px;
}

.list_style li:before {
    font-family: FontAwesome;
    content: "\f105";
    font-size: 14px;
    position: absolute;
    left: 0;
    top: 3px;
}
.list_style li a {
    color: #666;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0;
    text-decoration: none;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="content-column two-three"><h2 class="special-title">ABOUT</h2>
                <p><b>Reproductive Health Commodities Logistics Management Information System (RHCLMIS)</b> is a technology based solution which addresses almost all above gaps in maintaining the supplies of reproductive health commodities and reducing the chances of Stock outs thereby increasing probability of continuous supply of reproductive health commodities to people in need. It is basically designed to streamline and strengthen the logistics and supply chain management for reproductive health commodities upto the last mile- the ASHA level.</p>
                <!-- <p>6th Man Movers is a young and energetic moving company that seeks to offer a fun and personable moving experience. We often say, “We aren’t movers moving clients, we are people moving people.” We believe that professionalism and personality can coexist even in the moving industry! But we think of ourselves as more than just a moving company. We are proud to create local jobs and partner with other great local businesses. We want to use this company as a vehicle for positive change in our own lives and our community.</p> -->
            </div>
            <div class="content-column last clearfix one-three"><h2 class="special-title">RHCLMIS  Objectives</h2>
                <ul>
                    <li>Develop IT based Scientific System of need based forecasting of contraceptives, indenting and supply</li>
                    <li>Strengthening Capacities of Nodal officers in mainstreaming and maintain the IT based system of Contraceptives/RH commodities</li>
                    <!-- <li>Go confidently in the direction of your dreams. Live the life you’ve imagined. -Henry David Thoreau</li>
                    <li>Stay hungry. Stay foolish. -Stewart Brand</li>
                    <li>Make it happen.</li>
                    <li>See things in the present even if they are in the future. -Larry Ellison</li>
                    <li>Do what you love, love what you do.</li> -->
                </ul>
            </div>
        </div>

    </div>
</div>
<section class="feature_bottom" style="margin-top: -30px;">
    <div class="container">
        <div class="row sub_content">
            <div class="col-lg-12 wow slideInLeft animated" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: slideInLeft;">

                <div class="dividerHeading">
                    <h4><span>Salient Features of RHCLMIS in Bihar:</span></h4>
                </div>
                <div class="col-lg-6">
               <!--  <p>Cras mattis consectetur purus sit amet fermen. Lorem ipsum dolor sit amet, consec adipiscing elit. Maecenas sed diam eget risus varius bland sit amet non fringilla ullamcorper magna. Nulla eu mi magna. Etiam suscipit commodo ad gravida.</p> -->
                <ul class="list_style circle" style="list-style: none;   margin: 0;    padding: 0;">
                    <li><a href="#">SMS and Web based application designed for managing contraceptive supply chain</a></li>
                    <li><a href="#">Independent of computer or internet connectivity at sub district level</a></li>
                    <li><a href="#"><b>Instant access</b> to stock information at all public health facilities- in the public domain</a></li>
                    <li><a href="#">Tracks contraceptive supplies at <b>health facilities</b> in the state including sub centers</a></li>
                    <li><a href="#">Auto information for indenting- <b>when and how much</b></a></li>
                     <li><a href="#">SMS alert on <b> Minimum and Maximum Stock level</b>  with a copy to their respective supervisors </a></li>
                </ul>
                </div>
                 <div class="col-lg-6">
               <!--  <p>Cras mattis consectetur purus sit amet fermen. Lorem ipsum dolor sit amet, consec adipiscing elit. Maecenas sed diam eget risus varius bland sit amet non fringilla ullamcorper magna. Nulla eu mi magna. Etiam suscipit commodo ad gravida.</p> -->
                <ul class="list_style circle" style="list-style: none;   margin: 0;    padding: 0;">
                   <li><a href="#">Alert message for <b>short expiry</b> for freeze or issue</a></li>
                    <li><a href="#">Auto <b>forecasting</b> of contraceptives based on Population or utilization/distribution</a></li>
                    <li><a href="#">Data transfer through <b> SMS</b> (indent, issue, updation, short supply etc.</a></li>
                    <li><a href="#">Confirmation message for every transaction to both the sender and receiver by an SMS</a></li>
                    <li><a href="#">Auto generated <b>graphical reports</b> for program review></a></li>
                     <li><a href="#">Tracking for availability of a <b>particular item</b> with <b> batch no.</b></a></li>
                     <li><a href="#">Tracking of <b>incoming and outgoing</b> SMS of users by administrator.</a></li>
                </ul>
                </div>
            </div>           
        </div>
    </div>
</section>
       







<footer id="footer" class="midnight-blue">
    <!-- <div class="container-fluid"> -->
        <div class="row">
            <div class="col-sm-4 pull-left">
                  <img src="home/logo/top-gov.gif" style="margin-left: 7px; width: 247px;" class="img-responsive" alt="Avatar">
            </div>
            <div class="col-sm-4 pull-right">
            <p style="margin: -19px 0 0px 245px;; color: #337ab7; text-decoration: none;">Supported By</p>
                  <img src="home/logo/UNFPA_logo.svg.png" style="width: 102px; margin-left: 240px; background: white" class="img-responsive"  alt="Avatar">
            </div>
            <div class="col-sm-4">
                  <img src="home/logo/image.png"  class="img-responsive" style="width: 201px; margin-left: 131px;" alt="Avatar">
                
                <div class=" text-center" style="margin-left: 33px; ">
                <strong> <a target="_blank" href="#" title="">&#9400;  State Health Society</a></strong> 
                </div>
            </div>
           <!--  <div class="col-sm-2 pull-right">
                  <img src="logo/top-health.jpg" style="margin-left: -5px; width: 196px;" class="img-responsive"  alt="Avatar">
            </div> -->
            

        </div>
        <br>
        <div class="row">
           <!--  <div class="col-sm-3 pull-right" >Powered By <a target="_blank" href="http://www.innovadorslab.com/" title=""> Innovadors Lab Pvt Ltd </a>
            </div> -->
            <div class="col-sm-3 pull-left" style="color: #337ab7; text-decoration: none; margin-left: 14px;"><label style="color: #337ab7; text-decoration: none;">Number of Registered Visitors :</label style="color: #337ab7; text-decoration: none;"> 0<br><label>Number of Guest Visitors :</label> 0
            </div>
            </div>
             <div class="row">
           <div class="col-sm-6 col-sm-offset-3 text-center" >
                 <p class="text-capitalize" style="color: #337ab7; text-decoration: none;"> Best Viewed With A Resolution Of 1360X768  (Or Higher)</p>
          
            </div>     
        </div>
      
    <!-- </div> -->
</footer> 





 <script src="assert_FRONT/dist/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="home/js/bootsnav.js"></script>
 <script type="text/javascript">
   
   $('.carousel').carousel({
      interval: 2000
    })

</script>
<script src="home/js/mango-ticker.js"></script>
<script type="text/javascript">startTicker('ticker-box', {speed:6, delay:10000});</script>

<!-- <script type="text/javascript" src="js/marquee.js"></script> -->
<script src="home/js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.flexslider').flexslider({
            animation: 'fade',
            controlsContainer: '.flexslider'
        });
    });
</script>

     
   
  </body>
</html>