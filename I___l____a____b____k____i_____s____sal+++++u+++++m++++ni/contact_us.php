<!DOCTYPE html>
<html lang="en">
<head>
   <title>Home Page</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style2.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" >
<!-- <div class="container">
  <div class="row"> -->
    <div id="wrapper">
      <div id="header">
      <!-- STOP PGNET INDEX -->
        <p id="loginDL">
          Welcome | 
          <a href="user_registration_form.php">Register</a> | 
          <a href="user_login.php">Log In</a>
        </p>
        <!-- end login registration -->
        <div id="tools" class="clearfix">
          
        </div>
        <br>
        <br>
        <a href="index.php" id="saaLogo">D.M.School</a>
        <!-- <a href="/get/page/home" id="saaLogo">D.M.School</a> -->
        <!--<img src="img/campus1.jpg" id="masthead" style="min-width:946px;">-->
        <img src="img/banner1.jpg" id="masthead" style="min-width:946px;">
      </div>
        
    </div>
    <!-- <div class="container" style="width: 1000px;padding-right: 0;padding-left: 0;"> -->
      
          <nav class="navbar navbar-default text-center" role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Brand Logo</a> -->
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class=""><a href="index.php"><h5>Home</h5></a></li>
                    <li><a href="#"><h5>About Us</h5></a></li>
                    <li><a href="#"><h5>Activites</h5></a></li>
                    <li><a href="#"><h5>News & Views</h5></a></li>
                    <li><a href="#"><h5>Events</h5></a></li>
                    <li><a href="contact_us.php"><h5>Contact Us</h5></a></li>
                    <!-- <li class=""><a href="#">Dashboard</a></li>
                    <li class=""><a href="#">Stories</a></li>
                    <li><a href="#">Videos</a></li>
                    <li><a href="#">Photos</a></li> 
                   
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 </a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Page 1-1</a></li>
                          <li><a href="#">Page 1-2</a></li>
                          <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 2</a></li> -->
                  </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
  <?php 
  include "menu.php";?>

<style type="text/css"> 
.owl-carousel .item{
    margin: 3px;
}

.owl-carousel .item img{
    display: block;
    width: 100%;
    height: auto;
}
.navbar-inverse {

    background-color: #4F628A;
    border-color: #4F628A;
    top: 33px;
}
.navbar-inverse .navbar-nav > li > a {
    color: #fff;
}
    .head_colored{

      /*width:1300px;*/
            height:150px; 
            border-radius:5px;
            color: #4a4444;;
            font-weight: bold;
            background-color:#4F628A;
             }
         
        .header{
               width:1210px;
               height:20px;
               border-radius:5px;
               /*background-color:blue;
               color:white;*/
               padding-top:50px;
               padding-left:110px;
               padding-right:100px;
               font-family:Sans-serif;
               font-variant: small-caps;
               font-style: normal;
               margin-left:40px;

                }
                .about{

                  font-family: 'myriad-pro',arial;
   
                   font-size: 14px;
                   margin-top: 11px;
                }
                .about1{

                  font-family: 'myriad-pro',arial;
   
                   font-size: 14px;
                   margin-top: -1px;
                   padding: 3px;
                   height: 515px;
                }
      
         
      .title {
       /*margin: 6px auto;*/
       color: black;
       /*margin-left:20px;
       margin-top: 50px;
       padding-top: 10px;*/


        }
   #footer {
    height: 40px;
    padding-top: 12px;
    text-align: center;
    color: #a1a1a0;
    font-family: 'myriad-pro',arial;
    font-size: 11px;
    background: url("images/home/layerfooter.png") repeat-x #e5e5e3;
}
#ww_selector {
    position: absolute;
    top: 55px;
    left: 63px;
    margin: 0px;
    padding: 0px;
    width: 118px;
    height: 15px;
    overflow: hidden;
    border-top: 1px solid #394863;
    z-index: 1000;
}
#ww_selector li {
    margin: 0px;
    padding: 0px;
    padding-top: 1px;
    display: block;
    height: 13px;
    list-style: none;
    border-left: 1px solid #3a4965;
    border-right: 1px solid #526589;
    background-color: #3f506e;
}
*{
  margin: 0px;
  padding: 0px;
}


