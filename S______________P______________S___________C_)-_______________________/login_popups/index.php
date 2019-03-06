<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>vasPLUS Programming Blog - Ajax and Jquery Registration or Sign-up Form Submission</title>




<!-- Required header files -->
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/vpb_script.js"></script>


</head>
<body>
<br clear="all">

<center>
<div style="font-family:Verdana, Geneva, sans-serif; font-size:25px;width:1000px;">Fancy Sign-up and Login Pop-up Boxes using CSS and Jquery</div><br clear="all" />


<div style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">Please click on any of the buttons below to demo the system.</div>
<br clear="all">










<!-- Sign-up and Login Links Starts Here -->
<center>
<div style="width:400px; margin-top:50px;" align="center">

<a href="javascript:void(0);" style="margin-right:60px;" class="vpb_general_button" onClick="vpb_show_sign_up_box();">Show Sign Up Box</a>

<a href="javascript:void(0);" class="vpb_general_button" onClick="vpb_show_login_box();">Show Login Box</a>

</div>
</center>
<br clear="all" />
<!-- Sign-up and Login Links Ends Here -->










<!-- Code Begins -->

<div id="vpb_pop_up_background"></div><!-- General Pop-up Background -->


<!-- Sign Up Box Starts Here -->
<div id="vpb_signup_pop_up_box">
<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; font-weight:bold;">Sign Up Box</div><br clear="all">
<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">To exit this sign-up box, click on the cancel button or outside this box..</div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Fullname:</div>
<div style="width:300px;float:left;" align="left"><input type="text" id="fullnames" name="fullnames" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Username:</div>
<div style="width:300px;float:left;" align="left"><input type="text" id="usernames" name="usernames" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Email Address:</div>
<div style="width:300px;float:left;" align="left"><input type="text" id="emails" name="emails" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Password:</div>
<div style="width:300px;float:left;" align="left"><input type="password" id="passs" name="passs" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">&nbsp;</div>
<div style="width:300px;float:left;" align="left">
<a href="javascript:void(0);" class="vpb_general_button" onClick="alert('Hello There!\n\n There is no functionality associated with the button you have just clicked. \n\nThis is just a demonstration of Pop-up Boxes and that\'s all.\n\nThanks.');">Submit</a>

<a href="javascript:void(0);" class="vpb_general_button" onClick="vpb_hide_popup_boxes();">Cancel</a>
</div>

<br clear="all"><br clear="all">
</div>
<!-- Sign Up Box Ends Here -->








<!-- Login Box Starts Here -->
<div id="vpb_login_pop_up_box" class="vpb_signup_pop_up_box">
<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; font-weight:bold;">Users Login Box</div><br clear="all">
<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">To exit this login box, click on the cancel button or outside this box..</div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Username:</div>
<div style="width:300px;float:left;" align="left"><input type="text" id="usernames" name="usernames" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">Your Password:</div>
<div style="width:300px;float:left;" align="left"><input type="password" id="passs" name="passs" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">

<div style="width:100px; padding-top:10px;margin-left:10px;float:left;" align="left">&nbsp;</div>
<div style="width:300px;float:left;" align="left">

<a href="javascript:void(0);" class="vpb_general_button" onClick="alert('Hello There!\n\n There is no functionality associated with the button you have just clicked. \n\nThis is just a demonstration of Pop-up Boxes and that\'s all.\n\nThanks.');">Login</a>

<a href="javascript:void(0);" class="vpb_general_button" onClick="vpb_hide_popup_boxes();">Cancel</a>
</div>

<br clear="all"><br clear="all">
</div>
<!-- Login Box Ends Here -->






<!-- Code Ends -->



















<p style="margin-bottom:500px;"></p>
</center>
</body>
</html>