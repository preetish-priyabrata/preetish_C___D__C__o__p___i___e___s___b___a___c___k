<!--<div style="width:400px; margin-top:50px;" align="center">-->
<li style="float:right"><a href="javascript:void(0);" style="margin-right:60px;" class="vpb_general_button" onClick="vpb_show_sign_up_box();">Sign Up</a></li>

<li style="float:right"><a href="javascript:void(0);" class="vpb_general_button" onClick="vpb_show_login_box();">Login</a></li>
<!--</div>-->

<div id="vpb_pop_up_background"></div><!-- General Pop-up Background -->


<!-- Sign Up Box Starts Here -->
<div id="vpb_signup_pop_up_box">
<form action="#" method="post" id="signup"  name="signup" enctype="multipart/form-data">
              
              <legend>Sign Up</legend>
              <table class="table">
                                <tr>
                                <td>Phone No</td>
                                <td><input type="text" id="phone" name="phone" class="form-control" /></td>
                                </tr>
                                <tr>
                                <td>Email Id</td>
                                <td><input type="text" id="email" name="email" class="form-control" /></td>
                                </tr>
                                
                                </table>
                                <table class="table">
                                
    <?php if(isset($signup_msg1)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $signup_msg1;?></td>
    </tr>
    <?php } if(isset($signup_msg2)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $signup_msg2;?></td>
    </tr>
    <?php } if(isset($signup_msg3)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $signup_msg3;?></td>
    </tr>
    <?php } if(isset($signup_msg4)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $signup_msg4;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td align="right" valign="top"> Validation code:</td>
      <td><img src="phpcaptcha/captcha_sign.php?rand=<?php echo rand();?>" id='captchaimg1'><br>
        <label for='message'>Enter the code above here :</label>
        <br>
        <input id="captcha_code1" name="captcha_code1" type="text">
        <br>
        Can't read the image? click <a href='javascript: refreshCaptcha1();'>here</a> to refresh.</td>
    </tr>
    
  </table>
                                <center><input type="submit" name="submit" id="submit" value="Submit" class="btn-primary" />&nbsp;<input type="reset" name="reset" id="reset" value="Reset" class="btn-primary" />&nbsp;<input type="button" class="btn-primary" onClick="vpb_hide_popup_boxes();" value="Cancel" id="cancel" name="cancel"></center>
              </div>        
              </form>


<br clear="all"><br clear="all">
</div>
<!-- Sign Up Box Ends Here -->








<!-- Login Box Starts Here -->
<div id="vpb_login_pop_up_box">
<form action="#" method="post" id="login"  name="login" enctype="multipart/form-data">
              
              <legend>Log In</legend>
<table class="table">
                                
                                <tr>
                                <td>User Name</td>
                                <td><input type="number" id="uname" name="uname" class="form-control" /></td>
                                </tr>
                                <tr>
                                <td>Password</td>
                                <td><input type="password" id="pass" name="pass" class="form-control" /></td>
                                </tr>
                                </table>
                                <table class="table">
    <?php if(isset($login_msg1)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $login_msg1;?></td>
    </tr>
    <?php } if(isset($login_msg2)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $login_msg2;?></td>
    </tr>
    <?php } if(isset($login_msg3)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $login_msg3;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td align="right" valign="top"> Validation code:</td>
      <td><img src="phpcaptcha/captcha.php?rand=<?php echo rand();?>" id='captchaimg2'><br>
        <label for='message'>Enter the code above here :</label>
        <br>
        <input id="captcha_code" name="captcha_code" type="text">
        <br>
        Can't read the image? click <a href='javascript: refreshCaptcha2();'>here</a> to refresh.</td>
    </tr>
    
  </table>
                                <center><input type="submit" name="login" id="login" value="Login" class="btn-primary" />&nbsp;<input type="reset" name="reset" id="reset" value="Reset" class="btn-primary" />&nbsp;<input type="button" class="btn-primary" onClick="vpb_hide_popup_boxes();" value="Cancel" id="cancel" name="cancel"></center><br>

<center><a href="#" style="color:#F00">Forget Password?</a></center>
<br clear="all"><br clear="all">
</form>
</div>
<!-- Login Box Ends Here -->






<!-- Code Ends -->




