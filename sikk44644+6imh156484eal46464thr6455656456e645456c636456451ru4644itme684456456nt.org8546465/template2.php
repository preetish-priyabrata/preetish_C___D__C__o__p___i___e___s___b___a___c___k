<!DOCTYPE html>
 
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Text Gradients</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assert/css/style_head.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assert/css/news_scroll.css" type="text/css">
 <noscript>
 For full functionality of this site it is necessary to enable JavaScript.
 Here are the <a href="https://www.enable-javascript.com/" target="_blank">
 instructions how to enable JavaScript in your web browser</a>.
</noscript>
    
</head>
<body>

    <div class="container-fluid" id="container-fluids">
        <div class="col" id="demo">
             <div class="row row-eq-height">
                <div class="col">
                 <div class="col-1"> <img src="assert/img/logo.png" class="rounded" width="100" alt="Innovadors Lab"> </div>
                  <!-- <div class="col-4">  -->
                    <div class="text-center">
                        <h3 class="gray2"> Health Care, Human Services and Family Welfare Department </h3>
                        <h5 class="gray2"> government of sikkim </h5>
                    </div>
                  <!-- <div class="col-4">col-4</div> -->
                </div> 
            </div>
                <h3 class="newspaper2 text-center">Online Recruitment Management</h3>
        </div>
       
    </div>
    <div class="container-fluid" id="container-fluids">
        <nav class="navigation navbar navbar-expand-sm">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
             <div class="collapse navbar-collapse justify-content-center" id="nav-content">   
                <ul class="menu navbar-nav">
                  <li class="menu__item">
                        <a href="index" class="menu__link">
                            <span class="menu__title">
                                <span class="menu__first-word fa fa-home fa-xs" style="font-size: 35px" data-hover="">
                                  <i class="fa fa-home fa-xs" style="font-size: 35px"></i>
                                </span>
                                <span class="menu__second-word" data-hover="Home">
                                    Home
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="menu__item">
                        <a href="sign_in" class="menu__link">
                            <span class="menu__title">
                                <span class="menu__first-word" data-hover="User">
                                    User
                                </span>
                                <span class="menu__second-word" data-hover="Login">
                                    Login
                                </span>
                            </span>
                        </a>
                    </li>

                    <li class="menu__item">
                        <a href="sign_up" class="menu__link">
                            <span class="menu__title">
                                <span class="menu__first-word" data-hover="User">
                                    User
                                </span>
                                <span class="menu__second-word" data-hover="Register">
                                    Register
                                </span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        
    <div class="container-fluid" >

        <div class="row">
            <div class="col-md-8 col-lg-8 col-xs-12">
            <?php 
                echo $content_details;
            ?>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <!-- START SCROLLING NEWS WINDOW SAMPLE -->
                <div id="news_iframe_scroll">
                <div class="news_scroll-title">
                News and Updates<br>
                </div>
                <iframe name="NewsIFrame" src="new_update" frameborder="0" scrolling="no"></iframe>
                </div>
                <!-- END SCROLLING NEWS WINDOW SAMPLE -->

            </div>
        </div>



    </div>


</div>





<div class="bg-dark" style="border:2px solid #15224f"></div>
<!--footer-->
<footer class="footer1">
<div class="container">

