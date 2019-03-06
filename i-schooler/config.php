<?php

error_reporting(E_ALL);

$host = "localhost";
$db = "i_e_schoolers";
$user = "preetish";
$pass = "panindia@1112";
 
$conn=mysqli_connect("$host","$user","$pass","$db");
if (!$conn){
echo "error in connection ".mysqli_error($conn);
}
