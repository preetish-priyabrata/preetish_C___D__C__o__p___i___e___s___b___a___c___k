<?php

 error_reporting(4);
 session_start();
 ob_start();
 // print_r($_POST);
 // exit;
if(($_SESSION['userId']!="")){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages(); 


// Array ( [course_id] => 7 [course_name] => TCS (testing based) [editors] => Array ( [0] =>

// he multi-vendor environment usually lacks end-to-end accountability and contractual mechanisms to integrate vendors and ensure collaboration. With 40-45% leakage observed on an average, full potential of multi sourcing is not realized. Service Integration and Management (SIAM) framework of ServiceNXT helps in a multi-sourced environment through standard processes, roles and tools. It interfaces between IT, business users, service providers and service integrators to facilitate clear accountability on SLAs/KPIs and on-time delivery of services.
// ) [price] => 400 [no_of_session] => 2 [venue] => campus 7, kathajodi [Eligibility] => GRADUATION [starting_date] => 2017-09-14 [ending_date] => 2017-09-16 [moduleId] => Array ( [0] => 9 ) [moduleName] => Array ( [0] => Business Impact ) [editor] => Array ( [0] =>

//     Achieved 17% reduction in high severity incidents globally
//     Proactive identification of process enhancements resulted in reduction of repeat incidents by 56%
//     Reduced aging calls by 23% month on month

// ) ) 

  // here information is received 
  $sl_no=$_POST['course_id'];
  $course_name=$_POST['course_name'];
  $price=$_POST['price'];
  // $start_time=$_POST['start_time'];
  // $end_time=$_POST['end_time'];
  $editors=$_POST['editors'];
  $no_of_session=$_POST['no_of_session'];
  $venue=$_POST['venue'];
  $Eligibility=$_POST['Eligibility'];
  $starting_date=date('Y-m-d',strtotime(trim($_POST['starting_date'])));
  $ending_date=date('Y-m-d',strtotime(trim($_POST['ending_date'])));
  $moduleId = $_POST['moduleId'];
  $moduleName = $_POST['moduleName'];
  $moduleDescription = $_POST['editor'];
  $no_session_module=$_POST['no_session_module'];
  $loop = count($moduleId);

  
  // $check="SELECT * from `tbl_batch` where `sl_no`='$batch_name' ";
  // $sql_check=mysqli_query($conn,$check);
  // $num=mysqli_num_rows($sql_check); // check it number rows is affected 


   $query ="UPDATE `tbl_course` SET `course_name`='$course_name',`price`='$price',`no_of_session`='$no_of_session',`venue`='$venue',`Eligibility`='$Eligibility',`starting_date`='$staring_date',`ending_date`='$ending_date' where `sl_no`='$sl_no'";
   $query_exe = mysqli_query($conn,$query);

     if($query_exe){
        // Update program modules
         for ($i = 0; $i < $loop; $i++) {
              $queryModuleUpdate = "UPDATE `tbl_program_module` SET `module_name`='$moduleName[$i]',`no_session_module`='$no_session_module[$i]',`module_description`='$moduleDescription[$i]'  WHERE `module_id` = '$moduleId[$i]'";
                $resModuleUpdate = mysqli_query($con, $queryModuleUpdate);
            }
              $msg->success('Successfull Program Is Edited');
              header('Location:admin_dashboard.php');
              exit;
          }else{
            header('Location:logout.php');
            exit;
          }
  // if($query_exe){
  //             $msg->success('Successfull Batch Details Are Edited In our record');
  //             header('Location:add_batch_view.php');
  //             exit;
  // }else{
  //             $msg->error('Batch Details Edited Not Successfull');
  //             header("location:admin_dashboard.php");
  //             exit;
  //     }
   
    
  
}else{
  header('Location:logout.php');
  exit;
}


?>