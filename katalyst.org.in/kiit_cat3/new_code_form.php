<?php
include './conf.php';
ini_set('display_errors',1);

 function curlPost($URL,$data)
       {
              $ch = curl_init();              
              curl_setopt($ch, CURLOPT_URL, $URL);
              curl_setopt($ch, CURLOPT_HEADER, 0);
              curl_setopt($ch, CURLOPT_POST, 1);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);                
              curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);          
              $output = curl_exec($ch);                                           
              curl_close($ch);              
              return $output;

       }
       
function xmlObject2Array($xml)  
   {  
        $xmlObject = simplexml_load_string($xml);
        $xmlArray  = json_decode(json_encode($xmlObject),1);
        return $xmlArray;
    }
   // $paymentid = '';//HDFC Payment id
$accountid = '25794';//HDFC Accout id
$secretkey = '387b8cefe0c688faaba81104b9d1088f';//HDFC secret key    
$action = 'statusByRef';

$check="SELECT * FROM `tbl_enrollment` WHERE `enrollment_status`='0' and `payment_status`='0'";
$sql_exe=mysqli_query($con,$check);

while ($fetch=mysqli_fetch_assoc($sql_exe)) {



$RefNo = $fetch['reference_id'];//HDFC Transaction id

$data = "Action=".$action."&RefNo=".$RefNo."&AccountID=".$accountid."&SecretKey=".$secretkey;
$xmlResponse   =   curlPost('https://api.secure.ebs.in/api/1_0',$data);	
//$xmlResponse = http_post_fields($url, $data, $files);
$responseArr   =   xmlObject2Array($xmlResponse) ;   
$response      =   $responseArr['@attributes'];

$data = file_get_contents('php://input');
$file = fopen("test.txt", "a+");
$ids=json_encode($response);
fwrite($file, "---".$RefNo."---" . $ids . "---");
fclose($file);

print_r($response);
}
?>