<?php
error_reporting(E_ALL);
// encrypt code
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
$db_name="gen_bihar";
$server="localhost";
// $user="kiittnp";
$user = "preetish";
$password = "panindia@1112";
$conn = mysqli_connect("localhost", "$user", "$password", "$db_name");
//$con = mysqli_connect("localhost", "root", "", "notice");
?>