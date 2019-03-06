<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       View Public Approved Post
        <small> </small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
      <div class="text-center ">
       
        <?php $msg->display(); ?>
    
      </div>
    <!-- end success or errot message alert  -->
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home">View Public Approved Post </a></li>
    
  </ul>
  
<?php

 $query1 ="SELECT * FROM `user_sharing_info_details` where `status`='1'";
 $query_exe1 = mysqli_query($conn,$query1);
 $rec1 = mysqli_fetch_array($query_exe1);

 $profile_status=$rec1['post_type'];
 switch ($profile_status) {
 case '1':
        $query2 ="SELECT * FROM `user_sharing_info_details` where `post_type`='1' and `status`='1'";
        $query_exe2 = mysqli_query($conn,$query2);
            
        while($rec2 = mysqli_fetch_array($query_exe2)){
         echo" <center>";
         echo "<br>";
         echo $rec2['title'];
         echo "<br>";
         echo $rec2['date'];
         echo "<br>";
         echo $rec2['time_entry'];
         echo "<br>";
        // echo $rec2['photo'];
         echo "<br>";
        // echo "photo";
         $photo=$rec2['photo'];
         echo '<img height="250" width="500" src="../uploads/photo/'.$photo.' ">';
         echo "<br>";
         echo"</center>";
     }
   
        
  ///break;
  case '2':
        $query3 ="SELECT * FROM `user_sharing_info_details` where `post_type`='2' and `status`='1'";   
        $query_exe3 = mysqli_query($conn,$query3);
           
        while($rec3 = mysqli_fetch_array($query_exe3)){
          echo"<center>";
          echo "<br>";
          echo $rec3['title'];
          echo "<br>";
          echo $rec3['date'];
          echo "<br>";
          echo $rec3['time_entry'];
          echo "<br>";
          echo"<div style=height:250px; width:500px;background-color: lightblue; border-style: dashed;>";
          echo $rec3['text'];
          echo"</div>";
          echo "<br>";
          // echo "text";
          echo "<br>";
          echo"</center>";
      }
        
    
 //break;
 
       
  //break;
  case '3':
        $query4 ="SELECT * FROM `user_sharing_info_details` where `post_type`='3' and `status`='1'";   
        $query_exe4 = mysqli_query($conn,$query4);
                 
        while($rec4 = mysqli_fetch_array($query_exe4)){
          echo "<center>";
          echo "<br>";
          echo $rec4['title'];
          echo "<br>";
          echo"<div style=height:250px; width:500px;background-color: lightblue; border-style: dashed;>";
          echo $rec4['url'];
          echo"</div>";
          echo "<br>";
          //echo "url";
          echo "<br>";
          echo"</center";
     }

   case '4':
        $query5="SELECT * FROM `user_sharing_info_details` where `post_type`='4' and `status`='1'";   
        $query_exe5 = mysqli_query($conn,$query5);
             
        while($rec5 = mysqli_fetch_array($query_exe5)){
          echo "<center>";
          echo $rec5['title'];
          echo"<br>";
          echo $rec5['date'];
          echo "<br>";
          echo $rec5['time_entry'];
          echo "<br>";
          echo $rec5['text'];
          echo "<br>";
          $photo=$rec5['photo'];
          echo '<img height="250" width="500" src="../uploads/photo/'.$photo.'">';
          echo "<br>";
          echo"</center>";
          //echo "text"; 
         // echo "<br>";
          //echo "photo";
         // echo "<br>";
     
        }
      
    break;
  
  default:
  header("location:logout.php");
  break;
}


?>
</div>
   
  
  <br>
          

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php

}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
