<?php 
session_start();
 
if($_SESSION['admin_hq']=="")
{
    //expired
    echo "-1";
    session_destroy();
}else if($_SESSION['admin_hq']!=""){
    //not expired
    echo "1";
}