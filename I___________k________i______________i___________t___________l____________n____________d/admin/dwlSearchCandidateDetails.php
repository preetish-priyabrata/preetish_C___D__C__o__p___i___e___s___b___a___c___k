<?php

include_once '../includes/db.php';
include_once '../includes/excel/Classes/PHPExcel.php';
//session_start();
if (isset($_POST['chkRedgNo']) && !empty($_POST['chkRedgNo'])) {
    $user_id_arr = $_POST['chkRedgNo'];
    $count = count($user_id_arr);
    $redg_no_list = "";

    $phpExcel = new PHPExcel();
    $phpExcel->createSheet();

    $phpExcel->getActiveSheet()->setCellValue("A1", "REGD NO");
    $phpExcel->getActiveSheet()->setCellValue("B1", "FIRST NAME");
    $phpExcel->getActiveSheet()->setCellValue("C1", "LAST NAME");
    $phpExcel->getActiveSheet()->setCellValue("D1", "GENDER");
    $phpExcel->getActiveSheet()->setCellValue("E1", "MOBILE");    
    $phpExcel->getActiveSheet()->setCellValue("F1", "EMAIL");
    $phpExcel->getActiveSheet()->setCellValue("G1", "CITY");
    $phpExcel->getActiveSheet()->setCellValue("H1", "MORNING TIME");
    $phpExcel->getActiveSheet()->setCellValue("I1", "EVENING TIME");
    $phpExcel->getActiveSheet()->setCellValue("J1", "TOTAL YEAR EXPERIENCE");
    $phpExcel->getActiveSheet()->setCellValue("K1", "DEGREE TYPE");
    $phpExcel->getActiveSheet()->setCellValue("L1", "DEGREE");
    $phpExcel->getActiveSheet()->setCellValue("M1", "SPECIALIZATION");

    for ($i = 0, $j = 2; $i < $count; $i++, $j++) {
//        if ($i == $count - 1) {
//            $redg_no_list .= $redg_no_arr[$i];
//        } else {
//            $redg_no_list .= $redg_no_arr[$i] . ",";
//        }                
        $sql = "SELECT * FROM `user`,`academic_workexp` WHERE user.userid = academic_workexp.userid and user.userid='$user_id_arr[$i]'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
        $phpExcel->getActiveSheet()->setCellValue("A" . $j, $row['regdno']);
        $phpExcel->getActiveSheet()->setCellValue("B" . $j, $row['first_name']);
        $phpExcel->getActiveSheet()->setCellValue("C" . $j, $row['last_name']);
        $gender = $row['gender'];
        if ($gender == "M") {
            $gender = "Male";
        } else {
            $gender = "Female";
        }
        $phpExcel->getActiveSheet()->setCellValue("D" . $j, $gender);
        $phpExcel->getActiveSheet()->setCellValue("E" . $j, $row['mobile']);        
        $phpExcel->getActiveSheet()->setCellValue("F" . $j, $row['email']);
        $phpExcel->getActiveSheet()->setCellValue("G" . $j, $row['city']);
        $phpExcel->getActiveSheet()->setCellValue("H" . $j, $row['calltime_morning']);
        $phpExcel->getActiveSheet()->setCellValue("I" . $j, $row['calltime_evening']);
        $phpExcel->getActiveSheet()->setCellValue("J" . $j, $row['total_exp_yrs']);
        $degree_type = $row['degree_type'];
        if ($degree_type == "U") {
            $degree_type = "Graduate";
        } else {
            $degree_type = "Post Graduate";
        }
        $phpExcel->getActiveSheet()->setCellValue("K" . $j, $degree_type);
        $phpExcel->getActiveSheet()->setCellValue("L" . $j, $row['degree']);
        $phpExcel->getActiveSheet()->setCellValue("M" . $j, $row['specialization']);
    }
    $excelWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
//$excelWriter->save("StudentData-UG.xls");
    header('Content-type:application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="CandidateDetails.xls"');
    $excelWriter->save('php://output');
}
