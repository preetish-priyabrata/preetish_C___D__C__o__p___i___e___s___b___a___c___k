<?php 
session_start();
 
if($_SESSION['user_no']=="")
{
    //expired
    echo "-1";
    session_destroy();
}
else if($_SESSION['user_no']!=""){
    //not expired
    echo "1";
}