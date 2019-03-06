<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8"/>
      <meta name="author" content="Preetish" />
      <meta name="description" content="Software Development And GIS Survey">
      <meta name="keywords" content="Innovadors Lab , Innovadorslab.com, innovadorslab.com,innovadorslab.co.in,Innovadorslab.co.in, Ilab">    
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <title>Innovadors Lab </title>
          <!-- Royal Preloader CSS -->
      <link href="css/royal_preloader.css" rel="stylesheet">
          <!-- <link href="css/mystyles.css" rel="stylesheet"> -->
      <link href="css/mystyle.css" rel="stylesheet">
      
          <!-- <script src="../libs/jquery/jquery.js"></script> -->
          
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <!-- Stylesheets -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/ionicons.min.css" rel="stylesheet">
      <link href="css/pe-icon-7-stroke.css" rel="stylesheet">
      <link href="css/magnific-popup.css" rel="stylesheet">
      <link href="css/logoiconfont.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet" title="base-light">
      <!-- RS5.0 Main Stylesheet -->
      <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
       
      <!-- RS5.0 Layers and Navigation Styles -->
      <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
      <link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">
      <!-- Style Switcher / remove for production -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    
      <link rel="alternate stylesheet" type="text/css" href="css/base-light.css" title="base-light">
          <!-- jQuery Files -->
      <script src="js/jquery.min.js"></script>
          <!-- Parallax File -->
      <script  src="js/parallax.min.js"></script>
          <!-- Royal Preloader -->
      <script  src="js/royal_preloader.min.js"></script>
 <!-- Global site tag (gtag.js) - Google Analytics -->
         <!-- Global site tag (gtag.js) - Google Analytics -->
       
              <!-- End Google Tag Manager -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118160902-1"></script>
      <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118160902-1');
      </script>
    <!-- Google Tag Manager -->
      <script type="text/javascript">
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-548DF76');
    </script>
            
    <style type="text/css">
       div.demo{
        position: relative;
        width: 100%;
        min-height: auto;
        overflow-y: hidden;
        background: url("img/stribes/bg-pattern.png"), #7b4397;
        /* fallback for old browsers */
        background: url("img/stribes/bg-pattern.png"), -webkit-linear-gradient(to left, #147bd1, #5a8caf);
        /* Chrome 10-25, Safari 5.1-6 */
        background: url("img/stribes/bg-pattern.png"), linear-gradient(to left, #147bd1, #5a8caf);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
        opacity: 0.8;
      }
      .error{
        color: blue;
      }
    </style>
    <script type="text/javascript">
    Royal_Preloader.config({
        mode:           'number',
        showProgress:   false,
        background:     '#0000'
    });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Name', '%'],
              ['GIS',     11],
              ['WEB-GIS',    11],
              ['CAD',  11],
              ['MapInfo', 11],
              ['Map Guide',  11]
            ]);

            var options = {
                
              title: 'G.I.S Expertise',
               is3D: true,
               pieSliceText: 'label',
               backgroundColor:'#aeaeae',


            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
          }
        </script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Name', '%'],
              ['PHP',   11],
              ['Android', 11],
              ['Rubby',  11],
              ['Open Source Database', 11],
              ['Design',  11]
            ]);

            var options = {
              title: 'Software Expertise',
              pieHole: 1.4,
               pieSliceText: 'label',
               backgroundColor:'#aeaeae',

            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
          }
        </script>
                <script type="text/javascript">
                  google.charts.load("current", {packages:["corechart"]});
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Name', '%'],
                      ['Banking',11],
                      ['Business Mapping',11],
                      ['Census Data Mapping',11],
                      ['Enterprise GIS',11],
                      ['Franchise Mapping',11],
                      ['GIS Mapping',11],
                      ['GPS Mapping',11],
                      ['Health Care',11],
                      ['Insurance',11],
                      ['Law Enforcement',11],
                      ['Location Intelligence',11],
                      ['MapPoint Alternative',11],
                      ['Marketing & Sales',11],
                      ['Real Estate',11],
                      ['Redistricting',11],
                      ['Retail Mapping',11],
                      ['Route Planning',11],
                      ['Satellite & Aerial Imagery',11],
                      ['Site & Facility Location',11],
                      ['Street Mapping',11],
                      ['Territory Mapping',11],
                      ['Tribal Affairs',11],
                      ['Tribal Affairs',11],
                      ['FMCG',11],
                    ]);

                    var options = {
                      title: 'G.I.S Domain',
                      titleTextStyle:{color: 'blue', alignment:"center", italic: true  , fontSize: 17}, 
                      // width:600,
                      //stroke:'#666',
                      backgroundColor:'#aeaeae',
                      // legend: 'none',
                      pieSliceText: 'label',
                      slices: {  2: {offset: 0.2},
                                4: {offset: 0.3},
                                6: {offset: 0.4},
                                8: {offset: 0.5},
                                 0: {offset: 0.5},
                                 10: {offset: 0.5},
                                 12: {offset: 0.5},
                                 14: {offset: 0.5},
                                 16: {offset: 0.5},
                                 18: {offset: 0.5},
                                 20: {offset: 0.5},
                                 22: {offset: 0.5},
                      },
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                    chart.draw(data, options);
                  }
                </script>
                <script type="text/javascript">
                  google.charts.load("current", {packages:["corechart"]});
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Name', '%'],
                      ['EDUCATION',   11],
                      ['HEALTH CARE', 11],
                      ['E-GOVERNANCE',  11],
                      ['RETAIL & COMMERCIAL', 11],
                      ['ENERGY & POWER',  11],
                      ['E-COMMERCE',  11]
                    ]);

                    var options = {
                      title: 'Software Domain',
                      pieHole: 0.2,
                       pieSliceText: 'label',
                         titleTextStyle:{color: 'blue', alignment:"center", italic: 1  , fontSize: 17}, 
                        backgroundColor:'#aeaeae',
                       // width:600,


                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
                    chart.draw(data, options);
                  }
                </script>
               
                


        </head>
        <body class="royal_preloader" data-spy="scroll" data-target=".navbar" data-offset="70">
          <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-548DF76"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            <div id="royal_preloader"></div>
            
            <!-- Begin Header -->
            <header>
                <!-- Begin Navigation -->
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="row">
                        <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand scroll-link" href="#home" data-id="home">
                                    <img src="img/logo4.png" width="150px">
                                    <!-- <span class="icon-handle-streamline-vector logo"></span> -->
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#home" data-id="home" class="scroll-link">Home</a></li>
                                    <li><a href="#ideology" data-id="ideology" class="scroll-link">Core Values</a></li>                    
                                    <li><a href="#about" data-id="about" class="scroll-link">About</a></li>
                                    <li class="dropdown"><a href="#services" data-id="services" class="scroll-link"> Services <span class="glyphicon glyphicon-menu-down"></span></a>
                                      <ul class="dropdown-menu" style="margin-right: -71px;">
                                      <li><a href="#" data-toggle="modal" data-target="#item1-services">Web Design & Application </a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#item2-services">Mobile Applications </a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#item3-services">GIS SERVICES</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#item7-services">Training </a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#item8-services">Support</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#item9-services">Consultancy</a></li>
                                      </ul>
                                    </li>
                                     <li class="dropdown"><a href="#">Expertise <span class="glyphicon glyphicon-menu-down"></span></a>
                                        <ul class="dropdown-menu" style="margin-right: -71px;">
                                            <li><a href="#Expertize" data-id="Expertize" class="scroll-link">PlatForm Expertise</a></li>
                                            <li><a href="#Domain-expert" data-id="Domain-expert" class="scroll-link">Domain Expertise</a></li>
                                            <li><a href="#Glance" data-id="Glance" class="scroll-link">Experience Our Efforts</a></li>
                                        </ul>                                        
                                        <!-- <li><a href="#testimonial" data-id="testimonial" class="scroll-link">Client Says</a></li> -->
                                    <li><a href="#work" data-id="work" class="scroll-link">Portfolio</a></li>
                                    <!-- <li><a href="#team" data-id="team" class="scroll-link">Team</a></li> -->
                                    <li><a href="#contact" data-id="contact" class="scroll-link">Contact</a></li>
                                    <li><a href="career_page.php">Careers</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-menu-down"></span></a>
                                        <ul class="dropdown-menu">
                                          <li><a href="csr.php">CSR</a></li>

                                           <!--  <li><a href="#">Pricing Options</a></li>
                                            <li><a href="#">Team Options</a></li>
                                            <li><a href="#">Demos</a></li>
                                            <li><a href="#" target="_blank">Purchase</a></li> -->
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                    </div><!-- /.container-fluid -->
                </nav>
                <!-- End Navigation -->
            </header>
            <!-- End Header -->
            <!-- Start Slider Revolution -->
               <!--    </section> -->
         <style type="text/css">
           .carousel-caption {
  position: relative;
  left: 0%;
  right: 0%;
  bottom: 0px;
  z-index: 10;
  padding-top: 0px;
  padding-bottom: 0px;
  color: #000;
  text-shadow: none;
  & .btn {
    text-shadow: none; // No shadow for button elements in carousel-caption
  }
}

.carousel {
    position: relative;
}

.controllers {
    position: absolute;
    top: 0px;
}

.carousel-control.left, 
.carousel-control.right {
    background-image: none;
    margin-top: 150px;
}
.blue {
    color: blue;
}
.background22 {
    background-color: #333;
    color: white;
}

