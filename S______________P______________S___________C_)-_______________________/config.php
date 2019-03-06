<?php

error_reporting(E_ALL);

$host = "localhost";
$db = "spsc2";
$user = "preetish";
$password = "panindia@1112";
// ilab_dbs_katalyst'@'localhost
$pass = "panindia@1112";
$conn=mysqli_connect("$host","$user","$pass","$db");
if (!$conn){
echo "error in connection ".mysqli_error($conn);
}