.container ul li:hover{
  background-color:steelblue;
  


}

 body {
  font-family: 'myriad-pro',arial;
   
    font-size: 12px;
}

</style>
</head>
<body>
 
  <div class="row">
    <div class="col-lg-12" style="margin-top: 21px;;">
      <div class="col-lg-5" style="margin-left: 91px;">
        <div class="panel panel-default">
          <div class="panel-body" style="height: 620px; padding-left: 35px;">
             <div class="title">
             <div class="about1">
            <h3><b>Contact Us</b></h3>
               <form method="POST" action="#">
               <p style="color: red;">* Marked fields are required</p>
               Name: <span style="color: red">*</span> <br>
                <input type="text" name="name" placeholder="Enter Your Name" style="width: 286px;">
                <br><br>
                Email Address: <span style="color: red">*</span><br>
                <input type="text" name="email" placeholder="Enter Your Email Address " style="width: 286px;">
                <br><br>
                Contact Number: <span style="color: red">*</span><br>
                <input type="text" name="contact" placeholder="Enter Your Contact No" style="width: 286px;" >
                
                <br><br>
                Message: <span style="color: red">*</span><br>
                <textarea name="message" rows="5" cols="42"></textarea>
                 <br><br>
              <center>
                <input type="submit" value="Send Msg">
                </center>
              </form> 
              </div>
            </div>
          </div>
        </div>
       </div>
       <div class="col-lg-5">
        <div class="panel panel-default">
          <div class="panel-body" style="height: 620px;" >
          <div class="title">
          <div class="about1">
   
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>KISS</strong><br>
                <b><small>(Kaling Institute Of Social Science)</small></b><br>
                Campus 10, K.I.S.S. Bhubaneswar,<br> Odisha, India - 751024 <br>
                <abbr title="Phone">
                  Phone :</abbr>
               +91 674 2725386 / +91 94371 73860<br>
                <!-- <abbr title="Fax">
                  Fax : </abbr>
                +91-612-229175 9-->
            </address>
            <address>
                <a href="Email:#" style="color: blue;">KISS@gmail.com,</a> or 
                <a href="Email:#" style="color: blue;"> KISS-Consultants.com</a>
            </address>
             <iframe src="https://www.google.co.in/maps/place/KISS+College+(New+Campus)/@20.3577116,85.8073623,17z/data=!3m1!4b1!4m5!3m4!1s0x3a190920ce2cdf8d:0x243ff5b77c64aea9!8m2!3d20.3577066!4d85.809551" width="570" height="410" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>
          </div>
        </div>
       </div>
      </div>
    </div>
  </div>
</div>
     <style type="text/css">
       #vision_temp{
        background: url(logo/1.jpg) no-repeat fixed;         
        height: 203px;
       }
     </style>  


      </div>
    </div>
  </div>
