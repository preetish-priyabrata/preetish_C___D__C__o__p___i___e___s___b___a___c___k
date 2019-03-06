<?Php
include ("webconf.php");
$data = file_get_contents('php://input');
$file = fopen("test.txt", "a+");
fwrite($file, "---" . $data . "---");
fclose($file);

if ($_REQUEST['flag'] == 1) {
   $sql = mysqli_query($conn,"SELECT * FROM city_table ORDER BY city_name");
   if (mysqli_num_rows($sql) > 0) {
       $output_array[status] = 1;
       while ($row = mysqli_fetch_assoc($sql)) {
           $output_array[city][] = array(
               'cityid' => $row['city_id'],
               'cityname' => $row['city_name']
           );
       }
   } else {
       $output_array[status] = 0;
   }
} else if ($_REQUEST['flag'] == 2) {
   $res = json_decode($data);
   $city_id = $res->cityid ? $res->cityid : $_REQUEST['cityid'];
   $sql = mysqli_query($conn,"SELECT * FROM locality_table WHERE city_id='{$city_id}' ORDER BY locality_name");
   if (mysqli_num_rows($sql) > 0) {
       $output_array[status] = 1;
       while ($row = mysqli_fetch_assoc($sql)) {
           $output_array[locality][] = array(
               'locid' => $row['locality_id'],
               'locname' => $row['locality_name']
           );
       }
   } else {
       $output_array[status] = 0;
   }
} else if ($_REQUEST['flag'] == 3) {
  // $data = 'dofb=23-05-2006&Mobile=9853114497&Name=AnkitSahoo&Email=ankitsahoo18%40gmail.com+&locid=54&cityid=7&Password=ankit12345'; //test data
   parse_str($data, $arr);
   $date = date("Y-m-d h:i:s");
   $gender = $arr['Gender'];
   $name = $arr['Name'];
   $mymail = $arr['Email'];
   $password = $arr['Password'];
   $phone = $arr['Mobile'];
   $locality = $arr['locid'];
   $dob = date("Y-m-d", strtotime($arr['dofb']));
   $my_password = md5($password);
   $mail_nt = 0;
   $count = 0;
   if ($mymail != '') {
       $result_mail = mysqli_query($conn,"SELECT * FROM user_details_table WHERE email_id='$mymail'");
       $mail_nt = mysqli_num_rows($result_mail);
   }
   if ($phone != '') {
       $result = mysqli_query($conn,"SELECT * FROM user_details_table WHERE mobile_no='$phone'");
       $count = mysqli_num_rows($result);
   }


   if ($count == 0 && $mail_nt == 0) {
       $query_id="INSERT INTO user_details_table SET introducer_id='1000000001', name='$name', gender='$gender', email_id='$mymail', mobile_no='$phone',locality_id='$locality',dob='$dob'";
       $sql = mysqli_query($conn,$query_id);
