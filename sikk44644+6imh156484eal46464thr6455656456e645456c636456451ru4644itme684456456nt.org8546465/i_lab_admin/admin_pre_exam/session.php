<?php 
session_start();
 
if($_SESSION['admin_preexam']=="" && $_SESSION['admin_tech']=="")
{
    //expired
    echo "-1";
    session_destroy();
}
else if($_SESSION['admin_preexam']=="" || $_SESSION['admin_tech']==""){
    //not expired
    echo "1";
}