.md-macbook-pro {
  display: block;
  width: 55.3125em;
  height: 31.875em;
  font-size: 13px;
  margin: 0 auto;

  @media (max-width:1199px){
    font-size: 11px;
  }
  @media (max-width:1024px){
    font-size: 10px;
  }

  @media (max-width:767px){
    font-size: 7px;
  }

  @media (max-width:320px){
    font-size: 5px;
  }

}
.md-macbook-pro .md-lid {
  width: 45em;
  height: 30.625em;
  overflow: hidden;
  margin: 0 auto;
  position: relative;
  border-radius: 1.875em;
  border: solid 0.1875em #cdced1;
  background: #131313;
}
.md-macbook-pro .md-camera {
  width: 0.375em;
  height: 0.375em;
  margin: 0 auto;
  position: relative;
  top: 1.0625em;
  background: #000;
  border-radius: 100%;
  box-shadow: inset 0 -1px 0 rgba(255, 255, 255, 0.25);
}
.md-macbook-pro .md-camera:after {
  content: "";
  display: block;
  width: 0.125em;
  height: 0.125em;
  position: absolute;
  left: 0.125em;
  top: 0.0625em;
  background: #353542;
  border-radius: 100%;
}
.md-macbook-pro .md-screen {
  width: 42.25em;
  height: 26.375em;
  margin: 0 auto;
  position: relative;
  top: 2.0625em;
  // background: #1d1d1d;
  background: #fff;
  overflow: hidden;
}
.md-macbook-pro .md-screen img {
  width: 100%;
}
.md-macbook-pro .md-base {
  width: 100%;
  height: 0.9375em;
  position: relative;
  top: -0.75em;
  background: #c6c7ca;
}
.md-macbook-pro .md-base:after {
  content: "";
  display: block;
  width: 100%;
  height: 0.5em;
  margin: 0 auto;
  position: relative;
  bottom: -0.1875em;
  background: #b9babe;
  border-radius: 0 0 1.25em 1.25em;
}
.md-macbook-pro .md-base:before {
  content: "";
  display: block;
  width: 7.6875em;
  height: 0.625em;
  margin: 0 auto;
  position: relative;
  background: #a6a8ad;
  border-radius: 0 0 0.625em 0.625em;
}
.md-macbook-pro.md-glare .md-lid:after {
  content: "";
  display: block;
  width: 50%;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  border-radius: 0 1.25em 0 0;
  background: -webkit-linear-gradient(37deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
  background: -moz-linear-gradient(37deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
  background: -o-linear-gradient(37deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
  background: linear-gradient(53deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
}
         </style>
         <section class="background22 section-padding">
         <div class="container-fluid">
         <div class="row">
         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
            <div class="col-sm-5">
                <div class="carousel-caption">
                    <h2 class="text-uppercase"  style="color: #0ecb0e">WELCOME</h2>
                    <p class="text-left text-small" style="color: white">Innovadors Lab was found in the year 2009 with an objective to bridge the gap between idea and innovation through Technology. We focus on Software Solution and Geo Spatial Solutions.
                    </p>
                    <!-- <button type="button" class="btn btn-default">Default</button>     -->
                </div>
              </div>
              <div class="holder col-sm-7">
              <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                <img class="img-responsive" src="img/home_baner/build_up.jpg" alt="..." style="height: 357px;">
                </div>
                </div>
                <div class="md-base"></div>
                </div>
              </div>
              
            </div>

            <div class="item">
              <div class="holder col-sm-7">
              <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                <img class="img-responsive" src="img/processmethods/1.jpg" alt="..." style="height: 357px;">
                </div>
                </div>
                <div class="md-base"></div>
                </div>
                <!--  -->
            </div> <!-- end macbook pro mockup -->
              
              <div class="col-sm-5">
                <div class="carousel-caption">
                    <h2 class="text-uppercase"  style="color: #0ecb0e">Agile Methodology</h2>
                    <p class="text-small" style="color: white">We understand END-USER deliverables that are task Oriented and help the user Perform at an Expert level become a necessary and valued part of the success of an application.</p>
                    <!-- <button type="button" class="btn btn-default">Default</button>     -->
                </div>
              </div>
            </div>
            <div class="item">
            <div class="col-sm-5">
                <div class="carousel-caption">
                    <h2 class="text-uppercase"  style="color: #0ecb0e">Dev-Ops</h2>
                    <p class="text-left text-small" style="color: white">Our Proccess improves collaboration between all stakeholders from planning through delivery and automation of the delivery processin order to :-
                    <li class="text-left text-small" style="color: white">improve deployment frequency </li>
                    <li class="text-left text-small" style="color: white">achieve faster time to market</li>
                    <li class="text-left text-small" style="color: white">lower failure rate of new releases</li>
                    <li class="text-left text-small" style="color: white">shorten lead time between files</li>
                    <li class="text-left text-small" style="color: white">Improve mean time to recovery</li> 
                    </p>
                    <!-- <button type="button" class="btn btn-default">Default</button>     -->
                </div>
              </div>
              <div class="holder col-sm-7">
              <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                <img class="img-responsive" src="img/processmethods/4.jpg" alt="..." style="height: 357px;">
                </div>
                </div>
                <div class="md-base"></div>
                </div>
              </div>
              
            </div>
            <div class="item">
              <div class="holder col-sm-7">
              <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                <img class="img-responsive" src="img/work/net/1.png" alt="..." style="height: 357px;">
                </div>
                </div>
                <div class="md-base"></div>
                </div>
                <!--  -->
            </div> <!-- end macbook pro mockup -->
              
              <div class="col-sm-5">
                <div class="carousel-caption">
                    <h2 class="text-uppercase"  style="color: #0ecb0e">RHCLMIS</h2>
                    <p class="text-small" style="color: white">
                      It is a multi-tier Logistics Management System for Medicines. 
                      <blockquote class="blockquote-reverse">
                      <footer style="color: gold">Managing Medicine Stocks Of <cite title="Source Title">Govt. Of Odisha.</cite></footer>
                    </blockquote>
                    </p>
                    <!-- <button type="button" class="btn btn-default">Default</button>     -->
                </div>
              </div>
            </div>
            <div class="item">
            <div class="col-sm-5">
                <div class="carousel-caption">
                    <h2 class="text-uppercase"  style="color: #0ecb0e">Students Information Management System</h2>
                    <p class="text-left text-small" style="color: white">A software application for schools and universities to manage student data. Capabilities of these student databases include family history,admission details ,attendance, behavioural and medical information,vocational training as well as storing assessment information.
                    <blockquote class="blockquote-reverse">
                    <!-- <<p class="text-left text-small" style="color: white"> 
                   

                    </p> -->
                     <footer style="color: gold"> Managing Student Information System Of <cite title="Source Title">Kalinga Institute of Social Sciences (KISS)</cite></footer>
                    </blockquote>
                    
                    </p>
                    <!-- <button type="button" class="btn btn-default">Default</button>     -->
                </div>
              </div>
              <div class="holder col-sm-7">
              <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                <img class="img-responsive" src="img/work/php/1.png" alt="..." style="height: 357px;">
                </div>
                </div>
                <div class="md-base"></div>
                </div>
              </div>
              
            </div>
            
            </div>
            <div class="controllers col-sm-8 col-xs-12">
            <!-- Controls -->
              <!-- <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left blue"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right blue"></span>
              </a> -->
              <!-- Indicators -->
             <!--  <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>  -->
            </div>
            </div>
            </div>
            </div>
            </section>
            <!-- /rev slider -->
            <!-- End Slider Revolution -->

            <!-- Begin Intro -->
            <!-- <section id="ideology"> -->
                <!-- Begin Hello Intro -->
                <!-- <div id="hello-intro" class="pt60 pb60"> -->
                    <!-- <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-sm-3">
                                <h2 class="no-margin rotateLeftReveal">Hello.</h2>
                            </div>
                            <div class="col-lg-10 col-sm-9 mt30-xs">
                                <h3 class="no-margin rightReveal"><strong>Innovadors Lab </stong> was founded in the year 2009 with an objective to bridge the gap between idea and innovation through Technology. We focus on Software Solution and Geo Spatial Solutions.</h3>
                            </div>
                        </div> -->
                        <!-- /.row -->
                    <!-- </div> -->
                    <!-- /.container -->
                <!-- </div>
                </section> -->
                <!-- /.div -->
                <!-- End Hello Intro -->
                <!-- our Process -->
                <div id="our-process-title" class="pt30 pb30">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h3 class="no-margin"><b>Core Values and Principles</b></h3>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </div>
                <br>
                <div class="[ container text-center ]">
                    <div class="[ row ]">
                        <div class="[ col-xs-12 ]" style="padding-bottom: 30px;">
                            <p>I-Lab has brought together varied talents from diverse backgrounds. This has given us a strong foundation to pursue our vision and mission with key values & principles of: </p>
                        </div>
                    </div>
                </div>
                <!-- 2pree -->
               
                <div class="container-fluid" id="corevalues" >
                <section id="service1" class="section section-padded">
                  <div class="container" >
                  <div >
                    <div class="row text-center title">
                     <!--  <h2>Services</h2> -->
                      <!-- <h4 class="light muted">Achieve the best results with our wide variety of training options!</h4> -->
                    </div>
                    <div class="row service1">
                      <div class="col-md-3  leftReveal">
                        <div class="service">
                          <div class="icon-holder">
                            <img src="img/idology/2.png" alt="" class="icon">
                          </div>
                          <h4 class="heading">Innovation Culture</h4>
                          <p class="description">We foster Innovation cultures by encouraging ideas, designating creative time, creating feedback loops, tracking current trends, combining need with technology.</p>
                        </div>
                      </div>
                      <div class="col-md-3  bottomReveal">
                        <div class="service">
                          <div class="icon-holder">
                            <img src="img/idology/3.jpeg" alt="" class="icon">
                          </div>
                          <h4 class="heading">Quality Work</h4>
                          <p class="description" >We understand our ideal target, the delivery of their product and service and perceived expectations to win more mind share and customer loyalty.</p>
                        </div>
                      </div>
                      <div class="col-md-3 bottomReveal">
                        <div class="service">
                          <div class="icon-holder ">
                            <img src="img/idology/3.png" alt="" class="icon">
                          </div>
                          <h4 class="heading">Shared Vision</h4>
                          <p class="description">At Innovadors Lab we have  a strategic plan that is well thought out, presented & communicated across the entire organisation.</p>
                        </div>
                      </div>
                      <div class="col-md-3 rightReveal">
                        <div class="service">
                          <div class="icon-holder">
                            <img src="img/idology/humanvalue.png" alt="" class="icon">
                          </div>
                          <h4 class="heading">Human Values</h4>
                          <p class="description">We view human performance as a competitive advantage. we are overwhelmingly devoted to personal and professional development to retain top talented individuals.</p>
                        </div>
                      </div>
                    </div>
                    <!-- row2 -->
                    <div class="row service1">
                      <div class="col-md-3 rightReveal">
                        <div class="service">
                          <div class="icon-holder">
                            <img src="img/idology/124.png" alt="" class="icon">
                          </div>
                          <h4 class="heading">Clean Path For Advancement</h4>
                          <p class="description">We have a culture of growth, innovation and ownership. We know our team’s readiness for growth and close the gaps to put everyone on a path of success.</p>
                        </div>
                      </div>
                      <div class="col-md-3 bottomReveal">
                        <div class="service">
                          <div class="icon-holder">
                            <img src="img/idology/6.jpg" alt="" class="icon">
                          </div>
                          <h4 class="heading">Heroic Customer Servcie</h4>
                          <p class="description">Customer retention is a strategic initiative that is carefully observed and included in our long-term plan.</p>
                        </div>
                      </div>
                      <div class="col-md-3 bottomReveal">
                        <div class="service">
                          <div class="icon-holder">
                            <img src="img/idology/1.jpg" alt="" class="icon">
                          </div>
                          <h4 class="heading">Adaptive To New Technologies</h4>
                          <p class="description">We do embrace change. We are Agile and innovative. We take risks to grow. We are proactive adoptors.</p>
                        </div>
                      </div>
                       <div class="col-md-3 leftReveal">
                        <div class="service">
                          <div class="icon-holder">
                            <img src="img/idology/7.png" alt="" class="icon">
                          </div>
                          <h4 class="heading">Integrity </h4>
                          <p class="description">Our visionary cultures are nimble and flexible when they need to be but are also committed to long-term goals and values.</p>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="cut cut-bottom"></div>
                </section>
                </div>

                <!-- our process end -->
                <!-- Begin About -->
                <section id="about" class="background1 section-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 section-title text-center">
                                    <h2 style="color:green">About</h2>
                                    <span class="section-divider"></span>
                                </div>
                                <!-- /.column -->
                            </div>
                            <!-- /.row -->
                            <div class="row mb15">
                                <div class="col-sm-5 leftReveal">
                                    <h5 class="heading-1 mb20" style="color: darkblue;">Our Vision</h5>
                                    <h3 class="mb15 no-margin-top">Designing, Developing, and <br>Innovating for people like you...</h3>
                                    <p class="no-margin text-small"><strong>I-Lab</strong> envisions developing a strong client base with an equally effective support structure which acts as a catalyst for effective deployment of futuristically complete and credible Information Technology (IT) solutions. </p>
                                </div>
                                <!-- /.column -->
                                <div class="col-sm-7 mt30-xs rightReveal">
                                    <h5 class="heading-1 mb20">How we started it</h5>
                                    <span class="icon-handle-streamline-vector logo-about"></span>
                                    <p>We feel privileged to introduce Innovadors Lab, An ISO 9001-2008 certified, Software Technology Parks of India [STPI] registered, supported by MSME Odisha, ORSAC Odisha and IDCOL Odisha empanelled, recognized by Department of Science & Technology, Ministry of Science & Technology GoI, Private Limited Company has mastered the art of delivering customized software solution, web based line of business application, mobile application with Agile modeling using SCRUM Framework at an affordable price with zero down-time service with the continuous support and repeat orders from our clientele.</p><p>Innovadors Lab has a proven track record in Survey, GIS, Atlas Preparation & GIS based application development for Desktop, Web and Mobile systems. We have a strong presence in Andhra Pradesh, Telengana, Odisha and Sikkim for ULB survey and Base-map preparation.</p>
                                </div><!-- /.column -->
                            </div><!-- /.row -->
                            <div class="row mb30">
                                <div class="col-sm-9 leftReveal">
                                    <h5 class="heading-1 mb20" style="color: #4f4bf2;">Our Mission:</h5>
                                    <p class="lead no-margin"><strong>I-Lab</strong>, be a local company, focuses <strong style="font-style: italic ;">“To provide personalized service of excellent quality”</strong></p>
                                </div>
                                <!-- /.column -->
                                <div class="col-sm-3 mt30-xs rightReveal">
                                    <h5 class="heading-1 mb20" style="color: #4f4bf2;">Quote</h5>
                                    <p class="no-margin text-small"><i>
                                    <!-- "There is a part of you that is perfect and pure. It is untouched by the less-than-perfect characteristics you have acquired by living in a less than perfect world. This part of you is a still and eternal star. Make time to reach it and this will bring you untold benefit." -->
                                    "Friends, together, we can achieve a new phase of globalization - one that creates inclusive and sustainable markets, builds development and enhances international cooperation. We each have a responsibility in moving our agenda forward."
                                    </i></p>
                                </div>
                                <!-- /.column -->
                            </div>
                            <!-- /.column -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>
                <!-- /.section -->
                <!-- End About -->
                 <!-- End Intro -->
            <!-- new page ister mterial -->
            <div  class="page-section section-complete-support demo">
              <div class="content-features main-page-navigation">
                <div class="container-fluid">
                  <div class="row">
                   
                   <div class="container">
                    <div class="row">
                      <div class="col-lg-12">
                        <h2 class="text-center"><b style="color: white">Our Process</b></h2>
                       
                        <ul class="timeline1">
                          <li class="rotateRightReveal">
                            <div class="timeline1-image">
                              <img class="img-circle img-responsive" src="img/our_work/1-1.png" alt="">
                            </div>
                            <div class="timeline1-panel">
                              <div class="timeline1-heading">
                                <h4 style="color: white"><b>INSIGHT</b></h4>
                                <!-- <h4 class="subheading">Subtitle</h4> -->
                              </div>
                              <p style="color: white">We understand the specific cause and effect of your project.</p>
                              
                            </div>
                            <div class="line"></div>
                          </li>
                          <li class="timeline1-inverted rotateLeftReveal">
                            <div class="timeline1-image">
                              <img class="img-circle img-responsive" src="img/our_work/3.jpg" alt="">
                            </div>
                            <div class="timeline1-panel">
                              <div class="timeline1-heading">
                                <h3 style="color: white"><b>BrainStroming</b></h3>
                               <!--  <h4 class="subheading">Subtitle</h4> -->
                              </div>
                              <div class="timeline1-body">
                                <p style="color:white;">
                                  We examine with detail the elements and structure of your company.All our great minds are brought together for your benefit
                                </p>
                              </div>
                            </div>
                            <div class="line"></div>
                          </li>
                          <li class="rotateRightReveal">
                            <div class="timeline1-image">
                              <img class="img-circle img-responsive" src="img/our_work/2.jpeg" alt="">
                            </div>
                            <div class="timeline1-panel">
                              <div class="timeline1-heading">
                                <h3 style="color: white"><b>Design / Blue Prints</b></h3>
                              <!--   <h4 class="subheading">Subtitle</h4> -->
                              </div>
                              <div class="timeline1-body">
                                <p style="color:white;">
                                  After all the preparation steps the hard work begins. 
                                </p>
                              </div>
                            </div>
                            <div class="line"></div>
                          </li>
                          <li class="timeline1-inverted rotateLeftReveal">
                            <div class="timeline1-image">
                              <img class="img-circle img-responsive" src="img/our_work/4.gif" alt="">
                            </div>
                            <div class="timeline1-panel">
                              <div class="timeline1-heading">
                                <h3 style="color: white"><b>Development</b></h3>
                                <!-- <h4 class="subheading">Subtitle</h4> -->
                              </div>
                              <div class="timeline1-body">
                                <p style="color:white;">
                                  Our developers take charge of translating the design into interactive digits
                                </p>
                              </div>
                            </div>
                            <div class="line"></div>
                          </li>
                          <li class="rotateRightReveal">
                            <div class="timeline1-image">
                              <img class="img-circle img-responsive" src="img/our_work/5.png" alt="">
                            </div>
                            <div class="timeline1-panel">
                              <div class="timeline1-heading">
                                <h3 style="color: white"><b>Testing</b></h3>
                                <!-- <h4 class="subheading">Subtitle</h4> -->
                              </div>
                              <div class="timeline1-body">
                                <p style="color:white;">
                                  The project’s functionality is thoroughly tested through diffrent Test Cases.
                                </p>
                              </div>
                            </div>
                            <div class="line"></div>
                          </li>
                          <li class="timeline1-inverted rotateLeftReveal">
                            <div class="timeline1-image">
                              <img class="img-circle img-responsive" src="img/our_work/6.png" style="margin-left: 11px;margin-top: 10px;" alt="">
                            </div>
                            <div class="timeline1-panel">
                              <div class="timeline1-heading">
                                <h3 style="color: white"><b>Deployment</b></h3>
                                <!-- <h4 class="subheading">Subtitle</h4> -->
                              </div>
                              <div class="timeline1-body">
                                <p style="color:white;">
                                  This is the final step Delivering Product .
                                </p>
                              </div>
                            </div>
                            <div class="line"></div>
                          </li>
                          <li class="rotateRightReveal">
                            <div class="timeline1-image">
                              <img class="img-circle img-responsive" src="img/our_work/7.jpg" alt="">
                            </div>
                            <div class="timeline1-panel">
                              <div class="timeline1-heading">
                                <h3 style="color: white"><b>Support / Maintance</b></h3>
                                <!-- <h4 class="subheading">Subtitle</h4> -->
                              </div>
                              <div class="timeline1-body">
                                <p style="color:white;">
                                 we keep your software up and running and it's further development in response to the market challenges and on your requests.
                                </p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>   
                  </div>
                </div>
              </div>
            </div>
               
                <!-- Begin Quote Carousel -->
                
      
            <!-- /.section -->

            <!-- Begin Services -->
            <section id="services" class="background2 section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 section-title text-center">
                            <h2>Services</h2>
                            <span class="section-divider"></span>
                        </div>
                        <!-- /.column -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <!-- Item 1 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="services-box leftReveal">
                                <span class="pe-7s-airplay services-icon"></span>
                                <h3 class="service-name">1. Web Design & Application</h3>
                                <p class="text-small">Ilab takes holistic approach  with end-to-end web-based solutions that ensure Our users receive an exceptional customer service experience every time.Our solutions are user-centric, intuitive and flexible, delivering enterprise-grade solutions that are simple to implement and use and easy to scale.</p>
                                <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">Info</button>
                            </div>
                        </div>
                        <!-- /.column -->
                        <!-- Item 1 Modal -->
                        <div class="modal fade" id="item1-services" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
                                        </button>
                                        <span class="pe-7s-airplay services-icon-2"></span>
                                        <h4 class="service-title">Web Design & Application</h4>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <h5 class="heading-1 modal-heading mb20">Web design</h5>
                                        <p>We focus on the needs of the content consumers, incorporate selective but right design elements and ensure support for all devices ranging from small screen smart watches to big screen TVs!</p>
                                        <h5 class="heading-1 modal-heading mb20">Web Apps</h5>
                                        <p>Our web applications are developed from three perspectives - one from the point of view of the architect, one from the view of the file system, and finally one from the perspective of the browser. Our web applications are based on parameters like user friendliness, smartphone compatibility, security and future readiness. Our productive application not only serves well to the present users but also offers futuristic features.</p>
                                        <h5 class="heading-1 modal-heading mb20">Technology</h5><br>
                                        <strong>Front-end technologies</strong>
                                        <p class="no-margin-bottom">
                                            Web application development platforms that offer app development using front end technologies consisting of HTML5, CSS and Jquery, which provides a framework of building responsive web applications, offer the best-of-breed approach to web application development.</p>

                                            <strong>Back-end technologies/frameworks</strong>
                                            <p class="no-margin-bottom">
                                              On the back-end, these platforms use Php, Code-igniter and My SQL which are trusted, open standard frameworks used by millions or developers and are enterprise friendly to develop web applications.</p>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt30-xs">
                            <div class="services-box topReveal">
                                <span class="services-badge badge">New</span>
                                <span class="pe-7s-phone services-icon"></span>
                                <h3 class="service-name">2. Mobile Applications</h3>
                                <p class="text-small">We develop mobile applications using best of breed open technologies. Our team of dedicated mobile experts are ready to tackle your online challenges today! . We develop user-friendly, simple, innovative, and  problem solving mobile apps.</p>
                                <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item2-services">Info</button>
                            </div>
                        </div>
                        <!-- /.column -->
                        <!-- Item 2 Modal -->
                        <div class="modal fade" id="item2-services" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="ion-ios-close-empty"></span>
                                        </button>
                                            <span class="pe-7s-phone services-icon-2"></span>
                                            <h4 class="service-title">Applications</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Picking the right approach to mobile app development is a critical success factor that can make or break your project. Innovadors Lab provides mobile app developers typically use an agile, low-risk mobile development methodology that has a proven success record and ensures rapid results and 100% visibility.</p>
                                        <h5 class="heading-1 modal-heading mb20">APPLICATION DEVELOPMENT</h5>
                                        <p>We deliver custom-tailored apps for Android-based mobile devices and tablets, bringing great value to your business strategy by expanding its reach to over a billion active devices in a fiercely competitive mobile app market.</p>
                                        <h5 class="heading-1 modal-heading mb20">Legacy to Android</h5>


                                        <p>Innovadors Lab helps you optimize your legacy mobile software for greater user experience and convert it into a next gen app for Android devices, so that a long needed change also results in great RoI and a better workflow for your business.</p>
                                        <h5 class="heading-1 modal-heading mb20">QA & TESTING</h5>
                                        <p class="no-margin-bottom">Utilizing Monkey, Android Testing Support Library and a wide range of third-party testing tools, our QA engineers improve the quality of your app, ensure better user satisfaction and 360° security, and reduce development time spent on fixing defects.</p>
                                        <h5 class="heading-1 modal-heading mb20">Technology</h5>
                                          <p ><i class="fa fa-caret-right" style="color:lightgreen"></i> Android Studio (Latest Version) & version Compactibility</p>
                                         <p ><i class="fa fa-caret-right" style="color:lightgreen"></i> FOR UI Design the latest ANDROID Tool</p>
                                         <p ><i class="fa fa-caret-right" style="color:lightgreen"></i> FireBase data storage and all other Open Soucre.</p>
                                            
                                          <h5 class="heading-1 modal-heading mb20">Project</h5>
                                          <p class="no-margin-bottom"> We can provide mobile services  for :
                                          <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:green"></i> Education</p>
                                          <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:green"></i> Hospitality</p>
                                          <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:green"></i> Travel </p>
                                           <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:green"></i> Medical  </p>
                                           <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:green"></i> Others Businesses </p>
                                            </p>
                                        <!-- <p class="no-margin-bottom">Utilizing Monkey, Android Testing Support Library and a wide range of third-party testing tools, our QA engineers improve the quality of your app, ensure better user satisfaction and 360° security, and reduce development time spent on fixing defects.</p> -->
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <!-- Item 3 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt30-sm mt30-xs">
                            <div class="services-box rightReveal">
                                <span class="fa fa-map-marker services-icon"></span>
                                <h3 class="service-name">3. GIS SERVICES</h3>
                                <p class="text-small">We provide GIS Services to Capture , Analyse & Present Geospatial Data . Our Solutions Facilitates End-User to analyse spatial information & display it in a multitudinous of ways to enhance location intelligence . We can provide geospatial information for Engineering , Planning , Management , TeleCom . and other businesses in need of Spatial Capabilities.</p>
                                <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item3-services">Info</button>
                            </div>
                        </div>
                        <!-- /.column -->
                        <!-- Item 3 Modal -->
                        <div class="modal fade" id="item3-services" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
                                        </button>
                                        <span class="fa fa-map-marker services-icon-2"></span>
                                        <h4 class="service-title">GIS SERVICES</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="heading-1 modal-heading mb20">Satellite & Aerial Imagery</h5>

                                        <p>Content Is Under Review </p>

                                        <h5 class="heading-1 modal-heading mb20">web GIS Application</h5>

                                        <p class="text-small">Our Web GIS applications allows to capture, store, manipulate, analyze, manage, and present all types of geographically referenced data. Our GIS technology combines database, mapping and statistical methods to integrate georeferenced data into visual displays where the relationships, patterns and trends in the data can be more easily identified.</p>

                                        <h5 class="heading-1 modal-heading mb20">Survey</h5>

                                       <p class="text-small">We do specialize in Land survey by using  TS, DGPS & GPS devices. we do Topographical Survey,Socio-economic Survey,Cadastral Survey and Utility Survey (GPR / Sensor based) .</p>

                                        <h5 class="heading-1 modal-heading mb20">Interpretation</h5>

                                        <p class="text-small">Through the use of GIS Technology, we can spatially reference & map virtually any data that is reduced to a digital format. Our expertise & experience allows us to provide diverse range of data interpretation services to our clients.</p>
                                        
                                        <h5 class="heading-1 modal-heading mb20">Mapping</h5>

                                        <p class="text-small">We do generate maps through cadastral mapping, topographical mapping and parcel mapping services.</p>
                                        <p>We can map the spatial location of real-world features and visualize the spatial relationships among them.</p>
                                        <p>We can map quantities, such as where the most and least are, to find places that meet their criteria or to see the relationships between places.</p>
                                        <p>We can map densities. Sometimes it is more important to map concentrations, or a quantity normalized by area or total number.</p>
                                        <p>We can find out what is happening within a set distance of a feature or event by mapping what is nearby using geo processing tools like BUFFER.</p>
                                        <p>We can map the change in a specific geographic area to anticipate future conditions, decide on a course of action, or to evaluate the results of an action or policy.</p>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        </div>
                        
                        <!-- /.column -->
                       
                    <div class="row">
                        <!-- /.modal -->
                        <!-- Item 4 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt30">
                            <div class="services-box leftReveal">
                                <span class="services-badge badge">New</span>
                                <span class="fa fa-handshake-o services-icon"></span>
                                <h3 class="service-name">4. Training</h3>
                                <p class="text-small">Innovadors Lab is a renowned Engineers Training organization, well known for providing quality education in advance technology in the field of software and GIS.</p>
                                <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item7-services">Info</button>
                            </div>
                        </div>
                        <!-- /.column -->
                        <!-- Item 4 Modal -->
                        <div class="modal fade" id="item7-services" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
                                        </button>
                                        <!-- <span class="pe-7s-anchor services-icon-2"></span> -->
                                        <span class="fa fa-handshake-o services-icon-2"></span>
                                        <h4 class="service-title">Training</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p> Our programs are a comprehensive package which provide students not just the knowledge in the subject but also the skills required for application development to enable them to play a larger role in the current scenario of innovation and development. These programs also help students develop certain important competencies like communication, time management, industry orientation, etc. which go on to make the student a complete professional ready to join the technology workforce.</p>
                                        <h5 class="heading-1 modal-heading mb20"> Internet of Things (IoT)</h5>                    
                                          <p> Embedded systems have become the next inevitable wave of technology, finding application in diverse fields of engineering. The PC monolith has broken down; concentrated "core" elements of computing and communication, sensors and actuators have become embeddable in almost everything. Technologies that are inexpensive, low-power, and radically different from classical chip-and-pc-board variety are leading to newer applications and products. The training is imparted with an aim to develop expertise in developing and deploying embedded systems over a wide range of applications in the students. The foundation modules of the course will provide an exposure to a gamut of technologies associated with embedded systems. Advanced modules will cover a large number of the relevant enabling technologies and applications of embedded systems. </p>               
                                        <h5 class="heading-1 modal-heading mb20">Web development</h5>
                                            <p>One of the most widely used terms nowadays is web development. Though it has different interpretations, mainly it means any activity which is connected with the development of a web site for the internet or intranet. It is connected with any work involved in developing applications which may be accesses by any client device. The web development includes different types of work such as web design, client-server communication, content management, database management, and hardware and software configuration. </p>
                                        <h5 class="heading-1 modal-heading mb20">DBMS Training</h5>
                                            <p>Equipping students with the right tools and knowledge to apply them are the key components for success in almost any endeavor. In today's world, the tools of information technology drive business growth and enable strategic management. Whether you're an individual seeking greater technical competency or an enterprise looking to get the most from your database investment, our training courses can provide you with the knowledge and skills to gain a competitive advantage. Our training classes in Database Administration, Programming, Performance and Tuning, and Internals and Data Structures for Oracle CODASYL DBMS, provide the resources you need for personal and organizational success. </p>
                                        <h5 class="heading-1 modal-heading mb20">Hardware Training</h5>
                                            <p>These courses provide the hardware technology background to enable systems development personnel to understand tradeoffs in computer architecture for effective use in a business environment. System architecture for single user, central, and networked computing systems is examined, as are single and multi-user operating systems.</p>
                                          
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <!-- Item 5 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt30">
                            <div class="services-box bottomReveal">
                                <span class="pe-7s-users services-icon"></span>
                                <h3 class="service-name">5. Support</h3>
                                <p class="text-small">Based on our experience in managing complex IT application and infrastructure environments we are offering a full set of Application Support and Maintenance solutions.</p>
                                <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item8-services">Info</button>
                            </div>
                        </div>
                        <!-- /.column -->
                        <!-- Item 5 Modal -->
                        <div class="modal fade" id="item8-services" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
                                        </button>
                                        <span class="pe-7s-users services-icon-2"></span>
                                        <h4 class="service-title">Support</h4>
                                    </div>
                                    <div class="modal-body">
                                    <p>
                                      To ensure prolongation of the product life until its next major version release, we offer maintenance services in the following areas:
                                    </p>   
                                     <ul style="list-style-type:circle">
                                       <li>
                                         Re-engineering and porting
                                       </li>
                                       <li>
                                       Product enhancements
                                       </li>
                                       <li>
                                       Localization and globalization
                                       </li>
                                       <li>
                                       Sustaining engineering
                                       </li>
                                     </ul>
                                     <h5 class="heading-1 modal-heading mb20">Supported maintenance types</h5>
                                     <p>
                                        Innovadors Lab high-quality engineering teams provide clients with a wide range of maintenance activities’ types, including:
                                      </p>         
                                      <ul style="list-style-type:circle">
                                       <li>
                                         <b>Corrective</b>—reactive modification to correct discovered problems
                                       </li>
                                       <li>
                                          <b>Adaptive</b>—modification to keep it usable in a changed or changing environment
                                       </li>
                                       <li>
                                        <b>Perfective</b>—improve performance or maintainability
                                       </li>
                                       <li>
                                        <b>Preventive</b>—modification to detect and correct latent faults
                                       </li>
                                     </ul>
                                    <h5 class="heading-1 modal-heading mb20">Innovadors Lab maintenance and support services </h5>
                                    <p>
                                      Innovadors Lab assists its clients—high-tech and software companies from various industry verticals worldwide - by providing an offshore support and a development team that works closely with in-house specialists to maintain and upgrade products in a planned manner while bringing down the cost tremendously. The full spectrum of offered maintenance and support services includes, but is not limited to: </p>
    
                                      <ul style="list-style-type:circle">
                                       <li>
                                         Error tracking and debugging
                                       </li>
                                       <li>
                                          Version upgrades
                                       </li>
                                       <li>
                                          Version upgrades
                                       </li>
                                       <li>
                                          Technical troubleshooting
                                       </li>
                                       <li>
                                          Performance monitoring
                                       </li>
                                       <li>
                                          Performance testing
                                       </li>
                                       <li>
                                          Quality assurance testing
                                       </li>
                                       <li>
                                          Quality assurance testing
                                       </li>
                                     </ul>
                                    <h5 class="heading-1 modal-heading mb20">Innovadors Lab Product Maintenance Process</h5>
                                    <p>One of the reasons why we have been successful in providing software maintenance services is a proven methodology which ensures a smooth execution of the maintenance process and high quality of work.</p>
    
                                    <p>We have a thoroughly structured process for transmitting the customers’ product maintenance offshore. The process covers:</p>
    
                                    <ul style="list-style-type:circle">
                                     <li>
                                        Assessment and Planning
                                     </li>
                                     <li>
                                        Knowledge Transfer
                                     </li>
                                     <li>
                                        Transmission into Offshore Support & Maintenance
                                     </li>
                                     <li>
                                        Full Offshore Product Maintenance
                                     </li>     
                                   </ul>
                                   <p>By following a thoroughly constructed phased hand-over, progression from one phase to another is dependent on support milestones being achieved and technical targets reached at the previous phase of the project. This enables us to ensure that the take-up of support offshore is seamless and problem free.
                                  </p>
                                </div>
                              </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <!-- Item 6 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt30">
                            <div class="services-box rightReveal">
                                <span class="services-badge badge">New</span>
                                <span class="fa fa-user-circle-o services-icon"></span>
                                <h3 class="service-name">6. Consultancy</h3>
                                <p class="text-small">Our passionate consultants go beyond being traditional advisors and aggregators of past knowledge. They help develop bold innovations and new partnerships that empower their clients to disrupt their markets. They view business challenges differently and reimagine solutions leveraging design thinking; combine new and existing technologies to transcend the limitations of traditional software and accelerate the response of complex technology landscapes.</p>
                                <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item9-services">Info</button>
                            </div>
                        </div>
                        <!-- /.column -->
                        <!-- Item 6 Modal -->
                        <div class="modal fade" id="item9-services" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="ion-ios-close-empty"></span>
                                        </button>
                                        <span class="fa fa-user-circle-o services-icon-2"></span>
                                        <h4 class="service-title">Consultancy</h4>
                                    </div>
                                    <div class="modal-body">


                                   <h5 class="heading-1 modal-heading mb20"> Technical</h5>
                                    <p ><i class="fa fa-caret-right" style="color:blue"></i> Database Consultancy</p>
                                    <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> SaaS</p>
                                   <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> Handling Third Party application both operational and technical.</p>
                                    <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> Imparting Training to the user on Third Party software</Handling>
                                    <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> web services</p>

                                    <h5 class="heading-1 modal-heading mb20">Documentation</h5>
                                    <p ><i class="fa fa-caret-right" style="color:blue"></i> Preparation of RFP</p>
                                    <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> Preparation of SLA</p>
                                    <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> Study the existing system and document the request to develop s/w</p>
                                    <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> Management and operational System Assessment to propose a solution.</p>

                                    <h5 class="heading-1 modal-heading mb20">Audit</h5>
                                    <p ><i class="fa fa-caret-right" style="color:blue"></i> Risk management Audit</p>
                                    <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> Operation Audit</p>
                                    <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> Security Audit</p>
                                    <p class="no-margin-bottom "><i class="fa fa-caret-right" style="color:blue"></i> Compliance Audit</p>
                                     
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </section>
            <!-- /.section -->
            <!-- End Services -->
            <!-- expert section  -->
              <section id="Expertize" class="other section-padding" >
                <div class="container">
                <!-- <div Class="other"> -->
                <!-- 1pree -->
                    <div class="row">
                        <div class="col-xs-12 Expertize-title text-center">
                            <h2 >PlatForm Expertise</h2>
                            <span class="Expertize-divider"></span>
                        </div>
                        <!-- /.column -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt30">
                     <div id="piechart" class="rightReveal" style="height: 500px;"></div>


                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt30">
                        <div id="donutchart" class="rightReveal" style="height: 500px;"></div>

                    </div>
                       
                    </div>
                   <!--  </div> -->
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </section> 
             <!-- /.section -->  
            <!-- end Expert section -->
            <section id="Domain-expert" class=" section-padding" >
                <div class="container">
                <!-- <div Class="other"> -->
                <!-- 1pree -->
                    <div class="row">
                        <div class="col-xs-12 Domain-expert-title text-center">
                            <h2 >Domain Expertise</h2>
                            <span class="Domain-expert-divider"></span>
                        </div>
                        <!-- /.column -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt30">
                     <div id="piechart1" class="rightReveal" style="font-size: 1em; height: 500px; border: 1px solid #ccc"></div>


                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt30">
                        <div id="donutchart1" class="rightReveal" style="height: 500px; border: 1px solid #ccc"></div>

                    </div>
                       
                    </div>
                   <!--  </div> -->
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </section> 
             <!-- /.section -->  
            <!-- end Expert section -->
             <section id="testimonial" class="background2 section-padding">
              <div class="container">                
                <div class="row">
                  <div class="col-xs-12 section-title text-center">
                    <h2>What Our Client Says</h2>
                    <span class="section-divider"></span>
                  </div>
                      
                </div>                   
              </div>
            </section>
            <style type="text/css">
              
            </style>
            <!-- Testimonial -->
            <section class="demo_testimonial" >
            <div style="background: #29b6f666; z-index: 2; height: 300px;">
            <br>
                <!-- Head tags to include FontAwesome -->


<div class="container">
  <div class="row">
    <div class='col-md-offset-2 col-md-8 text-center'>
    <!-- <h2>Responsive Quote Carousel BS3</h2> -->
    </div>
  </div>
  <div class='row'>
    <div class='col-md-12 col-lg-12 col-md-12'>
      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#quote-carousel" data-slide-to="1"></li>
          <li data-target="#quote-carousel" data-slide-to="2"></li>
           <li data-target="#quote-carousel" data-slide-to="3"></li>
          <li data-target="#quote-carousel" data-slide-to="4"></li>
           <li data-target="#quote-carousel" data-slide-to="5"></li>
          <li data-target="#quote-carousel" data-slide-to="6"></li>
          <li data-target="#quote-carousel" data-slide-to="7"></li>

        </ol>
        
        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">
        
          <!-- Quote 1 -->
          <div class="item active">
            
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img src="img/our-featured-partners/clients/10.png" class="img-circle" alt="" style="width: 100px;height:100px;">
                  
                  <h4 class="testimonial-title">
                    KISS
                  </h4>
                </div>
               
                <div class="col-sm-9" id="preetish_test">
                  <p class="description">
                    "I-Lab provides a great solution for Student Information Management to collect student data & maintain records on student social life . I-Lab worked very hard to help us customize the system to meet our Unique use case within the budget that we had avaliable . we appreciate all of the hard work  & will continue to work with them for years to come.."
                  </p>
                  <blockquote class="text-right blockquote-reverse" style="color: white">
                    <p>DR. Prasant Rout</p>
                    <footer class="text-right" style="color: white">CEO , <cite title="Source Title"> KISS</cite></footer>
                  </blockquote>
                </div>
              </div>
           
          </div>
<!-- Quote 2 -->
          <div class="item">
            
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img src="img/our-featured-partners/clients/14.png" class="img-circle" alt="" style="width: 100px;height:100px;">
                  
                  <h4 class="testimonial-title">
                   CENTRE FOR ENVIRONMENT AND DEVELOPMENT
                  </h4>
                </div>
               
                <div class="col-sm-9" id="preetish_test">
                  <p class="description">
                     "This is to certify that Innovadors lab Pvt Ltd, Bhubaneswar has completed the awarded work as defined in the scope of work of the project “Improvement of water supply to Pipli and Nimapara NAC” with desired result within the stipulated time. Agency has carried out entire work with adequate responsibility in a professional manner, meeting various deadlines to achieve the desired target."
                  </p>
                  <a style="color: white" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ced1">More...</a>
                  <blockquote class="text-right blockquote-reverse" style="color: white">
                    <p>BABU AMBAT </p>
                    <footer class="text-right" style="color: white">MD <cite title="Source Title">CED</cite></footer>
                  </blockquote>
                </div>
              </div>
           
          </div>
<!-- Quote 3 -->
          <div class="item">
            
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img src="img/our-featured-partners/clients/3.png" class="img-circle" alt="" style="width: 100px;height:100px;">
                  
                  <h4 class="testimonial-title">
                    UNFPA
                  </h4>
                </div>
               
                <div class="col-sm-9" id="preetish_test">
                   <p class="description">
                    "It is my pleasure to express my appreciation to M/s Innovadors Lab Pvt Ltd. for facilitating Design , Development & Manintenace of Web enable software Solutions adopting Agile Software Development Methodologies . I would therefore like to put on record of contribution for the excellent commitment & quality of services provided by the M/s Innovadors Lab"
                  </p>
                  <a style="color: white" class="btn btn-info btn-xs" data-toggle="modal" data-target="#unfpa_cer">More...</a>
                  <blockquote class="text-right blockquote-reverse" style="color: white">
                    <p>Hemant Dwivedi</p>
                    <footer class="text-right" style="color: white">UNFPA <cite title="Source Title">State Program Coordinator</cite></footer>
                    
                  </blockquote>
                </div>
              </div>
           
          </div>
<!-- Quote 4 -->
          <div class="item">
            
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img src="img/our-featured-partners/clients/10.png" class="img-circle" alt="" style="width: 100px;height:100px;">
                  
                  <h4 class="testimonial-title">
                    KISS
                  </h4>
                </div>
               
                <div class="col-sm-9" id="preetish_test">
                 <p class="description">
                    "Our School Administration has been very happy with I-Lab . Its a great to access our datebase online anywhere anytime. I-lab Team have been very attentive to our needs and continue to develop the report and the tools we need . We love the ease of information entry and report generation .Its wonderful  to have an application that understands how kiss operates  "
                  </p>
                  <blockquote class="text-right blockquote-reverse" style="color: white">
                    <p>DR. Prasant Rout</p>
                    <footer class="text-right" style="color: white">CEO ,<cite title="Source Title"> Kiss</cite></footer>
                  </blockquote>
                </div>
              </div>
           
          </div>
<!-- Quote 5 -->
          <div class="item">
            
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img src="img/our-featured-partners/clients/14.png" class="img-circle" alt="" style="width: 100px;height:100px;">
                  
                  <h4 class="testimonial-title">
                   CENTRE FOR ENVIRONMENT AND DEVELOPMENT
                  </h4>
                </div>
               
                <div class="col-sm-9" id="preetish_test">
                  <p class="description">
                    "This is to certify that Innovadors lab Pvt Ltd, Bhubaneswar has completed the awarded work as defined in the nature of work of the project “Survey activities of Nine municipalities in Hyderabad region, Andhra Pradesh” with desired result within the stipulated time. Agency has carried out entire work with adequate responsibility in a professional manner, meeting various deadlines to achieve the desired target."
                  </p>
                  <a style="color: white" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ced2">More...</a>
                  <blockquote class="text-right blockquote-reverse" style="color: white">
                    <p>BABU AMBAT </p>
                    <footer class="text-right" style="color: white">MD <cite title="Source Title">CED</cite></footer>
                  </blockquote>
                </div>
              </div>
           
          </div>
<!-- Quote 6 -->
          <div class="item">
            
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img src="img/our-featured-partners/clients/logo.png" class="img-circle" alt="" style="width: 100px;height:100px; background: white;">
                  
                  <h4 class="testimonial-title">
                    Gupta Power
                  </h4>
                </div>
               
                <div class="col-sm-9" id="preetish_test">
                  <p class="description">
                    "It is my pleasure to express my appreciation to M/S Innovadors Lab Pvt Ltd for facilitating design, development of web enabled software solutions adopting agile software development methodologies. This software solution has been engineered for Document Management System of GPIL, EPC dividion, Odisha."
                  </p>
                                  <!-- <a style="color: white" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ced2">More...</a> -->
                  <blockquote class="text-right blockquote-reverse" style="color: white">
                    <p>Chief Coordinator & HR Head</p>
                    <footer class="text-right" style="color: white">EPC Division,<cite title="Source Title"> Gupta Power Infrastructure Ltd. (GPIL) </cite></footer>
                  </blockquote>
                </div>
              </div>
           
          </div>
<!-- Quote 7 -->
          <div class="item">
            
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img src="img/our-featured-partners/clients/7.png" class="img-circle" alt="" style="width: 100px;height:100px;">
                  
                  <h4 class="testimonial-title">
                    Bhubaneswar Development Authority(BDA)
                  </h4>
                </div>
               
                <div class="col-sm-9" id="preetish_test">
                  <p class="description">
                      "This is to certify that Innovadors lab Pvt Ltd, Bhubaneswar has completed the awarded work as defined in the nature of work of the project “Geo-referencing survey” with desired result within the stipulated time. Agency has carried out entire work with adequate responsibility in a professional manner, meeting various deadlines to achieve the desired target."
                  </p>
                                   <!-- <a style="color: white" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ced2">More...</a> -->
                  <blockquote class="text-right blockquote-reverse" style="color: white">
                    <!--  <p>Chief Coordinator & HR Head</p> -->
                    <footer class="text-right" style="color: white">Executive Engineer, <cite title="Source Title"> BDA </cite></footer>
                  </blockquote>
                </div>
              </div>
           
          </div>
          
        
        <!-- Carousel Buttons Next/Prev -->
        <a data-slide="prev" href="#quote-carousel" class="left1 carousel-control"><i class="fa fa-chevron-left"></i></a>
        <a data-slide="next" href="#quote-carousel" class="right1 carousel-control"><i class="fa fa-chevron-right"></i></a>
      </div>                          
    </div>
  </div>
</div>
            <br>
          </div>
          </section>
          <!-- UNFPA IMAGE -->
          <div id="unfpa_cer" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

              <!-- Modal content-->
              <div class="modal-content">
                <!-- <div class="modal-header"> -->
                 
                  <!-- <h4 class="modal-title">Modal Header</h4> -->
                <!-- </div> -->
                <div class="modal-body">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <img src="certi_img/dd124185.jpeg" class="img-responsive" alt="unfpa" width="100%" > 
                  <!-- <iframe src="certi_img/dd124185.jpeg" width="100%"></iframe> -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- <div class="panel panel-default">
                      <div class="panel-body">A Basic Panel</div>
                    </div> -->

            </div>
          </div>
          <!-- CED 1 IMAGE -->
               <div id="ced1" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <!-- <div class="modal-header"> -->
                     
                      <!-- <h4 class="modal-title">Modal Header</h4> -->
                    <!-- </div> -->
                    <div class="modal-body">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <img src="certi_img/ced1.jpg" class="img-responsive" alt="ced" width="100%" > 
                      <!-- <iframe src="certi_img/dd124185.jpeg" width="100%"></iframe> -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!-- <div class="panel panel-default">
                          <div class="panel-body">A Basic Panel</div>
                        </div> -->

                </div>
              </div>
              <!-- CED 2 IMAGE -->
              <div id="ced2" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <!-- <div class="modal-header"> -->
                     
                      <!-- <h4 class="modal-title">Modal Header</h4> -->
                    <!-- </div> -->
                    <div class="modal-body">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <img src="certi_img/ced2.jpg" class="img-responsive" alt="ced" width="100%" > 
                      <!-- <iframe src="certi_img/dd124185.jpeg" width="100%"></iframe> -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!-- <div class="panel panel-default">
                          <div class="panel-body">A Basic Panel</div>
                        </div> -->

                </div>
              </div>
          
            <!-- end Testimonial -->
            <!-- Main - Features at a Glance -->
            <section id="Glance" class="background2 section-padding">
            <div class="container">
                
                 <div class="row">
                        <div class="col-xs-12 section-title text-center">
                            <h2>Experience Our Efforts</h2>
                            <span class="section-divider"></span>
                        </div>
                        <!-- /.column -->
                    </div>
                    <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                            <div class="text-center">
                              <!-- <a href="#line-getintouch" class="line-reveal line-btn white big">Get In Touch</a> -->
                              <a href="#contact" data-id="contact" class="myButton1" >Request For A Demo</a>
                            </div>
                          </div>
                        </div>
              </div>
            </section>
           <div class="container-fluid" id="corevalues1" >
          <section id="" class="section-padding">
            <div class="container">
                <div class="row">                
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box">
                            <div class="box-icon">
                               <a href="tutorial.php?video_ids=1"> <img src="img/application/1.png" style="width: 90px;margin-top: 22px;">
                                <!-- <span class="fa fa-4x fa-html5"></span> -->
                            </div>
                            <div class="info">
                              <h6 class="text-center "><strong><i style="font-weight: 14px">Document Management System</i></strong></h6></a>                               
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box">
                            <div class="box-icon">
                                 <a href="tutorial.php?video_ids=2"> <img src="img/application/2.jpg" style="width: 49px;margin-top: 19px;margin-right: 25px;">
                            </div>
                            <div class="info">
                              <h6 class="text-center "><strong><i style="font-weight: 14px">Eduction ERP Management System</i></strong></h6></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box">
                            <div class="box-icon">
                                 <a href="tutorial.php?video_ids=0"  ><img src="img/application/3.png" style="width: 69px;margin-top: 24px;margin-right: 19px;">
                            </div>
                            <div class="info">
                              <h6 class="text-center "><strong><i style="font-weight: 14px">Work Flow Management System</i></strong></h6></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box">
                            <div class="box-icon">
                                   <a href="tutorial.php?video_ids=0" data-id="contact" ><img src="img/application/4.png" style="width: 69px;margin-top: 17px;margin-right: 16px;">
                            </div>
                            <div class="info">
                               <h6 class="text-center "><strong><i style="font-weight: 14px">Loan Management System</i></strong></h6></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box">
                            <div class="box-icon">
                                  <a href="tutorial.php?video_ids=0" data-id="contact" ><img src="img/application/5.png" style="width: 69px;margin-top: 17px;margin-right: 16px;">
                            </div>
                            <div class="info">
                                 <h6 class="text-center "><strong><i style="font-weight: 14px">Pay Roll Managentent System</i></strong></h6></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box">
                            <div class="box-icon">
                                   <a href="tutorial.php?video_ids=0" data-id="contact" ><img src="img/application/6.png" style="width: 69px;margin-top: 17px;margin-right: 16px; border-radius: 27px;">
                            </div>
                            <div class="info">
                              <h6 class="text-center "><strong><i style="font-weight: 14px">Supply Chain Management System</i></strong></h6></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box">
                            <div class="box-icon">
                                 <a href="tutorial.php?video_ids=0" data-id="contact" > <img src="img/application/7.png" style="width: 69px;margin-top: 17px;margin-right: 16px; ">
                            </div>
                            <div class="info">
                                <h6 class="text-center "><strong><i style="font-weight: 14px">Reporting Management System</i></strong></h6></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box">
                            <div class="box-icon">
                                    <a href="tutorial.php?video_ids=0" data-id="contact" > <img src="img/application/8.jpg" style="width: 69px;margin-top: 23px;border-radius: 16px;margin-right: 16px; ">
                            </div>
                            <div class="info">
                                <h6 class="text-center "><strong><i style="font-weight: 14px">Retail Management System</i></strong></h6></a>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
          </section>
          </div>
          <section id="Glance" class="background2 section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box1">
                            <div class="box1-icon">
                                  <a href="tutorial.php?video_ids=0" data-id="contact" > <img src="img/application/gis/1.jpg" style="width: 62px;margin-top: 20px;margin-right: 20px;border-radius: 32px;">
                                <!-- <span class="fa fa-4x fa-html5"></span> -->
                            </div>
                            <div class="info">
                                <h6 class="text-center "><strong><i style="font-weight: 14px; color:black;">Work Force Management System</i></strong></h6></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box1">
                            <div class="box1-icon">
                                  <a href="tutorial.php?video_ids=0" data-id="contact" >   <img src="img/application/gis/2.png" style="width: 49px;margin-top: 19px;margin-right: 25px;">
                            </div>
                            <div class="info">
                              <h6 class="text-center "><strong><i style="font-weight: 14px; color:black;">Vehicle Tracking System</i></strong></h6></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box1">
                            <div class="box1-icon">
                                <a href="tutorial.php?video_ids=0" data-id="contact" > <img src="img/application/gis/3.png" style="width: 61px;margin-top: 20px;margin-right: 19px;border-radius: 31px;">
                            </div>
                            <div class="info">
                                 <h6 class="text-center "><strong><i style="font-weight: 14px; color:black;">Encroachment Base Map</i></strong></h6></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box1">
                            <div class="box1-icon">
                                <a href="tutorial.php?video_ids=0" data-id="contact" >   <img src="img/application/gis/4.png" style="width: 71px;margin-top: 27px;margin-right: 15px;border-radius: 15px;">
                            </div>
                            <div class="info">
                               <h6 class="text-center "><strong><i style="font-weight: 14px; color:black;">Utility Base Map</i></strong></h6></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box1">
                            <div class="box1-icon">
                                <a href="tutorial.php?video_ids=0" data-id="contact" >  <img src="img/application/gis/5.png" style="width: 69px;margin-top: 24px;margin-right: 16px;">
                            </div>
                            <div class="info">
                                  <a href="#contact" data-id="contact" > <h6 class="text-center "><strong><i style="font-weight: 14px; color:black;">Water Line  Base Map</i></strong></h6></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box1">
                            <div class="box1-icon">
                                  <a href="tutorial.php?video_ids=0" data-id="contact" > <img src="img/application/gis/6.png" style="width: 69px;margin-top: 26px;margin-right: 16px; border-radius: 27px;">
                            </div>
                            <div class="info">
                                 <h6 class="text-center "><strong><i style="font-weight: 14px; color:black;">Ground Level & Formation Level Base Map</i></strong></h6></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="box1">
                            <div class="box1-icon">
                                 <a href="tutorial.php?video_ids=0" data-id="contact" > <img src="img/application/gis/7.png" style="width: 69px;border-radius: 28px;margin-top: 17px;margin-right: 16px; ">
                            </div>
                            <div class="info">
                                <h6 class="text-center "><strong><i style="font-weight: 14px; color:black;">Municipal GIS</i></strong></h6></a>
                            </div>
                        </div>
                    </div>
                    
                    
              </div>
            </div>
          </section>
            
        <br>
        <style type="text/css">
          

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

.text_p_blog{
  font-family: "Times New Roman", Times, serif;
font-size: 12px;
}

down vote
	

Try this CSS

@keyframes blink {  
  0% { color: red; }
  100% { color: white; }
}
@-webkit-keyframes blink {
  0% { color: red; }
  100% { color: white; }
}
.blink {
  -webkit-animation: blink 1s linear infinite;
  -moz-animation: blink 1s linear infinite;
  animation: blink 1s linear infinite;
} 
        </style>
        <section id="ourcount" class="section-padding parallax-window our-count" data-parallax="scroll" data-image-src="images/slider1.jpg">
            <div class="container">
                <div class="row mb30">
                    <div class="section-title col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3 text-center">
                        <h2>Head Room</h2>
                        <span class="section-divider mb15"></span>
                        <p class="no-margin">We have spent various amounts of time on activities. Oh and we like coffee and free time as well.</p>
                    </div>
                    <!-- /.column -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-sm-6 col-md-3 item leftReveal dropdown">
                        <div class="circle-hold">
                            <img src="img/activities/1.png" style="width: 58px; margin-top: 28px;">
                            <!-- <i class="ion-coffee"></i> -->
                        </div>
                            <!-- <span class="dropdown"> -->
                            <h2 class="timer mb5" data-from="1" data-to="25" data-refresh-interval="15">25</h2>
                            <p class="no-margin">Blogs</p>
                            
                            <div class="dropdown-content">
                            Latest Blog
                            <a href="#"><p class="text_p_blog">Neque porro quisquam est qui dolorem ipsum Blog 1 Link 1</p></a>
                             <a href="blog.php">More...</a>
                             <!--  <a href="#">Link 2</a>
                              <a href="#">Link 3</a> -->
                            </div>
                          
<!--                             <ul class="dropdown-content">
                              <li class="divider"></li>
                                  <li><a href="#">Latest Blog</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><p class="">Neque porro quisquam est qui dolorem ipsum Blog 1</p></a></li>
                                <li><a href="#">Neque porro quisquam est qui dolorem ipsum Blog 2 </a></li>
                                <li><a href="#">Neque porro quisquam est qui dolorem ipsum Blog 3 </a></li>
                                <li class="divider"></li>
                                 <li><a href="blog.php">More...</a></li>
                                <li class="divider"></li>
                              </ul> -->
                          
                            <!-- </span> -->
                    </div><!-- /.column -->
                    <div class="col-sm-6 col-md-3 item mt30-xs rightReveal dropdown">
                        <div class="circle-hold">
                            <img src="img/activities/2.png" style="width: 58px; margin-top: 28px;">
                        </div>
                            <h2 class="timer mb5" data-from="1" data-to="15381" data-refresh-interval="20">1</h2>
                            <p class="no-margin">Events</p>
                            <div class="dropdown-content">
                            Latest Event
                            <a href="#"><p class="text_p_blog">Neque porro quisquam est qui dolorem ipsum Event 1 Link 1</p></a>
                             <a href="#">More...</a>
                             <!--  <a href="#">Link 2</a>
                              <a href="#">Link 3</a> -->
                            </div>
                    </div><!-- /.column -->
                    <div class="col-sm-6 col-md-3 item mt30-xs mt30-sm leftReveal dropdown">
                        <div class="circle-hold">
                            <img src="img/activities/3.png" style="width: 58px; margin-top: 28px;">
                        </div>
                            <h2 class="timer mb5" data-from="1" data-to="17" data-refresh-interval="20">1</h2>
                            <p class="no-margin blink">News</p>
                              <ul class="dropdown-menu" style="z-index: 99999;   width: 270px;   margin-left: 131px;">
                              <div class="dropdown-content">
                            Latest News
                            <a href="news.php"><p class="text_p_blog"> <strong>"RHCLMIS"</strong>has been identified in FP2020 Global Forum as one of the innovative work amongst selected two, which have advanced program towards India's FP2020 Commitments.</p></a>
                             <a href="#">More...</a>
                             <!--  <a href="#">Link 2</a>
                              <a href="#">Link 3</a> -->
                            </div>
                    </div><!-- /.column -->
                   
                    <div class="col-sm-6 col-md-3 item mt30-xs mt30-sm rightReveal dropdown">
                        <div class="circle-hold">
                            <img src="img/activities/6.png" style="width: 90px; margin-top: 20px;">
                        </div>
                            <h2 class="timer mb5" data-from="1" data-to="921" data-refresh-interval="20">1</h2>
                            <p class="no-margin">E-Resources</p>
                             <div class="dropdown-content">
                            Latest E-Resources
                            <a href="#"><p class="text_p_blog">Neque porro quisquam est qui dolorem ipsum E-Resources 1 Link 1</p></a>
                             <a href="#">More...</a>
                             <!--  <a href="#">Link 2</a>
                              <a href="#">Link 3</a> -->
                            </div>
                    </div>
                    <!-- /.column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.section -->
        <!-- End Our Count -->        
        <!-- Begin Work -->
        <section id="work" class="background1 section-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 section-title text-center">
                        <h2>PORTFOLIO</h2>
                        <span class="section-divider mb15"></span>
                       <p class="mb30 scaleReveal">You will find brief descriptions of some Projects selected from the growing list of our Projects, to give you a better thought about our experience and expertise.</p>
                    </div>
                    </div>
                    <!-- /.column -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12 text-center mb50">
                        <!-- Filter Buttons -->
                        <button class="filter btn btn-default btn-category btn-lg" data-filter="all">All</button>
                        <button class="filter btn btn-default btn-category btn-lg" data-filter=".php">PHP</button>
                        <button class="filter btn btn-default btn-category btn-lg" data-filter=".Ruby">Ruby</button>
                        <button class="filter btn btn-default btn-category btn-lg" data-filter=".web">Web-Development</button>
                        <button class="filter btn btn-default btn-category btn-lg" data-filter=".Open">Open Source Database</button>
                        <button class="filter btn btn-default btn-category btn-lg" data-filter=".android">Andriod</button>
                        <button class="filter btn btn-default btn-category btn-lg" data-filter=".GIS">GIS</button>
                        
                         <button class="filter btn btn-default btn-category btn-lg" data-filter=".Survey">Survey</button>
                        <button class="filter btn btn-default btn-category btn-lg" data-filter=".auto">Cad</button>
                        <!-- Sort Buttons -->
                        <button class="sort btn btn-default btn-sort btn-lg" data-sort="my-order:asc"><span class="ion-ios-plus-empty"></span></button>
                        <button class="sort btn btn-default btn-sort btn-lg" data-sort="my-order:desc"><span class="ion-ios-minus-empty"></span></button>
                    </div>
                    <!-- /.column -->
                </div>
                <!-- /.row -->
                <div id="thework">
                <!-- Item 1 -->
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix Open" data-my-order="3">
                        <div class="portfolio-image-holder">
                            <img src="img/work/net/1.png" alt="1" class="img-responsive portfolio-image" width="80%">
                        </div>
                        <span class="portfolio-badge badge">Open Open Source Database</span>
                        <span class="portfolio-hover">
                            <span>
                                <!-- <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links">
                                        <span class="ion-ios-arrow-right portfolio-links-icons"></span>
                                    </span>
                                </a> -->
                                <a href="img/work/net/1.png" class="zoom" title="RHCLMIS">
                                    <span class="portfolio-links">
                                        <span class="ion-arrow-expand portfolio-links-icons"></span>
                                    </span>
                                </a>
                                <span class="project-title no-margin-bottom mt10">RHCLMIS</span>
                            </span>
                        </span>
                    </div>
                    <!-- /.column -->
                    <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  auto" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/autocad/2.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">Cad</span>
                            <span class="portfolio-hover">
                                <span>
                                   <!--  <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/autocad/2.png" class="zoom" title="Road Network">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Road Network</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                    <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  php" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/php/1.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">php</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/php/1.png" class="zoom" title="Kiss Student Management System">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Kiss Student Management System</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                         <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  GIS" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/GIS/ARC-GIS/1.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">Gis</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/GIS/ARC-GIS/1.png" class="zoom" title="Utility Base Map">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Utility Base Map</span>
                                </span>
                            </span>
                        </div>
                         <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  Ruby" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/rubby/1.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">RUBY</span>
                            <span class="portfolio-hover">
                                <span>
                                   <!--  <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/rubby/1.png" class="zoom" title="GPIL">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">GPIL</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                          <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  GIS" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/GIS/ARC-GIS/3.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">GIS</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/GIS/ARC-GIS/3.png" class="zoom" title="Water-PipeLine Base Map">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Water-PipeLine Base Map</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                         
                       
                         <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  android" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/android/2.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">Android</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/android/2.png" class="zoom" title="Tourist Permit Pass">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Tourist Permit Pass</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                        <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  GIS" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/GIS/ARC-GIS/2.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">GIS</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/GIS/ARC-GIS/2.png" class="zoom" title="Encroachment Base Map">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Encroachment Base Map</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                        <!-- Item 3 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix php" data-my-order="4">
                            <div class="portfolio-image-holder">
                                <img src="img/work/php/3.png" alt="3" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">php</span>
                            <span class="portfolio-hover">
                                <span>
                                   <!--  <a href="https://dribbble.com/" target="_blank">
                                        <span class="portfolio-links">
                                            <span class="ion-ios-arrow-right portfolio-links-icons"></span>
                                        </span>
                                    </a> -->
                                    <a href="img/work/php/3.png" class="zoom" title="CA Verification">
                                        <span class="portfolio-links">
                                            <span class="ion-arrow-expand portfolio-links-icons"></span>
                                        </span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">CA Verification </span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                          <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  auto" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/autocad/1.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">Cad</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/autocad/1.png" class="zoom" title="Parcel Map">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Parcel Map</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                          <!-- Item 3 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix php" data-my-order="4">
                            <div class="portfolio-image-holder">
                                <img src="img/work/php/4.png" alt="3" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">php</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                        <span class="portfolio-links">
                                            <span class="ion-ios-arrow-right portfolio-links-icons"></span>
                                        </span>
                                    </a> -->
                                    <a href="img/work/php/4.png" class="zoom" title="Loan Application System">
                                        <span class="portfolio-links">
                                            <span class="ion-arrow-expand portfolio-links-icons"></span>
                                        </span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Loan Application System</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                        
                                                  <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  Survey" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/GIS/survey/1.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">Survey</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/GIS/survey/1.png" class="zoom" title="DGPS BAP Survey">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">DGPS BAP Survey</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                         <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  web" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/web/1.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">Web - Development</span>
                            <span class="portfolio-hover">
                                <span>
                                   <!--  <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/web/1.png" class="zoom" title="Ravenshaw University">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Ravenshaw University</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                        
                        <!-- Item 3 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix auto" data-my-order="4">
                            <div class="portfolio-image-holder">
                                <img src="img/work/autocad/3.png" alt="3" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">Cad</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                        <span class="portfolio-links">
                                            <span class="ion-ios-arrow-right portfolio-links-icons"></span>
                                        </span>
                                    </a> -->
                                    <a href="img/work/autocad/3.png" class="zoom" title="Building Digitation">
                                        <span class="portfolio-links">
                                            <span class="ion-arrow-expand portfolio-links-icons"></span>
                                        </span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Building Digitation</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->

                         <!-- Item 2 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix  web" data-my-order="6">
                            <div class="portfolio-image-holder">
                                <img src="img/work/web/2.png" alt="2" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">Web - Development</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                    <span class="portfolio-links"><span class="ion-ios-arrow-right portfolio-links-icons"></span></span>
                                    </a> -->
                                    <a href="img/work/web/2.png" class="zoom" title="Teerth Foundation">
                                    <span class="portfolio-links"><span class="ion-arrow-expand portfolio-links-icons"></span></span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Teerth Foundation</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                        
                        
                        <!-- Item 3 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix GIS" data-my-order="4">
                            <div class="portfolio-image-holder">
                                <img src="img/work/GIS/qgis/1.png" alt="3" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">GIS</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                        <span class="portfolio-links">
                                            <span class="ion-ios-arrow-right portfolio-links-icons"></span>
                                        </span>
                                    </a> -->
                                    <a href="img/work/GIS/qgis/1.png" class="zoom" title="Utility Base Map">
                                        <span class="portfolio-links">
                                            <span class="ion-arrow-expand portfolio-links-icons"></span>
                                        </span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Utility Base Map</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                         <!-- Item 3 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix web" data-my-order="4">
                            <div class="portfolio-image-holder">
                                <img src="img/work/web/3.png" alt="3" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">Web - Development</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                        <span class="portfolio-links">
                                            <span class="ion-ios-arrow-right portfolio-links-icons"></span>
                                        </span>
                                    </a> -->
                                    <a href="img/work/web/3.png" class="zoom" title="KISS">
                                        <span class="portfolio-links">
                                            <span class="ion-arrow-expand portfolio-links-icons"></span>
                                        </span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">KISS</span>
                                </span>
                            </span>
                        </div>
                        <!-- /.column -->
                        <!-- Item 4 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-box no-padding mix GIS" data-my-order="5">
                            <div class="portfolio-image-holder">
                                <img src="img/work/GIS/qgis/2.png" alt="4" class="img-responsive portfolio-image">
                            </div>
                            <span class="portfolio-badge badge">GIS</span>
                            <span class="portfolio-hover">
                                <span>
                                    <!-- <a href="https://dribbble.com/" target="_blank">
                                        <span class="portfolio-links">
                                            <span class="ion-ios-arrow-right portfolio-links-icons"></span>
                                        </span>
                                    </a> -->
                                    <a href="img/work/GIS/qgis/2.png" class="zoom" title="Utility Base Map">
                                        <span class="portfolio-links">
                                            <span class="ion-arrow-expand portfolio-links-icons"></span>
                                        </span>
                                    </a>
                                    <span class="project-title no-margin-bottom mt10">Utility Base Map</span>
                                </span>
                            </span>
                        </div><!-- /.column -->
                       </div>
                    </div><!-- /.row -->
                     
                </div><!-- /.container -->
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-12 section-title text-center">
                      
                        <span class="section-divider mb15"></span>
                       <p class="mb30 scaleReveal">Feel free to contact us to get a more detailed description of our experience in specific business or technical areas.</p>
                    </div>
                    </div>
                <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                            <div class="text-center">
                              <!-- <a href="#line-getintouch" class="line-reveal line-btn white big">Get In Touch</a> -->
                              <a href="our_work.php" class="myButton">Click For More Project</a>
                            </div>
                          </div>
                        </div>
            </section><!-- /.section -->
            

            <!-- Begin Team -->
            <section id="team" class="background2 section-padding">
                <div class="container">

                    </div>
                   
                    <div class="row">
                        <div class="col-sm-4 leftReveal">
                            <h5 class="heading-1 mb20">Our Goal</h5>
                            <h3 class="no-margin-top mb15">To create a better and more functional world through Our Services.</h3>
                            <!-- <p class="no-margin text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec tristiq enim. Integer eu <strong>neque</strong> arcu. Aenean sed odio nibh. Cras imperdiet, arcu eget dictum vestibulum elit.</p> -->
                        </div><!-- /.column -->
                        <div class="col-sm-8 mt20-xs rightReveal">
                            <h5 class="heading-1 mb20">Who are we?</h5>
                            <p>The Strong, safe, secured & sustainable Foundation of Innovadors Lab has been laid by the core team who are having more than 15 years of experience in their respective field and are from premiere institution of India with Six-Sigma certification for delivering reliable, timely and uninterrupted service with zero defect.</p>
                           <!--  <p class="no-margin">Integer eu neque arcu. Aenean sed odio nibh. Cras imperdiet, arcu eget dictum vestibulum elit. Lorem ipsum dolor sit amet, consectetur adipicing elit. Etiam nisi orci, fringilla eget nulla vel, aliquam porta ante. Integer bibendum nunc eu ipsum maximus, non ornare elit molestie. </p> -->
                        </div><!-- /.column -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.section -->
            <!-- End Team -->
            <!-- Begin Pricing -->
            <section class="background1 section-padding">
                <div class="container">
                    <div class="row mb30">
                        <div class="col-lg-6 col-lg-offset-3 section-title text-center">
                            <h2>Request For Quotation</h2>
                            <span class="section-divider mb15"></span>
                            <p class="no-margin">Price is what you pay. Value is what you get.</p>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">request For Proposal</button>
                        </div><!-- /.column -->
                    </div><!-- /.row -->
                    <div class="container">
                     <!--  <h2>Large Modal</h2> -->
                      <!-- Trigger the modal with a button -->
                      

                      <!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="ion-ios-close-empty"></span>
                              </button>
                              <span class="pe-7s-airplay services-icon-2"></span>
                              <h4 class="service-title">Request For Proposal</h4>
                            </div>

                            <form action="send_mails.php" method="POST">
                              <div class="modal-body">
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" > 
                                <div class="form-group">
                                  <input type="hidden" name="proposal" value="mail1">
                                  <label for="email"><small>Name:</small></label>
                                  <input type="text" name="P_name" class="form-control" id="email" required="">
                                </div> 
                                <div class="form-group">
                                  <label for="email"><small>Organisation:</small></label>
                                  <input type="text" name="Organisation" class="form-control" id="email" required="">
                                </div> 
                                </div> 
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >                           
                                <div class="form-group">
                                  <label for="email"><small>Email address:</small></label>
                                  <input type="email" name="p_Email" class="form-control" id="email" required="">
                                </div>
                                <div class="form-group">
                                  <label for="email"><small>Contact No:</small></label>
                                  <input type="text" name="p_Contact" class="form-control" id="email" required="">
                                </div>
                                </div>
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
                                <div class="form-group">
                                  <label for="email"><small>Brief On Requirements:</small></label>
                                  <textarea class="form-control" name="p_Brief" rows="5" id="comment"
                                  required=""></textarea>
                                </div>  
                              </div>
                              
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-send"></span> Send</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mb50">
                        <div class="col-lg-8 col-lg-offset-2 text-center">
                            <h2 class="heading-3 mt10 scaleReveal">Our Featured Partners</h2>
                            <img src="img/our-featured-partners/1.gif" style="width: 101px; opacity: 0.6;" alt="STPI" class="img-responsive pricing-clients mr15 topReveal">
                            <img src="img/our-featured-partners/2.jpg" style="width:115px; opacity: 0.6;" alt="MSME" class="img-responsive pricing-clients mr15 bottomReveal">
                            <img src="img/our-featured-partners/3.png" style="width: 83px; opacity: 0.6;" alt="ORSAC" class="img-responsive pricing-clients mr15 topReveal">
                            <img src="img/our-featured-partners/5.gif" style="width: 98px; opacity: 0.6;" alt="IDCOL" class="img-responsive pricing-clients bottomReveal">
                            <img src="img/our-featured-partners/6.png" style="width: 136px; opacity: 0.6;" alt="DEPT Of Science And Technology" class="img-responsive pricing-clients bottomReveal">
                            <img src="img/our-featured-partners/7.svg" style="width: 110px; opacity: 0.6;" alt="TCS" class="img-responsive pricing-clients bottomReveal">
                            <img src="img/our-featured-partners/9.gif" style="width: 107px; opacity: 0.6;" alt="Wipro" class="img-responsive pricing-clients bottomReveal">
                        </div><!-- /.column -->
                    </div><!-- /.row -->
                    
            </div><!-- /.container -->
        </section><!-- /.section -->
            <!-- End Pricing -->
            <!-- our clients -->

            <div class="container content job-partners">
              <div class="title-box-v2">
                <h2>Our <span class="color-green">Featured</span> Clients</h2>              
              </div>

              <ul class="list-inline our-clients" id="effect-2">
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/1.png" alt="Govt Of Odisha">
                    <div class="img-hover">
                      <h4>Govt Of Odisha</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/2.png" alt="Govt Of Telengana">
                    <div class="img-hover">
                      <h4>Govt Of Telengana</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/3.png" alt="UNFPA">
                    <div class="img-hover">
                      <h4>UNFPA</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/4.jpg" alt="IL&FS">
                    <div class="img-hover">
                      <h4>IL&FS</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/3.jpg" alt="ORSAC">
                    <div class="img-hover">
                      <h4>ORSAC</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/5.jpg" alt="POWER GRID">
                    <div class="img-hover">
                      <h4>POWER GRID</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/7.png" alt="bda">
                    <div class="img-hover">
                      <h4>BDA</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/8.png" alt="KIIT">
                    <div class="img-hover">
                      <h4>KIIT</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/9.png" alt="Ravenshaw University">
                    <div class="img-hover">
                      <h4>Ravenshaw University</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/10.png" alt="KISS">
                    <div class="img-hover">
                      <h4>KISS</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/11.gif" alt="Sikkim University">
                    <div class="img-hover">
                      <h4>Sikkim University</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/12.jpeg" alt="SRM University">
                    <div class="img-hover">
                      <h4>SRM University</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="img/our-featured-partners/clients/1.png" alt="RWSS">
                    <div class="img-hover">
                      <h4>RWSS</h4>
                    </div>
                  </figure>
                </li>
                <!-- <li>
                  <figure>
                    <img src="assets/img/clients2/jaguar.png" alt="">
                    <div class="img-hover">
                      <h4>Jaguar</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/hermes.png" alt="">
                    <div class="img-hover">
                      <h4>Hermes</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/starbucks.png" alt="">
                    <div class="img-hover">
                      <h4>Starbucks</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/national-geographic.png" alt="">
                    <div class="img-hover">
                      <h4>National Geographic</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/much-more.png" alt="">
                    <div class="img-hover">
                      <h4>Much More</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/hotiron.png" alt="">
                    <div class="img-hover">
                      <h4>Hotiron</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/fred-perry.png" alt="">
                    <div class="img-hover">
                      <h4>Fred Perry</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/bellfield.png" alt="">
                    <div class="img-hover">
                      <h4>Bellfield</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/getapp.png" alt="">
                    <div class="img-hover">
                      <h4>GetApp</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/austrian-airlines.png" alt="">
                    <div class="img-hover">
                      <h4>Austrian Airlines</h4>
                    </div>
                  </figure>
                </li>
                <li>
                  <figure>
                    <img src="assets/img/clients2/general-electric.png" alt="">
                    <div class="img-hover">
                      <h4>General Electronic</h4>
                    </div>
                  </figure>
                </li> -->
              </ul>
            </div>

            <!-- end our client -->
            <!-- Begin Contact -->
            <section id="contact" class="background2 section-padding">
                <div class="container">
                    <div class="row mb30">
                        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 section-title text-center">
                        <h2>Contact</h2>
                        <span class="section-divider mb15"></span>
                        <p class="no-margin scaleReveal">Our team is from all over the world and we know how to deliver quality pixels from miles away.</p>
                        </div><!-- /.column -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-sm-5 col-lg-4">
                            <h5 class="heading-1 mb20">Visit Us</h5>
                            <h4 class="mb15">STPI, C Ground Zero
                            <br>Fortune Towers, Chandrasekharpur<br>Bhubaneswar,Odisha-751023.</h4>
                           <!--  <p class="no-margin text-xs-small">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates. Temporibus autem quibusdam et aut.</p> -->
                            <hr class="mini-hr">
                            <p class="text-xs-small mb5"><strong class="text-switch">Email:</strong> contact@innovadorslab.co.in</p>
                            <p class="text-xs-small mb5"><strong class="text-switch"> Contact Number :</strong>+91-9437072128</p> 
                            <!-- <p class="text-xs-small mb5"><strong class="text-switch">Landline:</strong> 0674 - 2725732</p> -->
                        </div><!-- /.column -->
                        <div class="col-sm-6 col-lg-7 mt30-xs">
                            <form action="send_mails.php" method="POST">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="hidden" name="proposal" value="mail">
                                                <input name="user_name" class="form-control" data-error="This section is required."
                                            id="msg_subject" placeholder="Your Name *" required="" type="text">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.column -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input name="phone" class="form-control" data-error="This section is required." required="" id="phone" placeholder="Phone" type="text">
                                            </div>
                                        </div>
                                    </div><!-- /.column -->
                                </div><!-- /.row -->
                                <div class="row mb10">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <div class="controls">
                                        <input name="organizational" class="form-control" d id="name" placeholder="Organization Name *"  type="text">
                                        <div class="help-block with-errors"></div>
                                        </div>
                                        </div>
                                    </div><!-- /.column -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input name="email" class="email form-control" data-error="This section is required." id="email" placeholder="Email *" required="" type="email">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.column -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <select name="purpose" class="form-control text-center" data-error="This section is required." required="">
                                                  <option value="">--Choose Contact Purpose--</option>
                                                  <option value="Enquiry">Enquiry</option>
                                                  <option value="Demo">Demo</option>
                                                  <option value="Complain">Complain</option>
                                                  <option value="Service Request">Service Request</option>
                                                  <option value="FeedBack">FeedBack</option>
                                                  <option value="Sugestion">Sugestion</option>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.column -->
                                </div><!-- /.row -->
                                <div class="row">
                                  
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                        <div class="controls">
                                          <textarea class="form-control" name="message" data-error="This section is required." id="message" placeholder="Message *" required="" rows="5"></textarea>
                                          <div class="help-block with-errors"></div>
                                        </div>
                                      </div>
                                     </div>
                                </div>
                                <div class="row mt15">
                                <div class="col-sm-6">
                                <div id="msgSubmit" class="h4 hidden mt10 no-margin-bottom"></div> 
                                </div><!-- /.column -->
                                <div class="col-sm-6 text-right">
                                <button type="submit" id="submit" class="btn btn-default btn-lg">Send</button>
                                </div><!-- /.column -->
                                </div><!-- /.row -->
                            </form><!-- /.form -->
                        </div><!-- /.column -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.section -->
            <!-- End Contact -->
            <!-- Begin Map -->
            <div id="map"></div>
            <!-- End Map -->
            <!-- Begin Footer -->
            <footer class="footer-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-center">
                         <img src="img/logo4.png" width="150px">
                           <!--  <span class="icon-handle-streamline-vector logo"></span> -->
                            <!-- <h2 class="theme-title">Innovadors<span class="theme-title-smaller">Lab</span></h2> -->
                            <br>
                            <a href="#"><span class="ion-social-twitter social-icons-dark-hover mr15"></span></a>
                            <a href="#"><span class="ion-social-facebook social-icons-dark-hover mr15"></span></a>
                            <a href="#"><span class="ion-social-googleplus-outline social-icons-dark-hover"></span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-small text-center">
                            <hr>
                            <button type="button" class="btn btn-primary btn-up-footer btn-lg scroll-top">Up</button>
                            <p class="no-margin">&copy; Innovadors Lab Pvt Ltd</p>
                        </div><!-- /.column -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </footer><!-- /.footer -->
            <!-- Begin Footer -->
            <!-- Javascript Files -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArLNT3t4qsJEBmR0R9P_6ueLIQz0Jvt1M&amp;callback=initMap" async defer></script>
            <script type="text/javascript">
                /* ---- Google Maps ---- */
                function initMap() {
                    var mapOptions = {
                        zoom: 15,
                        zoomControl: false,
                        scaleControl: false,
                        scrollwheel: false,
                        disableDoubleClickZoom: true,
                        center: new google.maps.LatLng(20.309756, 85.819138), // Bhubaneswar
                        styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
                    };
                    var mapElement = document.getElementById('map');
                    var map = new google.maps.Map(mapElement, mapOptions);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(20.309756, 85.819138),
                        map: map,
                        title: 'Our Office!'
                    });
                    
            
                    marker.setMap(map);
            
                    var infowindow = new google.maps.InfoWindow({
                      content:"<b>INNOVADORS LAB PVT LTD</b><br><strong>Email : </strong>contact@innovadorslab.co.in<br><strong> Contact Number : </strong>+91-9437072128<br><strong>Address : </strong>STPI, C Ground Zero Fortune Towers, ChandrasekharpurBhubaneswar,Odisha-751023."
                    });
            
                    google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                  });
                  
                }
            </script>
            <script type="text/javascript" src="js/jquery.mixitup.js"></script>
            <script type="text/javascript" src="js/form-validator.min.js"></script>  
            <script type="text/javascript" src="js/jquery.inview.min.js"></script>
            <script type="text/javascript" src="js/jquery.countTo.js"></script>  
            <script type="text/javascript">
                /* ---- Counter (our count) ---- */
                $('#ourcount').one('inview', function(event, isInView) {
                    if (isInView) {
                        $('.timer').countTo({speed: 3000});
                    }
                });
            </script>
            <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
            <script type="text/javascript" src="js/scrollreveal.min.js"></script>
           
            <!-- Slider Revolution JS -->
            <script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
            <script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
            <!-- Slider Revolution Extensions (Load Extensions only on Local File Systems The following part can be removed on Server for On Demand Loading) -->
            <script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
            <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
            <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
            <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
            <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
            <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
            <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
            <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
            <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>
            <script type="text/javascript" src="js/main.js"></script>
            <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[980,1],
        itemsTablet:[768,1],
        pagination:true,
        autoPlay:true
    });
});
  </script>
            <!-- Slider Revolution Main -->
            <script type="text/javascript">
                jQuery(document).ready(function() { 
                    jQuery("#slider1").revolution({
                        sliderType:"standard",
                        startDelay:2500,
                        spinner:"spinner2",
                        sliderLayout:"auto",
                        viewPort:{
                            enable:false,
                            outof:'wait',
                            visible_area:'100%'
                        }
                        ,
                        delay:9000,
                        navigation: {
                            keyboardNavigation:"off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation:"off",
                            onHoverStop:"off",
                            arrows: {
                                style:"erinyen",
                                enable:true,
                                hide_onmobile:true,
                                hide_under:600,
                                hide_onleave:false,
                                hide_delay:200,
                                hide_delay_mobile:1200,
                                tmp:'<div class="tp-title-wrap">  <div class="tp-arr-imgholder"></div>    <div class="tp-arr-img-over"></div><span class="tp-arr-titleholder">{{title}}</span> </div>',
                                left: {
                                    h_align:"left",
                                    v_align:"center",
                                    h_offset:30,
                                    v_offset:0
                                },
                                right: {
                                    h_align:"right",
                                    v_align:"center",
                                    h_offset:30,
                                    v_offset:0
                                }
                            },
                            touch:{
                                touchenabled:"on",
                                swipe_treshold : 75,
                                swipe_min_touches : 1,
                                drag_block_vertical:false,
                                swipe_direction:"horizontal"
                            },
                            bullets: {
                                enable:true,
                                hide_onmobile:true,
                                hide_under:600,
                                style:"hesperiden",
                                hide_onleave:false,
                                hide_delay:200,
                                hide_delay_mobile:1200,
                                direction:"horizontal",
                                h_align:"center",
                                v_align:"bottom",
                                h_offset:0,
                                v_offset:30,
                                space:5
                            }
                        },
                        gridwidth:1024,
                        gridheight:497 
                    }); 
                }); 
            </script>
            <script type="text/javascript" src="js/main.js"></script>
        </body>
    </html>

