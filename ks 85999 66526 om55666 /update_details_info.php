<?php
session_start();
include 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$msg->success('Please Fill Profile Form');
$_SESSION['update_profile']="6";
header("location:update_details.php");			 
exit;