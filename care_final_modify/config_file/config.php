<?php

error_reporting(E_ALL);
ini_set("session.gc_maxlifetime","3600"); 

// function web_encryptIt($q) {
//     $cryptKey = '@#preetish_webs22';
//     $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
//     return( $qEncoded );
// }
// // mcrypt_encrypt(MCRYPT_RIJNDAEL_128, md5($key, true), $string, MCRYPT_MODE_CBC, $iv)
// function web_decryptIt($q) {
//     $cryptKey = '@#preetish_webs22';
//     $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
//     return( $qDecoded );
// }

    
function web_encryptIt($q) {
  $encrypt_method = "AES-256-CBC";
    $secret_key = '@#preetish_webs22';
    $secret_iv = '@#preetish_webs18';
    // hash
     $key = hash('sha256', $secret_key);
   
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
     $iv = substr(hash('sha256', $secret_iv), 0, 16);
   $output = openssl_encrypt($q, $encrypt_method, $key, 0, $iv);
   $output = base64_encode($output);
   return $output;
}
// mcrypt_encrypt(MCRYPT_RIJNDAEL_128, md5($key, true), $string, MCRYPT_MODE_CBC, $iv)
function web_decryptIt($q) {
  // echo $q;
  // exit;
  $encrypt_method = "AES-256-CBC";
    $secret_key = '@#preetish_webs22';
    $secret_iv = '@#preetish_webs18';
    // hash
     $key = hash('sha256', $secret_key);
   
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
     $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_decrypt(base64_decode($q), $encrypt_method, $key, 0, $iv);
    return $output ;
}
// function encrypt_decrypt($action, $string) {
//     $output = false;
//     $encrypt_method = "AES-256-CBC";
//     $secret_key = '@#preetish_webs22';
//     $secret_iv = '@#preetish_webs18';
//     // hash
//     $key = hash('sha256', $secret_key);
    
//     // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
//     echo $iv = substr(hash('sha256', $secret_iv), 0, 16);
//      echo "<br>";
//     if ( $action == 'encrypt' ) {
//         $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
//         $output = base64_encode($output);
//     } else if( $action == 'decrypt' ) {
//         $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
//     }
//     return $output;
// }
date_default_timezone_set("Asia/Calcutta");
$host = "localhost";
$db = "care_db_innovadors";
$user = "preetish";
$pass = "panindia@1112";
 
$conn=mysqli_connect("$host","$user","$pass","$db");
if (!$conn){
echo "error in connection ".mysqli_error($conn);
}
