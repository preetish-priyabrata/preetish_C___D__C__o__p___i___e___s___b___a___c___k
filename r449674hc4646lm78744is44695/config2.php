<?php

error_reporting(E_ALL);

$host = "localhost";
$db = "innovado_rhclmis";
$user = "innovado_preetis";
$pass = "pan@11113";
 
$conn=mysqli_connect("$host","$user","$pass","$db");
if (!$conn){
echo "error in connection ".mysqli_error($conn);
}
