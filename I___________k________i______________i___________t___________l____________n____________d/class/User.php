<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author JATIN
 */
class User extends DbConnection {

    function generateRandomPassword($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    function addApplicantDetails($applName, $applDob, $gender, $applContacts, $applEmail, $address, $school10, $board10, $year10, $per10, $school12, $board12, $year12, $per12, $tradeIti, $schoolIti, $boardIti, $yearIti, $perIti, $tradeDiploma, $schoolDiploma, $boardDiploma, $yearDiploma, $perDiploma, $userName) {
        $password = $this->generateRandomPassword();
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_user`(`user_id`, `user_name`, `user_dob`, `user_gender`, `user_contact`, `user_email`, `user_address`, `user_school_10`, `user_board_10`, `user_year_10`, `user_per_10`, `user_school_12`, `user_board_12`, `user_year_12`, `user_per_12`, `user_trade_iti`, `user_school_iti`, `user_board_iti`, `user_year_iti`, `user_per_iti`, `user_trade_dip`,`user_school_dip`, `user_board_dip`, `user_year_dip`, `user_per_dip`, `user_username`, `user_password`,`user_applydate`) VALUES (NULL,'$applName','$applDob','$gender','$applContacts','$applEmail','$address','$school10','$board10','$year10','$per10','$school12','$board12','$year12','$per12','$tradeIti','$schoolIti','$boardIti','$yearIti','$perIti','$tradeDiploma','$schoolDiploma','$boardDiploma','$yearDiploma','$perDiploma','$userName','$password',now())";
        $res = mysqli_query($link, $query);
        if ($res) {
            $user_id = mysqli_insert_id($link);
            mysqli_close($link);
            return $user_id;
        } else {
            mysqli_close($link);
            return false;
        }
    }

    function addCollegeInformation($appl_id, $collName, $collAddress, $collEmail, $collContact) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_stud_college`(`coll_id`, `user_id`, `coll_name`, `coll_address`, `coll_email`, `coll_contact`) VALUES "
                . "(NULL,'$appl_id','$collName','$collAddress','$collEmail','$collContact')";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function updateUserPassword($appl_id, $oldPassword, $newPassword) {
        $link = $this->connectToDb();
        $query = "update tbl_user set user_password= '$newPassword' where user_id= '$appl_id' and user_password= '$oldPassword' ";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }

    function conformUserPassword($appl_id, $oldPassword) {
        $link = $this->connectToDb();
        $query = "select * from tbl_user  where user_id= '$appl_id' and user_password= '$oldPassword' ";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }

    function fetchUserDetails($appl_id) {
        $link = $this->connectToDb();
        $query = "select * from tbl_user,tbl_college where tbl_user.user_id= '$appl_id'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function validateUserLogin($username, $password) {
        $link = $this->connectToDb();
        $query = "select * from tbl_user where user_username= '$username' and user_password= '$password'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function generateUpcomingCompanyList() {
        $link = $this->connectToDb();
        $query = "select * from tbl_company,tbl_visit where tbl_visit.visi_date >curdate() "
                . "and tbl_company.comp_id= tbl_visit.comp_id";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function registerForDrive($student, $drive) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_user_visit`(`user_visi_id`, `visi_id`, `user_id`, `user_regdate`,`user_regstatus`) VALUES "
                . "(NULL,'$drive','$student',now(),'Registered')";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function isRegisterForDrive($student, $drive) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_user_visit` WHERE `visi_id`= '$drive' and `user_id`= '$student'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function viewNewsAndMsg() {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_message` WHERE (mesg_type= 'News') or (mesg_type= 'Message' and mesg_closedate>= curdate())";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function viewMessageById($msg) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_message` WHERE mesg_id= '$msg'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function saveUserMessageReply($user, $user_id, $msg, $reply) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_messagereply`(`repl_id`, `repl_user`, `user_id`, `mesg_id`, `repl_mesg`, `repl_dae`) VALUES "
                . "(NULL,'$user','$user_id','$msg','$reply',now())";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function viewRecruitmentHistory($user_id) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_user_visit` WHERE `user_id`= '$user_id'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function viewCompanyHistory($user_id) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_user_visit`,`tbl_visit`,`tbl_company` WHERE `tbl_user_visit`.`user_id`= '$user_id'"
                . " AND tbl_user_visit.visi_id= tbl_visit.visi_id"
                . " AND tbl_visit.comp_id= tbl_company.comp_id";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function viewNewsAndMessage($message) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_message` WHERE mesg_status= 'Active' AND mesg_type= '$message'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchTrainingList() {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_training` WHERE `trng_startdate`> curdate()";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function registerForTraining($trng, $stud, $status, $report, $attendance) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_stu_training`(`stu_trng_id`, `trng_id`, `stud_id`, `trng_status`, `trng_examreport`, `trng_attendance`) VALUES "
                . "(NULL,'$trng','$stud','$status','$report','$attendance')";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function isRegisteredForTraining($trng, $stud) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_stu_training` WHERE `trng_id`= '$trng' AND `stud_id`= '$stud'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function addUserPersonalInformation($userRegNumber, $userName, $password, $firstName, $middleName, $lastName, $gender, $dob, $email, $mobileNo, $altNo, $landlineNo, $city, $mornTime, $evenTime) {
        $link = $this->connectToDb();
        $current = time();
        // INSERT INTO `user` (`userid`, `password`, `regdno`, `usertype`, `first_name`, `middle_name`,`last_name`, `gender`, `dob`, `mobile`,`alt_no`, `landline`, `email`, `city`, `calltime_morning`,`calltime_evening`, `createdt`) VALUES ('3445', '1234', 'can-000019', 'Candidate', 'meera', '', 'roy', 'Female','1998-09-10', '9438147975', '','', '', 'kdp','07:15-09:15', '13:15-16:45', now() )
        $date=date('Y-m-d');
        $query = "INSERT INTO `user` (`userid`, `password`, `regdno`, `usertype`, `first_name`, `middle_name`,`last_name`, `gender`, `dob`, `mobile`,`alt_no`, `landline`, `email`, `city`, `calltime_morning`,`calltime_evening`, `createdt`) VALUES ('$userName', '$password', '$userRegNumber', 'Candidate', '$firstName', '$middleName', '$lastName', '$gender','$dob', '$mobileNo', '$altNo','$landlineNo', '$email', '$city','$mornTime', '$evenTime', '$date' )";
        
        $res = mysqli_query($link, $query);
        
        mysqli_close($link);
       
        if ($res) {
            return 1;
        } else {
            return false;
        }
    }

    function updateUserPersonalAndEdnInformation($userId, $password, $firstName, $middleName, $lastName, $gender, $dob, $email, $mobileNo, $altNo, $landlineNo, $city, $mornTime, $evenTime, $degreeType, $degree, $specialization, $experience, $expSummery) {
        $link = $this->connectToDb();
        $query = "UPDATE `user` SET `password` = '$password',`first_name` = '$firstName',`middle_name` = '$middleName',`last_name` = '$lastName',"
                . "`gender` = '$gender',`dob` = '$dob',`mobile` = '$mobileNo', `alt_no` = '$altNo', `landline` = '$landlineNo',`email` = '$email',`city` = '$city',"
                . "`calltime_morning`='$mornTime',`calltime_evening`='$evenTime' WHERE `userid`= '$userId'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            $res = $this->updateUserEducationDetails($userId, $degreeType, $degree, $specialization, $experience, $expSummery);
            if ($res) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function addUserEducationDetails($acdemicId, $userName, $degreeType, $degree, $specialization, $experience, $expSummery) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `academic_workexp`(`academicid`, `userid`, `degree_type`, `degree`, "
                . "`specialization`, `total_exp_yrs`, `exp_summery`) "
                . " VALUES ('$acdemicId','$userName','$degreeType','$degree','$specialization','$experience','$expSummery')";
        $res = mysqli_query($link, $query);
        // echo mysqli_error($link);
        // exit;
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function updateUserEducationDetails($userId, $degreeType, $degree, $specialization, $experience, $expSummery) {
        $link = $this->connectToDb();
        $query = "UPDATE `academic_workexp` SET `degree_type` = '$degreeType' ,`degree` = '$degree',`specialization` = '$specialization',"
                . "`total_exp_yrs`= '$experience' ,`exp_summery` = '$expSummery' WHERE userid= '$userId'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function addUserTotalExperienceDetails($expId, $userRegNumber, $totalExpYr, $totalExpMth) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `workexp`(`workexpid`, `regdno`, `total_exp_yr`, `total_exp_mth`) VALUES"
                . "('$expId','$userRegNumber','$totalExpYr','$totalExpMth')";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function updateUserTotalExperienceDetails($userRegNumber, $totalExpYr, $totalExpMth) {
        $link = $this->connectToDb();
        $query = "UPDATE `workexp` SET `total_exp_yr`= '$totalExpYr' ,`total_exp_mth`= '$totalExpMth' "
                . " where `regdno`= '$userRegNumber'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function isUserExperienced($userRegNumber) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `workexp` WHERE `regdno`= '$userRegNumber'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            $rows = mysqli_num_rows($res);
            if ($rows) {
                $row = mysqli_fetch_array($res);
            }
            return $row['workexpid'];
        } else {
            return false;
        }
    }

    function addUserExperienceDetails($expDtId, $expId, $organisation, $position, $experience, $projectDone, $experienceMonth) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `workexpdet`(`workexpdetid`, `workexpid`, `orgz`, `desg`, `duration`, `no_of_prj`, `exp_mth`) VALUES"
                . "('$expDtId','$expId','$organisation','$position','$experience','$projectDone','$experienceMonth')";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function updateUserExperienceDetails($workExpDtId, $organisation, $position, $experience, $projectDone, $experienceMonth) {
        $link = $this->connectToDb();
        $query = "UPDATE `workexpdet` SET `orgz`= '$organisation',`desg`= '$position',"
                . "`duration`= '$experience',`no_of_prj`='$projectDone',`exp_mth`= '$experienceMonth'"
                . " WHERE workexpdetid= '$workExpDtId'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function validateUserLogon($userName, $password) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `user` WHERE `userid`= '$userName' and `password`= '$password' and usertype= 'Candidate'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            $rows = mysqli_num_rows($res);
            if ($rows) {
                $row = mysqli_fetch_array($res);
                $regdNo = $row['userid'];
                return $regdNo;
            }
        } else {
            return false;
        }
    }

    function updateResumeDetails($userid, $resume, $keyword) {
        $link = $this->connectToDb();
        $query = "UPDATE academic_workexp SET `resume`= '$resume',"
                . " `resume_key1`= '$keyword[0]',`resume_key2`= '$keyword[1]', `resume_key3`= '$keyword[2]'"
                . " where `userid`= '$userid'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchResumeDetails($user_id) {
        $link = $this->connectToDb();
        $query = "SELECT `resume` ,`resume_key1`,`resume_key2`,`resume_key3` FROM `academic_workexp`  WHERE `userid`= '$user_id'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchPersonalInformationDetails($user_id) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `user` WHERE `userid`= '$user_id'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchAcademicInformationDetails($user_id) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `academic_workexp` WHERE `userid`= '$user_id'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchTotalExperience($regdNo) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `workexp` WHERE workexp.`regdno`= '$regdNo'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchExperienceDetails($regdNo) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `workexp`,`workexpdet` WHERE workexp.`regdno`= '$regdNo' and "
                . "workexp.workexpid= workexpdet.workexpid";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function isUserIdAvailable($user_id) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `user` WHERE `userid`= '$user_id' ";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            $rows = mysqli_num_rows($res);
            if ($rows) {
                return $rows;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function fetchUserRegNo() {
        $link = $this->connectToDb();
        $query = "SELECT regdno FROM `user` WHERE usertype= 'Candidate' ORDER BY regdno DESC";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            $rows = mysqli_num_rows($res);
            if ($rows) {
                $row = mysqli_fetch_array($res);
                return $row['regdno'];
            } else {
                return false;
            }
        }
    }

    function addDetailsToCareer($job, $name, $fatherName, $dob, $mobile, $alt_no, $email, $address, $degree, $college, $passYear, $interestArea, $experience, $resume) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `careers`(`career_id`, `opening_id`, `candidate_name`, `father_name`, `dob`, `mobile`, `alt_no`, `email`, `address`, `degree`, `college`, `passout_year`, `interest_area`, `job_experience`, `resume`, `apply_date`) VALUES "
                . "(NULL,'$job','$name','$fatherName','$dob','$mobile','$alt_no','$email','$address','$degree','$college','$passYear','$interestArea','$experience','$resume',now())";
        return $res = mysqli_query($link, $query);
    }

}
