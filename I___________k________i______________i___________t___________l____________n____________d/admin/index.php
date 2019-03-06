<?php
session_start();

if((!isset($_SESSION['userId'])&& empty($_SESSION['userId']))&&(!isset($_SESSION['userType'])&&$_SESSION['userType']!="staff")){
    header('location: ../login_new.php');
}else{
    header('location: adminViewCandidateNew.php');
}

