<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<section class="content-header">
      <h1>
       View Received Queries
        <small>New List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Query</a></li>
        <li class="active">View Received Queries</li>
      </ol>
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
    <li class="active"><a data-toggle="pill" href="#home">View Queries </a></li>
    
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11 ">
      
        <div class="table-responsive col-lg-11">
          <table id="" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Query</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>                                      
              </tr>
            </thead>
            <tbody>
            <?php
            $x=0;
            
            $s_user_id=$_SESSION['alumni_tech'];
            $query = "SELECT * FROM `kiit_stud_queries` where `status_answer`='1'  order By `sl_no` desc";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              While($rec=mysqli_fetch_array($query_exe)){    
              $x++  
            ?>
            
              <tr>
                <td><?php echo $x ;?></td>
                <td><?php echo $rec['msg_query_details'] ;?></td>
                <td><?php $status=$rec['status_answer'] ;
                if($status==1){
                  echo "<b style='color:red'>Not Replied</b>";
                }else{  
                  echo "<b style='color:green'>Replied</b>";
                }
                ?></td>
                <td><?php echo $rec['date_query'].'/'.$rec['time_query'] ;?></td>
                <td>
                  <?php if($status==1){?>

                    <a class="btn btn-primary btn-xs" href="admin_replied_query_details.php?serial=<?=$rec['sl_no']?>">Reply</a>
                    <?php 
                  }
                ?>
                </td>                      
              </tr>

              <?php
            }
            }
            ?>
            </tbody>                 
          </table>
    
          </div>
          </div>
      </div>
    </div>
   
  </div>
  <br>
          
    </div>
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
<!-- <script type="text/javascript">
  function check_exam() {
  var exam_category_name=$('#exam_category').val();
  var check_exam_category="exams_category_name";
  if(exam_category_name!=""){ 
              // alert(class_name);             
    $.ajax({
      type:'POST',
      url:'admin_class_check.php',
      data:{exam_category_names:exam_category_name,check_exams_category:check_exam_category},
      success:function(html){                 
        if(html==1){
          document.getElementById("myerror").innerHTML = "";
          return true;
          // $("#reli").submit(); 
        }else{
          document.getElementById("myerror").innerHTML = "Exam Category Is Present In Our Records ,"+exam_category_name;
          return false;
        }
      }
    });
  }
}

function sub_check(){
  if(check_exam()){
    alert('hi');
  }else{
    alert('bye');
  }
}
</script>
 -->