<div class="row"><!-- row -->
                
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
            
                <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Useful links</h1>
                                
                                <ul>
                                    <li><a href="#" title="Product and Services" data-toggle="modal" data-target="#Product_services"><i class="fa fa-angle-double-right"></i> Product and Services</a></li>
                <li><a href="#" title="Terms and Conditions" data-toggle="modal" data-target="#term_condition" ><i class="fa fa-angle-double-right"></i> Terms and Conditions</a></li>
                <li><a href="#" title="Refund/Cancellation Policy" data-toggle="modal" data-target="#Refund"><i class="fa fa-angle-double-right"></i> Refund/Cancellation Policy</a></li>
                <li><a href="#" title="Privacy Policy" data-toggle="modal" data-target="#Privacy"><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
               

                                </ul>
                    
                            </li>
                            
                        </ul>
                         
                      
                </div><!-- widgets column left end -->


                <!-- modals  -->
                    <!-- Modal1 -->
                    <div class="modal fade" id="Product_services" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Product and Services</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h2 style="margin-top: 0.49cm; margin-bottom: 0cm; line-height: 100%; text-align: center;"><span style="color: #008000;"><strong><span style="text-decoration: underline;">Product and Services </span></strong></span><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;"><br /></span></span></span></h2>
                            <ol type="a">
                            <li>
                            <p class="western" style="margin-bottom: 0cm; line-height: 100%;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Application fee shall be Rs 100 for Group D and Rs 150 for Drivers.</span></span></span></p>
                            </li>
                            <li>
                            <p class="western" style="margin-bottom: 0.49cm; line-height: 100%;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Department does not charge any processing fee or service charge from the candidates for online payment. However, the candidates have to pay the charges as applicable for the merchant banks / online gateway charges.</span></span></span></p>
                            </li>
                            </ol>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                          </div>
                        </div>
                      </div>
                    </div>

                     <!-- Modal2 -->
                    <div class="modal fade" id="term_condition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h2 style="margin-top: 0.49cm; margin-bottom: 0cm; line-height: 100%; text-align: center;"><span style="color: #008000;"><strong><span style="text-decoration: underline;">Terms and Conditions</span></strong></span><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;"><br /></span></span></span></h2>
                            <p class="western" style="margin-top: 0.49cm; margin-bottom: 0cm; line-height: 100%;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Candidates are advised to pay Application fee online. Candidates may use a valid bank account to make the payment.</span></span></span></p>
                            <p class="western" style="margin-bottom: 0cm; line-height: 100%;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Online payment of Application fee can be made, using the following modes:</span></span></span></p>
                            <ol>
                            <li class="western" style="margin-bottom: 0cm; line-height: 100%;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Net Banking.</span></span></span></li>
                            <li class="western" style="margin-bottom: 0cm; line-height: 100%;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Debit Card (VISA, Master).</span></span></span></li>
                            <li class="western" style="margin-bottom: 0.49cm; line-height: 100%;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Credit Card. (VISA, Master)</span></span></span></li>
                            </ol>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                          </div>
                        </div>
                      </div>
                    </div>

                     <!-- Modal3 -->
                    <div class="modal fade" id="Refund" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Refund/Cancellation Policy</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h2 style="margin-top: 0.49cm; margin-bottom: 0cm; line-height: 100%; text-align: center;"><span style="color: #008000;"><strong><span style="text-decoration: underline;">Refund/Cancellation Policy</span></strong></span><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;"><br /></span></span></span></h2>
                                <p class="western" style="margin-top: 0.49cm; margin-bottom: 0.49cm; line-height: 100%;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Fee once paid will not be refunded. However, if there is any excess payment for any reason whatsoever, the candidates may file his/her claim with the Secretary, Health Department.</span></span></span></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                          </div>
                        </div>
                      </div>
                    </div>

                     <!-- Modal4 -->
                     <div class="modal fade bd-example-modal-lg" id="Privacy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Privacy Policy</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h2 style="margin-top: 0.49cm; margin-bottom: 0cm; line-height: 100%; text-align: center;"><span style="color: #008000;"><strong><span style="text-decoration: underline;">Privacy Policy</span></strong></span><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;"><br /></span></span></span></h2>
                            <div class="container">
                            <div class="text-left">
                               <p class="western" style="margin-top: 0.49cm; margin-bottom: 0.49cm; line-height: 100%; orphans: 2; widows: 2;" align="left"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">The Privacy Policy governs the use of this website.</span></span></span></p>     
                               </div>                          
                                <ul style="list-style-type: disc;">
                                <li class="western" style="margin-top: 0.49cm; margin-bottom: 0cm; line-height: 100%; text-align: justify;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Sikkim, Department of&nbsp; Health and Family Welfare is committed to protect your privacy and works towards offering you a useful, safe online experience.</span></span></span></li>
                                <li class="western" style="margin-bottom: 0cm; line-height: 100%; text-align: justify;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Your information, whether public or private, will not be sold, exchanged, transferred, or given by the department, to any other institution for any reason whatsoever, without your consent.</span></span></span></li>
                                <li class="western" style="margin-bottom: 0cm; line-height: 100%; text-align: justify;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Department reserves the right, in its discretion, to change or modify all or any part of this Agreement at any time, effective immediately upon notice published on the site. Your continued use of the website constitutes your binding acceptance of these terms and conditions, including any changes or modifications made by the department as permitted above.</span></span></span></li>
                                <li class="western" style="margin-bottom: 0cm; line-height: 100%; text-align: justify;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Department treats your personal information or your use of the service as private and confidential and does not check, edit or reveal it to any third parties except where it believes in good faith, such action is necessary to comply with the applicable legal and regulatory processes or to protect and defend the rights of other users or to enforce the terms of service which are binding on all the users of the site.</span></span></span></li>
                                <li class="western" style="margin-bottom: 0cm; line-height: 100%; text-align: justify;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Except where specifically agreed upon or necessary for operational or regulatory reasons Department will not send you any unsolicited information via e-mail. The user can nevertheless unsubscribe from receipt of such e-mails by following instructions therein.</span></span></span></li>
                                <li class="western" style="margin-bottom: 0cm; line-height: 100%; text-align: justify;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">The information contents provided on this site cannot be copied, modified, uploaded, downloaded, published or republished, transmitted or otherwise distributed for commercial purposes without prior and explicit permission from the department.</span></span></span></li>
                                <li class="western" style="margin-bottom: 0cm; line-height: 100%; text-align: justify;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">Reproduction of any information or material provided on this website, with or without any modification, is prohibited unless, with prior permission of the department and shall amount to violation of copyright and would be deemed an illegal act.</span></span></span></li>
                                <li class="western" style="margin-bottom: 0.49cm; line-height: 100%; text-align: justify;"><span style="color: #222222;"><span style="font-family: Arial, serif;"><span style="font-size: small;">All matters of dispute shall be dealt under the jurisdiction of High Court of Sikkim.</span></span></span></li>
                                </ul>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                          </div>
                        </div>
                      </div>
                    </div>

                    





                <!-- end of modals -->
                



               
                
                <div class="col-lg-9 col-md-9"><!-- widgets column center -->
                
                   
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">Contact Detail </h1>
                                
                                <div class="footerp"> 
                                
                                <!-- <h2 class="title-median">Health Care, Human Services and Family Welfare Department</h2> -->
                                <p><b>Email id:</b> <a href="mailto:secretarydeputy@gmail.com">secretarydeputy@gmail.com</a></p>
                                
                                <address>
                                  <strong>Address .</strong><br>
                                     Health Care, Human Services and Family Welfare Department, Govt of Sikkim,<br>
                                    Tashiling, Gangtok<br>
                                      <!-- <abbr title="HelpLine Phone No"><b>HelpLine No</b> <b style="color:green;"> <small>(M0N-FRI [11 AM to 4 PM])/(Lunch Break [1 PM-2:30 PM])</small></b><b style="color:red;"><small> (Sat-Sun Closed) </small></b> :</abbr> <strong>  09776069881</strong> -->
                                </address>
                                </div>
                                
                                <div class="social-icons">
                                
                                  
                                </div>
                            </li>
                          </ul>
                       </div>
                </div>
