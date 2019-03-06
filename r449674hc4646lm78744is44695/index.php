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
<!--   <div  class="demo">
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
</div> -->
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
                    <li class="active"><a href="#" title="Home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li class=""><a href="about.php" title="About RHCLMIS"><small>About</small></a></li>
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
                      <li><a href="contact_us.php" title="Contact Us"><small>Contact Us</small></a></li>
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
    <style type="text/css">
       
.table-fixed {
  width: 100%;
  background-color: #f3f3f3;
}
.table-fixed tbody {
  height: 250px;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td .items {
  float: left;
  font-size: 9px;
  }
.table-fixed tbody td {
  float: left;
  font-size: 12px;
  white-space: -o-pre-wrap; 
    word-wrap: break-word;
    white-space: pre-wrap; 
    white-space: -moz-pre-wrap; 
    white-space: -pre-wrap;
}

.table-fixed thead tr th {
  float: left;
  background-color: #f39c12;
  border-color: #e67e22;
}


    </style>
    <!-- End Navigation -->
<div class="container-fluid">    
    <div class="row">
    <div class="col-sm-4 well" style="margin-top: 0;">    
            <section class="slider" >
                <div class="flex-container">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <a href="#"><img src="photo/1.JPG" width="90%" style="height: 180px;" /></a>
                                <p class="flex-caption text-center">Improving the availability of reproductive health commodities in Bihar connecting demand and supply</p>
                            </li>
                            <li>
                                <img src="photo/2.JPG" width="90%" style="height: 180px;" />
                                <p class="flex-caption text-center">Improving the availability of reproductive health commodities in Bihar: Connecting demand and supply</p>
                            </li>
                            <li>
                                <img src="photo/3.JPG" width="90%" style="height: 180px;" />
                                <p class="flex-caption text-center">Improving the availability of reproductive health commodities in Bihar: Connecting demand and supply</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
                        <hr class="divide" style="border-top: 1px solid #aa1e1e;">
            <div class="panel panel-default" style="margin-bottom: -12px;" >
                <div class="panel-heading text-center" style="background-color: #F4A5EA;"><p style=" font-family: 'myriad-pro',arial;   font-size: 20px;">Current Stock of Bihar:</p></div>
                <div class="panel-body" style="">
                    <div class="table-responsive">
                        <table class="table table-fixed">
                            <thead  style="font-size: 11px">
                                <tr>
                                    <th class="col-xs-4 text-center ">Item Name </th>
                                   <!--  <th class="col-xs-4 text-center">O.B as on 01.04.2017</th>
                                    <th class="col-xs-4 text-center">Received</th> -->
                                    <th class="col-xs-4 text-center">Distribution </th>
                                    <th class="col-xs-4 text-center">B.A as on 08.05.2017 </th>
                                    <!-- <th class="col-xs-4 text-center">Unit</th> -->
                                </tr>
                            </thead>
                            <tbody class="text-center" style="font-size: 10px; ">
                                <tr >
                                    <td class="col-xs-4 items">CC-Nirodh</td>
                                   <!--  <td class="col-xs-4">480288</td>
                                    <td class="col-xs-4">1993280</td> -->
                                    <td class="col-xs-4">58,999</td>
                                    <td class="col-xs-4">2414569</td> 
                                     <!-- <td class="col-xs-4">Unit</td> -->
                                </tr>
                                <tr >
                                    <td class="col-xs-4 items">NIRODH-ASHA</td>
                                    <!-- <td class="col-xs-4">3498450</td>
                                    <td class="col-xs-4">476325</td> -->
                                    <td class="col-xs-4">4,10,777</td>
                                    <td class="col-xs-4">3563998</td> 
                                     <!-- <td class="col-xs-4">Unit</td> -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">Mala-N</td>
                                   <!--  <td class="col-xs-4">66639</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">9,316</td>
                                    <td class="col-xs-4">57323</td> 
                                     <!-- <td class="col-xs-4">Unit</td> -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">MALA-N</td>
                                    <!-- <td class="col-xs-4">310508</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">35,698</td>
                                    <td class="col-xs-4">274810</td> 
                                     <!-- <td class="col-xs-4">Unit</td>  -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">E.C.PillS</td>
                                   <!--  <td class="col-xs-4">32376</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">3,769</td>
                                    <td class="col-xs-4">28607</td> 
                                    <!-- <td class="col-xs-4">Unit</td> -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">E.C.PILLS(ASHA)</td>
                                    <!-- <td class="col-xs-4">58812</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">12,704</td>
                                    <td class="col-xs-4">46108</td>
                                     <!-- <td class="col-xs-4">Unit</td> -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">(PTK)Pcs</td>
                                    <!-- <td class="col-xs-4">470527</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">13,068</td>
                                    <td class="col-xs-4">457459</td> 
                                     <!-- <td class="col-xs-4">Unit</td> -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">Cu -T(380 -A)</td>
                                    <!-- <td class="col-xs-4">21812</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">3,502</td>
                                    <td class="col-xs-4">18310</td> 
                                     <!-- <th class="col-xs-4">Unit</th> -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">IUD-375</td>
                                    <!-- <td class="col-xs-4">22870</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">3204</td>
                                    <td class="col-xs-4">19666</td> 
                                     <!-- <td class="col-xs-4 ">Unit</td> -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">Centchroman</td>
                                    <!-- <td class="col-xs-4">16284</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">0</td>
                                    <td class="col-xs-4">16284</td>
                                     <!-- <td class="col-xs-4">Unit</td>  -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">Centchroman</td>
                                    <!-- <td class="col-xs-4">37995</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">0</td>
                                    <td class="col-xs-4">37995</td> 
                                    <!-- <th class="col-xs-4">Unit</th>  -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">Tubal Ring</td>
                                    <!-- <td class="col-xs-4">0</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">0</td>
                                    <td class="col-xs-4">0</td>
                                     <!-- <td class="col-xs-4">Unit</td> -->
                                </tr>
                                 <tr>
                                    <td class="col-xs-4 items">Antara (Vival)</td>
                                    <!-- <td class="col-xs-4">0</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">0</td>
                                    <td class="col-xs-4">0</td>
                                     <!-- <td class="col-xs-4">Unit</td> -->
                                </tr>
                                <tr>
                                    <td class="col-xs-4 items">Progestrone only Pills (PoP)</td>
                                    <!-- <td class="col-xs-4">0</td>
                                    <td class="col-xs-4">0</td> -->
                                    <td class="col-xs-4">0</td>
                                    <td class="col-xs-4">0</td>
                                     <!-- <td class="col-xs-4">Unit</td> -->
                                </tr>
                            </tbody>
                        </table>
                        <a href="excel_files.php?stock=1" class="pull-right" target="_blank">More..</a>
                    </div>
                 </div>
            </div>
        </div> 
        <div class="col-sm-6 " style="margin-top: 30px;" >       
            <!-- <img src="home/img/2.jpeg" class="img-responsive" style=" border: 1px solid black; height: 606px"   alt="Avatar"> -->      
            <img src="home/img/2.jpeg"   alt="Avatar" name="bihar" usemap="#bihar" class="img-responsive" id="bihar" style=" border: 1px solid black; height: 606px">
      <map name="bihar">

        <area shape="poly" coords="148,592,140,582,132,577,128,570,124,564,134,557,139,548,147,554,158,550,162,541,169,531,177,523,178,509,170,502,171,495,178,482,185,470,192,477,200,483,211,477,219,480,228,473,238,469,247,469,256,477,263,486,260,495,249,510,248,519,249,535,252,544,254,550,255,558,246,564,229,572,225,583,205,585,200,575,192,569,187,557,174,567,169,576" title="gaya" alt="gaya" onclick="show('gaya')">

        <area shape="poly" coords="90,531,106,502,121,482,134,463,144,455,163,455,175,464,174,472,172,485,168,494,169,503,170,508,173,515,168,526,163,535,157,544,144,546,127,550,129,557,107,550,102,555"  alt="aurangabad" title="aurangabad" onclick="show('aurangabad')">

        <area shape="poly" coords="27,549,31,540,41,542,56,542,59,527,58,511,55,506,62,489,70,460,74,432,79,413,88,415,98,400,107,400,118,404,127,410,132,427,141,435,144,447,129,463,117,481,107,496,98,509,88,526,82,536,74,547,56,553,80,546,48,553"  alt="sasaram" title="sasaram" onclick="show('sasaram')">

        <area shape="poly" coords="30,540,28,528,30,517,24,511,17,503,13,492,12,482,9,463,8,456,11,440,11,429,28,412,38,405,53,395,68,397,76,408,66,455,56,484,51,503,54,518,55,532,49,540" onclick="show('bhabhua')" alt="bhabhua" title="bhabhua">

        <area shape="poly" coords="108,335,119,343,133,343,134,331,143,338,137,348,138,370,134,380,128,389,124,399,113,397,103,397,87,409,71,394,77,375,79,370"  title="buxar" alt="buxar" onclick="show('buxar')" >

        <area shape="poly" coords="148,342,158,346,161,340,170,341,183,338,196,343,197,352,191,371,188,387,183,404,175,417,161,429,150,437,137,423,133,409,131,399,142,351" title="bhojpur" alt="bhojpur" onclick="show('bhojpur')" >

        
        <area shape="poly" coords="150,446,153,441,163,430,179,417,180,424,186,424,182,431,194,430,189,443,188,450,195,456,188,465,185,467,179,470,174,459,164,452,152,453" title="arwal" alt="arwal" onclick="show('arwal')">
        
        <area shape="poly" coords="206,421,215,415,220,419,231,417,239,426,236,435,236,442,236,450,239,456,241,461,239,469,232,472,220,477,209,478,199,477,192,469,195,452,194,439" title="jahanabad" alt="jahanabad" onclick="show('jahanabad')">
       
        <area shape="poly" coords="239,398,251,402,258,401,264,394,280,401,283,408,293,414,304,416,301,427,298,438,295,446,289,454,286,463,283,468,284,475,275,475,266,481,257,476,243,464,242,447,242,423,241,411" title="nalanda" alt="nalanda" onclick="show('nalanda')">
        
        <area shape="poly" coords="260,558,270,556,278,559,285,550,294,544,295,533,300,525,302,511,310,512,319,515,328,521,339,517,334,504,326,504,318,499,317,490,309,478,306,472,300,469,292,467,275,479,268,482,264,494,259,504,254,510,252,521,252,532,257,546" title="nawada" alt="nawada" onclick="show('nawada')">
        
        <area shape="poly" coords="295,456,301,464,311,473,319,477,325,470,327,459,326,442,325,434,316,435,310,431,305,426,297,448" title="shekhpura" alt="shekhpura" onclick="show('shekhpura')">
       
        <area shape="poly" coords="320,487,318,479,327,474,339,475,346,479,352,475,363,471,369,463,380,463,391,468,396,481,400,491,400,503,401,513,402,522,403,529,406,539,414,542,407,556,401,565,401,574,397,580,393,591,380,580,372,570,373,551,363,545,359,552,351,535,346,521,343,510,330,497,323,498" title="jamui" alt="jamui" onclick="show('jamui')" >
        
        <area shape="poly" coords="324,427,331,419,334,416,341,419,346,414,354,423,358,429,358,437,376,428,377,444,376,453,376,457,368,463,362,468,354,472,344,474,335,470,331,461,330,446,333,437,327,434" title="luckeesarai" alt="luckeesarai" onclick="show('luckeesarai')">
        
        <area shape="poly" coords="407,484,381,461,379,426,389,419,398,410,407,402,410,418,416,430,420,441,426,450,424,461,415,472" title="munger" alt="munger" onclick="show('munger')">
        
        <area shape="poly" coords="418,554,429,555,434,548,439,561,451,551,460,546,469,534,474,519,479,502,482,483,479,475,472,473,460,467,442,464,434,462,419,478,414,487,404,493,408,511,409,526,411,534,420,548" title="banka" alt="banka" onclick="show('banka')">

        <area shape="poly" coords="481,472,466,466,453,462,441,462,434,458,432,453,423,441,424,437,431,430,433,425,441,417,443,410,445,397,454,392,469,392,475,401,483,401,490,404,496,414,507,406,514,413,524,419,529,425,525,432,521,438,509,439,500,451,493,459" title="bhagalpur" alt="bhagalpur" onclick="show('bhagalpur')">

        <area shape="poly" coords="535,418,525,416,514,406,507,404,499,407,493,400,488,390,496,377,499,367,497,353,503,353,519,355,533,356,545,353,553,343,562,342,566,327,576,332,585,352,593,366,590,380,595,387,579,386,567,396,563,404,561,414,565,428,565,438,557,433,544,425" title="katihar" alt="katihar" onclick="show('katihar')">

        <area shape="poly" coords="482,398,475,383,469,367,471,353,467,339,472,318,474,307,492,302,502,303,514,298,523,299,535,299,545,285,552,279,570,282,566,298,565,316,562,331,556,337,547,345,539,352,519,350,502,349,493,352,495,365,491,375,488,385" title="purnia" alt="purnia" onclick="show('purnia')">

        <area shape="poly" coords="553,276,551,256,545,248,540,227,550,218,553,222,562,217,568,214,573,212,576,221,587,227,598,223,602,204,615,199,611,212,618,218,615,226,620,234,613,247,608,251,604,255,601,264,587,276,584,284,570,279" title="kishanganj" alt="kishanganj" onclick="show('kishanganj')">

        <area shape="poly" coords="474,215,483,222,496,219,498,226,504,231,512,234,509,225,517,220,523,216,528,222,533,227,537,231,540,238,544,248,549,256,547,266,549,274,545,280,540,289,537,293,529,297,520,295,510,299,498,301,490,303,484,303,481,285,480,276,481,269,480,261,475,254,474,246,477,239,478,233,474,221"  title="araria" alt="araria" onclick="show('araria')">

        <area shape="poly" coords="432,274,441,278,456,274,461,281,476,288,479,294,471,305,466,315,466,328,467,344,469,356,469,372,472,383,468,391,450,394,444,389,441,366,446,356,446,345,445,323,438,319,429,317,420,307,425,292"  title="madhepura" alt="madhepura" onclick="show('madhepura')">

        <area shape="poly" coords="423,433,412,416,414,403,409,396,401,399,391,391,386,391,380,384,377,367,376,357,387,349,394,348,400,363,413,363,425,361,431,361,439,368,442,382,442,393,441,403,439,412,432,419"  title="khagaria" alt="khagaria" onclick="show('khagaria')">

        <area shape="poly" coords="439,362,444,356,440,329,435,323,427,322,413,306,412,297,400,293,390,293,394,308,387,317,386,322,390,328,394,336,397,342,401,351,407,356,417,355,430,356" title="koshi" alt="koshi" onclick="show('koshi')">

        <area shape="poly" coords="471,189,475,207,475,229,470,244,477,261,478,277,475,280,467,278,458,272,450,273,436,273,426,281,421,290,413,292,405,285,400,278,409,273,407,265,399,259,407,253,412,238,423,230,437,215,450,215,460,201" title="supaul" alt="supaul" onclick="show('supaul')">

        <area shape="poly" coords="398,408,388,414,378,423,362,426,351,415,347,412,332,403,326,391,324,380,320,373,320,363,331,356,336,362,344,350,349,345,357,347,363,354,370,360,372,376,380,393,390,397" title="begusarai" alt="begusarai" onclick="show('begusarai')" >

        <area shape="poly" coords="198,345,205,341,210,338,224,337,232,351,241,360,254,375,266,382,279,380,290,388,307,382,316,376,327,398,330,410,325,422,317,421,308,412,290,404,282,398,263,393,252,398,236,402,232,415,220,413,199,422,185,421,190,394,199,364,201,350" title="patna" alt="patna" onclick="show('patna')">

        <area shape="poly" coords="285,373,282,361,286,346,295,338,294,327,294,314,298,299,304,287,315,293,327,302,344,314,353,317,359,319,365,329,374,343,370,350,360,345,341,345,339,352,325,355,315,368,308,375,297,381,294,385" title="samastipur" alt="samastipur" onclick="show('samastipur')">

        <area shape="poly" coords="285,307,291,316,291,330,292,337,285,346,282,356,281,371,269,378,258,370,245,360,242,350,244,340,241,323,239,312,234,288,258,302,262,307,263,311" title="hajipur" alt="hajipur" onclick="show('hajipur')">

        <area shape="poly" coords="288,305,274,302,267,301,257,300,254,290,248,284,241,284,224,286,214,278,214,271,214,256,212,250,209,241,217,229,241,228,251,231,262,227,277,235,281,227,295,230,303,244,309,267,303,282,292,293" title="muzzaffarpur" alt="muzzaffarpur" onclick="show('muzzaffarpur')">

        <area shape="poly" coords="310,211,314,224,320,220,322,231,320,242,328,244,334,240,340,238,343,246,345,252,357,260,373,264,379,273,387,290,390,304,384,319,391,341,383,346,373,334,367,319,362,319,349,312,345,308,332,302,325,294,310,285,312,265,307,250,309,235" title="darbhanga" alt="darbhanga" onclick="show('darbhanga')">

        <area shape="poly" coords="395,292,394,279,398,272,397,264,394,256,401,254,406,247,406,238,414,234,428,222,426,215,411,203,404,198,389,190,377,185,370,186,359,183,354,178,349,174,343,172,338,180,332,184,325,191,318,197,319,204,319,210,316,216,323,220,320,234,329,240,341,235,349,249,358,257,373,262,383,277,388,289" title="madhubani" alt="madhubani" onclick="show('madhubani')">

        <area shape="poly" coords="300,231,307,227,306,219,310,211,316,206,320,194,325,184,320,179,312,174,311,164,314,150,309,141,303,138,302,136,295,137,288,142,281,149,267,152,260,154,251,157,256,174,262,181,269,188,268,199,266,209,259,213,259,221,265,226,275,231,287,226" title="sitamarhi" alt="sitamarhi" onclick="show('sitamarhi')" >

        <area shape="poly" coords="195,105,200,101,206,105,209,110,217,115,222,125,228,125,228,132,236,130,242,130,246,139,247,150,250,153,253,168,253,178,250,185,250,195,243,202,246,211,253,215,256,222,248,225,241,227,213,229,208,237,202,237,197,229,193,224,191,219,184,208,176,205,165,194,162,184,167,170,178,162,190,159,193,137,188,132,189,120" title="purba champaran " alt="purba champaran" onclick="show('purba champaran')">

        <area shape="poly" coords="248,210,248,202,254,171,259,179,265,187,266,195,263,205,259,215,257,221" title="shivhar" alt="shivhar" onclick="show('shivhar')">

        <area shape="poly" coords="97,21,103,17,108,22,120,5,130,17,143,32,159,38,169,40,183,49,186,72,185,86,188,98,193,108,187,120,190,139,190,151,186,157,177,161,173,164,165,172,163,182,158,176,153,175,147,164,142,160,141,154,133,151,132,141,133,129,126,127,117,122,114,123,110,113,111,100,107,94,105,84,97,88,101,67,97,56" title="paschim champaran" alt="paschim champaran" onclick="show('paschim champaran')">

        <area shape="poly" coords="99,202,91,201,87,190,90,183,101,185,110,183,111,169,124,171,132,177,140,173,149,172,159,183,166,198,178,209,183,225,177,230,170,229,157,216,146,220,145,228,138,226,129,222,119,216,109,214,103,210,101,207" title="gopalganj" alt="gopalganj" onclick="show('gopalganj')">

        <area shape="poly" coords="120,222,120,237,114,235,107,244,103,240,97,247,103,260,106,267,111,271,116,285,128,291,138,295,146,303,154,311,157,297,153,284,153,277,166,278,170,263,175,254,175,243,172,232,164,227,158,223,151,221,151,226,146,230,135,228,125,222" title="siwani" alt="siwani" onclick="show('siwani')">

        <area shape="poly" coords="181,212,209,252,211,265,210,275,210,286,218,294,224,292,231,304,233,318,242,337,241,352,236,356,232,348,227,339,216,335,211,337,203,339,197,342,188,337,175,336,168,336,165,325,161,314,156,308,159,298,155,279,167,281,175,259,178,245,178,234,179,230,183,222" title="saran" alt="saran" onclick="show('saran')">
      </map>
      </div>
<div id="d1" style="background: Green none repeat scroll 0% 0%;width: 550px;color: White;font-weight: bolder;border: 2px solid black;padding: 3px;position: absolute;z-index: 99;
    left: 529px;top: 225px;display: none;
"><div><span class="close" onclick="$('#d1').fadeOut();" style="cursor:pointer; background:black; color:White; border:solid 1px red; float:right">X</span>Current Stock of <span id="place_ids_name"></span></div>
 <div id="divstock" style="background-color:Blue; color:White; font-size:14px;">
  </div>
</div>
       
      

            <!-- 275px -->
        <div class="col-sm-2 well">  
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="background-color: #C39610; color: black;">User Login</div>
                <div class="panel-body" style="height:247px ;">
                    <form class="form-horizontal" action="login_checker.php" method="POST" A> 
                    <div class="text-center">
                       <small> <?php $msg->display(); ?></small>
                     </div>                    
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="email" required  autocomplete="off"  type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" required="" autocomplete="off"  type="password" class="form-control" name="password" placeholder="Password">
                                 <input   autocomplete="off"  type="hidden" class="form-control" name="user_form" value="login_allowed" placeholder="Password">
                            </div>
                        </div>                      
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Registered User Login</button><br>
                                <a style="margin-top: 10px;" href="guest_user/index.php" class="btn btn-success btn-sm">Guest Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>   
            <!-- <hr class="divide" style="border-top: 1px solid #aa1e1e;"> -->
           
            <hr class="divide" style="border-top: 1px solid #aa1e1e;">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="background-color: #6BF850; color: black;"><p style=" font-family: 'myriad-pro',arial; font-size: 19px;">Current Statistics of Bihar:</p></div>
                <div class="panel-body" style="height: 200px;">
                <!-- height 206px -->
                    <div class="table-responsive">
                        <table class="table">
                        <tbody style="font-size: 12px">
                            <tr>
                                <td>No of indents</td>
                                <td>:-</td>
                                <td><small>  <span id="divstock1"></span></small> </td>
                            </tr>
                            <tr>
                                <td>No of Issue</td>
                                <td>:-</td>
                                <td><small> <span id="divstock2"></span></small> </td>
                            </tr>
                            <tr>
                                <td>No of Facilities with Stock-Outs</td>
                                <td>:-</td>
                                <td><small><span id="divstock3"></span></small> </td>
                            </tr>
                           <!--  <tr>
                                <th>Total Stock out :- </th>
                                <th> 0 </th>
                            </tr> -->
                            <tr>
                                <td>Total Distribution</td>
                                <td>:-</td>
                                <td> 0 </td>
                            </tr>
                        </tbody>

                        </table>
                    </div>
                    <!-- <label>1. Total indent :- </label> 0<br>
                    <label>2. Total Issue :- </label> 0<br>
                    <label>3. Total Stock level :- </label>0<br>
                    <label>4. Total Stock out :- </label>0<br>
                    <label>5. Total Distribution :- </label>0<br> -->
                </div>
            </div>

        </div>
      
   
        <!-- <div class="container">
            <div class="row"> -->
                <div class="col-sm-8 well">
                 
            <div class="row" style="border:2px solid #b3172d">
                <div class="col-sm-3" style="background-color: rgb(192, 10, 10); ">
                    <div class="panel-heading text-center" style="color: #c2ed79;"><strong>Latest News</strong></div>
                </div>
                <div class="col-sm-9 ">
                    <div >
                        <ul id="ticker01">
                            <li><a href="">"Public Notice in Compliance of Hon'ble Supreme Court Directions Vide Order Dated 16.11.2016 regarding PC&PNDT Act 1994."  <strong><i>Demo</i></strong></a></li>
                            <li><a href="">"  Format for the compensation under Mukhya Mantri Kala-Azar Rahat Yojna.     " - <strong><i>Demo</i></strong></a></li>
                            <li><a href="">"  LT_NO_31085 - Financial Power to Hospital & Block Health Manager" - <strong><i>Demo</i></strong></a></li>
                        </ul>
                    </div>
                </div>  
                </div>         
                </div>
      <!-- <div class="panel panel-default">
                <div class="panel-heading text-center" style="background-color: rgb(116,44,44); color: black; ">Latest News</div>
                <div class="panel-body" style="height: 90px;">            
                    <div id="ticker-box">
                        <ul>
                            <li><a href="">"You've gotta dance like there's nobody watching, Love like you'll never be hurt, Sing like there's nobody listening, And live like it's heaven on earth" - <strong><i>William W. Purkey</i></strong></a></li>
                            <li>"Be the change that you wish to see in the world." - <strong><i>Mahatma Gandhi</i></strong></li>
                            <li>"There are only two ways to live your life. One is as though nothing is a miracle. The other is as though everything is a miracle." - <strong><i>Albert Einstein</i></strong></li>
                        </ul>
                    </div>
                </div>
            </div> -->
                </div>
            <!-- </div>
        </div> -->
</div>

<style type="text/css">
#mar_info{
        margin-top: -19px;
    }
