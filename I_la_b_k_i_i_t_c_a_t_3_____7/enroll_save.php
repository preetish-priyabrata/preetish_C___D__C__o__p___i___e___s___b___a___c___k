<?php
// print_r($_POST);
// exit;
include './conf.php';
// Array ( [stud_name] => student 1 [stud_roll] => 007 [stud_branch] => Electronics And Telecommunication [stud_semester] => 2 Semester [stud_email] => 007@kiit.com [stud_phone] => 789456123 [stud_course] => 1 [fee] => 5000 [days] => 92 [btn_enroll] => Enroll ) 
if (isset($_POST['btn_enroll'])) {
    $stud_name = $_POST['stud_name'];
    $stud_roll = $_POST['stud_roll'];
    $stud_email = $_POST['stud_email'];
    $stud_address=$_POST['stud_address'];
    $stud_City=$_POST['stud_City'];
    $stud_State=$_POST['stud_State'];
    $stud_Postal_code=$_POST['stud_Postal_code'];
    $stud_Country=$_POST['stud_Country'];
    $stud_phone = $_POST['stud_phone'];
    $stud_course = $_POST['stud_course'];
    $stud_branch=$_POST['stud_branch'];
    $stud_semester=$_POST['stud_semester'];

    $course_ids=$stud_course; 
    $course_list="SELECT * FROM `tbl_course` WHERE `sl_no`='$course_ids'";
    $sql_exe_course=mysqli_query($con,$course_list);
    $res_course=mysqli_fetch_assoc($sql_exe_course);
    $student_course=$res_course['course_name'];

    $fee=$_POST['fee'];
    $batch_id=$_POST['batch_id'];
    $date=date('Y-m-d');
    $time=date('H:i:s');
    if (!empty($stud_name) && !empty($stud_roll) && !empty($stud_email) && !empty($stud_phone) && !empty($stud_course)&& !empty($stud_branch) && !empty($stud_semester) && !empty($fee) && !empty($batch_id)) {
        // checking here seat is avaliable
        $check_seat="SELECT * FROM `tbl_batch` WHERE `course_id`='$stud_course' and `sl_no`='$batch_id' and `seat_status`='0' and `status`='1'";
        $check_seat_sql=mysqli_query($con,$check_seat);
        $num_seat=mysqli_num_rows($check_seat_sql);
        if($num_seat=='1'){
            $res_seat=mysqli_fetch_assoc($check_seat_sql);
            $seat_remain=$res_seat['remain_seat'];
            if($seat_remain!=0){
                $remain_seat=$seat_remain-1;

            }
            // if($remain_seat=="0"){
            //     $update_student="UPDATE `tbl_batch` SET `remain_seat`='0', `seat_status`='1' WHERE `sl_no`='$batch_id' and `course_id`='$stud_course'";

            // }else{
            //     $update_student="UPDATE `tbl_batch` SET `remain_seat`='$remain_seat' WHERE `sl_no`='$batch_id' and `course_id`='$stud_course'";
            // }
          
            
            //  $res1 = mysqli_query($con, $update_student);
             // insertt to orignal data of student
            $query = "INSERT INTO `tbl_enrollment`(`enrollment_id`, `student_name`, `student_roll`,`student_email`, `student_phone`, `student_course`, `student_branch`, `student_semester`, `student_fee`, `course_batch_id`,`date`,`time`,`enrollment_status`) VALUES (NULL,'$stud_name','$stud_roll','$stud_email','$stud_phone','$stud_course','$stud_branch','$stud_semester','$fee','$batch_id','$date','$time','0')";

            $res = mysqli_query($con, $query);

            $last=mysqli_insert_id($con);
            // reference 
            $Short=substr($student_course,0,6);
            $ref_no="kiit/".$course_ids."/".date('Y-m-d')."/".$last;
            

            $query_update ="UPDATE `tbl_enrollment` SET `reference_id`='$ref_no' where `enrollment_id`='$last'";
            $query_exe_update = mysqli_query($con,$query_update);
                            

            $query_new = "INSERT INTO `tbl_enrollment_new`(`enrollment_id`, `student_name`, `student_roll`,`student_email`,`student_address`,`student_City`,`student_State`,`student_Postal_code`,`student_Country`, `student_phone`, `student_course`, `student_branch`, `student_semester`, `student_fee`, `course_batch_id`,`date`,`time`,`enrollment_status`) VALUES (NULL,'$stud_name','$stud_roll','$stud_email','$stud_address','$stud_City','$stud_State','$stud_Postal_code','$stud_Country','$stud_phone','$stud_course','$stud_branch','$stud_semester','$fee','$batch_id','$date','$time','0')";

             $res_new = mysqli_query($con, $query_new);
            // echo mysqli_error($con);
            // exit;


            $check_information="SELECT * FROM `tbl_login_student` WHERE `L_student_roll`='$stud_roll'";
            $sql_check=mysqli_query($con,$check_information);
            $num=mysqli_num_rows($sql_check);
            if($num=='0'){
                $oldpassword=mt_rand();
                $STUDENT_insert="INSERT INTO `tbl_login_student`(`L_slno`, `L_student_roll`,`L_student_branch`,`L_student_phone` ,`L_student_name`, `L_student_email`, `L_password`, `L_status`, `L_date`, `L_time`) VALUES (Null,'$stud_roll','$stud_branch','$student_phone','$stud_name','$stud_email','$oldpassword','2','$date','$time')";
                    $sql_check_insert=mysqli_query($con,$STUDENT_insert);
                    
                    $subject = "This is an auto generated mail. Do not reply.";
                    $to = $stud_email;

                    // $from = "info@innovadorslab.co.in";

                    //data
                    $message1  = "NAME:      "  .$stud_name    ."<br>\n";
                    $message1 .= "Roll No:   "  .$stud_roll    ."<br>\n";
                    $message1 .= "Email id:  "  .$stud_email   ."<br>\n";
                    $message1 .= "Mobile No: "  .$stud_phone   ."<br>\n"; 
                    $message1 .= "Password : "  .$oldpassword  ."<br>\n";
                    $message1 .= "WEBSITE: http://innovadorslab.co.in/kiit_cat3/<br>\n";
                    

                    //Headers
                    
                    $headers  = "From:Kiit_cat2@innovadorslab.com \r\n";
                    $headers .= "Bcc:ppriyabrata8888@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html\r\n";

                    if(mail($to, $subject, $message1, $headers)){
                        echo "Please wait, redirecting to process payment..";

                    }else{
                         echo "Please wait, redirecting to process payment..";
                    }
            }

            if ($res) {
               

                ?>
                <body onLoad="document.frmTransaction.submit();">
                  <h3>Please wait, redirecting to process payment..</h3>
                            <form  method="post" action="post.php" name="frmTransaction" id="frmTransaction" > 
                                <!-- merchant Details -->
                                <input type="hidden" name="channel" value="10"> 
                                    <!-- channel value=10 means standard -->
                                <input name="account_id" type="hidden" value="25794"/>
                                <!-- Account ID of my bacnk  -->
                                <input name="secretkey" type="hidden" value="387b8cefe0c688faaba81104b9d1088f" size="35"/>
                                <!--  Secret Key provided by bank -->
                                <input name="reference_no" type="hidden" value="<?php echo $ref_no?>" /> 
                                <!--  Reference No is proive by me-->
                                <input name="amount" type="hidden" value="<?php echo $fee;?>" />
                                <!--  Amount -->
                                <input type="hidden" name="currency" value="INR">
                                <!-- currency india is INR -->
                                <input name="description" type="hidden" value="<?=$student_course?>" />
                                <!-- Description -->
                                <input name="return_url" type="hidden" size="60" value="http://innovadorslab.co.in/kiit_cat3/response.php" />
                                <!--  Return Url-->
                                <input name="mode" type="hidden" size="60" value="LIVE" />  
                                <!-- Payment Mode is LIVE-->
                                
                                <!-- Billing Address-->
                                <!-- Customer Name -->
                                <input name="name" type="hidden" value="<?php echo $stud_name?>" />
                                <!--Customer Address</td> -->
                                <input type="hidden" name="address" value="<?=$stud_address?>" >
                                <!-- Customer City -->
                                <input name="city" type="hidden" value="<?=$stud_City?>" />            
                                <!-- Customer State/Province -->
                                <input name="state" type="hidden" value="<?=$stud_State?>" /> 
                                <!-- Customer ZIP/Postal Code -->
                                <input name="postal_code" type="hidden" value="<?=$stud_Postal_code?>" />            
                                <!-- Customer Country -->
                                <input name="country" type="hidden" value="IND" />
                                <!--Customer Email-->
                                <input name="email" type="hidden" value="<?=$stud_email?>" /> 
                                <!-- Customer Telephone-->
                                <input name="phone" type="hidden" value="<?=$stud_phone?>" />
                            
                       </form>
                  

        
                </body>

                <?php
                // header('Location:success_message.php?s=1');
                // exit;
                // echo "<span style ='margin-left:30%'><stronge>You have successfully enrolled.</stronge></span>";
            } else {
                header('Location:success_message.php?s=2');
                exit;
                // echo 'Failure!!Try again.';
            }
        }else{
            header('Location:success_message1.php?s=2');
                exit;
        }
    }else{
        header('Location:success_message.php?s=3');
            exit;
    }
}