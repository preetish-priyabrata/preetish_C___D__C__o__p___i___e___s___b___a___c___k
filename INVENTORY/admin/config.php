<?php
// ini_set("display_errors", TRUE);
error_reporting(0);


// function web_encryptIt($q) {
//     $cryptKey = '@#preetish_webs22';
//     $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
//     return( $qEncoded );
// }

// function web_decryptIt($q) {
//     $cryptKey = '@#preetish_webs22';
//     $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
//     return( $qDecoded );
// }
function convertToIndianCurrency($number) {
    $no = round($number);
    $decimal = round($number - ($no = floor($number)), 2) * 100;    
    $digits_length = strlen($no);    
    $i = 0;
    $str = array();
    $words = array(
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
            $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
        } else {
            $str [] = null;
        }  
    }
    
    $Rupees = implode(' ', array_reverse($str));
    $paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
    return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
              $ones = array(""," one"," two"," three"," four"," five"," six"," seven"," eight"," nine"," ten"," eleven"," twelve"," thirteen"," fourteen"," fifteen"," sixteen"," seventeen"," eighteen"," nineteen"); 
              $tens = array("",""," twenty"," thirty"," forty"," fifty"," sixty"," seventy"," eighty"," ninety"); 
              $triplets = array(""," thousand"," million"," billion"," trillion"," quadrillion"," quintillion"," sextillion"," septillion"," octillion"," nonillion");
              // recursive fn, converts three digits per pass
              function convertTri($num, $tri) {
                global $ones, $tens, $triplets;
                // chunk the number, ...rxyy
                $r = (int) ($num / 1000);
                $x = ($num / 100) % 10;
                $y = $num % 100;
                // init the output string
                $str = "";
                // do hundreds
                if ($x > 0)
                  $str = $ones[$x] . " hundred";
                  // do ones and tens
                if ($y < 20)
                  $str .= $ones[$y];
                else
                  $str .= $tens[(int) ($y / 10)] . $ones[$y % 10];
                  // add triplet modifier only if there
                  // is some output to be modified...
                if ($str != "")
                  $str .= $triplets[$tri];
                  // continue recursing?
                if ($r > 0)
                  return convertTri($r, $tri+1).$str;
                else
                  return $str;
              }
              // returns the number as an anglicized string
              function convertNum($num) {
               $num = (int) $num;    // make sure it's an integer
               
               if ($num < 0)
                return "negative".convertTri(-$num, 0);
               
               if ($num == 0)
                return "zero";
               
               return convertTri($num, 0);
              }
 
              // Returns an integer in -10^9 .. 10^9
              // with log distribution
            function makeLogRand() {
              $sign = mt_rand(0,1)*2 - 1;
              $val = randThousand() * 1000000
               + randThousand() * 1000
               + randThousand();
              $scale = mt_rand(-9,0);
             
              return $sign * (int) ($val * pow(10.0, $scale));
             }
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

date_default_timezone_set("Asia/Calcutta");
$host = "localhost";
$db = "lnt_inventory";
$user = "preetish";
$pass = "panindia@1112";
$conn=mysqli_connect("$host","$user","$pass","$db");
if (!$conn){
echo "error in connection ".mysqli_error($conn);
}
