<?php
session_start();
// $_SESSION['MSG']="you are logged out";
session_destroy();
session_start();
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $msg->success('SuccessFully Loggedout');
header('Location:http://www.innovadorslab.co.in/ksom/user_login.php');
exit;