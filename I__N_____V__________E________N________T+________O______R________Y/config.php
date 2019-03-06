<?php

error_reporting(0);

$host = "localhost";
$db = "lnt_inventory";
$user = "preetish";
$pass = "panindia@1112";
 
$conn=mysqli_connect("$host","$user","$pass","$db");
if (!$conn){
echo "error in connection ".mysqli_error($conn);
}

