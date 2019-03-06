<?php 

$video_id=$_REQUEST['video_ids'];
// $Domains=$_REQUEST['Domain'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
 
      <meta charset="utf-8"/>
      <meta name="author" content="Preetish" />
      <meta name="description" content="Particles - Personal + Agency Template">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <title>Innovadors Lab </title>
      <!-- Royal Preloader CSS -->
      <link href="css/royal_preloader.css" rel="stylesheet">
      <!-- <link href="css/mystyles.css" rel="stylesheet"> -->
      <link href="sub_career/css/sub_career.css" rel="stylesheet">
      <!-- jQuery Files -->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <!-- Parallax File -->
      <script type="text/javascript" src="js/parallax.min.js"></script>
      <!-- Royal Preloader -->
      <script type="text/javascript" src="js/royal_preloader.min.js"></script>
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



</head>
<body class="royal_preloader" data-spy="scroll" data-target=".navbar" data-offset="70">
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
                                      <li><a href="index.php#home" data-id="home" class="scroll-link">Home</a></li>
                                      <li><a href="index.php#ideology" data-id="ideology" class="scroll-link">Core Values</a></li>                    
                                      <li><a href="index.php#about" data-id="about" class="scroll-link">About</a></li>
                                      <li><a href="index.php#services" data-id="services" class="scroll-link">Services</a></li>
                                      <li><a href="index.php#work" data-id="work" class="scroll-link">Work</a></li>
                                <!-- <li><a href="#team" data-id="team" class="scroll-link">Team</a></li> -->
                                      <li><a href="#contact" data-id="contact" class="scroll-link">Contact</a></li>
                                      <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-menu-down"></span></a>
                                        <ul class="dropdown-menu">
                                          <li><a href="career_page.php">Careers</a></li>
                                          <li><a href="csr.php">CSR</a></li>
                                          <!-- <li><a href="#">Pricing Options</a></li>
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
      <section class="blog-header section-padding">
            <div class="container">
                  <div class="row">
                        <div class="col-xs-12 text-center">
                              <h1 class="section-title">Experience Our Efforts</h1>
                        </div><!-- /.col-xs-12 -->
                  </div><!-- /.row -->
            </div><!-- /.container -->
      </section>

      <section class="demo">
            <div class="panel panel-default">
              <div class="panel-body text-center">                
               <?php if($video_id=="1"){?>
                <iframe width="853" height="480" src="https://www.youtube-nocookie.com/embed/Pkf3RzBdJgo" frameborder="0" allowfullscreen></iframe>
                <?php }else if($video_id=="2"){?>
                <iframe width="853" height="480" src="https://www.youtube-nocookie.com/embed/Y5NZNg9FLhM?rel=0" frameborder="0" allowfullscreen></iframe>
                <?php }else{
                  // header('Location:index.php');
                  // exit; 
                }
                  ?>
              </div>
              <div class="panel-footer">
                
                  <div class="text-center">
                              <!-- <a href="#line-getintouch" class="line-reveal line-btn white big">Get In Touch</a> -->
                    <a href="index.php#contact" data-id="contact" class="myButton1" >Request For A Live Demo</a>|| <a href="index.php"  class="btn btn-info btn-sm"  ><i class="fa fa-reply">Back</i></a>
                  </div>
                
              </div>
            </div>
      </section>


<br>


      <footer class="footer-padding">
            <div class="container">
                  <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-center">
                              <img src="img/logo4.png" width="150px">
                              <!--  <span class="icon-handle-streamline-vector logo"></span> -->
                              <h2 class="theme-title">Innovadors<span class="theme-title-smaller">Lab</span></h2>
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
      
      <script type="text/javascript" src="js/jquery.mixitup.js"></script>
      <script type="text/javascript" src="js/form-validator.min.js"></script>  
      <script type="text/javascript" src="js/jquery.inview.min.js"></script>
      <script type="text/javascript" src="js/jquery.countTo.js"></script>  
      <script type="text/javascript">
      /* ---- Counter (our count) ---- */
            $('#ourcount').one('inview', function(event, isInView) {
                  if (isInView) {
                        ('.timer').countTo({speed: 3000});
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
      <script type="text/javascript">
            $(document).ready(function() {
  $('.collapse.in').prev('.panel-heading').addClass('active');
  $('#accordion, #bs-collapse')
    .on('show.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').addClass('active');
    })
    .on('hide.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').removeClass('active');
    });
});
      </script>

</body>
</html>