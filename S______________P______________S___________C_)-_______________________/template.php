<?php
error_reporting(0);
session_start();
include "config.php";

$qry_temp="SELECT * FROM `template_info` WHERE `organisation`='spsc'";
$sql_temp=mysqli_query($conn, $qry_temp);
$res_temp=mysqli_fetch_array($sql_temp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Online Form Fillup</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/style_avi.css" rel="stylesheet" />
<link href="css/print.css" rel="stylesheet" />
<link href="tab/style_sheet.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="date_picker/css/default.css" rel="stylesheet" />
<!--For login -->
<link href="login_popups/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="login_popups/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="login_popups/js/vpb_script.js"></script>
<!--For login -->
<style>
.alert-box 
		{
			color:#555;
			border-radius:10px;
			font-family:Tahoma,Geneva,Arial,sans-serif;font-size:14px;
			padding:10px 10px 10px 50px;
			margin:10px;
			height:auto;
			box-shadow:#CCC 2px 3px 3px 2px;
		}
		.alert-box span 
		{
			font-weight:bold;
			text-transform:uppercase;
		}
		.success
		{
			background:#e9ffd9 url('img/Cute-Ball-Go-icon.png') no-repeat 10px 50%;
			border:1px solid #a6ca8a;
		}
</style>
<link rel='stylesheet' type='text/css' href='menu2/css/styles.css' />
<script src="menu2/js/jquery-1.7.1.min.js"></script>
<script type='text/javascript' src='menu2/js/menu_jquery.js'></script>


<script type="text/javascript" language="javascript" src="ajax/ajax_js/ajax_js.js"></script>
<body>
<div id="wrapper" class="home-page">


 <!-- start header -->
  <header>
    <div class="navbar navbar-default">
      <div class="col-lg-2" style="float:left; vertical-align:middle; text-align:center;">
          
          <!-- <a href="index.php"><img style="width:70px; height:70px;" src="uploads/organisation_logo/<?php echo $res_temp["header_logo"]; ?>"/></a> -->
                  </div>
                  <div class="col-lg-8">
                  <h2 style="color:#FFF; text-align:center; text-transform:uppercase">EM SYSTEM Testing</h2>
                  </div>
              <div class="col-lg-2" style="float:right; vertical-align:middle; text-align:center;"> <a href="index.php"><img  style="width:170px; height:70px; " src="img/logo4.png" alt="logo"/></a></div>
  
      
 </div>
  </header>
  <div class="clear"></div>
 
  <!-- end header --> 
 <div class="menu-bg" style="background:#031334; border-bottom:2px solid #e7c101; " >
    
         <div class="container">
            <div id="menu">
                <div id='cssmenu'><!--menu start-->
                    <ul>
                    <?php 
					if($_SESSION['cand_user'])
					{
						include_once 'candidate_menu.php';
					}
					else if($_SESSION['preexam_user'])
					{
						include_once 'preexam_menu.php';
					}
					else if($_SESSION['postexam_user'])
					{
						include_once 'postexam_menu.php';
					}
					else if($_SESSION['adminexam_user'])
					{
						include_once 'adminexam_menu.php';
					}
					else if($_SESSION['user'])
					{
						if($_SESSION['user']=="verification@gmail.com")
						{
							include_once 'verification_menu.php';
						}
						if($_SESSION['user']=="admin@gmail.com")
						{
							include_once 'admin_menu.php';
						}
						if($_SESSION['user']=="admintech@gmail.com")
						{
							include_once 'admintech_menu.php';
						}
			
					}
					else if(!$_SESSION['cand_user'] && !$_SESSION['user'] && !$_SESSION['preexam_user'] && !$_SESSION['postexam_user'] && !$_SESSION['adminexam_user'])
					{
						include_once 'index_menu.php';
					}
			?>
                    </ul>
                </div>
            </div>
         </div>
    </div>

  <div class="test"></div>
  
  
   <?php echo "$contents"; ?>
  
<br /><br /><br /><br /><footer>
    
    <div id="sub-footer" style="margin-bottom:0px">
      <div class="container">
        
          <div class="col-lg-12">
            <div align="center">
              <p> <span><span style="text-transform:uppercase"><?php echo $res_temp["footer_name"]; ?></span> &copy; <?=date('Y')?> All right reserved. Powered By </span><a href="#" target="_blank">Innovadors Lab</a> </p>
            </div>
          </div>
          
        
      </div>
    </div>
  </footer>
</div>

<!-- javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery.js"></script> 
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.fancybox.pack.js"></script> 
<script src="js/jquery.fancybox-media.js"></script> 
<script src="js/portfolio/jquery.quicksand.js"></script> 
<script src="js/portfolio/setting.js"></script> 
<script src="js/jquery.flexslider.js"></script> 
<script src="js/animate.js"></script> 
<script src="js/custom.js"></script> 
<script src="js/custom_avi.js"></script> 
<script src="js/owl-carousel/owl.carousel.js"></script>
<script src="js/jquery-ui.js"></script>

<script src="date_picker/js/zebra_datepicker.js"></script>

<script>
    function resetTabs(){
        $("#content > div").hide(); //Hide all content
        $("#tabs a").attr("id",""); //Reset id's      
    }

    var myUrl = window.location.href; //get URL
    var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
    var myUrlTabName = myUrlTab.substring(0,4); // For the above example, myUrlTabName = #tab

    (function(){
        $("#content > div").hide(); // Initially hide all content
        $("#tabs li:first a").attr("id","current"); // Activate first tab
        $("#content > div:first").fadeIn(); // Show first tab content
        
        $("#tabs a").on("click",function(e) {
            e.preventDefault();
            if ($(this).attr("id") == "current"){ //detection for current tab
             return       
            }
            else{             
            resetTabs();
            $(this).attr("id","current"); // Activate this
            $($(this).attr('name')).fadeIn(); // Show content for current tab
            }
        });

        for (i = 1; i <= $("#tabs li").length; i++) {
          if (myUrlTab == myUrlTabName + i) {
              resetTabs();
              $("a[name='"+myUrlTab+"']").attr("id","current"); // Activate url tab
              $(myUrlTab).fadeIn(); // Show url tab content        
          }
        }
    })()
  </script>
  
</body>
</html>