</style>
<div id="mar_info">
<!-- <div id="mar_info">
         <div class="container-fluid well">
            <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="col-sm-12 well"> 
           
             <div class="row">
          
                <div class=" col-sm-3">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <i class="fa fa-info-circle"></i>
                        </div>
                        <div class="service-content">
                            <h3 class="title">General Information</h3>                          
                        </div>
                    </div>
                </div>
         
                <div class="col-sm-3">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <i class="fa fa-comments-o"></i>
                          
                        </div>
                        <div class="service-content">
                            <h3 class="title">Beneficiary feedback/ Suggestions/ Grievances</h3>                        
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <i class="fa fa-file-image-o"></i>
                        </div>
                        <div class="service-content">
                            <h3 class="title">Articles related to Reproductive Health</h3>                           
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <div class="service-content">
                            <h3 class="title">Learn about commodities</h3>                            
                        </div>
                    </div>
                </div>               
            </div>            
        </div>
    </div>
        <div class="col-sm-1"></div>
    </div>
 
</div> -->
<div class="container-fluid" style="padding:19px 19px 0px 19px;"> 
<div class="row">    
<div class="col-sm-12" >

    <div class="panel panel-default" style=" background: -moz-linear-gradient(top, #BFBCBC, #7A7878); background-image: linear-gradient(to bottom, #C6C5C5 0%, #5D5D5D 100%);" >
    <!-- <span style="border:1px solid blue;"> -->
        <div class="panel-body " style="border:1px solid blue;"">
        <div class="row">
        <span class="text-center">
            <h2 class="text-effect" style="color: #651616; margin-top: 0px; margin-bottom: 0px;"><b> Know Us Better</b></h2>
        </span>
        </div>
        <div class="row">
  <span >

