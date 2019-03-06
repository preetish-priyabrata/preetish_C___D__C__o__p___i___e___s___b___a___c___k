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
						      	<li class=""><a href="#">Home</a></li>
						        <li><a href="#">About Us</a></li>
						        <li><a href="#">Activites</a></li>
						        <li><a href="#">News & Views</a></li>
						        <li><a href="#">Events</a></li>
						        <li><a href="contact_us.php">Contact Us</a></li>
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
		
               	<div class="row" style="width: 976px;background: none;margin: 0 auto;">
						<div class="row" >
						   	<div class="col-sm-12 " style="background-color: #F8F6EF; padding:30px 1px 10px 1px;">
						   	 	<div class="col-sm-6 col-md-6 col-lg-6">
									<!--<img src="img/3-IMG_23601.jpg" class="img-rounded" width="444" height="250">-->
									<img src="img/2222.jpg" class="img-rounded" width="444" height="250">  
								</div>      
								<div class="col-sm-6 col-md-6 col-lg-6">
								<div style="display:block; line-height: 33px; font-family: 'Lato', sans-serif; font-size:35px; font-weight: 300; color: #454545;">
									7 Life Skills Activities for 360 degree Development
								</div>
								<!--<div style="font-size: 22px; padding-top:20px; display:block; font-family: 'Lato', sans-serif; font-weight: 300; color: #454545;">August is upon us. Get the most out of the dog days with a little help from My-Kiss&nbsp;Alumni. </div>-->
				  				<a href="#" class="saabtn">Read</a><br><br>
				  				</div>
				    		</div>
						</div>
						<br>
						<h3 style="color:#8C1515">OUR Photo-Gallery</h3>
						<div class="row">
						<?php
							require 'config.php';
							$sql = "SELECT * FROM `user_gallery_upload` where `publish_status`='1' ORDER BY `date_publish` desc ,`sl_no` DESC  LIMIT 0,3";
    						$result = mysqli_query($conn,$sql);
    						while($fetch = mysqli_fetch_array($result)){ 

    						?>						  
					        <div class="col-md-4 col-sm-6">
					          <div class="our-team">
					            <img src="admin/uploads/gallery_big/<?php echo $fetch['photo'];?>" class="img-rounded" width="304" height="150" alt="">
					               <div class="team-content">
					                 <p class="description"><?php echo $fetch['title'];?></p>
					                 <a href="#" class="read">Read <i class="fa fa-angle-right"></i></a>
					              </div>
					           </div>
					        </div>

					        <?php }?>
					     
						</div>	
						<br>
					
						
					<hr>
					<h3 style="color:#8C1515">CATCH A GLIMPSE</h3>
					<div class="row">
  					<div class="col-sm-8">	
  						<iframe src="https://www.youtube.com/embed/F2OKrbupDtA?rel=0&amp;showinfo=0" allowfullscreen="" width="570" height="321" frameborder="0"></iframe>
  						<div class="section_title">My Kiss Alumni. Never stop growing.</div>
  						<div class="descrip">Wherever life takes you after My Kiss, we are here to help.</div>
  						<a href="#" class="saabtn"><span></span>Watch</a>
  					</div>
  					<div class="col-sm-4">
  					<div class="row3_col2">
					<div class="section_header" style="margin-bottom: 20px; text-align: center; color: #8C1515"><h4>SHARING WALL</h4></div>
					  <?php 
    					require 'config.php';
    					$post="SELECT * FROM `user_sharing_info_details` where `post_type`='2' or `post_type`='3' or `post_type`='5' or `post_type`='6' and `status`='1' order by `date_approved` DESC, `time_approved` DESC   LIMIT 0 , 3";

    					$sql=mysqli_query($conn,$post);
    					while ($result_post=mysqli_fetch_assoc($sql)) {
    					$posting=$result_post['post_type'];
        				switch ($posting) {
        				case '2':?>
        				<a href="#" class="modal-trigger dashboard_row" data-modal="modal-name<?=$result_post['sl_no']?>">
						<img style="width: 3pc;" src="img/text.jpg"> <?=$result_post['title']?></a>
						<hr>
					  <?php 	
        				break;
        				case '3':
        			  ?>
        				<a href="#" class="modal-trigger dashboard_row" data-modal="modal-name<?=$result_post['sl_no']?>">
						<img style="width: 3pc;" src="img/url.jpg"> <?=$result_post['title']?></a>
						<hr>
					   <?php 
        			    break;
        				case '5':
        			   ?>
        				<a  href="#" class="modal-trigger dashboard_row" data-modal="modal-name<?=$result_post['sl_no']?>" >
						<img style="width: 3pc;" src="img/pdf/pdf-page.png"><?=$result_post['title']?></a>
						<hr>
					   <?php 
        				break;
        				case '6':
        			   ?>
        				<a  href="#" class="modal-trigger dashboard_row" data-modal="modal-name<?=$result_post['sl_no']?>" >
						<img style="width: 3pc;" src="img/video.jpg"><?=$result_post['title']?></a>
						<hr>
					   <?php 
        				break;
        			    default:
        				# code...
        				break;
        				}
        				}
           			   ?>
									
					    <a href="user_login.php" class="saabtn" style="margin-top:40px; width: 131px;"> My Kiss</a>
						</div>
                        </div>
  						</div>
                        <br>
  						<!-- bodal start  -->
  				<?php 
				require 'config.php';
				$post1="SELECT * FROM `user_sharing_info_details` where `post_type`='2' or `post_type`='3' or `post_type`='5' or `post_type`='6' and `status`='1' order by `date_approved` DESC, `time_approved` DESC   LIMIT 0 , 3";
				$sql1=mysqli_query($conn,$post1);
				while ($result_post1=mysqli_fetch_assoc($sql1)) {
				$posting1=$result_post1['post_type'];
				switch ($posting1) {
				case '2':
   			   ?>
				<div class="modal" id="modal-name<?=$result_post1['sl_no']?>">
					<div class="modal-sandbox"></div>
						<div class="modal-box">
							<div class="modal-header">
								<div class="close-modal">&#10006;</div> 
								<h1>Share Information </h1>
								</div>
							<div class="modal-body">	       
		               	    <table class="table">
						     <tr>
							  <td><h4><b>Title</b></h4></td>
							  <td>:</td>
							  <td><?php echo $result_post1['title'];?></td>
						     </tr>
							 <tr>
							  <td><h4><b>Text</b></h4></td>
							  <td>:</td>
							  <td><?php echo $result_post1['text'];?></td>
							 </tr>
					        </table>
					       <br />
						<button class="close-modal">Close!</button>
					  </div>
				    </div>
			      </div>
			<?php 
			break;
			case '3':
			?>
			<div class="modal" id="modal-name<?=$result_post1['sl_no']?>">
				<div class="modal-sandbox"></div>
					<div class="modal-box">
						<div class="modal-header">
							<div class="close-modal">&#10006;</div> 
							<h1>Share Information </h1>
						</div>
						<div class="modal-body">	       
		                	<table class="table">
						   	<tr>
							 <td><h4><b>Title</b></h4></td>
							 <td>:</td>
							 <td><?php echo $result_post1['title'];?></td>
						     </tr>
							<tr>
							 <td><h4><b>URL</b></h4></td>
					         <td>:</td>
					         <td><iframe src="<?php echo $result_post1['url'];?>" width="640" height="600"></iframe>
                             <p><a href="<?php echo $result_post1['url'];?>" target="iframe_a">Click Here To view </a></p>
					         </td>
							</tr>
					        </table>
					        <br />
						<button class="close-modal">Close!</button>
					</div>
				</div>
			</div>
<?php 
		break;
		case '6':
?>
			<div class="modal" id="modal-name<?=$result_post1['sl_no']?>">
				<div class="modal-sandbox"></div>
				<div class="modal-box">
					<div class="modal-header">
						<div class="close-modal">&#10006;</div> 
						<h1>Share Information </h1>
					</div>
					<div class="modal-body">	       
		                <table class="table">
						    <tr>
							    <td><h4><b>Title</b></h4></td>
							    <td>:</td>
							    <td><?php echo $result_post1['title'];?></td>
						    </tr>
							<tr>
								<td><h4><b>URL</b></h4></td>
					            <td>:</td>
					            <td><?php echo $result_post1['url'];?>
					            </td>
							</tr>
					    </table>
					    <br />
						<button class="close-modal">Close!</button>
					</div>
				</div>
			</div>	
<?php 
        break;
      	case '5':      		
?>
			<div class="modal" id="modal-name<?=$result_post1['sl_no']?>">
				<div class="modal-sandbox"></div>
				<div class="modal-box">
					<div class="modal-header">
						<div class="close-modal">&#10006;</div> 
						<h1>Share Information </h1>
					</div>
					<div class="modal-body">	       
		                <table class="table">
						    <tr>
							    <td><h4><b>Title</b></h4></td>
							    <td>:</td>
							    <td><?php echo $result_post1['title'];?></td>
						    </tr>
							<tr>
								<td><h4><b>PDF</b></h4></td>
					            <td>:</td>
					            <td><iframe  width="640" height="600" src="admin/uploads/pdf_file/<?php echo $result_post1['photo'];?>"></iframe>
					            </td>
							</tr>
					    </table>
					    <br />
						<button class="close-modal">Close!</button>
					</div>
				</div>
			</div>	
			?>
			<?php 
			break;
			default:
				# code...
				break;
}
}
			?>
					<!-- end modal -->
  						<hr>
  						<div class="row">
  							<div id="row6">
								<div class="row6_col1">
									<div class="section_header" style="color:#8C1515">LAST WORD</div>
									
									<div class="descrip">
								<!-- <img src="img/4.jpeg" class="img-rounded" width="255" height="255">--><iframe width="560" height="315" src="https://www.youtube.com/embed/d9VJCabrCFo" frameborder="0" allowfullscreen></iframe>
								  <!-- <img src="/content/saa/homepage/images/Applebaum_2x.jpg"> --><div class="section_title2">Radical creativity</div>
									  <p>A campaign to educate and empower tribal children</p>
									</div>
									<a href="#" class="saabtn"><span>Watch video of Seasons of Love</span>Watch</a>
								</div>
							  <div class="row6_col2">
								<div class="section_header">SPONSORED</div>
						<!-- <img src="/content/saa/homepage/images/stanford_outloud.gif"></a>
						          -->
						           
						        <a href="#"><img src="img/Custom1.jpg" class="img-rounded" width="305" height="205"></a>

						        </div>
							</div>
  						</div>
  						<div class="row">
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
			 	<a href="contact_us.php">Contact Us</a>
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
  	</div>
</div>
<script type="text/javascript">
	$(".modal-trigger").click(function(e){
  e.preventDefault();
  dataModal = $(this).attr("data-modal");
  $("#" + dataModal).css({"display":"block"});
});

$(".close-modal, .modal-sandbox").click(function(){
  $(".modal").css({"display":"none"});
});
</script>
</body>
</html> 