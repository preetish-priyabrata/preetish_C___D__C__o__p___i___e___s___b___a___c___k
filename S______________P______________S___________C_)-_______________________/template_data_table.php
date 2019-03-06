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

<!-- css  -->

<link href="css/style.css" rel="stylesheet" />
<link href="css/my_styles.css" rel="stylesheet" />
<link href="css/print.css" rel="stylesheet" />
<link href="css/style_avi.css" rel="stylesheet" />
<link href="tab/style_sheet.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="date_picker/css/default.css" rel="stylesheet" />
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> -->
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!--For login -->
<!-- <script type="text/javascript" src="css/jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="js/jquery.timepicker.css" /> -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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

<body>
<div id="wrapper" class="home-page" data-position="fixed">


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
 <div class="menu-bg" style="background:#031334; border-bottom:2px solid #e7c101; "  >
    
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
          else if($_SESSION['admintech_exam'])
          {
            include_once 'admintech_menu.php';
          }
          else if($_SESSION['verification_exam'])
          {
            include_once 'verification_menu.php';
          }
          else if($_SESSION['admin_normal'])
          {
            include_once 'admin_menu.php';
          }
          else if($_SESSION['final_verification_exam'])
          {
            include_once 'final_verification_menu.php';
          }
          else if($_SESSION['admin_operational_exam'])
          {
            include_once 'admin_operational_menu.php';
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
					else if(!$_SESSION['cand_user'] && !$_SESSION['user'] && !$_SESSION['preexam_user'] && !$_SESSION['postexam_user'] && !$_SESSION['adminexam_user'] && !$_SESSION['verification_exam'] && !$_SESSION['admintech_exam'] && !$_SESSION['admin_normal'])
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
    
    <div id="sub-footer" style="margin-bottom:0px" data-position="fixed">
      <div class="container">
        
          <div class="col-lg-12">
            <div align="center">
              <p> <span><span style="text-transform:uppercase"><?php echo $res_temp["footer_name"]; ?></span> &copy; 2015 All right reserved. Powered By </span><a href="#" target="_blank">Innovadors Lab</a> </p>
            </div>
          </div>
          
        
      </div>
    </div>
  </footer>
</div>

<!-- javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 


 
</body>
<script src="js/jquery-ui.js"></script>
<script src="date_picker/js/zebra_datepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
    $('#myTable2').dataTable();
    $('#myTable1').dataTable();
     $('#myTable3').dataTable();
});


$(document).ready(function(){
    $('#timepicker').timepicker({
    	timeFormat: 'hh:mm:ss p',
        minTime: '07:00:00', // 11:45:00 AM,
        maxHour: 18,
        maxMinutes: 30,
        //startTime: new Date(0,0,0,15,0,0), // 3:00:00 PM - noon
        interval: 15 // 15 minutes
    });
});


</script>

</html>