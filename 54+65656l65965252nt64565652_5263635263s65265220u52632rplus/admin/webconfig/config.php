<?php
error_reporting(E_ALL);
date_default_timezone_set("Asia/Calcutta");

function preetishweb_encryptIt($q) {
    $cryptKey = '@#preetish_webs22';
    $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    return( $qEncoded );
}

function preetishweb_decryptIt($q) {
    $cryptKey = '@#preetish_webs22';
    $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    return( $qDecoded );
}

$localhost="localhost";
$user_id="preetish";
$password="panindia@1112";
$db_name="lnt_new_surp";
$conn=mysqli_connect("$localhost","$user_id","$password","$db_name");

if(!$conn){
	echo "Connection Error".mysqli_error($conn);
}