<nav id="ids_me1"  class="navbar navbar-default bootsnav" style="background-color:#98bf21; top:15px ">

       
        <!-- End Top Search -->
        <!-- <div class="container-fluid" >    -->         
            <!-- Start Atribute Navigation -->        

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu" >
                <ul class="nav navbar-nav navbar-center text-center" data-in="fadeInDown" data-out="fadeOutUp" >
                   <!--  <li class="active"><a href="#" title="Home"><i class="fa fa-home" aria-hidden="true"></i></a></li> -->
                   <!--  <li class=""><a href="#" title="About RHCLMIS"><small>Know us better!!!</small></a></li> -->
                    <li style="font-size: 15px;"><a href="excel_files.php?stock=2" class="text-nowrap" title="General Information"><small>General Information</small></a></li>
                     <li style="font-size: 15px;"><a href="#" title="Beneficiary feedback/ Suggestions/ Grievances"><small>Beneficiary feedback/ Suggestions/ Grievances</small></a></li>
                     <li style="font-size: 15px;"><a href="#" title="Articles On Reproductive Health"><small>Articles On Reproductive Health</small></a></li>
                      <li style="font-size: 15px;"><a href="#" title="Learn about commodities"><small>Learn about commodities</small></a></li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
      <!--   </div>    -->

        
    </nav>
    </span>
    </div>
    </div>
  
     </div>
     <!-- </span> -->