</div>
</div>
</div>
<center>
 <div class="row" >
   <div id="new_footer">
              
    <div style="display: block;">
       <div class="footer_col">Community
         <a href="#">Classes, Groups &amp; Clubs</a>
         <a href="#">Alumni Directory</a>
         <a href="#">Discussions</a>
         <a href="#">Book Salon</a>
         <a href="#">Undergrad Students</a>
         <a href="#">Grad Students</a>
         <a href="#">Young Alumni</a>
       </div>
       <div class="footer_col">Resources
        <a href="#">Alumni Career Services</a>
        <a href="#">Perks</a>
        <a href="#">Membership</a>
        <a href="#">Your Alumni Center</a>
        <a href="#">Alumni Center Events</a>
       </div>
       <div class="footer_col">News &amp; Views
         <a href="#">Magazine</a>
         <a href="#">Learn</a>
         <a href="#">Manage Subscriptions</a>
         <a href="#">Stanford News Links</a>
       </div>
       <div class="footer_col">Activities
        <a href="#">My Class Reunion</a>
        <a href="#">Events</a>
        <a href="#">Where I Live</a>
        <a href="#">Travel/Study</a>
        <a href="#">Sierra Camp &amp; Programs</a>
        <a href="#">On Campus</a>
        <br><br>
       </div>
       <div class="footer_col">Volunteering
         <a href="#">Recognition</a>
         <a href="#">Leadership</a>
         <a href="#">Beyond the Farm</a>
         <a href="#">Trustee Nominations</a>
       </div>
    </div>
    <div style="display: block; padding-bottom: 10px;">
       <div class="footer_col">About
        <a href="#">About Kiss</a>
        <a href="#">Help</a>
        <a href="#">Accessibility</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Use</a>
        <a href="#">Contact Us</a>
       </div>
       <div class="footer_col">My Account
        <a href="#">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#">Messages</a>
        <a href="#">Friends</a>
        <a href="#">Events</a>
        <a href="#">Groups</a>
        <a href="#">Gallery</a>
       </div>
       <div class="footer_col">University Links
        <a href="#">Transcripts</a>
        <a href="#">OVAL</a>
        <a href="#">Giving to Stanford</a>
        <a href="#">Visitor Information</a>
        <a href="#">Stanford Athletics</a>
        <a href="#">Stanford Homepage</a>
       </div>
       <div class="footer_col">Schools
        <a href="#">Business</a>
        <a href="#">Earth, Energy &amp; Environment</a>
        <a href="#">Education</a>
        <a href="#">Engineering</a>
        <a href="#">Humanities &amp; Sciences</a>
        <a href="#">Law</a>
        <a href="#">Medicine</a><br><br>
    </div>
    <div id="footer_logos">
    <a href="#"><img src="img/facebook.gif"></a>
    <a href="#"><img src="img/twitter.gif"></a>
    <a href="#"><img src="img/instagram.gif"></a>
    <a href="#"><img src="img/linkedin.gif"></a>
    <!-- <img src="/content/saa/homepage/images/saa_block.gif" style="margin:0 0 20px 0; float:right;"> -->
    </div>
       </div><!-- end id=new_footer -->
    </div>
     </div> 
   </center>


 <script type="text/javascript">
    // $(function(){
    //   SyntaxHighlighter.all();
    // });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
    
  </script>

    <script defer src="js/jquery.flexslider.js"></script>
     <script src="dist/js/lightbox-plus-jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assert/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
    $('.standard').hover(
        function(){
            $(this).find('.caption').show();
        },
        function(){
            $(this).find('.caption').hide();
        }
    );
    $('.fade').hover(
        function(){
            $(this).find('.caption').fadeIn(250);
        },
        function(){
            $(this).find('.caption').fadeOut(250);
        }
    );
    $('.slide').hover(
        function(){
            $(this).find('.caption').slideDown(250);
        },
        function(){
            $(this).find('.caption').slideUp(250);
        }
    );
});
</script>

<!-- <script type="text/javascript" src="js/vendor/jquery-1.10.2.min.js"></script> -->
<script src="assert/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
  <script type="text/javascript" src="js/bootsnav.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
    <script>
        // WOW Animation
        new WOW().init();
    </script>
   <script src="social/js/jquery.contact-buttons.js"></script>
<script src="social/js/demo.js"></script>
<script src="js/common.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>

<div id="block-block-19" class=""><div class="block-inner">
 <div class="content">
    <p>
<link rel="stylesheet" type="text/css" href="/sites/all/themes/dimention/jquery.cookiebar/jquery.cookiebar.css">         <script type="text/javascript" src="/sites/all/themes/dimention/jquery.cookiebar/jquery.cookiebar.js"></script></p>
<p>   <script type="text/javascript">
          $(document).ready(function(){
            $.cookieBar({
                message: 'Click I Agree to accept cookies and go directly to the site or click on More Information to see detailed descriptions of the types of cookies and choose whether to accept certain cookies while on the site.',
                acceptButton: true,
                acceptText: 'I agree',
                policyButton: true,
                policyText: 'More information',
                policyURL: '/our-cookies-policy.html',
                effect: 'slide',
                element: 'body',
                fixed: true,
                append: true,
                bottom: true
             });
          });
    </script></p>
   </div>

  
</div></div> <!-- /block-inner, /block -->
<div id="block-block-21" class=""><div class="block-inner">
</div> <!-- /block-inner, /block -->
</div>
<script src="js/jquery.flexslider.js"></script>
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