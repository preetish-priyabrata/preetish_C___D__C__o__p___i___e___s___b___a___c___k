<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author JATIN
 */
class Admin extends DbConnection {

    //put your code here
    function generateRandomPassword($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    function addCompanyDetails($name, $type, $phone, $email, $address, $poc, $logo) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_company`(`comp_id`, `comp_name`, `comp_type`,`comp_phone`, `comp_email`, `comp_address`, `comp_poc`, `comp_logo`, `comp_reg_date`)"
                . "VALUES (NULL,'$name','$type','$phone','$email','$address','$poc','$logo',now())";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    function addCompanyVisit($company, $date, $program, $yop, $dop, $per10, $per12, $perIti, $perDip, $gender, $age, $preferrence, $name_companyperson, $contact_companyperson, $mail_companyperson, $name_consultancyperson, $contact_consultancyperson, $mail_consultancyperson) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_visit`(`visi_id`, `comp_id`, `visi_date`, `visi_program`, `visi_passyear`, `visi_publication`, `visi_per_10`, `visi_per_12`, `visi_per_iti`, `visi_per_diploma`, `visi_gender`, `visi_age`, `visi_preferrence`, `visi_poc_comp`, `visi_poc_comp_phone`, `visi_poc_comp_email`, `visi_poc_cons`, `visi_poc_cons_phone`, `visi_poc_cons_email`, `visi_status`) VALUES "
                . "(NULL,'$company','$date','$program','$yop','$dop','$per10','$per12','$perIti','$perDip','$gender',"
                . "'$age','$preferrence','$name_companyperson','$contact_companyperson','$mail_companyperson','$name_consultancyperson','$contact_consultancyperson','$mail_consultancyperson','Pending')";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    function addTrainingProgram($head, $description, $startDate, $endDate, $fee, $venue, $trainer, $contact) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_training`(`trng_id`, `trng_about`, `trng_desc`, `trng_startdate`, `trng_enddate`, `trng_fee`, `trng_venue`, `trng_trainer`, `trng_contact`, `trng_postdate`) VALUES"
                . "(NULL,'$head','$description','$startDate','$endDate','$fee','$venue','$trainer','$contact',now())";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    function fetchPreferrencelist() {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_training` WHERE 1";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return 0;
        }
    }

    function fetchCompanylist() {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_company` WHERE 1";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return 0;
        }
    }

    function addCollegeInformation($name, $type, $address, $email, $tnpOfficer, $tnpContact) {
        $link = $this->connectToDb();
        $password = $this->generateRandomPassword();
        $query = "INSERT INTO `tbl_college`(`coll_id`, `coll_name`, `coll_type`,`coll_address`, `coll_email`,`coll_password`, `coll_tnpofficer`, `coll_tnpnumber`, `coll_regdate`, `coll_status`) VALUES "
                . "(NULL,'$name','$type','$address','$email','$password','$tnpOfficer','$tnpContact',now(),'Active')";
        $res = mysqli_query($link, $query);
        if ($res) {
            $res = mysqli_insert_id($link);
            mysqli_close($link);
            return $res;
        } else {
            return 0;
        }
    }

    function postMessage($type, $user, $head, $closingDate, $message) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_message`(`mesg_id`, `mesg_type`, `mesg_user`,`mesg_head`, `mesg_body`, `mesg_date`, `mesg_closedate`,`mesg_status`) VALUES "
                . "(NULL,'$type','$user','$head','$message',now(),'$closingDate','Active')";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return 0;
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

    function generateRegisteredStudentList($visit) {
        $link = $this->connectToDb();
        $query = "select * from tbl_user,tbl_user_visit where tbl_user_visit.visi_id= '$visit' "
                . "and tbl_user_visit.user_id= tbl_user.user_id "
                . "and tbl_user_visit.user_regstatus = 'Registered'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function generatePendingStudList() {
        $link = $this->connectToDb();
        $query = "select * from tbl_user  where user_approval= 'Pending' ";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function approveStudent($stud) {
        $link = $this->connectToDb();
        $query = "update tbl_user set  user_approval= 'Approved' where user_approval= 'Pending' and user_id='$stud'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function viewAllApprovedCandidates() {
        $link = $this->connectToDb();
        $query = "select * from  tbl_user where  user_approval= 'Approved'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function viewAllApprovedCandidatesBetweenDates($s_date, $e_date) {
        $link = $this->connectToDb();
        $query = "select * from  tbl_user where  user_approval= 'Approved' and"
                . " SUBSTR(user_applydate,1,10)>= '$s_date' AND SUBSTR(user_applydate,1,10)<='$e_date'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchCompanyVisitList() {
        $link = $this->connectToDb();
        $query = "select * from  tbl_company,tbl_visit where tbl_visit.comp_id= tbl_company.comp_id";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchCollegeList() {
        $link = $this->connectToDb();
        $query = "select * from  tbl_college";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function addBranchInformation($college, $branch, $intake, $curIntake, $year) {
        $link = $this->connectToDb();
        $query = "INSERT INTO `tbl_coll_branch`(`coll_bran_id`, `coll_id`, `coll_branch`, `bran_intake`, `bran_curintake`, `coll_academicyear`) VALUES "
                . "(NULL,'$college','$branch','$intake','$curIntake','$year')";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchCompanyDetails($comp) {
        $link = $this->connectToDb();
        $query = "select * from tbl_company where comp_id= '$comp'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchCompanyVisitDetails($comp) {
        $link = $this->connectToDb();
        $query = "select * from tbl_company,tbl_visit where tbl_company.comp_id= '$comp' "
                . " and tbl_company.comp_id= tbl_visit.comp_id"
                . " and tbl_visit.visi_date >curdate()";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchVisitDetailsByVisitId($visit) {
        $link = $this->connectToDb();
        $query = "select * from tbl_company,tbl_visit where tbl_visit.visi_id= '$visit' "
                . " and tbl_company.comp_id= tbl_visit.visi_id";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function editVisitDetails($visit_id, $visi_date, $visi_prog, $visi_publication) {
        $link = $this->connectToDb();
        $query = "update tbl_visit set visi_date= '$visi_date',visi_program= '$visi_prog',visi_publication= '$visi_publication'"
                . " where visi_id= '$visit_id'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function fetchCollegeDetails($college) {
        $link = $this->connectToDb();
        $query = "select * from tbl_college,tbl_coll_branch where tbl_college.coll_id= '$college'"
                . "and tbl_college.coll_id= tbl_coll_branch.coll_id";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function editBranchInformation($college, $branch, $intake, $curintake, $year) {
        $link = $this->connectToDb();
        $query = "update tbl_coll_branch set bran_intake= '$intake',bran_curintake= '$curintake',coll_academicyear= '$year' "
                . "where coll_id= '$college' and coll_branch= '$branch'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function generateLastVisitedCompanyList() {
        $link = $this->connectToDb();
        $query = "select * from tbl_visit,tbl_company where tbl_visit.comp_id= tbl_company.comp_id";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function studentCampusselection($user, $visit) {
        $link = $this->connectToDb();
        $query = "update tbl_user_visit set user_regstatus= 'Selected' where user_id= '$user' and visi_id= '$visit'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function findStudentList($name, $keyword, $expYear, $expMonth) {
        $link = $this->connectToDb();
        $queryMain = "SELECT * FROM `user`,`academic` WHERE user.regdno= academic.regdno";
        if ($expYear != "" || $expMonth != "") {
            $queryMain = "SELECT * FROM `user`,`academic`,`workexp` WHERE user.regdno= academic.regdno AND user.regdno= workexp.regdno";
        }
        if ($name == "") {
            $queryName = "";
        } else {
            $queryName = " AND (`first_name` like '%$name%' OR `last_name` like '%$name%')";
        }
        if ($keyword == "") {
            $queryKeyword = "";
        } else {
            $queryKeyword = " AND (`resume_key1` like '%$keyword%' OR `resume_key2` like '%$keyword%' OR `resume_key3` like '%$keyword%')";
        }
        if ($expYear == "") {
            $queryExpYr = "";
        } else {
            $queryExpYr = " AND workexp.total_exp_yr>= '$expYear'";
        }
        if ($expMonth == "") {
            $queryExpMonth = "";
        } else {
            $queryExpMonth = " AND ((workexp.total_exp_mth>= '$expMonth') OR (workexp.total_exp_yr>= 1))";
        }

        echo $query = $queryMain . $queryName . $queryKeyword . $queryExpMonth . $queryExpYr;
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    function getStudentCallHistory($regdno) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `callhistory` WHERE `regdno`= '$regdno'";
        $res = mysqli_query($link, $query);
        $rows = mysqli_num_rows($res);
        mysqli_close($link);
        if ($rows) {
            return $res;
        } else {
            return false;
        }
    }

    function validateUserLogon($userName, $password) {
        $link = $this->connectToDb();
        $query = "SELECT * FROM `user` WHERE `userid` = '$userName' AND `password` = '$password' AND `usertype` = 'Staff'";
        $res = mysqli_query($link, $query);
        $rows = mysqli_num_rows($res);
        mysqli_close($link);
        if ($rows) {
            return $res;
        } else {
            return false;
        }
    }

}
