<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="assert/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/bootsnav.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/new_style.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="padding: 0;margin: 0;">
    <div class="container-fluid" style="padding: 0;margin: 0; border-bottom: 0px solid yellow;">
      <div class="row" style="margin-right: 1px;">
        <header>
          <div  style="background-color: black">
            <img src="img/Logo.jpg" class="logo" width="100%" height="20%">
          </div>
        </header>
      </div>
      <div class="clearfix"></div>
      <div class="row" style=" background-color: #800000">
              <div class="text-right" id="socal_id">
                <a href="#" class="fa fa-facebook "></a>
                <a href="#" class="fa fa-twitter "></a>
                <a href="#" class="fa fa-google "></a>
                <a href="#" class="fa fa-youtube "></a>
              </div>
            </div>
    </div>
     <!-- Start Navigation -->
   <?php 
  include 'menu.php';
  ?>
    <!-- End Navigation -->

    <div class="clearfix"></div>
    <br>
    <style type="text/css">
          .rightside-content {
              border-left: 1px solid;
          }
          .col-sm-1{
            padding-right: 0px;
            padding-left: 0px;
          }
          #change_section:hover {
            /*background-color: black;*/
          }
          .change_section:hover {
            /*background-color: black;*/
          }
          #menu {
  /*position: fixed;*/
 /* left: 0;*/
 
    /*top: 0%;*/
 /* width: 8em;*/
  margin-top: 0.5em;
}
.menu {
  list-style: none;
  margin: 0;
  padding: 0;
  /*display: inline-block;*/
  text-align: center;
  /*background: white;*/
}

.menu.hoveyellow {
  background: yellow;
}

.menu li {
  /*display: inline-block;*/
  /*margin: 0 10px;
  padding: 5px 10px;*/
}

.menu li:hover {
  background: green;
}
.menu li a:hover
{
    background-color:#800000;
    
    height: 4pc;
}


        </style>
 <!-- slider -->
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <ul class="nav nav-pills nav-stacked text-center menu" id="menu">
            <li class="change_section" style="background-color: #800000; margin-bottom: 2px; height: 4pc"><a href="theme1.php"><b id="change_section" style="font-size: .9em;color:white;">Eliminate Under Age Marriage</b></a></li>
            <li style="background-color: #800000; margin-bottom: 2px; height: 4pc"><a href="theme2.php"><b id="change_section" style="font-size: .9em;color: white">Elimination Of Dowry</b></a></li>
            <li style="background-color:#800000; margin-bottom: 2px; height: 4pc"><a href="theme3.php"><b sid="change_section" style="font-size: .9em;color: white">Higher Education For Girls</b></a></li>
            <li style="background-color: #800000; margin-bottom: 2px; height: 4pc"><a href="theme4.php" ><b id="change_section" style="font-size: .9em;color:white;">Adolescent and Youth Policy</b></a></li>
            <li style="background-color: #800000; height: 4pc"><a href="theme5.php"><b id="change_section" style="font-size: .9em;color:white;">Leadership Opportunity</b></a></li>
          </ul><br>
    </div>
    <div class="col-sm-10">
      <section class="background22 section-padding">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner">

            <?php 
            $x=0;
            include "admin_gen/config.php";
            $banner="SELECT * FROM `gen_banner` WHERE `status`='1' order by `sl_no` desc";
            $sql_exe=mysqli_query($conn,$banner);
            
            while ($res_banner=mysqli_fetch_assoc($sql_exe)) {
              $x++;
              if($x==1){
                ?>
                 <div class="item active">
                <?php
              }else{
                ?>
                 <div class="item">
                <?php
              }
              ?>
           
           
              <div class="col-sm-8">
                <img class="img-responsive" src="admin_gen/upload/<?=$res_banner['photo_name']?>" alt="..." width="725"  style="height: 340px; max-width: 100%;">
              </div>
         
              <div class="col-sm-4 home">             
                  <div class="carousel-caption ">
                   <br>
                  <br>
                  <hr>
                      <!-- <h2  style="color: white">Slide 4</h2> -->
                      <p class="text-small text-justify" style="color: white"> <?=$res_banner['short_desc']?> </p>
                      <hr>
                  </div>            
              </div>
            </div>

            <?php }?>

           
          </div>
          <div class="controllers col-sm-8 col-xs-12">
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right home"></span>
            </a>
          </div>
          <div class="controllers col-sm-8 col-xs-12">
          <!-- Indicators -->
          <!-- <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol> -->
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!-- end of Slider -->
<br>