</div>
</footer>
<!--header-->

<div class="footer-bottom">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                <div class="copyright">

                    © <?=date('Y')?>, Innovadors Lab, All rights reserved

                </div>

            </div>

            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                <div class="design">

                     <a href="#">Franchisee </a> |  <a target="_blank" href="http://www.innovadorslab.com">Web Design & Development by Innovadors Lab</a> | <a href="#">Best View Use Latest Browser </a>  

                </div>

            </div>

        </div>

    </div>

</div>


      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <!-- <script  src="https://code.jquery.com/jquery-3.2.1.js"></script> -->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
    <script type="text/javascript">
      function IsNewTab() {
  return $.cookie('TabOpen');
}

// $(function() {
//   if (!IsNewTab()) {
//     $.cookie('TabOpen', "YES", {
//       path: '/'
//     });
//     $(window).unload(function() {
//       $.removeCookie('TabOpen', {
//         path: '/'
//       });
//     });
//   } else {
//     alert('already some tab open')
//       //OR
//       //window.close()
//   }
// });

//  window.onload = function(){
//     if (document.cookie.indexOf("_instance=true") === -1) {
//     document.cookie = "_instance=true";
//     // Set the onunload function
//     window.onunload = function(){
//         document.cookie ="_instance=true;expires=Thu, 01-Jan-1970 00:00:01 GMT";
//     };
//     // Load the application
//     }
//     else {
//     // Notify the user
//     }
//     };
    </script>
</body>
</html>