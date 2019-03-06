<?php 
session_start();
 
if($_SESSION['admin_Pre_tech_s']=="")
{
    //expired
    echo "-1";
    session_destroy();
}
else if($_SESSION['admin_Pre_tech_s']!=""){
    //not expired
    echo "1";
}