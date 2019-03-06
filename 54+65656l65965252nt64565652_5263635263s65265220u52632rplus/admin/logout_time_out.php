<?php
session_start();
// $_SESSION['MSG']="you are logged out";
session_destroy();
session_start();
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $msg->success('Session Has Been Expired');
header('Location:../login/index.php');
exit;