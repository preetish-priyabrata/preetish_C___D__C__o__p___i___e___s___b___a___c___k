<?php

error_reporting(0);

$host = "localhost";
$user = "preetish";
$pass = "panindia@1112"; 
$db = "alumni_final1";

$conn=mysqli_connect("$host","$user","$pass","$db");
if (!$conn){
echo "error in connection ".mysqli_error($conn);
}