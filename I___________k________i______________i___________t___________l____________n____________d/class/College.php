<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of College
 *
 * @author JATIN
 */
class College extends DbConnection{
    function generateRandomPassword($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    function viewNewsAndMsg(){
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_message` WHERE mesg_status= 'Active'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
    
    function generateEligibleList($college,$company){
        $link = $this->connectToDb();
        $query = "SELECT * FROM `tbl_user`,`tbl_user_visit` WHERE tbl_user.coll_id= '$college' "
                . "AND tbl_user_visit.visi_id= '$company' "
                . "AND tbl_user.user_id= tbl_user_visit.user_id";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
    
    function addApplicantDetails($college,$applName,$applDob,$gender,$applContacts,$applEmail,$address,
                $school10,$board10,$year10,$per10,$school12,$board12,$year12,$per12,$tradeIti,$schoolIti,$boardIti,$yearIti,$perIti,
                $tradeDiploma,$schoolDiploma,$boardDiploma,$yearDiploma,$perDiploma,$userName){
        $password= $this->generateRandomPassword();
        $link= $this->connectToDb();
        $query= "INSERT INTO `tbl_user`(`user_id`,`coll_id`,`user_name`, `user_dob`, `user_gender`, `user_contact`, `user_email`, `user_address`, "
                . "`user_school_10`, `user_board_10`, `user_year_10`, `user_per_10`, `user_school_12`, `user_board_12`, `user_year_12`,"
                . " `user_per_12`, `user_trade_iti`, `user_school_iti`, `user_board_iti`, `user_year_iti`, `user_per_iti`, `user_trade_dip`,"
                . " `user_school_dip`, `user_board_dip`, `user_year_dip`, `user_per_dip`, `user_username`, `user_password`,`user_applydate`) VALUES "
                . "(NULL,'$college','$applName','$applDob','$gender','$applContacts','$applEmail','$address',"
                . "'$school10','$board10','$year10','$per10',"
                . "'$school12','$board12','$year12','$per12',"
                . "'$tradeIti','$schoolIti','$boardIti','$yearIti','$perIti',"
                . "'$tradeDiploma','$schoolDiploma','$boardDiploma','$yearDiploma','$perDiploma',"
                . "'$userName','$password',now())";
        $res= mysqli_query($link, $query);
        if($res){
            mysqli_close($link);
            return 1;
        }  else {
            mysqli_close($link);
            return false;
        }
    }
    
    function getStudentList($college){
        $link = $this->connectToDb();
        $query = "SELECT  user_id FROM `tbl_user` WHERE tbl_user.coll_id= '$college' ";
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
        $query = "select * from tbl_college where coll_email= '$username' and coll_password= '$password'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
    
    function fetchCollegeDetails($college_id){
        $link = $this->connectToDb();
        $query = "select * from tbl_college where coll_id= '$college_id'";
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

}