</div>
</div>
</div>
<!-- 
<footer class="container-fluid text-center">
  
</footer>
 -->

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
    var leftVal;
        var topVal;
        $(document).mousemove(function(e) {
            leftVal =   "5px";
            topVal = e.pageY-100  + "px"; 
            alert       
        });
     function show(did) {
        // alert(did);
            $('#d1').css({ left: leftVal, top: topVal }).fadeIn(1000);
            var name_place=capitalizeFirstLetter(did);
            $('#place_ids_name').html(name_place);
             $.ajax({
                type:'POST',
                url:'data.php',
                data:{place:did},
                success:function(html){  
                  if(html){
                  $('#divstock').html(html);
                  // get_quantity(id)
                  // check_ajax++;
                 
                   }
                    // if(html){
                    //     document.getElementById("myerror"+id).innerHTML = "";
                    //     return false;
                    //     // $("#reli").submit(); 
                    // }else{
                    //     document.getElementById("myerror"+id).innerHTML = "Class Is Present In Our Records ,"+class_name;
                    //     return false;
                    // }
                }
            });
            // $('#divstock').html(data.php?did='?did');
        }
        function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
var did1=1;
$( document ).ready(function() {
    $.ajax({
                type:'POST',
                url:'data_get.php',
                data:{Status:did1},
                success:function(html){  
                  if(html){
                  $('#divstock1').html(html);
                  // get_quantity(id)
                  // check_ajax++;
                 
                   }
                    // if(html){
                    //     document.getElementById("myerror"+id).innerHTML = "";
                    //     return false;
                    //     // $("#reli").submit(); 
                    // }else{
                    //     document.getElementById("myerror"+id).innerHTML = "Class Is Present In Our Records ,"+class_name;
                    //     return false;
                    // }
                }
            });
});
var did3=3;
$( document ).ready(function() {
    $.ajax({
                type:'POST',
                url:'data_get.php',
                data:{Status:did3},
                success:function(html){  
                  if(html){
                  $('#divstock3').html(html);
                  // get_quantity(id)
                  // check_ajax++;
                 
                   }
                    // if(html){
                    //     document.getElementById("myerror"+id).innerHTML = "";
                    //     return false;
                    //     // $("#reli").submit(); 
                    // }else{
                    //     document.getElementById("myerror"+id).innerHTML = "Class Is Present In Our Records ,"+class_name;
                    //     return false;
                    // }
                }
            });
});
var did2=2;
$( document ).ready(function() {
    $.ajax({
                type:'POST',
                url:'data_get.php',
                data:{Status:did2},
                success:function(html){  
                  if(html){
                  $('#divstock2').html(html);
                  // get_quantity(id)
                  // check_ajax++;
                 
                   }
                    // if(html){
                    //     document.getElementById("myerror"+id).innerHTML = "";
                    //     return false;
                    //     // $("#reli").submit(); 
                    // }else{
                    //     document.getElementById("myerror"+id).innerHTML = "Class Is Present In Our Records ,"+class_name;
                    //     return false;
                    // }
                }
            });
});
</script>

     
   
  </body>
</html>