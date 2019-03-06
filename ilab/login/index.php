<!--
  Author: W3layouts
  Author URL: http://w3layouts.com
  License: Creative Commons Attribution 3.0 Unported
  License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
  <title>Login To Innovadors Lab Admin</title>
  <link rel="stylesheet" href="css_login/style.css">
  <link href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300,200' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <!-- <link rel="stylesheet" type="text/css" href="assert/css/bootstrap.css"> -->
  <!-- For-Mobile-Apps-and-Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Dark Sign In Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- //For-Mobile-Apps-and-Meta-Tags -->

</head>

<body>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script async type='text/javascript' src='//cdn.fancybar.net/ac/fancybar.js?zoneid=1502&serve=C6ADVKE&placement=w3layouts' id='_fancybar_js'></script>

<body>




    <h1>Admin Login</h1>
  <!---728x90-->
    <div class="container">
        <h2>Sign In</h2>
    <form method="POST" action="login.php">
      <input type="text" name="user_id" class="name" placeholder="Username" required="">
      <input type="password" name="pass_id" class="password" placeholder="Password" required="">
      <input type="hidden" name="login_admin" value="chech_admin">
      <div class="clear"></div>
      <input type="submit" name="submit" value="SIGN IN">
    </form>
  </div>
  <div class="footer">
  <!--728x90-->
    <p> &copy; <?=date('Y')?> Innovadors Lab</p>
  <!--728x90-->
  </div>
</body>
</html>