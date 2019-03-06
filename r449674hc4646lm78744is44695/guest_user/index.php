<?php

session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

$_SESSION['admin_emails']="1";
$_SESSION['title']="RHCLMIS Guest DASHBOARD";
$_SESSION['admin_type']="Guest User";
$_SESSION['admin_name']="Guest";                      
$msg->success('Welcome Guest DashBoard  ');
header('Location:admin_dashboard.php');
exit;