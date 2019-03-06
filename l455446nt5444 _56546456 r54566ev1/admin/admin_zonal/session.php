<?php 
session_start();
 
if($_SESSION['admin_zonal']=="")
{
    //expired
    echo "-1";
    session_destroy();
}else if($_SESSION['admin_zonal']!=""){
    //not expired
    echo "1";
}