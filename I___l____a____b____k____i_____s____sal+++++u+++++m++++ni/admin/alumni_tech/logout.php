<?php
session_start();
// $_SESSION['MSG']="you are logged out";
session_destroy();
session_start();
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $msg->success('SuccessFully Logout');
header('Location:../index.php');
//header('Location:http://alumni.ksom.ac.in');

exit;