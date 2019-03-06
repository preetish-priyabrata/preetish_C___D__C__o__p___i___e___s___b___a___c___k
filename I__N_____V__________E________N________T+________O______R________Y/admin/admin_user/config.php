<?php
// ini_set("display_errors", TRUE);
error_reporting(0);


function web_encryptIt($q) {
    $cryptKey = '@#preetish_webs22';
    $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    return( $qEncoded );
}

function web_decryptIt($q) {
    $cryptKey = '@#preetish_webs22';
    $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    return( $qDecoded );
}

date_default_timezone_set("Asia/Calcutta");
$host = "localhost";
$db = "lnt_inventory";
$user = "preetish";
$pass = "panindia@1112";
$conn=mysqli_connect("$host","$user","$pass","$db");
if (!$conn){
echo "error in connection ".mysqli_error($conn);
}
