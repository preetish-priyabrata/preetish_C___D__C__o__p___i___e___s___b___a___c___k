<?php 
session_start();
 
if($_SESSION['admin_field']=="")
{
    //expired
    echo "-1";
    session_destroy();
}else if($_SESSION['admin_field']!=""){
    //not expired
    echo "1";
}