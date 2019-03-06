<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbConnection
 *
 * @author JATIN
 */
class DbConnection {
    function connectToDb(){
        $link= mysqli_connect("localhost","preetish","panindia@1112","teerth_cons");
        // $link= mysqli_connect("localhost","teerth_cons","teerth_cons","teerth_cons");
        if($link){
            return $link;
        }else{
           echo  "Db Connection Not Available";
        }        
    }   
    
}
