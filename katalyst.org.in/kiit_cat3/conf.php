<?php

function encryptIt($q) {
    $cryptKey = '@#1jatin';
    $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    return( $qEncoded );
}

function decryptIt($q) {
    $cryptKey = '@#1jatin';
    $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    return( $qDecoded );
}
function encryptIt_webs($q) {
    $cryptKey = '@#preztishwebscrat';
    $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    return( $qEncoded );
}
//decrypt_code
function decryptIt_webs($q) {
    $cryptKey = '@#preztishwebscrat';
    $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    return( $qDecoded );
}
date_default_timezone_set("Asia/Calcutta");
$db_name="kiittnp_cs_NEW";
$server="localhost";
//$user="root";
// $user="kiittnp_tnp";
$user = "preetish";
$password = "panindia@1112";
// $password="bhubaneswar1@#$5";
$con = mysqli_connect("localhost", "$user", "$password", "$db_name");
//$con = mysqli_connect("localhost", "root", "", "cs");
?>