<div style="background-color: whitesmoke; margin-top: 0px; padding-top: 20px; padding-bottom: 20px; ">
<div class="container" >    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary3">
        <div class="panel-heading"><b>News Update</b></div>
        <div class="panel-body">
          <ul class="list_style">
          <li><a class="cool-link" href="">News1</a></li>
          <li><a class="cool-link" href="">News2</a></li>
          <li><a class="cool-link" href="">News3</a></li>
          <li><a class="cool-link" href="">News14</a></li>
         </ul>
        </div>
        <div class="panel-footer"><a href="#">View More  ></a> </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary3">
        <div class="panel-heading"><b>Campaigns</b></div>
        <div class="panel-body">
          <ul class="list_style">
          <li><a class="cool-link" href="">Campaigns1</a></li>
          <li><a class="cool-link" href="">Campaigns3</a></li>
          <li><a class="cool-link" href="">Campaigns8</a></li>
          <li><a class="cool-link" href="">Campaigns</a></li>
         </ul>
        </div>
        <div class="panel-footer"><a href="#">View More  ></a> </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary3">
        <div class="panel-heading"><b>Case Studies</b></div>
        <div class="panel-body">
           <ul class="list_style">
          <li><a class="cool-link" href="">Case1</a></li>
          <li><a class="cool-link" href="">Case2</a></li>
          <li><a class="cool-link" href="">Case3</a></li>
          <li><a class="cool-link" href="">Case14</a></li>
         </ul>
        </div>
        <div class="panel-footer"><a href="#">View More  ></a> </div>
      </div>
    </div>
  </div>
</div><br>

<div class="container" >    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary3">
        <div class="panel-heading"><b>Documents And Booklets</b></div>
        <div class="panel-body">
          <ul class="list_style">
          <li><a class="cool-link" href="">Documents1</a></li>
          <li><a class="cool-link" href="">Documents2</a></li>
          <li><a class="cool-link" href="">Documents3</a></li>
          <li><a class="cool-link" href="">Documents14</a></li>
         </ul>
        </div>
        <div class="panel-footer"><a href="#">View More  ></a> </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary3">
        <div class="panel-heading"><b>Impact</b></div>
        <div class="panel-body">
          <ul class="list_style">
          <li><a class="cool-link" href="">Impact1</a></li>
          <li><a class="cool-link" href="">Impact2</a></li>
          <li><a class="cool-link" href="">Impact4</a></li>
          <li><a class="cool-link" href="">Impact6</a></li>
         </ul>
        </div>
        <div class="panel-footer"> <a href="#">View More  ></a> </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary3">
        <div class="panel-heading"><b>Views that matter</b></div>
        <div class="panel-body">
          <ul class="list_style">
          <li><a class="cool-link" href="">Matter1</a></li>
          <li><a class="cool-link" href="">Matter3</a></li>
          <li><a class="cool-link" href="">Matter5</a></li>
          <li><a class="cool-link" href="">Matter7</a></li>
         </ul>
        </div>
        <div class="panel-footer"> <a href="#">View More  ></a></div>
      </div>
    </div>
  </div>
</div>
</div>
<section class="footer">
    <div class="container">
      <div class="row">
          <div class="col-lg-4  col-md-4 col-sm-4">
              <div class="footer_dv">
                  <!-- <h4>Services</h4>
                  <ul>
                      <li class="line_rv"><a href="canon-printer-support.php">Canon Printer Support</a></li>
               
                        <li><a href="hp-printer-support.php">Hp printer Support</a></li>
                        <li><a href="dell-printer-support.php">Dell Printer Support</a></li>
                        <li><a href="epson-printer-support.php">Epson printer Support</a></li>
                        <li><a href="samsung-printer-support.php">Samsung Printer Support</a></li>
                        <li><a href="lexmark-printer-support.php">Lexmark Printer Support</a></li>
                    </ul> -->

                  <p style="margin: -19px 0 0px ; color: #337ab7; text-decoration: none;">Supported By</p>
                  <img src="img/logo/UNFPA_logo.svg.png" style="width: 102px;  background: white" class="img-responsive"  alt="Avatar">
           
                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4">
              <div class="footer_dv text-center">
                <img src="img/logo4.png" class="img-responsive" style="width: 150px; margin-left: 84px;" alt="Avatar">
                 <a target="_blank" href="http://innovadorslab.com"><h4 style="font-size: 13px;">&copy;  Innovadors Lab Pvt Ltd</h4></a>
                  <!-- <h4>Services</h4>
                  <ul>
                      <li><a href="tosiba-printer-support.php">Toshiba Printer Support</a></li>
                        <li><a href="panasonic-printer-support.php">Panasonic Printer Support</a></li>
                        <li><a href="xerox-printer-support.php">Xerox Printer Support</a></li>
                        <li><a href="brother-printer-support.php">Brother printer support</a></li>
                        <li><a href="zebra-printer-support.php">Zebra printer support</a></li>
                        <li><a href="lenovo-printer-support.php">Lenovo printer Support</a></li>
                       
                        
                    </ul> -->
                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4">
              <div class="footer_dv">
                 

        
               
                <img src="img/logo/2.jpeg"  class="img-responsive" style="width: 201px; margin-left: 131px;" alt="Avatar">
                
                <div class=" text-center" style="margin-left: 33px; ">
               
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assert/dist/js/bootstrap.min.js"></script>
    <!-- Bootsnavs -->
    <script src="js/bootsnav.js"></script>

  </body>
</html>