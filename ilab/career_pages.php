<?php 

$postion=$_REQUEST['Postion'];
$Domains=$_REQUEST['Domain'];

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
                                      <li class="dropdown"><a href="#">Expertise <span class="glyphicon glyphicon-menu-down"></span></a>
                                          <ul class="dropdown-menu">
                                              <li><a href="index.php#Expertize" data-id="Expertize" class="scroll-link">PlatForm Expertise</a></li>
                                              <li><a href="index.php#Domain-expert" data-id="Domain-expert" class="scroll-link">Domain Expertise</a></li>
                                              <li><a href="index.php#Glance" data-id="Glance" class="scroll-link">Experience Our Efforts</a></li>
                                          </ul>                                        
                                          <!-- <li><a href="#testimonial" data-id="testimonial" class="scroll-link">Client Says</a></li> -->
                                      <li><a href="index.php#work" data-id="work" class="scroll-link">Portfolio</a></li>
                                      <!-- <li><a href="#team" data-id="team" class="scroll-link">Team</a></li> -->
                                      <li><a href="index.php#contact" data-id="contact" class="scroll-link">Contact</a></li>
                                      <li><a href="career_page.php">Careers</a></li>
                                      <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-menu-down"></span></a>
                                        <ul class="dropdown-menu">
                                          
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
                              <h1 class="section-title">Career</h1>
                        </div><!-- /.col-xs-12 -->
                  </div><!-- /.row -->
            </div><!-- /.container -->
      </section>

      <section class="demo">
            <div class="container">
                  <h2></h2>
                  <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                        <?php if($postion=='No_Opening'){?>
                            <div class="container">
                              <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                  <div class="panel panel-default" >
                                    <div class="panel-body text-center" style="background-color: orange">
                                    <h4><b><h1><strong style="font-size: 64px;">&#x1f61e;</strong></h1> Currently There Are No Openings </b></h4> <br>
                                    <a data-toggle="modal" data-target="#myModal"><h5><u>Submit Your Resume For Furture Opportunities.</u></h5></a></div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        <?php }else{?>
                              <div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Role & Responsibilities
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                                <!-- <li>Writing clean, fast PHP to a high standard, in a timely and scalable way
                                </li><li>Producing detailed specifications</li>
                                      <li>Troubleshooting, testing and maintaining the core product software and databases</li> -->
                                      <ul><h4>Role</h4>
                                      <li>Responsible for designing, developing, delivering and implementing data-driven  Web applications for clients and assisting in the development and maintenance of company Web applications (Internet and Intranet).</li>
                                      </ul>
                                      <ul>
                                      <h4>Responsibilities</h4>
                                      


                                        <li><p class="text-capitalize">writing code in one or more programming or scripting languages, such as PHP or JavaScript;</p></li>
                                        <li><p class="text-capitalize">planning and prototyping new applications;</p></li>
                                        <li><p class="text-capitalize">designing the architecture of the components of an application;</p></li>
                                        <li><p class="text-capitalize">deciding on the best technologies and languages for the project;</p></li>
                                        <li><p class="text-capitalize">testing sites and applications in different browsers and environments;</p></li>
                                        <li><p class="text-capitalize">problem solving;</p></li>
                                        <li><p class="text-capitalize">fixing bugs in existing projects;</p></li>
                                        <li><p class="text-capitalize">testing new features thoroughly to ensure they perform the correct task in all cases;</p></li>
                                        <li><p class="text-capitalize">running performance benchmarking tests;</p></li>
                                        <li><p class="text-capitalize">reviewing colleagues' code;</p></li>
                                        <li><p class="text-capitalize">building and testing Application Program Interfaces (APIs) for applications to exchange data;</p></li>
                                        <li><p class="text-capitalize">researching, incorporating and contributing to Open Source projects;</p></li>
                                        <li><p class="text-capitalize">meeting designers, developers and project staff for progress updates;</p></li>
                                        <li><p class="text-capitalize">gathering requirements from clients and users;</p></li>
                                        <li><p class="text-capitalize">learning and testing new technologies, frameworks and languages;</p></li>
                                        <li><p class="text-capitalize">staying up to date with new trends and advancements in web development;</p></li>
                                        <li><p class="text-capitalize">building and maintaining databases;</p></li>
                                        <li><p class="text-capitalize">refactoring and optimising existing code;</p></li>
                                        <li><p class="text-capitalize">documenting code so other developers can understand and contribute to it;</p></li>
                                        <li><p class="text-capitalize">attending and speaking at web development conferences and workshops;</p></li>
                                        <li><p class="text-capitalize">designing information architecture within an application or website.</p></li>
                                    </ul>
                                                          </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Skill Set
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                           <ul><h5>Basic Skill</h5><li>HTML5</li><li>Javascript</li><li>CSS3</li></ul><ul><h5>Core Skill</h5><li>PHP core</li><li>PHP Framework(Codeigniter ,Yii,Falcon,CakePHP) Knowledge</li><li>Ajax</li><li>Web-Services</li><li>Jquery</li><li>XML</li></ul><ul><h5>Database skill</h5><li>MYSQLI</li><li>PDO</li><li>PGSQL</li></ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Education Qulification
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                             Btech/BCA/BSc/Diploma in IT, MCA
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree4">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
                               Experience Set
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                           6 Months-12 Month (With Real TIme Experience)
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree5">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5">
                                Remuneration
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <p>Based On Experience & At Par Industry Standard</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
                        </div>
                        <div class="panel-footer text-center"> 
                        <?php if($postion=='No_Opening'){?>

                          <a href="career_page.php"  class="btn btn-info btn-sm"  ><i class="fa fa-reply">Back</i></a>
                        <?php }else{?>                      
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" >Apply Here</button> || 
                           <a href="career_page.php"  class="btn btn-info btn-sm"  ><i class="fa fa-reply">Back</i></a>
                          <?php }?>
                        </div>
            </div>
      </section>


<br>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="ion-ios-close-empty"></span>
        </button>
        <span class="pe-7s-airplay services-icon-2"></span>
        <h4 class="service-title">Fill Details</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal"  enctype="multipart/form-data" action="new_mail1.php" method="post">
      <fieldset>
        <legend class="text-center"><h4>Please Fill In The Form </h4></legend>

        <!-- Name input-->
        <div class="form-group">
          <!-- <label class="col-md-3 control-label" for="name">Name</label> -->
          <div class="col-md-11">
            <input id="name" name="name" type="text" required="" placeholder="Your name" class="form-control">
          </div>
        </div>
        <div class="form-group">
         <!--  <label class="col-md-3 control-label" for="name">Mobile No.</label> -->
          <div class="col-md-11">
            <input id="name" name="mobile" type="text" required="" placeholder="Your Mobile No" class="form-control">
          </div>
        </div>
        <input type="hidden" name="proposal" value="freshermail">
        <!-- Email input-->
        <div class="form-group">
          <!-- <label class="col-md-3 control-label" for="email">Your E-mail</label> -->
          <div class="col-md-11">
            <input id="email" name="email" required="" type="text" placeholder="Your email" class="form-control">
          </div>
        </div>

        <!-- Message body -->
        <div class="form-group">
          <label class="col-md-3 control-label" for="resume">Upload Resume (<small style="color: red"> Only Pdf</small>)</label>
          <div class="col-md-9">
            <input type="file" name="resume"  accept="application/pdf"  required="">
          </div>
        </div>
        <input type="hidden" name="posting" value="<?=$postion?>">
         <input type="hidden" name="domain" value="<?=$Domains?>">
        <!-- Form actions -->
        <div class="form-group">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </fieldset>
      </form>
      </div>
      <!-- <div class="modal-footer">
        
      </div> -->
    </div>

  </div>
</div>

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