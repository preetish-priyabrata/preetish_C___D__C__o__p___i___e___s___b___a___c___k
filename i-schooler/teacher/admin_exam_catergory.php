<?php
session_start();
ob_start();
//check session
if($_SESSION['user_teacher'])
{
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Exam Category Details
        <small>Here School Exam Category Information Is Created and Viewed </small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- success or error message alert -->
      <div class="text-center">
    <?php 
          $msg->display(); 
          $sql_class_detail="SELECT * FROM `master_class`";
          $sql_query_detail=mysqli_query($conn,$sql_class_detail);
          $num_rows=mysqli_num_rows($sql_query_detail);
        ?> 
      </div>
    <!-- end success or errot message alert  -->
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home"><h4><b>View Exam Catergory</b></h4></a></li>
   <!-- <li><a data-toggle="pill" href="#menu1"> Add Exam Catergory</a></li>-->
    </ul>
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
   <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11">
         
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>

                    <th><h4><b>Sl.no</b></h4></th>
                    <th><h4><b>Exam Catagory</b></h4></th>                                         
                  </tr>
                </thead>
                <tbody>

                   <?php
                  $query ="SELECT * FROM `master_exam_category`";
                  $exe =mysqli_query($conn,$query);
                  if(mysqli_num_rows($exe)){
                    while($rec = mysqli_fetch_array($exe)){
                ?>
              <tr>
                
                <td><?php echo $rec['slno_exam'];?></td>
                <td><?php echo $rec['exam_name_cat'];?></td>
                                     
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
    <div id="menu1" class="tab-pane fade">
      <div class="container">
       
          <form class="form-horizontal" id="reli" action="admin_exam_catergory_save.php" method="POST">
            <div class="form-group">
            <br>
              <label class="control-label col-sm-2" for="email">Exam Type:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="exam_category" placeholder="Enter Exam Catagory"/>

                <span id="myerror" style="color: red;"></span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" name="submit" value="Submit"/>
              </div>
            </div>
          </form>
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
};