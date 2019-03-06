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
                    <li class="active"><a href="#" title="Home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li class=""><a href="#" title="About RHCLMIS"><small>About</small></a></li>
                    <li ><a href="#" class="text-nowrap" title="Reproductive Health Commodities"><small>RHC</small></a></li>
                     <li><a href="#" title="Newsroom and Stories"><small>Newsroom & Stories</small></a></li>
                     <li><a href="#" title="Guidelines"><small>Guidelines</small></a></li>
                      <li><a href="#" title="Contact Us"><small>Contact Us</small></a></li>
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
.table-fixed tbody td {
  float: left;
  font-size: 12px;
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
                                <a href="#"><img src="home/img/temp/3.jpg" width="90%" style="height: 180px;" /></a>
                                <p class="flex-caption text-center">Improving the availability of reproductive health commodities in Bihar connecting demand and supply</p>
                            </li>
                            <li>
                                <img src="home/img/temp/4.jpg" width="90%" style="height: 180px;" />
                                <p class="flex-caption text-center">Improving the availability of reproductive health commodities in Bihar: Connecting demand and supply</p>
                            </li>
                            <li>
                                <img src="home/img/temp/6.jpg" width="90%" style="height: 180px;" />
                                <p class="flex-caption text-center">Improving the availability of reproductive health commodities in Bihar: Connecting demand and supply</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
                        <hr class="divide" style="border-top: 1px solid #aa1e1e;">
            <div class="panel panel-default" style="margin-bottom: -12px;" >
                <div class="panel-heading text-center" style="background-color: #F4A5EA;"><p style=" font-family: 'myriad-pro',arial;   font-size: 17px;">Current Stock of Bihar:</p></div>
                <div class="panel-body" style="">
                    <div class="table-responsive">
                        <table class="table table-fixed">
                            <thead  style="font-size: 10px">
                                <tr>
                                    <th class="col-xs-3 text-center">Item Name </th>
                                    <th class="col-xs-3 text-center">Type</th>
                                    <th class="col-xs-3 text-center">Quantity</th>
                                    <th class="col-xs-3 text-center">Unit</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="font-size: 10px; ">
                                <tr >
                                    <td class="col-xs-3">Chhaya</td>
                                    <td class="col-xs-3">Free</td>
                                    <td class="col-xs-3">0</td>
                                    <td class="col-xs-3">Strip</td> 
                                </tr>
                                <tr >
                                    <td class="col-xs-3">Antara</td>
                                    <td class="col-xs-3">Free</td> 
                                    <td class="col-xs-3">0</td>  
                                    <td class="col-xs-3">Vial</td> 
                                </tr>
                                <tr>
                                    <td class="col-xs-3">NIRODH</td>
                                    <td class="col-xs-3">Paid</td> 
                                    <td class="col-xs-3">135510</td>  
                                    <td class="col-xs-3">Piece</td> 
                                </tr>
                                <tr>
                                    <td class="col-xs-3">NIRODH</td>
                                    <td class="col-xs-3">Free</td> 
                                    <td class="col-xs-3">81800</td>  
                                    <td class="col-xs-3">Piece</td> 
                                </tr>
                                <tr>
                                    <td class="col-xs-3">MALA-N</td>
                                    <td class="col-xs-3">Paid</td> 
                                    <td class="col-xs-3">34100</td>  
                                    <td class="col-xs-3">Cycle</td> 
                                </tr>
                                <tr>
                                    <td class="col-xs-3">MALA-N</td>
                                    <td class="col-xs-3">Free</td> 
                                    <td class="col-xs-3">13200</td>  
                                    <td class="col-xs-3">Cycle</td> 
                                </tr>
                                <tr>
                                    <td class="col-xs-3">CU-T 380-A</td>
                                    <td class="col-xs-3">Free</td> 
                                    <td class="col-xs-3">5210</td>  
                                    <td class="col-xs-3">Piece</td> 
                                </tr>
                                <tr>
                                    <td class="col-xs-3">TUBAL RING</td>
                                    <td class="col-xs-3">Free</td> 
                                    <td class="col-xs-3">5260</td>  
                                    <td class="col-xs-3">Pair</td> 
                                </tr>
                                <tr>
                                    <td  class="col-xs-3">NISCHAY KIT</td>
                                    <td class="col-xs-3">Free</td> 
                                    <td class="col-xs-3">33660</td>  
                                    <td class="col-xs-3">Piece</td> 
                                </tr>
                                <tr>
                                    <td class="col-xs-3">IUD-375</td>
                                    <td class="col-xs-3">Free</td> 
                                    <td class="col-xs-3">5300</td>  
                                    <td class="col-xs-3">Piece</td> 
                                </tr>
                                <tr>
                                    <td class="col-xs-3">EC PILL</td>
                                    <td class="col-xs-3">Free</td> 
                                    <td class="col-xs-3">25950</td>  
                                    <td class="col-xs-3">Tab</td> 
                                </tr>
                                <tr>
                                    <td class="col-xs-3">EC PILL</td>
                                    <td class="col-xs-3">Paid</td> 
                                    <td class="col-xs-3">9880</td>  
                                    <td class="col-xs-3">Tab</td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
        </div> 
        <div class="col-sm-6 " style="margin-top: 30px;" >       
            <img src="home/img/2.jpeg" class="img-responsive" style=" border: 1px solid black; height: 606px"   alt="Avatar">      
       
        </div>

            
        <div class="col-sm-2 well">  
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="background-color: #C39610; color: black;">User Login</div>
                <div class="panel-body" style="height: 275px;">
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
                                <a style="margin-top: 10px;" href="#" class="btn btn-success btn-sm">Guest Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>   
            <!-- <hr class="divide" style="border-top: 1px solid #aa1e1e;"> -->
           
            <hr class="divide" style="border-top: 1px solid #aa1e1e;">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="background-color: #6BF850; color: black;"><p style=" font-family: 'myriad-pro',arial; font-size: 17px;">Current Statistics of Bihar:</p></div>
                <div class="panel-body" style="height: 168px;">
                <!-- height 206px -->
                    <div class="table-responsive">
                        <table class="table">
                        <tbody style="font-size: 12px">
                            <tr>
                                <td>Number of indents :- </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td>Number of Issue :- </td>
                                <td> 0 </td>
                            </tr>
                            <tr>
                                <td>Number of Facilities with Stock-Outs :- </td>
                                <td> 0 </td>
                            </tr>
                           <!--  <tr>
                                <th>Total Stock out :- </th>
                                <th> 0 </th>
                            </tr> -->
                            <tr>
                                <td>Total Distribution :- </td>
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
                            <li><a href="">"You've gotta dance like there's nobody watching, Love like you'll never be hurt, Sing like there's nobody listening, And live like it's heaven on earth" - <strong><i>William W. Purkey</i></strong></a></li>
                            <li><a href="">"Be the change that you wish to see in the world." - <strong><i>Mahatma Gandhi</i></strong></a></li>
                            <li><a href="">"There are only two ways to live your life. One is as though nothing is a miracle. The other is as though everything is a miracle." - <strong><i>Albert Einstein</i></strong></a></li>
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

    <div class="panel panel-default" >
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
                    <li ><a href="#" class="text-nowrap" title="General Information"><small>General Information</small></a></li>
                     <li><a href="#" title="Beneficiary feedback/ Suggestions/ Grievances"><small>Beneficiary feedback/ Suggestions/ Grievances</small></a></li>
                     <li><a href="#" title="Articles On Reproductive Health"><small>Articles On Reproductive Health</small></a></li>
                      <li><a href="#" title="Learn about commodities"><small>Learn about commodities</small></a></li>
                    
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
</script>

     
   
  </body>
</html>