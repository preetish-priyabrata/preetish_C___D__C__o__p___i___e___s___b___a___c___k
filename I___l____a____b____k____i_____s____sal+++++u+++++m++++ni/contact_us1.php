<?php 
session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assert/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="dist/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootsnav.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="js/modernizr.js"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mrs+Sheppards" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="social/css/contact-buttons.css">
    <link rel="stylesheet" href="social/css/demo.css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- <script src="js/hoverintent.min.js"></script> -->
    <link href="css/icons.css" rel="stylesheet" media="screen">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/modernizr.js"></script>
    
  <script type="text/javascript">
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(25); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(25); //.fadeOut(205)
        }
    ); 
  </script>

</head>
<body>
<style type="text/css">
    #div2 {
    list-style-type: none;
    /*margin: 0;
    padding: 0;*/
    overflow: hidden;
    float: right;
}

.cool_href1 {
    float: left;
}

.cool_href {
    display: block;
    padding: 8px;
    background-color: #000;
}
.cool_href:hover {
    background: #175921;
    color: wheat;
}
.inlineList {
  display: flex;
  flex-direction: row;
  /* Below sets up your display method, ex: flex-start|flex-end|space-between|space-around */
  justify-content: flex-start; 
  /* Below removes bullets and cleans white-space */
  list-style: none;
  padding: 0;
  /* Bonus: forces no word-wrap */
  white-space: nowrap;
  float: right;
}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="header_line"></div>
    <div class="header_line2"></div>
        <div class="text-right">
       <ul class="inlineList">
            <li><a class="cool_href" href="user_registration_form.php">Registration Alumni</a></li>
            <li><a class="cool_href" href="user_login.php">Login</a></li>
            <!-- <li>More Padding, Captain!</li> -->
        </ul>
        
            
            
        </div>
  </div>
</div>
<div class="container-fluid" id="menu_tops">
      <header id="header">
        <div class="top-bar">
          <div class="container" style="padding-right: 135px; padding-left: 135px;">
            <div class="row">
            <div class="col-lg-12 col-xs-12 text-center" style="margin-top: -60px">
                <div class="sandbox sandbox-correct-pronounciation">
                <img src="img/kiss.jpg" style="vertical-align:middle; height: 100px; width: 100px; ">
                  <h1 class="heading heading-correct-pronounciation">
                    <em>kalinga institute of social science</em> 
                     <span class="em_id"> Alumni</span>                
                  </h1>
                </div>
              </div> 
              <div class="col-sm-6 col-xs-12 ">
                <!-- <a class="navbar-brand" href="#"><img src="img/kiss.jpg" style="vertical-align:middle; height: 100px; width: 100px; margin-top: -100px;"></a> -->
              </div>
                       
            </div>

            
          </div>
        </div>
      </header>
    </div>
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
      <div class="col-lg-5" style="margin-left: 45px;">
        <div class="panel panel-default">
          <div class="panel-body" style="height: 650px; padding-left: 47px;">
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
       <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-body" style="height: 650px;" >
          <div class="title">
          <div class="about1">
   
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>KISS</strong><br>
                <b><small>(Kaling Institute Of Social Science)</small></b><br>
                Plot No.-2 ,  Vinayak Enclave, Kolathia<br>
                Near Patia, Bhubaneswar ODISHA-751019. <br>
                <abbr title="Phone">
                  Phone :</abbr>
               +91 8455083777<br>
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

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft  wow fadeInUp" data-wow-offset="200">
        <div class="logofooter"> Logo</div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
        <p><i class="fa fa-map-pin"></i> Fortune Tower</p>
        <p><i class="fa fa-phone"></i> Phone (India) : +91 977-6069-881</p>
        <p><i class="fa fa-envelope"></i> E-mail : info@innovadorslab.co.in</p>
        
      </div>
      <div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">GENERAL LINKS</h6>
        <ul class="footer-ul">
          <li><a href="#"> Career</a></li>
          <li><a href="#"> Privacy Policy</a></li>
          <li><a href="#"> Terms & Conditions</a></li>
          <li><a href="#"> Client Gateway</a></li>
          <li><a href="#"> Ranking</a></li>
          <li><a href="#"> Case Studies</a></li>
          <li><a href="#"> Frequently Ask Questions</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">LATEST POST</h6>
        <div class="post">
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--footer start from here-->

<div class="copyright">
  <div class="container">
    <div class="col-md-6">
      <p>© <?php echo date('Y');?> - All Rights with Innovadors Lab</p>
    </div>
    <div class="col-md-6">
      <ul class="bottom_ul">
        <li><a href="#">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Faq's</a></li>
        <li><a href="#">Contact us</a></li>
        <!-- <li><a href="#">Site Map</a></li> -->
      </ul>
    </div>
  </div>
</div>

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


   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
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

  
  <!-- <div class="content">
    <p>
<link rel="stylesheet" type="text/css" href="/sites/all/themes/dimention/basic.css">     <script type="text/javascript" src="/sites/all/themes/dimention/jquery.simplemodal.js"></script></p>
<p><a href="/newsletter.html" style="bottom: 50%; position: fixed; right: 3px; background-color: rgb(255, 255, 255); border: 1px solid rgb(218, 218, 218); padding: 5px; border-radius: 5px; color: rgb(51, 51, 51); z-index: 999; width: 30px;"><img alt="Newsletter abonnieren" src="http://www.4d.com/sites/default/files/img4d/homepage/newsletter.jpg" class="bt_newsletter"></a></p>  </div>

  
</div> --></div> <!-- /block-inner, /block -->
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
